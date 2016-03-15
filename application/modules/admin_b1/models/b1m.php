<?php  if (!defined('BASEPATH')) exit('No direct script access allowed');

class b1m extends core_model 
{

	function __construct()
	{
		parent::__construct();
       // $this->_table = 'country';
	}
    
	
	 function get_data($param)
	{		
		
 
		//print_r($param);

		$this->db->select('*')->from('v_penduduk')->where("hidup_mati","1")
		->where("status_kependudukan <> '3'",null,false)		 
		->where("id_desa",$this->session->userdata("operator_id_desa"));
 		
 		// if($param['tentang']<> 'x') {
 		// 	$this->db->like('tentang',$param['tentang']);
 		// }

 		// if($param['tgl_awal'] <> 'x' and $param['tgl_akhir'] <> 'x') {
 		// 	$awal = flipdate($param['tgl_awal']);
 		// 	$akhir = flipdate($param['tgl_akhir']);
 		// 	$this->db->where(" tanggal between '$awal' and '$akhir'",null,false);
 		// }   

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
		$this->db->where("year(regdate) <= $tahun ",null,false)->where("hidup_mati","1")
		->where("status_kependudukan <> '3'",null,false);
     	$this->db->order_by("no_kk,nama");
    	$res = $this->db->get("v_penduduk");
    	return $res;
	}


	function kedudukan_keluarga($id_penduduk) {
		$arr_sebagai = $this->cm->arr_sebagai;
		
		$this->db->where("id_penduduk",$id_penduduk)->where("aktif","1");
		//$this->db->limit(1);
		$res = $this->db->get("kk_anggota");
		$data  = $res->result_array();
		//print_r($data);
		
		if($data[0]['is_kk'] == "1") {
			return "Kepala Keluarga";
		}
		else if($data[0]['sebagai'] == "") {
			return "";
		}
		else {
			return $arr_sebagai[$data[0]['sebagai']];
		}


	}
	
}
