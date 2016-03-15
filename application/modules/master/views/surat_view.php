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
<input size="50" name="search_menu" id="search_menu"  placeholder="Cari menu" />
</form>

<div id="menuitem">

</div>
 
 
 
</div>