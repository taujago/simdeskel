<?php 
class lokasi extends CI_Controller {
	
	function __construct() {
		parent::__construct();
		$this->load->model("core_model","cm");
	}
	
	function index(){
		echo "halll";
	}
 
 function cek_provinsi($id_provinsi) {
 	if($id_provinsi == "x" or empty($id_provinsi)) {
		$this->form_validation->set_message('cek_provinsi', ' %s Harus dipilih');
		return false;
	}
 }
 
function simpan_kota(){
		 $data = $this->input->post();
		 
		$this->load->library('form_validation');
		$this->form_validation->set_rules('id_provinsi','Provinsi','callback_cek_provinsi');			 
		$this->form_validation->set_rules('kota','Kabupaten / Kota ','required');	
 		$this->form_validation->set_message('required', ' %s Harus diisi');
 		$this->form_validation->set_error_delimiters("* ", '<br>');
		if($this->form_validation->run() == TRUE ) { 
			 
			 $res = $this->db->insert("tiger_kota",$data);
			 if($res){
				$id = $this->db->insert_id();
				$ret = array("success"=>true, 
							 "pesan"=>"Data berhasil disimpan", 
							 "html"=>"<option value=$id>".$data['kota']."</option>");
			 }
			 else {
				$ret = array("success"=>false, 
							 "pesan"=>"Data gagal disimpan".mysql_error()
							 );
				
			 }
		 
		}
		else {
			$ret = array("success"=>false,
						"pesan"=> validation_errors());
		}
		 
		 echo json_encode($ret);
	}

 function simpan_kecamatan(){
		 $data = $this->input->post();
		 
		$this->load->library('form_validation');
		$this->form_validation->set_rules('id_kota','Kabupaten/Kota','callback_cek_provinsi');			 
		$this->form_validation->set_rules('kecamatan','Kecamatan','required');	
 		$this->form_validation->set_message('required', ' %s Harus diisi');
 		$this->form_validation->set_error_delimiters("* ", '<br>');
		if($this->form_validation->run() == TRUE ) { 
			 
			 $res = $this->db->insert("tiger_kecamatan",$data);
			 if($res){
				$id = $this->db->insert_id();
				$ret = array("success"=>true, 
							 "pesan"=>"Data berhasil disimpan", 
							 "html"=>"<option value=$id>".$data['kecamatan']."</option>");
			 }
			 else {
				$ret = array("success"=>false, 
							 "pesan"=>"Data gagal disimpan".mysql_error()
							 );
				
			 }
		 
		}
		else {
			$ret = array("success"=>false,
						"pesan"=> validation_errors());
		}
		 
		 echo json_encode($ret);
	}
 
 
 function simpan_desa(){
		 $data = $this->input->post();
		 
		$this->load->library('form_validation');
		$this->form_validation->set_rules('id_kecamatan','kecamatan','callback_cek_provinsi');			 
		$this->form_validation->set_rules('desa','Desa','required');	
 		$this->form_validation->set_message('required', ' %s Harus diisi');
 		$this->form_validation->set_error_delimiters("* ", '<br>');
		if($this->form_validation->run() == TRUE ) { 
			 
			 $res = $this->db->insert("tiger_desa",$data);
			 if($res){
				$id = $this->db->insert_id();
				$ret = array("success"=>true, 
							 "pesan"=>"Data berhasil disimpan", 
							 "html"=>"<option value=$id>".$data['desa']."</option>");
			 }
			 else {
				$ret = array("success"=>false, 
							 "pesan"=>"Data gagal disimpan".mysql_error()
							 );
				
			 }
		 
		}
		else {
			$ret = array("success"=>false,
						"pesan"=> validation_errors());
		}
		 
		 echo json_encode($ret);
	}
 
	function get_tiger_kota($id_provinsi) {
		$form = $this->uri->segment(4);
		$sel="";
		$id_kota = $this->uri->segment(4);
		$this->db->where("id_provinsi",$id_provinsi);
		$this->db->order_by("kota");
		$res = $this->db->get("tiger_kota");
		//echo $this->db->last_query();
		if($form<>0) {
		$str .="<option value=x> - Pilih Kab/Kota - </option> "; }
		else {
			$str .="<option value=x> - Semua Kab/Kota - </option> ";
		}
		foreach($res->result() as $row) :
			if($id_kota!='') {
				$sel = ($row->id == $id_kota)?"selected":"";
			}
			 $str .= "<option value=\"$row->id\" $sel> $row->kota </option> \n";
		endforeach;
		echo $str;
	}
	
