<?php  if (!defined('BASEPATH')) exit('No direct script access allowed');

class miskinm extends CI_Model 
{

	function __construct()
	{
		parent::__construct();
       // $this->_table = 'country';
	}
    
	
	 function get_data($param)
	{		
		 
		$this->db->select('p.*')->from('v_penduduk p')
		->join("statistik_miskin sm","p.id_penduduk=sm.id_penduduk");
		 
		// $this->db->where("status","1");
		 
	  
	 	$this->db->where('p.id_desa',$param['id_desa']);

	 	 
		
		$this->db->where("hidup_mati",1)->where("status_kependudukan<>'3'",NULL,FALSE)->where("tahun", date("Y") );
		
		if($param['nama'] <> 'x') {
			$this->db->like('p.nama',$param['nama']);
			
		}
		if($param['nik'] <> 'x') {
			$this->db->where('p.nik',$param['nik']);			
		}
		if($param['id_dusun'] <> 'x') {
			$this->db->where('p.id_dusun',$param['id_dusun']);			
		}
		if($param['rt'] <> 'x') {
			$this->db->where('p.rt',$param['rt']);			
		}
		
		if($param['rw'] <> 'x') {
			$this->db->where('p.rw',$param['rw']);			
		}

		($param['limit'] != null ? $this->db->limit($param['limit']['end'], $param['limit']['start']) : '');
		//$this->db->limit($param['limit']['end'], $param['limit']['start']) ;
       
        ($param['sort_by'] != null) ? $this->db->order_by($param['sort_by'], $param['sort_direction']) :'';
        
		$res = $this->db->get();
		//echo $this->db->last_query();
 		return $res;
	}
	
	
 	function get_stat($jk) {
		$this->db->select('p.*')->from('v_penduduk p')
		->join("statistik_miskin sm","p.id_penduduk=sm.id_penduduk");
		$this->db->where('p.id_desa',$this->session->userdata("operator_id_desa"));
		$this->db->where("hidup_mati","1")
		->where("status_kependudukan<> 3",NULL,FALSE);
		$this->db->where("jk",$jk);
		$res = $this->db->get();
		return $res->num_rows();
	}
	
	
}
