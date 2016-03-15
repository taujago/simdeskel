<script type="text/javascript">


function cetak() {
	 
		v_id_pekerjaan = $('#id_pekerjaan').val();
		window.open('<?php echo site_url("$controller/pdf/") ?>/'+v_id_pekerjaan);
	
	 
}

function cari(){
	      $('#tt').datagrid('load',{                         
         	id_pekerjaan 				: $('#id_pekerjaan').val()
         	       
           	             
        });  
}

</script>