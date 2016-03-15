<script type="text/javascript">


function cetak() {
	 
		v_id_dusun = $("#id_dusun").val();
		window.open('<?php echo site_url("$controller/pdf/") ?>/'+v_id_dusun);
	
	 
}

function cari(){
	      $('#tt').datagrid('load',{                         
         	id_dusun 				: $('#id_dusun').val()
         	       
           	             
        });  
}

</script>