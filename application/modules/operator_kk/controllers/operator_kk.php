<?php 
class operator_kk extends  op_controller {
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
	$data['controller'] = "operator_kk";
   	$data['arr_kecamatan'] = $this->cm->add_arr_head($this->cm->arr_kecamatan(),'x',' - Semua Kecamatan -');
   	$data['arr_kecamatan2'] = $this->cm->add_arr_head($this->cm->arr_kecamatan(),'x',' - Pilih Kecamatan -');

   	$content = $this->load->view("operator_kk_view",$data,true);
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
 

function cek_id_penduduk($id_penduduk) {

}

function save(){
	//print_r($_POST);
	
		$this->load->library('form_validation');
		$this->form_validation->set_rules('no_kk','Nomor KK','callback_cek_no_kk');			 
		$this->form_validation->set_rules('nik','Kepala Keluarga ','callback_cek_id_penduduk');	
 		$this->form_validation->set_rules('rt','RT ','numeric');	
		$this->form_validation->set_rules('rw','RW ','numeric');	
 		$this->form_validation->set_message('required', ' %s Harus diisi');
 		$this->form_validation->set_message('numeric', ' %s Harus diisi dengan angka');
 		$this->form_validation->set_error_delimiters("* ", '<br>');
		if($this->form_validation->run() == TRUE ) { 
	   
 		$data =  $this->input->post();
		 
		unset($data['id_kecamatan']);
	 
		$data['id_penduduk'] = $this->cm->get_id_penduduk($data['nik']); 
		// tambahkan KK
		//print_r($data);
		$arr_kk = array("no_kk"=>$data['no_kk'],
						"alamat"=>$data['alamat'],
						"rt"=>$data['rt'],
						"rw"=>$data['rw'],
						"dusun"=>$data['dusun'],
						"id_desa" => $this->session->userdata("operator_id_desa"),
						"id_penduduk" => $data['id_penduduk']
		);
		$res  = $this->db->insert("kk",$arr_kk);
		
		// tambahkan membermya 
		$arr_ang = array(
		'id_kk' => md5($data['id_penduduk'].date("dmyhis")),
		'no_kk' => $data['no_kk'],
		'is_kk' => "1",
		//'sebagai' => 'b', 
		'id_penduduk' => $data['id_penduduk'],
		'urutan' => 0
		);

		$this->db->insert("kk_anggota",$arr_ang);

		//echo $this->db->last_query();
	 		if($res) {
	 			$ret = array("success"=>true,
							"pesan"=>"Berhasil disimpan",
							"operation" =>"insert");
				
	 			$this->db->where("id_penduduk",$data['id_penduduk']);
	 			$this->db->where("sebagai","a");
	 			$this->db->update("kk_anggota",array("aktif"=>0));
	 			//echo $this->db->last_query();

			}
			else {
				$ret = array("success"=>false,
							"pesan"=>"Gagal disimpan. Nama sudah ada dalam KK",
							"operation" =>"insert");
			}	
	
		}
		else {
			$ret = array("success"=>false,
						"pesan"=> validation_errors());
		}
		echo json_encode($ret);
}
 

// function cek_username2($username)
//  {
//  	 if(empty($username)) {
//  	 	$this->form_validation->set_message('cek_username2', '%s harus diisi');
//  	 	return false;
//  	 }

//  	 // get current usernaem 
//  	 $this->db->where("id_operator",$_POST['id_operator']);
//  	 $xy = $this->db->get("operator")->row();

//  	 if($xy->username <> $username)  {
//  	 	$this->db->where("username",$username);
// 	 	$jumlah = $this->db->get("operator")->num_rows();
	 	 
	 	 
// 	 	 if($jumlah > 0 ) {
// 	 	 	$this->form_validation->set_message('cek_username2', '%s sudah ada');
// 	 	 	return false;
// 	 	 }
//  	 }
 	 
//  }

function update(){
		$this->load->library('form_validation');
		$this->form_validation->set_rules('no_kk','Nomor KK','required');			 
		$this->form_validation->set_rules('nik','Kepala Keluarga ','required');	
		$this->form_validation->set_rules('rt','RT ','numeric');	
		$this->form_validation->set_rules('rw','RW ','numeric');	
 		$this->form_validation->set_message('required', ' %s Harus diisi');
 		$this->form_validation->set_message('numeric', ' %s Harus diisi dengan angka');
 		$this->form_validation->set_error_delimiters("* ", '<br>');
		if($this->form_validation->run() == TRUE ) { 
	   
 		$data =  $this->input->post();
		 
		unset($data['id_kecamatan']);
	 
		 $data['id_penduduk'] = $this->cm->get_id_penduduk($data['nik']); 
		// tambahkan KK
		$arr_kk = array("no_kk"=>$data['no_kk'],
						"alamat"=>$data['alamat'],
						"rt"=>$data['rt'],
						"rw"=>$data['rw'],
						"id_dusun"=>$data['id_dusun'],
						"id_desa" => $this->session->userdata("operator_id_desa") ,
						"id_penduduk" => $data['id_penduduk']
		);
		$this->db->where("no_kk",$data['no_kk']);
		$res  = $this->db->update("kk",$arr_kk);
		

		// cek apakah sudah ada atau belum 

		$this->db->where("no_kk",$data['no_kk']);
		$this->db->where("id_penduduk",$data['id_penduduk']);
		$this->db->where("aktif","1");

		$res = $this->db->get("kk_anggota");
		if($res->num_rows() == 0 ) {


			$this->db->where("is_kk","1");
			$this->db->where("no_kk",$data['no_kk']);
			$this->db->update("kk_anggota",array("is_kk"=>null));



			$arr_ang = array(
			'id_kk' => md5($data['id_penduduk'].date("dmyhis")),
			'no_kk' => $data['no_kk'],
			'is_kk' => "1",
			// 'sebagai' => 'b',
			'id_penduduk' => $data['id_penduduk'],
			'urutan' => 0
			);

			$this->db->insert("kk_anggota",$arr_ang);
		}
	 

		// tambahkan membermya 

		// $this->db->where("no_kk",$data['no_kk']);
		// $this->db->where("is_kk","1");
		// $this->db->delete("kk_anggota");

		// $arr_ang = array(
		// 'no_kk' => $data['no_kk'],
		// 'is_kk' => "1",
		// 'sebagai' => 'b',
		// 'id_penduduk' => $data['id_penduduk']
		// );

		// $this->db->insert("kk_anggota",$arr_ang);


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
       $nama  = isset($_REQUEST['search_nama'])?$_REQUEST['search_nama']:"";
       $no_kk  = isset($_REQUEST['search_no_kk'])?$_REQUEST['search_no_kk']:"";
       
        $req_param = array (
				"sort_by" => $sidx,
				"sort_direction" => $sord,
				"id_desa" => $this->session->userdata("operator_id_desa"),
				"limit" => null   ,
				"nama" => $nama    ,
				"no_kk" => $no_kk   
				/*
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
        		 $responce->rows[1]['no_kk']	= "";    
        }   else {      
        $arr_sebagai = $this->cm->arr_sebagai;

        for($i=0; $i<count($result); $i++){
        	$x++;
            //$responce->rows[$i]['id']=$result[$i]['id_provinsi'];
            // data berikut harus sesuai dengan kolom-kolom yang ingin ditampilkan di view (js)
            $responce->rows[$i]['no_kk']	= $result[$i]['no_kk'] ;    
			$responce->rows[$i]['alamat']	= $result[$i]['alamat'] ; 
			$responce->rows[$i]['rt']		= $result[$i]['rt'] ;       
			$responce->rows[$i]['rw']		= $result[$i]['rw'] ;    
			$responce->rows[$i]['id_desa']	= $result[$i]['id_desa'] ;  
			$responce->rows[$i]['id_dusun']	= $result[$i]['id_dusun'] ;  
			$responce->rows[$i]['dusun']	= $result[$i]['dusun'] ;  
			$responce->rows[$i]['desa']		= $result[$i]['desa'] ;  

			$responce->rows[$i]['id_penduduk']		= $result[$i]['id_penduduk']; 
			$responce->rows[$i]['nik']		= $result[$i]['nik'] ; 
			$responce->rows[$i]['nama']		= $result[$i]['nama'] ;  
 			$responce->rows[$i]['kecamatan']		= $result[$i]['kecamatan'] ;  
			$responce->rows[$i]['id_kecamatan']		= $result[$i]['id_kecamatan'] ;  

        }
        
  		  } 
  echo json_encode($responce); 
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
        $sidx = isset($_REQUEST['sort'])?$_REQUEST['sort']:"urutan , anakke"; // get index row - i.e. user click to sort 
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
        //echo $this->db->last_query();
        // sekarang format data dari dB sehingga sesuai yang diinginkan oleh jqGrid dalam hal ini aku pakai JSON format
        //$responce->page = $page; 
        $responce = new stdClass();
        $responce->total = $count; 
        //$responce->records = $count;
                $x=0;
        if($count == 0) {
        		 $responce->rows[1]['nik']	= "";    
        }   else {      
        $arr_sebagai = $this->cm->arr_sebagai;
        for($i=0; $i<count($result); $i++){
        	$x++;
            //$responce->rows[$i]['id']=$result[$i]['id_provinsi'];
            // data berikut harus sesuai dengan kolom-kolom yang ingin ditampilkan di view (js)
            $responce->rows[$i]['id_kk']	= $result[$i]['id_kk'] ;   
            $responce->rows[$i]['no_kk']	= $result[$i]['no_kk'] ;    
			$responce->rows[$i]['id_penduduk']		= $result[$i]['id_penduduk'];
			$responce->rows[$i]['nik']		 = $result[$i]['nik'] ;
			$responce->rows[$i]['umur']		 = $result[$i]['umur']." Tahun" ;
			$responce->rows[$i]['nama']	= $result[$i]['nama'] ; 
			$responce->rows[$i]['ttl']		= $result[$i]['tmp_lahir'] .", ".$result[$i]['tgl_lahir'];       
			$responce->rows[$i]['jk']		= $result[$i]['jk'] ;    
			$responce->rows[$i]['sebagai']	= $result[$i]['sebagai'] ; 
			$responce->rows[$i]['urutan']	= $result[$i]['urutan'] ; 

			$responce->rows[$i]['aktif']	= ($result[$i]['aktif']=="1")?"Ya":"Tidak" ; 
 			$responce->rows[$i]['sebagai2']	= $result[$i]['sebagai'] ; 
			
			// $responce->rows[$i]['sebagai2']	= 
			// ($result[$i]['is_kk']=="1") ? "Kepala Keluarga":
			// $arr_sebagai[$result[$i]['sebagai']] ;  
			
			$responce->rows[$i]['anakke']		= $result[$i]['anakke'] ; 
			$responce->rows[$i]['is_kk']		= $result[$i]['is_kk'] ; 
			 

        }
       
  		  } 
  	 echo json_encode($responce); 
} 
	


function save_anggota(){
		$this->load->library('form_validation');
		$this->form_validation->set_rules('id_penduduk_anggota','Nama Keluarga ','required');	
		 
		$this->form_validation->set_rules('sebagai','Sebagai  ','required');
		$this->form_validation->set_rules('anakke','Urutan anak  ','numeric');	
 		$this->form_validation->set_message('required', ' %s Harus diisi');
 		$this->form_validation->set_message('numeric', ' %s Harus diisi dengan angka');
 		$this->form_validation->set_error_delimiters("* ", '<br>');
		if($this->form_validation->run() == TRUE ) { 
	   
 		$data =  $this->input->post();
		 
 		

 
		
 		$data['id_penduduk_anggota'] = $this->cm->get_id_penduduk($data['id_penduduk_anggota']); 
		//echo $this->db->last_query();
		$arr_angg = array(
			"id_kk" => md5(date("dmyhis")),
			"no_kk" => $data['no_kk_anggota'],
			"id_penduduk" 	=> $data['id_penduduk_anggota'],
			"sebagai" => $data['sebagai']
			);

		if(isset($data['anakke'])) {
			$arr_angg['anakke'] = $data['anakke'];
		}


		// validasi nomor urutan anak 
		if($data['sebagai'] == "a") {
			$this->db->where("no_kk", $data['no_kk_anggota']);
			$this->db->where("sebagai",$data['sebagai']);
			$this->db->where("anakke",$data['anakke']);
			$this->db->where("aktif","1");
			$xres = $this->db->get("kk_anggota");
			if($xres->num_rows() == 1 ) {
				$ret = array("success"=>false,
							"pesan"=>"Anak ke ".$data['anakke']. " sudah ada",
							"operation" =>"insert");
				echo json_encode($ret); exit;
			}

			//$arr_angg['urutan'] = '2';

		} 

		if($data['sebagai'] == "i" or $data['sebagai'] == "b" ) {
			$this->db->where("no_kk", $data['no_kk_anggota']);
			$this->db->where("sebagai",$data['sebagai']);
 			$this->db->where("aktif","1");
			$xres = $this->db->get("kk_anggota");
			if($xres->num_rows() == 1 ) {
				$ret = array("success"=>false,
							"pesan"=>" Data sudah ada",
							"operation" =>"insert");
				echo json_encode($ret); exit;
			}

			// if($data['sebagai'] == "i") {
			// 	$arr_angg['urutan'] = '1';
			// }

		} 

		// if(!in_array($data['sebagai'], array('i','b'))) {
		// 	$arr_angg['urutan'] = "3";
		// }

		$arr_angg['urutan'] = $data['urutan'];
		$res = $this->db->insert("kk_anggota",$arr_angg);

	 		if($res) {
	 			$ret = array("success"=>true,
							"pesan"=>"Berhasil disimpan",
							"operation" =>"insert");
				

				
	 			if($arr_angg['sebagai'] == "i" or $arr_angg['sebagai'] == "b" ) {
				$this->db->where("id_penduduk",$arr_angg['id_penduduk']);
	 			$this->db->where("sebagai","a");
	 			$this->db->update("kk_anggota",array("aktif"=>0));	
	 			//echo $this->db->last_query();		
	 			}
			}	
			else {
				$ret = array("success"=>false,
							"pesan"=>"Gagal disimpan. Nama sudah ada dalam KK" . mysql_error(). $this->db->last_query(),
							"operation" =>"insert");
			}	
	
		}
		else {
			$ret = array("success"=>false,
						"pesan"=> validation_errors());
		}
		echo json_encode($ret);
}


function update_anggota(){
		$this->load->library('form_validation');
		$this->form_validation->set_rules('id_penduduk_anggota','Nama Keluarga ','required');	
		 
		$this->form_validation->set_rules('sebagai','Sebagai  ','required');
		$this->form_validation->set_rules('anakke','Urutan anak  ','numeric');	
 		$this->form_validation->set_message('required', ' %s Harus diisi');
 		$this->form_validation->set_message('numeric', ' %s Harus diisi dengan angka');
 		$this->form_validation->set_error_delimiters("* ", '<br>');
		if($this->form_validation->run() == TRUE ) { 
	   
 		$data =  $this->input->post();
		


		$this->db->where("no_kk",$data['no_kk_anggota']);
		$old_data = $this->db->get("kk_anggota")->row(); 
 		

		if($data['sebagai'] <> 'a' ) {
			$data['anakke'] = NULL;


		}

		// if($data['sebagai'] == "i") {
		// 	$data['urutan'] = "1";
		// }
		// if($data['sebagai'] == "a") {
		// 	$data['urutan'] = "2";
		// }
 		
 		$data['id_penduduk'] = $this->cm->get_id_penduduk($data['id_penduduk_anggota']);
 		unset($data['id_penduduk_anggota']);

 		$data['no_kk']  = $data['no_kk_anggota'];
 		unset($data['no_kk_anggota']); 


 
		$this->db->where("id_kk",$data['id_kk']);
		$this->db->update("kk_anggota",$data);
		//echo $this->db->last_query();

				$ret = array("success"=>true,
							"pesan"=>"Data berhasil disimpan",
							"operation" =>"insert");
				//echo json_encode($ret); exit;
			 
 		// 	$data['id_penduduk_anggota'] = $this->cm->get_id_penduduk($data['id_penduduk_anggota']); 
		// //echo $this->db->last_query();
		// $arr_angg = array(
		// 	"id_kk" => md5(date("dmyhis")),
		// 	"no_kk" => $data['no_kk_anggota'],
		// 	"id_penduduk" 	=> $data['id_penduduk_anggota'],
		// 	"sebagai" => $data['sebagai']
		// 	);
		// if(isset($data['anakke'])) {
		// 	$arr_angg['anakke'] = $data['anakke'];
		// }


		// // validasi nomor urutan anak 
		// if($data['sebagai'] == "a") {
		// 	$this->db->where("no_kk", $data['no_kk_anggota']);
		// 	$this->db->where("sebagai",$data['sebagai']);
		// 	$this->db->where("anakke",$data['anakke']);
		// 	$this->db->where("aktif","1");
		// 	$xres = $this->db->get("kk_anggota");



		// 	// if($xres->num_rows() == 1 ) {
		// 	// 	$ret = array("success"=>false,
		// 	// 				"pesan"=>"Anak ke ".$data['anakke']. " sudah ada",
		// 	// 				"operation" =>"insert");
		// 	// 	echo json_encode($ret); exit;
		// 	// }

		// 	$arr_angg['urutan'] = '2';

		// } 

		// if($data['sebagai'] == "i" or $data['sebagai'] == "b" ) {
		// 	$this->db->where("no_kk", $data['no_kk_anggota']);
		// 	$this->db->where("sebagai",$data['sebagai']);
 		// 		$this->db->where("aktif","1");
		// 	$xres = $this->db->get("kk_anggota");
		// 	if($xres->num_rows() == 1 ) {
		// 		$ret = array("success"=>false,
		// 					"pesan"=>" Data sudah ada",
		// 					"operation" =>"insert");
		// 		echo json_encode($ret); exit;
		// 	}

		// 	if($data['sebagai'] == "i") {
		// 		$arr_angg['urutan'] = '1';
		// 	}

		// } 


		// $res = $this->db->update("kk_anggota",$arr_angg);

		 // 		if($res) {
		 // 			$ret = array("success"=>true,
		// 					"pesan"=>"Berhasil disimpan",
		// 					"operation" =>"insert");
				

				
		 // 			if($arr_angg['sebagai'] == "i" or $arr_angg['sebagai'] == "b" ) {
		// 		$this->db->where("id_penduduk",$arr_angg['id_penduduk']);
		 // 			$this->db->where("sebagai","a");
		 // 			$this->db->update("kk_anggota",array("aktif"=>0));	
		 // 			//echo $this->db->last_query();		
		 // 			}
		// 	}	
		// 	else {
		// 		$ret = array("success"=>false,
		// 					"pesan"=>"Gagal disimpan. Nama sudah ada dalam KK",
		// 					"operation" =>"insert");
		// 	}	
	
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


function cetak($no_kk) {
	$no_kk = urldecode($no_kk);
	
	$this->db->where("no_kk",$no_kk);
	$data['kk'] = $this->db->get("v_kk")->row_array();
	
	/*echo $this->db->last_query();
	exit;*/
	
	$this->db->select('p.*, kk.*')->from('v_penduduk p')
		->join('kk_anggota kk','kk.id_penduduk=p.id_penduduk')
 		->where("aktif","1")
		->where("kk.no_kk",$no_kk)
		->where(" (p.status_kependudukan <> '3' and  p.hidup_mati = '1')  ",NULL,FALSE);
		$this->db->order_by("kk.urutan");
	$data['record'] = $this->db->get();
	//echo $this->db->last_query();
	$this->load->view("operator_kk_print",$data);
}

function word($no_kk) {
	$no_kk = urldecode($no_kk);
	
	$this->db->where("no_kk",$no_kk);
	$data['kk'] = $this->db->get("v_kk")->row_array();
	
	/*echo $this->db->last_query();
	exit;*/
	
	$this->db->select('p.*, kk.*')->from('v_penduduk p')
		->join('kk_anggota kk','kk.id_penduduk=p.id_penduduk')
 		->where("aktif","1")
		->where("kk.no_kk",$no_kk)
		->where(" (p.status_kependudukan <> '3' and  p.hidup_mati = '1')  ",NULL,FALSE);
		$this->db->order_by("kk.urutan");
	$data['record'] = $this->db->get();
	//echo $this->db->last_query();
	$html = $this->load->view("operator_kk_print",$data,true);
	$this->load->helper('download');
	force_download('Permohonan KK.doc',$html);
}

function copy_alamat(){
	$nik = $this->input->post('nik');
	$this->db->where("nik",$nik);
	$res = $this->db->get("penduduk");
	$data = $res->row_array();
	echo json_encode($data);
}




function generate(){

	$this->db->query("delete from kk_anggota");
	$this->db->query("delete from kk");

	$this->db->where("kepala_keluarga","1");
	$res = $this->db->get("penduduk");
	$data = array();
	$datax = array();
	$kk = 0;
	foreach($res->result() as $row) : 
			$data['no_kk'] = $row->no_kk;
			$data['alamat'] = $row->alamat;
			$data['rt'] = $row->rt;
			$data['rw'] = $row->rw;
			$data['id_desa'] = $row->id_desa;
			$data['dusun']  = $row->dusun;
			$data['id_penduduk'] = $row->id_penduduk;

			$this->db->insert("kk",$data);


				$data_kk['id_kk'] = md5( $row->no_kk. date("Ymdhis") );
				$data_kk['no_kk'] = $row->no_kk;
				$data_kk['id_penduduk'] = $row->id_penduduk; 
				$data_kk['aktif'] = 1;
				$data_kk['urutan'] = 0;
				$data_kk['is_kk'] = 1;
				$data_kk['sebagai'] = $row->hubungan_dlm_keluarga;  
				$data_kk['id_penduduk'] = $row->id_penduduk; 
				$this->db->insert("kk_anggota",$data_kk);

			$this->db->where("no_kk",$row->no_kk); 
			$this->db->where("kepala_keluarga <> 1",null,false);
			$this->db->order_by("umur","desc");
			$resx = $this->db->get("v_penduduk");


			//echo $this->db->last_query() . '<hr />'; 
			$kk++;
			$urutan = 1; 
			foreach($resx->result() as $rowx) : 
				$urutan++;
				$data_kk['id_kk'] = md5( $rowx->no_kk. date("Ymdhis"). microtime() );
				$data_kk['no_kk'] = $row->no_kk;
				$data_kk['id_penduduk'] = $rowx->id_penduduk; 
				$data_kk['aktif'] = 1;
				$data_kk['urutan'] = $urutan;
				$data_kk['is_kk'] =0 ;
				$data_kk['sebagai'] = $rowx->hubungan_dlm_keluarga;  
				$data_kk['id_penduduk'] = $rowx->id_penduduk; 
				$resx = $this->db->insert("kk_anggota",$data_kk);
				if(!$resx ) {
					echo "gagal insert ". mysql_error();
				}
			endforeach;


	endforeach;

	$ret = array("success"=>true,"pesan"=>"$kk data KK berhasil disimpan");
	echo json_encode($ret);
}




}


?>
