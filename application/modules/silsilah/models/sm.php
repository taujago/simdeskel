<?php 

class sm extends CI_Model {
	
	function __construct() {
		parent::__construct();
	}
	
	
	function detail($id_penduduk) {
		$this->db->where("id_penduduk",$id_penduduk);
		return $this->db->get("v_penduduk")->row();
	}
	

	function detail_penduduk($id_penduduk) {
		$this->db->select("p.*, ak.*")
		->from("v_penduduk p")
		->join("kk_anggota ak","p.id_penduduk = ak.id_penduduk")
		->where("p.id_penduduk",$id_penduduk);
		$res = $this->db->get();
		$p = $res->row();
		return $p;
	}

	function pasangan($id_penduduk) {

	$p = $this->detail_penduduk($id_penduduk);

	/*	$sql="SELECT * FROM kk_anggota kk 
			JOIN v_penduduk p ON p.id_penduduk = kk.`id_penduduk` 
			WHERE kk.no_kk = (SELECT no_kk FROM kk_anggota WHERE id_penduduk = '$id_penduduk')
			AND sebagai IN ('i','b')
			AND kk.`id_penduduk` <> '$id_penduduk'";*/

		// $sql="SELECT * FROM kk_anggota kk JOIN v_penduduk p ON p.id_penduduk = kk.`id_penduduk` 
		// 		WHERE kk.no_kk = (SELECT no_kk FROM kk_anggota WHERE id_penduduk = '$id_penduduk'
		// 		AND (sebagai ='b' OR sebagai='i' OR is_kk='1' )) 
		// 		AND  (sebagai ='b' OR sebagai='i' OR is_kk='1' )
		// 		AND kk.`id_penduduk` <> '$id_penduduk'";
	if($p->sebagai == "b") {
			 $sebagai = "i";
	}
	else if($p->sebagai =="i") {
			$sebagai = "b";
	}
	else if($p->sebagai == "bb"){
			$sebagai = "ii";
	}
	else if($p->sebagai == "ii") {
			$sebagai = "bb";
	}
	else {
		$sebagai = "x";
	}
		$sql="SELECT * FROM kk_anggota kk JOIN v_penduduk p ON p.id_penduduk = kk.`id_penduduk` 
				WHERE kk.no_kk = (SELECT no_kk FROM kk_anggota WHERE id_penduduk = '$id_penduduk' limit 1) 
				and sebagai = '$sebagai'";	
		$res = $this->db->query($sql);
		//echo $this->db->last_query();
		return $res->row();
	}
	
	function orangtua($id_penduduk,$sebagai) {
		 
		$p = $this->detail_penduduk($id_penduduk);

		$sql="SELECT * FROM kk_anggota kk 
			JOIN v_penduduk p ON p.id_penduduk = kk.`id_penduduk` 
			WHERE kk.no_kk = (SELECT no_kk FROM kk_anggota xx WHERE xx.id_penduduk = '$id_penduduk' )
			AND (sebagai ='$sebagai')";
		$res = $this->db->query($sql);

		//echo $this->db->last_query();
		if($res->num_rows() > 0) {
			return $res->row();
		}
		else {
			return 0;
			 
		}
		
		
		}
	function get_bapak($id_penduduk) {
		$rec  = new stdClass;
		$p = $this->detail_penduduk($id_penduduk);


		if($p->sebagai == "a")  { 
		$sql="SELECT * FROM kk_anggota kk 
			JOIN v_penduduk p ON p.id_penduduk = kk.`id_penduduk` 
			WHERE kk.no_kk = (SELECT no_kk FROM kk_anggota xx WHERE xx.id_penduduk = '$id_penduduk' )
			AND (sebagai ='b')";
			
		}
		else if ($p->sebagai == "b") {
			$sql="SELECT * FROM kk_anggota kk 
			JOIN v_penduduk p ON p.id_penduduk = kk.`id_penduduk` 
			WHERE kk.no_kk = (SELECT no_kk FROM kk_anggota xx WHERE xx.id_penduduk = '$id_penduduk' )
			AND (sebagai ='bb')";
		}
		//else if($p->sebaga)
		else if ($p->sebagai == "bb" or $p->sebagai=="ii") {
			return 0;
		}
		else {
			return 0;
		}
		$res = $this->db->query($sql);
		 
		if($res->num_rows() > 0) {
			return $res->row();
		}
		else {
			return 0;
			 
		}
		
		
		}
	function get_ibu($id_penduduk) {
		$rec  = new stdClass;
		$p = $this->detail_penduduk($id_penduduk);


		if($p->sebagai == "a")  { 
		$sql="SELECT * FROM kk_anggota kk 
			JOIN v_penduduk p ON p.id_penduduk = kk.`id_penduduk` 
			WHERE kk.no_kk = (SELECT no_kk FROM kk_anggota xx WHERE xx.id_penduduk = '$id_penduduk' )
			AND (sebagai ='i')";
			
		}
		else if ($p->sebagai == "b") {
			$sql="SELECT * FROM kk_anggota kk 
			JOIN v_penduduk p ON p.id_penduduk = kk.`id_penduduk` 
			WHERE kk.no_kk = (SELECT no_kk FROM kk_anggota xx WHERE xx.id_penduduk = '$id_penduduk' )
			AND (sebagai ='ii')";
		}
		//else if($p->sebaga)
		else if ($p->sebagai == "bb" or $p->sebagai=="ii") {
			//$sql="select 1 = 0";
			return 0;
		}
		else {
			return 0;
		}
		$res = $this->db->query($sql);
		 
		if($res->num_rows() > 0) {
			return $res->row();
		}
		else {
			return 0;
			 
		}
		
		
		}
	function saudara($id_penduduk) {
		$sql = "SELECT * FROM kk_anggota kk 
				JOIN v_penduduk p ON p.id_penduduk = kk.`id_penduduk` 
				WHERE kk.no_kk = (SELECT no_kk FROM kk_anggota xx WHERE xx.id_penduduk = '$id_penduduk' AND xx.sebagai='a' )
				AND sebagai = 'a' AND p.id_penduduk <> '$id_penduduk' order by kk.anakke asc ";
		return $this->db->query($sql);
	}
	
	function anak($id_penduduk) {
		$p = $this->detail_penduduk($id_penduduk);

		if($p->sebagai == "bb" or $p->sebagai=="ii") {
			$sebagai = "b";
		}
		else if($p->sebagai == "b" or $p->sebagai=="i"){
			$sebagai = "a";
		}
		else {
			$sebagai = "x"; 
		}


		$sql="SELECT * FROM kk_anggota kk 
				JOIN v_penduduk p ON p.id_penduduk = kk.`id_penduduk` 
				WHERE kk.no_kk = (SELECT no_kk FROM kk_anggota xx WHERE xx.id_penduduk = '$id_penduduk' 
								   limit 1 )
				AND sebagai = '$sebagai' order by kk.anakke ";
		$res =  $this->db->query($sql);
		
		return $res; 
	}
	
	}
?>