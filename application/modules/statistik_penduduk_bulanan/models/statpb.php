<?php  if (!defined('BASEPATH')) exit('No direct script access allowed');
 
class statpb extends CI_Model 
{

	function __construct()
	{
		parent::__construct();
       // $this->_table = 'country';
	}
    

	function penduduk_input($bulan) {
		$tahun = date("Y");
		$sql="SELECT IFNULL(SUM(IF(warga_negara='WNI' AND jk='l',1,0)),0) AS wni_l, 
		IFNULL(SUM(IF(warga_negara='WNI' AND jk='P',1,0)),0) AS wni_p, 
		IFNULL(SUM(IF(warga_negara='WNA' AND jk='l',1,0)),0) AS wna_l, 
		IFNULL(SUM(IF(warga_negara='WNA' AND jk='P',1,0)),0) AS wna_p, 
		IFNULL(SUM(IF(warga_negara='WNI' AND jk='l',1,0)),0) + IFNULL(SUM(IF(warga_negara='WNA' AND jk='l',1,0)),0) AS jml_l, 
		IFNULL(SUM(IF(warga_negara='WNI' AND jk='P',1,0)),0) + IFNULL(SUM(IF(warga_negara='WNA' AND jk='P',1,0)),0) AS jml_p , 
		IFNULL(SUM(IF(warga_negara='WNI' AND jk='l',1,0)),0) + IFNULL(SUM(IF(warga_negara='WNA' AND jk='l',1,0)),0) 
		+ IFNULL(SUM(IF(warga_negara='WNI' AND jk='P',1,0)),0) 
		+ IFNULL(SUM(IF(warga_negara='WNA' AND jk='P',1,0)),0) AS total 
		FROM penduduk
		WHERE MONTH(regdate) = $bulan AND YEAR(regdate) = $tahun
		AND id_penduduk NOT 
		IN (SELECT id_penduduk FROM v_kelahiran WHERE MONTH(tgl_lahir2) = $bulan AND YEAR(tgl_lahir2) = $tahun )
		AND hidup_mati = 1 
		AND status_kependudukan <> 2 ";
		 $res = $this->db->query($sql);
	 	// echo $this->db->last_query(); exit;
	 	return $res->row(); 

	}


	
	 function get_penduduk($bulan) {
	 
	 $tahun = date("Y");
	 $today = "$tahun-$bulan-1";
	 


	 $sql ="SELECT 
			IFNULL(SUM(IF(warga_negara='WNI' AND jk='l',1,0)),0) AS wni_l, 
			IFNULL(SUM(IF(warga_negara='WNI' AND jk='P',1,0)),0) AS wni_p, 
			IFNULL(SUM(IF(warga_negara='WNA' AND jk='l',1,0)),0) AS wna_l, 
			IFNULL(SUM(IF(warga_negara='WNA' AND jk='P',1,0)),0) AS wna_p, 
			IFNULL(SUM(IF(warga_negara='WNI' AND jk='l',1,0)),0) + IFNULL(SUM(IF(warga_negara='WNA' AND jk='l',1,0)),0) AS jml_l, 
			IFNULL(SUM(IF(warga_negara='WNI' AND jk='P',1,0)),0) + IFNULL(SUM(IF(warga_negara='WNA' AND jk='P',1,0)),0) AS jml_p , 
			IFNULL(SUM(IF(warga_negara='WNI' AND jk='l',1,0)),0) + IFNULL(SUM(IF(warga_negara='WNA' AND jk='l',1,0)),0) 
			+ IFNULL(SUM(IF(warga_negara='WNI' AND jk='P',1,0)),0) + IFNULL(SUM(IF(warga_negara='WNA' AND jk='P',1,0)),0) AS total 
				
				
				FROM penduduk  
				WHERE hidup_mati = '1' and status_kependudukan <> '3' 
				and regdate < '$today'";
				// and MONTH(regdate) < $bulan and YEAR(regdate) <= $tahun";
	 $res = $this->db->query($sql);
	 // echo $this->db->last_query(); exit;
	 return $res->row();
	 }
	 
	 
	function get_lahir($bulan) {
	$tahun = date("Y");
	// $sql ="SELECT 
	// 		IFNULL(SUM(IF(warga_negara='WNI' AND jk='l',1,0)),0) AS wni_l, 
	// 		IFNULL(SUM(IF(warga_negara='WNI' AND jk='P',1,0)),0) AS wni_p, 
	// 		IFNULL(SUM(IF(warga_negara='WNA' AND jk='l',1,0)),0) AS wna_l, 
	// 		IFNULL(SUM(IF(warga_negara='WNA' AND jk='P',1,0)),0) AS wna_p, 
	// 		IFNULL(SUM(IF(warga_negara='WNI' AND jk='l',1,0)),0) + IFNULL(SUM(IF(warga_negara='WNA' AND jk='l',1,0)),0) AS jml_l, 
	// 		IFNULL(SUM(IF(warga_negara='WNI' AND jk='P',1,0)),0) + IFNULL(SUM(IF(warga_negara='WNA' AND jk='P',1,0)),0) AS jml_p , 
	// 		IFNULL(SUM(IF(warga_negara='WNI' AND jk='l',1,0)),0) + IFNULL(SUM(IF(warga_negara='WNA' AND jk='l',1,0)),0) 
	// 		+ IFNULL(SUM(IF(warga_negara='WNI' AND jk='P',1,0)),0) + IFNULL(SUM(IF(warga_negara='WNA' AND jk='P',1,0)),0) AS total 
			
	// 		FROM penduduk p
	// 		JOIN surat_kelahiran l ON p.id_penduduk = l.id_penduduk
	// 		WHERE hidup_mati = '1' AND status_kependudukan <> '3' 
	// 		AND MONTH(tgl_lahir) = $bulan AND YEAR(tgl_lahir) = $tahun";

	$sql ="SELECT 
			IFNULL(SUM(IF(warga_negara='WNI' AND jk='l',1,0)),0) AS wni_l, 
			IFNULL(SUM(IF(warga_negara='WNI' AND jk='P',1,0)),0) AS wni_p, 
			IFNULL(SUM(IF(warga_negara='WNA' AND jk='l',1,0)),0) AS wna_l, 
			IFNULL(SUM(IF(warga_negara='WNA' AND jk='P',1,0)),0) AS wna_p, 
			IFNULL(SUM(IF(warga_negara='WNI' AND jk='l',1,0)),0) + IFNULL(SUM(IF(warga_negara='WNA' AND jk='l',1,0)),0) AS jml_l, 
			IFNULL(SUM(IF(warga_negara='WNI' AND jk='P',1,0)),0) + IFNULL(SUM(IF(warga_negara='WNA' AND jk='P',1,0)),0) AS jml_p , 
			IFNULL(SUM(IF(warga_negara='WNI' AND jk='l',1,0)),0) + IFNULL(SUM(IF(warga_negara='WNA' AND jk='l',1,0)),0) 
			+ IFNULL(SUM(IF(warga_negara='WNI' AND jk='P',1,0)),0) + IFNULL(SUM(IF(warga_negara='WNA' AND jk='P',1,0)),0) AS total 
			
			FROM penduduk p
			JOIN surat_kelahiran l ON p.id_penduduk = l.id_penduduk
			WHERE
			MONTH(tgl_lahir) = $bulan AND YEAR(tgl_lahir) = $tahun";
	 $res = $this->db->query($sql);
	 //echo $this->db->last_query(); exit; 
	 return $res->row();
	}
	
