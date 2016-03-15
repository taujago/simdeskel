<?php  if (!defined('BASEPATH')) exit('No direct script access allowed');

class penm extends CI_Model 
{

	function __construct()
	{
		parent::__construct();
       // $this->_table = 'country';
	}
    
	
	 function get_data($param)
	{		
		 
		//print_r($param);  
		$this->db->select('*')->from('v_penduduk p');
		 
		 $this->db->where("status","1");
		 
	  
	 	$this->db->where('p.id_desa',$param['id_desa']);

	 	if($param['nama']<>'') {
	 		$this->db->like("nama",$param['nama']);
	 	}

	 	if($param['nik'] <> '') {
	 		$this->db->where("nik",$param['nik']);
	 	} 

	 	if($param['jk']<>'x') {
	 		$this->db->where("jk",$param['jk']);
	 	}

	 	if($param['status_kawin']<>'x') {
	 		$this->db->where("status_kawin",$param['status_kawin']);
	 	}

	 	if($param['id_dusun']<>'x') {
	 		$this->db->where("dusun",$param['id_dusun']);
	 	}

	 	if($param['status_kependudukan']<>'x') {
	 		$this->db->where("status_kependudukan",$param['status_kependudukan']);
	 	}

		($param['limit'] != null ? $this->db->limit($param['limit']['end'], $param['limit']['start']) : '');
		//$this->db->limit($param['limit']['end'], $param['limit']['start']) ;
       
        ($param['sort_by'] != null) ? $this->db->order_by($param['sort_by'], $param['sort_direction']) :'';
        
		$res = $this->db->get();
		// echo $this->db->last_query();
 		return $res;
	}
	
	function get_detail($id)
	{
		$this->db->select('*')->from("penduduk_detail");
		$this->db->where("id_penduduk",$id);
		$res = $this->db->get();
		return $res->row_array();
	}
	function get_m_tambahan($param)
	{
		$id = $param['id_penduduk'];
		$id1 = $param['id1'];//untuk table master
		$id2 = $param['id2'];//untuk table data
		$table = $param['table'];//untuk table data
		$table_m = $param['table_m'];//table master
		$this->db->select('*')->from($table.' as a');
		$this->db->where('a.id_penduduk',$id);
		$this->db->where('a.deleted','0');
	 	$this->db->join($table_m.' as b', 'a.'.$id2.' = b.'.$id1);
		$this->db->join('master_pemasaran_hasil as c', 'a.id_pemasaran_hasil = c.id_pemasaran_hasil');
		$page = $param['page'];
		$lim = $param['limit'];
		$page--;
		$start = $page * $lim;
		//$start++;
		$this->db->limit($lim,$start);
		//$this->db->limit($param['limit']['end'], $param['limit']['start']) ;
       
        ($param['sort_by'] != null) ? $this->db->order_by($param['sort_by'], $param['sort_direction']) :'';
        
		$res = $this->db->get();
		//echo $this->db->last_query();
 		return $res;
	}
	function get_m_galian($param)
	{
		$id = $param['id_penduduk'];
		$id1 = $param['id1'];//untuk table master
		$id2 = $param['id2'];//untuk table data
		$table = $param['table'];//untuk table data
		$table_m = $param['table_m'];//untuk table data
		$this->db->select('*')->from($table.' as a');
		$this->db->where('a.id_penduduk',$id);
		$this->db->where('a.deleted','0');
	 	$this->db->join($table_m.' as b', 'a.'.$id2.' = b.'.$id1);
		$this->db->join('master_satuan as c', 'a.satuan_bahan_galian = c.id_satuan');
		$this->db->join('master_pemasaran_hasil as d', 'a.id_pemasaran_hasil = d.id_pemasaran_hasil');
		($param['limit'] != null ? $this->db->limit($param['limit']['end'], $param['limit']['start']) : '');
		//$this->db->limit($param['limit']['end'], $param['limit']['start']) ;
       
        ($param['sort_by'] != null) ? $this->db->order_by($param['sort_by'], $param['sort_direction']) :'';
        
		$res = $this->db->get();
		//echo $this->db->last_query();
 		return $res;
	}
	function arr_pekerjaan($id)
	{
		$arr = array();
		$this->db->where("id_penduduk",$id);
		$res = $this->db->get("penduduk_pekerjaan");
		foreach($res->result() as $row)
		{
			$arr[] = $row->id_pekerjaan;
		}
		return $arr;
	}
	
	
	function arr_perumahan($id)
	{
		$arr = array();
		$this->db->where("id_penduduk",$id);
		$this->db->where("deleted",'0');
		$res = $this->db->get("penduduk_aset_perumahan");
		foreach($res->result() as $row)
		{
			$arr[] = $row->id_aset_perumahan;
		}
		//echo $this->db->last_query();
		return $arr;
	}
	function cat_perumahan($id)
	{
		$arr = array();
		$this->db->where("deleted",'0');
		$this->db->where("id_aset_perumahan",$id);
		$this->db->select("category");
		$res = $this->db->get("master_aset_perumahan");
		//echo $this->db->last_query();
		foreach($res->result() as $row)
		{
			$arr = $row->category;
		}
		return $arr;
	}
	function cat_cacat($id)
	{
		$arr = array();
		$this->db->where("deleted",'0');
		$this->db->where("id_cacat",$id);
		$this->db->select("cacat_cat");
		$res = $this->db->get("master_cacat");
		//echo $this->db->last_query();
		foreach($res->result() as $row)
		{
			$arr = $row->cacat_cat;
		}
		return $arr;
	}
	function cat_persalinan($id)
	{
		$arr = array();
		$this->db->where("deleted",'0');
		$this->db->where("id_kualitas_persalinan",$id);
		$this->db->select("kualitas_cat");
		$res = $this->db->get("master_kualitas_persalinan");
		//echo $this->db->last_query();
		foreach($res->result() as $row)
		{
			$arr = $row->kualitas_cat;
		}
		return $arr;
	}
	function get_arr($table,$id,$id_penduduk)
	{
		$arr = array();
		$this->db->where("id_penduduk",$id_penduduk);
		$this->db->where("deleted",'0');
		$res = $this->db->get($table);
		foreach($res->result() as $row)
		{
			$arr[] = $row->$id;
		}
		//echo $this->db->last_query();
		return $arr;
	}
	
