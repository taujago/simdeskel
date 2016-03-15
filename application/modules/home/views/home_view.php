<html>
<head>
	<title>
		Sistem Informasi Desa & Kelurahan 
	</title>
  <link rel="icon"  type="image/png"   href="<?php echo base_url()."assets/images/favicon.png" ?>" />
	<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/jseasyui/themes/default/easyui.css">
	<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/jseasyui/themes/icon.css">
	<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/css/home.css">

	<script type="text/javascript" src="<?php echo base_url(); ?>assets/jseasyui/jquery-1.8.0.min.js"></script>
	<script type="text/javascript" src="<?php echo base_url(); ?>assets/jseasyui/jquery.easyui.min.js"></script>
	<script type="text/javascript" src="<?php echo base_url()."assets/js/jquery.md5.js" ?>" ></script>

</head>

<body>
<?php 
$desa = $this->cm->data_desa();
?>
<div id="wrapper">
 
 <div class="informasi_desa">
 	<center>
 	<H4> DATA DESA / KELURAHAN </H4> </center>
 	  <table width="100%"> 
  	  	<tr><td class="kiri" width="200px"> <?php echo $desa->bentuk_lembaga ?>   </td><td class="kanan">
		<?php echo $desa->desa ?> </td></tr>
 	  	<tr><td class="kiri" width="200px"> Kecamatan   </td><td class="kanan"><?php echo $desa->kecamatan ?>  </td></tr>
 	  	<tr><td class="kiri" width="200px"> Kab / Kota   </td><td class="kanan"><?php echo $desa->kota ?>  </td></tr>
 	  	<tr><td class="kiri" width="200px"> Provinsi  </td><td class="kanan"><?php echo $desa->provinsi ?>  </td></tr>
 	  </table>
 </div>

<!-- 
  <div class="informasi_desa">
 	<center>
 	<H4> STATISTIK </H4> </center>
 	  <table width="100%"> 
  	  		<tr><td class="data" colspan="2"> JUMLAH WARGA SAAT INI  </td> 
  	  			<td class="data">Lahir </td>
  	  			<td class="data">Datang </td>
  	  			<td class="data">Mati </td>
  	  			<td class="data">Pindah </td>
  	  		</tr>
  	  		<tr>
  	  			<td class="data">Laki </td> 
  	  			<td class="data"><?php echo ($stat['kelahiran']['l'] + 
											$stat['pendatang']['l'] + 
											$stat['mati']['l'] +
											$stat['pindah']['l']) ?> </td>
  	  			<td class="data"><?php echo $stat['kelahiran']['l']; ?>  </td>
  	  			<td class="data"><?php echo $stat['pendatang']['l']; ?> </td>
  	  			<td class="data"><?php echo $stat['mati']['l']; ?> </td>
  	  			<td class="data"><?php echo $stat['pindah']['l']; ?> </td>
  	  		</tr>
  	  		<tr>
  	  			<td class="data">Perempuan </td> 
  	  			<td class="data"><?php echo ($stat['kelahiran']['p'] +
											$stat['pendatang']['p'] +
											$stat['mati']['p'] +
											$stat['pindah']['p']) ?> </td>
  	  			<td class="data"><?php echo $stat['kelahiran']['p']; ?>  </td>
  	  			<td class="data"><?php echo $stat['pendatang']['p']; ?> </td>
  	  			<td class="data"><?php echo $stat['mati']['p']; ?> </td>
  	  			<td class="data"><?php echo $stat['pindah']['p']; ?> </td>
  	  		</tr>
  	  		<tr>
  	  			<td class="data">Jumlah </td> 
  	  			<td class="data"> <?php  echo  ($stat['kelahiran']['jumlah'] + 
												$stat['pendatang']['jumlah'] + 
												$stat['mati']['jumlah'] + 
												$stat['pindah']['jumlah']) ?>  </td>
  	  			<td class="data"><?php echo $stat['kelahiran']['jumlah']; ?>  </td>
  	  			<td class="data"><?php echo $stat['pendatang']['jumlah']; ?> </td>
  	  			<td class="data"><?php echo $stat['mati']['jumlah']; ?> </td>
  	  			<td class="data"><?php echo $stat['pindah']['jumlah']; ?> </td>
  	  		</tr>
 	  </table>
 </div>

<div class="informasi_desa">
 	<center>
 	 
 	  <table width="100%"> 
  	  		<tr><td class="data" colspan="2"> PENDUDUK SEMENTARA SAAT INI   </td> 
  	  			<td class="data">WNI </td>
  	  			<td class="data">WNA </td>
  	  			 
  	  		</tr>
  	  		<?php 
  	  		$total = 0; 
  	  		$total_wna = 0; 
  	  		$total_wni = 0;
  	  		foreach($stat_warga_negara->result() as $row) :  
  	  			$total += $row->jumlah;
  	  			$total_wni += $row->wni;
  	  			$total_wna += $row->wna;
  	  		?>
  	  		<tr>
  	  			<td class="data"><?php echo $row->jk ?> </td> 
  	  			<td class="data"><?php echo $row->jumlah ?> </td>
  	  			<td class="data"><?php echo $row->wni ?> </td>
  	  			<td class="data"><?php echo $row->wna ?> </td>
  	  		</tr>
  	  		<?php endforeach; ?> 
  	  		<tr>
  	  			<td class="data">Total  </td> 
  	  			<td class="data"><?php echo $total ?> </td>
  	  			<td class="data"><?php echo $total_wni ?> </td>
  	  			<td class="data"><?php echo $total_wna ?> </td>
  	  		</tr>
 	  </table>
 </div>

-->
<div class="menu_depan">
 	<center>
 	 
 	  <table  style="border:none;"> 
  	  		 <tr>
  	  		 <!--	<td width="100px"> <a href="#"> Informasi <br />
  	  		 		<img src="<?php echo base_url()."assets/images/info.png" ?>" />
  	  		 	</a></td>
  	  		 	<td width="100px"><a href="#"> Statistik <br />
  	  		 		<img src="<?php echo base_url()."assets/images/statistik.png" ?>" />
  	  		 	</a> </td>
  	  		 	<td width="100px"> <a href="#">Silsilah keluarga<br />
  	  		 		<img src="<?php echo base_url()."assets/images/silsilah.png" ?>" />
  	  		 	</a> </td>-->
  	  		 	<td width="100px"> <a href="#" onClick="login();" >Login Admin <br />
  	  		 		<img src="<?php echo base_url()."assets/images/adminlogin.png" ?>" />
  	  		 	</a> </td>
  	  		 <tr/>
 	  </table>
 </div>
</div>

 
<div id="dlg" class="easyui-dialog" style="width:600;height:200px;padding:10px 10px"
			closed="true" buttons="#dlg-buttons">
 		<form id="frm" method="post" >
 			<center>
				<table>
					<tr>
						<td class="label">Username Operator </td>
						<td><input type="text" name="member"  id="member"/>
					</tr>
					<tr>
						<td class="label">Password </td>
						<td><input type="password" name="password" id="password" />
					</tr>
					 
					

				</table>
			</center>
				<input type="hidden" name="password2" id="password2" />
			</form>
	</div>
	<div id="dlg-buttons">
		<a href="javascript:void(0)" class="easyui-linkbutton" iconCls="icon-ok" onClick="go_login()">Login</a>
		<a href="javascript:void(0)" class="easyui-linkbutton" iconCls="icon-cancel" onClick="javascript:$('#dlg').dialog('close')">Batal</a>
	</div>
 
<?php echo $this->load->view("home_js"); ?>
</body>

</html>