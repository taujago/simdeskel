<?php 
class profil_sdm_perdagangan extends op_controller {
	function __construct(){
		parent::__construct();
		$this->load->model("core_model","cm");
		//$this->load->model("pst","dm");
	}


	function index(){
		$form['controller'] = get_class($this);
		
		$form['title1'] = 'Usaha jasa dan perdagangan';
		$form['title2'] = 'usaha jasa dan perdagangan';
		$form['table'] = 'profil_sdm_perdagangan';
		$form['id'] = 'profil_sdm_perdagangan';
		$form['f1'] = 'perdagangan';
		$form['l1'] = 'Usaha jasa dan perdagangan';
		$form['f2'] = 'jumlah';
		$form['l2'] = 'Jumlah (unit)';
		$form['f3'] = 'jenis';
		$form['l3'] = 'Jenis produk yang <br>diperdagangakan <br>(umum, sayuran, <br>barang & jasa, <br>tambang, dll) (jenis)';
		$form['f4'] = 'tenaga_kerja';
		$form['l4'] = 'Jumlah tenaga kerja <br>yang terserap <br>(orang)';
		$form['f5'] = 'id_satuan_teks';
		$form['l5'] = 'Satuan';
		$form['arr5'] = $this->cm->arr_tabel("master_satuan","id_satuan","satuan","satuan");
		$form['f6'] = 'id_satuan2_teks';
		$form['l6'] = 'Satuan';
		$form['arr6'] = $this->cm->arr_tabel("master_satuan","id_satuan","satuan","satuan");
		//add
		$form['default'] = 'id';
		$form['url'] = "grid/get_data";
		$cont = $form['controller'];
		$content = $this->load->view("$cont/grid",$form,true);
		$this->load->view("$cont/grid_form",$form);
		$this->load->view("$cont/grid_js",$form);
		$this->load->view("$cont/grid_toolbar",$form);
		//$this->set_title($data['header']);
		$this->set_content($content);
		$this->render();
	}

}
?>