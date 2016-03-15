<?php  if (!defined('BASEPATH')) exit('No direct script access allowed');

class ptm extends CI_Model 
{

	function __construct()
	{
		parent::__construct();
       // $this->_table = 'country';
	}
    
	
	 function get_data($param)
	{		
		
 
		//print_r($param);

		$this->db->select('*')->from('v_profil_tanah')		 
		->where("deleted","0");
 		
 		if($param['asal']<> 'x') {
 			$this->db->like('asal',$param['asal']);
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
		 $sql=" 
				SELECT id,tanggal, asal, no_sertifikat, luas, kelas, 
				IF(tkd_id='1','Ya','') AS asli,
				IF(tkd_id='2','Ya','') AS pemerintah,
				IF(tkd_id='3','Ya','') AS provinsi,
				IF(tkd_id='4','Ya','') AS kota,
				IF(tkd_id='5','Ya','') AS lain, 

				IF(tkd_id_jenis='1','Ya','') AS sawah,
				IF(tkd_id_jenis='2','Ya','') AS tegal,
				IF(tkd_id_jenis='3','Ya','') AS kebun,
				IF(tkd_id_jenis='4','Ya','') AS tambak,
				IF(tkd_id_jenis='5','Ya','') AS tanah,

				IF(patok='1','Ada','') AS patok_ada,
				IF(patok='0','Tidak Ada','') AS patok_tidak_ada,

				IF(papan_nama='1','Ada','') AS papan_nama_ada,
				IF(papan_nama='0','Tidak Ada','') AS papan_nama_tidak_ada,
				lokasi, peruntukan 
				FROM  v_profil_tanah ";
			$sql.= " where year(tanggal) <= $tahun";
		$res = $this->db->query($sql);
    	return $res;
	}
	
}
