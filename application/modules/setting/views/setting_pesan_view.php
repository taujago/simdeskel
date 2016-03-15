<script type="text/javascript" src="<?php echo base_url(); ?>assets/tinymce/jscripts/tiny_mce/jquery.tinymce.js"></script>
<script>
	$().ready(function() {
		$('textarea.tinymce').tinymce({
			// Location of TinyMCE script
			script_url : '<?php echo base_url(); ?>assets/tinymce/jscripts/tiny_mce/tiny_mce.js',

			// General options
			theme : "advanced",
			plugins : "autolink,lists,pagebreak,style,layer,table,save,advhr,advimage,advlink,emotions,iespell,inlinepopups,insertdatetime,preview,media,searchreplace,print,contextmenu,paste,directionality,fullscreen,noneditable,visualchars,nonbreaking,xhtmlxtras,template,advlist",

			// Theme options
			theme_advanced_buttons1 : "bold,italic,underline,strikethrough,|,justifyleft,justifycenter,justifyright,justifyfull,styleselect,formatselect,fontselect,fontsizeselect",
			theme_advanced_buttons2 : "cut,copy,paste,pastetext,pasteword,|,search,replace,|,bullist,numlist,|,outdent,indent,blockquote,|,undo,redo,|,link,unlink,anchor,image",
			//theme_advanced_buttons3 : "tablecontrols,|,hr,removeformat,visualaid,|,sub,sup,|,charmap,emotions,iespell,media,advhr,|,print,|,ltr,rtl,|,fullscreen",
			//theme_advanced_buttons4 : "insertlayer,moveforward,movebackward,absolute,|,styleprops,|,cite,abbr,acronym,del,ins,attribs,|,visualchars,nonbreaking,template,pagebreak",
			theme_advanced_toolbar_location : "top",
			theme_advanced_toolbar_align : "left",
			theme_advanced_statusbar_location : "bottom",
			theme_advanced_resizing : true,

			// Example content CSS (should be your site CSS)
			content_css : "<?php echo base_url(); ?>assets/css/content.css",

			// Drop lists for link/image/media/template dialogs
			template_external_list_url : "lists/template_list.js",
			external_link_list_url : "lists/link_list.js",
			external_image_list_url : "lists/image_list.js",
			media_external_list_url : "lists/media_list.js",

			// Replace values for the template plugin
			template_replace_values : {
				username : "Some User",
				staffid : "991234"
			}
		});
	});
</script>	

<div id="detail" style="min-height: 500px;" >
	 <div id="detail-head">
	 	<?php echo $title; ?>
	 </div>
	 
	 <div style="margin: 10 20px; border:1px solid #99BBE8; padding: 5px;" >
	 	 
		<a href="#" class="easyui-linkbutton" iconCls="icon-save" plain="true" onclick="simpan()" >Simpan</a>
		<br />
		 
	 </div>
		
	 	<form id="fm" method="post" novalidate>
	 		
	 		
	 		
	 	 	<?php foreach($record->result() as $row) :  ?>
		 	<fieldset>
		 		<input type="hidden" name="id_setting[<?php echo $row->id_setting ?>]" value="<?php echo $row->id_setting ?>" />
		 	<legend><b><?php echo $row->judul; ?></b></legend>
		
			 
			 	  
			 		
			 		<textarea name="pesan[<?php echo $row->id_setting ?>]"  id="txt<?php echo $row->id_setting?>" name="pesan" rows="15" cols="80" style="width: 60%" class="tinymce"><?php echo $row->pesan; ?></textarea> 
			 	
			  
			  <br />
			  Variabel : 
			  		<a class="insert" href="javascript:;" onclick="$('#txt<?php echo $row->id_setting?>').tinymce().execCommand('mceInsertContent',false,'{nama_member}');return false;"> Nama Member </a>
			  		<a class="insert" href="javascript:;" onclick="$('#txt<?php echo $row->id_setting?>').tinymce().execCommand('mceInsertContent',false,'{id_member}');return false;"> ID Member </a>
			  		<a class="insert" href="javascript:;" onclick="$('#txt<?php echo $row->id_setting?>').tinymce().execCommand('mceInsertContent',false,'{detail_pemesanan}');return false;"> Detail Pemesanan </a>
			  		<a class="insert" href="javascript:;" onclick="$('#txt<?php echo $row->id_setting?>').tinymce().execCommand('mceInsertContent',false,'{jml_bayar}');return false;"> Jumlah Bayar</a>
			  		<a class="insert" href="javascript:;" onclick="$('#txt<?php echo $row->id_setting?>').tinymce().execCommand('mceInsertContent',false,'{tgl_bayar}');return false;"> Tanggal Bayar </a>
			</fieldset>
		 <?php endforeach; ?> 
		 
		</form>
	 
	 		
	 	</div>
 
</div>

<script>
	function simpan(){
		$('#fm').form('submit',{
				url: '<?php echo site_url("setting/save_pesan") ?>',
				onSubmit: function(){
					return $(this).form('validate');
				},
				success: function(result){
					//var result = eval('('+result+')');
					console.log(result);
					//return false; 
					result = result.replace(/\s+/g, " ");
					obj = $.parseJSON(result);
					console.log(obj.pesan);
					if (obj.success == false ){
						$.messager.show({
							title: 'Error',
							msg: obj.pesan
						});
					} else {
						$.messager.show({title:'Informasi', msg:obj.pesan});
						$('#dlg').dialog('close');		// close the dialog
						$('#tt').datagrid('reload');	// reload the user data
					}
				}
			});
	}
</script>
