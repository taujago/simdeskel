<?php
class login extends CI_Controller {
	function __construct(){
		parent::__construct();
	}


	function index(){
	$data['title'] = "Login Administrator - Sistem Informasi Desa dan Kelurahan";
	
	 
    $tpl['content'] = $this->load->view("login_view",$data);
    //$this->load->view("test",$tpl);
	}


	function ceklogin(){
		//echo "hallo";
		$data=$this->input->post();
		$this->db->where("username",$data['username']);
		$this->db->where("password",$data['password2']);
		//$this->db->where("approved","1");
		$res = $this->db->get('admin');
		//echo $this->db->last_query();
		if($res->num_rows() == 1 ) { // login berhasil
			$row = $res->row();
			$this->session->set_userdata("login_admin",true);
			$this->session->set_userdata("username",$data['username']);		

			// get data kota 
			$data = $this->db->get('setting')->row();
			$this->session->set_userdata("id_kota",$data->id_kota);

			$ret = array("success"=>true,
						"pesan"=> "Login Berhasil",
						"operation" =>"insert");
			echo json_encode($ret);
		}
		else {
			$ret = array("success"=>false,
						"pesan"=> "Login Gagal. Username dan password tidak diterima",
						"operation" =>"insert");
			echo json_encode($ret);
		}
	}

	function logout(){
		$this->session->unset_userdata("login_admin");
		$this->session->unset_userdata("username");
		 
		redirect("login");
	}

}

?>