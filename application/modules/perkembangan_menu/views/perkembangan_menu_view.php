<div id="detail" style="min-height: 600px; width:1132px; " >
	 <div id="detail-head">
	 	<?php echo $title; ?>
	 </div>

<div>
	 
 
<script>
$(document).ready(function() {
    load_menu();
	
	$("#search_menu").keyup(function(){
			load_menu();
	});
	
	("#search_menu").keydown(function(){
			load_menu();
	});
	
});

function load_menu() {
	$.ajax({
		url :'<?php echo site_url("$controller/menu"); ?>/'+$("#search_menu").val(),
		success: function(result){
			$("#menuitem").html(result);
		}
		});
}

</script>



<div class="menu-profil" style="padding:20px;">

<form> 
<center>
<a class="easyui-linkbutton" target="_blank" style='float:left' iconCls="icon-print" plain="true" href="<?php echo site_url("profil_menu/cetak/perkembangan_menu"); ?>" > Cetak </a>
<input size="50" name="search_menu" id="search_menu"  class="search_menu" placeholder="Cari menu" />
</center></form><br />

<div id="menuitem">

</div>
 
 
 
</div>