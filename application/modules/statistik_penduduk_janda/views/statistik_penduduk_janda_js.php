<script type="text/javascript">
$(document).ready(function(){
	
	$('#tt').datagrid({
		onDblClickCell : function(a,b,c) {
			detail();
		}
	});
	
});


function detail(){
			$('#dlg').dialog('open').dialog('setTitle','Foto Penduduk Janda ');
			var row = $('#tt').datagrid('getSelected');	
			$("#gambar").html(row.foto2);
			console.log(row);
			 
}


function cetak() {
	 
	
		window.open('<?php echo site_url("$controller/pdf/") ?>/');
	
	 
}

</script>