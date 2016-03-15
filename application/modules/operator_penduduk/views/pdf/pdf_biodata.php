<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">

<head>
	<meta http-equiv="content-type" content="text/html; charset=iso-8859-1" />
	<meta name="author" content="agungshiro" />
 
 
<style>
.wi{width:300px}
ol li{ min-width:750px; }
</style>
    <title>Sistem Informasi Desa dan Kelurahan - Biodata Penduduk</title>
</head>

<body class="surat potrait">
<div class="wrap-potrait">
    <div style="font-size: 13px;">
        <span class="label">No. KK </span>: <?php echo $no_kk; ?><div class="clear"></div>
        <span class="label">NIK </span>: <?php echo $nik; ?>
    </div>
    <!-- HEADER SECTION -->
    <div class="header-wrap">
        <div class="logo-wrap">
            
        </div>
        <div class="head-text" style="width: 700px;" >
            <div style="width: 86px; height: 94px; margin: 0 auto; background-color: aqua;">
            <img src="<?php echo base_url()."assets/images/garuda.png"; ?> " />
            </div>
        </div>
        <div class="logo-wrap">
            <!--- NO LOGO -->
        </div>
        <div class="clear"></div>
    </div>
    
    <!-- END OF HEADER SECTION -->
    
    <div class="body wrap">
        <!-- JUDUL DAN NOMOR SURAT -->
        <div class="no-surat-wrap">
            <div class="nama-surat">
                <h3>biodata penduduk warga negara indonesia</h3>
            </div>
        </div>
        <!-- KONTEN IDENTITAS-->
        <div class="content" style="font-size: 13px;">
        <p><b>DATA PERSONAL</b></p>
            <ol type="1">
                <li><span class="label" style="width: 400px;">Nama Lengkap</span>:<span class="field"> <?php echo $nama; ?></span></li>
                <li><span class="label" style="width: 400px;">Tempat Lahir</span>:<span class="field"> <?php echo $tmp_lahir; ?></span></li>
                <li><span class="label" style="width: 400px;">Tanggal Lahir</span>:<span class="field"> <?php echo $tgl_lahir; ?></span></li>
                <li><span class="label" style="width: 400px;">Umur</span>:<span class="field"> <?php echo $umur." Tahun"; ?></span></li>
                <li><span class="label" style="width: 400px;">Jenis Kelamin</span>:<span class="field"> <?php echo $jk; ?></span></li>
                <li><span class="label" style="width: 400px;">Golongan Darah</span>:<span class="field"> <?php echo $golongan_darah; ?></span></li>
                <li><span class="label" style="width: 400px;">Agama</span>:<span class="field"> <?php echo $agama; ?></span></li>
                <li><span class="label" style="width: 400px;">Pendidikan Terakhir</span>:<span class="field"> <?php echo $pendidikan; ?></span></li>
                <li><span class="label" style="width: 400px;">Pekerjaan</span>:<span class="field"> <?php echo $pekerjaan; ?></span></li>
                <li><span class="label" style="width: 400px;">Status Perkawinan</span>:<span class="field"> <?php echo $this->cm->arr_status_kawin[$status_kawin]; ?></span></li>
                <li><span class="label" style="width: 400px;">Status Hub. Dlm Keluarga</span>:<span class="field"> <?php 
                $arr_hubungan = $this->cm->arr_hubungan;
                echo isset($arr_hubungan[$sebagai])?$arr_hubungan[$sebagai]:""; ?></span></li>
                <li><span class="label" style="width: 400px;">NIK Ibu</span>:<span class="field"> <?php echo $nik_ibu; ?></span></li>
                <li><span class="label" style="width: 400px;">Nama Ibu</span>:<span class="field"> <?php echo $nama_ibu; ?></span></li>
                <li><span class="label" style="width: 400px;">NIK Ayah</span>:<span class="field"> <?php echo $nik_ayah; ?></span></li>
                <li><span class="label" style="width: 400px;">Nama Ayah</span>:<span class="field"> <?php echo $nama_ayah; ?></span></li>
                
                <li><span class="label" style="width: 400px;">Alamat Sebelumnya</span><div style="float:left">:</div>
                    <div class="field"> <?php echo "RT $rt_sebelumnya / RW $rw_sebelumnya  "; ?>
                        <br /><span class="label">Desa/ Kel</span>:  <?php echo "$desa_sebelumnya"; ?>
                        <br /><span class="label">Kecamatan</span>:  <?php echo $kecamatan_sebelumnya; ?>
                        <br /><span class="label">Kab/Kota</span>:  <?php echo $kota_sebelumnya ; ?>
                        <br /><span class="label">Provinsi</span>:  <?php echo $provinsi_sebelumnya ; ?>
                  </div>
                </li>
                <div class="clear"></div>
                 <li><span class="label" style="width: 400px;">Alamat Sekarang</span><div style="float:left">:</div>
                    <div class="field"><?php echo "RT $rt / RW $rw   "; ?>
                        <br /><span class="label">Desa/ Kel</span>:  <?php echo "$desa"; ?>
                        <br /><span class="label">Kecamatan</span>:  <?php echo $kecamatan; ?>
                        <br /><span class="label">Kab/Kota</span>:  <?php echo $kota ; ?>
                        <br /><span class="label">Provinsi</span>:  <?php echo $provinsi ; ?>
                   </div>
                </li>
                <div class="clear"></div>
				<br>
                <b>DATA KEPEMILIKAN DOKUMEN</b>
				<br>
				<br>
                <li><span class="label" style="width: 400px;">Nomor Akte Kelahiran</span>:<span class="field"><?php echo isset($no_akte)?$no_akte:"" ?></span></li>
                <li><span class="label" style="width: 400px;">Tanggal Akte Kelahiran</span>:<span class="field"><?php echo isset($tanggal_akte)?$tanggal_akte:"" ?></span></li>
                <li><span class="label" style="width: 400px;">Akseptor KB</span>:<span class="field"><?php echo isset($akseptor_kb)?$akseptor_kb:"" ?></span></li>
                <li><span class="label" style="width: 400px;">Cacat Menurut Jenis</span>:<span class="field"><?php 
				if(!empty($penduduk_cacat)){
					foreach($penduduk_cacat as $val)
					{
						echo $val;
						echo "<br>";
					}
				}
				else echo "";
				?></span></li>
                <li><span class="label" style="width: 400px;">Status Kepemilkan Rumah</span>:<span class="field"><?php echo isset($status_kepemilikan_rumah)?$status_kepemilikan_rumah:"" ?></span></li>
                <li><span class="label" style="width: 400px;">Jumlah Penghasilan Perbulan</span>:<span class="field"><?php echo isset($penghasilan)?$penghasilan:"" ?></span></li>
                <li><span class="label" style="width: 400px;">Jumlah Pengeluaran Perbulan</span>:<span class="field"><?php echo isset($pengeluaran)?$pengeluaran:"" ?></span></li>
                <li><span class="label" style="width: 400px;">Kepemilikan Lahan Pertanian</span>:<span class="field"><?php echo isset($kepemilikan_lahan)?$kepemilikan_lahan:"" ?></span></li>
                <li><span class="label" style="width: 400px;">Produksi Tanaman Pangan Menurut Komoditas Tahun Ini</span>:<span class="field">
                <?php if(count($penduduk_produksi_tanaman_pangan) != 0) { ?>
                <table border="1"  style="font-size:12px;margin-bottom:20px" width="100%"  cellspacing="0">
                <tr>
                    <th width="200px">Nama Komoditi</th>
                    <th width="80px">Luas Lahan (are)</th>
                    <th width="80px">Hasil (Kg)</th>
                    <th width="400px">Pemasaran Hasil</th>
                </tr>
                <?php foreach($penduduk_produksi_tanaman_pangan as $val) { ?>
                <tr>
                    <td valign="top"><?php echo $val->produksi_tanaman_pangan ?></td>
                    <td valign="top"><?php echo $val->lahan_tanaman_pangan ?></td>
                    <td valign="top"><?php echo $val->hasil_tanaman_pangan ?></td>
                    <td valign="top"><?php echo $val->pemasaran_hasil ?></td>
                </tr>
                <?php } ?>
            	</table>
                <?php } 
				else echo "";
				?>
				</span>
				</li>
                <li><span class="label" style="width: 400px;">Produksi Tanaman Buah-Buahan Pada Tahun Ini</span>:<span class="field">
                 <?php if(count($penduduk_produksi_tanaman_buah) != 0) { ?>
                <table border="1"  style="font-size:12px;margin-bottom:20px" width="100%"  cellspacing="0">
                <tr>
                    <th width="200px">Nama Buah</th>
                    <th width="80px">Banyak Pohon (Pohon)</th>
                    <th width="80px">Hasil (Kg)</th>
                    <th width="400px">Pemasaran Hasil</th>
                </tr>
                <?php foreach($penduduk_produksi_tanaman_buah as $val) { ?>
                <tr>
                	
                    <td valign="top"><?php echo $val->produksi_tanaman_buah ?></td>
                    <td valign="top"><?php echo $val->lahan_tanaman_buah ?></td>
                    <td valign="top"><?php echo $val->hasil_tanaman_buah ?></td>
                    <td valign="top"><?php echo $val->pemasaran_hasil ?></td>
                </tr>
                <?php } ?>
            	</table>
                <?php } 
				else echo "";
				?>
                </span></li>
                <li><span class="label" style="width: 400px;">Produksi Tanaman Obat pada Tahun Ini</span>:<span class="field">
                 <?php if(count($penduduk_produksi_tanaman_obat) != 0) { ?>
                <table border="1"  style="font-size:12px;margin-bottom:20px" width="100%"  cellspacing="0">
                <tr>
                    <th width="200px">Nama Tanaman Obat</th>
                    <th width="80px">Luas Lahan (are)</th>
                    <th width="80px">Hasil (Kg)</th>
                    <th width="400px">Pemasaran Hasil</th>
                </tr>
                <?php foreach($penduduk_produksi_tanaman_obat as $val) { ?>
                <tr>
                	
                    <td valign="top"><?php echo $val->produksi_tanaman_obat ?></td>
                    <td valign="top"><?php echo $val->lahan_tanaman_obat ?></td>
                    <td valign="top"><?php echo $val->hasil_tanaman_obat ?></td>
                    <td valign="top"><?php echo $val->pemasaran_hasil ?></td>
                </tr>
                <?php } ?>
            	</table>
                <?php } 
				else echo "";
				?>
				</span></li>
                <li><span class="label" style="width: 400px;">Kepemilikan Lahan Perkebunan</span>:<span class="field"><?php echo $kepemilikan_perkebunan ?></span></li>
                <li><span class="label" style="width: 400px;">Produksi Komoditas Perkebunan pada Tahun Ini</span>:<span class="field">
                 <?php if(count($penduduk_produksi_perkebunan) != 0) { ?>
                <table border="1"  style="font-size:12px;margin-bottom:20px" width="100%"  cellspacing="0">
                <tr>
                    <th width="200px">Jenis</th>
                    <th width="80px">Banyak Pohon (Pohon)</th>
                    <th width="80px">Hasil (Kg)</th>
                    <th width="250px">Pemasaran Hasil</th>
                </tr>
                <?php foreach($penduduk_produksi_perkebunan as $val) { ?>
                <tr>
                	
                    <td valign="top"><?php echo $val->produksi_perkebunan ?></td>
                    <td valign="top"><?php echo $val->lahan_perkebunan ?></td>
                    <td valign="top"><?php echo $val->hasil_perkebunan ?></td>
                    <td valign="top"><?php echo $val->pemasaran_hasil ?></td>
                </tr>
                <?php } ?>
            	</table>
                <?php } 
				else echo "";
				?>
                </span></li>
                <li><span class="label" style="width: 400px;">Kepemilikan Hutan</span>:<span class="field"><?php echo $kepemilikan_hutan ?></span></li>
                <li><span class="label" style="width: 400px;">Produksi Hasil Hutan Milik Keluarga pada Tahun Ini </span>:<span class="field"></span></li>
				<tr><td colspan="3">
                 <?php if(count($penduduk_produksi_hutan) != 0) { ?>
                <table border="1"  style="font-size:12px;margin-bottom:20px" width="100%"  cellspacing="0">
                <tr>
                    <th width="200px">Nama Hasil Hutan</th>
                    <th width="80px">Hasil</th>
                    <th width="80px">Satuan</th>
                    <th width="250px">Pemasaran Hasil</th>
                </tr>
                <?php foreach($penduduk_produksi_hutan as $val) { ?>
                <tr>
                	
                    <td valign="top"><?php echo $val->produksi_hutan ?></td>
                    <td valign="top"><?php echo $val->hasil_produksi_hutan ?></td>
                    <td valign="top"><?php echo $val->satuan ?></td>
                    <td valign="top"><?php echo $val->pemasaran_hasil ?></td>
                </tr>
                <?php } ?>
            	</table>
                <?php } 
				else echo "";
				?>
                </td></tr>
                <li><span class="label" style="width: 400px;">Kepemilikan Jenis Ternak Keluarga pada Tahun Ini </span>:<span class="field"></span></li>
				<tr><td colspan="3">
                 <?php if(count($penduduk_produksi_ternak) != 0) { ?>
                <table border="1"  style="font-size:12px;margin-bottom:20px" width="100%"  cellspacing="0">
                <tr>
                    <th width="200px">Nama Ternak</th>
                    <th width="160px">Hasil (ekor)</th>
                    <th width="250px">Pemasaran Hasil</th>
                </tr>
                <?php foreach($penduduk_produksi_ternak as $val) { ?>
                <tr>
                	
                    <td valign="top"><?php echo $val->kepemilikan_ternak ?></td>
                    <td valign="top"><?php echo $val->hasil_produksi_ternak ?></td>
                    <td valign="top"><?php echo $val->pemasaran_hasil ?></td>
                </tr>
                <?php } ?>
            	</table>
                <?php } 
				else echo "";
				?>
                </td></tr>
                 <li><span class="label" style="width: 400px;">Usaha Pengolahan Hasil Ternak </span>:<span class="field"></span></li>
				<tr><td colspan="3">
                <?php if(count($penduduk_produksi_pengolahan_ternak) != 0) { ?>
                <table border="1"  style="font-size:12px;margin-bottom:20px" width="100%"  cellspacing="0">
                <tr>
                    <th width="200px">Nama Hasil Ternak</th>
                    <th width="80px">Banyaknya Produksi</th>
                    <th width="80px">Satuan</th>
                    <th width="250px">Pemasaran Hasil</th>
                </tr>
                <?php foreach($penduduk_produksi_pengolahan_ternak as $val) { ?>
                <tr>
                	
                    <td valign="top"><?php echo $val->pengolahan_ternak ?></td>
                    <td valign="top"><?php echo $val->hasil_produksi_pengolahan_ternak ?></td>
                    <td valign="top"><?php echo $val->satuan ?></td>
                    <td valign="top"><?php echo $val->pemasaran_hasil ?></td>
                </tr>
                <?php } ?>
            	</table>
                <?php } 
				else echo "";
				?>
                </td></tr>
                 <li><span class="label" style="width: 400px;">Alat Produksi Budidaya Ikan </span>:<span class="field"> <?php echo isset($alat_produksi_ikan)?$alat_produksi_ikan:"" ?></span></li>
                 <li><span class="label" style="width: 400px;">Produksi Perikanan </span>:<span class="field"></span></li>
				<tr><td colspan="3">
                 <?php if(count($penduduk_produksi_perikanan) != 0) { ?>
                <table border="1" style="font-size:12px;margin-bottom:20px" width="100%"  cellspacing="0">
                <tr>
                    <th width="200px">Nama Ikan</th>
                    <th width="160px">Hasil</th>
                    <th width="250px">Pemasaran Hasil</th>
                </tr>
                <?php foreach($penduduk_produksi_perikanan as $val) { ?>
                <tr>
                	
                    <td valign="top"><?php echo $val->produksi_perikanan ?></td>
                    <td valign="top"><?php echo $val->hasil_produksi_perikanan ?></td>
                    <td valign="top"><?php echo $val->pemasaran_hasil ?></td>
                </tr>
                <?php } ?>
            	</table>
                <?php } 
				else echo "";
				?>
				</td>
                </tr>
                 <li><span class="label" style="width: 400px;">Produksi Bahan Galian </span>:<span class="field"></span></li>
				<tr><td colspan="3">
                <?php if(count($penduduk_produksi_bahan_galian) != 0) { ?>
                <table border="1"  style="font-size:12px;margin-bottom:20px" width="100%"  cellspacing="0">
                <tr>
                    <th width="200px">Nama Bahan Galian</th>
                    <th width="80px">Produksi/th</th>
                    <th width="80px">Satuan</th>
                    <th width="80px">Milik Adat</th>
                    <th width="80px">Milik Perorangan</th>
                    <th width="250px">Pemasaran Hasil</th>
                </tr>
                <?php foreach($penduduk_produksi_bahan_galian as $val) { ?>
                <tr>
                	
                    <td valign="top"><?php echo $val->bahan_galian ?></td>
                    <td valign="top"><?php echo $val->hasil_bahan_galian ?></td>
                    <td valign="top"><?php echo $val->satuan ?></td>
                    <td valign="top"><?php echo ($val->milik_adat) == 1 ?"Ya":"Tidak" ?></td>
                    <td valign="top"><?php echo ($val->milik_perorangan) == 1 ?"Ya":"Tidak" ?></td>
                    <td valign="top"><?php echo $val->pemasaran_hasil ?></td>
                </tr>
                <?php } ?>
            	</table>
                <?php } 
				else echo "";
				?>
               </td></tr>
                 <li><span class="label" style="width: 400px;">Sumber Air Minum yang Digunakan Anggota Keluarga </span>:<span class="field"> <?php echo isset($sumber_air)?$sumber_air:"" ?></span></li>
                 <li><span class="label" style="width: 400px;">Kualitas Air Minum yang Digunakan Anggota Keluarga </span>:<span class="field"> <?php echo isset($kualitas_air)?$kualitas_air:"" ?></span></li>
                 <li><span class="label" style="width: 400px;">Pemanfaatan Danau/Sungai/Waduk/Situ/Mata air oleh Keluarga </span>:<span class="field">
                <?php 
				foreach($penduduk_pemanfaatan_danau as $val)
				{
					echo $val;
					echo "<br>";
				}
				?>
                </span></li>
                 <li><span class="label" style="width: 400px;">Lembaga Pemerintahan yang Diikuti Anggota Keluarga </span>:<span class="field"> <?php echo isset($lembaga_diikuti)?$lembaga_diikuti:"" ?></span></li>
                 <li><span class="label" style="width: 400px;">Lembaga Kemasyarakatan yang Diikuti Anggota Keluarga </span>:<span class="field"> <?php echo isset($lembaga_kemasyarakatan)?$lembaga_kemasyarakatan:"" ?></span></li>
                 <li><span class="label" style="width: 400px;">Lembaga Politik yang Diikuti Anggota Keluarga </span>:<span class="field"> <?php echo isset($partai_politik)?$partai_politik:"" ?></span></li>
                 <li><span class="label" style="width: 400px;">Lembaga Politik yang Diikuti Anggota Keluarga </span>:<span class="field"> <?php echo isset($lembaga_politik)?$lembaga_politik:"" ?></span></li>
                 <li><span class="label" style="width: 400px;">Lembaga Ekonomi yang Dimiliki oleh Keluarga </span>:<span class="field">
                <?php if(isset($penduduk_lembaga_ekonomi)){
					foreach($penduduk_lembaga_ekonomi as $val){
						echo $val;
						echo "<br>";
					}
				}
				else{ echo ""; }
				?>
                </span></li>
                 <li><span class="label" style="width: 400px;">Lembaga Pendidikan yang Dimiliki oleh Keluarga </span>:<span class="field">
                <?php if(isset($penduduk_lembaga_pendidikan)){
					foreach($penduduk_lembaga_pendidikan as $val){
						echo $val;
						echo "<br>";
					}
				}
				else{ echo ""; }
				?>
                </span></li>
                 <li><span class="label" style="width: 400px;">Penguasaan Aset Tanah Oleh Keluarga </span>:<span class="field"><?php echo isset($aset_tanah)?$aset_tanah:"" ?></span></li>
                 <li><span class="label" style="width: 400px;">Aset Transportasi Umum yang Dimiliki </span>:<span class="field">
				<?php if(isset($penduduk_aset_transportasi)){
					foreach($penduduk_aset_transportasi as $val){
						echo $val;
						echo "<br>";
					}
				}
				else{ echo ""; }
				?></span></li>
                 <li><span class="label" style="width: 400px;">Aset Sarana Produksi yang Dimiliki </span>:<span class="field">
                <?php if(isset($penduduk_aset_produksi)){
					foreach($penduduk_aset_produksi as $val){
						echo $val;
						echo "<br>";
					}
				}
				else{ echo ""; }
				?>
                </span></li>
                 <li><span class="label" style="width: 400px;">Aset Perumahan </span>:<span class="field">
                 <?php if(isset($penduduk_aset_perumahan)){
					foreach($penduduk_aset_perumahan as $val){
						echo $val;
						echo "<br>";
					}
				}
				else{ echo ""; }
				?>
                </span></li>
                 <li><span class="label" style="width: 400px;">Aset Lainnya </span>:<span class="field">
                <?php if(isset($penduduk_aset_lainnya)){
					foreach($penduduk_aset_lainnya as $val){
						echo $val;
						echo "<br>";
					}
				}
				else{ echo ""; }
				?>
                </span></li>
                 <li><span class="label" style="width: 400px;">Kualitas Ibu Hamil dalam Keluarga </span>:<span class="field">
                  <?php if(isset($penduduk_kualitas_hamil)){
					foreach($penduduk_kualitas_hamil as $val){
						echo $val;
						echo "<br>";
					}
				}
				else{ echo ""; }
				?>
                </span></li>
                 <li><span class="label" style="width: 400px;">Kualitas Bayi dalam Keluarga </span>:<span class="field">
                  <?php if(count($penduduk_kualitas_bayi) != 0){
					foreach($penduduk_kualitas_bayi as $val){
						echo $val;
						echo "<br>";
					}
				}
				else{ echo ""; }
				?>
                </span></li>
                 <li><span class="label" style="width: 400px;">Kualitas Persalinan </span>:<span class="field">
                <?php if(count($penduduk_kualitas_persalinan) != 0){
					foreach($penduduk_kualitas_persalinan as $val){
						echo $val;
						echo "<br>";
					}
				}
				else{ echo ""; }
				?>
                </span></li>
                 <li><span class="label" style="width: 400px;">Cakupan Immunisasi </span>:<span class="field">
                <?php if(count($penduduk_cakupan_immunisasi) != 0){
					foreach($penduduk_cakupan_immunisasi as $val){
						echo $val;
						echo "<br>";
					}
				}
				else{ echo ""; }
				?>
                </span></li>
                 <li><span class="label" style="width: 400px;">Penderita Sakit dan Kelainan dalam Keluarga </span>:<span class="field">
                 <?php if(count($penduduk_penderita_sakit) != 0){
					foreach($penduduk_penderita_sakit as $val){
						echo $val;
						echo "<br>";
					}
				}
				else{ echo ""; }
				?>
                </span></li>
                 <li><span class="label" style="width: 400px;">Perilaku Hidup Bersih dan Sehat </span>:<span class="field"> <?php echo !empty($hidup_sehat)?$hidup_sehat:"" ?></span></li>
                 <li><span class="label" style="width: 400px;">Pola Makan Keluarga </span>:<span class="field"> <?php echo !empty($pola_makan)?$pola_makan:"" ?></span></li>
                 <li><span class="label" style="width: 400px;">Kebiasaan Berobat Bila Sakit dalam Keluarga </span>:<span class="field"> <?php echo !empty($kebiasaan_berobat)?$kebiasaan_berobat:"" ?></span></li>
                 <li><span class="label" style="width: 400px;">Status Gizi Balita dalam Keluarga </span>:<span class="field"> <?php echo !empty($status_gizi)?$status_gizi:"" ?></span></li>
                 <li><span class="label" style="width: 400px;">Jenis Penyakit yang Diderita Anggota Keluarga </span>:<span class="field">
                 <?php if(count($penduduk_jenis_penyakit) != 0){
					foreach($penduduk_jenis_penyakit as $val){
						echo $val;
						echo "<br>";
					}
				}
				else{ echo ""; }
				?>
                </span></li>
                 <li><span class="label" style="width: 400px;">Kerukunan </span>:<span class="field">
                  <?php if(count($penduduk_kerukunan) != 0){
					foreach($penduduk_kerukunan as $val){
						echo $val;
						echo "<br>";
					}
				}
				else{ echo ""; }
				?>
                </span></li>
                 <li><span class="label" style="width: 400px;">Perkelahian </span>:<span class="field">
                <?php if(count($penduduk_perkelahian) != 0){
					foreach($penduduk_perkelahian as $val){
						echo $val;
						echo "<br>";
					}
				}
				else{ echo ""; }
				?>
                </span></li>
                 <li><span class="label" style="width: 400px;">Pencurian </span>:<span class="field">
                <?php if(count($penduduk_pencurian) != 0){
					foreach($penduduk_pencurian as $val){
						echo $val;
						echo "<br>";
					}
				}
				else{ echo ""; }
				?>
                </span></li>
                 <li><span class="label" style="width: 400px;">Penjarahan </span>:<span class="field">
                <?php if(count($penduduk_penjarahan) != 0){
					foreach($penduduk_penjarahan as $val){
						echo $val;
						echo "<br>";
					}
				}
				else{ echo ""; }
				?>
                </span></li>
                 <li><span class="label" style="width: 400px;">Perjudian </span>:<span class="field">
                <?php if(count($penduduk_perjudian) != 0){
					foreach($penduduk_perjudian as $val){
						echo $val;
						echo "<br>";
					}
				}
				else{ echo ""; }
				?>
                </span></li>
                 <li><span class="label" style="width: 400px;">Pemakai Miras dan Narkoba </span>:<span class="field">
                <?php if(count($penduduk_miras) != 0){
					foreach($penduduk_miras as $val){
						echo $val;
						echo "<br>";
					}
				}
				else{ echo ""; }
				?>
                </span></li>
                 <li><span class="label" style="width: 400px;">Pembunuhan </span>:<span class="field">
                <?php if(count($penduduk_pembunuhan) != 0){
					foreach($penduduk_pembunuhan as $val){
						echo $val;
						echo "<br>";
					}
				}
				else{ echo ""; }
				?>
                </span></li>
                 <li><span class="label" style="width: 400px;">Penculikan </span>:<span class="field">
                <?php if(count($penduduk_penculikan) != 0){
					foreach($penduduk_penculikan as $val){
						echo $val;
						echo "<br>";
					}
				}
				else{ echo ""; }
				?>
                </span></li>
                 <li><span class="label" style="width: 400px;">Kejahatan Seksual </span>:<span class="field">
                <?php if(count($penduduk_kejahatan_seksual) != 0){
					foreach($penduduk_kejahatan_seksual as $val){
						echo $val;
						echo "<br>";
					}
				}
				else{ echo ""; }
				?>
                </span></li>
                 <li><span class="label" style="width: 400px;">Kekerasan dalam Keluarga / Rumah tangga </span>:<span class="field">
                <?php if(count($penduduk_kekerasan_rumah) != 0){
					foreach($penduduk_kekerasan_rumah as $val){
						echo $val;
						echo "<br>";
					}
				}
				else{ echo ""; }
				?>
                </span></li>
                 <li><span class="label" style="width: 400px;">Kedudukan Anggota Keluarga sebagai Wajib Pajak dan Retrebusi </span>:<span class="field">
                   <?php if(count($penduduk_kedudukan_pajak) != 0){
					foreach($penduduk_kedudukan_pajak as $val){
						echo $val;
						echo "<br>";
					}
				}
				else{ echo ""; }
				?>
                </span></li>
                 <li><span class="label" style="width: 400px;">Masalah Kesejahteraan Keluarga </span>:<span class="field">
                 <?php if(count($penduduk_kesejahteraan_kel) != 0){
					foreach($penduduk_kesejahteraan_kel as $val){
						echo $val;
						echo "<br>";
					}
				}
				else{ echo ""; }
				?>
                </span></li>
            </ol>
        </div>
        <!-- KONTEN FOOTER TANDA TANGAN lurah 1 -->
        <div class="content" style="font-size: 13px; line-height: 22px;">
            <div class="ttd-camat">
                <div class="tgl-surat">Yang Bersangkutan</div>
                <div class="jabatan"><br /></div>
                <div class="nama-lurah"><u><?php echo $nama ?></u></div>
            </div>
            <div class="ttd-single-wrap">
                <div class="tgl-surat"><?php echo $kota; ?>, <?php echo date("d-m-Y"); ?></div>
                <div class="jabatan">Camat <?php echo $kecamatan; ?></div>
                <div class="nama-lurah"> <?php echo $this->cm->desa->nama_camat; ?></div>
            </div>
            <div class="clear"></div>
        </div>
    </div>
</div>
</body>
</html>
