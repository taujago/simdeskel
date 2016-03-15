<?php 
class profil_sda_hasil_hutan extends op_controller {
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
		$form['title1'] = "Hasil hutan";
		$form['title2'] = "Hasil hutan";
		$form['f1'] = "id_produksi_hutan_teks";
		$form['f2'] = "hasil";
		$form['f3'] = "id_satuan_teks";
		$form['l1'] = "Hasil hutan";
		$form['l2'] = "Hasil";
		$form['l3'] = "Satuan";
		$form['arr1'] = $this->cm->arr_tabel("master_produksi_hutan","id_produksi_hutan","produksi_hutan","produksi_hutan");
		$form['arr3'] = $this->cm->arr_tabel("master_satuan","id_satuan","satuan","satuan");
		$form['url'] = "grid/get_data";
		$form['table'] = "profil_sda_hasil_hutan";
		$form['default'] = "id_produksi_hutan";
		$content = $this->load->view($data['controller']."/grid",$form,true);
		$this->load->view("$cont/grid_form",$form);
		$this->load->view("$cont/grid_js",$form);
		$this->load->view("$cont/grid_toolbar",$form);
		////////////
		
		$form['id'] = "data_pemasaran_hasil";
		$form['title1'] = "Hasil hutan";
		$form['f1'] = "produksi_hutan";
		$form['f2'] = "hasil";
		$form['f3'] = "satuan";
		$form['l1'] = "Hasil hutan";
		$form['l2'] = "Hasil";
		$form['l3'] = "Satuan";
		$form['url'] = "grid/get_data";
		$form['table'] = "total_hasil_hutan";
		$form['default'] = "produksi_hutan";
		$content .= "<br><br>";
		$content .= $this->load->view($data['controller']."/grid1",$form,true);
		$this->set_title($data['header']);
		$this->set_content($content);
		$this->render();
	}

	
}
?>