	function get_mati($bulan) {
			$tahun = date("Y");

		// $sql = "SELECT 
		// 	IFNULL(SUM(IF(warga_negara='WNI' AND jk='l',1,0)),0) AS wni_l, 
		// 	IFNULL(SUM(IF(warga_negara='WNI' AND jk='P',1,0)),0) AS wni_p, 
		// 	IFNULL(SUM(IF(warga_negara='WNA' AND jk='l',1,0)),0) AS wna_l, 
		// 	IFNULL(SUM(IF(warga_negara='WNA' AND jk='P',1,0)),0) AS wna_p, 
		// 	IFNULL(SUM(IF(warga_negara='WNI' AND jk='l',1,0)),0) + IFNULL(SUM(IF(warga_negara='WNA' AND jk='l',1,0)),0) AS jml_l, 
		// 	IFNULL(SUM(IF(warga_negara='WNI' AND jk='P',1,0)),0) + IFNULL(SUM(IF(warga_negara='WNA' AND jk='P',1,0)),0) AS jml_p , 
		// 	IFNULL(SUM(IF(warga_negara='WNI' AND jk='l',1,0)),0) + IFNULL(SUM(IF(warga_negara='WNA' AND jk='l',1,0)),0) 
		// 	+ IFNULL(SUM(IF(warga_negara='WNI' AND jk='P',1,0)),0) + IFNULL(SUM(IF(warga_negara='WNA' AND jk='P',1,0)),0) AS total 
			
		// 	FROM penduduk p
		// 	 JOIN surat_kematian l ON p.id_penduduk = l.id_penduduk
		// 	 WHERE status_kependudukan <> '3' AND hidup_mati = '0'
		// 	AND MONTH(l.tgl_meninggal) = $bulan
		// 	 AND YEAR(l.tgl_meninggal) = $tahun";
		$sql = "SELECT 
			IFNULL(SUM(IF(warga_negara='WNI' AND jk='l',1,0)),0) AS wni_l, 
			IFNULL(SUM(IF(warga_negara='WNI' AND jk='P',1,0)),0) AS wni_p, 
			IFNULL(SUM(IF(warga_negara='WNA' AND jk='l',1,0)),0) AS wna_l, 
			IFNULL(SUM(IF(warga_negara='WNA' AND jk='P',1,0)),0) AS wna_p, 
			IFNULL(SUM(IF(warga_negara='WNI' AND jk='l',1,0)),0) + IFNULL(SUM(IF(warga_negara='WNA' AND jk='l',1,0)),0) AS jml_l, 
			IFNULL(SUM(IF(warga_negara='WNI' AND jk='P',1,0)),0) + IFNULL(SUM(IF(warga_negara='WNA' AND jk='P',1,0)),0) AS jml_p , 
			IFNULL(SUM(IF(warga_negara='WNI' AND jk='l',1,0)),0) + IFNULL(SUM(IF(warga_negara='WNA' AND jk='l',1,0)),0) 
			+ IFNULL(SUM(IF(warga_negara='WNI' AND jk='P',1,0)),0) + IFNULL(SUM(IF(warga_negara='WNA' AND jk='P',1,0)),0) AS total 
			
			FROM penduduk p
			 JOIN surat_kematian l ON p.id_penduduk = l.id_penduduk
			 WHERE p.hidup_mati = '0'
			AND MONTH(l.tgl_meninggal) = $bulan
			 AND YEAR(l.tgl_meninggal) = $tahun";
		 $res = $this->db->query($sql);
		 // echo $this->db->last_query(); exit; 
		 return $res->row();
	}
	
