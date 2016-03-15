<?php 
class perkembangan_jumlah_penduduk extends op_controller {
	function __construct(){
		parent::__construct();
		$this->load->model("core_model","cm");
		//$this->load->model("pst","dm");
	}


	function index(){
		$form['controller'] = get_class($this);
		$cont = $form['controller'];
		
		$form['title1'] = 'Jumlah penduduk';
		$form['title2'] = 'jumlah penduduk';
		$form['table'] = 'perkembangan_jumlah_penduduk';
		$form['id'] = 'perkembangan_jumlah_penduduk';
		$form['f1'] = 'jumlah';
		$form['l1'] = 'Jumlah';
		$form['f2'] = 'lk';
		$form['l2'] = 'Laki-laki (orang)';
		$form['f3'] = 'pr';
		$form['l3'] = 'Perempuan (orang)';
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
	
	// function reload(){
	// 	$q = "SELECT COUNT(id_penduduk) as pr FROM penduduk AS a WHERE a.deleted=0 AND a.jk='P'";
	// 	$res = $this->db->query($q)->result();
	// 	$data['pr'] = $res[0]->pr;
	// 	$q = "SELECT COUNT(id_penduduk) as lk FROM penduduk AS a WHERE a.deleted=0 AND a.jk='L'";
	// 	$res = $this->db->query($q)->result();
	// 	$data['lk'] = $res[0]->lk;
	// 	$data['deleted'] = '0';
	// 	$this->db->where("jumlah LIKE '%Jumlah penduduk tahun ini%' OR id=1");
	// 	$this->db->update('perkembangan_jumlah_penduduk',$data);
	// 	////
	// 	$this->db->where("jumlah LIKE '%Jumlah penduduk tahun lalu%' OR id=2");
	// 	$res = $this->db->get('perkembangan_jumlah_penduduk',$data)->result();
	// 	$data['lk'] = (($data['lk']-$res[0]->lk)/$res[0]->lk)*100;
	// 	$data['pr'] = (($data['pr']-$res[0]->pr)/$res[0]->pr)*100;
	// 	$this->db->where("jumlah LIKE '%persentase perkembangan%' OR id=3");
	// 	$this->db->update('perkembangan_jumlah_penduduk',$data);
	// 	echo json_encode(array("success"=>true,"pesan"=>"Berhasil"));
	// }


	function reload(){
		$q = "SELECT  
			SUM(IF(jk='L',1,0)) AS L , SUM(IF(jk='P',1,0)) AS P         
			FROM penduduk WHERE YEAR(regdate) <= YEAR(CURDATE()) 
			and id_desa='$this->id_desa'"; 
		$res = $this->db->query($q)->row_array();
		$data['lk'] = $res['L'];
		$data['pr'] = $res['P'];
		$data['deleted'] = '0';
		$this->db->where("jumlah LIKE '%Jumlah penduduk tahun ini%' OR id=1");
		$this->db->update('perkembangan_jumlah_penduduk',$data);

		$q = "SELECT  
			SUM(IF(jk='L',1,0)) AS L , SUM(IF(jk='P',1,0)) AS P         
			FROM penduduk WHERE YEAR(regdate) <  YEAR(CURDATE())   
			and id_desa='$this->id_desa'"; 
		$res = $this->db->query($q)->row_array();
		$data_lama['lk'] = $res['L'];
		$data_lama['pr'] = $res['P'];
		$data_lama['deleted'] = '0';
		$this->db->where("jumlah LIKE '%Jumlah penduduk tahun lalu%' OR id=2");
		$this->db->update('perkembangan_jumlah_penduduk',$data_lama);

		$data['lk'] =( $data_lama['lk']==0)?100:   ($data['lk']  - $data_lama['lk']) / $data_lama['lk'] * 100;
		$data['pr'] =($data_lama['pr']==0)?100: ($data['pr']  - $data_lama['pr']) / $data_lama['pr'] * 100;
		$this->db->where("jumlah LIKE '%persentase perkembangan%' OR id=3");
		$this->db->update('perkembangan_jumlah_penduduk',$data);
		echo json_encode(array("success"=>true,"pesan"=>"Berhasil"));


	}

}
?>