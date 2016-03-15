<?php  if (!defined('BASEPATH')) exit('No direct script access allowed');

class penbm extends CI_Model 
{

	function __construct()
	{
		parent::__construct();
       // $this->_table = 'country';
	}
    
	
	 function get_data($param)
	{		
		 
		$this->db->select('*')->from('v_penduduk p');
		 
		// $this->db->where("status","1");
		 
	  
	 	$this->db->where('p.id_desa',$param['id_desa']);
		$this->db->where("p.umur <= 5",NULL,false);
	 	 
		
		$this->db->where("hidup_mati",1)->where("status_kependudukan <> 3",NULL,false);

		($param['limit'] != null ? $this->db->limit($param['limit']['end'], $param['limit']['start']) : '');
		//$this->db->limit($param['limit']['end'], $param['limit']['start']) ;
       
        ($param['sort_by'] != null) ? $this->db->order_by($param['sort_by'], $param['sort_direction']) :'';
        
		$res = $this->db->get();
		//echo $this->db->last_query();
 		return $res;
	}
	
	
 	function get_stat($jk) {
		$this->db->where("hidup_mati","1")
		->where("status_kependudukan <> 3",NULL, false)->where("umur <=5",NULL,FALSE);
		$this->db->where("jk",$jk);
		$res = $this->db->get("v_penduduk");
		return $res->num_rows();
	}
	
	
}
