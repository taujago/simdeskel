<?php 
class perkembangan_perkapita_struktur_pencaharian extends op_controller {
	function __construct(){
		parent::__construct();
		$this->load->model("core_model","cm");
		//$this->load->model("pst","dm");
	}


	function index(){
		$form['controller'] = get_class($this);
		$cont = $form['controller'];
		
$form['title1'] = 'Struktur mata pencaharian menurut sektor';
$form['title2'] = '';
$form['table'] = 'perkembangan_perkapita_struktur_pencaharian';
$form['id'] = 'perkembangan_perkapita_struktur_pencaharian';
$form['f1'] = 'sektor';
$form['l1'] = 'Sektor mata pencaharian';
$form['f2'] = 'pekerjaan';
$form['l2'] = 'Pekerjaan';
$form['f3'] = 'penduduk';
$form['l3'] = 'Jumlah (Orang)';
//add
		$form['default'] = $form['f1'];
		$form['url'] = "grid/get_data";
		$content = $this->load->view("$cont/grid",$form,true);
		//$this->set_title($data['header']);
		$this->set_content($content);
		$this->render();
	}

}
?>