	function get_val($f1,$f2,$val,$table)
	{
		$this->db->select($f2)->from($table);
		$this->db->where($f1,$val);
		$res = $this->db->get();
		$res1 = array();
		foreach($res->result() as $row)
		{
			$res1 = $row->$f2;
		}
		return $res1;
	}
	
	function get_val_join($f1,$f2,$f_j,$val,$table,$table_j)
	{
		$this->db->select("*")->from($table);
		$this->db->where($f1,$val);
		$this->db->where($table.".deleted","0");
		$this->db->join($table_j,$table.".".$f2." = ".$table_j.".".$f_j);
		$res = $this->db->get();
		$res1 = array();
		$temp = explode("id_",$f2);
		$temp = $temp[1];
		foreach($res->result() as $row)
		{
			$res1[$row->$f2] = $row->$temp;
		}
		return $res1;
	}
	
	function get_val_join2($table1,$table2,$id1,$id2,$id_penduduk){
		$this->db->select("*")->from($table1." as a");
		$this->db->where("a.id_penduduk",$id_penduduk);
		$this->db->where("a.deleted","0");
		$this->db->join($table2." as b","a.".$id1." = b.".$id2);
		$this->db->join("master_pemasaran_hasil as c","a.id_pemasaran_hasil = c.id_pemasaran_hasil");
		$res = $this->db->get();
		return $res->result_object();
	}
	
