<?php 
class perkembangan_kesehatan_sakit extends op_controller {
	function __construct(){
		parent::__construct();
		$this->load->model("core_model","cm");
		//$this->load->model("pst","dm");
	}


	function index(){
		$form['controller'] = get_class($this);
		$cont = $form['controller'];
		
$form['title1'] = 'Jumlah penderita sakit tahun ini';
$form['title2'] = 'penderita sakit';
$form['table'] = 'perkembangan_kesehatan_sakit';
$form['id'] = 'perkembangan_kesehatan_sakit';
$form['f1'] = 'id_jenis_penyakit_teks';
$form['l1'] = 'Penyakit';
$form['arr1'] = $this->cm->arr_tabel("master_jenis_penyakit","id_jenis_penyakit","jenis_penyakit","jenis_penyakit");

$form['f2'] = 'jumlah';
$form['l2'] = 'Jumlah (Orang)';
$form['f3'] = 'rawat_teks';
$form['l3'] = 'Di rawat di';
$form['arr3'] = array("1"=>"Rumah","2"=>"RS","3"=>"Puskesmas");

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