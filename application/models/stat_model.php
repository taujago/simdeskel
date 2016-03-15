<?php 
class stat_model extends CI_Model {

	function __construct() {
		parent::__construct();
	}


	function statistik_depan() {
		$stat = array();
		// cari angka kelahiran dulu . 

		$sql = "SELECT SUM(IF(p.jk='L',1,0)) AS l , 
				SUM(IF(p.jk='P',1,0)) AS p, SUM(IF(p.jk='L',1,0)) +  SUM(IF(p.jk='P',1,0))  AS jumlah
				FROM surat_kelahiran  sk
				LEFT JOIN penduduk  p ON p.`id_penduduk` = sk.`id_penduduk`";
		$res = $this->db->query($sql);
		if($res->num_rows() == 0 ) {
				$stat['kelahiran']['p'] =0;
				$stat['kelahiran']['l'] = 0;
				$stat['kelahiran']['jumlah'] = 0;
		}
		else { 
		$data = $res->row();
		$stat['kelahiran']['p'] = $data->p;
		$stat['kelahiran']['l'] = $data->l;
		$stat['kelahiran']['jumlah'] = $data->jumlah;
		}

		/// pendatang 
		$sql="SELECT SUM(IF(jk='L',1,0)) AS l, SUM(IF(jk='P',1,0)) AS p, 
			SUM(IF(jk='L',1,0))  +  SUM(IF(jk='P',1,0)) AS jumlah
			FROM penduduk WHERE status_kependudukan ='2' AND hidup_mati='1'";
		$res = $this->db->query($sql);

		if($res->num_rows() == 0 ) {
				$stat['pendatang']['p'] =0;
				$stat['pendatang']['l'] = 0;
				$stat['pendatang']['jumlah'] = 0;
		}
		else {
		$data= $res->row();
				$stat['pendatang']['p'] = $data->p;
				$stat['pendatang']['l'] =  $data->l;
				$stat['pendatang']['jumlah'] =  $data->jumlah;
		}

		// mati 
		$sql = "SELECT SUM(IF(jk='L',1,0)) AS l, SUM(IF(jk='P',1,0)) AS p, 
				SUM(IF(jk='L',1,0))  +  SUM(IF(jk='P',1,0)) AS jumlah
				FROM penduduk WHERE  hidup_mati='0'";
		$res = $this->db->query($sql);

		if($res->num_rows() == 0 ) {
				$stat['mati']['p'] =0;
				$stat['mati']['l'] = 0;
				$stat['mati']['jumlah'] = 0;
		}
		else {
		$data= $res->row();
				$stat['mati']['p'] = $data->p;
				$stat['mati']['l'] =  $data->l;
				$stat['mati']['jumlah'] =  $data->jumlah;
		}

		$sql = "SELECT IFNULL(SUM(IF(jk='L',1,0)),0) AS l, IFNULL(SUM(IF(jk='P',1,0)),0) AS p, 
				IFNULL(SUM(IF(jk='L',1,0)),0) + IFNULL(SUM(IF(jk='P',1,0)),0)  AS jumlah
				FROM penduduk WHERE  status_kependudukan = '3'";
		$res = $this->db->query($sql);
		$data = $res->row();
		$stat['pindah']['p'] = $data->p;
		$stat['pindah']['l'] =  $data->l;
		$stat['pindah']['jumlah'] =  $data->jumlah;
		
		echo $this->db->last_query();
		return $stat;
	}


	function stat_warga_negara() {
		$sql="SELECT IF(jk='L','Laki-laki','Perempuan') AS jk , SUM(IF(warga_negara='WNI',1,0))  AS wni, SUM(IF(warga_negara='WNA',1,0)) AS wna,
			SUM(IF(warga_negara='WNI',1,0)) +  SUM(IF(warga_negara='WNA',1,0)) AS jumlah
			FROM penduduk WHERE status_kependudukan ='1' AND hidup_mati='1'
			GROUP BY jk";
		$res = $this->db->query($sql);
		return $res;
	}

}
?>