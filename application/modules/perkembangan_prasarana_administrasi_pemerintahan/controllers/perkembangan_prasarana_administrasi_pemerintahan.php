<?php 
class perkembangan_prasarana_administrasi_pemerintahan extends op_controller {
	function __construct(){
		parent::__construct();
		$this->load->model("core_model","cm");
		//$this->load->model("pst","dm");
	}


	function index(){
		$form['controller'] = get_class($this);
		$cont = $form['controller'];
		
$form['title1'] = 'Administrasi pemerintahan desa/kelurahan';
$form['title2'] = '';
$form['table'] = 'perkembangan_prasarana_administrasi_pemerintahan';
$form['id'] = 'perkembangan_prasarana_administrasi_pemerintahan';
$form['f1'] = 'administrasi';
$form['l1'] = 'Administrasi pemerintahan desa/kelurahan';
$form['f2'] = 'ket1_teks';
$form['l2'] = 'Ada/Tidak';
$form['arr2'] = array("1"=>"Ada","2"=>"Tidak");
$form['arr2'] = $this->cm->add_arr_head($form['arr2'],"0","Kosong");
$form['f3'] = 'ket2_teks';
$form['l3'] = 'Terisi/Diolah/Tidak';
$form['arr3'] = array("1"=>"Terisi","2"=>"Diolah","3"=>"Tidak");
$form['arr3'] = $this->cm->add_arr_head($form['arr3'],"0","Kosong");
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