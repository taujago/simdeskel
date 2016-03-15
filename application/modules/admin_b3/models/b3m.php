<?php  if (!defined('BASEPATH')) exit('No direct script access allowed');

class b3m extends core_model 
{

	function __construct()
	{
		parent::__construct();
       // $this->_table = 'country';
		$this->load->model("add_model","add");
	}
     

	function datart(){

		$sql = "SELECT DISTINCT rt  as rt  FROM penduduk WHERE rt IS NOT NULL 
		 and id_desa = ".$this->session->userdata("operator_id_desa") . " 
		 order by rt  ";
		$res  = $this->db->query($sql);
		return $res;
	}

	 

	function jumlah_kk_per_rt($rt,$tahun,$bulan) {
		// // cari dulu  semua 
		// /*0=>"Tetap",
		// 1=>"Sementara",
		// 2=>"Pendatang",
		// 3=> "Pindah"); */

		
		// // semua 
		// $sql_semua = "SELECT COUNT(*) jml  FROM penduduk 
		// WHERE kepala_keluarga = '1' 
		// AND YEAR(regdate) <= $tahun AND MONTH(regdate) < $bulan 
		// AND rt = '$rt'  and hidup_mati = '1' 
		// AND status_kependudukan  IN ('0','2')   
		// and id_desa = ".$this->session->userdata("operator_id_desa");
		// $rs = $this->db->query($sql_semua); 
		// // echo $this->db->last_query();
		// // exit; 
		// if($rs->num_rows() == 0 ) {
		// 	$jumlah_semua = 0; 
		// }
		// else { 
		// $dj = $rs->row();
		// $jumlah_semua = $dj->jml; }
		// //echo "\$jumlah semua = $jumlah_semua ";
		// //return $jumlah_semua; 
		// // cari jumlah yang mati bulan ini 
		// $sql = "SELECT COUNT(*) jml 
		// FROM penduduk p  
		// JOIN surat_kematian k ON k.`id_penduduk` = p.`id_penduduk`
		// AND YEAR(k.`tgl_meninggal`) = $tahun 
		// AND MONTH(k.`tgl_meninggal`) = $bulan
		// AND p.rt = '$rt' 
		// AND p.`kepala_keluarga` = '1'  
		// and p.id_desa = ".$this->session->userdata("operator_id_desa"); 
		// //echo $sql."<br />";
		// $dx = $this->db->query($sql)->row();
		// $jumlah_mati = $dx->jml; 
		// //echo "\$jumlah_mati   = $jumlah_mati ";

		// $sql_pindah = "SELECT  COUNT(*) jml FROM v_pindah 
		// 				JOIN penduduk p ON p.`id_penduduk` = v_pindah.`id_penduduk` 
		// 				WHERE YEAR(tgl_pindah) = $tahun 
		// 				AND MONTH(tgl_pindah) = $bulan 
		// 				AND p.`kepala_keluarga` = '1' 
		// 				AND rt = '$rt'  
		// 				and p.id_desa = ".$this->session->userdata("operator_id_desa") ;
		// $res_pindah = $this->db->query($sql_pindah)->row();
		// $jumlah_pindah = $res_pindah->jml;
		// //echo "\$jumlah_pindah   = $jumlah_mati ";
		// return 0; //$jumlah_semua  + $jumlah_mati + $jumlah_pindah;
		$total = 0; 
		$first_date = $this->add->first_day($bulan,$tahun);
		$sql_semua = "SELECT COUNT(*) jml  FROM penduduk 
		WHERE kepala_keluarga = '1' 
		and regdate <= '$first_date'
		AND rt = '$rt'  
		and hidup_mati = '1' 
 		AND status_kependudukan  <> '3'  
		and id_desa = ".$this->session->userdata("operator_id_desa"); ;
		$dj = $this->db->query($sql_semua)->row();
		// echo "query.. ".$this->db->last_query()."<br />"; // exit;
		$jumlah_semua = $dj->jml; 
		 $total += $jumlah_semua;
		

		//print_r($jumlah_semua); exit;
		//echo "Total $total <br />";


		 // jumlah input bulan ini. dimana 

        
		$sql_semua = "SELECT COUNT(*) jml  FROM penduduk 
		WHERE kepala_keluarga = '1' 
		and MONTH(regdate) = $bulan AND YEAR(regdate) = $tahun
		AND rt = '$rt'  
		and hidup_mati = '1' 
 		AND status_kependudukan  <> '2' 
		AND id_penduduk NOT IN (SELECT id_penduduk FROM v_kelahiran WHERE MONTH(tgl_lahir2) = $bulan AND YEAR(tgl_lahir2) = $tahun )
		and id_desa = ".$this->session->userdata("operator_id_desa"); ;
		$rs_ini = $this->db->query($sql_semua);
		//echo $this->db->last_query();
		$d_ini = $rs_ini->row();

		 $total += $d_ini->jml;
		

		//// input bulan ini. 




		// cari jumlah yang mati bulan ini 
		$sql = "SELECT COUNT(*) jml 
		FROM penduduk p  
		JOIN surat_kematian k ON k.`id_penduduk` = p.`id_penduduk`
		AND YEAR(k.`tgl_meninggal`) = $tahun 
		AND MONTH(k.`tgl_meninggal`) = $bulan
		AND p.rt = '$rt' 
		AND p.`kepala_keluarga` = '1' 
		and p.id_desa = ".$this->session->userdata("operator_id_desa"); ;

		$dx = $this->db->query($sql)->row();
		$jumlah_mati = $dx->jml; 
		$total += $jumlah_mati;

		 
		$sql_pindah = "SELECT  COUNT(*) jml FROM v_pindah 
						JOIN penduduk p ON p.`id_penduduk` = v_pindah.`id_penduduk` 
						WHERE YEAR(tgl_pindah) = $tahun 
						AND MONTH(tgl_pindah) = $bulan 
						AND p.`kepala_keluarga` = '1' 
						and p.status_kependudukan = '3'
						AND rt = '$rt'
						and p.id_desa = ".$this->session->userdata("operator_id_desa"); ;

		$res_pindah = $this->db->query($sql_pindah)->row();
		$jumlah_pindah = $res_pindah->jml; 
		
		$total += $jumlah_pindah;   
		
		 
		return $total;
	}


