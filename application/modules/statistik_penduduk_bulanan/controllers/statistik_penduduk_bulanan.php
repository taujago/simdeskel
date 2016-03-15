<?php 
class statistik_penduduk_bulanan extends  op_controller {
 	function __construct() {
		parent::__construct();
 
		$this->load->model("statpb","dm");
		$this->load->model("core_model","cm");
		$this->load->model("add_model","add");
		$this->load->model("add_model","am");
		$this->load->helper("tanggal");
		$this->desa2 = $this->cm->data_desa(); 
		 
	}


function index()
    {
 
    $data['title'] = "Laporan Penduduk Per Bulan ";	
    $data['header'] = "Laporan Penduduk Per Bulan ";
	$data['controller'] = "statistik_penduduk_bulanan";
  

 
 
   	$content = $this->load->view("statistik_penduduk_bulanan_view",$data,true);
	$this->set_title("Laporan Penduduk Per Bulan ");
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
 
 function cetak($bulan) {
 	 
	
 	//$this->cm->data_desa();

	$data['bulan'] = $bulan;
	$data['bulan_ini'] = $this->dm->get_penduduk($bulan);
	$data['pi'] = $this->dm->penduduk_input($bulan);
	$data['lahir'] = $this->dm->get_lahir($bulan);
	$data['mati'] = $this->dm->get_mati($bulan);
	$data['datang'] = $this->dm->get_datang($bulan);
	$data['pindah'] = $this->dm->get_pindah($bulan);
	$data['sekarang'] = $this->dm->get_sekarang($bulan);
	
	// pendatang 
	$data['pendatang_antar_desa'] = $this->dm->pendatang_antar_desa($bulan);
	$data['pendatang_antar_kecamatan'] = $this->dm->pendatang_antar_kecamatan($bulan); 
	$data['pendatang_antar_kota'] = $this->dm->pendatang_antar_kota($bulan); 
	$data['pendatang_antar_provinsi'] = $this->dm->pendatang_antar_provinsi($bulan);  
	$data['pendatang_antar_negara'] = $this->dm->pendatang_antar_negara($bulan); 	 
	$data['pendatang_jumlah'] = $this->dm->pendatang_jumlah($bulan);
	
	$data['pindah_antar_desa'] = $this->dm->pindah_antar_desa($bulan);
	$data['pindah_antar_kecamatan'] = $this->dm->pindah_antar_kecamatan($bulan);
	$data['pindah_antar_kota'] = $this->dm->pindah_antar_kota($bulan);
	$data['pindah_antar_provinsi'] = $this->dm->pindah_antar_provinsi($bulan);
	$data['pindah_antar_negara'] = $this->dm->pindah_antar_negara($bulan);
	$data['pindah_jumlah'] = $this->dm->pindah_jumlah($bulan);
	
	$this->load->view("statistik_penduduk_bulanan_cetak",$data); 	



 }

 function pdf($bulan){
   	$data['bulan'] = $bulan;
   	$data['pi'] = $this->dm->penduduk_input($bulan);
	$data['bulan_ini'] = $this->dm->get_penduduk($bulan);
	$data['lahir'] = $this->dm->get_lahir($bulan);
	$data['mati'] = $this->dm->get_mati($bulan);
	$data['datang'] = $this->dm->get_datang($bulan);
	$data['pindah'] = $this->dm->get_pindah($bulan);
	$data['sekarang'] = $this->dm->get_sekarang($bulan);
	
	// pendatang 
	$data['pendatang_antar_desa'] = $this->dm->pendatang_antar_desa($bulan);
	$data['pendatang_antar_kecamatan'] = $this->dm->pendatang_antar_kecamatan($bulan); 
	$data['pendatang_antar_kota'] = $this->dm->pendatang_antar_kota($bulan); 
	$data['pendatang_antar_provinsi'] = $this->dm->pendatang_antar_provinsi($bulan);  
	$data['pendatang_antar_negara'] = $this->dm->pendatang_antar_negara($bulan); 	 
	$data['pendatang_jumlah'] = $this->dm->pendatang_jumlah($bulan);
	
	$data['pindah_antar_desa'] = $this->dm->pindah_antar_desa($bulan);
	$data['pindah_antar_kecamatan'] = $this->dm->pindah_antar_kecamatan($bulan);
	$data['pindah_antar_kota'] = $this->dm->pindah_antar_kota($bulan);
	$data['pindah_antar_provinsi'] = $this->dm->pindah_antar_provinsi($bulan);
	$data['pindah_antar_negara'] = $this->dm->pindah_antar_negara($bulan);
	$data['pindah_jumlah'] = $this->dm->pindah_jumlah($bulan);
    $data['header'] = "DATA PENDUDUK BULANAN ".$this->desa2->bentuk_lembaga;
    $data['title'] = $data['header'];

        $this->load->library('Pdf');
        $pdf = new Pdf('L', 'mm', 'F4', true, 'UTF-8', false);
        $pdf->SetTitle( $data['header']);       
        $pdf->SetMargins(10, 10, 10);
        $pdf->SetHeaderMargin(10);
        $pdf->SetFooterMargin(10);
        $pdf->setFooterFont(Array(PDF_FONT_NAME_DATA, '', PDF_FONT_SIZE_DATA));

        $pdf->SetAutoPageBreak(true,10);
        $pdf->SetAuthor('PKPD  taujago@gmail.com');
         
            
        $pdf->setPrintHeader(false);
        $pdf->setPrintFooter(true);

         // add a page
        $pdf->AddPage('L');


         // $html = $this->load->view("ringkasan_pdf_head",$data,true);
         // $pdf->writeHTML($html, true, false, true, false, '');


         $html = $this->load->view("pdf/statistik_penduduk_bulanan_pdf",$data,true);
         // $pdf->writeHTML($html, true, false, true, false, '');

 
      
         //$html .= $this->load->view("pdf_ttd",$data,true);
         $pdf->writeHTML($html, true, false, true, false, '');      
 

         $pdf->Output($data['header']. $this->session->userdata("tahun") .'.pdf', 'I');

}
 
 
	
}


?>