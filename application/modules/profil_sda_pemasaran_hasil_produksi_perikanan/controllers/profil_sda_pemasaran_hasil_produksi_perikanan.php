<?php 
class profil_sda_pemasaran_hasil_produksi_perikanan extends op_controller {
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
		$form['title1'] = "Pemasaran Hasil Perikanan";
		$form['f1'] = "pemasaran_hasil";
		$form['f2'] = "keterangan";
		$form['l1'] = "Pemasaran Hasil";
		$form['l2'] = "Keterangan";
		$form['url'] = "grid/get_data";
		$form['table'] = "profil_sda_pemasaran_hasil_produksi_perikanan";
		$form['default'] = "pemasaran_hasil";
		$content = $this->load->view("$cont/grid",$form,true);
		$this->set_title($data['header']);
		$this->set_content($content);
		$this->render();
	}

}
?>