	function jumlah_akhir_bulan($tahun,$bulan,$rt,$warga_negara,$jk) {
		/// total bulanlalu 
		$total = 0; 
		$first_date = $this->add->first_day($bulan,$tahun);
		$sql_semua = "SELECT COUNT(*) jml  FROM penduduk 
		WHERE kepala_keluarga <> '1' 
		and regdate <= '$first_date'
		AND rt = '$rt'  
		and hidup_mati = '1' 
		and jk = '$jk' 
		and warga_negara = '$warga_negara'
		AND status_kependudukan  <> '3'  
		and id_desa = ".$this->session->userdata("operator_id_desa"); ;
		$dj = $this->db->query($sql_semua)->row();
		// echo "query.. ".$this->db->last_query()."<br />"; // exit;
		$jumlah_semua = $dj->jml; 
		 $total += $jumlah_semua;
		

		//print_r($jumlah_semua); exit;
		//echo "Total $total <br />";


		 // jumlah input bulan ini. dimana 

        
		$sql_semua = "SELECT COUNT(*) jml  FROM penduduk 
		WHERE kepala_keluarga <> '1' 
		and MONTH(regdate) = $bulan AND YEAR(regdate) = $tahun
		AND rt = '$rt'  
		and hidup_mati = '1' 
		and jk = '$jk' 
		and warga_negara = '$warga_negara'
		AND status_kependudukan  <> '2' 
		AND id_penduduk NOT IN (SELECT id_penduduk FROM v_kelahiran WHERE MONTH(tgl_lahir2) = $bulan AND YEAR(tgl_lahir2) = $tahun )
		and id_desa = ".$this->session->userdata("operator_id_desa"); ;
		$rs_ini = $this->db->query($sql_semua);
		//echo $this->db->last_query();
		$d_ini = $rs_ini->row();

		 $total += $d_ini->jml;
		

		//// input bulan ini. 




		// cari jumlah yang mati bulan ini 
		$sql = "SELECT COUNT(*) jml 
		FROM penduduk p  
		JOIN surat_kematian k ON k.`id_penduduk` = p.`id_penduduk`
		AND YEAR(k.`tgl_meninggal`) = $tahun 
		AND MONTH(k.`tgl_meninggal`) = $bulan
		AND p.rt = '$rt' 
		AND p.`kepala_keluarga` <> '1' and p.jk = '$jk' 
		and p.warga_negara = '$warga_negara'  
		and p.id_desa = ".$this->session->userdata("operator_id_desa"); ;

		$dx = $this->db->query($sql)->row();
		$jumlah_mati = $dx->jml; 
		$total += $jumlah_mati;

		 
		$sql_pindah = "SELECT  COUNT(*) jml FROM v_pindah 
						JOIN penduduk p ON p.`id_penduduk` = v_pindah.`id_penduduk` 
						WHERE YEAR(tgl_pindah) = $tahun 
						AND MONTH(tgl_pindah) = $bulan 
						AND p.`kepala_keluarga` <> '1' 
						and p.status_kependudukan = '3'
						AND rt = '$rt'
						and p.jk = '$jk' 
						and p.warga_negara = '$warga_negara'  
						and p.id_desa = ".$this->session->userdata("operator_id_desa"); ;

		$res_pindah = $this->db->query($sql_pindah)->row();
		$jumlah_pindah = $res_pindah->jml; 
		
		$total += $jumlah_pindah;   
		
		 
		return $total;



	}


