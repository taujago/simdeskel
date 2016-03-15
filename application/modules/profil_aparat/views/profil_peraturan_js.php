<script type="text/javascript">

$(document).ready(function(){
 

$('#search_tgl_awal, #tanggal, #dilaporkan_tgl, #persetujuan_bpd_tgl').datebox({  
        required:false  ,
        formatter : function(date) {
        	var y = date.getFullYear();
			var m = date.getMonth()+1;
			var d = date.getDate();
			return d+'-'+m+'-'+y;
        }
    });   
	$('#search_tgl_akhir').datebox({  
        required:false  ,
        formatter : function(date) {
        	var y = date.getFullYear();
			var m = date.getMonth()+1;
			var d = date.getDate();
			return d+'-'+m+'-'+y;
        }
    });    

	  

	 	 

});

var url;

function baru(){
			$('#dlg').dialog('open').dialog('setTitle','Tambah Data Peraturan');
			$('#fm').form('clear');
 			url = '<?php echo site_url("$controller/save") ?>';  
}


function edit() {

	var row = $('#tt').datagrid('getSelected');	
	if(row) { 
	$('#dlg').dialog('open').dialog('setTitle','Edit Data Surat Keterangan Domisili'); 
	$('#fm').form('load',row);						 
	url = '<?php echo site_url("$controller/update") ?>';  
	}
	else {
		$.messager.alert('Error','Pilih record yang akan diedit','error');
	}
}


function hapus() {
			var row = $('#tt').datagrid('getSelections');
 			var arr = new Array();
			for(var i=0; i < row.length; i++) {
				arr[i] = row[i].id;
				console.log(row[i].id);
			}
			ids = arr.join();
			console.log(ids);
  			if (row){
				$.messager.confirm('Konfirmasi','Anda yakin akan menghapus data ? ',function(r){
					if (r){
						$.post('<?php echo site_url("$controller/hapus") ?>',{ids:ids},function(result){
							
							//return false;
							if (result.success == true){
								 
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


function simpan(){
			$('#fm').form('submit',{
				url: url,
				onSubmit: function(){
					return $(this).form('validate');
				},
				dataType:'json',
				success: function(result){
					 console.log(result);
					 obj = $.parseJSON(result);
					// return false;
					if (obj.success == false ){
						$.messager.alert('Error',obj.pesan,'error');
					} else {
						$.messager.alert('Informasi',obj.pesan,'info');
						$('#dlg').dialog('close');		// close the dialog
						$('#tt').datagrid('reload');	// reload the user data
					}
				}
			});
		}


function cari(){
	console.log('awal = ' + $('#search_tgl_awal').val());
	console.log('akhir = ' + $('#search_tgl_akhir').val());
	      $('#tt').datagrid('load',{                         
 
         	search_tentang : $('#search_tentang').val(),
         	search_tgl_awal :$('#search_tgl_awal').datebox('getValue'),
         	search_tgl_akhir : $('#search_tgl_akhir').datebox('getValue')	                
        });  
}


function reset_search() {
	$('#search_tentang').val('');
	$("#search_tgl_awal").datebox('setValue', '');  
 	$("#search_tgl_akhir").datebox('setValue', ''); 
	cari();
}

function detail(){
	var row = $('#tt').datagrid('getSelected');	
	if(row) { 
	///$('#dlg').dialog('open').dialog('setTitle','Edit Data Surat Kelahiran'); 
	//$('#fm').form('load',row);						 
	//url = '<?php echo site_url("$controller/update") ?>';  
	location.href=('<?php echo site_url("surat_kelahiran/detail") ?>/'+row.id);
	}
	else {
		$.messager.alert('Error','Pilih record ','error');
	}
}

function cetak(){
	 
	$.messager.prompt('Cetak peraturan ', 'Masukkan tahun :', function(r){
	if (r){
		
		//location.href
		//alert('tahun adalah ' + r);
		window.open('<?php echo site_url("$controller/cetak") ?>/'+r);
	}
	});
}

function excel(){
	$.messager.prompt('Export ke excel ', 'Masukkan tahun :', function(r){
	if (r){
		
		//location.href
		//alert('tahun adalah ' + r);
		location.href=('<?php echo site_url("$controller/excel") ?>/'+r);
	}
	});
}

</script>