<?php 
class buku_ekspedisi extends op_controller {
	function __construct(){
		parent::__construct();
		$this->load->model("core_model","cm");
		//$this->load->model("pst","dm");
	}


	function index(){
		$form['controller'] = get_class($this);
		$cont = $form['controller'];
		
$form['title1'] = 'Buku ekspedisi';
$form['title2'] = 'buku ekspedisi';
$form['table'] = 'buku_ekspedisi';
$form['id'] = 'buku_ekspedisi';
$form['f1'] = 'tanggal_pengiriman';
$form['l1'] = 'Tanggal Pengiriman';
$form['f2'] = 'tanggal_surat';
$form['l2'] = 'Tanggal Surat';
$form['f3'] = 'nomor_surat';
$form['l3'] = 'Nomor Surat';
$form['f4'] = 'ringkasan_surat';
$form['l4'] = 'Ringkasan isi';
$form['f5'] = 'tujuan';
$form['l5'] = 'Tujuan surat';
$form['f6'] = 'keterangan';
$form['l6'] = 'Keterangan surat';
//add
		$form['default'] = $form['f1'];
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