<script type="text/javascript">


function cetak() {
	 
	 	v_id_agama = $("#search_id_agama").val();
	
		window.open('<?php echo site_url("$controller/pdf/") ?>/'+v_id_agama);
	
	 
}

function cari(){
	 
	      $('#tt').datagrid('load',{                         
 
         	search_id_agama : $('#search_id_agama').val()
         	     
        });  
}


</script>