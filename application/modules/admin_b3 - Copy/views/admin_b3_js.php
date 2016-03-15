<script type="text/javascript">

$(document).ready(function(){
  
});

   

function cetak(){
	 
	 	v_tahun = $("#tahun").val();
	 	v_bulan = $("#bulan").val();
		window.open('<?php echo site_url("$controller/pdf") ?>/'+v_tahun+"/"+v_bulan);
	 
}

function excel(){
	 	v_tahun = $("#tahun").val();
	 	v_bulan = $("#bulan").val();
		
		//location.href
		//alert('tahun adalah ' + r);
		location.href=('<?php echo site_url("$controller/excel") ?>/'+v_tahun+"/"+v_bulan);
	 
}

</script>