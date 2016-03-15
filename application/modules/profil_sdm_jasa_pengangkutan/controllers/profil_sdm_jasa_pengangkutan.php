<?php 
class profil_sdm_jasa_pengangkutan extends op_controller {
	function __construct(){
		parent::__construct();
		$this->load->model("core_model","cm");
		//$this->load->model("pst","dm");
	}


	function index(){
		$form['controller'] = get_class($this);
		
		$form['title1'] = 'Usaha jasa pengangkutan';
		$form['title2'] = 'usaha pengangkutan';
		$form['table'] = 'profil_sdm_jasa_pengangkutan';
		$form['id'] = 'profil_sdm_jasa_pengangkutan';
		$form['f1'] = 'pengangkutan';
		$form['l1'] = 'Usaha jasa pengangkutan';
		$form['f2'] = 'jumlah';
		$form['l2'] = 'Jumlah Pemilik';
		$form['f3'] = 'kapasitas';
		$form['l3'] = 'Kapasitas';
		$form['f4'] = 'tenaga_kerja';
		$form['l4'] = 'Tenaga kerja';
		$form['f5'] = 'id_satuan_teks';
		$form['l5'] = 'Satuan';
		$form['arr5'] = $this->cm->arr_tabel("master_satuan","id_satuan","satuan","satuan");
		$form['arr5'] = $this->cm->add_arr_head($form['arr5'],"","Kosong");
		//add
		$form['default'] = 'id';
		$form['url'] = "grid/get_data";
		$cont = $form['controller'];
		$content = $this->load->view("$cont/grid2",$form,true);
		$this->load->view("$cont/grid_form2",$form);
		$this->load->view("$cont/grid_js1",$form);
		////
		
		$form['title1'] = 'Angkutan Sungai';
		$form['title2'] = 'Angkutan Sungai';
		$form['table'] = 'profil_sdm_jasa_pengangkutan2';
		$form['id'] = 'profil_sdm_jasa_pengangkutan2';
		$form['f1'] = 'pengangkutan';
		$form['l1'] = 'Usaha jasa pengangkutan';
		$form['f2'] = 'jumlah';
		$form['l2'] = 'Jumlah Pemilik';
		$form['f3'] = 'kapasitas';
		$form['l3'] = 'Kapasitas';
		$form['f4'] = 'tenaga_kerja';
		$form['l4'] = 'Tenaga kerja';
		$form['f5'] = 'id_satuan_teks';
		$form['l5'] = 'Satuan';
		$form['arr5'] = $this->cm->arr_tabel("master_satuan","id_satuan","satuan","satuan");
		$form['arr5'] = $this->cm->add_arr_head($form['arr5'],"","Kosong");
		//add
		$form['default'] = 'id';
		$form['url'] = "grid/get_data";
		$cont = $form['controller'];
		$content .= "<br><br>";
		$content .= $this->load->view("$cont/grid3",$form,true);
		$this->load->view("$cont/grid_form2",$form);
		$this->load->view("$cont/grid_js",$form);
		$this->load->view("$cont/grid_toolbar",$form);
		//////
		
		$form['title1'] = 'Angkutan Laut';
		$form['title2'] = 'Angkutan Laut';
		$form['table'] = 'profil_sdm_jasa_pengangkutan3';
		$form['id'] = 'profil_sdm_jasa_pengangkutan3';
		$form['f1'] = 'pengangkutan';
		$form['l1'] = 'Usaha jasa pengangkutan';
		$form['f2'] = 'jumlah';
		$form['l2'] = 'Jumlah Pemilik';
		$form['f3'] = 'kapasitas';
		$form['l3'] = 'Kapasitas';
		$form['f4'] = 'tenaga_kerja';
		$form['l4'] = 'Tenaga kerja';
		//add
		$form['default'] = 'id';
		$form['url'] = "grid/get_data";
		$cont = $form['controller'];
		$content .= "<br><br>";
		$content .= $this->load->view("$cont/grid",$form,true);
		$this->load->view("$cont/grid_form",$form);
		$this->load->view("$cont/grid_js",$form);
		$this->load->view("$cont/grid_toolbar",$form);
		//////
		
		$form['title1'] = 'Angkutan Udara';
		$form['title2'] = 'Angkutan Udara';
		$form['table'] = 'profil_sdm_jasa_pengangkutan4';
		$form['id'] = 'profil_sdm_jasa_pengangkutan4';
		$form['f1'] = 'pengangkutan';
		$form['l1'] = 'Usaha jasa pengangkutan';
		$form['f2'] = 'jumlah';
		$form['l2'] = 'Jumlah Pemilik';
		$form['f3'] = 'kapasitas';
		$form['l3'] = 'Kapasitas';
		$form['f4'] = 'tenaga_kerja';
		$form['l4'] = 'Tenaga kerja';
		//add
		$form['default'] = 'id';
		$form['url'] = "grid/get_data";
		$cont = $form['controller'];
		$content .= "<br><br>";
		$content .= $this->load->view("$cont/grid",$form,true);
		$this->load->view("$cont/grid_form",$form);
		$this->load->view("$cont/grid_js",$form);
		$this->load->view("$cont/grid_toolbar",$form);
		//////
		
		$form['title1'] = 'Ekspedisi dan Pengiriman';
		$form['title2'] = 'Ekspedisi dan Pengiriman';
		$form['table'] = 'profil_sdm_jasa_pengangkutan5';
		$form['id'] = 'profil_sdm_jasa_pengangkutan5';
		$form['f1'] = 'pengangkutan';
		$form['l1'] = 'Usaha jasa ekspedisi dan pengiriman';
		$form['f2'] = 'jumlah';
		$form['l2'] = 'Jumlah Pemilik';
		$form['f3'] = 'kapasitas';
		$form['l3'] = 'Kapasitas';
		$form['f4'] = 'tenaga_kerja';
		$form['l4'] = 'Tenaga kerja';
		//add
		$form['default'] = 'id';
		$form['url'] = "grid/get_data";
		$cont = $form['controller'];
		$content .= "<br><br>";
		$content .= $this->load->view("$cont/grid",$form,true);
		$this->load->view("$cont/grid_form",$form);
		$this->load->view("$cont/grid_js",$form);
		$this->load->view("$cont/grid_toolbar",$form);
		//$this->set_title($data['header']);
		$this->set_content($content);
		$this->render();
	}

}
?>