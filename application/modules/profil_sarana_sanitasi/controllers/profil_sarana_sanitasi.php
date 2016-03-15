<?php 
class profil_sarana_sanitasi extends op_controller {
	function __construct(){
		parent::__construct();
		$this->load->model("core_model","cm");
		//$this->load->model("pst","dm");
	}


	function index(){
		$form['controller'] = get_class($this);
		$cont = $form['controller'];
		
		$form['title1'] = 'Sanitasi';
		$form['title2'] = 'sanitasi';
		$form['table'] = 'profil_sarana_sanitasi';
		$form['id'] = 'profil_sarana_sanitasi';
		$form['f1'] = 'sanitasi';
		$form['l1'] = 'Sanitasi';
		$form['f2'] = 'ket1_teks';
		$form['l2'] = 'Ada/Tidak';
		$form['arr2'] = array("1"=>"Ada","2"=>"Tidak");
		$form['arr2'] = $this->cm->add_arr_head($form['arr2'],"0","Kosong");
		$form['f3'] = 'id_satuan_teks';
		$form['l3'] = 'Satuan';
		$form['arr3'] = $this->cm->arr_tabel("master_satuan","id_satuan","satuan","satuan");
		$form['arr3'] = $this->cm->add_arr_head($form['arr3'],"0","Kosong");
		$form['f4'] = 'baik';
		$form['l4'] = 'Baik (Unit)';
		$form['f5'] = 'rusak';
		$form['l5'] = 'Rusak (Unit)';
		$form['f6'] = 'mampet';
		$form['l6'] = 'Mampet (Unit)';
		$form['f7'] = 'kurang';
		$form['l7'] = 'Kurang memadai (Unit)';
		$form['f8'] = 'jumlah';
		$form['l8'] = 'Jumlah';
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