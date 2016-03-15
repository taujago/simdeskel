<?php 
class perkembangan_lembaga_kemasyarakatan_desa extends op_controller {
	function __construct(){
		parent::__construct();
		$this->load->model("core_model","cm");
		//$this->load->model("pst","dm");
	}


	function index(){
		$form['controller'] = get_class($this);
		$cont = $form['controller'];
		
$form['title1'] = 'Lembaga kemasyarakatan desa/kelurahan';
$form['title2'] = 'lembaga kemasyarakatan';
$form['table'] = 'perkembangan_lembaga_kemasyarakatan_desa';
$form['id'] = 'perkembangan_lembaga_kemasyarakatan_desa';
$form['f1'] = 'lembaga';
$form['l1'] = 'Lembaga kemasyarakatan desa/kelurahan';
$form['f2'] = 'ket1_teks';
$form['l2'] = 'Keterangan';
$form['arr2'] = array("1"=>"Ada","2"=>"Aktif","3"=>"Tidak");
$form['arr2'] = $this->cm->add_arr_head($form['arr2'],"0","Kosong");
$form['f3'] = 'jumlah';
$form['l3'] = 'Jumlah';
$form['f4'] = 'id_satuan_teks';
$form['l4'] = 'Satuan';
$form['arr4'] = $this->cm->arr_tabel("master_satuan","id_satuan","satuan","satuan");
$form['arr4'] = $this->cm->add_arr_head($form['arr4'],"0","Kosong");
$form['f5'] = 'ket2_teks';
$form['l5'] = 'Terisi/Tidak';
$form['arr5'] = array("1"=>"Terisi","2"=>"Tidak");
$form['arr5'] = $this->cm->add_arr_head($form['arr5'],"0","Kosong");
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