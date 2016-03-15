<?php 
class perkembangan_penguasaan_aset_perumahan extends op_controller {
	function __construct(){
		parent::__construct();
		$this->load->model("core_model","cm");
		//$this->load->model("pst","dm");
	}


	function index(){
		$form['controller'] = get_class($this);
		$cont = $form['controller'];
		
		$form['title1'] = 'Aset perumahan';
		$form['title2'] = '';
		$form['table'] = 'perkembangan_penguasaan_aset_perumahan';
		$form['id'] = 'perkembangan_penguasaan_aset_perumahan';
		$form['f1'] = 'aset';
		$form['l1'] = 'Aset perumahan';
		$form['f2'] = 'cat_teks';
		$form['l2'] = 'Kategori';
		$form['f3'] = 'jumlah';
		$form['l3'] = 'Jumlah (Rumah)';
		//add
		$form['default'] = 'cat';
		$form['url'] = "grid/get_data";
		$content = $this->load->view("$cont/grid",$form,true);
		//$this->set_title($data['header']);
		$this->set_content($content);
		$this->render();
	}

}
?>