<?php
class op_login extends CI_Controller {
	function __construct(){
		parent::__construct();
	}


	function index(){
		
	$data['title'] = "Login Operator Desa";
	
	 
    $tpl['content'] = $this->load->view("member_login_form",$data,true);
    $this->load->view("operator_template",$tpl);
	}

	function lupapassword(){
	$data['title'] = "Lupa Password";
	
	 
    $tpl['content'] = $this->load->view("lupapassword_view",$data,true);
    $this->load->view("member_area_view",$tpl);
	}



	function resetpassword(){
		$data = $this->input->post();
		$this->db->where("email",$data['email']);
		$res = $this->db->get("member");
		if($res->num_rows() == 0 ) {
			$ret = array("success"=>false,
						"pesan"=> "Email tidak terdaftar",
						"operation" =>"insert");
			echo json_encode($ret);
		}
		else {
			$newpass = substr(md5(date('Ymdhis')),0,6); 
			$this->db->where("email",$data['email']);
			$this->db->update("member",array("password"=>md5($newpass)));

			$pesan = $this->load->view("email_lupapassword",array("password"=>$newpass),true);
			$this->load->library("notifikasi");
			///kirim_email($pengirim,$nama,$tujuan,$subject,$pesan)
			$this->notifikasi->kirim_email('no-reply@taujago.web.id','Tiger Engine Support',
				$data['email'],'Reset Password Tiger engine',$pesan);

			$ret = array("success"=>true,
						"pesan"=> "Password baru anda sudah kami kirim ke email anda ",
						"operation" =>"insert");
			echo json_encode($ret);
		}
	}

	function ceklogin(){
		$this->load->model("core_model","cm");
		
		//echo "hallo";
		$data=$this->input->post();
		$this->db->select('*')->from('operator op');
		// ->join("lokasi l",'op.id_desa=l.id_desa');
		$this->db->where("username",$data['member']);
		$this->db->where("password",$data['password2']);
		//$this->db->where("approved","1");
		$res = $this->db->get();
		//echo $this->db->last_query();
		if($res->num_rows() == 1 ) { // login berhasil
			// $row = $res->row();
			 
			$this->db->select('*')->from("setting_desa sd")->
			join('lokasi l','l.id_desa=sd.id_desa');
			$res = $this->db->get();
			$row = $res->row();
			
			 $this->session->set_userdata("operator_login",true);
			 $this->session->set_userdata("operator_username",$data['member']);
			 $this->session->set_userdata("operator_id_desa",$row->id_desa);
			 $this->session->set_userdata("id_desa",$row->id_desa);
			 $this->session->set_userdata("operator_desa",$row->desa);

			 

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
		$this->session->unset_userdata("operator_login");
		$this->session->unset_userdata("username");
		$this->session->unset_userdata("desa");
		redirect("home");
	}

}

?>