<?php  if (!defined('BASEPATH')) exit('No direct script access allowed');

class kecm extends CI_Model 
{

	function __construct()
	{
		parent::__construct();
       // $this->_table = 'country';
	}
    
	
	 function get_data($param)
	{		
		 
		$this->db->select('kec.*,k.id as id_kota, k.kota , p.id as id_provinsi, p.provinsi  ')
		->from('tiger_kota k')
		->join('tiger_provinsi p','p.id=k.id_provinsi') 
		->join('tiger_kecamatan kec','kec.id_kota=k.id');
		 
	 	if($param['id_provinsi'] <> 'x') {
	 		$this->db->where('id_provinsi',$param['id_provinsi']);
	 	}
	 	if($param['id_kota'] <> 'x') {
	 		$this->db->where('id_kota',$param['id_kota']);
	 	}
	 	if($param['kecamatan'] <> 'x') {
	 		$this->db->like('kecamatan',$param['kecamatan']);
	 	}

		($param['limit'] != null ? $this->db->limit($param['limit']['end'], $param['limit']['start']) : '');
		//$this->db->limit($param['limit']['end'], $param['limit']['start']) ;
       
        ($param['sort_by'] != null) ? $this->db->order_by($param['sort_by'], $param['sort_direction']) :'';
        
		$res = $this->db->get();
		//echo $this->db->last_query();
 		return $res;
	}
	
	
	
}
