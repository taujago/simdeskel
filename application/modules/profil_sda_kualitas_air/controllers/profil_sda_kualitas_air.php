<?php 
class profil_sda_kualitas_air extends op_controller {
	function __construct(){
		parent::__construct();
		$this->load->model("core_model","cm");
		//$this->load->model("pst","dm");
	}


	function index(){
		$form['controller'] = get_class($this);
		
		$form['title1'] = 'Kualitas air minum';
		$form['title2'] = 'kualitas air';
		$form['table'] = 'profil_sda_kualitas_air';
		$form['id'] = 'profil_sda_kualitas_air';
		$form['f1'] = 'kualitas_teks';
		$form['l1'] = 'Kualitas air minum';
		$form['arr1'] 	= $this->cm->arr_tabel("master_sumber_air","id_sumber_air","sumber_air","sumber_air");
		$form['f2'] = 'ket_teks';
		$form['l2'] = 'Keterangan';
		$form['arr2'] = array("1"=>"Berbau","2"=>"Berwarna","3"=>"Berasa","4"=>"Baik");
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