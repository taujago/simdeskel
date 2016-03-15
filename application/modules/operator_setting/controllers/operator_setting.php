<?php 
class operator_setting extends  op_controller {
	var $error;
	function __construct() {
		parent::__construct();
 
 		$this->load->model("core_model","cm");
        $this->load->model("core_model","cm");
		 
		 
	}


	function index()
    {
    
    $this->db->select('*')->from("setting_desa sd")
    ->join("lokasi l",'l.id_desa=sd.id_desa');
    //->where("sd.id_desa",$this->session->userdata("operator_id_desa"));
    $res = $this->db->get();



    if($res->num_rows() == 0 ) {
    	$this->db->insert("setting_desa",array("id_desa"=>$this->session->userdata("operator_id_desa") ));
    }

    $data = $res->row_array();
    $data['title'] = "Setting Data desa";	
    $data['header'] = $data['title'];
	$data['controller'] = "operator_setting";
 	


   	$content = $this->load->view("setting_lokasi_view",$data,true);
	$this->set_title($data['title']);
	$this->set_content($content);
	$this->render();
    }


    function info() {
        $data['title'] = "Informasi Software";  
        $data['header'] = $data['title'];
        $data['controller'] = "operator_setting";
        


        $content = $this->load->view("info_view",$data,true);
        $this->set_title($data['title']);
        $this->set_content($content);
        $this->render();
    }

    function save_desa(){
    	$data = $this->input->post();

       
            if(! empty($_FILES['foto']['name']) ) {
                    $config['upload_path'] = './assets/images/';
                    $config['allowed_types'] = 'gif|jpg|png|jpeg';
                    $config['max_size'] = '1000000';
                    $config['max_width']  = '1024000';
                    $config['max_height']  = '76800000';
                    $this->load->library('upload',$config);
                    if ( ! $this->upload->do_upload('logo'))
                    {    
                        $error = array('error' => $this->upload->display_errors()); 
                         
                        $ret = array("success"=>false,
                                    "pesan"=>"Gambar terlalu besar atau file bukan file gambar. Silahkan pilih gambar yang lain",
                                    "operation" =>"insert");
                        echo json_encode($ret);
                        exit;
                    }
                    else {
                        $arr = $this->upload->data();
                     
                        $this->resize($arr['file_name']);
                         
                        $data['logo'] = $arr['file_name'];
                         
                    }
            }



    	$this->db->where("id_desa",$data['id_desa_old']);
        unset($data['id_desa_old']);
    	$res = $this->db->update("setting_desa",$data);
        // echo $this->db->last_query();
        // exit;
        //$res = false;
    	if($res){

            $arr = array("id_desa"=>$data['id_desa']); 

            $this->db->where("1=1",null,false);
            $this->db->update("penduduk",$arr);

            $this->db->where("1=1",null,false);
            $this->db->update("admin_a1",$arr);
            $this->db->where("1=1",null,false);            
            $this->db->update("admin_a2",$arr);
            $this->db->where("1=1",null,false);       
            $this->db->update("admin_a3",$arr);
            $this->db->where("1=1",null,false);
            $this->db->update("admin_a4",$arr);
            $this->db->where("1=1",null,false);
            $this->db->update("admin_a5",$arr);
            $this->db->where("1=1",null,false);
            $this->db->update("admin_a6",$arr);
            $this->db->where("1=1",null,false);
            $this->db->update("admin_a7",$arr);
            $this->db->where("1=1",null,false);
            $this->db->update("admin_a8",$arr);
            $this->db->where("1=1",null,false);
            $this->db->update("admin_e1",$arr);
            $this->db->where("1=1",null,false);
            $this->db->update("admin_e2",$arr);
            $this->db->where("1=1",null,false);
            $this->db->update("admin_e3",$arr);
            $this->db->where("1=1",null,false);
            $this->db->update("admin_e4a",$arr);
            $this->db->where("1=1",null,false);
            $this->db->update("admin_e4b",$arr);
            $this->db->where("1=1",null,false);
            $this->db->update("kk",$arr);
            $this->db->where("1=1",null,false);
            $this->db->update("operator",$arr);
            $this->db->where("1=1",null,false);
            $this->db->update("penduduk",$arr);
            $this->db->where("1=1",null,false);
            $this->db->update("profil_aparat",$arr);
            $this->db->where("1=1",null,false);
            $this->db->update("profil_inventaris",$arr);
            $this->db->where("1=1",null,false);
            $this->db->update("profil_keputusan",$arr);
            $this->db->where("1=1",null,false);
            $this->db->update("profil_peraturan",$arr);
            $this->db->where("1=1",null,false);
            $this->db->update("profil_tanah",$arr);
            $this->db->where("1=1",null,false);
            $this->db->update("tiger_dusun",$arr);
            //  echo "last query ".$this->db->last_query();
  

            $this->session->set_userdata("operator_id_desa",$data['id_desa']);
            $this->session->set_userdata("id_desa",$data['id_desa']);
            //echo mysql_error();
    		echo json_encode(array("success"=>true,"pesan"=>"Setting desa berhasil disimpan"));
    	}
        else {
            echo json_encode(array("success"=>false,"pesan"=>"Setting desa tidak dapat disimpan"));
        }
    }

}

?>