<?php  if (!defined('BASEPATH')) exit('No direct script access allowed');

class kkm extends CI_Model 
{

	function __construct()
	{
		parent::__construct();
       // $this->_table = 'country';
	}
    
	
	 function get_data($param)
	{		
		 
		$this->db->select('*')->from('v_kk kk');
		 
		 
	 /*	if($param['id_kecamatan'] <> 'x') {
	 		$this->db->where('id_kecamatan',$param['id_kecamatan']);
	 	}
	 	if($param['id_desa'] <> 'x') {
	 		$this->db->where('l.id_desa',$param['id_desa']);
	 	}
	 	if($param['nama'] <> 'x') {
	 		$this->db->like('nama',$param['nama']);
	 	}
 */
		($param['limit'] != null ? $this->db->limit($param['limit']['end'], $param['limit']['start']) : '');
		//$this->db->limit($param['limit']['end'], $param['limit']['start']) ;
       
        ($param['sort_by'] != null) ? $this->db->order_by($param['sort_by'], $param['sort_direction']) :'';
        
		$res = $this->db->get();
		//echo $this->db->last_query();
 		return $res;
	}
	

	function get_data_anggota($param)
	{		
		 
		$this->db->select('*')->from('v_penduduk p')
		->join('kk_anggota kk','kk.id_penduduk=p.id_penduduk')
		->where('kk.no_kk',$param['no_kk']);

		 
 	 
		($param['limit'] != null ? $this->db->limit($param['limit']['end'], $param['limit']['start']) : '');
		//$this->db->limit($param['limit']['end'], $param['limit']['start']) ;
       
        ($param['sort_by'] != null) ? $this->db->order_by($param['sort_by'], $param['sort_direction']) :'';
        
		$res = $this->db->get();
		/*echo $this->db->last_query();
		exit; */
 		return $res;
	}
	
	
}
