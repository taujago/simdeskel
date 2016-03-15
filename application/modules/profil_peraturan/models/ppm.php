<?php  if (!defined('BASEPATH')) exit('No direct script access allowed');

class ppm extends CI_Model 
{

	function __construct()
	{
		parent::__construct();
       // $this->_table = 'country';
	}
    
	
	 function get_data($param)
	{		
		
 
		//print_r($param);

		$this->db->select('*')->from('profil_peraturan')		 
		->where("deleted","0");
 		
 		if($param['tentang']<> 'x') {
 			$this->db->like('tentang',$param['tentang']);
 		}

 		if($param['tgl_awal'] <> 'x' and $param['tgl_akhir'] <> 'x') {
 			$awal = flipdate($param['tgl_awal']);
 			$akhir = flipdate($param['tgl_akhir']);
 			$this->db->where(" tanggal between '$awal' and '$akhir'",null,false);
 		}   

 		/*

 		if($param['nama_ibu']<> 'x') {
 			$this->db->like('ibu_nama',$param['nama_ibu']);
 		}

 		if($param['nama_bapak']<> 'x') {
 			$this->db->like('bapak_nama',$param['nama_bapak']);
 		}
 		if($param['jk']<> 'x') {
 			$this->db->where('jk',$param['jk']);
 		} */
 
	 	 
		($param['limit'] != null ? $this->db->limit($param['limit']['end'], $param['limit']['start']) : '');
		//$this->db->limit($param['limit']['end'], $param['limit']['start']) ;
       
        ($param['sort_by'] != null) ? $this->db->order_by($param['sort_by'], $param['sort_direction']) :'';
        
		$res = $this->db->get();
		//echo $this->db->last_query();
 		return $res;
	}
	
	function get_data_per_tahun($tahun) {
		$this->db->where("year(tanggal) = $tahun ",null,false);
    	$this->db->order_by("tanggal");
    	$res = $this->db->get("profil_peraturan");
    	return $res;
	}
	
}