	function get_datang($bulan) {
		$tahun = date("Y");
		$sql="SELECT 
			IFNULL(SUM(IF(warga_negara='WNI' AND jk='l',1,0)),0) AS wni_l, 
			IFNULL(SUM(IF(warga_negara='WNI' AND jk='P',1,0)),0) AS wni_p, 
			IFNULL(SUM(IF(warga_negara='WNA' AND jk='l',1,0)),0) AS wna_l, 
			IFNULL(SUM(IF(warga_negara='WNA' AND jk='P',1,0)),0) AS wna_p, 
			IFNULL(SUM(IF(warga_negara='WNI' AND jk='l',1,0)),0) + IFNULL(SUM(IF(warga_negara='WNA' AND jk='l',1,0)),0) AS jml_l, 
			IFNULL(SUM(IF(warga_negara='WNI' AND jk='P',1,0)),0) + IFNULL(SUM(IF(warga_negara='WNA' AND jk='P',1,0)),0) AS jml_p , 
			IFNULL(SUM(IF(warga_negara='WNI' AND jk='l',1,0)),0) + IFNULL(SUM(IF(warga_negara='WNA' AND jk='l',1,0)),0) 
			+ IFNULL(SUM(IF(warga_negara='WNI' AND jk='P',1,0)),0) + IFNULL(SUM(IF(warga_negara='WNA' AND jk='P',1,0)),0) AS total 
			
			FROM penduduk p
			  
			 WHERE status_kependudukan ='2'  
			AND MONTH(p.regdate) = $bulan 
			AND YEAR(p.regdate) = $tahun"; 
			$res = $this->db->query($sql);
		// echo $this->db->last_query();
			return $res->row();
	}
	
	
	
