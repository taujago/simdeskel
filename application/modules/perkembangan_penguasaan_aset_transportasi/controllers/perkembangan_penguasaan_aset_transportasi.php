<?php 
class perkembangan_penguasaan_aset_transportasi extends op_controller {
	function __construct(){
		parent::__construct();
		$this->load->model("core_model","cm");
		//$this->load->model("pst","dm");
	}


	function index(){
		$form['controller'] = get_class($this);
		$cont = $form['controller'];
		
		$form['title1'] = 'Aset sarana transportasi umum';
		$form['title2'] = '';
		$form['table'] = 'perkembangan_penguasaan_aset_transportasi';
		$form['id'] = 'perkembangan_penguasaan_aset_transportasi';
		$form['f1'] = 'aset_transportasi';
		$form['l1'] = 'Transportasi umum';
		$form['f2'] = 'orang';
		$form['l2'] = 'Jumlah Pemilik (orang)';
		$form['f3'] = 'jumlah';
		$form['l3'] = 'Jumlah unit (unit)';
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