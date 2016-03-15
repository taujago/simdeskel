<?php  if (!defined('BASEPATH')) exit('No direct script access allowed');

class mkp extends CI_Model 
{

	function __construct()
	{
		parent::__construct();
       // $this->_table = 'country';
	}
    
	function arr_kategori(){
		$arr=array('1'=>"Tempat Persalinan", '2'=>"Pertolongan Persalinan");
		return $arr;
	}
	
	 function get_data($param)
	{		
		
 
		//print_r($param);

		$this->db->select('*')->from('master_kualitas_persalinan');
		$this->db->where('deleted','0');
	 	 
		($param['limit'] != null ? $this->db->limit($param['limit']['end'], $param['limit']['start']) : '');
		//$this->db->limit($param['limit']['end'], $param['limit']['start']) ;
       
        ($param['sort_by'] != null) ? $this->db->order_by($param['sort_by'], $param['sort_direction']) :'';
        
		$res = $this->db->get();
		//echo $this->db->last_query();
 		return $res;
	}
	
	
	
}