	function get_pindah($bulan){
	$tahun = date("Y");
	$sql="SELECT 
			IFNULL(SUM(IF(warga_negara='WNI' AND jk='l',1,0)),0) AS wni_l, 
			IFNULL(SUM(IF(warga_negara='WNI' AND jk='P',1,0)),0) AS wni_p, 
			IFNULL(SUM(IF(warga_negara='WNA' AND jk='l',1,0)),0) AS wna_l, 
			IFNULL(SUM(IF(warga_negara='WNA' AND jk='P',1,0)),0) AS wna_p, 
			IFNULL(SUM(IF(warga_negara='WNI' AND jk='l',1,0)),0) + IFNULL(SUM(IF(warga_negara='WNA' AND jk='l',1,0)),0) AS jml_l, 
			IFNULL(SUM(IF(warga_negara='WNI' AND jk='P',1,0)),0) + IFNULL(SUM(IF(warga_negara='WNA' AND jk='P',1,0)),0) AS jml_p , 
			IFNULL(SUM(IF(warga_negara='WNI' AND jk='l',1,0)),0) + IFNULL(SUM(IF(warga_negara='WNA' AND jk='l',1,0)),0) 
			+ IFNULL(SUM(IF(warga_negara='WNI' AND jk='P',1,0)),0) + IFNULL(SUM(IF(warga_negara='WNA' AND jk='P',1,0)),0) AS total 
			
			FROM penduduk p JOIN v_surat_pindah sp ON p.id_penduduk = sp.id_penduduk
			  
			 WHERE status_kependudukan ='3'  
			AND MONTH(sp.tgl_pindah) = $bulan 
			AND YEAR(sp.tgl_pindah) = $tahun";
		$res = $this->db->query($sql);
		// echo $this->db->last_query();
			return $res->row();
	}
	
	
	 function get_sekarang($bulan) {
	 
	 //$today = $

	 	
	 $tahun = date("Y");
	 $last_date = $this->add->last_date($bulan,$tahun);
	 $sql ="SELECT 
			IFNULL(SUM(IF(warga_negara='WNI' AND jk='l',1,0)),0) AS wni_l, 
			IFNULL(SUM(IF(warga_negara='WNI' AND jk='P',1,0)),0) AS wni_p, 
			IFNULL(SUM(IF(warga_negara='WNA' AND jk='l',1,0)),0) AS wna_l, 
			IFNULL(SUM(IF(warga_negara='WNA' AND jk='P',1,0)),0) AS wna_p, 
			IFNULL(SUM(IF(warga_negara='WNI' AND jk='l',1,0)),0) + IFNULL(SUM(IF(warga_negara='WNA' AND jk='l',1,0)),0) AS jml_l, 
			IFNULL(SUM(IF(warga_negara='WNI' AND jk='P',1,0)),0) + IFNULL(SUM(IF(warga_negara='WNA' AND jk='P',1,0)),0) AS jml_p , 
			IFNULL(SUM(IF(warga_negara='WNI' AND jk='l',1,0)),0) + IFNULL(SUM(IF(warga_negara='WNA' AND jk='l',1,0)),0) 
			+ IFNULL(SUM(IF(warga_negara='WNI' AND jk='P',1,0)),0) + IFNULL(SUM(IF(warga_negara='WNA' AND jk='P',1,0)),0) AS total 
				
				
				FROM penduduk  
				WHERE hidup_mati = '1' AND status_kependudukan not in ('3') 
				and regdate <= '$last_date'
				";
				// and MONTH(regdate) <= $bulan and YEAR(regdate) <= $tahun";
	 $res = $this->db->query($sql);
	 //echo $this->db->last_query(); exit;
	 return $res->row();
	 }
	 
