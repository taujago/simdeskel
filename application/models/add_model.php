<?php 
class add_model extends CI_Model {
	
	
	var $arr_bulan = array(1=>"Januari","Februari","Maret","April","Mei","Juni","Juli","Agustus","September","Oktober",
						   "November","Desember");
	
	function __construct(){
		parent::__construct();
	}

 function get_temp_nik(){
 	$xx = md5(date("dmYhis"));
 	$angka = preg_replace("/[^0-9]/","",$xx);
 	return "000-".substr($angka, 0,10);
 }


function first_day($bulan,$tahun) { 
	return "$tahun-$bulan-1";
}
function last_date($bulan,$tahun) {
	$arr_jml_hari = 
	array(1=>31,2=>29,3=>31,4=>30,5=>31,6=>30,
		7=>31,8=>31,9=>30,10=>31,11=>30,12=>31);
	return "$tahun-$bulan-".$arr_jml_hari[$bulan];
}



	function umur($tanggal) {
		
		$tz  = new DateTimeZone('Asia/Jakarta');
		$age = DateTime::createFromFormat('d-m-Y', $tanggal, $tz)
     	->diff(new DateTime('now', $tz))
     	->y;
		//echo $tanggal;
		//exit;
   		//echo "umur gue ". $age;
     	return $age;
	}

	function jk($jk){

		$jk  = strtoupper($jk);
		$arr = array("L"=>"Laki - laki ","P"=>"Perempuan");
		return isset($arr[$jk])?$arr[$jk]:"";
	}

	function hari($tgl) {
		// format tanggal haru Y-m-d
		$tgl = str_replace("-", "/", $tgl);
		$tgl = strtotime($tgl);
		$hari = date("l",$tgl);
		$arr_hari = array("Sunday"=>"Minggu",
						   "Monday" => "Senin",
						   "Tuesday" => "Selasa",
						   "Wednesday" => "Rabu",
						   "Thursday"  => "Kamis",
						   "Friday" => "Jum'at",
						   "Saturday" => "Sabtu"	);

		return $arr_hari[$hari];
	}

	function no_kk($id_penduduk) {
		$this->db->where("id_penduduk",$id_penduduk);
		$this->db->limit("1");
		$res = $this->db->get("kk_anggota");
		//echo $this->db->last_query();
		if($res->num_rows() == 0) {
			return "-";
		}
		else { 
		$data = $res->row();
		return $data->no_kk;
		}
	}

	function get_nik($id_penduduk){
		$this->db->where("id_penduduk",$id_penduduk);
		$res = $this->db->get("penduduk");
		// if(!$res){
		// 	echo mysql_error();
		// }
		// echo $this->db->last_query();
		$data = $res->row();
		return $data->nik;
	}

	function get_nama($id_penduduk){
		$this->db->where("id_penduduk",$id_penduduk);
		$res = $this->db->get("penduduk");
		$data = $res->row();
		return $data->nama;
	}

