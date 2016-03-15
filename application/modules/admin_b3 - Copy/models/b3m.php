<?php  if (!defined('BASEPATH')) exit('No direct script access allowed');

class b3m extends core_model 
{

	function __construct()
	{
		parent::__construct();
       // $this->_table = 'country';
	}
     

	function datart(){

		$sql = "SELECT DISTINCT rt  as rt  FROM penduduk WHERE rt IS NOT NULL 
		 and id_desa = ".$this->session->userdata("operator_id_desa") . " 
		 order by rt  ";
		$res  = $this->db->query($sql);
		return $res;
	}

	 

	function jumlah_kk_per_rt($rt,$tahun,$bulan) {
		// cari dulu  semua 
		/*0=>"Tetap",
		1=>"Sementara",
		2=>"Pendatang",
		3=> "Pindah"); */

		
		// semua 
		$sql_semua = "SELECT COUNT(*) jml  FROM penduduk 
		WHERE kepala_keluarga = '1' 
		AND YEAR(regdate) <= $tahun AND MONTH(regdate) < $bulan 
		AND rt = '$rt'  and hidup_mati = '1' 
		AND status_kependudukan  IN ('0','2')   and id_desa = ".$this->session->userdata("operator_id_desa");
		$rs = $this->db->query($sql_semua); 
		$dj = $rs->row();
		$jumlah_semua = $dj->jml; 
		//echo "\$jumlah semua = $jumlah_semua ";
		//return $jumlah_semua; 
		// cari jumlah yang mati bulan ini 
		$sql = "SELECT COUNT(*) jml 
		FROM penduduk p  
		JOIN surat_kematian k ON k.`id_penduduk` = p.`id_penduduk`
		AND YEAR(k.`tgl_meninggal`) = $tahun 
		AND MONTH(k.`tgl_meninggal`) = $bulan
		AND p.rt = '$rt' 
		AND p.`kepala_keluarga` = '1'  
		and p.id_desa = ".$this->session->userdata("operator_id_desa"); 
		//echo $sql."<br />";
		$dx = $this->db->query($sql)->row();
		$jumlah_mati = $dx->jml; 
		//echo "\$jumlah_mati   = $jumlah_mati ";

		$sql_pindah = "SELECT  COUNT(*) jml FROM v_pindah 
						JOIN penduduk p ON p.`id_penduduk` = v_pindah.`id_penduduk` 
						WHERE YEAR(tgl_pindah) = $tahun 
						AND MONTH(tgl_pindah) = $bulan 
						AND p.`kepala_keluarga` = '1' 
						AND rt = '$rt'  
						and p.id_desa = ".$this->session->userdata("operator_id_desa") ;
		$res_pindah = $this->db->query($sql_pindah)->row();
		$jumlah_pindah = $res_pindah->jml;
		//echo "\$jumlah_pindah   = $jumlah_mati ";
		return $jumlah_semua  + $jumlah_mati + $jumlah_pindah;
	}


	function jumlah_akhir_bulan($tahun,$bulan,$rt,$warga_negara,$jk) {
		$sql_semua = "SELECT COUNT(*) jml  FROM penduduk 
		WHERE kepala_keluarga <> '1' 
		AND YEAR(regdate) <= $tahun 
		AND MONTH(regdate) <= $bulan 
		AND rt = '$rt'  
		and hidup_mati = '1' 
		and jk = '$jk' 
		and warga_negara = '$warga_negara'
		AND status_kependudukan  IN ('0')  and id_desa = ".$this->session->userdata("operator_id_desa"); ;
		$dj = $this->db->query($sql_semua)->row();
		$jumlah_semua = $dj->jml; 

		//echo $this->db->last_query(); exit;
		// cari jumlah yang mati bulan ini 
		$sql = "SELECT COUNT(*) jml 
		FROM penduduk p  
		JOIN surat_kematian k ON k.`id_penduduk` = p.`id_penduduk`
		AND YEAR(k.`tgl_meninggal`) = $tahun AND MONTH(k.`tgl_meninggal`) = $bulan
		AND p.rt = '$rt' 
		AND p.`kepala_keluarga` <> '1' and p.jk = '$jk' 
		and p.warga_negara = '$warga_negara'  and p.id_desa = ".$this->session->userdata("operator_id_desa"); ;

		$dx = $this->db->query($sql)->row();
		$jumlah_mati = $dx->jml; 


		$sql_pindah = "SELECT  COUNT(*) jml FROM v_pindah 
						JOIN penduduk p ON p.`id_penduduk` = v_pindah.`id_penduduk` 
						WHERE YEAR(tgl_pindah) = $tahun 
						AND MONTH(tgl_pindah) = $bulan 
						AND p.`kepala_keluarga` <> '1' 
						AND rt = '$rt'
						and p.jk = '$jk' 
						and p.warga_negara = '$warga_negara'  and p.id_desa = ".$this->session->userdata("operator_id_desa"); ;

		$res_pindah = $this->db->query($sql_pindah)->row();
		$jumlah_pindah = $res_pindah->jml;
		return $jumlah_semua  ;//+ $jumlah_mati + $jumlah_pindah;


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
				AND status_kependudukan in ('2','3')
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
		$sql="SELECT COUNT(*) AS jml FROM 
				v_penduduk 
				WHERE hidup_mati = '1'
				AND status_kependudukan IN ('0','2')
				AND jk ='$jk' 
				AND warga_negara='$warga_negara'
				AND YEAR(regdate) <= $tahun
				AND MONTH(regdate) <= $bulan
				AND kepala_keluarga <> '1' 
				AND rt = '$rt' and id_desa = ".$this->session->userdata("operator_id_desa");
		$data = $this->db->query($sql)->row();
		//echo $this->db->last_query() . "<hr />";
		return $data->jml;
	}

	function jml_kk($tahun,$bulan,$rt) {
		$sql="SELECT COUNT(*) AS jml FROM 
				v_penduduk 
				WHERE hidup_mati = '1'
				AND status_kependudukan IN ('0')
				 
				 
				AND YEAR(regdate) <= $tahun
				AND MONTH(regdate) <= $bulan
				AND kepala_keluarga = '1' 
				AND rt = '$rt' and id_desa = ".$this->session->userdata("operator_id_desa");
		$data = $this->db->query($sql)->row();
		//echo $this->db->last_query() . "<hr />";
		return $data->jml;
	}


	function jml_kk_akhir($tahun,$bulan,$rt) {
		$sql="SELECT COUNT(*) AS jml FROM 
				v_penduduk 
				WHERE hidup_mati = '1'
				AND status_kependudukan IN ('0','2')
				 
				 
				AND YEAR(regdate) <= $tahun
				AND MONTH(regdate) <= $bulan
				AND kepala_keluarga = '1' 
				AND rt = '$rt' and id_desa = ".$this->session->userdata("operator_id_desa");
		$data = $this->db->query($sql)->row();
		//echo $this->db->last_query() . "<hr />";
		return $data->jml;
	}


}
