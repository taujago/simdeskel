<?php
class budi extends CI_Controller {

function __construct(){
	parent::__construct();
	$this->load->model("budi_model","bm");
}


function index(){
	echo "method index"; 
}

function baca(){
	echo "method baca";
	
}

function tampil(){
	$datav2['x'] = "Hello";
	$data['v2'] = $this->load->view("budi_view_2",$datav2,true);
	
	$data['nama'] = "Firmansyah";
	$this->load->view("budi_view",$data);
	
	
}

function data_buku(){
	
	/*$this->db->order_by("ID desc");
	$res = $this->db->get("__buku");*/	
	
	$data['record'] = $this->bm->get_data();
	$this->load->view("buku_view",$data);
	
	
}

}

?>