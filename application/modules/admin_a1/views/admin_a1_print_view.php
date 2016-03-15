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
 	<h2> BUKU PERATURAN <?php echo strtoupper($desa2->bentuk_lembaga) ?> </h2>
 	<h2> <?php echo strtoupper($desa2->bentuk_lembaga. " ". $desa2->desa) ?> </h2>
 	<h2> TAHUN <?php echo $tahun; ?> </h2>


 </center>
 <p   style="font-weight:bold; text-align:right">MODEL A.1</p>
 <br /><br />
 
<table class="laporan" width="100%">
<thead>
<tr>
<th width="3%">No. </th>
<th width="15%">NOMOR DAN TANGGAL PERATURAN DESA </th>
<th width="19%">TENTANG</th>
<th width="16%">URAIAN SINGKAT</th>
 <th width="15%">NO. DAN TGL. PERSETUJUAN BPD </th> 
<th width="15%">NO. DAN TGL. DILAPORKAN </th> 
<th width="15%">KET </th>
</tr>
<tr>
<th width="3%">1</th>
<th width="15%">2 </th>
<th width="19%">3</th>
<th width="16%">4</th>
 <th width="15%">5</th> 
<th width="15%">6</th> 
<th width="15%">7 </th>
</tr>
</thead>

<?php 
	$i=0;
	foreach($record->result() as $data) :  
		$i++;
	?>
	<tr>
		<td><?php echo $i ?></td>
		<td><?php echo $data->nomor ?><br>
		 <?php echo flipdate($data->tanggal) ?></td>
		<td><?php echo $data->tentang; ?></td>
		<td><?php echo $data->uraian_singkat; ?></td>
		<td><?php echo $data->persetujuan_bpd_nomor ?> <br>
		<?php echo flipdate($data->persetujuan_bpd_tgl) ?></td>
		<td><?php echo $data->dilaporkan_nomor ?> <br>
		<?php echo flipdate($data->dilaporkan_tgl) ?></td>
        <td><?php echo $data->keterangan ?> </td>
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