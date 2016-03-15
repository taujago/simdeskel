<?php 
class profil_sarana_desa extends op_controller {
	function __construct(){
		parent::__construct();
		$this->load->model("core_model","cm");
		//$this->load->model("pst","dm");
	}


	function index(){
		$form['controller'] = get_class($this);
		
		$form['title1'] = 'Gedung kantor';
		$form['title2'] = 'gedung kantor';
		$form['table'] = 'profil_sarana_desa';
		$form['id'] = 'profil_sarana_desa';
		$form['f1'] = 'gedung';
		$form['l1'] = 'Gedung kantor';
		$form['f2'] = 'ket_teks';
		$form['l2'] = 'Keterangan';
		$form['arr2'] = array("1"=>"Ada","2"=>"Tidak","3"=>"Baik","4"=>"Rusak");
		$form['f3'] = 'jumlah';
		$form['l3'] = 'Jumlah';
		$form['f4'] = 'id_satuan_teks';
		$form['l4'] = 'Satuan';
		$form['arr4'] = $this->cm->arr_tabel("master_satuan","id_satuan","satuan","satuan");
		$form['arr4'] = $this->cm->add_arr_head($form['arr4'],"","Kosong");
		//add
		$form['default'] = 'id';
		$form['url'] = "grid/get_data";
		$cont = $form['controller'];
		$content = $this->load->view("$cont/grid",$form,true);
		$this->load->view("$cont/grid_form",$form);
		$this->load->view("$cont/grid_js",$form);
		$this->load->view("$cont/grid_toolbar",$form);
		//////////////
		
		$form['title1'] = 'Inventaris dan alat tulis kantor';
		$form['title2'] = 'inventaris dan alat tulis kantor';
		$form['table'] = 'profil_sarana_inventaris';
		$form['id'] = 'profil_sarana_inventaris';
		$form['f1'] = 'inventaris';
		$form['l1'] = 'Inventaris dan alat tulis kantor';
		$form['f2'] = 'jumlah';
		$form['l2'] = 'Jumlah';
		$form['f3'] = 'id_satuan_teks';
		$form['l3'] = 'Satuan';
		$form['arr3'] = $this->cm->arr_tabel("master_satuan","id_satuan","satuan","satuan");
		//add
		$form['default'] = 'id';
		$form['url'] = "grid/get_data";
		$cont = $form['controller'];
		$content .= $this->load->view("$cont/grid2",$form,true);
		$this->load->view("$cont/grid_form2",$form);
		$this->load->view("$cont/grid_js",$form);
		$this->load->view("$cont/grid_toolbar",$form);
		////////////////
		
		$form['title1'] = 'Administrasi pemerintahan desa / kelurahan';
		$form['title2'] = 'administrasi pemerintahan desa/kelurahan';
		$form['table'] = 'profil_sarana_administrasi';
		$form['id'] = 'profil_sarana_administrasi';
		$form['f1'] = 'administrasi';
		$form['l1'] = 'Administrasi pemerintahan desa / kelurahan';
		$form['f2'] = 'ket1_teks';
		$form['l2'] = 'Ada / Tidak';
		$form['arr2'] = array("1"=>"Ada","0"=>"Tidak");
		$form['f3'] = 'ket2_teks';
		$form['l3'] = 'Terisi / Tidak';
		$form['arr3'] = array("1"=>"Terisi","2"=>"Tidak");
		$form['arr3'] = $this->cm->add_arr_head($form['arr3'],"","Kosong");
		//add
		$form['default'] = 'id';
		$form['url'] = "grid/get_data";
		$cont = $form['controller'];
		$content .= $this->load->view("$cont/grid3",$form,true);
		$this->load->view("$cont/grid_form3",$form);
		$this->load->view("$cont/grid_js",$form);
		$this->load->view("$cont/grid_toolbar",$form);
		//////////////
		//$this->set_title($data['header']);
		$this->set_content($content);
		$this->render();
	}

}
?>