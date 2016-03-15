<script type="text/javascript">


function cetak() {
	 
		v_id_jenis_penyakit = $('#id_jenis_penyakit').val();
		window.open('<?php echo site_url("$controller/pdf/") ?>/'+v_id_jenis_penyakit);
	
	 
}

function cari(){
	console.log($('#id_jenis_penyakit').val());
	      $('#tt').datagrid('load',{                         
         	id_jenis_penyakit 				: $('#id_jenis_penyakit').val()
         	       
           	             
        });  
}

</script>