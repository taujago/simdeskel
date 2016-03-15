<?php 
class penduduk extends  master_controller {
 	function __construct() {
		parent::__construct();
 
		$this->load->model("penm","dm");
		$this->load->model("core_model","cm");
		$this->load->helper("tanggal");
		 
		 
	}


function index()
    {
 
    $data['title'] = "Data Penduduk";	
    $data['header'] = "Data Penduduk";
	$data['controller'] = "penduduk";
   	$data['arr_kecamatan'] = $this->cm->add_arr_head($this->cm->arr_kecamatan(),'x',' - Semua Kecamatan -');
   	$data['arr_kecamatan2'] = $this->cm->add_arr_head($this->cm->arr_kecamatan(),'x',' - Pilih Kecamatan -');


   	$data['arr_jk']  = $this->cm->arr_jk;
   	$data['arr_golongan_darah']  = $this->cm->arr_golongan_darah;
   	$data['arr_warga_negara']  = $this->cm->arr_warga_negara;
   	$data['arr_agama']  = $this->cm->arr_agama();
   	$data['arr_pendidikan'] = $this->cm->arr_pendidikan();
   	$data['arr_status_kawin'] = $this->cm->arr_status_kawin;
   	$data['arr_provinsi']   = $this->cm->add_arr_head($this->cm->arr_tiger_provinsi(),'x','-Pilih Provinsi-');
   	$data['arr_pekerjaan'] = $this->cm->arr_pekerjaan();
   	$content = $this->load->view("penduduk_view",$data,true);
	$this->set_title("Data Pendudku");
	$this->set_content($content);
	$this->render();
    }
    
