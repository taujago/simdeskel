<?php 
class profil_sda_produksi_ternak extends op_controller {
	function __construct(){
		parent::__construct();
		$this->load->model("core_model","cm");
		//$this->load->model("pjkt","dm");
	}


	function index(){
		$data['controller'] = get_class($this);
		$cont = get_class($this);
		$data['header'] = "";
		$form['id'] = "pemasaran_hasil";
		$form['title1'] = "Produksi peternakan";
		$form['f1'] = "pengolahan_ternak";
		$form['f2'] = "hasil";
		$form['f3'] = "satuan";
		$form['l1'] = "Produksi ternak";
		$form['l2'] = "Hasil";
		$form['l3'] = "Satuan";
		$form['url'] = "grid/get_data";
		$form['table'] = "total_pengolahan_ternak";
		$form['default'] = "pengolahan_ternak";
		$content = $this->load->view("$cont/grid",$form,true);
		$this->set_title($data['header']);
		$this->set_content($content);
		$this->render();
	}
}
?>