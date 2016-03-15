<?php 
class perkembangan_kesejahteraan_keluarga extends op_controller {
	function __construct(){
		parent::__construct();
		$this->load->model("core_model","cm");
		//$this->load->model("pst","dm");
	}


	function index(){
		$form['controller'] = get_class($this);
		$cont = $form['controller'];
		
		$form['title1'] = 'Kesejahteraan keluarga';
		$form['title2'] = 'keterangan';
		$form['table'] = 'perkembangan_kesejahteraan_keluarga';
		$form['id'] = 'perkembangan_kesejahteraan_keluarga';
		$form['f1'] = 'ket';
		$form['l1'] = 'Keterangan';
		$form['f2'] = 'jumlah';
		$form['l2'] = 'Jumlah (keluarga)';
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
	
	function reload(){
		$q = "SELECT COUNT(no_kk) as total FROM v_kk";
		$res = $this->db->query($q)->result();
		$data['jumlah'] = $res[0]->total;
		$data['deleted'] = '0';
		$this->db->where("ket LIKE '%Jumlah total kepala keluarga%'");
		$this->db->update('perkembangan_kesejahteraan_keluarga',$data);
		echo json_encode(array("success"=>true,"pesan"=>"Berhasil"));
	}

}
?>