 function cek_nik($nik)
 {
 	 if(empty($nik)) {
 	 	$this->form_validation->set_message('cek_nik', '%s harus diisi');
 	 	return false;
 	 }

 	 $this->db->where("nik",$nik);
 	 $jumlah = $this->db->get("penduduk")->num_rows();
 	 ///cho $this->db->last_query();
 	 //echo "jumlah " . $jumlah;
 	 if($jumlah > 0 ) {
 	 	$this->form_validation->set_message('cek_nik', '%s sudah ada');
 	 	return false;
 	 }
 }

 
function save(){
	//print_r($_POST);
	
		$data = $this->input->post();
		$this->load->library('form_validation');
		$this->form_validation->set_rules('nik','NIK ','callback_cek_nik');
		$this->form_validation->set_rules('nama','Nama','required');
		
		$this->form_validation->set_message('required', ' %s Harus diisi '); 
		$this->form_validation->set_message('numeric', ' %s Harus diisi dengan angka ');
		$this->form_validation->set_message('alpha', ' %s Harus diisi dengan huruf ');
		
		
		$this->form_validation->set_error_delimiters("* ", '<br>');
		if($this->form_validation->run() == TRUE) {
			
	 
			unset($data['id_provinsi_sebelumnya']);		 
			unset($data['id_kota_sebelumnya']);
			unset($data['id_kecamatan_sebelumnya']);
			unset($data['id_kecamatan']);

			if(!empty($data['tgl_lahir'])) { $data['tgl_lahir'] = flipdate($data['tgl_lahir']);  } 
			else {
				unset($data['tgl_lahir']);
			}
			if(!empty($data['tgl_paspor_akhir'])) { $data['tgl_paspor_akhir'] = flipdate($data['tgl_paspor_akhir']);  }
			else {
				unset($data['tgl_paspor_akhir']);
			}
			if(!empty($data['tgl_akta_nikah'])) { $data['tgl_akta_nikah'] = flipdate($data['tgl_akta_nikah']);  }
			else {
				unset($data['tgl_akta_nikah']);
			}
			if(!empty($data['tgl_akta_cerai'])) { $data['tgl_akta_cerai'] = flipdate($data['tgl_akta_cerai']);  }
			else {
				unset($data['tgl_akta_cerai']);
			}
			
		if(! empty($_FILES['foto']['name']) ) {
			
			$config['upload_path'] = './foto/';
			$config['allowed_types'] = 'gif|jpg|png|jpeg';
			$config['max_size']	= '1000000';
			$config['max_width']  = '1024000';
			$config['max_height']  = '76800000';
			$this->load->library('upload',$config);
			if ( ! $this->upload->do_upload('foto'))
			{	//echo "<pre>";
				//print_r($_FILES); echo "</pre>";
				$error = array('error' => $this->upload->display_errors());	
				//print_r($error);	
				//echo realpath($config['upload_path']);
				 
				$ret = array("success"=>false,
							"pesan"=>"Gambar terlalu besar atau file bukan file gambar. Silahkan pilih gambar yang lain",
							"operation" =>"insert");
				echo json_encode($ret);
				exit;
			}
			else {
				$arr = $this->upload->data();
				////$data['foto'] = strtolower(str_replace(" ", "_", $arr['file_name']));
				//print_r($arr);
				// resize 
				$this->resize($arr['file_name']);
				// create thumbnail 
				//$this->create_thumbnail($arr['file_name']);
				$data['foto'] = $arr['file_name'];
				//$data['foto_thumbnail'] = "thumb_".$arr['file_name'];
			}
			}
		 
		 	unset($data['id_penduduk']);
			
			$res = $this->db->insert("penduduk",$data);
			if($res) {
				$ret = array("success"=>true,
							"pesan"=>"Berhasil disimpan",
							"operation" =>"insert");
			}
			
			
			
		}
		else {
			 $ret = array("success"=>false,
							"pesan"=>validation_errors(),
							"operation" =>"insert");
		}
		echo json_encode($ret);
		
}

function resize($file_name) {
		$config['image_library'] = 'gd2';
		$config['source_image'] = './foto/' . $file_name;
		$config['create_thumb'] = false;
		$config['maintain_ratio'] = TRUE;
		$config['width'] = 200;
		$config['height'] = 300;

		$this->load->library('image_lib', $config);
		if(!$this->image_lib->resize()) echo $this->image_lib->display_errors();
}

 

function cek_nik2($nik)
 {
 	 if(empty($nik)) {
 	 	$this->form_validation->set_message('cek_nik2', '%s harus diisi');
 	 	return false;
 	 }

 	 // get current usernaem 
 	 $this->db->where("nik",$_POST['nik']);
 	 $xy = $this->db->get("penduduk")->row();

 	 if($xy->nik <> $nik)  {
 	 	$this->db->where("nik",$nik);
	 	$jumlah = $this->db->get("penduduk")->num_rows();
	 	 
	 	 
	 	 if($jumlah > 0 ) {
	 	 	$this->form_validation->set_message('cek_nik2', '%s sudah ada');
	 	 	return false;
	 	 }
 	 }
 	 
 }

function update(){
		$data = $this->input->post();
		$this->load->library('form_validation');
		$this->form_validation->set_rules('nik','NIK ','callback_cek_nik2');
		$this->form_validation->set_rules('nama','Nama','required');
		
		$this->form_validation->set_message('required', ' %s Harus diisi '); 
		$this->form_validation->set_message('numeric', ' %s Harus diisi dengan angka ');
		$this->form_validation->set_message('alpha', ' %s Harus diisi dengan huruf ');
		
		
		$this->form_validation->set_error_delimiters("* ", '<br>');
		if($this->form_validation->run() == TRUE) {
			
	 
			unset($data['id_provinsi_sebelumnya']);		 
			unset($data['id_kota_sebelumnya']);
			unset($data['id_kecamatan_sebelumnya']);
			unset($data['id_kecamatan']);

			if(!empty($data['tgl_lahir'])) { $data['tgl_lahir'] = flipdate($data['tgl_lahir']);  } 
			else {
				unset($data['tgl_lahir']);
			}
			if(!empty($data['tgl_paspor_akhir'])) { $data['tgl_paspor_akhir'] = flipdate($data['tgl_paspor_akhir']);  }
			else {
				unset($data['tgl_paspor_akhir']);
			}
			if(!empty($data['tgl_akta_nikah'])) { $data['tgl_akta_nikah'] = flipdate($data['tgl_akta_nikah']);  }
			else {
				unset($data['tgl_akta_nikah']);
			}
			if(!empty($data['tgl_akta_cerai'])) { $data['tgl_akta_cerai'] = flipdate($data['tgl_akta_cerai']);  }
			else {
				unset($data['tgl_akta_cerai']);
			}
			
		if(! empty($_FILES['foto']['name']) ) {
			
			$config['upload_path'] = './foto/';
			$config['allowed_types'] = 'gif|jpg|png|jpeg';
			$config['max_size']	= '1000000';
			$config['max_width']  = '1024000';
			$config['max_height']  = '76800000';
			$this->load->library('upload',$config);
			if ( ! $this->upload->do_upload('foto'))
			{	//echo "<pre>";
				//print_r($_FILES); echo "</pre>";
				$error = array('error' => $this->upload->display_errors());	
				//print_r($error);	
				//echo realpath($config['upload_path']);
				 
				$ret = array("success"=>false,
							"pesan"=>"Gambar terlalu besar atau file bukan file gambar. Silahkan pilih gambar yang lain",
							"operation" =>"insert");
				echo json_encode($ret);
				exit;
			}
			else {
				$arr = $this->upload->data();
				////$data['foto'] = strtolower(str_replace(" ", "_", $arr['file_name']));
				//print_r($arr);
				// resize 
				$this->resize($arr['file_name']);
				// create thumbnail 
				//$this->create_thumbnail($arr['file_name']);
				$data['foto'] = $arr['file_name'];
				//$data['foto_thumbnail'] = "thumb_".$arr['file_name'];
			}
			}
		 
			$this->db->where("id_penduduk",$data['id_penduduk']);
			$res = $this->db->update("penduduk",$data);
			if($res) {
				$ret = array("success"=>true,
							"pesan"=>"Berhasil diupdate",
							"operation" =>"insert");
			}
			
			
			
		}
		else {
			 $ret = array("success"=>false,
							"pesan"=>validation_errors(),
							"operation" =>"insert");
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
        if($count == 0 ) {
        	  $responce->rows[0]['nik']			= " ";    
        }    
        else {     
        for($i=0; $i<count($result); $i++){
        	$x++;
            //$responce->rows[$i]['id']=$result[$i]['id_provinsi'];
            // data berikut harus sesuai dengan kolom-kolom yang ingin ditampilkan di view (js)
            $responce->rows[$i]['id_penduduk']			= $result[$i]['id_penduduk'] ;    
            $responce->rows[$i]['nik']			= $result[$i]['nik'] ;    
			$responce->rows[$i]['nama']			= $result[$i]['nama'] ; 
			$responce->rows[$i]['tgl_lahir']	= $result[$i]['tgl_lahir'] ;       
			$responce->rows[$i]['tmp_lahir2']	= $result[$i]['tmp_lahir'].", ".$result[$i]['tgl_lahir']  ;    
			$responce->rows[$i]['tmp_lahir']	= $result[$i]['tmp_lahir'] ; 
			$responce->rows[$i]['jk']			= $result[$i]['jk'] ;  
			$responce->rows[$i]['alamat']		= $result[$i]['alamat'] ;  
			$responce->rows[$i]['rt']			= $result[$i]['rt'] ;  
			$responce->rows[$i]['rw']			= $result[$i]['rw'] ;
			$responce->rows[$i]['id_desa']		= $result[$i]['id_desa'] ;  
			$responce->rows[$i]['desa']			= $result[$i]['desa'] ;   
			$responce->rows[$i]['id_kecamatan']	= $result[$i]['id_kecamatan'] ;   
			$responce->rows[$i]['kecamatan']	= $result[$i]['kecamatan'] ;   
			$responce->rows[$i]['paspoto']			= '<img width="50px" height="50px" src="'.base_url().'foto/' .$result[$i]['foto'].'" />';
			$responce->rows[$i]['warga_negara']	= $result[$i]['warga_negara'] ;   
			$responce->rows[$i]['golongan_darah']	= $result[$i]['golongan_darah'] ;  
			$responce->rows[$i]['golongan_darah']	= $result[$i]['golongan_darah'] ;  
			$responce->rows[$i]['id_agama']	= $result[$i]['id_agama'] ;  
			$responce->rows[$i]['id_pekerjaan']	= $result[$i]['id_pekerjaan'] ;
			$responce->rows[$i]['status_kawin']	= $result[$i]['status_kawin'] ;    			
			$responce->rows[$i]['id_pendidikan']	= $result[$i]['id_pendidikan'] ;  
			$responce->rows[$i]['id_kecamatan']	= $result[$i]['id_kecamatan'] ;  
			// yang sebelumnya
			$responce->rows[$i]['alamat_sebelumnya']	= $result[$i]['alamat_sebelumnya'] ;  
			$responce->rows[$i]['rt_sebelumnya']	= $result[$i]['rt_sebelumnya'] ; 
			$responce->rows[$i]['rw_sebelumnya']	= $result[$i]['rw_sebelumnya'] ; 
			$responce->rows[$i]['id_desa_sebelumnya']	= $result[$i]['id_desa_sebelumnya'] ; 
			$responce->rows[$i]['id_kecamatan_sebelumnya']	= $result[$i]['id_kecamatan_sebelumnya'] ; 
			$responce->rows[$i]['id_kota_sebelumnya']	= $result[$i]['id_kota_sebelumnya'] ; 
			$responce->rows[$i]['id_provinsi_sebelumnya']	= $result[$i]['id_provinsi_sebelumnya'] ; 

			// dokumen

			$responce->rows[$i]['no_paspor']		= $result[$i]['no_paspor'] ; 
			$responce->rows[$i]['tgl_paspor_akhir']	= $result[$i]['tgl_paspor_akhir'] ; 
			$responce->rows[$i]['no_akta_lahir']	= $result[$i]['no_akta_lahir'] ; 
			$responce->rows[$i]['no_akta_nikah']	= $result[$i]['no_akta_nikah'] ; 
			$responce->rows[$i]['tgl_akta_nikah']	= $result[$i]['tgl_akta_nikah'] ; 
			$responce->rows[$i]['no_akta_cerai']	= $result[$i]['no_akta_cerai'] ; 
			$responce->rows[$i]['tgl_akta_cerai']	= $result[$i]['tgl_akta_cerai'] ; 



			 

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
			$this->db->where('id_penduduk',$id);
			$res = $this->db->delete("penduduk");
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
