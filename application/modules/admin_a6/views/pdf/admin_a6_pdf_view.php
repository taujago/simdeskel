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
	font-size:5px;
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
 <!--
 <center>
 	<h2>BUKU DATA TANAH DI <?php echo strtoupper($desa2->bentuk_lembaga) ?></h2>
   <h2> <?php echo strtoupper($desa2->bentuk_lembaga. " ". $desa2->desa) ?> </h2>
 	<h2> TAHUN <?php echo $tahun; ?> </h2>


 </center>-->
 
 
 <p style="text-align:center">
 	  <span class="judul"> BUKU DATA TANAH DI<?php echo strtoupper($desa2->bentuk_lembaga) ?> </span>   <br>

 	 <span class="judul"> <?php echo strtoupper($desa2->bentuk_lembaga. " ". $desa2->desa) ?></span>    <br>

 	 <span class="judul"> TAHUN <?php echo $tahun; ?>   </span><br>

</p>
 
 
<p   style="font-weight:bold; text-align:right">MODEL A.6</p>
 <br /><br />
<table width="100%" border="0" cellpadding="3" class="cetak">
<thead>
   <tr align="center">
     <th width="3%" rowspan="3" align="center" scope="col"><strong>NO.</strong></th>
     <th width="4%" rowspan="3" align="center" scope="col"><strong>NAMA PEMILIK</strong></th>
     <th width="3%" rowspan="3" align="center" scope="col"><strong>LUAS</strong></th>
     <th width="29%" colspan="8" align="center" scope="col"><strong>SERTIFIKAT TANAH</strong></th>
     <th width="61%" colspan="13" align="center" scope="col"><strong>PENGGUNAAN TANAH</strong></th>
   </tr>
   <tr>
     <th width="18%" colspan="5" align="center"><strong>SUDAH BERSERTIFIKAT</strong></th>
     <th width="11%" colspan="3" align="center"><strong>BELUM BERSERTIFIKAT</strong></th>
     <th width="25%" colspan="5" align="center"><strong>NON PERTANIAN</strong></th>
     <th width="36%" colspan="8" align="center"><strong>PERTANIAN</strong></th>
   </tr>
   <tr>
     <th width="3%" align="center"><strong>HM</strong></th>
     <th width="3%" align="center"><strong>HGB</strong></th>
     <th width="3%" align="center"><strong>HP</strong></th>
     <th width="5%" align="center"><strong>HGU</strong></th>
     <th width="4%" align="center"><strong>HPL</strong></th>
     <th width="3%" align="center"><strong>MA</strong></th>
     <th width="3%" align="center"><strong>VI</strong></th>
     <th width="5%" align="center"><strong>TN</strong></th>
     <th width="5%" align="center"><strong>PERU 
     MAHAN</strong></th>
     <th width="4%" align="center"><strong>PERDA 
     GANGAN</strong></th>
     <th width="6%" align="center"><strong>PERKAN<br>
     TORAN</strong></th>
     <th width="5%" align="center"><strong>INDUSTRI</strong></th>
     <th width="5%" align="center"><strong>FASILITAS UMUM</strong></th>
     <th width="4%" align="center"><strong>SAWAH</strong></th>
     <th width="5%" align="center"><strong>TEGALAN</strong></th>
     <th width="4%" align="center"><strong>PERKE 
     BUNAN</strong></th>
     <th width="5%" align="center"><strong>PETERNAKAN /PERIKANAN</strong></th>
     <th width="5%" align="center"><strong>HUTAN BELUKAR</strong></th>
     <th width="5%" align="center"><strong>HUTAN LINDUNG</strong></th>
     <th width="5%" align="center"><strong>TANAH KOSONG</strong></th>
     <th width="3%" align="center"><strong>LAIN - LAIN </strong></th>
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
     <td align="center"><strong>24</strong></td>
   </tr>
  </thead>
   <?php 
   $i=0;
   foreach($record->result() as $row) : 
   $i++;
   ?>
   
   <tr>
     <td width="3%"><?php echo $i; ?></td>
     <td width="4%"><?php echo $row->nama_pemilik ?></td>
     <td width="3%" align="center"><?php echo $row->luas ?></td>
     <td width="3%" align="center"><?php echo $row->luas_sertifikat_hm ?></td>
     <td width="3%" align="center"><?php echo $row->luas_sertifikat_hgb ?></td>
     <td width="3%" align="center"><?php echo $row->luas_sertifikat_hp ?></td>
     <td width="5%" align="center"><?php echo $row->luas_sertifikat_hgu ?></td>
     <td width="4%" align="center"><?php echo $row->luas_sertifikat_hpl ?></td>
     <td width="3%" align="center"><?php echo $row->luas_sertifikat_ma ?></td>
     <td width="3%" align="center"><?php echo $row->luas_sertifikat_vi ?></td>
     <td width="5%" align="center"><?php echo $row->luas_sertifikat_tn ?></td>
     <td width="5%" align="center"><?php echo $row->non_pertanian_perumahan ?></td>
     <td width="4%" align="center"><?php echo $row->non_pertanian_perdagangan ?></td>
     <td width="6%" align="center"><?php echo $row->non_pertanian_perkantoran ?></td>
     <td width="5%" align="center"><?php echo $row->non_pertanian_industri ?></td>
     <td width="5%" align="center"><?php echo $row->non_pertanian_fasilitas_umum ?></td>
     <td width="4%" align="center"><?php echo $row->pertanian_sawah ?></td>
     <td width="5%" align="center"><?php echo $row->pertanian_tegalan ?></td>
     <td width="4%" align="center"><?php echo $row->pertanian_perkebunan ?></td>
     <td width="5%" align="center"><?php echo $row->pertanian_peternakan ?></td>
     <td width="5%" align="center"><?php echo $row->pertanian_hutan ?></td>
     <td width="5%" align="center"><?php echo $row->pertanian_hutan_lindung ?></td>
     <td width="5%" align="center"><?php echo $row->pertanian_tanah_kosong ?></td>
     <td width="3%" align="center"><?php echo $row->pertanian_lain ?></td>
   </tr>
   <?php 
   endforeach;
   ?>
</table>
<br /><br /><br />
<!-- </div> end of wrap -->
</body>

</html>