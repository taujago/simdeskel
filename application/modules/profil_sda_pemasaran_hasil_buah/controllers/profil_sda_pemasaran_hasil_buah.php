<?php 
class profil_sda_pemasaran_hasil_buah extends op_controller {
	function __construct(){
		parent::__construct();
		$this->load->model("core_model","cm");
		//$this->load->model("pjkt","dm");
	}


	function index(){
		$data['controller'] = get_class($this);
		$cont = get_class($this);
		$data['header'] = "";
		$form['controller'] = get_class($this);
		$form['id'] = "pemasaran_buah";//id form
		$form['title1'] = "Pemasaran Hasil Tanaman Pangan dan Tanaman Buah-buahan";//untuk title grid
		$form['title2'] = "Pemasaran Hasil";//untuk title pop-up form
		$form['f1'] = "pemasaran_hasil";
		$form['f2'] = "keterangan";
		$form['l1'] = "Pemasaran Hasil";
		$form['l2'] = "Keterangan";
		$form['url'] = "grid/get_data";
		$form['table'] = "profil_sda_pemasaran_hasil_buah";
		$form['table_m1'] = "master_pemasaran_hasil";//nama tabel master yang akan dijoin dengan tabel profil_sda
		$form['default'] = $form['f1'];
		$form['id1'] = "id_pemasaran_hasil";//id untuk dropdown di popup
		$form['table_m2'] = "master_ya_tidak";//nama tabel master yang akan dijoin dengan tabel profil_sda
		$form['id2'] = "id";//nama tabel master yang akan dijoin dengan tabel profil_sda
		$form['f3'] = "keterangan";//nama tabel master yang akan dijoin dengan tabel profil_sda
		//$form['f1'] = "id_kepemilikan_lahan";
		$site = site_url("profil_menu");
		$content = $this->load->view("$cont/grid",$form,true);
		$content .= '<div style="display:none" id="tb_'.$form['id'].'" style="padding:5px;height:auto">
 		<a class="easyui-linkbutton"  iconCls="icon-back" href="'.$site.'" > Kembali </a>
 		</div>';
		$this->set_title($data['header']);
		$this->set_content($content);
		$this->render();
		
	}
	
	
}
?>