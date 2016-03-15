<html>
<head>
	<title>Sistem Informasi Desa dan Kelurahan  </title>

	<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/jseasyui/themes/default/easyui.css">
	<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/jseasyui/themes/icon.css">
	<!-- <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/css/theme.css"> -->
	<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/css/login-style.css">
	<script type="text/javascript" src="<?php echo base_url(); ?>assets/jseasyui/jquery-1.8.0.min.js"></script>
	<script type="text/javascript" src="<?php echo base_url(); ?>assets/jseasyui/jquery.easyui.min.js"></script>

 
<script type="text/javascript" src="<?php echo base_url()."assets/js/jquery.md5.js" ?>" ></script>
<script type="text/javascript">

function simpan(){
    

    $("#password2").val($.md5($("#password").val()) );
    $("#password").val('');

            $('#frm').form('submit',{
                url: '<?php echo site_url("login/ceklogin"); ?>',                
                success: function(obj){
                    //var result = eval('('+result+')');
                
                    //return false; 
                     
                   
                    if (obj.success == false ){
                        $.messager.show({
                            title: 'Error',
                            msg: obj.pesan
                        });
                    } else {
                        location.href='<?php echo site_url("admin") ?>'

                    }
                }
            });
            return false;
        }


</script>
</head>

<body>

	    <div id="win" class="easyui-window" title="Login Admin - Sistem Informasi Desa dan Kelurahan " style="width:700px;height:250px"  
            data-options=" modal:true, closable:false, collapsible: false, minimizable:false, maximizable:false">  
       
        <div id="logo" >
        		<img src="<?php echo base_url()."assets/images/login_large.png" ?>" />
        </div>

        <div id="loginbox">
        <form id="frm" action="<?php echo site_url("login/ceklogin") ?>" method="post" >

        	<table id="login">
        			<tr><td><strong>Username</strong>  </td><td>: <input type="text" name="username"  /></td></tr>
        			<tr><td><strong>Password</strong> </td><td>: <input type="password" name="password" id="password" /></td></tr>
        			<tr><td>&nbsp;</td><td>&nbsp;&nbsp;<input type="button" value="Login" onclick="return simpan();" /></td></tr>
        	</table>	
<input type="hidden" name="password2" id="password2" />
        </form>
    	</div>
    </div>  
</body>
</html>
