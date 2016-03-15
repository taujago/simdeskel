<?php  if (!defined('BASEPATH')) exit('No direct script access allowed');

class b4m extends core_model 
{

	function __construct()
	{
		parent::__construct();
       // $this->_table = 'country';
	}
    
	 
	
	function get_data_per_tahun($tahun) {
		$sql="SELECT p.* , s.`alamat` AS sementara_alamat 
			 FROM v_penduduk p 
			JOIN penduduk s ON  p.`sementara_id_tujuan` = s.`id_penduduk`
			WHERE p.status_kependudukan = '1' AND p.hidup_mati = '1' 
			AND YEAR(p.regdate) <= $tahun
			and p.id_desa = ".$this->session->userdata("operator_id_desa") ;
		 //	echo $sql;

		$res = $this->db->query($sql);
    	return $res;
	}

 
	
}
