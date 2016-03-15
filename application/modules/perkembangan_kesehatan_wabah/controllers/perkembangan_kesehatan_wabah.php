<?php 
class perkembangan_kesehatan_wabah extends op_controller {
	function __construct(){
		parent::__construct();
		$this->load->model("core_model","cm");
		//$this->load->model("pst","dm");
	}


	function index(){
		$form['controller'] = get_class($this);
		$cont = $form['controller'];
		
		$form['title1'] = 'Wabah penyakit';
		$form['title2'] = 'wabah penyakit';
		$form['table'] = 'perkembangan_kesehatan_wabah';
		$form['id'] = 'perkembangan_kesehatan_wabah';
		$form['f1'] = 'penyakit';
		$form['l1'] = 'Wabah penyakit';
		$form['f2'] = 'ket';
		$form['l2'] = 'Keterangan';
		$form['f3'] = 'jumlah';
		$form['l3'] = 'Jumlah';
		$form['f4'] = 'id_satuan_teks';
		$form['l4'] = 'Satuan';
		$form['arr4'] = $this->cm->arr_tabel("master_satuan","id_satuan","satuan","satuan");

//add
		$form['default'] = 'id';
		$form['url'] = "grid/get_data";
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