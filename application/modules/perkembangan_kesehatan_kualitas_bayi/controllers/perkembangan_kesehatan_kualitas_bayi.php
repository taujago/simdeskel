<?php 
class perkembangan_kesehatan_kualitas_bayi extends op_controller {
	function __construct(){
		parent::__construct();
		$this->load->model("core_model","cm");
		//$this->load->model("pst","dm");
	}


	function index(){
		$form['controller'] = get_class($this);
		$cont = $form['controller'];
		
		$form['title1'] = 'Kualitas bayi';
		$form['title2'] = '';
		$form['table'] = 'perkembangan_kesehatan_kualitas_bayi';
		$form['id'] = 'perkembangan_kesehatan_kualitas_bayi';
		$form['f1'] = 'kualitas_bayi';
		$form['l1'] = 'Data Kualitas ibu bayi';
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