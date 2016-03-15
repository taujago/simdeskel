<div id="detail" style="height: 400px;" >
	 <div id="detail-head">
	 	<?php echo $title; ?>
	 </div>
	 <div style="padding : 100px">
	 	<center>
	 		<form id="restoreform" enctype="multipart/form-data" method="post"  >
	 		Pilih File Backup Database <br />
	 		<input type="file" name="backup" />
	 	</form>
	 <a style="text-decoration:none;color:000" href="#" onclick="restoredb();">
	 	
	 	<img src="<?php echo base_url()."assets/images/restore.png" ?>" /> <Br />
	 	<b>RESTORE</b>

	 	<div id="loading" style="display:none;" ><center> Proses Restore ..... </center></div>
	 </center>
	  </a>
	 <div>
</div>
<div class="modal">


</div>

<script type="text/javascript">
function restoredb(){
	$('#restoreform').form('submit',{
				url: '<?php echo site_url("maintenance/dorestore")  ?>',
				 
				onSubmit: function(){
					 $(".modal").show();
				},
				success: function(result){
			    	obj = $.parseJSON(result);
			 		 $(".modal").hide();
					if(obj.success == true) {
			 			$.messager.alert('Informasi',obj.pesan,'info');
					}
					else {
						$.messager.alert('Error',obj.pesan,'error');
					}
				}
			});
}


</script>


<style type="text/css">
.modal {
    display:    none;
    position:   fixed;
    z-index:    1000;
    top:        0;
    left:       0;
    height:     100%;
    width:      100%;
    background: rgba( 255, 255, 255, .8 ) 
                url('<?php echo base_url()."assets/images/" ?>/pIkfp.gif') 
                50% 50% 
                no-repeat;
}
</style>