	function get_tiger_kecamatan($id_kota) {
		$str="";
		$form = $this->uri->segment(4);
		$sel="";
		$id_kecamatan = $this->uri->segment(4);
		$this->db->where("id_kota",$id_kota);
		$this->db->order_by("kecamatan");
		$res = $this->db->get("tiger_kecamatan");
		//echo $this->db->last_query();
		if($form<>0) {
		$str .="<option value=x> - Pilih Kecamatan - </option> "; }
		else {
			$str .="<option value=x> - Semua Kecamatan - </option> ";
		}
		foreach($res->result() as $row) :
			if($id_kecamatan!='') {
				$sel = ($row->id == $id_kecamatan)?"selected":"";
			}
			 $str .= "<option value=\"$row->id\" $sel> $row->kecamatan </option> \n";
		endforeach;
		echo $str;
	}

	function get_tiger_desa($id_kota) {
		$form = $this->uri->segment(4);
		$sel="";
		$id_desa = $this->uri->segment(4);
		$this->db->where("id_kecamatan",$id_kota);
		$this->db->order_by("desa");
		$res = $this->db->get("tiger_desa");
		//echo $this->db->last_query();
		$str = "";
		if($form<>0) {
		$str .="<option value=x> - Pilih Desa - </option> "; }
		else {
			$str .="<option value=x> - Semua Desa - </option> ";
		}
		foreach($res->result() as $row) :
			if($id_desa!='') {
				$sel = ($row->id == $id_desa)?"selected":"";
			}
			 $str .= "<option value=\"$row->id\" $sel> $row->desa </option> \n";
		endforeach;
		echo $str;
	}

function get_tiger_desa2($id_kota) {
		$form = $this->uri->segment(4);
		$sel="";
		$id_desa = $this->uri->segment(4);
		$this->db->where("id_kecamatan",$id_kota);
		$this->db->order_by("desa");
		$res = $this->db->get("tiger_desa2");
		//echo $this->db->last_query();
		$str = "";
		if($form<>0) {
		$str .="<option value=x> - Pilih Desa - </option> "; }
		else {
			$str .="<option value=x> - Semua Desa - </option> ";
		}
		foreach($res->result() as $row) :
			if($id_desa!='') {
				$sel = ($row->id == $id_desa)?"selected":"";
			}
			 $str .= "<option value=\"$row->id\" $sel> $row->desa </option> \n";
		endforeach;
		echo $str;
	}



	function get_desa_register($id_kota) {
		$form = $this->uri->segment(4);
		$sel="";
		$id_desa = $this->uri->segment(4);
		$this->db->where("id_kecamatan",$id_kota);
		$this->db->order_by("desa");
		$res = $this->db->get("tiger_desa2");
		//echo $this->db->last_query();
		$str = "";
		if($form<>0) {
		$str .="<option value=x> - Pilih Desa - </option> "; }
		else {
			$str .="<option value=x> - Semua Desa - </option> ";
		}
		foreach($res->result() as $row) :
			if($id_desa!='') {
				$sel = ($row->id == $id_desa)?"selected":"";
			}
			 $str .= "<option value=\"$row->id\" $sel> $row->desa </option> \n";
		endforeach;
		echo $str;
	} 


	function get_kota_form($id_kabupaten) {
		$id_kota = $this->uri->segment(4);
		$this->db->where("id_kabupaten",$id_kabupaten);
		$this->db->order_by("kota");
		$res = $this->db->get("geo_kota");
		//echo $this->db->last_query();
		$str = "";
		//$str .="<option value=x> - Semua Kabupaten </option> ";
		foreach($res->result() as $row) :
			if($id_kota!='') {
				$sel = ($row->id_kota == $id_kota)?"selected":"";
			}
			 $str .= "<option value=\"$row->id_kota\" $sel> $row->kota </option> \n";
		endforeach;
		echo $str;
	}
	
	function get_kota($id_kabupaten) {
		$this->db->where("id_kabupaten",$id_kabupaten);
		$this->db->order_by("kota");
		$res = $this->db->get("geo_kota");
		$str = "";
		$str .="<option value=x> - Semua Kecamatan -  </option> ";
		foreach($res->result() as $row) :
			 $str .= "<option value=\"$row->id_kota\"> $row->kota </option> \n";
		endforeach;
		echo $str;
	}
	

	function get_id_member(){
	echo $this->cm->id_member();
	}
}
?>