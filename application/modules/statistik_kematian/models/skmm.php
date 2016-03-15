<?php  if (!defined('BASEPATH')) exit('No direct script access allowed');

class skmm extends CI_Model 
{

	function __construct()
	{
		parent::__construct();
       // $this->_table = 'country';
	}
    
	
	 function get_data($param)
	{		
		
		/*SELECT dus.*, l.id_desa, l.desa, l.id_kecamatan, l.kecamatan, l.id_kota, l.kota
FROM tiger_dusun dus
JOIN  lokasi l ON l.id_desa = dus.`id_desa` */


		$this->db->select('*')->from('v_kematian');
 		
 		if($param['nama']<> 'x') {
 			$this->db->like('nama',$param['nama']);
 		}

 		if($param['nama_ibu']<> 'x') {
 			$this->db->like('ibu_nama',$param['nama_ibu']);
 		}

 		if($param['nama_bapak']<> 'x') {
 			$this->db->like('bapak_nama',$param['nama_bapak']);
 		}
 		if($param['jk']<> 'x') {
 			$this->db->where('jk',$param['jk']);
 		}
 
 	
		($param['limit'] != null ? $this->db->limit($param['limit']['end'], $param['limit']['start']) : '');
		//$this->db->limit($param['limit']['end'], $param['limit']['start']) ;
       
        ($param['sort_by'] != null) ? $this->db->order_by($param['sort_by'], $param['sort_direction']) :'';
        
		$res = $this->db->get();
		//echo $this->db->last_query();
 		return $res;
	}
	
	
	function get_stat($jk) {
		$this->db->where("jk",$jk);
		$res = $this->db->get("v_kematian");
		return $res->num_rows();
	}
	
	
}
