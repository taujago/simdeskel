<?php 
class operator extends  master_controller {
	var $error;
	function __construct() {
		parent::__construct();
 
		$this->load->model("opm","dm");
		$this->load->model("core_model","cm");
		 
		 
	}


function index()
    {
    	//$tpl['content'] = $this->load->view("pengguna_view");
  /* 
	$content = $this->load->view("kota_view",$data,true);
	//$this->load->view("template",$tpl);
	$this->set_title("Data kota");
		$this->set_content($content);
		$this->render();
   * */
    $data['title'] = "Data Operator";	
    $data['header'] = "Data Operator ";
	$data['controller'] = "operator";
   	$data['arr_kecamatan'] = $this->cm->add_arr_head($this->cm->arr_kecamatan(),'x',' - Semua Kecamatan -');
   	$data['arr_kecamatan2'] = $this->cm->add_arr_head($this->cm->arr_kecamatan(),'x',' - Pilih Kecamatan -');

   	$content = $this->load->view("operator_view",$data,true);
	$this->set_title("Data Operator");
	$this->set_content($content);
	$this->render();
    }
    
 function cek_username($username)
 {
 	 if(empty($username)) {
 	 	$this->form_validation->set_message('cek_username', '%s harus diisi');
 	 	return false;
 	 }

 	 $this->db->where("username",$username);
 	 $jumlah = $this->db->get("operator")->num_rows();
 	 ///cho $this->db->last_query();
 	 //echo "jumlah " . $jumlah;
 	 if($jumlah > 0 ) {
 	 	$this->form_validation->set_message('cek_username', '%s sudah ada');
 	 	return false;
 	 }
 }

function cek_password($password) {
		
	$password2 = $_POST['password2'];
	
	if(empty($password) or empty($password2)) {
		$this->form_validation->set_message('cek_password', '%s harus diisi');
		return false;
	}
	if($password <> $password2) {
		$this->form_validation->set_message('cek_password', '%s tidak sama');
		return false;
	}
	 
} 
function save(){
	//print_r($_POST);
	
		$this->load->library('form_validation');
		$this->form_validation->set_rules('nama','Nama','required');			 
		$this->form_validation->set_rules('username','Username','callback_cek_username');	
		$this->form_validation->set_rules('password','Password','callback_cek_password');			 
		$this->form_validation->set_message('required', ' %s Harus diisi');
 		$this->form_validation->set_error_delimiters("* ", '<br>');
		if($this->form_validation->run() == TRUE ) { 
	   
 		$data =  $this->input->post();
		unset($data['id_operator']);
		unset($data['id_kecamatan']);unset($data['password2']);
	 
		 
		$data['password'] = md5($data['password']);
		
		$res  = $this->db->insert("operator",$data);
		
		//echo $this->db->last_query();
	 		if($res) {
	 			$ret = array("success"=>true,
							"pesan"=>"Berhasil disimpan",
							"operation" =>"insert");
							
			}	
	
		}
		else {
			$ret = array("success"=>false,
						"pesan"=> validation_errors());
		}
		echo json_encode($ret);
}

function cek_password2($password) {
		
	$password2 = $_POST['password2'];
	
	 
	if($password <> $password2) {
		$this->form_validation->set_message('cek_password2', '%s tidak sama');
		return false;
	}
	 
} 

function cek_username2($username)
 {
 	 if(empty($username)) {
 	 	$this->form_validation->set_message('cek_username2', '%s harus diisi');
 	 	return false;
 	 }

 	 // get current usernaem 
 	 $this->db->where("id_operator",$_POST['id_operator']);
 	 $xy = $this->db->get("operator")->row();

 	 if($xy->username <> $username)  {
 	 	$this->db->where("username",$username);
	 	$jumlah = $this->db->get("operator")->num_rows();
	 	 
	 	 
	 	 if($jumlah > 0 ) {
	 	 	$this->form_validation->set_message('cek_username2', '%s sudah ada');
	 	 	return false;
	 	 }
 	 }
 	 
 }

function update(){
		$this->load->library('form_validation');
		$this->form_validation->set_rules('nama','Nama','required');			 
		$this->form_validation->set_rules('username','Username','callback_cek_username2');	
		$this->form_validation->set_rules('password','Password','callback_cek_password2');			 
		$this->form_validation->set_message('required', ' %s Harus diisi');
 		$this->form_validation->set_error_delimiters("* ", '<br>');
		if($this->form_validation->run() == TRUE ) { 
	   
 		$data =  $this->input->post();
		//unset($data['id_operator']);
		unset($data['id_kecamatan']);unset($data['password2']);
	 
		 
		if(empty($data['password'])) {
			unset($data['password']); 
		}
		else { 
		$data['password'] = md5($data['password']); 
		}
		
		$this->db->where("id_operator",$data['id_operator']);
		$res  = $this->db->update("operator",$data);
		
		//echo $this->db->last_query();
	 		if($res) {
	 			$ret = array("success"=>true,
							"pesan"=>"Berhasil disimpan",
							"operation" =>"insert");
							
			}	
	
		}
		else {
			$ret = array("success"=>false,
						"pesan"=> validation_errors());
		}
		echo json_encode($ret);
}

function get_data(){
    	$page = $_REQUEST['page']; // get the requested page 
        $limit = $_REQUEST['rows']; // get how many rows we want to have into the grid 
        $sidx = isset($_REQUEST['sort'])?$_REQUEST['sort']:"provinsi"; // get index row - i.e. user click to sort 
        $sord = isset($_REQUEST['order'])?$_REQUEST['order']:"asc"; // get the direction if(!$sidx) $sidx =1;  
        $id_kecamatan  = isset($_REQUEST['search_id_kecamatan'])?$_REQUEST['search_id_kecamatan']:"x";
        $id_desa  = isset($_REQUEST['search_id_desa'])?$_REQUEST['search_id_desa']:"x";
        $nama  = isset($_REQUEST['search_nama'])?$_REQUEST['search_nama']:"x";
       
        $req_param = array (
				"sort_by" => $sidx,
				"sort_direction" => $sord,
				"limit" => null  ,
				"nama" => $nama    ,
				"id_desa"	=> $id_desa,
				"id_kecamatan" => $id_kecamatan
		);     
           
        $row = $this->dm->get_data($req_param)->result_array();
		
        $count = count($row); 
        if( $count >0 ) { 
            $total_pages = ceil($count/$limit); 
        } else { 
            $total_pages = 0; 
        } 
        if ($page > $total_pages) 
            $page=$total_pages; 
        $start = $limit*$page - $limit; // do not put $limit*($page - 1) 
        
        $start = ($start < 0 )?0:$start;
        
        $req_param['limit'] = array(
                    'start' => $start,
                    'end' => $limit
        );
          
        
        $result = $this->dm->get_data($req_param)->result_array();
        // sekarang format data dari dB sehingga sesuai yang diinginkan oleh jqGrid dalam hal ini aku pakai JSON format
        //$responce->page = $page; 
        $responce = new stdClass();
        $responce->total = $count; 
        //$responce->records = $count;
                $x=0;
        for($i=0; $i<count($result); $i++){
        	$x++;
            //$responce->rows[$i]['id']=$result[$i]['id_provinsi'];
            // data berikut harus sesuai dengan kolom-kolom yang ingin ditampilkan di view (js)
            $responce->rows[$i]['id_operator']	= $result[$i]['id_operator'] ;    
			$responce->rows[$i]['username']		= $result[$i]['username'] ; 
			$responce->rows[$i]['nama']			= $result[$i]['nama'] ;       
			$responce->rows[$i]['id_desa']		= $result[$i]['id_desa'] ;    
			$responce->rows[$i]['id_kecamatan']	= $result[$i]['id_kecamatan'] ;  
			$responce->rows[$i]['email']		= $result[$i]['email'] ;  
			$responce->rows[$i]['no_hp']		= $result[$i]['no_hp'] ; 
			$responce->rows[$i]['desa']			= $result[$i]['desa'] ; 
			$responce->rows[$i]['kecamatan']	= $result[$i]['kecamatan'] ;  

        }
        echo json_encode($responce); 
    }
 

function hapus() {
		$ids = $_POST['ids'];
		$arr_id = explode(",",$ids);
		$a=array(); $b=array();
		foreach($arr_id as $id) {
			//$this->core_model->delete_table_data('kk',array("no_kk"=>$id)); 
			$this->db->where('id_operator',$id);
			$res = $this->db->delete("operator");
			if($res) $a[]=$id;
			else $b[]=$id;
			//echo $this->db->last_query()."<br />";
		}
		if(count($a)>0) $pesan =  "Id ".implode(",", $a). " Berhasil dihapus  ";
		if(count($b)>0) $pesan = "Id ".implode(",", $b). " Gagal dihapus  ";

		echo json_encode(array("success"=>true,"pesan"=>$pesan));
	}    
    
 
 
	
}


?>
