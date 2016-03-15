<?php 
class profil_sdm_bpd extends op_controller {
	function __construct(){
		parent::__construct();
		$this->load->model("core_model","cm");
		//$this->load->model("pst","dm");
	}


	function index(){
		$form['controller'] = get_class($this);
		///////
		$form['id'] = 'profil_sdm_bpd';
		$table = "profil_sdm_bpd";
		$form['title'] = 'Badan permusyawaratan desa';
		$form['f1'] = 'ket1';
		$form['l1'] = 'Keberadaan BPD';
		$form['f2'] = 'ket2';
		$form['f3'] = 'jumlah';
		$form['l3'] = 'Jumlah anggota BPD';
		$form['default'] = $form['f1'];
		$page = "1"; // get the requested page 
        $limit = "10"; // get how many rows we want to have into the grid 
        $sidx = "id"; // get index row - i.e. user click to sort 
        $sord = "desc"; // get the direction if(!$sidx) $sidx =1;
		$del = ""; // nama tabel yang di-request 
		$data = $this->cm->get_grid_data($page,$limit,$sidx,$sord,$table,$del);
		$form['data'] = $data;
		$cont = $form['controller'];
		$content = $this->load->view("$cont/grid",$form,true);
		$this->load->view("$cont/grid_js",$form);
		//////////
		$this->set_content($content);
		$this->render();
	}
	function update()
	{
		$data = $this->input->post();
		$ket1 = $data['ket1'];
		$ket2 = $data['ket2'];
		$jumlah = $data['ket1'];
		$this->db->where("id","1");
     	$res = $this->db->update("profil_sdm_bpd",$data);
		
		if($res) {    
     	$ret = array("success"=>true,
     	"pesan"=>"Data berhasil disimpan",
		"operation" =>"insert");
		}
		else {
		$ret = array("success"=>false,
			"pesan"=>"Data gagal disimpan" .mysql_error(),
			"operation" =>"insert");   
		}
		echo json_encode($ret);
		
	}

}
?>