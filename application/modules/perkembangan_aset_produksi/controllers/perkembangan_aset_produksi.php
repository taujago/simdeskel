<?php 
class perkembangan_aset_produksi extends op_controller {
	function __construct(){
		parent::__construct();
		$this->load->model("core_model","cm");
		//$this->load->model("pst","dm");
	}


	function index(){
		$form['controller'] = get_class($this);
		$cont = $form['controller'];
		
$form['title1'] = 'Aset sarana produksi';
$form['title2'] = '';
$form['table'] = 'perkembangan_aset_produksi';
$form['id'] = 'perkembangan_aset_produksi';
$form['f1'] = 'aset_produksi';
$form['l1'] = 'Aset sarana produksi';
$form['f2'] = 'jumlah';
$form['l2'] = 'Jumlah (Orang)';
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