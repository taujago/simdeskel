<?php 
class silsilah extends op_controller {

	function __construct(){
		parent::__construct();
		$this->load->model("core_model","cm");
		$this->load->model("sm","dm");
         $this->load->model("add_model","am");
		$this->load->helper("tanggal"); 
	}


	function index(){
		
		
		
		
		
		$data['controller'] = get_class($this);
		
		$data['header'] = "Surat Menyurat";
		$data['title'] = $data['header'];
		$content = $this->load->view($data['controller']."_view",$data,true);
		$this->set_title($data['header']);
		$this->set_content($content);
		$this->render();
	}
	
	function data_silsilah($id_penduduk=""){
		$id_penduduk = !empty($id_penduduk)?$this->cm->get_id_penduduk($id_penduduk):"";
		$data['detail'] = $this->dm->detail($id_penduduk);
		
		$data['pasangan'] = $this->dm->pasangan($id_penduduk);
		
		//$data['bapak'] = $this->dm->orangtua($id_penduduk,'b');
		$data['bapak'] = $this->dm->get_bapak($id_penduduk);
		$data['ibu'] = $this->dm->get_ibu($id_penduduk);
		
		$data['saudara'] = $this->dm->saudara($id_penduduk);
		$data['anak'] = $this->dm->anak($id_penduduk);
		if(count($data['detail']) == 0 ) {
			echo "Penduduk tidak ditemukan";
		}
		else $this->load->view("silsilah_detail",$data);
	}
	
	
 
	 function cetak_silsilah($id_penduduk=""){


	 	//$id_penduduk = !empty($id_penduduk)?$this->cm->get_id_penduduk($id_penduduk):"";

		$data['detail'] = $this->dm->detail($id_penduduk);
		// echo $this->db->last_query();
		
		$data['pasangan'] = $this->dm->pasangan($id_penduduk);
		
		// $data['bapak'] = $this->dm->orangtua($id_penduduk,'b');
		// $data['ibu'] = $this->dm->orangtua($id_penduduk,'i');
		$data['bapak'] = $this->dm->get_bapak($id_penduduk);
		$data['ibu'] = $this->dm->get_ibu($id_penduduk);
		
		$data['saudara'] = $this->dm->saudara($id_penduduk);
		$data['anak'] = $this->dm->anak($id_penduduk);
		if(count($data['detail']) == 0 ) {
			echo "Penduduk tidak ditemukan";
		}
		else $this->load->view("silsilah_print",$data);
	}
	


}
?>