	function get_all_data($id_penduduk)
	{
		$exc = array("id_penduduk","no_akte","tanggal_akte","id_kepemilikan_perkebunan","id_kepemilikan_hutan");
		$exc1 = array("id_kepemilikan_perkebunan","id_kepemilikan_hutan");
		$arr = $this->get_detail($id_penduduk);
		//ambil data penduduk_detail dan ubah langsung kedalam fix variable dari table master
		foreach($arr as $key=>$val)
		{
			if(!in_array($key,$exc)){
				$temp = explode("id_",$key);
				$f = $temp[1];
				if(empty($val))$table[$f] = null;
				else{
					$temp = $this->get_val($key,$temp[1],$val,"master_".$temp[1]);
					$table[$f] = $temp;
				}
			}
		}
		$table['no_akte'] = !empty($arr['no_akte'])?$arr["no_akte"]:"";
		$table['tanggal_akte'] = !empty($arr['tanggal_akte'])?$arr['tanggal_akte']:"";
		//kepemilikan lahan dan ubah langsung kedalam fix variable dari table master
		foreach($exc1 as $val)
		{
			$temp = explode("id_",$val);
			$f = $temp[1];
			if(!empty($arr[$val])){
				$val1 = $arr[$val];
				$temp = $this->get_val("id_kepemilikan_lahan","kepemilikan_lahan",$val1,"master_kepemilikan_lahan");
				$table[$f] = $temp;
			}
			else{ $table[$f] = null; }
			
		}
		//semua data yang ada didalam table penduduk_detail telah dimasukkan dalam variable dalam bentuk key adalah nama varibale dan value adalah datanya
		
		$this->load->database();
		$db = $this->db->database;
		$que = $this->db->query("SHOW TABLES WHERE tables_in_".$db." LIKE 'penduduk_%' AND tables_in_".$db." NOT LIKE 'penduduk_produksi%' AND tables_in_".$db." NOT LIKE 'penduduk_detail'");
		$arr = array();
		foreach($que->result_array() as $row)
		{
			foreach($row as $key=>$val)
			{
				$arr[] = $val;
			}
		}
		//disini data $arr akan didapat sbg $arr{ [1]=>"penduduk_aset_lainnya", [2]=>"penduduk_lembaga_ekonomi", ... }
		foreach($arr as $val)
		{
			$temp = explode("penduduk_",$val);
			if($temp[1] != "pekerjaan"){
			$temp1 = $this->get_val_join("id_penduduk","id_".$temp[1],"id_".$temp[1],$id_penduduk,$val,"master_".$temp[1]);
			//diambil id_(namatable) untuk diterjemahkan berikutnya
			$table[$val] = $temp1;
			}
		}
		$temp1 = $this->get_val_join("id_penduduk","id_pekerjaan","id_pekerjaan",$id_penduduk,"penduduk_pekerjaan","pekerjaan");
		$table["penduduk_pekerjaan"] = $temp1;
		
		$this->db->select("*")->from("penduduk_produksi_bahan_galian as a");
		$this->db->where("a.id_penduduk",$id_penduduk);
		$this->db->where("a.deleted","0");
		$this->db->join("master_bahan_galian as b","a.id_bahan_galian = b.id_bahan_galian");
		$this->db->join("master_pemasaran_hasil as c","a.id_pemasaran_hasil = c.id_pemasaran_hasil");
		$this->db->join("master_satuan as d","a.satuan_bahan_galian = d.id_satuan");
		$res = $this->db->get();
		$table["penduduk_produksi_bahan_galian"] = $res->result_object();
		
		$table["penduduk_produksi_hutan"] = $this->get_val_join2("penduduk_produksi_hutan","master_produksi_hutan","id_produksi_hutan","id_produksi_hutan",$id_penduduk);
		
		$table["penduduk_produksi_perikanan"] = $this->get_val_join2("penduduk_produksi_perikanan","master_produksi_perikanan","id_produksi_perikanan","id_produksi_perikanan",$id_penduduk);
		
		$table["penduduk_produksi_perkebunan"] = $this->get_val_join2("penduduk_produksi_perkebunan","master_produksi_perkebunan","id_produksi_perkebunan","id_produksi_perkebunan",$id_penduduk);
		
		$table["penduduk_produksi_tanaman_buah"] = $this->get_val_join2("penduduk_produksi_tanaman_buah","master_produksi_tanaman_buah","id_produksi_tanaman_buah","id_produksi_tanaman_buah",$id_penduduk);
		
		$table["penduduk_produksi_tanaman_obat"] = $this->get_val_join2("penduduk_produksi_tanaman_obat","master_produksi_tanaman_obat","id_produksi_tanaman_obat","id_produksi_tanaman_obat",$id_penduduk);
		
		$table["penduduk_produksi_tanaman_pangan"] = $this->get_val_join2("penduduk_produksi_tanaman_pangan","master_produksi_tanaman_pangan","id_produksi_tanaman_pangan","id_produksi_tanaman_pangan",$id_penduduk);
		
		$table["penduduk_produksi_ternak"] = $this->get_val_join2("penduduk_produksi_ternak","master_kepemilikan_ternak","id_produksi_ternak","id_kepemilikan_ternak",$id_penduduk);
		
		$table["penduduk_produksi_pengolahan_ternak"] = $this->get_val_join2("penduduk_produksi_pengolahan_ternak","master_pengolahan_ternak","id_produksi_pengolahan_ternak","id_pengolahan_ternak",$id_penduduk);
		//var_dump($table);
		return $table;
		//echo "<br>";
		//die();
	}
}
