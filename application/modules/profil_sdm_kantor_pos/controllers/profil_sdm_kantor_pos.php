<?php 
class profil_sdm_kantor_pos extends op_controller {
	function __construct(){
		parent::__construct();
		$this->load->model("core_model","cm");
		//$this->load->model("pst","dm");
	}


	function index(){
		$form['controller'] = get_class($this);
		
$form['title1'] = 'Kantor pos';
$form['title2'] = 'kantor pos';
$form['table'] = 'profil_sdm_kantor_pos';
$form['id'] = 'profil_sdm_kantor_pos';
$form['f1'] = 'kantor';
$form['l1'] = 'Kantor pos';
$form['f2'] = 'ket_teks';
$form['l2'] = 'Ada/Tidak';
$form['arr2'] = array("0"=>"Kosong","1"=>"Ada","2"=>"Tidak");
$form['f3'] = 'jumlah';
$form['l3'] = 'Jumlah';
$form['f4'] = 'id_satuan_teks';
$form['l4'] = 'Satuan';
$form['arr4'] = $this->cm->arr_tabel("master_satuan","id_satuan","satuan","satuan");
$form['arr4'] = $this->cm->add_arr_head($form['arr4'],"0","Kosong");
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