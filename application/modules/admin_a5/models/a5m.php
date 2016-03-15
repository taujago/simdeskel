<?php  if (!defined('BASEPATH')) exit('No direct script access allowed');

class a5m extends CI_Model 
{

	function __construct()
	{
		parent::__construct();
       // $this->_table = 'country';
	}
    
	
	 function get_data($param)
	{		
		
 
		//print_r($param);

		$this->db->select('*')->from('admin_a5')	 
		->where("deleted","0")->where("id_desa",$this->session->userdata("operator_id_desa"));
 		
 		if($param['nama']<> 'x') {
 			$this->db->like('asal_tanah',$param['nama']);
 		}
/*
 		if($param['tgl_awal'] <> 'x' and $param['tgl_akhir'] <> 'x') {
 			$awal = flipdate($param['tgl_awal']);
 			$akhir = flipdate($param['tgl_akhir']);
 			$this->db->where(" tanggal between '$awal' and '$akhir'",null,false);
 		}   
*/
 		 
 
	 	 
		($param['limit'] != null ? $this->db->limit($param['limit']['end'], $param['limit']['start']) : '');
		//$this->db->limit($param['limit']['end'], $param['limit']['start']) ;
       
        ($param['sort_by'] != null) ? $this->db->order_by($param['sort_by'], $param['sort_direction']) :'';
        
		$res = $this->db->get();
		//echo $this->db->last_query();
 		return $res;
	}
	
	function get_data_per_tahun($tahun) {
		$this->db->select('*')->from('admin_a5')	 
		->where("deleted","0")->where("id_desa",$this->session->userdata("operator_id_desa"));
		$res = $this->db->get();
    	return $res;
	}
	
}