	 function pendatang_antar_desa($bulan) {
		 $tahun = date("Y");
	 	$sql="SELECT 
				SUM(IF(warga_negara='WNI' AND jk='L',1,0)) AS wni_l 
				,SUM(IF(warga_negara='WNI' AND jk='P',1,0)) AS wni_p
				
				,SUM(IF(warga_negara='WNA' AND jk='L',1,0)) AS wna_l 
				,SUM(IF(warga_negara='WNA' AND jk='P',1,0)) AS wna_p
				FROM v_penduduk WHERE 
				id_kecamatan=id_kecamatan_sebelumnya AND id_desa <> id_desa_sebelumnya 
				and status_kependudukan='2'
				AND YEAR(regdate) = $tahun AND MONTH(regdate)=$bulan";
		$res = $this->db->query($sql);
		if(!$res) { 
		 echo $this->db->last_query(); 
		 echo mysql_error();
			}
		 return $res->row();
	 }
	 
	 function pendatang_antar_kecamatan($bulan) {
		 $tahun = date("Y");
	 	$sql="SELECT 
				SUM(IF(warga_negara='WNI' AND jk='L',1,0)) AS wni_l 
				,SUM(IF(warga_negara='WNI' AND jk='P',1,0)) AS wni_p
				
				,SUM(IF(warga_negara='WNA' AND jk='L',1,0)) AS wna_l 
				,SUM(IF(warga_negara='WNA' AND jk='P',1,0)) AS wna_p
				FROM v_penduduk WHERE 
				 id_kota = id_kota_sebelumnya AND id_kecamatan<>id_kecamatan_sebelumnya
				and status_kependudukan='2'  
				AND YEAR(regdate) = $tahun AND MONTH(regdate)=$bulan";
		$res = $this->db->query($sql);
		// echo $this->db->last_query();
		 return $res->row();
	 }
	 
	function pendatang_antar_kota($bulan) {
		 $tahun = date("Y");
	 	$sql="SELECT 
				SUM(IF(warga_negara='WNI' AND jk='L',1,0)) AS wni_l 
				,SUM(IF(warga_negara='WNI' AND jk='P',1,0)) AS wni_p
				
				,SUM(IF(warga_negara='WNA' AND jk='L',1,0)) AS wna_l 
				,SUM(IF(warga_negara='WNA' AND jk='P',1,0)) AS wna_p
				FROM v_penduduk WHERE 
				id_kota <> id_kota_sebelumnya and id_provinsi = id_provinsi_sebelumnya
				and status_kependudukan='2'
				AND YEAR(regdate) = $tahun AND MONTH(regdate)=$bulan";
		$res = $this->db->query($sql);
		// echo $this->db->last_query();
		 return $res->row();
	 }	 
	 
