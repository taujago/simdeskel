<?php 
class perkembangan_penentuan_kepala_desa extends op_controller {
	function __construct(){
		parent::__construct();
		$this->load->model("core_model","cm");
		//$this->load->model("pst","dm");
	}


	function index(){
		$form['controller'] = get_class($this);
		$cont = $form['controller'];
		
$form['title1'] = 'Penentuan kepala desa / lurah dan perangkat desa / kelurahan';
$form['title2'] = '';
$form['table'] = 'perkembangan_penentuan_kepala_desa';
$form['id'] = 'perkembangan_penentuan_kepala_desa';
$form['f1'] = 'penentuan';
$form['l1'] = 'Penentuan kepala desa / lurah dan perangkat desa / kelurahan';
$form['f2'] = 'ket';
$form['l2'] = 'Keterangan';
//add
		$form['default'] = $form['f1'];
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