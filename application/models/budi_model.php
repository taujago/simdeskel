<?php
class budi_model extends CI_Model {

function __construct() {
	parent::__construct();
}


function get_data(){
	$this->db->order_by("id desc");
	$res = $this->db->get("__buku");
	return $res;
}

}
?>