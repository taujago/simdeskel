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
 	<h2> BUKU DATA MUTASI PENDUDUK <?php echo strtoupper($desa2->bentuk_lembaga) ?> </h2>
 	<h2> <?php echo strtoupper($desa2->bentuk_lembaga. " ". $desa2->desa) ?> </h2>
 	<h2> BULAN <?php echo $bulan; ?> TAHUN <?php echo $tahun; ?> </h2>


 </center>
 <p   style="font-weight:bold; text-align:right">MODEL B.3</p>
 <br /><br />
<table width="100%" border="0" class="laporan">
   <tr>
     <th rowspan="4" scope="col">NO</th>
     <th rowspan="4" scope="col">NAMA DUSUN/RT</th>
     <th colspan="7" scope="col">JUMLAH PENDUDUK AWAL BULAN </th>
     <th colspan="8" scope="col">TAMBAHAN BULAN INI</th>
     <th colspan="8" scope="col">PENGURANGAN BULAN IN</th>
     <th colspan="7" rowspan="2" scope="col">JUMLAH PENDUDUK AKHIR BULAN</th>
     <th rowspan="4" scope="col">KET</th>
   </tr>
   <tr>
     <th rowspan="3">JML KK</th>
     <th colspan="2">WNI</th>
     <th colspan="2">WNA</th>
     <th rowspan="3">JML. ANG KELUARGA</th>
     <th rowspan="3">JML<br>
       JIWA</th>
     <th colspan="4">LAHIR</th>
     <th colspan="4">DATANG</th>
     <th colspan="4">MATI</th>
     <th colspan="4">PINDAH</th>
   </tr>
   <tr>
     <th rowspan="2">L</th>
     <th rowspan="2">P</th>
     <th rowspan="2">L</th>
     <th rowspan="2">P</th>
     <th colspan="2">WNI</th>
     <th colspan="2">WNA</th>
     <th colspan="2">WNI</th>
     <th colspan="2">WNA</th>
     <th colspan="2">WNI</th>
     <th colspan="2">WNA</th>
     <th colspan="2">WNI</th>
     <th colspan="2">WNA</th>
     <th colspan="2">WNI</th>
     <th colspan="2">WNA</th>
     <th rowspan="2">JML. KK</th>
     <th rowspan="2">JML ANGGOTA KELUARGA</th>
     <th rowspan="2">JUMLAH JIWA</th>
   </tr>
   <tr>
     <th>L</th>
     <th>P</th>
     <th>L</th>
     <th>P</th>
     <th>L</th>
     <th>P</th>
     <th>L</th>
     <th>P</th>
     <th>L</th>
     <th>P</th>
     <th>L</th>
     <th>P</th>
     <th>L</th>
     <th>P</th>
     <th>L</th>
     <th>P</th>
     <th>L</th>
     <th>P</th>
     <th>L</th>
     <th>P</th>
   </tr>
   <tr>
     <th>1</th>
     <th>2</th>
     <th>3</th>
     <th>4</th>
     <th>5</th>
     <th>6</th>
     <th>7</th>
     <th>8</th>
     <th>9</th>
     <th>10</th>
     <th>11</th>
     <th>12</th>
     <th>13</th>
     <th>14</th>
     <th>15</th>
     <th>16</th>
     <th>17</th>
     <th>18</th>
     <th>19</th>
     <th>20</th>
     <th>21</th>
     <th>22</th>
     <th>23</th>
     <th>24</th>
     <th>25</th>
     <th>26</th>
     <th>27</th>
     <th>28</th>
     <th>29</th>
     <th>30</th>
     <th>31</th>
     <th>32</th>
     <th>33</th>
   </tr>
   <?php 
     $i = 0; 
     foreach($datart->result() as $row ) : 
          $i++;
		  
	$ab_kk = 	  $this->dm->jumlah_kk_per_rt($row->rt,$tahun,$bulan);
	$ab_wni_l = $this->dm->jumlah_akhir_bulan($tahun,$bulan,$row->rt,"WNI","L");
	$ab_wni_p = $this->dm->jumlah_akhir_bulan($tahun,$bulan,$row->rt,"WNI","P")  ;
	$ab_wna_l = $this->dm->jumlah_akhir_bulan($tahun,$bulan,$row->rt,"WNA","L");
	$ab_wna_p =  $this->dm->jumlah_akhir_bulan($tahun,$bulan,$row->rt,"WNA","P");
	$ab_jak =   $ab_wni_l + $ab_wni_p + $ab_wna_l + $ab_wna_p;
	$jumlah_jiwa = $ab_jak + $ab_kk;

     $lahir_wni_l = $this->dm->jml_kelahiran($tahun,$bulan,$row->rt,"WNI","L");
     $lahir_wni_p = $this->dm->jml_kelahiran($tahun,$bulan,$row->rt,"WNI","P");
     $lahir_wna_l = $this->dm->jml_kelahiran($tahun,$bulan,$row->rt,"WNA","L");
     $lahir_wna_p = $this->dm->jml_kelahiran($tahun,$bulan,$row->rt,"WNA","P");

     $datang_wni_l = $this->dm->jml_kedatangan($tahun,$bulan,$row->rt,"WNI","L");
     $datang_wni_p = $this->dm->jml_kedatangan($tahun,$bulan,$row->rt,"WNI","P");
     $datang_wna_l = $this->dm->jml_kedatangan($tahun,$bulan,$row->rt,"WNA","L");
     $datang_wna_p = $this->dm->jml_kedatangan($tahun,$bulan,$row->rt,"WNA","P");

     $mati_wni_l = $this->dm->jml_kematian($tahun,$bulan,$row->rt,"WNI","L");
     $mati_wni_p = $this->dm->jml_kematian($tahun,$bulan,$row->rt,"WNI","P");
     $mati_wna_l = $this->dm->jml_kematian($tahun,$bulan,$row->rt,"WNA","L");
     $mati_wna_p = $this->dm->jml_kematian($tahun,$bulan,$row->rt,"WNA","P");

     $pindah_wni_l = $this->dm->jml_pindah($tahun,$bulan,$row->rt,"WNI","L");
     $pindah_wni_p = $this->dm->jml_pindah($tahun,$bulan,$row->rt,"WNI","P");
     $pindah_wna_l = $this->dm->jml_pindah($tahun,$bulan,$row->rt,"WNA","L");
     $pindah_wna_p = $this->dm->jml_pindah($tahun,$bulan,$row->rt,"WNA","P");


     $jumlah_wni_l = $this->dm->jml_penduduk($tahun,$bulan,$row->rt,"WNI","L");
     $jumlah_wni_p = $this->dm->jml_penduduk($tahun,$bulan,$row->rt,"WNI","P");
     $jumlah_wna_l = $this->dm->jml_penduduk($tahun,$bulan,$row->rt,"WNA","L");
     $jumlah_wna_p = $this->dm->jml_penduduk($tahun,$bulan,$row->rt,"WNA","P");

     $jumlah_kk = $this->dm->jml_kk($tahun,$bulan,$row->rt);

     $jumlah_warga = $jumlah_wni_l +
                    $jumlah_wni_p +
                    $jumlah_wna_l +
                    $jumlah_wna_p ;

   ?>
   <tr>
     <td><?php echo $i; ?></td>
     <td><?php echo $row->rt; ?></td>
     <td><?php echo $ab_kk; ?></td>
     <td><?php echo $ab_wni_l; ?></td>
     <td><?php echo $ab_wni_p; ?></td>
     <td><?php echo $ab_wna_l;  ?></td>
     <td><?php echo $ab_wna_p;  ?></td>
     <td><?php echo $ab_jak; ?></td>
     <td><?php echo $jumlah_jiwa; ?></td>
     <td><?php echo $lahir_wni_l ?></td>
     <td><?php echo $lahir_wni_p ?></td>
     <td><?php echo $lahir_wna_l ?></td>
     <td><?php echo $lahir_wna_p ?></td>
     <td><?php echo $datang_wni_l ?></td>
     <td><?php echo $datang_wni_p ?></td>
     <td><?php echo $datang_wna_l ?></td>
     <td><?php echo $datang_wna_p ?></td>
     <td><?php echo $mati_wni_l ?></td>
     <td><?php echo $mati_wni_p ?></td>
     <td><?php echo $mati_wna_l ?></td>
     <td><?php echo $mati_wna_p ?></td>
     <td><?php echo $pindah_wni_l ?></td>
     <td><?php echo $pindah_wni_p ?></td>
     <td><?php echo $pindah_wna_l ?></td>
     <td><?php echo $pindah_wna_p ?></td>
     <td><?php echo $jumlah_wni_l ?></td>
     <td><?php echo $jumlah_wni_p ?></td>
     <td><?php echo $jumlah_wna_l ?></td>
     <td><?php echo $jumlah_wna_p ?></td>
     <td><?php echo $jumlah_kk ?></td>
     <td><?php echo $jumlah_warga ?></td>
     <td><?php echo ($jumlah_kk + $jumlah_warga) ?></td>
     <td>&nbsp;</td>
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