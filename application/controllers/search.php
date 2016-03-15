<?php
class search extends CI_Controller {

	function __construct(){
		parent::__construct();
	}


	function index(){
		$data = $this->input->post();
		$this->db->order_by("nama");
		$data['nama'] = empty($data['nama'])?"zzzzzzzzzzzz":$data['nama'];
		$this->db->like("nama",$data['nama']);

		//$this->db->limit(10);
		$this->db->where("hidup_mati","1");
		//$this->db->where("deleted","0");
		$this->db->where("status_kependudukan <> '3'",null,false);
		$x['record']  = $this->db->get("v_penduduk2");
		$x['target']  = $data['target'];
		//echo $this->db->last_query();
		$this->load->view("search_table",$x);
	}

}

?>