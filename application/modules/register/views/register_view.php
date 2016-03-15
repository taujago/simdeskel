<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Registrasi SIMDES</title>


	<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/jseasyui/themes/default/easyui.css">
	<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/jseasyui/themes/icon.css">
	<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/css/theme.css">
	<script type="text/javascript" src="<?php echo base_url(); ?>assets/jseasyui/jquery-1.8.0.min.js"></script>
	<script type="text/javascript" src="<?php echo base_url(); ?>assets/jseasyui/jquery.easyui.min.js"></script>
   <script>
   function register(){
 
			$('#frm1').form('submit',{
				url: '<?php echo site_url("register/validate"); ?>',
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
						 $.messager.alert('Error',obj.pesan,'error');
					} else {
						  $.messager.alert('Informasi',obj.pesan,'info');
						  location.href=('<?php echo site_url(); ?>');
					}
				}
			});
		}
 
   
   </script>
</head>
 
<body style="font-size:12px;">
<div id="detail2" style="width:600px; height:200px; margin:100px auto 0px auto; border: 1px solid #99BBE8;">
	<div id="detail-head"> 
		REGISTRASI SISTEM INFORMASI MANAJEMEN DESA

	</div>
    <DIV style="margin:20px;">
    <p>SERIAL NUMBER  :<strong> <?php echo $serial; ?></strong>
    
    <br />
    </p>
    <p>Untuk mendapatkan Kode Aktivasi, Kirimkan SMS ke Nomor : <strong>081529004000</strong> </p>
    <p>dengan format : Nama Desa &lt;spasi&gt; Kabupaten &lt;spasi&gt; Serial<br />
    </p>
    <form id="frm1" name="frm1" method="post" action="<?php echo site_url("register/validate"); ?>">
      Masukkan Kode Aktivasi 
      <input type="text" name="aktivasi" id="aktivasi" />
      <input type="hidden" name="serial" id="serial" value="<?php echo $serial; ?>" />
     	<a href="#" class="easyui-linkbutton" iconCls="icon-ok" plain="false" onclick="register()" >Register</a>		
    </form>
    <br />
    </DIV>

    
</body>
</html>
<?php 

$kode = GetVolumeLabel()."1353590395393593";
		$register = md5($kode);
		//echo $register;

function GetVolumeLabel() {
	  // Try to grab the volume name
	  if (preg_match('#Volume Serial Number is (.*)\n#i', shell_exec('dir c:'), $m)) {
	    $volname = ' ('.$m[1].')';
	  } else {
	    $volname = '';
	  }
	//return $volname;
	$serial =  str_replace("(","",str_replace(")","",$volname));
	$serial = md5($serial);
	$serial = substr(preg_replace("/[^0-9]/", '', $serial),0,4);
	return $serial;
	}

	?>