	function get_penduduk_detail($id_penduduk) {
		$this->db->where("id_penduduk",$id_penduduk);
		$res = $this->db->get("penduduk");
		return $res->row();		 
	}
	
	
	function arr_triwulan(){
		$arr_triwulan = array( 1=>"Triwulan I ( Januari - Maret ) ",
						   4=>"Triwulan II ( April - Juni ) ",	
						   7=>"Triwulan III ( Juli - September ) ",	
						   10=>"Triwulan IV ( Oktober  - Desember ) ");
		return $arr_triwulan;
	}
	
	
	function arr_cetak_profil(){
		$data = array();
		$data[0]['title'] = "I. POTENSI SUMBER DAYA ALAM";
		$data[0]['title1'] = "<span style='position:relative;right:15px'>A. POTENSI UMUM</span><br>1.a. Batas Wilayah";
		$data[0][1] = "profil_batas_wilayah";
		$data[0][2] = "batas,200,Batas";
		$data[0][3] = "desa,200,Desa/Kelurahan";
		$data[0][4] = "kecamatan,200,Kecamatan";
		//////////
		$data[1]['title1'] = "1.b. Penetapan Batas dan Peta Wilayah";
		$data[1][1] = "v_profil_sda_batas_peta_wilayah";
		$data[1][2] = "penetapan_batas,200,Penetapan Batas";
		$data[1][3] = "hukum,200,Dasar Hukum";
		$data[1][4] = "peta_wilayah,200,Peta Wilayah";
		/////
		$data[2]['title1'] = "2. Luas wilayah menurut penggunaan";
		$data[2]['h'] = "t";
		$data[2][1] = "v_profil_sda_luas_wilayah";
		$data[2][2] = "luas_wilayah,300";
		$data[2][3] = "nilai,300,,c";
		///
		$data[3][1] = "v_profil_sda_tanah_sawah";
		$data[3]['border'] = "1";
		$data[3][2] = "tanah_sawah,300,<strong>TANAH SAWAH</strong>,l";
		$data[3][3] = "nilai,300,,c";
		////
		$data[4][1] = "v_profil_sda_tanah_kering";
		$data[4]['melekat'] = "1";
		$data[4]['border'] = "1";
		$data[4][2] = "tanah_kering,300,<strong>TANAH KERING</strong>,l";
		$data[4][3] = "nilai,300,,c";
		////
		$data[5][1] = "v_profil_sda_tanah_basah";
		$data[5]['melekat'] = "1";
		$data[5]['border'] = "1";
		$data[5][2] = "tanah_basah,300,<strong>TANAH BASAH</strong>,l";
		$data[5][3] = "nilai,300,,c";
		////
		$data[6][1] = "v_profil_sda_tanah_perkebunan";
		$data[6]['melekat'] = "1";
		$data[6]['border'] = "1";
		$data[6][2] = "tanah_perkebunan,300,<strong>TANAH PEKEBUNAN</strong>,l";
		$data[6][3] = "nilai,300,,c";
		////
		$data[7][1] = "v_profil_sda_tanah_fasilitas_umum";
		$data[7]['melekat'] = "1";
		$data[7]['border'] = "1";
		$data[7][2] = "tanah_fasilitas_umum,300,<strong>TANAH FASILITAS UMUM</strong>,l";
		$data[7][3] = "nilai,300,,c";
		////
		$data[8][1] = "v_profil_sda_tanah_hutan";
		$data[8]['melekat'] = "1";
		$data[8][2] = "tanah_hutan,300,<strong>TANAH HUTAN</strong>,l";
		$data[8][3] = "nilai,300,,c";
		////
		$data[9]['title1'] = "3. Iklim";
		$data[9]['h'] = "t";
		$data[9][1] = "v_profil_sda_iklim";
		$data[9][2] = "iklim,300";
		$data[9][3] = "nilai,300,,c";
		////
		$data[10]['title1'] = "4. Jenis dan kesuburan tanah";
		$data[10]['h'] = "t";
		$data[10]['border'] = "1";
		$data[10][1] = "v_profil_sda_jenis_kesuburan_tanah";
		$data[10][2] = "jenis_kesuburan_tanah,300";
		$data[10][3] = "nilai,300,,c";
		////
		$data[11]['melekat'] = "1";
		$data[11][1] = "v_profil_sda_tingkat_erosi";
		$data[11][2] = "tingkat_erosi,300,Tingkat erosi tanah,l";
		$data[11][4] = "nilai,300,,c";
		///
		$data[12]['title1'] = "5. Topografi";
		$data[12]['border'] = "1";
		$data[12][1] = "v_profil_sda_topografi";
		$data[12][2] = "topografi,300,<strong>Bentangan wilayah</strong>,l";
		$data[12][3] = "pernyataan,150,,c";
		$data[12][4] = "nilai,150,,c";
		////
		$data[13]['melekat'] = "1";
		$data[13]['border'] = "1";
		$data[13][1] = "v_profil_sda_letak";
		$data[13][2] = "letak,300,<strong>Letak</strong>,l";
		$data[13][3] = "pernyataan,150,,c";
		$data[13][4] = "nilai,150,,c";
		////
		$data[14]['melekat'] = "1";
		$data[14][1] = "v_profil_sda_orbitasi";
		$data[14][2] = "orbitasi,300,<strong>Orbitasi</strong>,l";
		$data[14][3] = "nilai,303,,c";
		////
		$data[15]['title1'] = "B. PERTANIAN<br>B.1. TANAMAN PANGAN<br>1. Pemilikan lahan pertanian tanaman pangan";
		$data[15]['h'] = "t";
		$data[15][1] = "v_v_profil_sda_pemilikan_lahan_pertanian";
		$data[15][2] = "kepemilikan_lahan,300";
		$data[15][3] = "jumlah,300,,c";
		////
		$data[16]['title1'] = "2. Luas tanaman pangan menurut komoditas pada tahun ini";
		$data[16]['h'] = "t";
		$data[16][1] = "v_v_total_tanaman_pangan";
		$data[16][2] = "produksi_tanaman_pangan,300";
		$data[16][3] = "lahan,150,,c";
		$data[16][4] = "hasil,150,,c";
		////
		$data[17]['title1'] = "3. Jenis komoditas buah-buahan yang dibudidayakan<br>A. Kepemilikan Lahan Tanaman Buah-buahan";
		$data[17]['h'] = "t";
		$data[17][1] = "v_profil_sda_kepemilikan_buah";
		$data[17][2] = "kepemilikan_lahan,300";
		$data[17][3] = "hasil,300,,c";
		////
		$data[18]['title1'] = "B. Hasil Tanaman dan Luas Tanaman Buah-buahan";
		$data[18]['h'] = "t";
		$data[18][1] = "v_v_total_tanaman_buah";
		$data[18][2] = "produksi_tanaman_buah,300";
		$data[18][3] = "lahan,150,,c";
		$data[18][4] = "hasil,150,,c";
		////
		$data[19]['title1'] = "4. Pemasaran Hasil Tanaman Pangan dan Tanaman Buah-buahan";
		$data[19]['h'] = "t";
		$data[19][1] = "v_profil_sda_pemasaran_hasil_buah";
		$data[19][2] = "pemasaran_hasil,300";
		$data[19][3] = "keterangan,300,,c";
		////
		$data[20]['title1'] = "B.2 TANAMAN APOTIK HIDUP DAN SEJENISNYA";
		$data[20]['h'] = "t";
		$data[20][1] = "v_v_total_tanaman_obat";
		$data[20][2] = "produksi_tanaman_obat,300";
		$data[20][3] = "lahan,150,,c";
		$data[20][4] = "hasil,150,,c";
		////
		$data[21]['title1'] = "C. PERKEBUNAN<br>1. Pemilikan Lahan Perkebunan";
		$data[21]['h'] = "t";
		$data[21][1] = "v_v_profil_sda_kepemilikan_perkebunan";
		$data[21][2] = "perkebunan,300";
		$data[21][3] = "total,300,,c";
		////
		$data[22]['title1'] = "2. Luas dan hasil perkebunan menurut komoditas";
		$data[22]['merge'] = "<tr><th class='thin' rowspan='2'>Jenis</th><th colspan='2' class='thin'>Swasta/Negara</th><th colspan='2' class='thin'>Rakyat</th></tr>";
		$data[22][1] = "v_profil_sda_luas_hasil_perkebunan";
		$data[22][2] = "produksi_perkebunan,120,,,,,skip";
		$data[22][3] = "luas_swasta,120,Luas (ha),c";
		$data[22][4] = "hasil_swasta,120, Hasil (kw/ha),c";
		$data[22][5] = "luas_rakyat,120,Luas (ha),c";
		$data[22][6] = "hasil_rakyat,120,Hasil (kw/ha),c";
		////
		$data[23]['title1'] = "3. Pemasaran Hasil Perkebunan";
		$data[23]['h'] = "t";
		$data[23][1] = "v_pemasaran_hasil_perkebunan";
		$data[23][2] = "pemasaran_hasil,300";
		$data[23][3] = "keterangan,300,,c";
		////
		$data[24]['title1'] = "D. KEHUTANAN<br>1. Luas Lahan Menurut Pemilikan";
		$data[24]['h'] = "t";
		$data[24][1] = "v_profil_sda_luas_lahan_kehutanan";
		$data[24][2] = "luas_lahan,300";
		$data[24][3] = "nilai,300,,c";
		////
		$data[24]['title1'] = "2. Hasil Hutan";
		$data[24]['h'] = "t";
		$data[24][1] = "v_v_profil_sda_hasil_hutan";
		$data[24][2] = "produksi_hutan,300";
		$data[24][3] = "hasil,300,,c";
		////
		$data[26]['title1'] = "3. Kondisi Hutan";
		$data[26][1] = "v_v_profil_sda_kondisi_hutan";
		$data[26][2] = "kondisi_hutan,150,Kondisi Hutan";
		$data[26][3] = "luas_baik,150,Baik,c";
		$data[26][4] = "Luas_rusak,150,Rusak,c";
		$data[26][5] = "total,150,Total,c";
		////
		$data[27]['title1'] = "4. Dampak yang Timbul dari Pengolahan Hutan";
		$data[27]['h'] = "t";
		$data[27][1] = "v_profil_sda_dampak_pengolahan_hutan";
		$data[27][2] = "dampak,300";
		$data[27][3] = "ket,300,,c";
		////
		$data[28]['title1'] = "5. Mekanisme Pemasaran Hasil Hutan";
		$data[28]['h'] = "t";
		$data[28][1] = "v_pemasaran_hasil_hutan";
		$data[28][2] = "pemasaran_hasil,300";
		$data[28][3] = "keterangan,300,,c";
		////
		$data[29]['title1'] = "E. PETERNAKAN<br>1. Jenis populasi ternak";
		$data[29][1] = "v_v_total_produksi_ternak";
		$data[29][2] = "kepemilikan_ternak,200,Jenis ternak";
		$data[29][3] = "total_keluarga,200,Jumlah Pemilik,c";
		$data[29][4] = "hasil,200,Perkiraan Jumlah Populasi,c";
		////
		$data[30]['title1'] = "2. Produksi Peternakan";
		$data[30]['h'] = "t";
		$data[30][1] = "v_v_total_pengolahan_ternak";
		$data[30][2] = "pengolahan_ternak,300";
		$data[30][3] = "hasil,300,,c";
		////nama tabel,width,title,center atau tidak,kata yang disisipkan
		$data[31]['title1'] = "3. Ketersediaan Hijauan Pakan Ternak";
		$data[31]['h'] = "t";
		$data[31][1] = "v_v_profil_sda_pakan_ternak";
		$data[31][2] = "pakan_ternak,300";
		$data[31][3] = "hasil,300,,c";
		///
		$data[32]['title1'] = "4. Pemilik Usaha Pengolahan Hasil Ternak";
		$data[32]['h'] = "t";
		$data[32][1] = "v_pemilik_usaha_pengolahan_ternak";
		$data[32][2] = "pengolahan_ternak,300";
		$data[32][3] = "hasil,300,,c, Orang";
		////nama tabel,width,title,center(c) atau left(l),kata yang disisipkan
		$data[33]['title1'] = "5. Pemasaran Hasil Ternak";
		$data[33]['h'] = "t";
		$data[33][1] = "v_pemasaran_hasil_ternak";
		$data[33][2] = "pemasaran_hasil,300";
		$data[33][3] = "keterangan,300,,c";
		////nama tabel,width,title,center(c) atau left(l),kata yang disisipkan
		$data[34]['title1'] = "6. Ketersediaan lahan pemeliharaan ternak/padang penggembalaan";
		$data[34]['h'] = "t";
		$data[34][1] = "profil_sda_ketersediaan_lahan_ternak";
		$data[34][2] = "ketersediaan_lahan_ternak,300";
		$data[34][3] = "nilai,300,,c, ha";
		////nama tabel,width,title,center(c) atau left(l),kata yang disisipkan
		$data[35]['title1'] = "F. PERIKANAN<br>1. Jenis dan alat produksi budidaya ikan laut dan payau";
		$data[35]['h'] = "t";
		$data[35][1] = "v_profil_sda_jenis_alat_produksi_ikan";
		$data[35][2] = "jenis_alat_produksi_ikan,200";
		$data[35][3] = "nilai1_teks,200,,c";
		$data[35][4] = "nilai2,200,,c, ton/th";
		////nama tabel,width,title,center(c) atau left(l),kata yang disisipkan
		$data[36]['title1'] = "2. Jenis dan sarana produksi budidaya ikan air tawar";
		$data[36]['h'] = "t";
		$data[36][1] = "v_profil_sda_jenis_sarana_produksi_ikan";
		$data[36][2] = "jenis_sarana_produksi_ikan,200";
		$data[36][3] = "nilai1_teks,200,,c";
		$data[36][4] = "nilai2,200,,c, ton/th";
		////nama tabel,width,title,center(c) atau left(l),kata yang disisipkan
		$data[37]['title1'] = "3. Jenis ikan dan produksi";
		$data[37]['h'] = "t";
		$data[37][1] = "v_penduduk_produksi_perikanan";
		$data[37][2] = "produksi_perikanan,300";
		$data[37][3] = "hasil,300,,c, ton/th";
		////nama tabel,width,title,center(c) atau left(l),kata yang disisipkan
		$data[38]['title1'] = "4. Pemasaran Hasil Perikanan";
		$data[38]['h'] = "t";
		$data[38][1] = "v_profil_sda_pemasaran_hasil_produksi_perikanan";
		$data[38][2] = "pemasaran_hasil,300";
		$data[38][3] = "keterangan,300,,c";
		////nama tabel,width,title,center(c) atau left(l),kata yang disisipkan
		$data[39]['title1'] = "G. BAHAN GALIAN<br>1. Jenis dan deposit bahan galian";
		$data[39]['h'] = "t";
		$data[39][1] = "v_profil_sda_jenis_deposit_bahan_galian";
		$data[39][2] = "bahan_galian,300";
		$data[39][3] = "keterangan,300,,c";
		////nama tabel,width,title,center(c) atau left(l),kata yang disisipkan
		$data[40]['title1'] = "2. Produksi bahan galian";
		$data[40]['h'] = "t";
		$data[40][1] = "v_profil_sda_produksi_bahan_galian";
		$data[40][2] = "bahan_galian,300";
		$data[40][3] = "produksi_teks,300,,c";
		////nama tabel,width,title,center(c) atau left(l),kata yang disisipkan
		$data[41]['title1'] = "3. Kepemilikan dan Penelolaan Bahan Galian";
		$data[41]['h'] = "t";
		$data[41][1] = "v_profil_sda_pengelolaan_bahan_galian";
		$data[41][2] = "bahan_galian,300";
		$data[41][3] = "ket,300,,c";
		////nama tabel,width,title,center(c) atau left(l),kata yang disisipkan
		$data[42]['title1'] = "4. Pemasaran Hasil Galian";
		$data[42]['h'] = "t";
		$data[42][1] = "v_profil_sda_pemasaran_hasil_bahan_galian";
		$data[42][2] = "pemasaran_hasil,300";
		$data[42][3] = "keterangan,300,,c";
		////nama tabel,width,title,center(c) atau left(l),kata yang disisipkan
		$data[43]['title1'] = "H. SUMBER DAYA AIR<br>1. Potensi Air dan Sumber Daya Air";
		$data[43]['h'] = "t";
		$data[43][1] = "v_v_profil_sda_potensi_air";
		$data[43][2] = "sumber_air,300";
		$data[43][3] = "ket,300";
		////nama tabel,width,title,center(c) atau left(l),kata yang disisipkan
		$data[44]['title1'] = "2. Sumber Air Bersih";
		$data[44][1] = "v_profil_sda_sumber_air";
		$data[44][2] = "sumber_air,150,Jenis";
		$data[44][3] = "jumlah,150,Jumlah<br>(Unit)";
		$data[44][4] = "pemanfaat,150,Pemanfaat<br>(KK)";
		$data[44][5] = "kondisi_teks,150,Kondisi<br>Baik/Rusak";
		////nama tabel,width,title,center(c) atau left(l),kata yang disisipkan
		$data[45]['title1'] = "3. Kualitas Air Minum";
		$data[45]['h'] = "t";
		$data[45][1] = "v_profil_sda_kualitas_air";
		$data[45][2] = "kualitas_teks,300";
		$data[45][3] = "ket_teks,300,,c";
		////nama tabel,width,title,center(c) atau left(l),kata yang disisipkan
		$data[46]['title1'] = "4. Sungai";
		$data[46]['h'] = "t";
		$data[46][1] = "v_v_profil_sda_sungai";
		$data[46][2] = "kondisi,300";
		$data[46][3] = "jumlah,300,,c";
		////nama tabel,width,title,center(c) atau left(l),kata yang disisipkan
		$data[47]['title1'] = "5. Rawa";
		$data[47]['h'] = "t";
		$data[47][1] = "v_v_profil_sda_rawa";
		$data[47][2] = "rawa,300";
		$data[47][3] = "jumlah,300,,c";
		////nama tabel,width,title,center(c) atau left(l),kata yang disisipkan
		$data[48]['title1'] = "6. Pemanfaatan dan kondisi danau/waduk/situ";
		$data[48]['h'] = "t";
		$data[48][1] = "v_v_profil_sda_luas_danau";
		$data[48][2] = "pemanfaatan,300";
		$data[48][3] = "ket,300,,c";
		////nama tabel,width,title,center(c) atau left(l),kata yang disisipkan
		$data[49]['title1'] = "7. Air Panas";
		$data[49]['merge'] = "<tr><th class='thin' rowspan='2'>Sumber</th><th class='thin' rowspan='2'>Jumlah Lokasi</th><th class='thin' rowspan='2'>Pemanfaatan<br>(wisata&#44;<br>pengobatan&#44;<br>Energi&#44; dll)</th><th class='thin' colspan='3' >Kepemilikan/Pengelolaan</th></tr>";
		$data[49][1] = "v_profil_sda_air_panas";
		$data[49][2] = "sumber,100,Sumber,,,,skip";
		$data[49][3] = "jumlah,100,Jumlah Lokasi,c,,,skip";
		$data[49][4] = "pemanfaatan_teks,100,,c,,,skip";
		$data[49][5] = "pemda_teks,100,Pemda,c";
		$data[49][6] = "swasta_teks,100,Swasta,c";
		$data[49][7] = "adat_teks,100,Adat/<br>Perorangan,c";
		////nama tabel,width,title,center(c) atau left(l),kata yang disisipkan,penambahan atribute,skip (header ingin di print atau tidak)
		$data[50]['title1'] = "I. KUALITAS UDARA";
		$data[50]['merge'] = "<tr><th class='thin' rowspan='2'>Sumber</th><th class='thin' rowspan='2'>Jumlah Lokasi<br>Sumber Pencemar</th><th class='thin' rowspan='2'>Polutan<br>Pencemar</th><th class='thin' rowspan='2'>Efek terhadap<br>Kesehatan<br>(gangguan penglihatan/<br>kabut&#44; ISPA&#44;<br>dll)</th><th class='thin' colspan='3' >Kepemilikan</th></tr>";
		$data[50][1] = "v_profil_sda_kualitas_udara";
		$data[50][2] = "sumber,85,Sumber,,,,skip";
		$data[50][3] = "jumlah,85,Jumlah Lokasi,c,,,skip";
		$data[50][4] = "polutan,85,,c,,,skip";
		$data[50][5] = "efek_kesehatan_teks,90,,c,,,skip";
		$data[50][6] = "pemda_teks,85,Pemda,c";
		$data[50][7] = "swasta_teks,85,Swasta,c";
		$data[50][8] = "perorangan_teks,85,Perorangan,c";
		////nama tabel,width,title,center(c) atau left(l),kata yang disisipkan,penambahan atribute,skip (header ingin di print atau tidak)
		$data[51]['title1'] = "J. KEBISINGAN";
		$data[51][1] = "v_profil_sda_kebisingan";
		$data[51][2] = "tingkat,150,Tingkat Kebisingan";
		$data[51][3] = "ekses_teks,150,Ekses dampak<br>kebisingan,c";
		$data[51][4] = "sumber,150,Sumber kebisingan<br>(kendaraan <br>bermotor&#44; Kereta <br>api&#44; Pelabuhan&#44;<br>Airport&#44; Pabrik&#44; dll)";
		$data[51][5] = "efek,150,Efek<br>Terhadap<br>Penduduk,c";
		////
		$data[52]['title1'] = "K. RUANG PUBLIK/TAMAN";
		$data[52][1] = "v_profil_sda_ruang_publik";
		$data[52][2] = "ruang_publik,150,Ruang publik/<br>Taman";
		$data[52][3] = "keberadaan_teks,150,Keberadaan,c";
		$data[52][4] = "luas,150,Luas,c, M&#178;";
		$data[52][5] = "tingkat_teks,150,Tingkat<br>Pemanfaatan<br>(Aktif/Pasif),c";
		////nama tabel,width,title,center(c) atau left(l),kata yang disisipkan,penambahan atribute,skip (header ingin di print atau tidak)
		$data[53]['title1'] = "I. POTENSI WISATA";
		$data[53][1] = "v_profil_sda_potensi_wisata";
		$data[53][2] = "lokasi,150,Lokasi/Tempat<br>Area Wisata";
		$data[53][3] = "keberadaan_teks,150,Keberadaan,c";
		$data[53][4] = "luas,150,Luas,c, M&#178;";
		$data[53][5] = "tingkat_teks,150,Tingkat<br>Pemanfaatan<br>(Aktif/Pasif),c";
		///
		$data[54]['title1'] = "II. POTENSI SUMBER DAYA MANUSIA";
		$data[54]['h'] = "y";
		$data[54][1] = "v_profil_sdm_jumlah";
		$data[54][2] = "jumlah,400";
		$data[54][3] = "data,205";
		////nama tabel,width,title,center(c) atau left(l),kata yang disisipkan,penambahan atribute,skip (header ingin di print atau tidak)
		//jumlah sdm
		$data[55]['title1'] = "B. USIA";
		$data[55][1] = "v_v_profil_sdm_usia";
		$data[55][2] = "usia,200,Usia";
		$data[55][3] = "lk,200,Laki-Laki,c";
		$data[55][4] = "pr,200,Perempuan,c";
		///
		$data[56]['title1'] = "C. PENDIDIKAN";
		$data[56][1] = "v_v_pendidikan_umur";
		$data[56][2] = "teks,200,Usia";
		$data[56][3] = "lk,200,Laki-Laki,c";
		$data[56][4] = "pr,200,Perempuan,c";
		////nama tabel,width,title,center(c) atau left(l),kata yang disisipkan,penambahan atribute,skip (header ingin di print atau tidak)
		///pendidikan sdm
		$data[57]['title1'] = "D. MATA PENCAHARIAN POKOK";
		$data[57][1] = "v_profil_sdm_pencaharian_pokok";
		$data[57][2] = "pekerjaan,200,Jenis Pekerjaan";
		$data[57][3] = "lk,200,Laki-Laki,c, orang";
		$data[57][4] = "pr,200,Perempuan,c, orang";
		$data[58]['h'] = "t";
		$data[58]['melekat'] = "1";
		$data[58][1] = "v_v_profil_sdm_pencaharian_pokok";
		$data[58][2] = "usia,200,Usia";
		$data[58][3] = "jumlah,403,Laki-Laki,c";
		////nama tabel,width,title,center(c) atau left(l),kata yang disisipkan,penambahan atribute,skip (header ingin di print atau tidak)
		$data[59]['title1'] = "E. AGAMA/ALIRAN KEPERCAYAAN";
		$data[59][1] = "v_v_profil_sdm_agama";
		$data[59][2] = "agama,200,Agama";
		$data[59][3] = "lk,200,Laki-Laki,c";
		$data[59][4] = "pr,200,Perempuan,c";
		////nama tabel,width,title,center(c) atau left(l),kata yang disisipkan,penambahan atribute,skip (header ingin di print atau tidak)
		$data[60]['title1'] = "F. KEWARGANEGARAAN";
		$data[60][1] = "v_profil_sdm_kewarganegaraan";
		$data[60][2] = "warga,200";
		$data[60][3] = "lk,200,Laki-Laki,c";
		$data[60][4] = "pr,200,Perempuan,c";
		////nama tabel,width,title,center(c) atau left(l),kata yang disisipkan,penambahan atribute,skip (header ingin di print atau tidak)
		$data[61]['title1'] = "G. ETNIS";
		$data[61][1] = "v_v_profil_sdm_suku";
		$data[61][2] = "suku,200";
		$data[61][3] = "lk,200,Laki-Laki,c";
		$data[61][4] = "pr,200,Perempuan,c";
		////nama tabel,width,title,center(c) atau left(l),kata yang disisipkan,penambahan atribute,skip (header ingin di print atau tidak)
		$data[62]['title1'] = "H. CACAT MENTAL DAN FISIK";
		$data[62][1] = "v_v_profil_sdm_cacat_fisik";
		$data[62][2] = "cacat,200,Cacat Fisik,l";
		$data[62][3] = "lk,200,Laki-Laki,c";
		$data[62][4] = "pr,200,Perempuan,c";
		////nama tabel,width,title,center(c) atau left(l),kata yang disisipkan,penambahan atribute,skip (header ingin di print atau tidak)
		$data[63]['melekat'] = "1";
		$data[63][1] = "v_v_profil_sdm_cacat_mental";
		$data[63][2] = "cacat,200,Cacat Mental,l";
		$data[63][3] = "lk,200,,c";
		$data[63][4] = "pr,200,,c";
		////nama tabel,width,title,center(c) atau left(l),kata yang disisipkan,penambahan atribute,skip (header ingin di print atau tidak)
		$data[64]['title1'] = "I. TENAGA KERJA";
		$data[64][1] = "v_profil_sdm_tenaga_kerja";
		$data[64][2] = "tenaga_kerja,200,Tenaga Kerja";
		$data[64][3] = "lk,200,Laki-Laki,c";
		$data[64][4] = "pr,200,Perempuan,c";
		////nama tabel,width,title,center(c) atau left(l),kata yang disisipkan,penambahan atribute,skip (header ingin di print atau tidak)
		$data[65]['melekat'] = "1";
		$data[65]['h'] = "t";
		$data[65][1] = "v_total_profil_sdm_tenaga_kerja";
		$data[65][2] = "tenaga_kerja,200";
		$data[65][3] = "lk,403,,c";
		////nama tabel,width,title,center(c) atau left(l),kata yang disisipkan,penambahan atribute,skip (header ingin di print atau tidak)
		$data[66]['title'] = "III. POTENSI KELEMBAGAAN";
		$data[66]['title1'] = "A. LEMBAGA PEMERINTAHAN";
		$data[66]['merge'] = "<tr><th style='text-align:left' colspan='2'>PEMERINTAH DESA/KELURAHAN</th></tr>";
		$data[66]['border'] = "1";
		$data[66][1] = "v_v_profil_sdm_lembaga_pemerintah";
		$data[66][2] = "lembaga,250,,,,,skip";
		$data[66][3] = "ket,350,,,,,skip";
		////nama tabel,width,title,center(c) atau left(l),kata yang disisipkan,penambahan atribute,skip (header ingin di print atau tidak)
		$data[67]['melekat'] = "1";
		$data[67]['border'] = "1";
		$data[67][1] = "v_profil_sdm_tingkat_pendidikan";
		$data[67][2] = "aparat,250,Tingkat Pendidikan Aparat<br>Desa/Kelurahan,l";
		$data[67][3] = "tingkat_teks,350,SD&#44; SMP&#44; SMA&#44; Dimploma&#44; S1&#44;<br>Pascasarjana,l";
		////nama tabel,width,title,center(c) atau left(l),kata yang disisipkan,penambahan atribute,skip (header ingin di print atau tidak)
		$data[68]['merge'] = "<tr><th style='text-align:left' colspan='2'>BADAN PERMUSYAWARATAN DESA</th></tr>";
		$data[68]['melekat'] = "1";
		$data[68]['border'] = "1";
		$data[68]['h'] = "1";
		$data[68][1] = "v_profil_sdm_bpd";
		$data[68][2] = "teks,250";
		$data[68][3] = "ket,350";
		////nama tabel,width,title,center(c) atau left(l),kata yang disisipkan,penambahan atribute,skip (header ingin di print atau tidak)
		$data[69]['melekat'] = "1";
		$data[69][1] = "v_profil_sdm_tingkat_pendidikan_bpd";
		$data[69][2] = "aparat,250,Pendidikan Anggota BPD,l";
		$data[69][3] = "tingkat_teks,350,SD&#44; SMP&#44; SMA&#44; Dimploma&#44; S1&#44;<br>Pascasarjana,l";
		////nama tabel,width,title,center(c) atau left(l),kata yang disisipkan,penambahan atribute,skip (header ingin di print atau tidak)
		$data[70]['except'] = "v_profil_sdm_lembaga_kemasyarakatan";
		$data[71]['except'] = "v_profil_sdm_partai_politik";
		////
		$data[72]['title1'] = "D. LEMBAGA EKONOMI";
		$data[72]['border'] = "1";
		$data[72][1] = "v_profil_sdm_lembaga_ekonomi_desa";
		$data[72][2] = "lembaga_ekonomi,200,1. Lembaga Ekonomi&#44; dan<br>Unit Usaha Desa/Kelurahan,l";
		$data[72][3] = "jumlah,140,Jumlah/unit";
		$data[72][4] = "kegiatan,120,Jumlah<br>Kegiatan";
		$data[72][5] = "pengurus,140,Jumlah<br>Pengurus dan<br>Anggota";
		////
		$data[73]['melekat'] = "1";
		$data[73]['border'] = "1";
		$data[73][1] = "v_profil_sdm_lembaga_keuangan";
		$data[73][2] = "lembaga_keuangan,200,2. Jasa lembaga keuangan,l";
		$data[73][3] = "jumlah,140,Jumlah/unit";
		$data[73][4] = "kegiatan,120,Jumlah<br>Kegiatan";
		$data[73][5] = "pengurus,140,Jumlah<br>Pengurus";
		////
		$data[74]['melekat'] = "1";
		$data[74]['border'] = "1";
		$data[74][1] = "v_profil_sdm_industri_kecil";
		$data[74][2] = "industri,200,3. Industri Kecil dan<br>Menengah,l";
		$data[74][3] = "jumlah,140,Jumlah/unit";
		$data[74][4] = "kegiatan,120,Jumlah<br>Kegiatan";
		$data[74][5] = "pengurus,140,Jumlah<br>Pengurus";
		////
		$data[75]['except'] = "profil_sdm_jasa_pengangkutan";
		/////
		$data[76]['melekat'] = "1";
		$data[76]['border'] = "1";
		$data[76][1] = "profil_sdm_jasa_pengangkutan3";
		$data[76][2] = "pengangkutan,200,Angkutan Laut,l";
		$data[76][3] = "jumlah,140";
		$data[76][4] = "kapasitas,120";
		$data[76][5] = "tenaga_kerja,140";
		///
		$data[77]['melekat'] = "1";
		$data[77]['border'] = "1";
		$data[77][1] = "profil_sdm_jasa_pengangkutan4";
		$data[77][2] = "pengangkutan,200,Angkutan Udara,l";
		$data[77][3] = "jumlah,140";
		$data[77][4] = "kapasitas,120";
		$data[77][5] = "tenaga_kerja,140";
		/////
		$data[78]['melekat'] = "1";
		$data[78]['border'] = "1";
		$data[78][1] = "profil_sdm_jasa_pengangkutan5";
		$data[78][2] = "pengangkutan,200,Ekspedisi dan Pengiriman,l";
		$data[78][3] = "jumlah,140";
		$data[78][4] = "kapasitas,120";
		$data[78][5] = "tenaga_kerja,140";
		///
		$data[79]['border'] = "1";
		$data[79]['melekat'] = "1";
		$data[79][1] = "v_profil_sdm_perdagangan";
		$data[79][2] = "perdagangan,200,5. Usaha Jasa dan Perdagangan,l";
		$data[79][3] = "ket1,140,Jumlah";
		$data[79][4] = "ket2,120,Jenis produk yg<br>diperdagangkan<br>(umum&#44; sayuran&#44;<br>barang & jasa&#44;<br>tambang&#44; dll)";
		$data[79][5] = "ket3,140,Jumlah Tenaga<br>Kerja yang<br>terserap";
		///
		$data[80]['border'] = "1";
		$data[80]['melekat'] = "1";
		$data[80][1] = "profil_sdm_usaha_hiburan";
		$data[80][2] = "hiburan,200,6. Usaha Jasa Hiburan,l";
		$data[80][3] = "jumlah,140,,, unit";
		$data[80][4] = "jenis,120,,, jenis";
		$data[80][5] = "tenaga_kerja,140,,, orang";
		////
		$data[81]['border'] = "1";
		$data[81]['melekat'] = "1";
		$data[81][1] = "profil_sdm_usaha_gas";
		$data[81][2] = "gas,200,7. Usaha Jasa Gas&#44;<br>Listrik&#44;BBM dan Air,l";
		$data[81][3] = "jumlah,140,,, unit";
		$data[81][4] = "jenis,120,,, jenis";
		$data[81][5] = "tenaga_kerja,140,,, orang";
		////
		$data[82]['border'] = "1";
		$data[82]['melekat'] = "1";
		$data[82][1] = "profil_sdm_jasa_keterampilan";
		$data[82][2] = "keterampilan,200,8. Usaha Jasa<br>Keterampilan,l";
		$data[82][3] = "jumlah,140,Jumlah,, orang";
		$data[82][4] = "jenis,120,Jumlah Jenis<br>Produk yang<br>Diperdagangkan,, jenis";
		$data[82][5] = "tenaga_kerja,140,Jumlah Tenaga<br>Kerja yang<br>terserap,, orang";
		////
		$data[83]['border'] = "1";
		$data[83]['melekat'] = "1";
		$data[83]['merge'] = "<tr><th colspan='2' style='text-align:left'>9. Usaha Jasa Hukum dan Konsultasi</th></tr>";
		$data[83]['h'] = "1";
		$data[83][1] = "profil_sdm_jasa_hukum";
		$data[83][2] = "hukum,200";
		$data[83][3] = "jumlah,140,,, unit";
		$data[83][4] = "jenis,120,,, jenis";
		$data[83][5] = "tenaga_kerja,140,,, orang";
		/////
		$data[84]['border'] = "1";
		$data[84]['melekat'] = "1";
		$data[84]['merge'] = "<tr><th colspan='2' style='text-align:left'>10. Usaha Jasa Penginapan</th></tr>";
		$data[84]['h'] = "1";
		$data[84][1] = "profil_sdm_jasa_penginapan";
		$data[84][2] = "penginapan,200";
		$data[84][3] = "jumlah,140,,, unit";
		$data[84][4] = "jenis,120,,, jenis";
		$data[84][5] = "tenaga_kerja,140,,, orang";
		////
		$data[85]['merge'] = "<tr><th class='thin' rowspan='2'>Nama</th><th rowspan='2' class='thin' >Jumlah</th><th rowspan='2' class='thin' >Status</th><th colspan='3' class='thin'>Kepemilikan</th><th rowspan='2' class='thin' >Jumlah<br>Tenaga<br>Peng<br>ajar</th><th rowspan='2' class='thin' >Jumlah<br>Siswa<br>Maha<br>siswa</th></tr>";
		$data[85]['merge'] .= "<tr><th class='thin'>Peme<br>rintah</th><th class='thin'>Swasta</th><th class='thin'>Desa/<br>Kelura<br>han</th></tr>";
		$data[85]['title1'] = "E. LEMBAGA PENDIDIKAN<br>1. Pendidikan Formal";
		$data[85]['h'] = "1";
		$data[85][1] = "v_profil_sdm_pendidikan_formal";
		$data[85][2] = "pendidikan_formal,105,,,,,skip";
		$data[85][3] = "jumlah,65,,c,,,skip";
		$data[85][4] = "status_teks,70,,c,,,skip";
		$data[85][5] = "pemerintah_teks,70,,c,,,skip";
		$data[85][6] = "swasta_teks,70,,c,,,skip";
		$data[85][7] = "desa_teks,70,,c,,,skip";
		$data[85][8] = "pengajar,70,,c,,,skip";
		$data[85][9] = "siswa,70,,c,,,skip";
		/////
		$data[86]['except'] = 'v_profil_sdm_pendidikan_formal_keagamaan';
		///
		$data[87]['title1'] = "3. Pendidikan Non Formal/Kursus";
		$data[87][1] = "v_profil_sdm_pendidikan_nonformal";
		$data[87][2] = "pendidikan,130,Nama";
		$data[87][3] = "jumlah,70,Jumlah,c";
		$data[87][4] = "status_teks,100,Status<br>(Terdaftar&#44;<br>terakreditasi),c";
		$data[87][5] = "kepemilikan_teks,100,Kepemilikan<br>(Pemerintah&#44;<br>Yayasan&#44;dll),c";
		$data[87][6] = "pengajar,100,Jumlah<br>Tenaga<br>Pengajar,c";
		$data[87][7] = "siswa,100,Jumlah<br>siswa/<br>Mahasiswa,c";
		////
		$data[88]['title1'] = "F. LEMBAGA ADAT";
		$data[88]['merge'] = "<tr><th style='text-align:left' colspan='2' class='thin'>1. Keberadaan Lembaga Adat</th></tr>";
		$data[88]['h'] = "1";
		$data[88][1] = "v_profil_sdm_lembaga_adat";
		$data[88][3] = "adat,350,,l";
		$data[88][4] = "keterangan_teks,250,,c";
		////
		$data[89]['merge'] = "<tr><th style='text-align:left' colspan='2' class='thin'>2. Simbol Adat</th></tr>";
		$data[89]['h'] = "1";
		$data[89]['melekat'] = "1";
		$data[89][1] = "v_profil_sdm_simbol_adat";
		$data[89][3] = "adat,350,,l";
		$data[89][4] = "keterangan_teks,250,,c";
		////
		$data[90]['merge'] = "<tr><th style='text-align:left' colspan='2' class='thin'>3. Jenis Kegiatan Adat</th></tr>";
		$data[90]['h'] = "1";
		$data[90]['melekat'] = "1";
		$data[90][1] = "v_profil_sdm_jenis_kegiatan_adat";
		$data[90][3] = "adat,350,,l";
		$data[90][4] = "keterangan_teks,250,,c";
		////
		$data[91]['title1'] = "G. LEMBAGA KEAMANAN";
		$data[91]['merge'] = "<tr><th style='text-align:left' colspan='2' class='thin'>1. Hansip dan Linmas</th></tr>";
		$data[91]['h'] = "1";
		$data[91][1] = "v_v_profil_sdm_hansip";
		$data[91][3] = "hansip,350,,l";
		$data[91][4] = "ket,250,,c";
		////
		$data[92]['merge'] = "<tr><th style='text-align:left' colspan='2' class='thin'>2. Satpam Swakarsa</th></tr>";
		$data[92]['h'] = "1";
		$data[92]['melekat'] = "1";
		$data[92][1] = "v_v_profil_lembaga_keamanan";
		$data[92][3] = "satpam,350,,l";
		$data[92][4] = "ket,250,,c";
		////
		$data[93]['merge'] = "<tr><th style='text-align:left' colspan='2' class='thin'>3. Kerjasama Desa/Kelurahan dengan TNI - POLRI dalam bidang<br>TRANTIBLINMAS</th></tr>";
		$data[93]['h'] = "1";
		$data[93]['melekat'] = "1";
		$data[93][1] = "v_v_profil_sdm_tni";
		$data[93][3] = "kerjasama,350";
		$data[93][4] = "ket,250,,c";
		////
		$data[94]['except'] = 'v_profil_sdm_prasarana_darat';
		///
		$data[95]['title1'] = "2. Sarana Transportasi Darat";
		$data[95]['h'] = "1";
		$data[95][1] = "v_v_profil_sdm_transportasi_darat";
		$data[95][3] = "transportasi,350";
		$data[95][4] = "ket,250,,c";
		////
		$data[96]['title1'] = "3. Prasarana Transportasi Laut/Sungai";
		$data[96]['h'] = "1";
		$data[96][1] = "profil_sdm_transportasi_air";
		$data[96][3] = "transportasi,350";
		$data[96][4] = "jumlah,250,,c, unit";
		////
		$data[97]['title1'] = "4. Sarana Transportasi Sungai/Laut";
		$data[97]['h'] = "1";
		$data[97][1] = "v_v_profil_sdm_transportasi_sungai";
		$data[97][3] = "transportasi,350";
		$data[97][4] = "ket,250,,c";
		////
		$data[98]['title1'] = "5. Prasarana Transportasi Udara";
		$data[98]['h'] = "1";
		$data[98][1] = "v_v_profil_sdm_transportasi_udara";
		$data[98][3] = "prasarana,350";
		$data[98][4] = "ket,250,,c";
		////
		$data[99]['title1'] = "E. PRASARANA KOMUNIKASI DAN INFORMASI<br>1. Telepon";
		$data[99]['h'] = "1";
		$data[99][1] = "v_v_profil_sdm_telepon";
		$data[99][3] = "telepon,350";
		$data[99][4] = "ket,250,,c";
		////
		$data[100]['title1'] = "2. Kantor Pos";
		$data[100]['h'] = "1";
		$data[100][1] = "v_v_profil_sdm_kantor_pos";
		$data[100][3] = "kantor,350";
		$data[100][4] = "ket,250,,c";
		////
		$data[101]['title1'] = "3. Radio/TV";
		$data[101]['h'] = "1";
		$data[101][1] = "v_v_profil_sarana_tv";
		$data[101][3] = "radio,350";
		$data[101][4] = "ket,250,,c";
		////
		$data[102]['title1'] = "4. Koran/majalah/buletin";
		$data[102]['h'] = "1";
		$data[102][1] = "v_profil_sdm_majalah";
		$data[102][3] = "surat_kabar,350";
		$data[102][4] = "ket_teks,250,,c";
		////
		$data[103]['title1'] = "C. PRASARANA AIR BERSIH DAN SANITASI<br>1. Prasarana air bersih";
		$data[103]['h'] = "1";
		$data[103][1] = "profil_sdm_air_bersih";
		$data[103][3] = "prasarana,350";
		$data[103][4] = "jumlah,250,,c, unit";
		/////
		$data[104]['title1'] = "2. Sanitasi";
		$data[104]['h'] = "1";
		$data[104][1] = "v_v_profil_sarana_sanitasi";
		$data[104][3] = "sanitasi,350";
		$data[104][4] = "ket,250,,c";
		////
		$data[105]['title1'] = "D. PRASARANA DAN KONDISI IRIGASI<br>1. Prasarana Irigasi";
		$data[105]['h'] = "1";
		$data[105][1] = "v_v_profil_sdm_irigasi";
		$data[105][3] = "prasarana,350";
		$data[105][4] = "ket,250,,c";
		////
		$data[105]['title1'] = "2. Kondisi";
		$data[105]['h'] = "1";
		$data[105][1] = "v_v_profil_sdm_kondisi";
		$data[105][3] = "kondisi,350";
		$data[105][4] = "ket,250,,c";
		/////
		$data[105]['title1'] = "E. PRASARANA DAN SARANA PEMERINTAH<BR>1. Prasarana dan Sarana Pemerintahan Desa/Kelurahan";
		$data[105]['h'] = "1";
		$data[105][1] = "v_v_profil_sarana_desa";
		$data[105][3] = "gedung,350";
		$data[105][4] = "ket,250,,c";
		////
		$data[106]['melekat'] = "1";
		$data[106][1] = "v_v_profil_sarana_inventaris";
		$data[106][3] = "inventaris,350,Inventaris dan alat tulis kantor,l";
		$data[106][4] = "ket,250,,c";
		/////
		$data[107]['melekat'] = "1";
		$data[107][1] = "v_v_profil_sarana_administrasi";
		$data[107][3] = "administrasi,350,Administrasi Pemerintahan Desa/Kelurahan,l";
		$data[107][4] = "ket,250,,c";
		////
		$data[108]['title1'] = "2. Prasarana dan Sarana Badan Permusyawaratan Desa/BPD";
		$data[108]['h'] = "1";
		$data[108][1] = "v_v_profil_sarana_prasarana_bpd";
		$data[108][3] = "sarana,350";
		$data[108][4] = "ket,250,,c";
		////
		$data[109]['melekat'] = "1";
		$data[109][1] = "v_v_profil_sarana_inventaris_bpd";
		$data[109][3] = "inventaris,350,Inventaris dan alat tulis kantor,l";
		$data[109][4] = "ket,250,,c";
		////
		$data[110]['melekat'] = "1";
		$data[110][1] = "v_v_profil_sarana_bpd";
		$data[110][3] = "bpd,350,Administrasi BPD,l";
		$data[110][4] = "ket,250,,c";
		////
		$data[111]['except'] = "v_profil_sarana_lembaga_kemasyarakatan";
		///
		$data[115]['title1'] = "G. PRASARANA PERIBADATAN";
		$data[115][1] = "profil_sarana_peribadatan";
		$data[115]['h'] = "1";
		$data[115][2] = "prasarana,350";
		$data[115][3] = "jumlah,250,,c, buah";
		///
		$data[116]['title1'] = "H. PRASARANA OLAH RAGA";
		$data[116][1] = "v_v_profil_sarana_olah_raga";
		$data[116]['h'] = "1";
		$data[116][2] = "prasarana,350";
		$data[116][3] = "ket,250,,c";
		////
		$data[117]['title1'] = "I. PRASARANA DAN SARANA KESEHATAN<BR>1. Prasarana Kesehatan";
		$data[117][1] = "profil_sarana_prasarana_kesehatan";
		$data[117]['h'] = "1";
		$data[117][2] = "prasarana,350";
		$data[117][3] = "jumlah,250,,c, unit";
		///
		$data[118]['title1'] = "2. Sarana Kesehatan";
		$data[118][1] = "profil_sarana_kesehatan";
		$data[118]['h'] = "1";
		$data[118][2] = "sarana,350";
		$data[118][3] = "jumlah,250,,c, orang";
		///
		$data[119]['title1'] = "J. PRASARANA DAN SARANA PENDIDIKAN";
		$data[119][1] = "v_profil_sarana_pendidikan";
		$data[119]['h'] = "1";
		$data[119][2] = "prasarana,260";
		$data[119][3] = "ket1,170,,c, buah";
		$data[119][4] = "ket2,170,,c, buah";
		///
		$data[120]['title1'] = "K. PRASARANA ENERGI DAN PENERANGAN";
		$data[120][1] = "v_v_profil_sarana_penerbangan";
		$data[120]['h'] = "1";
		$data[120][2] = "prasarana,350";
		$data[120][3] = "ket,250,,c";
		////
		$data[121]['title1'] = "L. PRASARANA HIBURAN DAN WISATA";
		$data[121][1] = "profil_sarana_hiburan";
		$data[121]['h'] = "1";
		$data[121][2] = "prasarana,350";
		$data[121][3] = "jumlah,250,,c, buah";
		///
		$data[122]['title1'] = "M. PRASARANA DAN SARANA KEBERSIHAN";
		$data[122][1] = "v_v_profil_sarana_kebersihan";
		$data[122]['h'] = "1";
		$data[122][2] = "sarana,350";
		$data[122][3] = "ket,250,,c";
		return $data;
	}
	
