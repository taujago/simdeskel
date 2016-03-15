<?php 
class statistik_penduduk extends  op_controller {
 	function __construct() {
		parent::__construct(); 
		$this->load->model("penm","dm");
		$this->load->model("core_model","cm");
		$this->load->model("add_model","am");
		$this->load->helper("tanggal");
		$this->desa2 = $this->cm->data_desa(); 
		 
	}

 
function index()
    {
 
    $data['title'] = "Data Penduduk";	
    $data['header'] = "Data Penduduk";
	$data['controller'] = "statistik_penduduk"; 
   	$content = $this->load->view("statistik_penduduk_view",$data,true);
	$this->set_title("Data Penduduk");
	$this->set_content($content);
	$this->render();
    }
   

 
function get_data(){
    	$page = $_REQUEST['page']; // get the requested page 
        $limit = $_REQUEST['rows']; // get how many rows we want to have into the grid 
        $sidx = isset($_REQUEST['sort'])?$_REQUEST['sort']:"provinsi"; // get index row - i.e. user click to sort 
        $sord = isset($_REQUEST['order'])?$_REQUEST['order']:"asc"; // get the direction if(!$sidx) $sidx =1;  
        //$id_kecamatan  = isset($_REQUEST['search_id_kecamatan'])?$_REQUEST['search_id_kecamatan']:"x";
        //$id_desa  = isset($_REQUEST['search_id_desa'])?$_REQUEST['search_id_desa']:"x";
        $nama  = isset($_REQUEST['search_nama'])?$_REQUEST['search_nama']:"x";
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
				"nama" => $nama    
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
			
			$responce->rows[$i]['tmp_lahir']	= $result[$i]['tmp_lahir'] ; 
			$responce->rows[$i]['jk']			= $result[$i]['jk'] ;  
			$responce->rows[$i]['alamat']		= $result[$i]['alamat'] ;  
			$responce->rows[$i]['rt']			= $result[$i]['rt'] ;  
			$responce->rows[$i]['rw']			= $result[$i]['rw'] ;
			$responce->rows[$i]['id_desa']		= $result[$i]['id_desa'] ; 
			$responce->rows[$i]['desa']			= $result[$i]['desa'] ;   
			$responce->rows[$i]['id_dusun']		= $result[$i]['id_dusun'] ;
			$responce->rows[$i]['id_kecamatan']	= $result[$i]['id_kecamatan'] ;   
			$responce->rows[$i]['kecamatan']	= $result[$i]['kecamatan'] ; 
			$responce->rows[$i]['id_pendidikan']		= $result[$i]['id_pendidikan'] ;  
			$responce->rows[$i]['baca_tulis']		= $result[$i]['baca_tulis'] ;  
			
			  
 		
			$responce->rows[$i]['warga_negara']	= $result[$i]['warga_negara'] ;   
			$responce->rows[$i]['golongan_darah']	= $result[$i]['golongan_darah'] ;  
 			$responce->rows[$i]['id_agama']	= $result[$i]['id_agama'] ;  
			$responce->rows[$i]['id_pekerjaan']	= $result[$i]['id_pekerjaan'] ;
			$responce->rows[$i]['status_kawin']	= $result[$i]['status_kawin'] ;    			
			$responce->rows[$i]['id_pendidikan']	= $result[$i]['id_pendidikan'] ;  
			$responce->rows[$i]['id_kecamatan']	= $result[$i]['id_kecamatan'] ;  
			$responce->rows[$i]['status_kependudukan']	= $result[$i]['status_kependudukan'] ; 
			
			$arr_status_kependudukan = $this->cm->arr_status_kependudukan; 
			$responce->rows[$i]['status_kependudukan2']	= $arr_status_kependudukan[$result[$i]['status_kependudukan']] ; 
			$responce->rows[$i]['hidup_mati']	= $result[$i]['hidup_mati'] ; 
 			$responce->rows[$i]['keturunan']	= $result[$i]['keturunan'] ; 	
			$responce->rows[$i]['dusun']	= $result[$i]['dusun'] ; 	
			$responce->rows[$i]['pendidikan']	= $result[$i]['pendidikan'] ; 	
			$responce->rows[$i]['pekerjaan']	= $result[$i]['pekerjaan'] ; 			
			$responce->rows[$i]['status_hidup']	= $result[$i]['status_hidup'] ; 	
			$responce->rows[$i]['umur']	= $result[$i]['umur'] ; 

			$responce->rows[$i]['umur']	= $result[$i]['umur'] ; 
			$responce->rows[$i]['rt_sebelumnya']		= $result[$i]['rt_sebelumnya'] ; 
			$responce->rows[$i]['rw_sebelumnya']		= $result[$i]['rw_sebelumnya'] ; 
			$responce->rows[$i]['alamat_sebelumnya']		= $result[$i]['alamat_sebelumnya'] ; 
			$responce->rows[$i]['id_desa_sebelumnya']		= $result[$i]['id_desa_sebelumnya'] ; 
			$responce->rows[$i]['id_kecamatan_sebelumnya']		= $result[$i]['id_kecamatan_sebelumnya'] ; 
			$responce->rows[$i]['id_kota_sebelumnya']		= $result[$i]['id_kota_sebelumnya'] ; 
			$responce->rows[$i]['id_provinsi_sebelumnya']		= $result[$i]['id_provinsi_sebelumnya'] ; 
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
 

 
 

 function cetak() {
 	$this->db->select('*')->from('v_penduduk p')
	->where("hidup_mati","1")->where("status_kependudukan not in ('1','3')",null,false)
 	->where("p.id_desa",$this->session->userdata("operator_id_desa"))
	->order_by("id_dusun");

 	$data['record'] = $res = $this->db->get();
	$id_desa =	 $this->session->userdata("operator_id_desa");
	$data['l'] =  $this->dm->get_stat('l'); //$this->dm->get_data(array("jk"=>"l","id_desa"=>$id_desa))->num_rows();
	$data['p'] =  $this->dm->get_stat('p'); //$this->dm->get_data(array("jk"=>"p","id_desa"=>$id_desa))->num_rows();
	
 	//$this->cm->data_desa();
	$this->load->view("statistik_penduduk_cetak",$data);
 }

function pdf(){
   $data['controller'] = get_class($this);

 	$this->db->select('*')->from('v_penduduk p')
	->where("hidup_mati","1")
	->where("status_kependudukan not in ('3')",null,false)
 	->where("p.id_desa",$this->session->userdata("operator_id_desa"))
	->order_by("no_kk");

 	$data['record'] = $res = $this->db->get();
 	// echo $this->db->last_query(); exit;
 	$data['l'] =  $this->dm->get_stat('l'); //$this->dm->get_data(array("jk"=>"l","id_desa"=>$id_desa))->num_rows();
	$data['p'] =  $this->dm->get_stat('p'); //$this->dm->get_data(array("jk"=>"p","id_desa"=>$id_desa))->num_rows();
	
   
    $data['header'] = "DATA PENDUDUK ".$this->desa2->bentuk_lembaga;
    $data['title'] = $data['header'];

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
        $pdf->AddPage('L');


         // $html = $this->load->view("ringkasan_pdf_head",$data,true);
         // $pdf->writeHTML($html, true, false, true, false, '');


         $html = $this->load->view("pdf/statistik_penduduk_pdf",$data,true);
         $pdf->writeHTML($html, true, false, true, false, '');



         $halaman  = $pdf->getPage();
         $pdf->startTransaction();
         $y = $pdf->getY();
      
         $html = $this->load->view("pdf_ttd",$data,true);
         $pdf->writeHTML($html, true, false, true, false, '');
       

         if($halaman <> $pdf->getPage() ) {
            $pdf->rollbackTransaction(true);

            $pdf->AddPage();
            $html = $this->load->view("pdf/statistik_penduduk_pdf_table_header",$data,true);
            $pdf->writeHTML($html, true, false, true, false, '');

            $html = $this->load->view("pdf_ttd",$data,true);
            $pdf->writeHTML($html, true, false, true, false, '');

         }

         else if( $y < 20 ) {
            $pdf->rollbackTransaction(true);

            //$pdf->AddPage();
            $html = $this->load->view("pdf/statistik_penduduk_pdf_table_header",$data,true);
            $pdf->writeHTML($html, true, false, true, false, '');

            $html = $this->load->view("pdf_ttd",$data,true);
            $pdf->writeHTML($html, true, false, true, false, '');

         }

         $pdf->Output($data['header']. $this->session->userdata("tahun") .'.pdf', 'I');

}
 function pdf2(){
   $data['controller'] = get_class($this);

 	$this->db->select('*')->from('v_penduduk p')
	->where("hidup_mati","1")
	->where("status_kependudukan not in ('3')",null,false)
 	->where("p.id_desa",$this->session->userdata("operator_id_desa"))
	->order_by("no_kk");

 	$res = $this->db->get();

 	$arr_tampung = array();

 	foreach($res->result_array() as $row) : 
 		$arr_tampung[] = $row;
 	endforeach;

 	$data['record'] = $arr_tampung;
 	// echo $this->db->last_query(); exit;
 	$data['l'] =  $this->dm->get_stat('l'); //$this->dm->get_data(array("jk"=>"l","id_desa"=>$id_desa))->num_rows();
	$data['p'] =  $this->dm->get_stat('p'); //$this->dm->get_data(array("jk"=>"p","id_desa"=>$id_desa))->num_rows();
	
   
    $data['header'] = "DATA PENDUDUK ".$this->desa2->bentuk_lembaga;
    $data['title'] = $data['header'];

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
        $pdf->AddPage('L');


         // $html = $this->load->view("ringkasan_pdf_head",$data,true);
         // $pdf->writeHTML($html, true, false, true, false, '');


         $html = $this->load->view("pdf/statistik_penduduk_pdf2",$data,true);
         $pdf->writeHTML($html, true, false, true, false, '');



         $halaman  = $pdf->getPage();
         $pdf->startTransaction();
         $y = $pdf->getY();
      
         $html = $this->load->view("pdf_ttd",$data,true);
         $pdf->writeHTML($html, true, false, true, false, '');
       

         if($halaman <> $pdf->getPage() ) {
            $pdf->rollbackTransaction(true);

            $pdf->AddPage();
            $html = $this->load->view("pdf/statistik_penduduk_pdf_table_header",$data,true);
            $pdf->writeHTML($html, true, false, true, false, '');

            $html = $this->load->view("pdf_ttd",$data,true);
            $pdf->writeHTML($html, true, false, true, false, '');

         }

         else if( $y < 20 ) {
            $pdf->rollbackTransaction(true);

            //$pdf->AddPage();
            $html = $this->load->view("pdf/statistik_penduduk_pdf_table_header",$data,true);
            $pdf->writeHTML($html, true, false, true, false, '');

            $html = $this->load->view("pdf_ttd",$data,true);
            $pdf->writeHTML($html, true, false, true, false, '');

         }

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

 	//echo "<pre>"; print_r($data); echo "</pre>";
 	$data['title'] = "Detail Data Penduduk";
 	//$this->load->view("statistik_penduduk_detail_view",$data);
 	$content = $this->load->view("statistik_penduduk_detail_view",$data,true);
	$this->set_title("Data Detail Penduduk");
	$this->set_content($content);
	$this->render();
 }
	
///function jasper(){
	///	$this->load->library("phpjasper"); 

		///$jasper = new PHPJasperXML();
		// echo "<pre>";
		// var_dump($jasper); 
		// echo "</pre>";
		// exit;


		///$jasper->arrayParameter=array("baris2"=>"KECAMATAN ". $kecamatan,
			///					      "baris1"=>"". $kota,
				///				       "baris3"=>  $desa2,
					///			       "sumleft"=>$desa2->nama_kepala_desa,
						///		       "sumright_desa_date"=>$desa2,
							///	       "sumroght_name"=>$desa2->nama_sek_desa,
								///       "pangkat"=>$desa2->pangkat_sek_desa,
								   ///    "NIP"=>$desa2->nip_sek_desa,

								     //);


	

	///	$jasper->load_xml_file("application/modules/statistik_penduduk/views/statistik_penduduk.jrxml");
		// $jasper->load_xml_file("C:/ikdesJeneponto/htdocs/sikdes/views/reports/perubahan.jrxml");
		///$jasper->transferDBtoArray($this->db->hostname,$this->db->username,$this->db->password,$this->db->database);
		///$jasper->outpage("I");  
///}


}


?>