<?php 
class profil_sdm_hansip extends op_controller {
	function __construct(){
		parent::__construct();
		$this->load->model("core_model","cm");
		//$this->load->model("pst","dm");
	}


	function index(){
		$form['controller'] = get_class($this);
		
		$form['title1'] = 'Hansip dan linmas';
		$form['title2'] = 'hansip dan linmas';
		$form['table'] = 'profil_sdm_hansip';
		$form['id'] = 'profil_sdm_hansip';
		$form['f1'] = 'hansip';
		$form['l1'] = 'Hansip dan linmas';
		$form['f2'] = 'ket_teks';
		$form['l2'] = 'Ada/Tidak';
		$form['arr2'] = array("1"=>"Ada","2"=>"Tidak");
		$form['arr2'] = $this->cm->add_arr_head($form['arr2'],"","Kosongkan");
		$form['f3'] = 'jumlah';
		$form['l3'] = 'Jumlah';
		$form['f4'] = 'id_satuan_teks';
		$form['l4'] = 'Satuan';
		$form['arr4'] = $this->cm->arr_tabel("master_satuan","id_satuan","satuan","satuan");
		$form['arr4'] = $this->cm->add_arr_head($form['arr4'],"0","Kosongkan");
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