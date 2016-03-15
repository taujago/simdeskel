<?php 
class operator_area extends op_controller {
	function __construct(){
		parent::__construct();
		$this->load->model("core_model","cm");

	}



	function index(){
		$data['title'] = "Operator Area - Sistem Informasi Desa ";	
		$content = $this->load->view("operator_area_view",$data,true);
		//$this->load->view("operator_template");
		$this->set_title($data['title']);
		$this->set_content($content);
		$this->render();
	}

}
?>