<?php 
class admin_a7 extends op_controller {
    var $desa2;
	function __construct(){
		parent::__construct();
		$this->load->model("core_model","cm");
		$this->load->model("a7m","dm");
        $this->load->model("add_model","am");
		$this->load->helper("tanggal");
        $this->desa2 = $this->cm->data_desa();
	}


	function index(){
		$data['controller'] = get_class($this);
        $desa2 = $this->cm->data_desa();
		$data['header'] = "Data Buku Agenda " . $desa2->bentuk_lembaga;
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
		$jenis_surat = isset($_REQUEST['search_jenis_surat'])?$_REQUEST['search_jenis_surat']:"x";
		
        
       
        $req_param = array (
				"sort_by" => $sidx,
				"sort_direction" => $sord,
				"limit" => null ,
                "isi"  => $isi,
                "tgl_awal" => $tgl_awal,
                "tgl_akhir" => $tgl_akhir,
				"jenis_surat" => $jenis_surat
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
            $responce->rows[$i]['jenis_surat']          = $result[$i]['jenis_surat'] ;
            $responce->rows[$i]['tanggal']              = flipdate($result[$i]['tanggal']) ;
            $responce->rows[$i]['masuk_nomor']          = $result[$i]['masuk_nomor'] ;
            $responce->rows[$i]['masuk_tanggal']        = flipdate($result[$i]['masuk_tanggal']) ;
            $responce->rows[$i]['masuk_pengirim']       = $result[$i]['masuk_pengirim'] ;
            $responce->rows[$i]['masuk_isi_singkat']    = $result[$i]['masuk_isi_singkat'] ;
            $responce->rows[$i]['keluar_isi_singkat']   = $result[$i]['keluar_isi_singkat'] ;
            $responce->rows[$i]['keluar_tanggal']       = flipdate($result[$i]['keluar_tanggal']) ;
            $responce->rows[$i]['keluar_nomor']         = $result[$i]['keluar_nomor'] ;
            $responce->rows[$i]['keluar_tujuan']        = $result[$i]['keluar_tujuan']  ;
            $responce->rows[$i]['keterangan']           = $result[$i]['keterangan'] ;

             
             
             

        } }
		//echo "<hr />";
        echo json_encode($responce); 
    }

    function save(){
        $data = $this->input->post();
        $this->load->library('form_validation');
         $this->form_validation->set_rules('tanggal','Tanggal ','required');              
             

        $this->form_validation->set_message('required', ' %s Harus diisi '); 
        $this->form_validation->set_message('numeric', ' %s Harus diisi dengan angka ');
        $this->form_validation->set_message('alpha', ' %s Harus diisi dengan huruf ');
        
        
        $this->form_validation->set_error_delimiters("* ", '<br>');
        if($this->form_validation->run() == TRUE) {

                   

                $data['tanggal'] = flipdate($data['tanggal']);
                $data['keluar_tanggal'] = flipdate($data['keluar_tanggal']);
                $data['masuk_tanggal'] = flipdate($data['masuk_tanggal']);

                $data['id_desa'] = $this->desa2->id_desa;

                if($data['jenis_surat'] == "masuk") {
                   $data['keluar_tanggal'] = null;
                   $data['keluar_tujuan'] = null;
                   $data['keluar_nomor'] = null;
                   $data['keluar_isi_singkat'] = null;
                }
                else {
                    $data['masuk_tanggal'] = null;
                    $data['masuk_pengirim'] = null;
                    $data['masuk_nomor'] = null;
                    $data['masuk_isi_singkat'] = null;
                }

                
                $res = $this->db->insert("admin_a7",$data);

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

        $this->form_validation->set_message('required', ' %s Harus diisi '); 
        $this->form_validation->set_message('numeric', ' %s Harus diisi dengan angka ');
        $this->form_validation->set_message('alpha', ' %s Harus diisi dengan huruf ');
        
        
        $this->form_validation->set_error_delimiters("* ", '<br>');
        if($this->form_validation->run() == TRUE) {

               

                $data['tanggal'] = flipdate($data['tanggal']);
                $data['keluar_tanggal'] = flipdate($data['keluar_tanggal']);
                $data['masuk_tanggal'] = flipdate($data['masuk_tanggal']);

                $data['id_desa'] = $this->desa2->id_desa;

                if($data['jenis_surat'] == "masuk") {
                   $data['keluar_tanggal'] = null;
                   $data['keluar_tujuan'] = null;
                   $data['keluar_nomor'] = null;
                   $data['keluar_isi_singkat'] = null;
                }
                else {
                    $data['masuk_tanggal'] = null;
                    $data['masuk_pengirim'] = null;
                    $data['masuk_nomor'] = null;
                    $data['masuk_isi_singkat'] = null;
                }
                 

                $this->db->where("id",$data['id']);
                $res = $this->db->update("admin_a7",$data);

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
        $this->db->update("admin_a7",array("deleted"=>1));
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
        $pdf = new Pdf('L', 'mm', 'F4', true, 'UTF-8', false);
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
        $pdf->AddPage('L');


         // $html = $this->load->view("ringkasan_pdf_head",$data,true);
         // $pdf->writeHTML($html, true, false, true, false, '');


         $html = $this->load->view("pdf/admin_a7_pdf_view",$data,true);
         $pdf->writeHTML($html, true, false, true, false, '');



         $halaman  = $pdf->getPage();
         $pdf->startTransaction();
         $y = $pdf->getY();
      
         $html = $this->load->view("pdf/pdf_ttd",$data,true);
         $pdf->writeHTML($html, true, false, true, false, '');
       

         if($halaman <> $pdf->getPage() ) {
            $pdf->rollbackTransaction(true);

            $pdf->AddPage();
            $html = $this->load->view("pdf/admin_a7_pdf_view_table_header",$data,true);
            $pdf->writeHTML($html, true, false, true, false, '');

            $html = $this->load->view("pdf/pdf_ttd",$data,true);
            $pdf->writeHTML($html, true, false, true, false, '');

         }

         else if( $y < 20 ) {
            $pdf->rollbackTransaction(true);

            //$pdf->AddPage();
            $html = $this->load->view("pdf/admin_a7_pdf_view_table_header",$data,true);
            $pdf->writeHTML($html, true, false, true, false, '');

            $html = $this->load->view("pdf/pdf_ttd",$data,true);
            $pdf->writeHTML($html, true, false, true, false, '');

         }

         $pdf->Output($data['header']. $this->session->userdata("tahun") .'.pdf', 'I');
}
 


function excel($tahun) {


        $this->load->library('Excel');
        $this->excel->setActiveSheetIndex(0);
        $this->excel->getActiveSheet()->setTitle('Data peraturan '. $this->desa2->desa);

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

         


        $this->excel->getActiveSheet()->mergeCells('A1:j1');
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
        ->setCellValue('A' . $baris,"BUKU AGENDA ". strtoupper($this->desa2->bentuk_lembaga));
        $baris++;
        
        $this->excel->getActiveSheet()->mergeCells('A'.$baris.':J'.$baris);

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

 $this->excel->getActiveSheet()->mergeCells('A'.$baris.':J'.$baris);

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
        ->setCellValue('J5', "MODEL A.7 ");  



$this->excel->getActiveSheet()->mergeCells('A'.$baris.':A'.($baris+2));
$this->excel->getActiveSheet()->mergeCells('B'.$baris.':B'.($baris+2));

 $this->excel->getActiveSheet()->mergeCells('C'.$baris.':F'.$baris);
 $this->excel->getActiveSheet()->mergeCells('G'.$baris.':I'.$baris);
 $this->excel->getActiveSheet()->mergeCells('j'.$baris.':j'.($baris+2));
 

$this->excel->getActiveSheet()->mergeCells('C'.($baris+1).':d'.($baris+1));
$this->excel->getActiveSheet()->mergeCells('e'.($baris+1).':e'.($baris+2));
$this->excel->getActiveSheet()->mergeCells('f'.($baris+1).':f'.($baris+2));

$this->excel->getActiveSheet()->mergeCells('g'.($baris+1).':g'.($baris+2));
$this->excel->getActiveSheet()->mergeCells('h'.($baris+1).':h'.($baris+2));
$this->excel->getActiveSheet()->mergeCells('i'.($baris+1).':i'.($baris+2));


$this->excel->getActiveSheet()
        ->setCellValue('A' . $baris, "No.")
        ->setCellValue('B' . $baris, "TANGGAL")
        ->setCellValue('C' . $baris, "SURAT MASUK ")
        ->setCellValue('G' . $baris, "SURAT KELUAR ")
		
        ->setCellValue('C' . ($baris+1), "SURAT")
		->setCellValue('E' . ($baris+1), "PENGIRIM")
		->setCellValue('F' . ($baris+1), "ISI SINGKAT")
		
		->setCellValue('C' . ($baris+2), "NOMOR")
		->setCellValue('D' . ($baris+2), "TANGGAL")
		
        ->setCellValue('G' . ($baris+1), "ISI SINGKAT")
		->setCellValue('H' . ($baris+1), "TANGGAL / NOMOR PENGIRIMAN")
		->setCellValue('I' . ($baris+1), "TUJUAN")
		 ->setCellValue('J' . $baris, "KETERANGAN");      
        
$arr_kolom = array('a','b','c','d','e','f','g','h','i','j');
$this->format(array("arr_kolom"=>$arr_kolom, "baris" => $baris, "bold"=>true, "align"=>"center"));
//$this->format_header($arr_kolom,$baris);
$baris++;
$this->format(array("arr_kolom"=>$arr_kolom, "baris" => $baris, "bold"=>true, "align"=>"center"));
//$this->format_header($arr_kolom,$baris);
$baris++;
$this->format(array("arr_kolom"=>$arr_kolom, "baris" => $baris, "bold"=>true, "align"=>"center"));
//$this->format_header($arr_kolom,$baris);
$baris++;

$this->excel->getActiveSheet()
        ->setCellValue('A' . $baris, "1")
        ->setCellValue('B' . $baris, "2")
        ->setCellValue('C' . $baris, "3")
        ->setCellValue('D' . $baris, "4")
        ->setCellValue('E' . $baris, "5")
        ->setCellValue('F' . $baris, "6")
		->setCellValue('G' . $baris, "7")
		->setCellValue('H' . $baris, "8")
		->setCellValue('I' . $baris, "9")
		->setCellValue('J' . $baris, "10");      
        
 
$this->format(array("arr_kolom"=>$arr_kolom, "baris" => $baris, "bold"=>true, "align"=>"center"));
$baris++;


$record = $this->dm->get_data_per_tahun($tahun) ;
$n=0;
foreach($record->result() as $row) : 
    $n++;
    $this->excel->getActiveSheet()
        ->setCellValue('A' . $baris, $n)
        ->setCellValue('B' . $baris, flipdate($row->tanggal))
        ->setCellValue('C' . $baris, $row->masuk_nomor)
        ->setCellValue('D' . $baris, flipdate($row->masuk_tanggal))
        ->setCellValue('E' . $baris, $row->masuk_pengirim)
        ->setCellValue('F' . $baris, $row->masuk_isi_singkat)
		->setCellValue('G' . $baris, $row->keluar_isi_singkat)
        ->setCellValue('H' . $baris, flipdate($row->keluar_tanggal). " " . $row->keluar_nomor)
        ->setCellValue('I' . $baris, $row->keluar_tujuan)
        ->setCellValue('J' . $baris, $row->keterangan)

        ;      
        
         $this->format(array("arr_kolom"=>$arr_kolom, "baris" => $baris, "bold"=>false));
        $baris++;
endforeach;

$baris+=3;
 $this->excel->getActiveSheet()         
        ->setCellValue('B' . $baris, "MENGETAHUI")
        ->setCellValue('I' . $baris, strtoupper($this->desa2->desa).", ".date("d-m-Y"));
 $baris++;
$this->excel->getActiveSheet()         
        ->setCellValue('B' . $baris, "KEPALA ".strtoupper($this->desa2->bentuk_lembaga. " ".$this->desa2->desa) )
        ->setCellValue('I' . $baris, "SEKTERTARIS");
 $baris++;

$this->excel->getActiveSheet()         
        //->setCellValue('B' . $baris, strtoupper($this->desa2->bentuk_lembaga. " ".$this->desa2->desa) )
        ->setCellValue('I' . $baris, "");
 $baris+=3;  

$this->excel->getActiveSheet()         
        ->setCellValue('B' . $baris, $this->desa2->nama_kepala_desa )
        ->setCellValue('I' . $baris, $this->desa2->nama_sek_desa);
 $baris++;

 
$this->excel->getActiveSheet()
->setCellValue('i' . $baris, "NIP : " . $this->desa2->nip_sek_desa);

$baris++;
$this->excel->getActiveSheet()
->setCellValue('i' . $baris, "Pangkat  : " . $this->desa2->pangkat_sek_desa);
//$this->format(array("arr_kolom"=>$arr_kolom,"bold"=>true,"baris"=>$baris,"align"=>"center"));



        $filename = "BUKU AGENDA ".strtoupper($this->desa2->bentuk_lembaga).".xls";

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