<html>
	<head>
		<title>
			<?php echo   $title; ?>
		</title>

  <style>
  * {
  	font-size:6px;
  }
  .judul {
  	font-size:14px;
	font-weight:bold;
  }
  
  
table.cetak th {
	border : 1px solid #000;
	vertical-align:middle;
	font-weight:bold;
}

table.cetak td {
	/*border-left : 1px solid #000;
	border-right : 1px solid #000;*/
	border:1px solid #000;
	
}
</style>

		</head>

<body>
	<?php 
	$desa2 = $this->cm->data_desa();

	?>
 
 

 <p style="text-align:center">
 	  <span class="judul"> BUKU DATA REKAPITULASI PENDUDUK <?php echo strtoupper($desa2->bentuk_lembaga) ?> </span>   <br>

 	 <span class="judul"> <?php echo strtoupper($desa2->bentuk_lembaga. " ". $desa2->desa) ?></span>    <br>

 	 <span class="judul"> BULAN  <?php echo  $this->cm->nama_bulan($bulan); ?>  TAHUN <?php echo $tahun; ?>   </span><br>

</p>
 
 <p   style="font-weight:bold; text-align:right">MODEL B.3</p>
 <br /><br />
<table width="100%" border="0" cellpadding="3" class="cetak">
<thead>
   <tr>
     <th rowspan="4" align="center" scope="col"><strong>NO</strong></th>
     <th rowspan="4" align="center" scope="col"><strong>DSN/RT</strong></th>
     <th colspan="7" align="center" scope="col"><strong>JUMLAH PENDUDUK AWAL BULAN </strong></th>
     <th colspan="8" align="center" scope="col"><strong>TAMBAHAN BULAN INI</strong></th>
     <th colspan="8" align="center" scope="col"><strong>PENGURANGAN BULAN INI</strong></th>
     <th colspan="7" rowspan="2" align="center" scope="col"><strong>JUMLAH PENDUDUK AKHIR BULAN</strong></th>
     <th rowspan="4" align="center" scope="col"><strong>KET</strong></th>
   </tr>
   <tr>
     <th rowspan="3" align="center"><strong>JML KK</strong></th>
     <th colspan="2" align="center"><strong>WNI</strong></th>
     <th colspan="2" align="center"><strong>WNA</strong></th>
     <th rowspan="3" align="center"><strong>JML. ANG KELUARGA</strong></th>
     <th rowspan="3" align="center"><strong>JML<br>
      JIWA</strong></th>
     <th colspan="4" align="center"><strong>LAHIR</strong></th>
     <th colspan="4" align="center"><strong>DATANG</strong></th>
     <th colspan="4" align="center"><strong>MATI</strong></th>
     <th colspan="4" align="center"><strong>PINDAH</strong></th>
   </tr>
   <tr>
     <th rowspan="2" align="center"><strong>L</strong></th>
     <th rowspan="2" align="center"><strong>P</strong></th>
     <th rowspan="2" align="center"><strong>L</strong></th>
     <th rowspan="2" align="center"><strong>P</strong></th>
     <th colspan="2" align="center"><strong>WNI</strong></th>
     <th colspan="2" align="center"><strong>WNA</strong></th>
     <th colspan="2" align="center"><strong>WNI</strong></th>
     <th colspan="2" align="center"><strong>WNA</strong></th>
     <th colspan="2" align="center"><strong>WNI</strong></th>
     <th colspan="2" align="center"><strong>WNA</strong></th>
     <th colspan="2" align="center"><strong>WNI</strong></th>
     <th colspan="2" align="center"><strong>WNA</strong></th>
     <th colspan="2" align="center"><strong>WNI</strong></th>
     <th colspan="2" align="center"><strong>WNA</strong></th>
     <th rowspan="2" align="center"><strong>JML. KK</strong></th>
     <th rowspan="2" align="center"><strong>JML ANGGOTA KELUARGA</strong></th>
     <th rowspan="2" align="center"><strong>JML JIWA</strong></th>
   </tr>
   <tr>
     <th align="center"><strong>L</strong></th>
     <th align="center"><strong>P</strong></th>
     <th align="center"><strong>L</strong></th>
     <th align="center"><strong>P</strong></th>
     <th align="center"><strong>L</strong></th>
     <th align="center"><strong>P</strong></th>
     <th align="center"><strong>L</strong></th>
     <th align="center"><strong>P</strong></th>
     <th align="center"><strong>L</strong></th>
     <th align="center"><strong>P</strong></th>
     <th align="center"><strong>L</strong></th>
     <th align="center"><strong>P</strong></th>
     <th align="center"><strong>L</strong></th>
     <th align="center"><strong>P</strong></th>
     <th align="center"><strong>L</strong></th>
     <th align="center"><strong>P</strong></th>
     <th align="center"><strong>L</strong></th>
     <th align="center"><strong>P</strong></th>
     <th align="center"><strong>L</strong></th>
     <th align="center"><strong>P</strong></th>
   </tr>
   <tr>
     <th align="center"><strong>1</strong></th>
     <th align="center"><strong>2</strong></th>
     <th align="center"><strong>3</strong></th>
     <th align="center"><strong>4</strong></th>
     <th align="center"><strong>5</strong></th>
     <th align="center"><strong>6</strong></th>
     <th align="center"><strong>7</strong></th>
     <th align="center"><strong>8</strong></th>
     <th align="center"><strong>9</strong></th>
     <th align="center"><strong>10</strong></th>
     <th align="center"><strong>11</strong></th>
     <th align="center"><strong>12</strong></th>
     <th align="center"><strong>13</strong></th>
     <th align="center"><strong>14</strong></th>
     <th align="center"><strong>15</strong></th>
     <th align="center"><strong>16</strong></th>
     <th align="center"><strong>17</strong></th>
     <th align="center"><strong>18</strong></th>
     <th align="center"><strong>19</strong></th>
     <th align="center"><strong>20</strong></th>
     <th align="center"><strong>21</strong></th>
     <th align="center"><strong>22</strong></th>
     <th align="center"><strong>23</strong></th>
     <th align="center"><strong>24</strong></th>
     <th align="center"><strong>25</strong></th>
     <th align="center"><strong>26</strong></th>
     <th align="center"><strong>27</strong></th>
     <th align="center"><strong>28</strong></th>
     <th align="center"><strong>29</strong></th>
     <th align="center"><strong>30</strong></th>
     <th align="center"><strong>31</strong></th>
     <th align="center"><strong>32</strong></th>
     <th align="center"><strong>33</strong></th>
   </tr>
   </thead>
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
     //echo $this->db->last_query(). "<br />";
     $lahir_wni_p = $this->dm->jml_kelahiran($tahun,$bulan,$row->rt,"WNI","P");
     //echo $this->db->last_query(). "<br />";
     $lahir_wna_l = $this->dm->jml_kelahiran($tahun,$bulan,$row->rt,"WNA","L");
     //echo $this->db->last_query(). "<br />";
     $lahir_wna_p = $this->dm->jml_kelahiran($tahun,$bulan,$row->rt,"WNA","P");
     //echo $this->db->last_query(). "<br />";
     //exit;
     $datang_wni_l = $this->dm->jml_kedatangan($tahun,$bulan,$row->rt,"WNI","L");
     $datang_wni_p = $this->dm->jml_kedatangan($tahun,$bulan,$row->rt,"WNI","P");
     $datang_wna_l = $this->dm->jml_kedatangan($tahun,$bulan,$row->rt,"WNA","L");
     $datang_wna_p = $this->dm->jml_kedatangan($tahun,$bulan,$row->rt,"WNA","P");

     $mati_wni_l = $this->dm->jml_kematian($tahun,$bulan,$row->rt,"WNI","L");
     $mati_wni_p = $this->dm->jml_kematian($tahun,$bulan,$row->rt,"WNI","P");
     $mati_wna_l = $this->dm->jml_kematian($tahun,$bulan,$row->rt,"WNA","L");
     $mati_wna_p = $this->dm->jml_kematian($tahun,$bulan,$row->rt,"WNA","P");

     $pindah_wni_l = $this->dm->jml_pindah($tahun,$bulan,$row->rt,"WNI","L");
    // echo $this->db->last_query(). "<br />";
     $pindah_wni_p = $this->dm->jml_pindah($tahun,$bulan,$row->rt,"WNI","P");
    // echo $this->db->last_query(). "<br />";
     $pindah_wna_l = $this->dm->jml_pindah($tahun,$bulan,$row->rt,"WNA","L");
    // echo $this->db->last_query(). "<br />";
     $pindah_wna_p = $this->dm->jml_pindah($tahun,$bulan,$row->rt,"WNA","P");
    // echo $this->db->last_query(). "<br />"; //exit;


     $jumlah_wni_l = $this->dm->jml_penduduk($tahun,$bulan,$row->rt,"WNI","L");
     $jumlah_wni_p = $this->dm->jml_penduduk($tahun,$bulan,$row->rt,"WNI","P");
     $jumlah_wna_l = $this->dm->jml_penduduk($tahun,$bulan,$row->rt,"WNA","L");
     $jumlah_wna_p = $this->dm->jml_penduduk($tahun,$bulan,$row->rt,"WNA","P");




     $jumlah_kk = $this->dm->jml_kk_akhir($tahun,$bulan,$row->rt);

     $jumlah_warga = $jumlah_wni_l +
                    $jumlah_wni_p +
                    $jumlah_wna_l +
                    $jumlah_wna_p ;

    // $ab_kk =       $this->dm->jumlah_kk_per_rt($row->rt,$tahun,$bulan);
    $ab_kk = $this->dm->jml_kk($tahun,$bulan,$row->rt);                
    $ab_wni_l = $this->dm->jumlah_akhir_bulan($tahun,$bulan,$row->rt,"WNI","L") - $lahir_wni_l + $mati_wni_l + $pindah_wni_l  ;
    $ab_wni_p = $this->dm->jumlah_akhir_bulan($tahun,$bulan,$row->rt,"WNI","P") - $lahir_wni_p  + $mati_wni_p + $pindah_wni_p   ;
    $ab_wna_l = $this->dm->jumlah_akhir_bulan($tahun,$bulan,$row->rt,"WNA","L") - $lahir_wna_l + $mati_wna_l + $pindah_wna_l  ;
    $ab_wna_p =  $this->dm->jumlah_akhir_bulan($tahun,$bulan,$row->rt,"WNA","P") - $lahir_wna_p  + $mati_wna_p + $pindah_wna_p;

    $ab_jak        =   $ab_wni_l + $ab_wni_p + $ab_wna_l + $ab_wna_p;
    $jumlah_jiwa  = $ab_jak + $ab_kk; 


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
<!-- </div> end of wrap -->
</body>

</html>