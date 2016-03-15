<?php 
class profil_sda_kualitas_udara extends op_controller {
	function __construct(){
		parent::__construct();
		$this->load->model("core_model","cm");
		//$this->load->model("pst","dm");
	}


	function index(){
		$form['controller'] = get_class($this);
		
		$form['title1'] = 'Kualitas Udara';
		$form['title2'] = 'sumber';
		$form['table'] = 'profil_sda_kualitas_udara';
		$form['id'] = 'profil_sda_kualitas_udara';
		$form['f1'] = 'sumber';
		$form['l1'] = 'Sumber';
		$form['f2'] = 'jumlah';
		$form['l2'] = 'Jumlah lokasi<br>sumber pencemar';
		$form['f3'] = 'polutan';
		$form['l3'] = 'Polutan pencemar';
		$form['f4'] = 'efek_kesehatan_teks';
		$form['l4'] = 'Efek terhadap kesehatan<br>(Gangguan penglihatan /<br>kabut, ISPA, dll)';
		$form['arr4'] = array("1"=>"Ganguan penglihatan","2"=>"ISPA","3"=>"dll");
		$form['f5'] = 'kepemilikan_teks';
		$form['l5'] = 'Kepemilikan';
		$form['arr5'] = array("1"=>"Pemda","2"=>"Swasta","3"=>"Perorangan");
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