	 function pendatang_antar_provinsi($bulan) {
		 $tahun = date("Y");
	 	$sql="SELECT 
				SUM(IF(warga_negara='WNI' AND jk='L',1,0)) AS wni_l 
				,SUM(IF(warga_negara='WNI' AND jk='P',1,0)) AS wni_p
				
				,SUM(IF(warga_negara='WNA' AND jk='L',1,0)) AS wna_l 
				,SUM(IF(warga_negara='WNA' AND jk='P',1,0)) AS wna_p
				FROM v_penduduk WHERE 
				id_provinsi <> id_provinsi_sebelumnya
				and status_kependudukan='2'
				AND YEAR(regdate) = $tahun AND MONTH(regdate)=$bulan";
		$res = $this->db->query($sql);
		// echo $this->db->last_query();
		 return $res->row();
	 }
	  function pendatang_antar_negara($bulan) {
		 $tahun = date("Y");
	 	$sql="SELECT 
				SUM(IF(warga_negara='WNI' AND jk='L',1,0)) AS wni_l 
				,SUM(IF(warga_negara='WNI' AND jk='P',1,0)) AS wni_p
				
				,SUM(IF(warga_negara='WNA' AND jk='L',1,0)) AS wna_l 
				,SUM(IF(warga_negara='WNA' AND jk='P',1,0)) AS wna_p
				FROM v_penduduk WHERE 
				jenis_kedatangan = 'ln'
				and status_kependudukan='2'
				AND YEAR(regdate) = $tahun AND MONTH(regdate)=$bulan";
		$res = $this->db->query($sql);
		// echo $this->db->last_query();
		 return $res->row();
	 }
	 
	 function pendatang_jumlah($bulan) {
		 $tahun = date("Y");
	 	$sql="SELECT 
				SUM(IF(warga_negara='WNI' AND jk='L',1,0)) AS wni_l 
				,SUM(IF(warga_negara='WNI' AND jk='P',1,0)) AS wni_p
				
				,SUM(IF(warga_negara='WNA' AND jk='L',1,0)) AS wna_l 
				,SUM(IF(warga_negara='WNA' AND jk='P',1,0)) AS wna_p
				FROM v_penduduk 
				WHERE 
				status_kependudukan = '2' 
				AND YEAR(regdate) = $tahun AND MONTH(regdate)=$bulan";
		$res = $this->db->query($sql);
		// echo $this->db->last_query();
		 return $res->row();
	 }
	 
	 
	 
	 function pindah_antar_desa($bulan) {
		 $tahun = date("Y");
	 	$sql="SELECT 
			SUM(IF(warga_negara='WNI' AND jk='L',1,0)) AS wni_l 
			,SUM(IF(warga_negara='WNI' AND jk='P',1,0)) AS wni_p
			
			,SUM(IF(warga_negara='WNA' AND jk='L',1,0)) AS wna_l 
			,SUM(IF(warga_negara='WNA' AND jk='P',1,0)) AS wna_p
			
			FROM 
			v_pindah_penduduk pp
			JOIN v_penduduk2 p ON p.id_penduduk = pp.`id_penduduk`
			WHERE  
			status_kependudukan = '3' 
			AND p.id_kecamatan=pp.id_kecamatan AND p.id_desa <> pp.id_desa
				AND YEAR(tgl_pindah) = $tahun AND MONTH(tgl_pindah)=$bulan";
		$res = $this->db->query($sql);
		//echo $this->db->last_query();
		 return $res->row();
	 }
	  
