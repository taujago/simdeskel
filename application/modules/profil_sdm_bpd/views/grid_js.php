<script type="text/javascript">
var url;
function submit(data){
			$('#'+data).form('submit',{
				url: '<?php echo site_url("$controller/update") ?>',
				onSubmit: function(){
					return $(this).form('validate');
				},
				dataType:'json',
				success: function(result){
					 console.log(result);
					 obj = $.parseJSON(result);
 					if (obj.success == false ){
						$.messager.alert('Error',obj.pesan,'error');
					} else {
						$.messager.alert('Informasi',obj.pesan,'info');
						 
					}
				}
			});
		}
</script>