	// function jml_kelahiran($tahun,$bulan,$rt,$warga_negara,$jk) {
	// 	$sql="SELECT COUNT(*) jml FROM v_kelahiran k
	// 		JOIN penduduk p 
	// 		ON k.`id_penduduk` = p.`id_penduduk`
	// 		WHERE hidup_mati = '1'
	// 		AND k.`warga_negara` = '$warga_negara'
	// 		AND k.`jk` = '$jk'
	// 		AND YEAR(p.tgl_lahir) = $tahun
	// 		AND MONTH(p.tgl_lahir) = $bulan
	// 		AND p.`rt` = '$rt' 
	// 		AND k.`deleted` = '0'";
	// 	$data = $this->db->query($sql)->row();
	// 	return $data->jml;

	// }

	function jml_kelahiran($tahun,$bulan,$rt,$warga_negara,$jk) {
		$sql="SELECT COUNT(*) jml FROM v_kelahiran k
			JOIN penduduk p 
			ON k.`id_penduduk` = p.`id_penduduk`
			WHERE hidup_mati = '1'
			AND k.`warga_negara` = '$warga_negara'
			AND k.`jk` = '$jk'
			AND YEAR(p.tgl_lahir) = $tahun
			AND MONTH(p.tgl_lahir) = $bulan
			AND p.`rt` = '$rt' 
			AND k.`deleted` = '0'  and id_desa = ".$this->session->userdata("operator_id_desa"); 
	   // echo $sql;
		$data = $this->db->query($sql)->row();
		return $data->jml;

	}
 
	function jml_kedatangan($tahun,$bulan,$rt,$warga_negara,$jk) {
		$sql="SELECT COUNT(*)  jml FROM penduduk 
				WHERE jk='$jk'
				AND warga_negara = '$warga_negara'
				AND rt = '$rt'
				AND status_kependudukan = '2'
				AND YEAR(regdate) = $tahun
				AND MONTH(regdate) = $bulan and id_desa = ".$this->session->userdata("operator_id_desa");
		$data = $this->db->query($sql)->row();
		return $data->jml;

	}

	function jml_kematian($tahun,$bulan,$rt,$warga_negara,$jk) {
		$sql="SELECT COUNT(*) AS jml  FROM v_kematian m 
				JOIN penduduk p ON m.`id_penduduk` = p.`id_penduduk`
				WHERE p.`rt`='$rt'
				AND p.warga_negara = '$warga_negara'
				AND p.`jk` = '$jk'
				AND YEAR(m.`tgl_meninggal`) = $tahun
				AND MONTH(m.`tgl_meninggal`) = $bulan and id_desa = ".$this->session->userdata("operator_id_desa");
		$data = $this->db->query($sql)->row();
		return $data->jml;

	}

	function jml_pindah($tahun,$bulan,$rt,$warga_negara,$jk) {
		$sql="SELECT COUNT(*) jml FROM v_pindah v 
				JOIN penduduk p ON v.`id_penduduk` = p.`id_penduduk`
				WHERE p.rt='$rt'
				AND p.`warga_negara` = '$warga_negara'
				AND p.`jk` = '$jk'
				AND YEAR(v.`tgl_pindah`) = $tahun
				AND MONTH(v.`tgl_pindah`) = $bulan and p.id_desa = ".$this->session->userdata("operator_id_desa");
		$data = $this->db->query($sql)->row();
		//echo $this->db->last_query() . "<hr />";
		return $data->jml;

	}

	function jml_penduduk($tahun,$bulan,$rt,$warga_negara,$jk) {
		$last_date = $this->add->last_date($bulan,$tahun);
		$sql="SELECT COUNT(*) AS jml FROM 
				v_penduduk 
				WHERE hidup_mati = '1'
				AND status_kependudukan not IN ('3')
				AND jk ='$jk' 
				AND warga_negara='$warga_negara'
				and regdate <= 'last_date'

				AND kepala_keluarga <> '1' 
				AND rt = '$rt' 
				and id_desa = ".$this->session->userdata("operator_id_desa");
		$data = $this->db->query($sql)->row();
		//echo $this->db->last_query() . "<hr />";
		return $data->jml;
	}

	function jml_kk($tahun,$bulan,$rt) {
		$last_date = $this->add->last_date($bulan,$tahun);
		$sql="SELECT COUNT(*) AS jml FROM 
				v_penduduk 
				WHERE hidup_mati = '1'
				AND status_kependudukan NOT IN ('3')
				 
				and regdate <= '$last_date'
				AND kepala_keluarga = '1' 
				AND rt = '$rt' 
				and id_desa = ".$this->session->userdata("operator_id_desa");
		$data = $this->db->query($sql)->row();
		//echo $this->db->last_query() . "<hr />";
		return $data->jml;
	}


}
