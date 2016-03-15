<?php 
class setting extends  master_controller {
	var $error;
	function __construct() {
		parent::__construct();
 
		$this->load->model("setm","dm");
		$this->load->model("core_model","cm");
		 
		 
	}


 
  

function lokasi()
    {
    
    $data=$this->db->get("setting")->row_array();
    $this->db->where("id",$data['id_kota']);
    $kota = $this->db->get("tiger_kota")->row_array();
    $data['id_provinsi'] = $kota['id_provinsi'];

 	$data['title']   	= "Setting Kabupaten / Kota";
	$data['controller'] = "setting";

	$data['arr_provinsi'] = $this->cm->add_arr_head($this->cm->arr_tiger_provinsi(),'x','- Pilih Provinsi - ');
   	$content = $this->load->view("setting_lokasi_view",$data,true);
	$this->set_title("Setting Kabupaten / Kota");
	$this->set_content($content);
	$this->render();
}

function save_lokasi(){
	$data =  $this->input->post();
	unset($data['id_provinsi']);
	$res=$this->db->update("setting",$data);
	//echo $this->db->last_query();
	if($res) {
		$ret = array("success"=>true,"pesan"=>"Setting Berhasil disimpan");
	}
	else {
		$ret = array("success"=>false,"pesan"=>"Setting Gagal disimpan");	
	}
	echo json_encode($ret);
}


function gantipassword(){



 	$data['title']   	= "Ganti Password";
	$data['controller'] = "setting";

    $content = $this->load->view("setting_gantipassword_view",$data,true);
	$this->set_title("Ganti Password");
	$this->set_content($content);
	$this->render();

}


function save_gantipassword() {

	$data=$this->input->post();
	if($data['password'] <> $data['password2']) 
	{
		$ret = array("success" => false, "pesan"=>"Password tidak sama");
		echo json_encode($ret);
		exit;
	}
 
	$this->db->where("username",$this->session->userdata("username"));
	$this->db->where("password",md5($data['password_lama']));
	if($this->db->get("admin")->num_rows() == 0 ){
		//echo $this->db->last_query();
		$ret = array("success" => false, "pesan"=>"Password lama salah");
		echo json_encode($ret);
		exit;
	}	
	else {	

		$this->db->where("username",$this->session->userdata("username"));
		$res = $this->db->update("admin",array("password"=>md5($data['password'])));
		if($res) {
		$ret = array("success" => true, "pesan"=>"Password berhasil diganti");
		echo json_encode($ret); 
		}
		else {
			$ret = array("success" => false, "pesan"=>"Gagal  ganti password");
			echo json_encode($ret); 
		}
	}

}

}






?>
