<?php  if (!defined('BASEPATH')) exit('No direct script access allowed');

class kotam extends CI_Model 
{

	function __construct()
	{
		parent::__construct();
       // $this->_table = 'country';
	}
    
	
	 function get_data($param)
	{		
		 
		$this->db->select('k.*, p.id as id_provinsi, p.provinsi  ')->from('tiger_kota k')
		->join('tiger_provinsi p','p.id=k.id_provinsi') ;
		 
	 	if($param['id_provinsi'] <> 'x') {
	 		$this->db->where('id_provinsi',$param['id_provinsi']);
	 	}
	 	if($param['kota'] <> 'x') {
	 		$this->db->like('kota',$param['kota']);
	 	}

		($param['limit'] != null ? $this->db->limit($param['limit']['end'], $param['limit']['start']) : '');
		//$this->db->limit($param['limit']['end'], $param['limit']['start']) ;
       
        ($param['sort_by'] != null) ? $this->db->order_by($param['sort_by'], $param['sort_direction']) :'';
        
		$res = $this->db->get();
		//echo $this->db->last_query();
 		return $res;
	}
	
	
	
}
