<?php 
class general extends CI_Controller {
	function __construct() {
		parent::__construct();
		$this->load->model("core_model","cm");
		$this->load->helper("tanggal");

	}


	function penduduk_dropdown(){
		$q = isset($_REQUEST['q'])?$_REQUEST['q']:"";
		$res = $this->db->query("select * from v_penduduk where ( nama like '%$q%' or nik like '%$q%') and status='1' ");
		//$res = $this->db->get('v_member');
		$i=0;
		$arr = array();
		foreach($res->result_array() as $row) : 
			$i++;
		$arr[] = $row; 		
		endforeach;	 
		echo json_encode($arr);
	}


function get_data_parent(){
	$ret_arr = array();
	$data = $this->input->post();
	$this->db->where("nik",$data['nik']);
	$res = $this->db->get("v_penduduk");
	if($res->num_rows() > 0 ){
		$ret_arr = $res->row_array();
	}
	else {
		$ret_arr = array();
	}
	echo json_encode($ret_arr);
}
function get_data_nikah(){
	$ret_arr = array();
	$data = $this->input->post();
	$this->db->where("nik",$data['nik']);
	$res = $this->db->get("v_penduduk");
	if($res->num_rows() > 0 ){
		$ret_arr = $res->row_array();
	}
	else {
		$ret_arr = array();
	}
	echo json_encode($ret_arr);
}


function penduduk_dropdown_desa($jk=""){

		//$jk = $this->uri->segment(3)

		$id_desa = $this->session->userdata("operator_id_desa");
		$q = isset($_REQUEST['q'])?$_REQUEST['q']:"";

		$this->db->where("id_desa",$id_desa);
		$this->db->where(" (nama like '%$q%' or nik like '%$q%') ",null,false);


		//$res = $this->db->query("select * from v_penduduk where ( nama like '%$q%' or nik like '%$q%') and status='1'
	//		and id_desa='$id_desa'
	//	 ");
		if(!empty($jk)) {
			$this->db->where("jk",$jk);
		}

		$this->db->where("hidup_mati",1)->where("status_kependudukan <> '3'",NULL,FALSE);
		
		$res = $this->db->get('v_penduduk');
		//echo $this->db->last_query();
		//exit;
		$i=0;
		$arr = array();
		foreach($res->result_array() as $row) : 
			$i++;
		$arr[] = $row; 		
		endforeach;	 
	echo json_encode($arr);
	}

function penduduk_dropdown_desa_single($jk=""){

		//$jk = $this->uri->segment(3)

		$id_desa = $this->session->userdata("operator_id_desa");
		$q = isset($_REQUEST['q'])?$_REQUEST['q']:"";

		$this->db->where("status_kawin",'s');
		$this->db->where("id_desa",$id_desa);
		$this->db->where(" (nama like '%$q%' or nik like '%$q%') ",null,false);


		//$res = $this->db->query("select * from v_penduduk where ( nama like '%$q%' or nik like '%$q%') and status='1'
	//		and id_desa='$id_desa'
	//	 ");
		if(!empty($jk)) {
			$this->db->where("jk",$jk);
		}

		$res = $this->db->get('v_penduduk');
		//echo $this->db->last_query();
		$i=0;
		$arr = array();
		foreach($res->result_array() as $row) : 
			$i++;
		$arr[] = $row; 		
		endforeach;	 
	echo json_encode($arr);
	}	


function penduduk_dropdown_desa_sementara(){

		//$jk = $this->uri->segment(3)

		$id_desa = $this->session->userdata("operator_id_desa");
		$q = isset($_REQUEST['q'])?$_REQUEST['q']:"";

		$this->db->where("status_kependudukan",'1');
		$this->db->where("id_desa",$id_desa);
		$this->db->where(" (nama like '%$q%' or nik like '%$q%') ",null,false);


		//$res = $this->db->query("select * from v_penduduk where ( nama like '%$q%' or nik like '%$q%') and status='1'
	//		and id_desa='$id_desa'
	//	 ");
		if(!empty($jk)) {
			$this->db->where("jk",$jk);
		}

		$res = $this->db->get('v_penduduk');
		//echo $this->db->last_query();
		$i=0;
		$arr = array();
		foreach($res->result_array() as $row) : 
			$i++;
		$arr[] = $row; 		
		endforeach;	 
	echo json_encode($arr);
	}	

function suku_dropdown(){
	$q = isset($_REQUEST['q'])?$_REQUEST['q']:"";
	$this->db->like("suku",$q);
	$res = $this->db->get("master_suku");
	$i=0;
	$arr = array();
	foreach($res->result_array() as $row) : 
		$i++;
	$arr[] = $row;
	endforeach;
	echo json_encode($arr);

}


function generate_nomor($kode) {


$desa = $this->cm->data_desa();
// show_array($desa);

// echo "kode ". $kode; 
//$romawi = array(1=>"I","II","III","IV","V","VI","VII","VIII","IX","X","XI","XII");

	$bulan = date("m");
	$tahun = date("Y");
	
	$this->db->where("tahun",$tahun);
	$this->db->where("bulan",$bulan);
	$this->db->where("kode",$kode);
	$jumlah = $this->db->get("surat_a_nomor")->num_rows();
	if($jumlah == 0 ){ // jika tidak  ada 
		$ds['nomor'] = 1;
		$ds['bulan'] = date("m");
		$ds['tahun'] = date("Y");
		$ds['kode'] = $kode;
		$this->db->insert("surat_a_nomor",$ds);
	}
	// else { // jika ada 
	// 	$sql="update surat_a_nomor set nomor = nomor + 1
	// 	where kode='$kode' and tahun=$tahun and bulan = $bulan";
	// 	$this->db->query($sql);
	// 	// echo $this->db->last_query(); 
	// }

	// get the nomor, bulan, kode dan tahun 

	$this->db->where("tahun",$tahun);
	$this->db->where("bulan",$bulan);
	$this->db->where("kode",$kode);
	$surat = $this->db->get("surat_a_nomor")->row();
	// echo $this->db->last_query(); 



	$nomor_surat =$kode."/". '0'. $surat->nomor."/". $desa->kode_surat."/". $tahun;
//$romawi[$surat->bulan]."/".
	echo $nomor_surat;
}

}

?>