	 function pindah_antar_kecamatan($bulan) {
		 $tahun = date("Y");
	 	$sql="SELECT 
			SUM(IF(warga_negara='WNI' AND jk='L',1,0)) AS wni_l 
			,SUM(IF(warga_negara='WNI' AND jk='P',1,0)) AS wni_p
			
			,SUM(IF(warga_negara='WNA' AND jk='L',1,0)) AS wna_l 
			,SUM(IF(warga_negara='WNA' AND jk='P',1,0)) AS wna_p
			
			FROM 
			v_pindah_penduduk pp
			JOIN v_penduduk2 p ON p.id_penduduk = pp.`id_penduduk`
			WHERE  
			status_kependudukan = '3' 
			AND p.id_kota=pp.id_kota AND p.id_kecamatan <> pp.id_kecamatan
			AND YEAR(tgl_pindah) = $tahun AND MONTH(tgl_pindah)=$bulan";
		$res = $this->db->query($sql);
		 
		return $res->row();
	 }
	 
	 
	 function pindah_antar_kota($bulan) {
		 $tahun = date("Y");
	 	$sql="SELECT 
				IFNULL(SUM(IF(warga_negara='WNI' AND jk='L',1,0)),0) AS wni_l 
				,IFNULL(SUM(IF(warga_negara='WNI' AND jk='P',1,0)),0) AS wni_p
				
				,IFNULL(SUM(IF(warga_negara='WNA' AND jk='L',1,0)),0) AS wna_l 
				,IFNULL(SUM(IF(warga_negara='WNA' AND jk='P',1,0)),0) AS wna_p
				
				FROM 
				v_pindah_penduduk pp
				LEFT JOIN v_penduduk2 p ON p.id_penduduk = pp.`id_penduduk`
				WHERE  
				status_kependudukan = '3' 
				AND p.id_kota<>pp.id_kota AND p.id_provinsi = pp.id_provinsi
				AND YEAR(tgl_pindah) = $tahun AND MONTH(tgl_pindah)=$bulan ";
		$res = $this->db->query($sql);
		 
		return $res->row();
	 }
	 
	 
	 function pindah_antar_provinsi($bulan) {
		 $tahun = date("Y");
	 	$sql="SELECT 
				IFNULL(SUM(IF(warga_negara='WNI' AND jk='L',1,0)),0) AS wni_l 
				,IFNULL(SUM(IF(warga_negara='WNI' AND jk='P',1,0)),0) AS wni_p
				
				,IFNULL(SUM(IF(warga_negara='WNA' AND jk='L',1,0)),0) AS wna_l 
				,IFNULL(SUM(IF(warga_negara='WNA' AND jk='P',1,0)),0) AS wna_p
				
				FROM 
				v_pindah_penduduk pp
				LEFT JOIN v_penduduk2 p ON p.id_penduduk = pp.`id_penduduk`
				WHERE  
				status_kependudukan = '3' 
				  AND p.id_provinsi <> pp.id_provinsi
				AND YEAR(tgl_pindah) = $tahun AND MONTH(tgl_pindah)=$bulan";
		$res = $this->db->query($sql);
		 
		return $res->row();
	 }
	 
	  function pindah_antar_negara($bulan) {
		 $tahun = date("Y");
	 	$sql="SELECT 
				IFNULL(SUM(IF(warga_negara='WNI' AND jk='L',1,0)),0) AS wni_l 
				,IFNULL(SUM(IF(warga_negara='WNI' AND jk='P',1,0)),0) AS wni_p
				
				,IFNULL(SUM(IF(warga_negara='WNA' AND jk='L',1,0)),0) AS wna_l 
				,IFNULL(SUM(IF(warga_negara='WNA' AND jk='P',1,0)),0) AS wna_p
				
				FROM 
				surat_pindah pp
				LEFT JOIN v_penduduk2 p ON p.id_penduduk = pp.`id_penduduk`
				WHERE  
				status_kependudukan = '3' 
				AND pindah_jenis = 'ln' 
				 AND YEAR(tgl_pindah) = $tahun AND MONTH(tgl_pindah)=$bulan";
		$res = $this->db->query($sql);
		//echo $this->db->last_query(); 
		return $res->row();
	 }
	 
	 
	  function pindah_jumlah($bulan) {
		 $tahun = date("Y");
	 	$sql="SELECT 
				IFNULL(SUM(IF(warga_negara='WNI' AND jk='L',1,0)),0) AS wni_l 
				,IFNULL(SUM(IF(warga_negara='WNI' AND jk='P',1,0)),0) AS wni_p
				
				,IFNULL(SUM(IF(warga_negara='WNA' AND jk='L',1,0)),0) AS wna_l 
				,IFNULL(SUM(IF(warga_negara='WNA' AND jk='P',1,0)),0) AS wna_p
				
				FROM 
				surat_pindah pp
				LEFT JOIN v_penduduk2 p ON p.id_penduduk = pp.`id_penduduk`
				WHERE  
				status_kependudukan = '3'  
				 AND YEAR(tgl_pindah) = $tahun AND MONTH(tgl_pindah)=$bulan";
		$res = $this->db->query($sql);
		 
		return $res->row();
	 }
}
