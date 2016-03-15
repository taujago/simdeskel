<?php  if (!defined('BASEPATH')) exit('No direct script access allowed');

class desm extends CI_Model 
{

	function __construct()
	{
		parent::__construct();
       // $this->_table = 'country';
	}
    
	
	 function get_data($param)
	{		
		 
		$this->db->select('*')->from('lokasi');
		 
	 	if($param['id_provinsi'] <> 'x') {
	 		$this->db->where('id_provinsi',$param['id_provinsi']);
	 	}
	 	if($param['id_kota'] <> 'x') {
	 		$this->db->where('id_kota',$param['id_kota']);
	 	}
	 	if($param['id_kecamatan'] <> 'x') {
	 		$this->db->where('id_kecamatan',$param['id_kecamatan']);
	 	}
	 	if($param['desa'] <> 'x') {
	 		$this->db->like('desa',$param['desa']);
	 	}

		($param['limit'] != null ? $this->db->limit($param['limit']['end'], $param['limit']['start']) : '');
		//$this->db->limit($param['limit']['end'], $param['limit']['start']) ;
       
        ($param['sort_by'] != null) ? $this->db->order_by($param['sort_by'], $param['sort_direction']) :'';
        
		$res = $this->db->get();


 		return $res;
	}
	
	
	
}

