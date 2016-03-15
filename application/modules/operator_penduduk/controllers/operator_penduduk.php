<?php 
class operator_penduduk extends  op_controller {
 	function __construct() {
		parent::__construct();
 
		$this->load->model("penm","dm");
		$this->load->model("core_model","cm");
		$this->load->model("add_model","am");
		$this->load->helper("tanggal");
		 
		 
	}



function index()
    {


    

 	//echo $this->uri->segment(3);
    $data['title'] = "Data Penduduk";	
    $data['header'] = "Data Penduduk";
	$data['controller'] = "operator_penduduk";
   	$data['arr_kecamatan'] = $this->cm->add_arr_head($this->cm->arr_kecamatan(),'x',' - Semua Kecamatan -');
   	$data['arr_kecamatan2'] = $this->cm->add_arr_head($this->cm->arr_kecamatan(),'x',' - Pilih Kecamatan -');


   	$data['arr_jk']  = $this->cm->arr_jk;
   	//$data['arr_golongan_darah']  = $this->cm->arr_golongan_darah;
   	$data['arr_warga_negara']  = $this->cm->arr_warga_negara;
   	$data['arr_agama']  = $this->cm->arr_agama();
   	$data['arr_pendidikan'] = $this->cm->arr_pendidikan();
   	$data['arr_status_kawin'] = $this->cm->arr_status_kawin;
   	$data['arr_provinsi']   = $this->cm->add_arr_head($this->cm->arr_tiger_provinsi(),'x','-Pilih Provinsi-');
   	$data['arr_pekerjaan'] = $this->cm->arr_pekerjaan();

   	$data['arr_dusun'] = $this->cm->arr_dusun();
	$data['xxx'] = $this->uri->segment(3);
   	$content = $this->load->view("operator_penduduk_view",$data,true);
	$this->set_title("Data Penduduk");
	$this->set_content($content);
	$this->render();
    }

function tambah(){
	$data['title'] = "Tambah Data Penduduk";	
    $data['header'] = "Tambah Data Penduduk";
	$data['controller'] = "operator_penduduk";
   	$data['arr_kecamatan'] = $this->cm->add_arr_head($this->cm->arr_kecamatan(),'x',' - Semua Kecamatan -');
   	$data['arr_kecamatan2'] = $this->cm->add_arr_head($this->cm->arr_kecamatan(),'x',' - Pilih Kecamatan -');


   	$data['arr_jk']  = $this->cm->arr_jk;
   	//$data['arr_golongan_darah']  = $this->cm->arr_golongan_darah;
   	$data['arr_warga_negara']  = $this->cm->arr_warga_negara;
   	$data['arr_agama']  = $this->cm->arr_agama();
   	$data['arr_pendidikan'] = $this->cm->arr_pendidikan();
   	$data['arr_status_kawin'] = $this->cm->arr_status_kawin;
   	$data['arr_provinsi']   = $this->cm->add_arr_head($this->cm->arr_tiger_provinsi(),'x','-Pilih Provinsi-');
   	$data['arr_pekerjaan'] = $this->cm->arr_pekerjaan();

   	$data['arr_dusun'] = $this->cm->arr_dusun();
	$data['xxx'] = $this->uri->segment(3);
	$data['method'] = "save";
	$content = $this->load->view("operator_penduduk_form_tambah",$data,true);
	$this->set_title("Data Penduduk");
	$this->set_content($content);
	$this->render();	
}


function edit($id_penduduk){
	$data['title'] = "Edit Data Penduduk";	
    $data['header'] = "Edit Data Penduduk";
	$data['controller'] = "operator_penduduk";
   	$data['arr_kecamatan'] = $this->cm->add_arr_head($this->cm->arr_kecamatan(),'x',' - Semua Kecamatan -');
   	$data['arr_kecamatan2'] = $this->cm->add_arr_head($this->cm->arr_kecamatan(),'x',' - Pilih Kecamatan -');


   	$data['arr_jk']  = $this->cm->arr_jk;
   	//$data['arr_golongan_darah']  = $this->cm->arr_golongan_darah;
   	$data['arr_warga_negara']  = $this->cm->arr_warga_negara;
   	$data['arr_agama']  = $this->cm->arr_agama();
   	$data['arr_pendidikan'] = $this->cm->arr_pendidikan();
   	$data['arr_status_kawin'] = $this->cm->arr_status_kawin;
   	$data['arr_provinsi']   = $this->cm->add_arr_head($this->cm->arr_tiger_provinsi(),'x','-Pilih Provinsi-');
   	$data['arr_pekerjaan'] = $this->cm->arr_pekerjaan();

   	$data['arr_dusun'] = $this->cm->arr_dusun();
	$data['xxx'] = $this->uri->segment(3);
	$data['method'] = "update";
	$data['id_penduduk'] = $id_penduduk;

	$this->db->where("id_penduduk",$id_penduduk);

	$data['penduduk'] = $this->db->get("v_penduduk")->row_array();
	//$data['penduduk']['tgl_lahir'] = 
	/*echo "<pre>"; print_r($data['penduduk']);
	exit;*/
	$data['penduduk']['regdate'] = flipdate($data['penduduk']['regdate']);
	$content = $this->load->view("operator_penduduk_form2",$data,true);
	$this->set_title("Data Penduduk");
	$this->set_content($content);
	$this->render();	
}

function detail_json($id_penduduk) {
	$this->db->where("id_penduduk",$id_penduduk);
	$data = $this->db->get("v_penduduk")->row_array();
	echo json_encode($data);
}
    
function get_det($id)
{
	$ret = $this->dm->get_detail($id);
	echo json_encode($ret);
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

function save_more(){
	$data = $this->input->post();
	/*$this->load->library('form_validation');
	$this->form_validation->set_rules('no_akte','No Akte Kelahiran ','required');
	$this->form_validation->set_rules('tanggal_akte','Tanggal Akte Kelahiran ','required');
	$this->form_validation->set_message('required', ' %s Harus diisi ');
	
	$this->form_validation->set_error_delimiters("* ", '<br>');*/
	
	//if($this->form_validation->run() == TRUE) {
		unset($data['tambahan']);
		unset($data['tab']);
		if(!empty($data['tanggal_akte'])){
			$temp = explode("-",$data['tanggal_akte']);
			$temp = $temp[2]."-".$temp[1]."-".$temp[0];
			$data['tanggal_akte'] = $temp;
		}
		if(isset($data['tab_name'])){
			$tab = $data['tab_name'];//nama table dari setiap checkbox
			$arr = array();//data id table yang akan disimpan ke checkbox akan disimpan disini
			foreach($tab as $key=>$val)
			{
				$temp = explode("penduduk_",$val);
				$id_tab = "id_".$temp[1];
				!empty($data[$id_tab])?$arr[$key] = $data[$id_tab]:$arr[$key]="";
				unset($data[$id_tab]);//variable checkbox di delete dari var data agar gampang save
			}
			$c = 0;
			foreach($tab as $key){
				$dat = $arr[$c];
				$temp = explode("penduduk_",$key);
				$id_tab = "id_".$temp[1];
				$this->db->delete($key, array('id_penduduk' => $data['id_penduduk'])); 
				//echo $this->db->last_query();
				if(!empty($dat)){
					foreach($dat as $key2)
					{
						$temp = array (
							"id_penduduk" => $data['id_penduduk'],
							$id_tab => $key2
						);
						$this->db->insert($key,$temp);
					}
				}
				$c++;
			}
		}
		unset($data['tab_name']);//nama table juga di unset
		//var_dump($arr);
		$this->db->where("id_penduduk",$data['id_penduduk']);
		$res = $this->db->get("penduduk_detail")->row_array();
		if(empty($res)){
			$temp = array(
						 "id_penduduk"=>$data['id_penduduk']
						 );
			$this->db->insert("penduduk_detail",$temp);
		}
		$this->db->where("id_penduduk",$data['id_penduduk']);
		$res = $this->db->update("penduduk_detail",$data);
		if($res) {
			$ret = array("success"=>true,
								"pesan"=>"Berhasil disimpan",
								"operation" =>"insert");
		}
	//}
	/*else {
			 $ret = array("success"=>false,
							"pesan"=>validation_errors(),
							"operation" =>"insert");
		}*/
	//var_dump($data);
	echo json_encode($ret);
}


function cek_desa($id_desa_sebelumnya){
	$id_desa = $this->session->userdata("operator_id_desa");;
	//echo "id_desa $id_desa sebelumnya  " . $_POST['id_desa_sebelumnya'];
	if($id_desa == $id_desa_sebelumnya ) {
		$this->form_validation->set_message('cek_desa', ' Desa asal tidak boleh sama ');
		return false;
	}
}
function save(){

		$data = $this->input->post();
		//print_r($data);

		$this->load->library('form_validation');
		//$this->form_validation->set_rules('nik','NIK ','callback_cek_nik');
		$this->form_validation->set_rules('nama','Nama','required');
		$this->form_validation->set_rules('jk','Jenis Kelamin','required');
		$this->form_validation->set_rules('warga_negara','Warga Negara','required');
		$this->form_validation->set_rules('id_desa_sebelumnya','Desa ','callback_cek_desa');
		$this->form_validation->set_rules('status_kependudukan','Status Kependudukan','required');
		// $this->form_validation->set_rules('id_dusun','Dusun','required');
		$this->form_validation->set_rules('hidup_mati','Hidup Mati ','required');
		$this->form_validation->set_rules('rt','RT ','required');

		$this->form_validation->set_message('required', ' %s Harus diisi '); 
		$this->form_validation->set_message('numeric', ' %s Harus diisi dengan angka ');
		$this->form_validation->set_message('alpha', ' %s Harus diisi dengan huruf ');
		
		
		$this->form_validation->set_error_delimiters("* ", '<br>');
		if($this->form_validation->run() == TRUE) {
			
	 
			
			 

			if(!empty($data['tgl_lahir'])) { 
				$data['tgl_lahir'] = flipdate($data['tgl_lahir']);  } 
			else {
				 $data['tgl_lahir'] = null;
			}
		 
			
		if(! empty($_FILES['foto']['name']) ) {
			
			$config['upload_path'] = './foto/';
			$config['allowed_types'] = 'gif|jpg|png|jpeg';
			$config['max_size']	= '1000000';
			$config['max_width']  = '1024000';
			$config['max_height']  = '76800000';
			$this->load->library('upload',$config);
			if ( ! $this->upload->do_upload('foto'))
			{	 
				$error = array('error' => $this->upload->display_errors());	
				 
				 // show_array($error);
				$ret = array("success"=>false,
							"pesan"=>"Gambar terlalu besar atau file bukan file gambar. Silahkan pilih gambar yang lain",
							"operation" =>"insert");
				echo json_encode($ret);
				exit;
			}
			else {
				$arr = $this->upload->data();
			 
				$this->resize($arr['file_name']);
				 
				$data['foto'] = $arr['file_name'];
				 
			}
			}
		 
		 	//unset($data['id_penduduk']);

			//if(empty($data['id_desa_sebelumnya'])) unset($data['id_desa_sebelumnya']);


			///             ________________
			///  __________/ Bersih bersih  |
			//   __________  ooke oke oke   |
			//             \________________|
			// unset($data['id_provinsi_sebelumnya']);		 
			// unset($data['id_kota_sebelumnya']);
			// unset($data['id_kecamatan_sebelumnya']);
			if($data['status_kependudukan'] == 0 ) { // tetap
				 
				unset($data['sementara_maksud']);
				unset($data['sementara_id_tujuan']);
				unset($data['id_desa_sebelumnya']);
				unset($data['rt_sebelumnya']);
				unset($data['rw_sebelumnya']);
				unset($data['alamat_sebelumnya']);
				 
			}
			if($data['status_kependudukan'] == "1" ) { // sementara 
				unset($data['id_desa_sebelumnya']);
				unset($data['rt_sebelumnya']);
				unset($data['rw_sebelumnya']);
				unset($data['alamat_sebelumnya']);

				$data['sementara_id_tujuan'] = $this->cm->get_id_penduduk($data['sementara_id_tujuan']);
			}
			if($data['status_kependudukan'] == "2" ) { // pendatang  
				$data['flag'] = 'd';
				//unset($data['id_desa_sebelumnya']);
				unset($data['sementara_maksud']);
				unset($data['sementara_id_tujuan']);
				
				if($data['jenis_kedatangan'] == "ln"){
				unset($data['rt_sebelumnya']);
				unset($data['rw_sebelumnya']);
				unset($data['id_desa_sebelumnya']); 
				unset($data['alamat_sebelumnya']); 
				}
				else {
					unset($data['asal_negara']);
				}
			}

		 	$data['id_penduduk'] = md5($data['nik'].date("dmyhis"));
			
			$data['id_desa'] = $this->session->userdata("operator_id_desa");
			
			
			
			
			//$data['regdate'] = date("Y-m-d");
			$data['regdate'] =  flipdate($data['regdate']);
			
			
			//print_r($data); exit;
			//$datakk = $data; 
			// // $data_kk['no_kk'] = $data['no_kk']; 
			// // $data_kk['is_kk'] = isset($data['is_kk'])?$data['is_kk']:""; 
			// // $data_kk['sebagai'] = $data['sebagai']; 
			// // //print_r($data_kk);
			// // //exit;

			// unset($data['no_kk']);
			// unset($data['is_kk']);
			// unset($data['sebagai']);

//			$data['id_suku'] = intval($data['id_suku']);

			$data['masa_berlaku_ktp'] = (empty($data['masa_berlaku_ktp']))?null:flipdate($data['masa_berlaku_ktp']);

			$res = $this->db->insert("penduduk",$data);
			// $res = true;
			if($res) {
				$ret = array("success"=>true,
							"pesan"=>"Berhasil disimpan",
							"operation" =>"insert");

				//////-------------------------------------- kartu keluarga --- 

				/// bagian kartu keluarga 
		// dari dulu kartu keluarganya. kalo belum ada, buat baru. 

		// if(!empty($data_kk['no_kk'])) 
		// {
		// 	//echo "hello.. Im here. ";
		// 		$this->db->where("no_kk",$data_kk['no_kk']);
		// 		$res = $this->db->get("kk");
		// 		if($res->num_rows()==0) {   // nomor KK belum ada. 
		// 			$arr_kk['no_kk'] = $data_kk['no_kk'];
		// 			$arr_kk['alamat'] = $data['alamat'];
		// 			$arr_kk['rt'] 	= $data['rt'];
		// 			$arr_kk['rw'] 	= $data['rw'];
		// 			$arr_kk['id_desa'] = $this->session->userdata("operator_id_desa");
		// 			$arr_kk['id_dusun'] = $data['id_dusun'];
		// 			if( $data_kk['is_kk'] == "1" ) {
		// 				$arr_kk['id_penduduk'] = $data['id_penduduk']; 
		// 			}
		// 			$this->db->insert("kk",$arr_kk);
		// 			//echo $this->db->last_query();
				
		// 		}
		// 		else { // nomor kk sudah ada .
		// 			if( $data_kk['is_kk'] == "1" ) {
		// 				$arr_kk['id_penduduk'] = $data['id_penduduk']; 
		// 				$arr_kk['no_kk']  = $data_kk['no_kk'];
		// 				$this->db->where("no_kk",$data_kk['no_kk']);
		// 				$this->db->update("kk",$arr_kk);
		// 			} 
		// 			//echo $this->db->last_query();
		// 		}

		// 		// inputkan ke table anggota kk. 

		// 		$arr_kk_anggota['no_kk'] = $data_kk['no_kk'];
		// 		$arr_kk_anggota['id_kk'] = md5(md5("dmYhis").microtime());
		// 		$arr_kk_anggota['sebagai'] = $data_kk['sebagai'];
		// 		$arr_kk_anggota['is_kk'] = ($data_kk['is_kk']=="1")?$data_kk['is_kk']:null;
		// 		$arr_kk_anggota['id_penduduk'] = $data['id_penduduk'] ;

		// 		if($data_kk['is_kk'] == "1" or $data_kk['sebagai'] == "b" ) {
		// 			$arr_kk_anggota['urutan'] = "0";
		// 		}
		// 		else if($data_kk['sebagai'] == "i") {
		// 			$arr_kk_anggota['urutan'] = "1";
		// 		}
		// 		else if($data_kk['sebagai'] == "a") {
		// 			$arr_kk_anggota['urutan'] = "2";
		// 		}
		// 		else {
		// 			$arr_kk_anggota['urutan'] = "3";
		// 		}

		// 		$this->db->where("no_kk",$data_kk['no_kk']);
		// 		$this->db->where("id_penduduk",$data['id_penduduk']);
		// 		$this->db->where("aktif","1");
		// 		$xres = $this->db->get("kk_anggota");
		// 		// echo  $this->db->last_query() ;
		// 		// echo "\n <br /> jumlahnya brapa  " . $xres->num_rows();
				 
		// 		if( $xres->num_rows() == "0") {



		// 		$this->db->insert("kk_anggota",$arr_kk_anggota);


		// 		//				// mencari urutan anak berdasarkan tanggal lahir 

		// 		 // update urutan 
		// 		if($arr_kk_anggota['sebagai'] == "a") { 

		// 		$tgl_lahir = $data['tgl_lahir'];
		// 		$no_kk = $data_kk['no_kk'];

		// 		$sql ="SELECT IFNULL(MAX(anakke),1)  AS anak  FROM penduduk p
		// 				JOIN  kk_anggota kk ON p.id_penduduk = kk.`id_penduduk`
		// 				WHERE p.id_penduduk IN (
		// 				SELECT id_penduduk FROM kk_anggota WHERE no_kk = '$no_kk' AND sebagai = 'a'
		// 				AND aktif = '1'
		// 				)
		// 				AND tgl_lahir > '$tgl_lahir'";
		// 		$xyz = $this->db->query($sql)->row_array();		
		// 		$arr_kk_anggota['anakke'] = $xyz['anak'];

		// 		// kita update semua yang lain. cari dulu
		// 		$sql="SELECT p.id_penduduk  FROM penduduk p
		// 				JOIN  kk_anggota kk ON p.id_penduduk = kk.`id_penduduk`
		// 				WHERE p.id_penduduk IN (
		// 				SELECT id_penduduk FROM kk_anggota WHERE no_kk = '$no_kk' AND sebagai = 'a'
		// 				AND aktif = '1'
		// 				)
		// 				AND tgl_lahir > '$tgl_lahir'";
		// 		$rx = $this->db->query($sql);
		// 		foreach($rx->result() as $xrow) : 
		// 			$this->db->where("id_penduduk",$xrow->id_penduduk);
		// 			$this->db->where("aktif","1");
		// 			$this->db->where("sebagai","a");
		// 			$this->db->where("no_kk",$no_kk);
		// 			$this->db->set("anakke","anakke + 1",false);
		// 			$this->db->update("kk_anggota");
		// 		endforeach;

		// 		}		
		// 		//


		// 		}
		// 		//echo "insert anggota kk " .$this->db->last_query();

		// 	}


				// /     							   ____________
				//\\________ end of kartu keluarga ___/


			}
			else {
				$ret = array("success"=>false,
							"pesan"=>"Berhasil gagal " . mysql_error(),
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
		//print_r($data);
		unset($data['foto']);
		$this->load->library('form_validation');
		//$this->form_validation->set_rules('nik','NIK ','required');
		$this->form_validation->set_rules('nama','Nama','required');
		$this->form_validation->set_rules('status_kependudukan','Status Kependudukan','required');

		$this->form_validation->set_rules('jk','Jenis Kelamin','required');
		$this->form_validation->set_rules('warga_negara','Warga Negara','required');
 		// $this->form_validation->set_rules('id_dusun','Dusun','required');
 		$this->form_validation->set_rules('hidup_mati','Hidup Mati ','required');

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
		
		
		//print_r($_FILES['foto']);
		//exit; 	
		//if(! empty($_FILES['foto']['name']) ) {
		//if(isset($_FILES['foto']['name']) ) {	
		if( isset($_FILES['foto']) /*and  is_uploaded_file($_FILES['foto']['tmp_name']) */ ) {	
			//echo "masuk masuk gambar ";
		
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
		 
		/*if(isset($data['foto'])) {
			echo "ada data foto ". $data['foto'];
		}
		else {
			echo "mana mana data foto";
		}
				unset($data['id_provinsi_sebelumnya']);		 
			unset($data['id_kota_sebelumnya']);
			unset($data['id_kecamatan_sebelumnya']);
			if($data['status_kependudukan'] == 0 ) { // tetap
				unset($data['id_desa_sebelumnya']);
				unset($data['sementara_maksud']);
				unset($data['sementara_id_tujuan']);
				//unset($data['sementara_id_tujuan']);
			}
			if($data['status_kependudukan'] == "1" ) { // sementara 
				unset($data['id_desa_sebelumnya']);
			}
			if($data['status_kependudukan'] == "2" ) { // pendatang  
				//unset($data['id_desa_sebelumnya']);
				unset($data['sementara_maksud']);
				unset($data['sementara_id_tujuan']);
			}*/
			
			//print_r($data); exit;
			unset($data['id_provinsi_sebelumnya']);		 
			unset($data['id_kota_sebelumnya']);
			unset($data['id_kecamatan_sebelumnya']);
			if($data['status_kependudukan'] == 0 ) { // tetap
				 
				unset($data['sementara_maksud']);
				unset($data['sementara_id_tujuan']);
				unset($data['id_desa_sebelumnya']);
				unset($data['rt_sebelumnya']);
				unset($data['rw_sebelumnya']);
				unset($data['alamat_sebelumnya']);
				 
			}
			if($data['status_kependudukan'] == "1" ) { // sementara 
				unset($data['id_desa_sebelumnya']);
				unset($data['rt_sebelumnya']);
				unset($data['rw_sebelumnya']);
				unset($data['alamat_sebelumnya']);

				$data['sementara_id_tujuan'] = $this->cm->get_id_penduduk($data['sementara_id_tujuan']);
			}
			if($data['status_kependudukan'] == "2" ) { // pendatang  
				//unset($data['id_desa_sebelumnya']);
				unset($data['sementara_maksud']);
				unset($data['sementara_id_tujuan']);
				
				if($data['jenis_kedatangan'] == "ln"){
				unset($data['rt_sebelumnya']);
				unset($data['rw_sebelumnya']);
				unset($data['id_desa_sebelumnya']); 
				unset($data['alamat_sebelumnya']); 
				}
				else {
					unset($data['asal_negara']);
				}
			}


			$data['masa_berlaku_ktp'] = (empty($data['masa_berlaku_ktp']))?null:flipdate($data['masa_berlaku_ktp']);

			$data['regdate'] =  flipdate($data['regdate']);
			$this->db->where("id_penduduk",$data['id_penduduk']);
			$res = $this->db->update("penduduk",$data);
			//echo $this->db->last_query();
			if($res) {
				$ret = array("success"=>true,
							"pesan"=>"Berhasil diupdate",
							"operation" =>"update");
			}
			
			
			
		}
		else {
			 $ret = array("success"=>false,
							"pesan"=>validation_errors(),
							"operation" =>"update");
		}
		echo json_encode($ret);
}

function get_data(){
    	$page = $_REQUEST['page']; // get the requested page 
        $limit = $_REQUEST['rows']; // get how many rows we want to have into the grid 
        $sidx = isset($_REQUEST['sort'])?$_REQUEST['sort']:"provinsi"; // get index row - i.e. user click to sort 
        $sord = isset($_REQUEST['order'])?$_REQUEST['order']:"asc"; // get the direction if(!$sidx) $sidx =1;  
        //$id_kecamatan  = isset($_REQUEST['search_id_kecamatan'])?$_REQUEST['search_id_kecamatan']:"x";
        //$id_desa  = isset($_REQUEST['search_id_desa'])?$_REQUEST['search_id_desa']:"x";
        $nama  = isset($_REQUEST['search_nama'])?$_REQUEST['search_nama']:"zzzzzzzz";
        $nik  = isset($_REQUEST['search_nik'])?$_REQUEST['search_nik']:"x";
        $status_kependudukan  = isset($_REQUEST['search_status_kependudukan'])?$_REQUEST['search_status_kependudukan']:"x";
        $status_kawin  = isset($_REQUEST['search_status_kawin'])?$_REQUEST['search_status_kawin']:"x";
        $jk  = isset($_REQUEST['search_jk'])?$_REQUEST['search_jk']:"x";
       
        $req_param = array (
				"sort_by" => $sidx,
				"sort_direction" => $sord,
				"limit" => null  ,
				"id_desa"	=> $this->session->userdata("operator_id_desa"),
				"nik" => $nik,
				"jk" => $jk,
				"status_kawin" => $status_kawin,
				"status_kependudukan" => $status_kependudukan,
				"nama" => $nama,
				"id_dusun" =>   isset($_REQUEST['search_id_dusun'])?$_REQUEST['search_id_dusun']:"x"
				/*
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
        $responce = new stdClass();
        $responce->total = $count; 
        //$responce->records = $count;


        $x=0;
        if($count == 0 ) {
        	  //$responce->rows[0]['nik']			= null;    
        	 $responce->rows[1][$sidx] = ''; 
        }    
        else {     
        for($i=0; $i<count($result); $i++){
        	$x++;
            //$responce->rows[$i]['id']=$result[$i]['id_provinsi'];
            // data berikut harus sesuai dengan kolom-kolom yang ingin ditampilkan di view (js)
            $responce->rows[$i]['id_penduduk']	 = $result[$i]['id_penduduk'] ;   
            $responce->rows[$i]['regdate']	 =  flipdate($result[$i]['regdate']) ;   
            $responce->rows[$i]['nik']			 = $result[$i]['nik'] ;    
			$responce->rows[$i]['nama']			 = $result[$i]['nama'] ; 
			$responce->rows[$i]['tgl_lahir']	 = $result[$i]['tgl_lahir'] ;       
			
			$responce->rows[$i]['tmp_lahir']	 = $result[$i]['tmp_lahir'] ; 
			$responce->rows[$i]['jk']			 = $result[$i]['jk'] ;  
			$responce->rows[$i]['alamat']		 = $result[$i]['alamat'] ;  
			$responce->rows[$i]['rt']			 = $result[$i]['rt'] ;  
			$responce->rows[$i]['rw']			 = $result[$i]['rw'] ;
			$responce->rows[$i]['id_desa']		 = $result[$i]['id_desa'] ; 
			$responce->rows[$i]['desa']			 = $result[$i]['desa'] ;   
			// $responce->rows[$i]['id_dusun']		 = $result[$i]['id_dusun'] ;
			$responce->rows[$i]['id_kecamatan']	 = $result[$i]['id_kecamatan'] ;   
			$responce->rows[$i]['kecamatan']	 = $result[$i]['kecamatan'] ; 
			$responce->rows[$i]['id_pendidikan'] = $result[$i]['id_pendidikan'] ;  
			$responce->rows[$i]['baca_tulis']	 = $result[$i]['baca_tulis'] ;  
			
			  
 		
			$responce->rows[$i]['warga_negara']	= $result[$i]['warga_negara'] ;   
			$responce->rows[$i]['golongan_darah']	= $result[$i]['golongan_darah'] ;  
 			$responce->rows[$i]['id_agama']	= $result[$i]['id_agama'] ;  
			$responce->rows[$i]['id_pekerjaan']	= $result[$i]['id_pekerjaan'] ;
			$responce->rows[$i]['status_kawin']	= $result[$i]['status_kawin'] ;    			
			$responce->rows[$i]['id_pendidikan']	= $result[$i]['id_pendidikan'] ;  
			$responce->rows[$i]['id_kecamatan']	= $result[$i]['id_kecamatan'] ;  
			$responce->rows[$i]['status_kependudukan']	= $result[$i]['status_kependudukan'] ; 
			
			$arr_status_kependudukan = $this->cm->arr_status_kependudukan; 
			$responce->rows[$i]['status_kependudukan2']	= ($result[$i]['status_kependudukan'] == "")?"":$arr_status_kependudukan[$result[$i]['status_kependudukan']] ; 
			$responce->rows[$i]['hidup_mati']	= $result[$i]['hidup_mati'] ; 
			//$responce->rows[$i]['id_suku']	= $result[$i]['id_suku'] ; 		
			$responce->rows[$i]['keturunan']	= $result[$i]['keturunan'] ; 	
			$responce->rows[$i]['dusun']	= $result[$i]['dusun'] ; 	
			$responce->rows[$i]['pendidikan']	= $result[$i]['pendidikan'] ; 	
			$responce->rows[$i]['pekerjaan']	= $result[$i]['pekerjaan'] ; 			
			$responce->rows[$i]['status_hidup']	= $result[$i]['status_hidup'] ; 	
			$responce->rows[$i]['umur']	= $result[$i]['umur'] ; 
			$responce->rows[$i]['jenis_kedatangan']	= $result[$i]['jenis_kedatangan'] ; 
			
			$responce->rows[$i]['asal_negara']	= $result[$i]['asal_negara'] ;
			$responce->rows[$i]['umur']	= $result[$i]['umur'] ; 
			$responce->rows[$i]['rt_sebelumnya']		= $result[$i]['rt_sebelumnya'] ; 
			$responce->rows[$i]['rw_sebelumnya']		= $result[$i]['rw_sebelumnya'] ; 
			$responce->rows[$i]['alamat_sebelumnya']		= $result[$i]['alamat_sebelumnya'] ; 
			$responce->rows[$i]['id_desa_sebelumnya']		= $result[$i]['id_desa_sebelumnya'] ; 
			// $responce->rows[$i]['id_kecamatan_sebelumnya']		= $result[$i]['id_kecamatan_sebelumnya'] ; 
			// $responce->rows[$i]['id_kota_sebelumnya']		= $result[$i]['id_kota_sebelumnya'] ; 
			// $responce->rows[$i]['id_provinsi_sebelumnya']		= $result[$i]['id_provinsi_sebelumnya'] ; 
			$responce->rows[$i]['sementara_maksud']		= $result[$i]['sementara_maksud'] ; 
			$responce->rows[$i]['sementara_id_tujuan']		= $result[$i]['sementara_id_tujuan'] ; 
			 



			 $responce->rows[$i]['foto']			= (!empty($result[$i]['foto']))?
			'<img width="50px" height="50px" src="'.base_url().'foto/' .$result[$i]['foto'].'" />':
			'<img width="50px" height="50px" src="'.base_url().'foto/no_photo.jpg" />';
			
	/*$responce->rows[$i]['no_paspor']		= $result[$i]['no_paspor'] ; 
			$responce->rows[$i]['tgl_paspor_akhir']	= $result[$i]['tgl_paspor_akhir'] ; 
			$responce->rows[$i]['no_akta_lahir']	= $result[$i]['no_akta_lahir'] ; 
			$responce->rows[$i]['no_akta_nikah']	= $result[$i]['no_akta_nikah'] ; 
			$responce->rows[$i]['tgl_akta_nikah']	= $result[$i]['tgl_akta_nikah'] ; 
			$responce->rows[$i]['no_akta_cerai']	= $result[$i]['no_akta_cerai'] ; 
			$responce->rows[$i]['tgl_akta_cerai']	= $result[$i]['tgl_akta_cerai'] ; */

			 

        }
    }
        echo json_encode($responce); 
    }
//////////////////////tamabahan untuk funsi detail grid
function get_tambahan(){
		$page = $_REQUEST['page']; // get the requested page 
        $limit = $_REQUEST['rows']; // get how many rows we want to have into the grid 
        $sidx = isset($_REQUEST['sort'])?$_REQUEST['sort']:"id_penduduk"; // get index row - i.e. user click to sort 
        $sord = isset($_REQUEST['order'])?$_REQUEST['order']:"desc"; // get the direction if(!$sidx) $sidx =1;  
       	$id = $_REQUEST['id_penduduk']; // get the requested page 
		$id1 = $_REQUEST['id1'];
		$id2 = $_REQUEST['id2'];
		$table = $_REQUEST['table']; // nama tabel yang di-request 
		$table_m = $_REQUEST['table_m']; // nama tabel master 
        $req_param = array (
				"sort_by" => $sidx,
				"sort_direction" => $sord,
				"limit" => $limit,
				"page" => $page,
                "id_penduduk"  => $id,
				"id1"  => $id1,//untuk table master
				"id2"  => $id2,//untuk table data
				"table"  => $table,
				"table_m"  => $table_m
		);
		$result = $this->dm->get_m_tambahan($req_param)->result_array();
		$this->db->where("deleted","0");
		$this->db->where("id_penduduk",$id);
		$temp = $this->db->get($table)->result_array();
		$tot = count($temp);
        $responce = new stdClass();
        $responce->total = $tot;
		$c = 0;
		foreach($result as $var)
		{
			$responce->rows[$c] = $var;
			$c++;
		}
		//$responce->rows = $result;
        echo json_encode($responce); 
}
function get_galian(){
		$page = $_REQUEST['page']; // get the requested page 
        $limit = $_REQUEST['rows']; // get how many rows we want to have into the grid 
        $sidx = isset($_REQUEST['sort'])?$_REQUEST['sort']:"id_penduduk"; // get index row - i.e. user click to sort 
        $sord = isset($_REQUEST['order'])?$_REQUEST['order']:"desc"; // get the direction if(!$sidx) $sidx =1;  
       	$id = $_REQUEST['id_penduduk']; // get the requested page 
		$id1 = $_REQUEST['id1'];
		$id2 = $_REQUEST['id2'];
		$table = $_REQUEST['table']; // nama tabel yang di-request 
		$table_m = $_REQUEST['table_m']; // nama tabel master 
        $req_param = array (
				"sort_by" => $sidx,
				"sort_direction" => $sord,
				"limit" => null,
                "id_penduduk"  => $id,
				"id1"  => $id1,//untuk table master
				"id2"  => $id2,//untuk table data
				"table"  => $table,
				"table_m"  => $table_m
		);
        $result = $this->dm->get_m_galian($req_param)->result_array();
		$c = 0;
		foreach($result as $res){
			$res['milik_adat'] == 1 ? $result[$c]['milik_adat'] = 'Ya' : $result[$c]['milik_adat'] = 'Tidak';
			$res['milik_perorangan'] == 1 ? $result[$c]['milik_perorangan'] = 'Ya' : $result[$c]['milik_perorangan'] = 'Tidak';
			$c++;
		}
		//var_dump($result);
        echo json_encode($result); 
}
function simpan(){
        $data = $this->input->post();
		$table = $data['tab'];
		unset($data['tab']);
		unset($data['id']);
		if(isset($data['milik_adat'])){
			 $data['milik_adat'] == 'Ya' ? $data['milik_adat'] = 1 : $data['milik_adat'] = 0;
			 $data['milik_perorangan'] == 'Ya' ? $data['milik_perorangan'] = 1 : $data['milik_perorangan'] = 0;
	 	}
		//if(!empty($empty))echo "empty";
       	$this->load->library('form_validation');
		if($table == "penduduk_produksi_tanaman_pangan"){
			$this->form_validation->set_rules('id_produksi_tanaman_pangan','Produksi Tanaman Pangan ','required');    
			$this->form_validation->set_rules('lahan_tanaman_pangan','Luas Lahan ','required');    
			$this->form_validation->set_rules('hasil_tanaman_pangan','Hasil ','required');    
			$this->form_validation->set_rules('id_pemasaran_hasil','Pemasaran Hasil ','required');    
		}
		else if($table == "penduduk_produksi_tanaman_buah"){
			$this->form_validation->set_rules('id_produksi_tanaman_buah','Produksi Tanaman Buah ','required');    
			$this->form_validation->set_rules('lahan_tanaman_buah','Luas Lahan ','required');    
			$this->form_validation->set_rules('hasil_tanaman_buah','Hasil ','required');    
			$this->form_validation->set_rules('id_pemasaran_hasil','Pemasaran Hasil ','required');    
		}
		else if($table == "penduduk_produksi_tanaman_obat"){
			$this->form_validation->set_rules('id_produksi_tanaman_obat','Produksi Tanaman Obat ','required');    
			$this->form_validation->set_rules('lahan_tanaman_obat','Luas Lahan ','required');    
			$this->form_validation->set_rules('hasil_tanaman_obat','Hasil ','required');    
			$this->form_validation->set_rules('id_pemasaran_hasil','Pemasaran Hasil ','required');    
		}
		else if($table == "penduduk_produksi_perkebunan"){
			$this->form_validation->set_rules('id_produksi_perkebunan','Produksi Perkebunan ','required');    
			$this->form_validation->set_rules('lahan_perkebunan','Luas Lahan ','required');    
			$this->form_validation->set_rules('hasil_perkebunan','Hasil ','required');    
			$this->form_validation->set_rules('id_pemasaran_hasil','Pemasaran Hasil ','required');    
		}
		else if($table == "penduduk_produksi_hutan"){
			$this->form_validation->set_rules('id_produksi_hutan','Produksi Hutan ','required');      
			$this->form_validation->set_rules('hasil_produksi_hutan','Hasil ','required');    
			$this->form_validation->set_rules('id_pemasaran_hasil','Pemasaran Hasil ','required');    
		}
		else if($table == "penduduk_produksi_ternak"){
			$this->form_validation->set_rules('id_produksi_ternak','Produksi Ternak ','required');      
			$this->form_validation->set_rules('hasil_produksi_ternak','Hasil ','required');    
			$this->form_validation->set_rules('id_pemasaran_hasil','Pemasaran Hasil ','required');    
		}
		else if($table == "penduduk_produksi_pengolahan_ternak"){
			$this->form_validation->set_rules('id_produksi_pengolahan_ternak','Nama Hasil Ternak ','required');      
			$this->form_validation->set_rules('hasil_produksi_pengolahan_ternak','Banyaknya Produksi ','required');    
			$this->form_validation->set_rules('id_pemasaran_hasil','Pemasaran Hasil ','required');    
		}
		else if($table == "penduduk_produksi_perikanan"){
			$this->form_validation->set_rules('id_produksi_perikanan','Produksi Perikanan ','required');      
			$this->form_validation->set_rules('hasil_produksi_perikanan','Hasil ','required');    
			$this->form_validation->set_rules('id_pemasaran_hasil','Pemasaran Hasil ','required');    
		}
		else{
			$this->form_validation->set_rules('id_bahan_galian','Nama Bahan Galian ','required');      
			$this->form_validation->set_rules('hasil_bahan_galian','Hasil ','required'); 
			$this->form_validation->set_rules('satuan_bahan_galian','Satuan Bahan Galian ','required');      
			$this->form_validation->set_rules('milik_adat','Milik Adat ','required'); 
			$this->form_validation->set_rules('milik_perorangan','Milik Perorangan ','required');      
			$this->form_validation->set_rules('id_pemasaran_hasil','Pemasaran Hasil ','required');   
		}
        $this->form_validation->set_message('required', ' %s Harus diisi '); 
        
        $this->form_validation->set_error_delimiters("* ", '<br>');
        if($this->form_validation->run() == TRUE) {
 
 //				unset($data['id']);
//				$data['hubungan'] = 
				//var_dump($data);
				//die();
                $res = $this->db->insert($table,$data);

                if($res) {    
                $ret = array("success"=>true,
                            "pesan"=>"Data berhasil disimpan",
                            "operation" =>"insert");
                }
                else {
                 $ret = array("success"=>false,
                            "pesan"=>"Data berhasil disimpan" .mysql_error(),
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
function hapus_det($table){
    $data = $this->input->post();
    $ids = explode(",", $data['ids']);
    foreach($ids as $id) {
        $this->db->where("id",$id);
        $this->db->update($table,array("deleted"=>1));
		//echo $this->db->last_query();
    }
    echo json_encode(array("success"=>true,"pesan"=>"Berhasil dihapus"));
}
function update_det(){
	 $data = $this->input->post();
	 $table = $data['tab'];
	 unset($data['tab']);
	 if(isset($data['milik_adat'])){
		 $data['milik_adat'] == 'Ya' ? $data['milik_adat'] = 1 : $data['milik_adat'] = 0;
		 $data['milik_perorangan'] == 'Ya' ? $data['milik_perorangan'] = 1 : $data['milik_perorangan'] = 0;
	 }
	 $this->db->where("id",$data['id']);
     $res = $this->db->update($table,$data);
	
     if($res) {    
     	$ret = array("success"=>true,
     	"pesan"=>"Data berhasil disimpan ",
		"operation" =>"insert");
	}
	else {
	$ret = array("success"=>false,
		"pesan"=>"Data gagal disimpan " .mysql_error(),
		"operation" =>"insert");   
	}
	echo json_encode($ret);
}

/////////////////////
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
    
 
 

 function cetak($id_penduduk) {

 	$this->db->select('*')->from('v_penduduk p')
 	->join('kk_anggota kk','p.id_penduduk=kk.id_penduduk','left')
 	->where("p.id_penduduk",$id_penduduk)
 	->where("p.id_desa",$this->session->userdata("operator_id_desa"));

 	$res = $this->db->get();
 	$data=$res->row_array();
	
 	$this->cm->data_desa();
	$temp = $this->dm->get_all_data($id_penduduk);
	$data = array_merge($data,$temp);
	
 	$data['nama_camat'] = $this->cm->desa->nama_camat;
	//echo $this->cm->desa->nama_camat;
	//var_dump($data);
	$this->load->view("biodata",$data); 	



 }


 function pdf($id_penduduk) {

 	$this->db->select('*')->from('v_penduduk p')
 	->join('kk_anggota kk','p.id_penduduk=kk.id_penduduk','left')
 	->where("p.id_penduduk",$id_penduduk)
 	->where("p.id_desa",$this->session->userdata("operator_id_desa"));

 	$res = $this->db->get();
 	$data=$res->row_array();
	
 	$this->cm->data_desa();
	$temp = $this->dm->get_all_data($id_penduduk);
	$data = array_merge($data,$temp);
	
 	$data['nama_camat'] = $this->cm->desa->nama_camat;	 
    $data['controller'] = get_class($this);       
    $data['header'] = "BIODATA PENDUDUK ";
  

        $this->load->library('Pdf');
        $pdf = new Pdf('L', 'mm', 'F4', true, 'UTF-8', false);
        $pdf->SetTitle( $data['header']);
        //$pdf->SetHeaderMargin(30);
        //$pdf->SetTopMargin(10);

 


         
        $pdf->SetMargins(10, 10, 10);
        $pdf->SetHeaderMargin(10);
        $pdf->SetFooterMargin(10);
        $pdf->setFooterFont(Array(PDF_FONT_NAME_DATA, '', PDF_FONT_SIZE_DATA));

        $pdf->SetAutoPageBreak(true,10);
        $pdf->SetAuthor('PKPD  taujago@gmail.com');
         
            
        $pdf->setPrintHeader(false);
        $pdf->setPrintFooter(true);

         // add a page
        $pdf->AddPage('P');

 


         $html = $this->load->view("pdf/pdf_biodata",$data,true);
         $pdf->writeHTML($html, true, false, true, false, '');


  

         $pdf->Output($data['header']. $this->session->userdata("tahun") .'.pdf', 'I');
	



 }

 function json_detail($id_penduduk) {
 	$this->db->where("id_penduduk",$id_penduduk);
 	$res = $this->db->get("v_penduduk");
 	$data = $res->row_array();
 	echo json_encode($data);
 }

  function detail($id_penduduk) {
 	$this->db->where("id_penduduk",$id_penduduk);
 	$res = $this->db->get("v_penduduk");
 	$data = $res->row_array();

 	//echo "<pre>"; print_r($data); fecho "</pre>";
 	$data['title'] = "Detail Data Penduduk";
	$data['arr_pekerjaan'] = $this->dm->arr_pekerjaan($id_penduduk);
	$data['arr_detail'] = $this->dm->get_detail($id_penduduk);
	$data['controller'] = get_class($this);
	isset($data['arr_detail']['id_penduduk'])?:$data['arr_detail']['id_penduduk']=$id_penduduk;
 	//$this->load->view("operator_penduduk_detail_view",$data);
 	$content = $this->load->view("operator_penduduk_detail_view",$data,true);
	$this->set_title("Data Detail Penduduk");
	$this->set_content($content);
	$this->render();
 }


 function get_temp_nik(){
 	  
 	echo $this->am->get_temp_nik();
 }
	
}


?>

