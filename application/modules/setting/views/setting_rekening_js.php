<script type="text/javascript">
var url;
		function baru() {
			//alert('mana man amana ');
			 
			$('#dlg').dialog('open').dialog('setTitle','Tambah Data Rekening Perusahaan ');
			$('#fm').form('clear');
			url = '<?php echo site_url("setting/save_rekening") ?>';  
		}
		function edit(){
			//alert('hello edit..');
			var row = $('#tt').datagrid('getSelected');			 
			if (row){
				$('#dlg').dialog('open').dialog('setTitle','Edit Data Rekening Bank');
				//$('#fm').form('load',row);
				url = '<?php echo site_url("setting/update_rekening") ?>/'+row.id_bank;
				
				$.ajax({
					url:'<?php echo site_url("setting/detail_rekening") ?>/'+row.id_bank,
					dataType : 'json',
					success : function (x){
						 
						 $("#id_bank").val(x.id_bank);
						 $("#no_rekening").val(x.no_rekening);
						 $("#nama_bank").val(x.nama_bank);
						 $("#atas_nama").val(x.atas_nama);
						 $("#kantor_cabang").val(x.kantor_cabang);
					 
						
						
						
					}
				});
			} 
			else {
				$.messager.show({
							title: 'Error',
							msg: "Pilih record yang akan diedit"
						});
			}
		}
		function simpan(){
			$('#fm').form('submit',{
				url: url,
				onSubmit: function(){
					return $(this).form('validate');
				},
				success: function(result){
					//var result = eval('('+result+')');
					console.log(result);
					//return false; 
					result = result.replace(/\s+/g, " ");
					obj = $.parseJSON(result);
					console.log(obj.pesan);
					if (obj.success == false ){
						$.messager.show({
							title: 'Error',
							msg: obj.pesan
						});
					} else {
						$.messager.show({title:'Informasi', msg:obj.pesan});
						$('#dlg').dialog('close');		// close the dialog
						$('#tt').datagrid('reload');	// reload the user data
					}
				}
			});
		}
		function hapus(){
			var row = $('#tt').datagrid('getSelections');
 			var arr = new Array();
			for(var i=0; i < row.length; i++) {
				arr[i] = row[i].id_bank;
			}
			ids = arr.join();
  			if (row){
				$.messager.confirm('Konfirmasi','Anda yakin akan menghapus data ? ',function(r){
					if (r){
						$.post('<?php echo site_url("setting/hapus_rekening") ?>',{ids:ids},function(result){
							
							//return false;
						  $('#tt').datagrid('reload');
						  return false;
							res = $.parseJSON(result);
							console.log(res);
							
							console.log('obje itu '+ res);
							return false;
							if (res.success == true){
								console.log('ini kalo berhasi..');
								$('#tt').datagrid('reload');	// reload the user data
							} else {
								$.messager.show({	// show error message
									title: 'Error',
									msg: obj.pesan
								});
							}
						},'json');
					}
				});
			}
		}
</script>