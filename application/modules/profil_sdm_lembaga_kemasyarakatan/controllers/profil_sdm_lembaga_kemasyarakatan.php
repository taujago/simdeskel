<?php 
class profil_sdm_lembaga_kemasyarakatan extends op_controller {
	function __construct(){
		parent::__construct();
		$this->load->model("core_model","cm");
		//$this->load->model("pst","dm");
	}


	function index(){
		$form['controller'] = get_class($this);
		
		$form['title1'] = 'Lembaga kemasyarakatan desa / kelurahan (LKD/LKK)';
		$form['table'] = 'profil_sdm_lembaga_kemasyarakatan';
		$form['id'] = 'profil_sdm_lembaga_kemasyarakatan';
		$form['f1'] = 'lembaga';
		$form['l1'] = 'Nama lembaga';
		$form['f7'] = 'order_lembaga';
		$form['l7'] = 'Urutan/<br>Order';
		$form['f8'] = 'ket1_teks';
		$form['l8'] = 'Ada/<br>Tidak ada';
		$form['f9'] = 'ket2_teks';
		$form['l9'] = 'Aktif/<br>Tidak aktif';
		$form['f2'] = 'hukum';
		$form['l2'] = 'Dasar hukum<br>pembentukan';
		$form['f3'] = 'jumlah_pengurus';
		$form['l3'] = 'Jumlah<br>pengurus';
		$form['f4'] = 'alamat';
		$form['l4'] = 'Alamat kantor';
		$form['f5'] = 'jenis';
		$form['l5'] = 'Ruang lingkup<br>kegiatan<br>(Jenis)';
		$form['f6'] = 'yakni';
		$form['l6'] = 'Ruang lingkup<br>kegiatan<br>(Yakni)';
		//add
		$form['default'] = 'order_lembaga';
		$form['url'] = "grid/get_data";
		$cont = $form['controller'];
		$content = $this->load->view("$cont/grid",$form,true);
		//$this->set_title($data['header']);
		$this->set_content($content);
		$this->render();
	}

}
?>