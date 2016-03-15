<?php 
class profil_sda_jenis_ikan_produksi extends op_controller {
	function __construct(){
		parent::__construct();
		$this->load->model("core_model","cm");
		//$this->load->model("pjkt","dm");
	}


	function index(){
		$data['controller'] = get_class($this);
		$cont = get_class($this);
		$data['header'] = "";
		$form['id'] = "produksi_perikanan";
		$form['title1'] = "Jenis ikan dan produksi";
		$form['f1'] = "produksi_perikanan";
		$form['f2'] = "hasil";
		$form['l1'] = "Jenis ikan";
		$form['l2'] = "Produksi (Ton/th)";
		$form['url'] = "grid/get_data";
		$form['table'] = "penduduk_produksi_perikanan";
		$form['default'] = "produksi_perikanan";
		$content = $this->load->view("$cont/grid",$form,true);
		//$content = $this->load->view("grid/grid2_form",$form);
		//$content = $this->load->view("grid/grid2_js",$form);
		//$content = $this->load->view("grid/grid2_toolbar",$form);
		$this->set_title($data['header']);
		$this->set_content($content);
		$this->render();
	}

}
?>