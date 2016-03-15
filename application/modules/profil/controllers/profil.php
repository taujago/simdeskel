<?php 
class profil extends op_controller {

	function __construct(){
		parent::__construct();
		$this->load->model("core_model","cm");
        $this->load->model("add_model","am");
		$this->load->helper("tanggal"); 
	}


	function i(){
		
		$data['controller'] = get_class($this);
		
		$data['header'] = " I. POTENSI SUMBER DAYA ALAM ";
		$data['title'] = $data['header'];
		$content = $this->load->view("i_view",$data,true);
		$this->set_title($data['header']);
		$this->set_content($content);
		$this->render();
	}
	
	function ii(){
		$data['controller'] = get_class($this);
		$data['header'] = " II. POTENSI SUMBER DAYA MANUSIA ";
		$data['title'] = $data['header'];
		$content = $this->load->view("ii_view",$data,true);
		$this->set_title($data['header']);
		$this->set_content($content);
		$this->render();
	}
	
	function iii(){  
		$data['controller'] = get_class($this);
		$data['header'] = " III. POTENSI KELEMBAGAAN ";
		$data['title'] = $data['header'];
		$content = $this->load->view("iii_view",$data,true);
		$this->set_title($data['header']);
		$this->set_content($content);
		$this->render();
	}
	
	function iv(){
		$data['controller'] = get_class($this);
		$data['header'] = "  IV. POTENSI SARANA DAN PRASARANA  ";
		$data['title'] = $data['header'];
		$content = $this->load->view("iv_view",$data,true);
		$this->set_title($data['header']);
		$this->set_content($content);
		$this->render();
	}
	


}
?>