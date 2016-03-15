<?php 
class admin_b4 extends op_controller {
    var $desa2;
	function __construct(){
		parent::__construct();
		$this->load->model("core_model","cm");
		$this->load->model("b4m","dm");
        $this->load->model("add_model","am");
		$this->load->helper("tanggal");
        $this->desa2 = $this->cm->data_desa();
	}


	function index(){
		$data['controller'] = get_class($this);
        $desa2 = $this->cm->data_desa();
		$data['header'] = "BUKU  PENDUDUK SEMENTARA   " . strtoupper($desa2->bentuk_lembaga);
		$content = $this->load->view($data['controller']."_view",$data,true);
		$this->set_title($data['header']);
		$this->set_content($content);
		$this->render();
	}
 
 
function cetak($tahun) {
     
    $data['controller'] = get_class($this);

   
    $data['record'] = $this->dm->get_data_per_tahun($tahun);
    $data['tahun'] = $tahun;
    $data['header'] = "Buku Penduduk Sementara ".$this->desa2->bentuk_lembaga;
    $data['title'] = $data['header'];
    $this->load->view($data['controller']."_print_view",$data);
   
}

function pdf($tahun){
     $data['controller'] = get_class($this);  
    $data['record'] = $this->dm->get_data_per_tahun($tahun);
    $data['tahun'] = $tahun;
    $data['header'] = "Buku Penduduk Sementara ".$this->desa2->bentuk_lembaga;
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


         $html = $this->load->view("pdf/admin_b4_pdf_view",$data,true);
         $pdf->writeHTML($html, true, false, true, false, '');



         $halaman  = $pdf->getPage();
         $pdf->startTransaction();
         $y = $pdf->getY();
      
         $html = $this->load->view("pdf/pdf_ttd",$data,true);
         $pdf->writeHTML($html, true, false, true, false, '');
       

         if($halaman <> $pdf->getPage() ) {
            $pdf->rollbackTransaction(true);

            $pdf->AddPage();
            $html = $this->load->view("pdf/admin_b4_pdf_view_table_header",$data,true);
            $pdf->writeHTML($html, true, false, true, false, '');

            $html = $this->load->view("pdf/pdf_ttd",$data,true);
            $pdf->writeHTML($html, true, false, true, false, '');

         }

         else if( $y < 20 ) {
            $pdf->rollbackTransaction(true);

            //$pdf->AddPage();
            $html = $this->load->view("pdf/admin_b4_pdf_view_table_header",$data,true);
            $pdf->writeHTML($html, true, false, true, false, '');

            $html = $this->load->view("pdf/pdf_ttd",$data,true);
            $pdf->writeHTML($html, true, false, true, false, '');

         }

         $pdf->Output($data['header']. $this->session->userdata("tahun") .'.pdf', 'I');
}
 
function excel($tahun) {

    $this->load->library('Excel');
        $this->excel->setActiveSheetIndex(0);
        $this->excel->getActiveSheet()->setTitle('penduduk sementara ');

        $this->excel->getActiveSheet()->getColumnDimension('A')->setWidth(5);
        $this->excel->getActiveSheet()->getColumnDimension('B')->setWidth(30);
        $this->excel->getActiveSheet()->getColumnDimension('C')->setWidth(30);
        $this->excel->getActiveSheet()->getColumnDimension('D')->setWidth(30);
        $this->excel->getActiveSheet()->getColumnDimension('E')->setWidth(30);
        $this->excel->getActiveSheet()->getColumnDimension('F')->setWidth(30);
        $this->excel->getActiveSheet()->getColumnDimension('G')->setWidth(30);
        $this->excel->getActiveSheet()->getColumnDimension('H')->setWidth(30);
        $this->excel->getActiveSheet()->getColumnDimension('I')->setWidth(30);
        $this->excel->getActiveSheet()->getColumnDimension('J')->setWidth(30);
        $this->excel->getActiveSheet()->getColumnDimension('K')->setWidth(30);
        $this->excel->getActiveSheet()->getColumnDimension('L')->setWidth(30);
        $this->excel->getActiveSheet()->getColumnDimension('M')->setWidth(30);
        $this->excel->getActiveSheet()->getColumnDimension('N')->setWidth(30);
        $this->excel->getActiveSheet()->getColumnDimension('O')->setWidth(30);



        $this->excel->getActiveSheet()->mergeCells('A1:O1');
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
        ->setCellValue('A' . $baris,"BUKU DATA PENDUDUK SEMENTARA ");
        $baris++;
        
        $this->excel->getActiveSheet()->mergeCells('A'.$baris.':O'.$baris);

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

 $this->excel->getActiveSheet()->mergeCells('A'.$baris.':O'.$baris);

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
        ->setCellValue('O5', "MODEL B.4 ");  






$this->excel->getActiveSheet()->mergeCells('A'.$baris.':A'.($baris+1));
$this->excel->getActiveSheet()->mergeCells('B'.$baris.':B'.($baris+1));
 
$this->excel->getActiveSheet()->mergeCells('C'.$baris.':D'.$baris);

$this->excel->getActiveSheet()->mergeCells('E'.$baris.':E'.($baris+1));
$this->excel->getActiveSheet()->mergeCells('F'.$baris.':F'.($baris+1));
$this->excel->getActiveSheet()->mergeCells('G'.$baris.':G'.($baris+1));

$this->excel->getActiveSheet()->mergeCells('H'.$baris.':I'.$baris);
$this->excel->getActiveSheet()->mergeCells('J'.$baris.':J'.($baris+1));
$this->excel->getActiveSheet()->mergeCells('K'.$baris.':K'.($baris+1));
$this->excel->getActiveSheet()->mergeCells('L'.$baris.':L'.($baris+1));
$this->excel->getActiveSheet()->mergeCells('M'.$baris.':M'.($baris+1));
$this->excel->getActiveSheet()->mergeCells('N'.$baris.':N'.($baris+1));
$this->excel->getActiveSheet()->mergeCells('O'.$baris.':O'.($baris+1));

 $this->excel->getActiveSheet()
        ->setCellValue('A' . $baris, "NO.")
        ->setCellValue('B' . $baris, "NAMA")
        ->setCellValue('C' . $baris, "JENIS KELAMIN")
        ->setCellValue('C' . ($baris+1), "LK")
        ->setCellValue('D' . ($baris+1), "PR")
        ->setCellValue('E' . $baris, "NOMOR IDENTITAS / TANDA PENGENAL ")
        ->setCellValue('F' . $baris, "TEMPAT TANGGAL LAHIR / UMUR  ")     
        ->setCellValue('G' . $baris, "PEKERJAAN")
        ->setCellValue('H' . $baris, "KEWARGANEGARAAN")

        ->setCellValue('H' . ($baris+1), "KEBANGSAAN ")
        ->setCellValue('I' . ($baris+1), "KETURUNAN")        
        ->setCellValue('J' . $baris, "DATANG DARI ")
        ->setCellValue('K' . $baris, "MAKSUD KEDATANGAN")
        ->setCellValue('L' . $baris, "NAMA DAN ALAMAT YG. DIDATANGI")
        ->setCellValue('M' . $baris, "DATANG TANGGAL")
        ->setCellValue('N' . $baris, "PERGI TANGGAL")
        ->setCellValue('O' . $baris, "KET")
         
        ;  
         
        
$arr_kolom = array('a','b','c','d','e','f','g','h','i','j','k','l','m','n','o');
$this->format(array("arr_kolom"=>$arr_kolom, "baris" => $baris, "bold"=>true, "align"=>"center"));
$baris++;
$this->format(array("arr_kolom"=>$arr_kolom, "baris" => $baris, "bold"=>true, "align"=>"center"));
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
        ->setCellValue('J' . $baris, "10")
        ->setCellValue('K' . $baris, "11")
        ->setCellValue('L' . $baris, "12")
        ->setCellValue('M' . $baris, "13")
        ->setCellValue('N' . $baris, "14")
        ->setCellValue('O' . $baris, "15")
        ;      
        
 
$this->format(array("arr_kolom"=>$arr_kolom, "baris" => $baris, "bold"=>true, "align"=>"center"));
$baris++;


$record = $this->dm->get_data_per_tahun($tahun) ;
$n=0;
 
   
foreach($record->result() as $row) : 
    $n++;
    $this->excel->getActiveSheet()
        ->setCellValue('A' . $baris, $n)
        ->setCellValue('B' . $baris, $row->nama)
        ->setCellValue('C' . $baris, ($row->jk=="L")?"LK":"")
        ->setCellValue('D' . $baris, ($row->jk=="P")?"PR":"")
        ->setCellValue('E' . $baris, $row->nik)
        ->setCellValue('F' . $baris,  $row->tmp_lahir.", ".$row->tgl_lahir.". \n".$row->umur." Tahun ")
        ->setCellValue('G' . $baris, $row->pekerjaan)
        ->setCellValue('H' . $baris, $row->kebangsaan)
        ->setCellValue('I' . $baris, $row->keturunan)
        ->setCellValue('J' . $baris, "")
        ->setCellValue('K' . $baris, $row->sementara_maksud)
        ->setCellValue('L' . $baris, $row->sementara_nama." ".$row->sementara_alamat)
        ->setCellValue('M' . $baris, flipdate($row->regdate))
        ->setCellValue('N' . $baris, "");

        
         $this->format(array("arr_kolom"=>$arr_kolom, "baris" => $baris, "bold"=>false));
        $baris++;
endforeach;

$baris+=3;
 $this->excel->getActiveSheet()         
        ->setCellValue('B' . $baris, "MENGETAHUI")
        ->setCellValue('O' . $baris, strtoupper($this->desa2->desa) .", ".date("d-m-Y"));
 $baris++;
$this->excel->getActiveSheet()         
        ->setCellValue('B' . $baris, "KEPALA ".strtoupper($this->desa2->bentuk_lembaga. " ".$this->desa2->desa) )
        ->setCellValue('O' . $baris, "SEKTERTARIS");
 $baris++;

$this->excel->getActiveSheet()         
        //->setCellValue('B' . $baris, strtoupper($this->desa2->bentuk_lembaga. " ".$this->desa2->desa) )
        ->setCellValue('O' . $baris, "");
 $baris+=3;  

$this->excel->getActiveSheet()         
        ->setCellValue('B' . $baris, $this->desa2->nama_kepala_desa )
        ->setCellValue('O' . $baris, $this->desa2->nama_sek_desa);
 $baris++;
$this->excel->getActiveSheet()
->setCellValue('o' . $baris, "NIP : " . $this->desa2->nip_sek_desa);

$baris++;
$this->excel->getActiveSheet()
->setCellValue('o' . $baris, "Pangkat  : " . $this->desa2->pangkat_sek_desa);


         $filename = "BUKU DATA PENDUDUK  SEMENTARA ".strtoupper($this->desa2->bentuk_lembaga).".xls";

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