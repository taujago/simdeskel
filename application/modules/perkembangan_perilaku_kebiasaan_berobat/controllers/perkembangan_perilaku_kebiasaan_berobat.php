<?php 
class perkembangan_perilaku_kebiasaan_berobat extends op_controller {
	function __construct(){
		parent::__construct();
		$this->load->model("core_model","cm");
		//$this->load->model("pst","dm");
	}


	function index(){
		$form['controller'] = get_class($this);
		$cont = $form['controller'];
		
		$form['title1'] = 'Kebiasaan berobat bila sakit';
		$form['title2'] = '';
		$form['table'] = 'perkembangan_perilaku_kebiasaan_berobat';
		$form['id'] = 'perkembangan_perilaku_kebiasaan_berobat';
		$form['f1'] = 'kebiasaan';
		$form['l1'] = 'Kebiasaan berobat bila sakit';
		$form['f2'] = 'ket_teks';
		$form['l2'] = 'Keterangan';
		$form['arr2'] = array("1"=>"Tak ada","2"=>"Sedikit","3"=>"Banyak");
		
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