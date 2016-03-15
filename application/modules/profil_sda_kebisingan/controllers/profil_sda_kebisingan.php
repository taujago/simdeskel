<?php 
class profil_sda_kebisingan extends op_controller {
	function __construct(){
		parent::__construct();
		$this->load->model("core_model","cm");
		//$this->load->model("pst","dm");
	}


	function index(){
		$form['controller'] = get_class($this);
		
		$form['title1'] = 'Kebisingan';
		$form['title2'] = 'tingakat kebisingan';
		$form['table'] = 'profil_sda_kebisingan';
		$form['id'] = 'profil_sda_kebisingan';
		$form['f1'] = 'tingkat';
		$form['l1'] = 'Tingkat kebisingan';
		$form['f2'] = 'ekses_teks';
		$form['l2'] = 'Ekses dampak kebisingan';
		$form['arr2'] = array("1"=>"Ya","0"=>"Tidak");
		$form['f3'] = 'sumber_teks';
		$form['l3'] = '<center>Sumber kebisingan<br>(Kendaraan bermotor,<br>Kereta api, Pelabuhan,<br>Airport, Pabrik, dll)</center>';
		$form['arr3'] = array("7"=>"Kosongkan","1"=>"Kendaraan bermotor","2"=>"Kereta api","3"=>"Pelabuhan","4"=>"Airport","5"=>"Pabrik","6"=>"dll");
		$form['f4'] = 'efek';
		$form['l4'] = 'Efek terhadap penduduk';
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