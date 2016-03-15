<?php 
class admin_a8 extends op_controller {
    var $desa2;
	function __construct(){
		parent::__construct();
		$this->load->model("core_model","cm");
		$this->load->model("a8m","dm");
        $this->load->model("add_model","am");
		$this->load->helper("tanggal");
        $this->desa2 = $this->cm->data_desa();
	}


	function index(){
		$data['controller'] = get_class($this);
        $desa2 = $this->cm->data_desa();
		$data['header'] = "Data Ekspedisi " . $desa2->bentuk_lembaga;
		$content = $this->load->view($data['controller']."_view",$data,true);
		$this->set_title($data['header']);
		$this->set_content($content);
		$this->render();
	}

	function get_data(){
    	$page = $_REQUEST['page']; // get the requested page 
        $limit = $_REQUEST['rows']; // get how many rows we want to have into the grid 
        $sidx = isset($_REQUEST['sort'])?$_REQUEST['sort']:"tanggal"; // get index row - i.e. user click to sort 
        $sord = isset($_REQUEST['order'])?$_REQUEST['order']:"desc"; // get the direction if(!$sidx) $sidx =1;  
        $isi = isset($_REQUEST['search_isi'])?$_REQUEST['search_isi']:"x";
        $tgl_awal = !empty($_REQUEST['search_tgl_awal'])?$_REQUEST['search_tgl_awal']:"x";
        $tgl_akhir =!empty($_REQUEST['search_tgl_akhir'])?$_REQUEST['search_tgl_akhir']:"x";
       /*$nama_ibu = isset($_REQUEST['search_nama_ibu'])?$_REQUEST['search_nama_ibu']:"x";
        $nama_bapak = isset($_REQUEST['search_nama_bapak'])?$_REQUEST['search_nama_bapak']:"x";
        $jk = isset($_REQUEST['search_jk'])?$_REQUEST['search_jk']:"x";
        $id_kecamatan  = isset($_REQUEST['search_id_kecamatan'])?$_REQUEST['search_id_kecamatan']:"x";
        $id_desa =  isset($_REQUEST['search_id_desa'])?$_REQUEST['search_id_desa']:"x";
        $dusun =  isset($_REQUEST['search_dusun'])?$_REQUEST['search_dusun']:"x"; */
       
        $req_param = array (
				"sort_by" => $sidx,
				"sort_direction" => $sord,
				"limit" => null ,
                "isi"  => $isi,
                "tgl_awal" => $tgl_awal,
                "tgl_akhir" => $tgl_akhir
                /* ,
                "nama_ibu"  => $nama_ibu,
                "nama_bapak" => $nama_bapak,
                "jk"        =>$jk */
 
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

        if($count == 0 ) {
        	$responce->rows['1']['id']= "";
        }
        else {
                $x=0;
        for($i=0; $i<count($result); $i++){
        	$x++;
            //$responce->rows[$i]['id']=$result[$i]['id_provinsi'];
            // data berikut harus sesuai dengan kolom-kolom yang ingin ditampilkan di view (js)
            $responce->rows[$i]['id']			        = $result[$i]['id'] ;
            $responce->rows[$i]['tanggal']              = flipdate($result[$i]['tanggal']) ;
            $responce->rows[$i]['surat_tanggal']        = flipdate($result[$i]['surat_tanggal']) ;
            $responce->rows[$i]['surat_nomor']          = $result[$i]['surat_nomor'] ;
            $responce->rows[$i]['isi_singkat']          = $result[$i]['isi_singkat'] ;
            $responce->rows[$i]['tujuan']               = $result[$i]['tujuan'] ;           
            $responce->rows[$i]['keterangan']           = $result[$i]['keterangan'] ;

             
             
             

        } }
		//echo "<hr />";
        echo json_encode($responce); 
    }

    function save(){
        $data = $this->input->post();
        $this->load->library('form_validation');
        $this->form_validation->set_rules('tanggal','Tanggal ','required');    
        $this->form_validation->set_rules('tujuan','Tujuan ','required');            
             

        $this->form_validation->set_message('required', ' %s Harus diisi '); 
        $this->form_validation->set_message('numeric', ' %s Harus diisi dengan angka ');
        $this->form_validation->set_message('alpha', ' %s Harus diisi dengan huruf ');
        
        
        $this->form_validation->set_error_delimiters("* ", '<br>');
        if($this->form_validation->run() == TRUE) {

                   

                $data['tanggal'] = flipdate($data['tanggal']);
                $data['surat_tanggal'] = flipdate($data['surat_tanggal']);
                 

                $data['id_desa'] = $this->desa2->id_desa;

             

                
                $res = $this->db->insert("admin_a8",$data);

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



    function update() {
        $data = $this->input->post();
        $this->load->library('form_validation');
        $this->form_validation->set_rules('tanggal','Tanggal ','required');    
        $this->form_validation->set_rules('tujuan','Tujuan ','required');               

        $this->form_validation->set_message('required', ' %s Harus diisi '); 
        $this->form_validation->set_message('numeric', ' %s Harus diisi dengan angka ');
        $this->form_validation->set_message('alpha', ' %s Harus diisi dengan huruf ');
        
        
        $this->form_validation->set_error_delimiters("* ", '<br>');
        if($this->form_validation->run() == TRUE) {

               

                $data['tanggal'] = flipdate($data['tanggal']);
                $data['surat_tanggal'] = flipdate($data['surat_tanggal']);

                $data['id_desa'] = $this->desa2->id_desa;
 
                 

                $this->db->where("id",$data['id']);
                $res = $this->db->update("admin_a8",$data);

                if($res) {    
                $ret = array("success"=>true,
                            "pesan"=>"Data berhasil disimpan",
                            "operation" =>"insert");
                }
                else {
                 $ret = array("success"=>false,
                            "pesan"=>"Data gagal disimpan" .mysql_error(),
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


function hapus(){
    $data = $this->input->post();
    $ids = explode(",", $data['ids']);
    foreach($ids as $id) {
        $this->db->where("id",$id);
        $this->db->update("admin_a8",array("deleted"=>1));
    }
    echo json_encode(array("success"=>true,"pesan"=>"Berhasil dihapus"));
}

 
function cetak($tahun) {
     
    $data['controller'] = get_class($this);

   
    $data['record'] = $this->dm->get_data_per_tahun($tahun);
    $data['tahun'] = $tahun;
    $data['header'] = "Buku agenda  ".$this->desa2->bentuk_lembaga;
    $data['title'] = $data['header'];
    $this->load->view($data['controller']."_print_view",$data);
   // $this->set_title($data['header']);
    //$this->set_content($content);
    //$this->render();
}

function pdf($tahun){
    $data['controller'] = get_class($this);
    $data['record'] = $this->dm->get_data_per_tahun($tahun);
    $data['tahun'] = $tahun;
    $data['header'] = "Buku agenda  ".$this->desa2->bentuk_lembaga;
    $data['title'] = $data['header'];

        $this->load->library('Pdf');
        $pdf = new Pdf('P', 'mm', 'F4', true, 'UTF-8', false);
        $pdf->SetTitle('Test ');
      


         
        $pdf->SetMargins(10, 10, 10);
        $pdf->SetHeaderMargin(10);
        $pdf->SetFooterMargin(10);
        $pdf->setFooterFont(Array(PDF_FONT_NAME_DATA, '', PDF_FONT_SIZE_DATA));

        $pdf->SetAutoPageBreak(true,10);
        $pdf->SetAuthor('Author');
         
            
        $pdf->setPrintHeader(false);
        $pdf->setPrintFooter(true);

         // add a page
        $pdf->AddPage('P');


         // $html = $this->load->view("ringkasan_pdf_head",$data,true);
         // $pdf->writeHTML($html, true, false, true, false, '');


         $html = $this->load->view("pdf/admin_a8_pdf_view",$data,true);
         $pdf->writeHTML($html, true, false, true, false, '');



         $halaman  = $pdf->getPage();
         $pdf->startTransaction();
         $y = $pdf->getY();
      
         $html = $this->load->view("pdf/pdf_ttd",$data,true);
         $pdf->writeHTML($html, true, false, true, false, '');
       

         if($halaman <> $pdf->getPage() ) {
            $pdf->rollbackTransaction(true);

            $pdf->AddPage();
            $html = $this->load->view("pdf/admin_a8_pdf_view_table_header",$data,true);
            $pdf->writeHTML($html, true, false, true, false, '');

            $html = $this->load->view("pdf/pdf_ttd",$data,true);
            $pdf->writeHTML($html, true, false, true, false, '');

         }

         else if( $y < 20 ) {
            $pdf->rollbackTransaction(true);

            //$pdf->AddPage();
            $html = $this->load->view("pdf/admin_a8_pdf_view_table_header",$data,true);
            $pdf->writeHTML($html, true, false, true, false, '');

            $html = $this->load->view("pdf/pdf_ttd",$data,true);
            $pdf->writeHTML($html, true, false, true, false, '');

         }

         $pdf->Output($data['header']. $this->session->userdata("tahun") .'.pdf', 'I');
}
 
 
function excel($tahun) {


        $this->load->library('Excel');
        $this->excel->setActiveSheetIndex(0);
        $this->excel->getActiveSheet()->setTitle('Data ekspedisi '. $this->desa2->desa);

        $this->excel->getActiveSheet()->getColumnDimension('A')->setWidth(5);
        $this->excel->getActiveSheet()->getColumnDimension('B')->setWidth(30);
        $this->excel->getActiveSheet()->getColumnDimension('C')->setWidth(30);
        $this->excel->getActiveSheet()->getColumnDimension('D')->setWidth(30);
        $this->excel->getActiveSheet()->getColumnDimension('E')->setWidth(30);
        $this->excel->getActiveSheet()->getColumnDimension('F')->setWidth(30);
        $this->excel->getActiveSheet()->getColumnDimension('G')->setWidth(30);
        $this->excel->getActiveSheet()->getColumnDimension('h')->setWidth(30);
        $this->excel->getActiveSheet()->getColumnDimension('i')->setWidth(30);
        $this->excel->getActiveSheet()->getColumnDimension('j')->setWidth(30);

         


        $this->excel->getActiveSheet()->mergeCells('A1:F1');
        $baris=1;
        $this->excel->getActiveSheet()->getStyle('A' . $baris)->applyFromArray(
            array(
            'font' => array(
            'name'         => 'Calibri',
            'bold'         => true,
            'italic'    => false,
            'size'        => 12
            ),
            'alignment' => array(
            'horizontal' => PHPExcel_Style_Alignment::HORIZONTAL_CENTER,
            'vertical'   => PHPExcel_Style_Alignment::VERTICAL_CENTER,
            'wrap'       => true
            ) ) );
        $this->excel->getActiveSheet()
        ->setCellValue('A' . $baris,"BUKU EKSPEDISI ". strtoupper($this->desa2->bentuk_lembaga));
        $baris++;
        
        $this->excel->getActiveSheet()->mergeCells('A'.$baris.':F'.$baris);

        $this->excel->getActiveSheet()->getStyle('A' . $baris)->applyFromArray(
            array(
            'font' => array(
            'name'         => 'Calibri',
            'bold'         => true,
            'italic'    => false,
            'size'        => 12
            ),
            'alignment' => array(
            'horizontal' => PHPExcel_Style_Alignment::HORIZONTAL_CENTER,
            'vertical'   => PHPExcel_Style_Alignment::VERTICAL_CENTER,
            'wrap'       => true
            ) ) );
        $this->excel->getActiveSheet()
        ->setCellValue('A' . $baris,strtoupper($this->desa2->bentuk_lembaga." ".$this->desa2->desa));      
        $baris++;

 $this->excel->getActiveSheet()->mergeCells('A'.$baris.':F'.$baris);

        $this->excel->getActiveSheet()->getStyle('A' . $baris)->applyFromArray(
            array(
            'font' => array(
            'name'         => 'Calibri',
            'bold'         => true,
            'italic'    => false,
            'size'        => 12
            ),
            'alignment' => array(
            'horizontal' => PHPExcel_Style_Alignment::HORIZONTAL_CENTER,
            'vertical'   => PHPExcel_Style_Alignment::VERTICAL_CENTER,
            'wrap'       => true
            ) ) );
        $this->excel->getActiveSheet()
        ->setCellValue('A' . $baris, "TAHUN ". $tahun);      
        $baris++;

$baris +=3;
  $this->excel->getActiveSheet()
        ->setCellValue('F5', "MODEL A.7 ");  



 


$this->excel->getActiveSheet()
        ->setCellValue('A' . $baris, "No.")
        ->setCellValue('B' . $baris, "TANGGAL PENGIRIMAN")
        ->setCellValue('C' . $baris, "TANGGAL DAN NOMOR SURAT")
        ->setCellValue('D' . $baris, "ISI SINGKAT YANG DIKIRIM ")
        ->setCellValue('E' . $baris, "TUJUAN SURAT")
        ->setCellValue('F' . $baris, "KETERANGAN");      
        
$arr_kolom = array('a','b','c','d','e','f');
$this->format(array("arr_kolom"=>$arr_kolom, "baris" => $baris, "bold"=>true, "align"=>"center"));
//$this->format_header($arr_kolom,$baris);
$baris++;
 

$this->excel->getActiveSheet()
        ->setCellValue('A' . $baris, "1")
        ->setCellValue('B' . $baris, "2")
        ->setCellValue('C' . $baris, "3")
        ->setCellValue('D' . $baris, "4")
        ->setCellValue('E' . $baris, "5")
        ->setCellValue('F' . $baris, "6");      
        
 
$this->format(array("arr_kolom"=>$arr_kolom, "baris" => $baris, "bold"=>true, "align"=>"center"));
$baris++;


$record = $this->dm->get_data_per_tahun($tahun) ;
$n=0;
foreach($record->result() as $row) : 
    $n++;
    $this->excel->getActiveSheet()
        ->setCellValue('A' . $baris, $n)
        ->setCellValue('B' . $baris, flipdate($row->tanggal) )
        ->setCellValue('C' . $baris, flipdate($row->surat_tanggal). "  " . $row->surat_nomor )
        ->setCellValue('D' . $baris, $row->isi_singkat )
        ->setCellValue('E' . $baris, $row->tujuan )
        ->setCellValue('F' . $baris, $row->keterangan );      
        
         $this->format(array("arr_kolom"=>$arr_kolom, "baris" => $baris, "bold"=>false));
        $baris++;
endforeach;

$baris+=3;
 $this->excel->getActiveSheet()         
        ->setCellValue('B' . $baris, "MENGETAHUI")
        ->setCellValue('F' . $baris, strtoupper($this->desa2->desa).", ". date("d-m-Y"));
 $baris++;
$this->excel->getActiveSheet()         
        ->setCellValue('B' . $baris, "KEPALA ".strtoupper($this->desa2->bentuk_lembaga. " ".$this->desa2->desa) )
        ->setCellValue('F' . $baris, "SEKTERTARIS");
 $baris++;

$this->excel->getActiveSheet()         
        //->setCellValue('B' . $baris, strtoupper($this->desa2->bentuk_lembaga. " ".$this->desa2->desa) )
        ->setCellValue('F' . $baris, "");
 $baris+=3;  

$this->excel->getActiveSheet()         
        ->setCellValue('B' . $baris, $this->desa2->nama_kepala_desa )
        ->setCellValue('F' . $baris, $this->desa2->nama_sek_desa);
 $baris++;
$this->excel->getActiveSheet()
->setCellValue('f' . $baris, "NIP : " . $this->desa2->nip_sek_desa);

$baris++;
$this->excel->getActiveSheet()
->setCellValue('f' . $baris, "Pangkat  : " . $this->desa2->pangkat_sek_desa);
//$this->format(array("arr_kolom"=>$arr_kolom,"bold"=>true,"baris"=>$baris,"align"=>"center"));



        $filename = "BUKU EKSPEDISI  ".strtoupper($this->desa2->bentuk_lembaga).".xls";

    //   exit;

        header('Content-Type: application/vnd.ms-excel'); //mime type
        header('Content-Disposition: attachment;filename="'.$filename.'"'); //tell browser what's the file name
        header('Cache-Control: max-age=0'); //no cache
                     
        //save it to Excel5 format (excel 2003 .XLS file), change this to 'Excel2007' (and adjust the filename extension, also the header mime type)
        //if you want to save it as .XLSX Excel 2007 format
        $objWriter = PHPExcel_IOFactory::createWriter($this->excel, 'Excel2007');  
        //force user to download the Excel file without writing it to server's HD
        $objWriter->save('php://output');
} 

}
?>