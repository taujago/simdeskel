<html>
	<head>
		<title>
			<?php echo   $title; ?>
		</title>

 <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/css/print_style_laporan.css">


		</head>

<body>
	<?php 
	$desa2 = $this->cm->data_desa();

	?>
 
 <center>
 	<h2> BUKU PERATURAN EKSPEDISI </h2>
 	<h2> TAHUN <?php echo $tahun; ?> </h2>
 	<h2>MODEL E.4.b</h2>
 </center>
 <br/><br/><br/>
 
<table class="laporan" width="100%">
<thead>
<tr>
<th width="3%">NOMOR<BR>URUT</th>
<th width="10%">TANGGAL PENGIRIMAN</th>
<th width="10%">TANGGAL DAN<BR>NOMOR SURAT</th>
<th width="10%">ISI SINGKAT<BR>SURAT YANG<BR>DIKIRIM</th>
<th width="10%">SURAT<BR>YANG<BR>DITUJU</th> 
<th width="10%">KETERANGAN</th> 
</tr>
<tr>
<th width="3%">1</th>
<th width="10%">2 </th>
<th width="10%">3</th>
<th width="10%">4</th>
<th width="10%">5</th> 
<th width="10%">6</th> 
</tr>
</thead>

<?php 
	$i=0;
	foreach($record->result() as $data) :  
		$i++;
	?>
	<tr>
		<td><?php echo $i ?></td>
		<td><?php echo flipdate($data->tanggal) ?></td>
		<td><?php echo "Tanggal : ".flipdate($data->tanggal)."<br>Nomor : ".$data->no_surat ?></td>
		<td><?php echo $data->isi; ?></td>
		<td><?php echo $data->tujuan ?> </td>
        <td><?php echo $data->ket ?> </td>
	</tr>
<?php endforeach; ?>

</table> 
 




<br /><br /><br />

<table width="100%">
	<tr>
		<td align="center">MENGETAHUI 
		</td>
		<TD align="center">
			<?php echo date("d-m-Y") ?>
		</TD>
	</tr>
	<tr>
		<td align="center"> KEPALA  <?php echo strtoupper($desa2->bentuk_lembaga) . " ".$desa2->desa; ?>
		</td>
		<TD align="center">
			SEKRETARIS 
		</TD>

	</tr>
	<tr>
		<td align="center">    <?php echo strtoupper($desa2->bentuk_lembaga) . " ".$desa2->desa; ?>
		</td>
		<TD align="center">
			  
		</TD>
		
	</tr>
	<tr>
		<td align="center">  <br /><br /><br />
			<?php echo  $desa2->nama_kepala_desa ?>
		</td>
		<td align="center">		 <br /><br /><br />
		<?php echo  $desa2->nama_sek_desa ?>	
		</td>
		
	</tr>
</table>
<!-- </div> end of wrap -->
</body>

</html>