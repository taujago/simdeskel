<?php 
class kk extends  master_controller {
	var $error;
	function __construct() {
		parent::__construct();
 
		$this->load->model("kkm","dm");
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
    $data['title'] = "Data Kartu Keluarga";	
    $data['header'] = $data['title'];
	$data['controller'] = "kk";
   	$data['arr_kecamatan'] = $this->cm->add_arr_head($this->cm->arr_kecamatan(),'x',' - Semua Kecamatan -');
   	$data['arr_kecamatan2'] = $this->cm->add_arr_head($this->cm->arr_kecamatan(),'x',' - Pilih Kecamatan -');

   	$content = $this->load->view("kk_view",$data,true);
	$this->set_title($data['title']);
	$this->set_content($content);
	$this->render();
    }
    
 function cek_no_kk($no_kk)
 {
 	 if(empty($no_kk)) {
 	 	$this->form_validation->set_message('cek_no_kk', '%s harus diisi');
 	 	return false;
 	 }

 	 $this->db->where("no_kk",$no_kk);
 	 $jumlah = $this->db->get("kk")->num_rows();
 	 ///cho $this->db->last_query();
 	 //echo "jumlah " . $jumlah;
 	 if($jumlah > 0 ) {
 	 	$this->form_validation->set_message('cek_no_kk', '%s sudah ada');
 	 	return false;
 	 }
 }
 
function save(){
	//print_r($_POST);
	
		$this->load->library('form_validation');
		$this->form_validation->set_rules('no_kk','Nomor KK','callback_cek_no_kk');			 
		$this->form_validation->set_rules('id_penduduk','Kepala Keluarga ','required');	
		$this->form_validation->set_rules('id_desa','Desa ','required');	
		$this->form_validation->set_rules('rt','RT ','numeric');	
		$this->form_validation->set_rules('rw','RW ','numeric');	
 		$this->form_validation->set_message('required', ' %s Harus diisi');
 		$this->form_validation->set_message('numeric', ' %s Harus diisi dengan angka');
 		$this->form_validation->set_error_delimiters("* ", '<br>');
		if($this->form_validation->run() == TRUE ) { 
	   
 		$data =  $this->input->post();
		 
		unset($data['id_kecamatan']);
	 
		 
		// tambahkan KK
		$arr_kk = array("no_kk"=>$data['no_kk'],
						"alamat"=>$data['alamat'],
						"rt"=>$data['rt'],
						"rw"=>$data['rw'],
						"id_desa" => $data['id_desa'],
						"id_penduduk" => $data['id_penduduk']
		);
		$res  = $this->db->insert("kk",$arr_kk);
		
		// tambahkan membermya 
		$arr_ang = array(
		'no_kk' => $data['no_kk'],
		'is_kk' => "1",
		'sebagai' => 'b',
		'id_penduduk' => $data['id_penduduk']
		);

		$this->db->insert("kk_anggota",$arr_ang);

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
		$this->form_validation->set_rules('no_kk','Nomor KK','required');			 
		$this->form_validation->set_rules('id_penduduk','Kepala Keluarga ','required');	
		$this->form_validation->set_rules('rt','RT ','numeric');	
		$this->form_validation->set_rules('rw','RW ','numeric');	
 		$this->form_validation->set_message('required', ' %s Harus diisi');
 		$this->form_validation->set_message('numeric', ' %s Harus diisi dengan angka');
 		$this->form_validation->set_error_delimiters("* ", '<br>');
		if($this->form_validation->run() == TRUE ) { 
	   
 		$data =  $this->input->post();
		 
		unset($data['id_kecamatan']);
	 
		 
		// tambahkan KK
		$arr_kk = array("no_kk"=>$data['no_kk'],
						"alamat"=>$data['alamat'],
						"rt"=>$data['rt'],
						"rw"=>$data['rw'],
						"id_desa" => $data['id_desa'],
						"id_penduduk" => $data['id_penduduk']
		);
		$this->db->where("no_kk",$data['no_kk']);
		$res  = $this->db->update("kk",$arr_kk);
		
		// tambahkan membermya 

		$this->db->where("no_kk",$data['no_kk']);
		$this->db->where("is_kk","1");
		$this->db->delete("kk_anggota");

		$arr_ang = array(
		'no_kk' => $data['no_kk'],
		'is_kk' => "1",
		'sebagai' => 'b',
		'id_penduduk' => $data['id_penduduk']
		);

		$this->db->insert("kk_anggota",$arr_ang);


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
        $sidx = isset($_REQUEST['sort'])?$_REQUEST['sort']:"no_kk"; // get index row - i.e. user click to sort 
        $sord = isset($_REQUEST['order'])?$_REQUEST['order']:"asc"; // get the direction if(!$sidx) $sidx =1;  
       // $id_kecamatan  = isset($_REQUEST['search_id_kecamatan'])?$_REQUEST['search_id_kecamatan']:"x";
       // $id_desa  = isset($_REQUEST['search_id_desa'])?$_REQUEST['search_id_desa']:"x";
       // $nama  = isset($_REQUEST['search_nama'])?$_REQUEST['search_nama']:"x";
       
        $req_param = array (
				"sort_by" => $sidx,
				"sort_direction" => $sord,
				"limit" => null /* ,
				"nama" => $nama    ,
				"id_desa"	=> $id_desa,
				"id_kecamatan" => $id_kecamatan */
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
        if($count == 0) {
        		 $responce->rows[0]['no_kk']	= "";    
        }   else {      
        $arr_sebagai = $this->cm->arr_hubungan;
        for($i=0; $i<count($result); $i++){
        	$x++;
            //$responce->rows[$i]['id']=$result[$i]['id_provinsi'];
            // data berikut harus sesuai dengan kolom-kolom yang ingin ditampilkan di view (js)
            $responce->rows[$i]['no_kk']	= $result[$i]['no_kk'] ;    
			$responce->rows[$i]['alamat']	= $result[$i]['alamat'] ; 
			$responce->rows[$i]['rt']		= $result[$i]['rt'] ;       
			$responce->rows[$i]['rw']		= $result[$i]['rw'] ;    
			$responce->rows[$i]['id_desa']	= $result[$i]['id_desa'] ;  
			$responce->rows[$i]['desa']		= $result[$i]['desa'] ;  
			$responce->rows[$i]['sebagai']	= $result[$i]['sebagai'] ; 
			$responce->rows[$i]['sebagai2']	= $arr_sebagai[$result[$i]['sebagai']] ; 
			$responce->rows[$i]['id_penduduk']		= $result[$i]['id_penduduk']; 
			$responce->rows[$i]['nik']		= $result[$i]['nik'] ; 
			$responce->rows[$i]['nama']		= $result[$i]['nama'] ;  
			$responce->rows[$i]['jumlah']		= $result[$i]['jumlah'] ;  
			$responce->rows[$i]['kecamatan']		= $result[$i]['kecamatan'] ;  
			$responce->rows[$i]['id_kecamatan']		= $result[$i]['id_kecamatan'] ;  

        }
        echo json_encode($responce); 
  		  } 
}
 



function hapus() {
		$ids = $_POST['ids'];
		$arr_id = explode(",",$ids);
		$a=array(); $b=array();
		foreach($arr_id as $id) {
			//$this->core_model->delete_table_data('kk',array("no_kk"=>$id)); 
			$this->db->where('no_kk',$id);
			$res = $this->db->delete("kk");
			if($res) $a[]=$id;
			else $b[]=$id;
			//echo $this->db->last_query()."<br />";
		}
		if(count($a)>0) $pesan =  "Id ".implode(",", $a). " Berhasil dihapus  ";
		if(count($b)>0) $pesan = "Id ".implode(",", $b). " Gagal dihapus  ";

		echo json_encode(array("success"=>true,"pesan"=>$pesan));
	}    
    
 



//// secrtion anggota 


function get_data_anggota(){
    	$page = $_REQUEST['page']; // get the requested page 
        $limit = $_REQUEST['rows']; // get how many rows we want to have into the grid 
        $sidx = isset($_REQUEST['sort'])?$_REQUEST['sort']:"sebagai"; // get index row - i.e. user click to sort 
        $sord = isset($_REQUEST['order'])?$_REQUEST['order']:"asc"; // get the direction if(!$sidx) $sidx =1;  
       // $id_kecamatan  = isset($_REQUEST['search_id_kecamatan'])?$_REQUEST['search_id_kecamatan']:"x";
       // $id_desa  = isset($_REQUEST['search_id_desa'])?$_REQUEST['search_id_desa']:"x";
       // $nama  = isset($_REQUEST['search_nama'])?$_REQUEST['search_nama']:"x";
        $no_kk = isset($_REQUEST['no_kk'])?$_REQUEST['no_kk']:"xxx"; // get the direction if(!$sidx) $sidx =1;  
        $req_param = array (
				"sort_by" => $sidx,
				"sort_direction" => $sord,
				"limit" => null ,
				"no_kk" => $no_kk
				/* ,
				"nama" => $nama    ,
				"id_desa"	=> $id_desa,
				"id_kecamatan" => $id_kecamatan */
		);     
           
        $row = $this->dm->get_data_anggota($req_param)->result_array();
		
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
          
        
        $result = $this->dm->get_data_anggota($req_param)->result_array();
        // sekarang format data dari dB sehingga sesuai yang diinginkan oleh jqGrid dalam hal ini aku pakai JSON format
        //$responce->page = $page; 
        $responce = new stdClass();
        $responce->total = $count; 
        //$responce->records = $count;
                $x=0;
        if($count == 0) {
        		 $responce->rows[0]['nik']	= "";    
        }   else {      
        $arr_sebagai = $this->cm->arr_hubungan;
        for($i=0; $i<count($result); $i++){
        	$x++;
            //$responce->rows[$i]['id']=$result[$i]['id_provinsi'];
            // data berikut harus sesuai dengan kolom-kolom yang ingin ditampilkan di view (js)
            $responce->rows[$i]['id_kk']	= $result[$i]['id_kk'] ;    
			$responce->rows[$i]['id_penduduk']		= $result[$i]['id_penduduk'];
			$responce->rows[$i]['nik']		 = $result[$i]['nik'] ;
			$responce->rows[$i]['nama']	= $result[$i]['nama'] ; 
			$responce->rows[$i]['ttl']		= $result[$i]['tmp_lahir'] .", ".$result[$i]['tgl_lahir'];       
			$responce->rows[$i]['jk']		= $result[$i]['jk'] ;    
			$responce->rows[$i]['sebagai']	= $arr_sebagai[$result[$i]['sebagai']] ;  
			$responce->rows[$i]['anakke']		= $result[$i]['anakke'] ;    
			 

        }
        echo json_encode($responce); 
  		  } 
} 
	


function save_anggota(){
		$this->load->library('form_validation');
		$this->form_validation->set_rules('id_penduduk_anggota','Nama Keluarga ','required');	
		 
		$this->form_validation->set_rules('sebagai','Sebagai  ','required');	
 		$this->form_validation->set_message('required', ' %s Harus diisi');
 		$this->form_validation->set_message('numeric', ' %s Harus diisi dengan angka');
 		$this->form_validation->set_error_delimiters("* ", '<br>');
		if($this->form_validation->run() == TRUE ) { 
	   
 		$data =  $this->input->post();
		 
 
 		// validasi kalo kalo ada data yang sama di dalam satu no kk

 		$this->db->where("no_kk",$data['no_kk_anggota']);
 		$this->db->where("id_penduduk",$data['id_penduduk_anggota']);

 		if($this->db->get("kk_anggota")->num_rows() > 0 ) {
 			$ret = array("success"=>false,
						"pesan"=> "Anggota keluarga sudah terdaftar di No.KK ini" );
 			echo json_encode($ret);
 			exit;
 		}
		

		//echo $this->db->last_query();
		
		$arr_angg = array(
			"no_kk" => $data['no_kk_anggota'],
			"id_penduduk" 	=> $data['id_penduduk_anggota'],
			"sebagai" => $data['sebagai']
			 
			);
		if(isset($data['anakke'])) {
			$arr_angg['anakke'] = $data['anakke'];
		}
		 
		$res = $this->db->insert("kk_anggota",$arr_angg);

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

function hapus_anggota(){

		 
	$ids = $_POST['ids'];
		$arr_id = explode(",",$ids);
		$a=array(); $b=array();
		foreach($arr_id as $id) {
			//$this->core_model->delete_table_data('kk',array("no_kk"=>$id)); 
			$this->db->where('id_kk',$id);
			$res = $this->db->delete("kk_anggota");
			//echo $this->db->last_query();
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
