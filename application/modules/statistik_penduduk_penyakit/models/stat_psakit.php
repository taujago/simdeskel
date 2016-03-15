<?php  if (!defined('BASEPATH')) exit('No direct script access allowed');
 
class stat_psakit extends CI_Model 
{

	function __construct()
	{
		parent::__construct();
       // $this->_table = 'country'; 
	}
    
	
	 function get_data($param)
	{		
		 
		$this->db->select('*')->from('v_penduduk p')
		->join("penduduk_jenis_penyakit s","s.id_penduduk=p.id_penduduk");
	 
	 	//if($param['id_jenis_penyakit']<>'x') {
	 	$this->db->where("s.id_jenis_penyakit",$param['id_jenis_penyakit']);
	 	//}
		
		$this->db->where("hidup_mati",1)->where("status_kependudukan<>3",NULL,FALSE);

		($param['limit'] != null ? $this->db->limit($param['limit']['end'], $param['limit']['start']) : '');
		//$this->db->limit($param['limit']['end'], $param['limit']['start']) ;
       
        ($param['sort_by'] != null) ? $this->db->order_by($param['sort_by'], $param['sort_direction']) :'';
        
		$res = $this->db->get();
		//echo $this->db->last_query(); exit;
 		return $res;
	}
	
	
 	function get_stat($jk) {
		$this->db->where("hidup_mati","1")
		->where("status_kependudukan<>3",NULL,FALSE);
		$this->db->where("jk",$jk);
		$res = $this->db->get("v_penduduk");
		return $res->num_rows();
	}
	
	
	function get_penduduk_perdusun($id_dusun) {
		$this->db->where("id_dusun",$id_dusun);
		$this->db->where("hidup_mati","1");
		$this->db->where("status_kependudukan <> '3'",NULL,FALSE);
		$res = $this->db->get("v_penduduk");
		return $res;
	}
	
	
}