	function arr_cetak_perkembangan()
	{
		$data = array();
		
		$data[8]['merge'] = "<tr><th style='text-align:left' class='thin'><center>Jumlah</center></th><th class='thin' colspan='2'><center font-weight='lighter'>Jenis Kelamin</center></th></tr>";
		$data[8]['title'] = 'I. PERKEMBANGAN KEPENDUDUKAN';
		$data[8]['title1'] = '<b>A. Jumlah Penduduk</b>';
		$data[8][1] = 'v_perkembangan_jumlah_penduduk';
		$data[8][2] = 'jumlah,300,,1';
		$data[8][3] = 'lk,150,Laki-laki';
		$data[8][4] = 'pr,150,Perempuan';
		////
		$data[9]['title1'] = '<b>B. Jumlah Keluarga</b>';
		$data[9][1] = 'v_perkembangan_jumlah_keluarga';
		$data[9][2] = 'jumlah,300,Jumlah,1';
		$data[9][3] = 'lk,120,KK Laki-laki';
		$data[9][4] = 'pr,120,KK Perempuan';
		$data[9][5] = 'total,120,Jumlah Total';
		////
		$data[10]['title'] = 'II. EKONOMI MASYARAKAT';
		$data[10]['title1'] = '<b>A. Pengangguran</b>';
		$data[10]['h'] = '1';
		$data[10][1] = 'perkembangan_pengangguran';
		$data[10][2] = 'pengangguran,450,,1';
		$data[10][3] = 'jumlah,150,,, orang';
		////
		$data[11]['title1'] = '<b>B. Kesejahteraan Keluarga</b>';
		$data[11]['h'] = '1';
		$data[11][1] = 'perkembangan_kesejahteraan_keluarga';
		$data[11][2] = 'ket,400,,1';
		$data[11][3] = 'jumlah,200,,, keluarga';
		///
		$data[12]['except'] = 'v_perkembangan_produk_item';
		///
		$data[13]['except'] = 'pendapatan_perkapita_sektor';
		////
		$data[14]['except'] = 'v_perkembangan_perkapita_struktur_pencaharian';
		/////
		$data[15]['title'] = 'VI. PENGUASAAN ASET EKONOMI MASYARAKAT';
		$data[15]['border'] = '1';
		$data[15][1] = 'perkembangan_penguasaan_aset_tanah';
		$data[15][2] = 'aset,400,A. ASET TANAH,l';
		$data[15][3] = 'jumlah,200,,, orang';
		////
		$data[16]['melekat'] = '1';
		$data[16]['border'] = '1';
		$data[16][1] = 'v_perkembangan_penguasaan_aset_transportasi';
		$data[16][2] = 'aset_transportasi,400,B. ASET SARANA TRANSPORTASI UMUM,l';
		$data[16][3] = 'orang,99,,, orang';
		$data[16][4] = 'jumlah,98,,, unit';
		////
		$data[17]['melekat'] = '1';
		$data[17][1] = 'v_perkembangan_aset_produksi';
		$data[17][2] = 'aset_produksi,400,C. ASET SARANA PRODUKSI,l';
		$data[17][3] = 'jumlah,200,,, orang';
		////
		$data[19]['title'] = 'VII. PEMILIKAN ASET EKONOMI LAINNYA';
		$data[19]['h'] = 'tidak';
		$data[19][1] = 'v_v_perkembangan_penguasaan_aset_lainnya';
		$data[19][2] = 'aset_lainnya,400';
		$data[19][3] = 'jumlah,200';
		////
		$data[20]['title'] = 'VIII. PENDIDIKAN MASYARAKAT';
		$data[20]['h'] = '1';
		$data[20][1] = 'perkembangan_pendidikan_penduduk';
		$data[20][2] = 'tingkat_pendidikan,400,A. Tingkat pendidikan penduduk,l';
		$data[20][3] = 'jumlah,200,,, orang';
		////
		$data[21]['title1'] = 'B. Wajib belajar 9 tahun';
		$data[21]['h'] = '1';
		$data[21][1] = 'perkembangan_wajib_belajar';
		$data[21][2] = 'ket,400';
		$data[21][3] = 'jumlah,200,,, Orang';
		////
		$data[22]['title1'] = 'C. Rasion Guru dan Murid';
		$data[22]['h'] = '1';
		$data[22][1] = 'perkembangan_rasio_guru';
		$data[22][2] = 'ket,400';
		$data[22][3] = 'jumlah,200,,, orang';
		////
		$data[23]['title1'] = 'D. Kelembagaan Pendidikan Masyarakat';
		$data[23]['h'] = '1';
		$data[23][1] = 'perkembangan_kelembagaan_pendidikan';
		$data[23][2] = 'ket,400';
		$data[23][3] = 'jumlah,200,,, orang';
		////
		$data[24]['title'] = 'IX. KESEHATAN MASYARAKAT';
		$data[24]['title1'] = 'A. Kualitas Ibu Hamil';
		$data[24]['h'] = '1';
		$data[24][1] = 'v_perkembangan_kesehatan_kualitas_hamil';
		$data[24][2] = 'kualitas_hamil,400';
		$data[24][3] = 'jumlah,200,,, orang';
		///
		$data[25][1] = 'v_perkembangan_kesehatan_kualitas_bayi';
		$data[25]['title1'] = 'B. Kualitas Bayi';
		$data[25]['h'] = '1';
		$data[25][2] = 'kualitas_bayi,400';
		$data[25][3] = 'jumlah,200,,, orang';
		////
		$data[26]['border'] = '1';
		$data[26]['title1'] = 'C. Kualitas Persalinan';
		$data[26][1] = 'v_perkembangan_tempat_persalinan';
		$data[26][2] = 'tempat_persalinan,400,Tempat Persalinan,l';
		$data[26][3] = 'jumlah,200,,, unit';
		////
		$data[27]['melekat'] = '1';
		$data[27][1] = 'v_perkembangan_pertolongan_persalinan';
		$data[27][2] = 'kualitas_persalinan,400,Pertolongan Persalinan,l';
		$data[27][3] = 'jumlah,200,,, Tindakan';
		////
		$data[28]['title1'] = 'D. Cakupan Immunisasi';
		$data[28]['h'] = '1';
		$data[28][1] = 'v_perkembangan_kesehatan_cakupan_immunisasi';
		$data[28][2] = 'immunisasi,400';
		$data[28][3] = 'jumlah,200';
		////
		//$data[30]['melekat'] = '1';
		$data[30][1] = 'v_perkembangan_kesehatan_kb';
		$data[30][2] = 'akseptor_kb,400,Keluarga Berencana,l';
		$data[30][3] = 'jumlah,200,,, orang';
		////penyakit
		$data[32]['title1'] = 'G. Angka Harapan Hidup';
		$data[32]['h'] = '1';
		$data[32][1] = 'perkembangan_angka_harapan_hidup';
		$data[32][2] = 'harapan,400';
		$data[32][3] = 'jumlah,200,,, Tahun';
		////
		$data[33]['title1'] = 'H. Cakupan pemenuhan kebutuhan air bersih';
		$data[33]['h'] = '1';
		$data[33][1] = 'v_v_perkembangan_sumber_air_bersih';
		$data[33][2] = 'sumber_air,400';
		$data[33][3] = 'jumlah,200';
		////
		$data[34]['title1'] = 'I. Perilaku hidup bersih dan sehat';
		$data[34]['border'] = '1';
		$data[34][1] = 'v_perkembangan_kebiasaan_buang_air';
		$data[34][2] = 'hidup_sehat,400,Kebiasaan buang air besar,l';
		$data[34][3] = 'jumlah,200,,, keluarga';
		////
		$data[35]['border'] = '1';
		$data[35]['melekat'] = '1';
		$data[35][1] = 'v_perkembangan_perilaku_pola_makan';
		$data[35][2] = 'pola_makan,400,Pola makan,l';
		$data[35][3] = 'ket,200';
		////
		$data[36]['melekat'] = '1';
		$data[36][1] = 'v_perkembangan_perilaku_kebiasaan_berobat';
		$data[36][2] = 'kebiasaan,400,Kebiasaan berobat bila sakit,l';
		$data[36][3] = 'ket_teks,200';
		////
		$data[37]['title1'] = 'J. Status Gizi Balita';
		$data[37]['h'] = '1';
		$data[37][1] = 'v_perkembangan_status_gizi_balita';
		$data[37][2] = 'status_gizi,400';
		$data[37][3] = 'jumlah,200,,, orang';
		////
		$data[38]['title1'] = 'K. Jumlah Penderita Sakit tahun ini';
		$data[38][1] = 'v_perkembangan_kesehatan_sakit';
		$data[38][2] = 'id_jenis_penyakit_teks,200,Jumlah penyakit';
		$data[38][3] = 'jumlah,200,Jumlah penderita,c, orang';
		$data[38][4] = 'rawat_teks,200,Di rawat di,c';
		////
		$data[39]['title1'] = 'L. Perkembangan Sarana dan Prasarana Kesehatan Masyarakat';
		$data[39]['h'] = '1';
		$data[39][1] = 'v_v_perkembangan_sarana_prasarana_kesehatan';
		$data[39][2] = 'perkembangan,400';
		$data[39][3] = 'ket,200';
		////
		$data[40]['title'] = 'X. KEAMANAN DAN KETERTIBAN';
		$data[40]['title1'] = 'A. Konflik SARA';
		$data[40]['h'] = '1';
		$data[40][1] = 'v_v_perkembangan_keamanan_konflik_sara';
		$data[40][2] = 'konflik,450';
		$data[40][3] = 'ket,150';
		////
		$data[41]['title1'] = 'B. Perkelahian';
		$data[41]['h'] = '1';
		$data[41][1] = 'v_v_perkembangan_keamanan_perkelahian';
		$data[41][2] = 'perkelahian,450';
		$data[41][3] = 'ket,150';
		////
		$data[42]['title1'] = 'C. Pencurian';
		$data[42]['h'] = '1';
		$data[42][1] = 'v_v_perkembangan_keamanan_pencurian';
		$data[42][2] = 'pencurian,450';
		$data[42][3] = 'ket,150';
		////
		$data[43]['title1'] = 'D. Penjarahan dan Penyerobotan Tanah';
		$data[43]['h'] = '1';
		$data[43][1] = 'v_v_perkembangan_keamanan_penjarahan';
		$data[43][2] = 'penjarahan,450';
		$data[43][3] = 'ket,150';
		////
		$data[44]['title1'] = 'E. Perjudian, Penipuan dan Penggelapan';
		$data[44]['h'] = '1';
		$data[44][1] = 'v_perkembangan_keamanan_perjudian';
		$data[44][2] = 'perjudian,450';
		$data[44][3] = 'jumlah,150,,, orang';
		////
		$data[45]['title1'] = 'F. Pemakaian Miras dan Narkoba';
		$data[45]['h'] = '1';
		$data[45][1] = 'v_v_perkembangan_keamanan_miras';
		$data[45][2] = 'miras,450';
		$data[45][3] = 'ket,150';
		////
		$data[46]['title1'] = 'G. Prostitusi';
		$data[46]['h'] = '1';
		$data[46][1] = 'v_v_perkembangan_keamanan_prostitusi';
		$data[46][2] = 'prostitusi,450';
		$data[46][3] = 'ket,150';
		////
		$data[47]['title1'] = 'H. Pembunuhan';
		$data[47]['h'] = '1';
		$data[47][1] = 'v_v_perkembangan_keamanan_pembunuhan';
		$data[47][2] = 'pembunuhan,450';
		$data[47][3] = 'ket,150';
		////
		$data[48]['title1'] = 'I. Penculikan';
		$data[48]['h'] = '1';
		$data[48][1] = 'v_v_perkembangan_keamanan_penculikan';
		$data[48][2] = 'penculikan,450';
		$data[48][3] = 'ket,150';
		////
		$data[49]['title1'] = 'J. Kejahatan seksual';
		$data[49]['h'] = '1';
		$data[49][1] = 'v_v_perkembangan_keamanan_kejahatan_seksual';
		$data[49][2] = 'kejahatan_seksual,450';
		$data[49][3] = 'ket,150';
		////
		$data[50]['title1'] = 'K. Masalah Kesejahteraan Sosial';
		$data[50]['h'] = '1';
		$data[50][1] = 'v_v_perkembangan_keamanan_kesejahteraan_sosial';
		$data[50][2] = 'kesejahteraan_sosial,450';
		$data[50][3] = 'ket,150';
		////
		$data[51]['title1'] = 'L. Kekerasan Dalam Rumah Tangga';
		$data[51]['h'] = '1';
		$data[51][1] = 'v_perkembangan_keamanan_kekerasan_rumah';
		$data[51][2] = 'kekerasan_rumah,450';
		$data[51][3] = 'jumlah,150,,, kasus';
		////
		$data[52]['title1'] = 'M. Teror dan Intimidasi';
		$data[52]['h'] = '1';
		$data[52][1] = 'v_perkembangan_keamanan_teror';
		$data[52][2] = 'keamanan_teror,450';
		$data[52][3] = 'jumlah,150,,, kasus';
		/////
		$data[53]['title1'] = 'N. Pelembagaan Sistem Keamanan Lingkungan Semesta';
		$data[53]['h'] = '1';
		$data[53][1] = 'v_v_perkembangan_pelembagaan_keamanan';
		$data[53][2] = 'pelembagaan,450';
		$data[53][3] = 'ket,150';
		///
		$data[54]['title'] = 'XI. KEDAULATAN POLITIK MASYARAKAT';
		$data[54]['title1'] = 'A. Kesadaran berpemerintahan, berbangsa dan bernegara';
		$data[54]['h'] = '1';
		$data[54][1] = 'v_v_perkembangan_kedaulatan_kesadaran';
		$data[54][2] = 'kesadaran,500';
		$data[54][3] = 'ket,100';
		////
		$data[55]['title1'] = 'B. Kesadaran membayar Pajak dan Retrebusi';
		$data[55]['h'] = '1';
		$data[55][1] = 'v_v_perkembangan_kedaulatan_kesadaran_pajak';
		$data[55][2] = 'kesadaran_pajak,500';
		$data[55][3] = 'ket,100';
		////
		$data[56]['title1'] = 'C. Partisipasi Politik<br>1. Jumlah Partai Politik dan Pemilihan Umum';
		$data[56]['h'] = '1';
		$data[56][1] = 'v_v_perkembangan_kedaulatan_kesadaran_partai_politik';
		$data[56][2] = 'parpol,500';
		$data[56][3] = 'ket,100';
		////
		$data[57]['title1'] = '2. Pemilihan Kepala Daerah';
		$data[57]['h'] = '1';
		$data[57][1] = 'v_v_perkembangan_kedaulatan_kesadaran_kepala_daerah';
		$data[57][2] = 'kepala_daerah,500';
		$data[57][3] = 'ket,100';
		////
		$data[58]['title1'] = '3. Penentuan Kepala Desa / Lurah dan Perangkat Desa / Kelurahan';
		$data[58]['h'] = '1';
		$data[58][1] = 'perkembangan_penentuan_kepala_desa';
		$data[58][2] = 'penentuan,200';
		$data[58][3] = 'ket,400';
		/////
		$data[59]['title1'] = '4. Pemilihan BPD';
		$data[59]['h'] = '1';
		$data[59][1] = 'perkembangan_penentuan_bpd';
		$data[59][2] = 'bpd,200';
		$data[59][3] = 'ket,400';
		/////
		$data[60]['title1'] = '5. Pemilihan dan Fungsi Lembaga Kemasyarakatan';
		$data[60]['h'] = '1';
		$data[60][1] = 'perkembangan_pemilihan_fungsi';
		$data[60][2] = 'lemabaga,200';
		$data[60][3] = 'ket,400';
		////
		$data[61]['title1'] = 'D. PERANSERTA MASYARAKAT DALAM PEMBANGUNAN<br>1. Musyawarah Perencanaan Pembangunan Desa/Kelurahan/Musrenbangdes/Kelurahan';
		$data[61]['h'] = '1';
		$data[61][1] = 'v_v_perkembangan_kedaulatan_musyawarah';
		$data[61][2] = 'musyawarah,500';
		$data[61][3] = 'ket_teks,100';
		////
		$data[62]['title1'] = '2. Peranserta masyarakat dalam Pelaksanaan dan Pelestarian Hasil Pembangunan';
		$data[62]['h'] = '1';
		$data[62][1] = 'v_v_perkembangan_kedaulatan_peranserta';
		$data[62][2] = 'peranserta,500';
		$data[62][3] = 'ket_teks,100';
		////
		$data[63]['title1'] = '3. Semangat Kegotongroyongan Penduduk';
		$data[63]['h'] = '1';
		$data[63][1] = 'v_v_perkembangan_kedaulatan_kegotongroyongan';
		$data[63][2] = 'gotongroyong,500';
		$data[63][3] = 'ket_teks,100';
		////
		$data[64]['title1'] = '4. Adat Istiadat';
		$data[64]['h'] = '1';
		$data[64][1] = 'v_perkembangan_kedaulatan_adat';
		$data[64][2] = 'adat,400';
		$data[64][3] = 'ket_teks,200';
		////
		$data[65]['title1'] = '5. Sikap dan Mental Masyarakat';
		$data[65]['h'] = '1';
		$data[65]['border'] = '1';
		$data[65][1] = 'v_v_perkembangan_kedaulatan_mental';
		$data[65][2] = 'mental,400';
		$data[65][3] = 'ket_teks,200';
		////
		$data[66]['melekat'] = '1';
		$data[66][1] = 'v_perkembangan_kedaulatan_etos_kerja';
		$data[66][2] = 'etos_kerja,400,Etos Kerja Penduduk,l';
		$data[66][3] = 'ket_teks,200';
		////
		$data[67]['title'] = 'XII. LEMBAGA KEMASYARAKATAN';
		$data[67][1] = 'v_v_perkembangan_lembaga_kemasyarakatan_desa';
		$data[67][2] = 'lembaga,400,A. LEMBAGA KEMASYARAKATAN DESA/KELURAHAN,l';
		$data[67][3] = 'ket_teks,200';
		//// sc
		$data[69]['title'] = 'XIII. PEMERINTAHAN DESA DAN KELURAHAN';
		$data[69]['title1'] = 'A. APB-Desa dan Anggaran Kelurahan';
		$data[69]['h'] = '1';
		$data[69][1] = 'v_perkembangan_pemerintahan_apbdesa';
		$data[69][2] = 'apb,400';
		$data[69][3] = 'jumlah,200';
		////
		$data[70]['melekat'] = '1';
		$data[70][1] = 'v_perkembangan_pemerintahan_sumber_anggaran';
		$data[70][2] = 'apb,400,Sumber Anggaran,l';
		$data[70][3] = 'jumlah,200';
		////
		$data[71]['title1'] = 'B. Pertanggungjawaban Kepala Desa/Lurah';
		$data[71]['h'] = '1';
		$data[71][1] = 'v_v_perkembangan_pemerintahan_pertanggungjawaban';
		$data[71][2] = 'jenis,400';
		$data[71][3] = 'ket,200';
		/////
		$data[72]['title1'] = 'C. Prasarana dan Administrasi Pemerintahan Desa/Kelurahan';
		$data[72]['merge'] = "<tr><th style='text-align:left'>1. PEMERINTAH DESA/KELURAHAN<th></tr>";
		$data[72]['h'] = '1';
		$data[72]['border'] = '1';
		$data[72][1] = 'v_v_perkembangan_prasarana_desa';
		$data[72][2] = 'sarana,400,,,,,skip';
		$data[72][3] = 'ket_teks,200,,,,,skip';
		////
		$data[73]['melekat'] = '1';
		$data[73]['border'] = '1';
		$data[73][1] = 'v_v_perkembangan_prasarana_alat_tulis';
		$data[73][2] = 'inventaris,400,1.A. Inventaris dan Alat tulis kantor,l';
		$data[73][3] = 'ket_teks,200';
		////
		$data[74]['border'] = '1';
		$data[74]['melekat'] = '1';
		$data[74][1] = 'v_v_perkembangan_prasarana_administrasi_pemerintahan';
		$data[74][2] = 'administrasi,400,1. B. Administrasi Pemerintahan Desa/Kelurahan,l';
		$data[74][3] = 'ket_teks,200';
		/////
		$data[75]['melekat'] = '1';
		$data[75]['border'] = '1';
		$data[75]['merge'] = "<tr><th colspan='2' style='text-align:left'>2. PRASARANA DAN SARANA BADAN PERMUSYAWARATAN DESA/BPD</th></tr>";
		$data[75][1] = 'v_v_perkembangan_prasarana_bpd';
		$data[75][2] = 'bpd,400,,,,,skip';
		$data[75][3] = 'ket_teks,200,,,,,skip';
		////
		$data[76]['melekat'] = '1';
		$data[76]['border'] = '1';
		$data[76][1] = 'perkembangan_prasarana_inventaris';
		$data[76][2] = 'inventaris,400,2.A. Inventaris dan Alat tulis kantor,l';
		$data[76][3] = 'jumlah,200';
		////
		$data[77]['border'] = '1';
		$data[77]['melekat'] = '1';
		$data[77][1] = 'v_v_perkembangan_prasarana_administrasi_bpd';
		$data[77][2] = 'administrasi,400,2.B. Administrasi BPD,l';
		$data[77][3] = 'ket_teks,200';
		////
		$data[78]['merge'] = "<tr><th colspan='2' style='text-align:left'>3. PRASARANA DAN SARANA DUSUN/LINGKUNGAN/SEBUTAN LAIN</th></tr>";
		$data[78]['melekat'] = '1';
		$data[78]['border'] = '1';
		$data[78][1] = 'v_v_perkembangan_prasarana_dusun';
		$data[78][2] = 'sarana,400,,,,,skip';
		$data[78][3] = 'ket_teks,200,,,,,skip';
		////
		$data[79]['title1'] = '';
		$data[79]['melekat'] = '1';
		$data[79][1] = 'perkembangan_prasarana_inventaris_dusun';
		$data[79][2] = 'inventaris,400,3.A. Inventaris dan Alat Tulis Kantor,l';
		$data[79][3] = 'jumlah,200,,, buah';
		////
		$data[80]['title1'] = 'D. PEMBINAAN DAN PENGAWASAN<br>1. Jenis Pembinaan Pemerintah Pusat kepada Pemerintahan Desa dan Kelurahan';
		$data[80]['h'] = '1';
		$data[80][1] = 'v_v_perkembangan_prasarana_pembinaan_desa';
		$data[80][2] = 'jenis,400';
		$data[80][3] = 'ket_teks,200';
		////
		$data[81]['title1'] = '2. Pembinaan Pemerintah Provinsi kepada Pemerintahan desa dan kelurahan';
		$data[81]['h'] = '1';
		$data[81][1] = 'v_v_perkembangan_prasarana_pembinaan_provinsi_desa';
		$data[81][2] = 'jenis,400';
		$data[81][3] = 'ket_teks,200';
		////
		$data[82]['title1'] = '3. Pembinaan Pemerintah Kabupaten/Kota kepada Pemerintahan Desa dan Kelurahan';
		$data[82]['h'] = '1';
		$data[82][1] = 'v_v_perkembangan_prasarana_pembinaan_kabupaten_desa';
		$data[82][2] = 'jenis,400';
		$data[82][3] = 'ket_teks,200';
		return $data;
		//////////
	}

}


?>