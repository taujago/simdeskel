<?php
class depan extends CI_Controller {
	function __construct(){
		parent::__construct();

	}



	function index(){
		$data['title'] = "Sistem Informasi Desa";	
		 
		$tpl['content'] = $this->load->view("depan_view",$data,true);
    	$this->load->view("operator_template",$tpl);
	}
}
?>