<?php  if (!defined('BASEPATH')) exit('No direct script access allowed');

class stat_l_m extends CI_Model 
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


		$this->db->select('*')->from('v_kelahiran');
 		
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
 
	 	/*if($param['id_kecamatan'] <> 'x') {
	 		$this->db->where('id_kecamatan',$param['id_kecamatan']);
	 	}
	 	if($param['id_desa'] <> 'x') {
	 		$this->db->where('id_desa',$param['id_desa']);
	 	}
	 	if($param['dusun'] <> 'x' ) {
	 		$this->db->like("dusun",$param['dusun']);
	 	}

	 	$this->db->where("l.id_desa",$this->session->userdata("operator_id_desa"));
		*/ 
		($param['limit'] != null ? $this->db->limit($param['limit']['end'], $param['limit']['start']) : '');
		//$this->db->limit($param['limit']['end'], $param['limit']['start']) ;
       
        ($param['sort_by'] != null) ? $this->db->order_by($param['sort_by'], $param['sort_direction']) :'';
        
		$res = $this->db->get();
		//echo $this->db->last_query();
 		return $res;
	}
	
	function get_stat($jk) {
		$this->db->where("jk",$jk);
		$res = $this->db->get("v_kelahiran");
		return $res->num_rows();
	}
	
}
