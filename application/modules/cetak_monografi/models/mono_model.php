<?php  if (!defined('BASEPATH')) exit('No direct script access allowed');

class mono_model extends CI_Model 
{

	function __construct()
	{
		parent::__construct();
       // $this->_table = 'country';
	}
    
	 

function get_batas_wilayah(){
	$res = $this->db->get('profil_batas_wilayah');
	return $res;
}


function get_monografi(){
	$res = $this->db->get("profil_monografi"); 
	return $res->row_array();
}


function get_data_penduduk_per_jk(){
	$sql="SELECT COUNT(IF(jk='L',1,NULL)) AS L, COUNT(IF(jk='P',1,NULL)) AS P 
			FROM penduduk
			WHERE  hidup_mati='1' AND status_kependudukan not in  ('3')";
	$res = $this->db->query($sql); 
	return $res->row_array();
}


function get_data_kk(){
	$sql="SELECT COUNT(*) AS KK 
			FROM penduduk
			WHERE  hidup_mati='1' AND status_kependudukan not in  ('3')
			AND kepala_keluarga = '1'";
	$res = $this->db->query($sql); 
	return $res->row_array();
}


function get_data_per_warga_negara(){
	$sql="SELECT COUNT(IF(warga_negara='WNI',1,NULL)) AS WNI, 
				COUNT(IF(warga_negara='WNA',1,NULL)) AS WNA 
				FROM penduduk
				WHERE  hidup_mati='1' AND status_kependudukan not in  ('3')";
	$res = $this->db->query($sql); 
	return $res->row_array();
}

 
function get_data_penduduk_per_agama(){
	 $sql="SELECT  a.*, COUNT(p.id_penduduk) AS jumlah  FROM agama a 
			LEFT JOIN ( SELECT * FROM penduduk  WHERE  hidup_mati='1' AND status_kependudukan not in  ('3') ) p ON a.`id_agama` = p.`id_agama` 
			WHERE a.`deleted` = 0 
			GROUP BY a.`id_agama`";
	$res = $this->db->query($sql);
	// echo $this->db->last_query(); exit;
	return $res;
}


function get_penduduk_usia_pendidikan(){
	$sql="SELECT 
		COUNT(IF(umur >= 4 AND umur <=6  ,1,NULL)) u_04_06,
		COUNT(IF(umur >= 7 AND umur <=12  ,1,NULL)) u_07_12,
		COUNT(IF(umur >= 13 AND umur <=15  ,1,NULL)) u_13_15 	
		FROM v_penduduk2 p
		WHERE p.hidup_mati='1' AND status_kependudukan NOT IN  ('3')";
	$res = $this->db->query($sql);
	return $res->row_array();
}


function get_penduduk_usia_kerja(){
	$sql="SELECT 
		COUNT(IF(umur >= 20 AND umur <=60  ,1,NULL)) u_20_60,
		COUNT(IF(umur >= 7 AND umur <=12  ,1,NULL)) u_07_12,
		COUNT(IF(umur >= 13 AND umur <=15  ,1,NULL)) u_13_15 	
		FROM v_penduduk2 p
		WHERE p.hidup_mati='1' AND status_kependudukan NOT IN  ('3')";
	$res = $this->db->query($sql);
	return $res->row_array();
}

function get_penduduk_per_pekerjaan(){
	$sql="SELECT * FROM ( 
			SELECT p.*, COUNT(pdk.id_penduduk) AS jumlah  FROM pekerjaan p 
			LEFT JOIN (
			SELECT * FROM penduduk WHERE hidup_mati = '1' AND status_kependudukan <> '3' 
			)  pdk 
			ON p.`id_pekerjaan` = pdk.`id_pekerjaan` 
			WHERE p.`deleted` = 0 
			GROUP BY p.`id_pekerjaan` ) xx
			WHERE xx.jumlah > 0 ";
	$res  = $this->db->query($sql);
	return $res;
}


function get_jumlah_lahir($tahun) {
	$sql="SELECT COUNT(*) as jumlah FROM surat_kelahiran 
		WHERE YEAR(tanggal)  = '$tahun' and  deleted='0'";
	$res = $this->db->query($sql); 
	return $res->row_array();
}


function get_jumlah_mati($tahun) {
	$sql="SELECT COUNT(*) as jumlah FROM surat_kematian
		WHERE YEAR(tanggal)  = '$tahun' and  deleted='0'";
	$res = $this->db->query($sql); 
	return $res->row_array();
}
		


function get_jumlah_datang($tahun) {
	$sql ="SELECT  COUNT(*) as jumlah  FROM penduduk WHERE status_kependudukan = '2' 
			AND YEAR(regdate) = $tahun";
	$res = $this->db->query($sql); 
	// echo $this->db->last_query();  exit;
	return $res->row_array();
}

// function get_jumlah_datang($tahun) {
// 	$sql ="SELECT  COUNT(*) as jumlah  FROM penduduk WHERE status_kependudukan = '3' 
// 			AND YEAR(regdate) = $tahun";
// 	$res = $this->db->query($sql); 
// 	return $res->row_array();
// }

function get_jumlah_pindah($tahun) {
	$sql = "SELECT COUNT(*)  AS jumlah FROM (
		SELECT tanggal, id_penduduk FROM surat_pindah  
		UNION 
		SELECT tanggal,   spd.`id_penduduk` FROM surat_pindah sp  LEFT JOIN surat_pindah_detail spd ON sp.`id` = spd.id  ) 
		abc 
		WHERE YEAR(abc.tanggal) = $tahun";
	$res = $this->db->query($sql); 
	return $res->row_array();
}

}
