<?php 

class mm extends CI_Model {
	
	function __construct() {
		parent::__construct();
	}
	
	
	function data_menu($q) {
		$this->db->order_by("id");
		$this->db->like("menu",$q);
		$res = $this->db->get("master_menu");
		return $res;
	}
	
	
	}
?>