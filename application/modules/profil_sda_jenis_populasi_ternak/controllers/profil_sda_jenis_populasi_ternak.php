<?php 
class profil_sda_jenis_populasi_ternak extends op_controller {
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
		$form['title1'] = "Jenis populasi ternak";
		$form['f1'] = "kepemilikan_ternak";
		$form['f2'] = "total_keluarga";
		$form['f3'] = "hasil";
		$form['l1'] = "Jenis ternak";
		$form['l2'] = "Jumlah pemilik (Orang)";
		$form['l3'] = "Perkiraan Jumlah Populasi (Ekor)";
		$form['url'] = "grid/get_data";
		$form['table'] = "total_produksi_ternak";
		$form['default'] = "kepemilikan_ternak";
		$content = $this->load->view("$cont/grid",$form,true);
		$this->set_title($data['header']);
		$this->set_content($content);
		$this->render();
	}
}
?>