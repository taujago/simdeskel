<?php 
class admin_b3 extends op_controller {
    var $desa2;
	function __construct(){
		parent::__construct();
		$this->load->model("core_model","cm");
		$this->load->model("b3m","dm");
        $this->load->model("add_model","am");
		$this->load->helper("tanggal");
        $this->desa2 = $this->cm->data_desa();
	}


	function index(){
		$data['controller'] = get_class($this);
        $desa2 = $this->cm->data_desa();
		$data['header'] = "BUKU DATA REKAPITULASI JUMLAH PENDUDUK  " . strtoupper($desa2->bentuk_lembaga);
		$content = $this->load->view($data['controller']."_view",$data,true);
		$this->set_title($data['header']);
		$this->set_content($content);
		$this->render();
	}
 
function cetak($tahun) {
     
    $data['controller'] = get_class($this);

    $data['datart'] = $this->dm->datart();
  
    $data['tahun'] = $tahun;
    $data['bulan'] = $this->uri->segment(4);
    $data['header'] = "Buku Rekapitulasi Jumlah  Penduduk ".$this->desa2->bentuk_lembaga;
    $data['title'] = $data['header'];
    $this->load->view($data['controller']."_print_view",$data);
   


}
 
function pdf($tahun){
    $data['controller'] = get_class($this);

    $data['datart'] = $this->dm->datart();
  
    $data['tahun'] = $tahun;
    $data['bulan'] = $this->uri->segment(4);
    $data['header'] = "Buku Rekapitulasi Jumlah  Penduduk ".$this->desa2->bentuk_lembaga;
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


         $html = $this->load->view("pdf/admin_b3_pdf_view",$data,true);
         $pdf->writeHTML($html, true, false, true, false, '');



         $halaman  = $pdf->getPage();
         $pdf->startTransaction();
         $y = $pdf->getY();
      
         $html = $this->load->view("pdf/pdf_ttd",$data,true);
         $pdf->writeHTML($html, true, false, true, false, '');
       

         if($halaman <> $pdf->getPage() ) {
            $pdf->rollbackTransaction(true);

            $pdf->AddPage();
            $html = $this->load->view("pdf/admin_b3_pdf_view_table_header",$data,true);
            $pdf->writeHTML($html, true, false, true, false, '');

            $html = $this->load->view("pdf/pdf_ttd",$data,true);
            $pdf->writeHTML($html, true, false, true, false, '');

         }

         else if( $y < 20 ) {
            $pdf->rollbackTransaction(true);

            //$pdf->AddPage();
            $html = $this->load->view("pdf/admin_b3_pdf_view_table_header",$data,true);
            $pdf->writeHTML($html, true, false, true, false, '');

            $html = $this->load->view("pdf/pdf_ttd",$data,true);
            $pdf->writeHTML($html, true, false, true, false, '');

         }

         $pdf->Output($data['header']. $this->session->userdata("tahun") .'.pdf', 'I');
}
 

function excel($tahun) {

    $record = $this->dm->datart();
    
    
    $bulan = $this->uri->segment(4);

    $this->load->library('Excel');
        $this->excel->setActiveSheetIndex(0);
        $this->excel->getActiveSheet()->setTitle('buku data rekapitlasi '. $this->desa2->desa);

        $this->excel->getActiveSheet()->getColumnDimension('A')->setWidth(5);
        $this->excel->getActiveSheet()->getColumnDimension('B')->setWidth(30);
        $this->excel->getActiveSheet()->getColumnDimension('C')->setWidth(10);
        $this->excel->getActiveSheet()->getColumnDimension('D')->setWidth(10);
        $this->excel->getActiveSheet()->getColumnDimension('E')->setWidth(10);
        $this->excel->getActiveSheet()->getColumnDimension('F')->setWidth(10);
        $this->excel->getActiveSheet()->getColumnDimension('G')->setWidth(10);
        $this->excel->getActiveSheet()->getColumnDimension('H')->setWidth(20);
        $this->excel->getActiveSheet()->getColumnDimension('I')->setWidth(20);
        $this->excel->getActiveSheet()->getColumnDimension('J')->setWidth(10);
        $this->excel->getActiveSheet()->getColumnDimension('K')->setWidth(10);
        $this->excel->getActiveSheet()->getColumnDimension('L')->setWidth(10);
        $this->excel->getActiveSheet()->getColumnDimension('M')->setWidth(10);
        $this->excel->getActiveSheet()->getColumnDimension('N')->setWidth(10);
        $this->excel->getActiveSheet()->getColumnDimension('O')->setWidth(10);
        $this->excel->getActiveSheet()->getColumnDimension('P')->setWidth(10);
        $this->excel->getActiveSheet()->getColumnDimension('Q')->setWidth(0);
        $this->excel->getActiveSheet()->getColumnDimension('R')->setWidth(10);
        $this->excel->getActiveSheet()->getColumnDimension('S')->setWidth(10);
        $this->excel->getActiveSheet()->getColumnDimension('T')->setWidth(10);
        $this->excel->getActiveSheet()->getColumnDimension('U')->setWidth(10);
        $this->excel->getActiveSheet()->getColumnDimension('V')->setWidth(10);
        $this->excel->getActiveSheet()->getColumnDimension('W')->setWidth(10);
        $this->excel->getActiveSheet()->getColumnDimension('X')->setWidth(10);
        $this->excel->getActiveSheet()->getColumnDimension('Y')->setWidth(10);
        $this->excel->getActiveSheet()->getColumnDimension('Z')->setWidth(10);
        $this->excel->getActiveSheet()->getColumnDimension('AA')->setWidth(10);
        $this->excel->getActiveSheet()->getColumnDimension('AB')->setWidth(10);
        $this->excel->getActiveSheet()->getColumnDimension('AC')->setWidth(10);
        $this->excel->getActiveSheet()->getColumnDimension('AD')->setWidth(30);
        $this->excel->getActiveSheet()->getColumnDimension('AE')->setWidth(30);
        $this->excel->getActiveSheet()->getColumnDimension('AF')->setWidth(30);
        $this->excel->getActiveSheet()->getColumnDimension('AG')->setWidth(30);
          


        $this->excel->getActiveSheet()->mergeCells('A1:AG1');
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
        ->setCellValue('A' . $baris,"BUKU DATA MUTASI PENDUDUK ". strtoupper($this->desa2->bentuk_lembaga));
        $baris++;
        
        $this->excel->getActiveSheet()->mergeCells('A'.$baris.':AG'.$baris);

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

 $this->excel->getActiveSheet()->mergeCells('A'.$baris.':AG'.$baris);

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
        ->setCellValue('AG5', "MODEL B.2 ");  






$this->excel->getActiveSheet()->mergeCells('A'.$baris.':A'.($baris+3));
$this->excel->getActiveSheet()->mergeCells('B'.$baris.':B'.($baris+3));

$this->excel->getActiveSheet()->mergeCells('C'.$baris.':I'.$baris);
$this->excel->getActiveSheet()->mergeCells('C'.($baris+1).':C'.($baris+3));
$this->excel->getActiveSheet()->mergeCells('D'.($baris+1).':E'.($baris+1));
$this->excel->getActiveSheet()->mergeCells('F'.($baris+1).':G'.($baris+1));

$this->excel->getActiveSheet()->mergeCells('D'.($baris+2).':D'.($baris+3));
$this->excel->getActiveSheet()->mergeCells('E'.($baris+2).':E'.($baris+3));
$this->excel->getActiveSheet()->mergeCells('F'.($baris+2).':F'.($baris+3));
$this->excel->getActiveSheet()->mergeCells('G'.($baris+2).':G'.($baris+3));

$this->excel->getActiveSheet()->mergeCells('J'.$baris.':Q'.$baris);
$this->excel->getActiveSheet()->mergeCells('R'.$baris.':Y'.$baris);
$this->excel->getActiveSheet()->mergeCells('Z'.$baris.':AF'.($baris+1));


//$this->excel->getActiveSheet()->mergeCells('E'.($baris+1).':E'.($baris+3));





$this->excel->getActiveSheet()->mergeCells('H'.($baris+1).':H'.($baris+3));
$this->excel->getActiveSheet()->mergeCells('I'.($baris+1).':I'.($baris+3));

$this->excel->getActiveSheet()->mergeCells('J'.($baris+1).':M'.($baris+1)); // LAHIR 
$this->excel->getActiveSheet()->mergeCells('J'.($baris+2).':K'.($baris+2)); // WNI 
$this->excel->getActiveSheet()->mergeCells('L'.($baris+2).':M'.($baris+2)); // WNA 





$this->excel->getActiveSheet()->mergeCells('N'.($baris+1).':Q'.($baris+1)); // DATANG 
$this->excel->getActiveSheet()->mergeCells('N'.($baris+2).':P'.($baris+2)); // WNI 
$this->excel->getActiveSheet()->mergeCells('P'.($baris+2).':Q'.($baris+2)); // WNA 
 

$this->excel->getActiveSheet()->mergeCells('R'.($baris+1).':U'.($baris+1)); // MATI 
$this->excel->getActiveSheet()->mergeCells('R'.($baris+2).':S'.($baris+2)); // WNI 
$this->excel->getActiveSheet()->mergeCells('T'.($baris+2).':U'.($baris+2)); // WNA 


$this->excel->getActiveSheet()->mergeCells('V'.($baris+1).':Y'.($baris+1)); // PINDAH  
$this->excel->getActiveSheet()->mergeCells('V'.($baris+2).':W'.($baris+2)); // WNI 
$this->excel->getActiveSheet()->mergeCells('X'.($baris+2).':Y'.($baris+2)); // WNA 


$this->excel->getActiveSheet()->mergeCells('Z'.($baris+2).':AA'.($baris+2)); // WNI 
$this->excel->getActiveSheet()->mergeCells('AB'.($baris+2).':AC'.($baris+2)); // WNA 


$this->excel->getActiveSheet()->mergeCells('AD'.($baris+2).':AD'.($baris+3)); // JML KK
$this->excel->getActiveSheet()->mergeCells('AE'.($baris+2).':AE'.($baris+3)); // JML ANGGOTA
$this->excel->getActiveSheet()->mergeCells('AF'.($baris+2).':AF'.($baris+3)); // JML JIWA

$this->excel->getActiveSheet()->mergeCells('AG'.($baris).':AG'.($baris+3)); // JML JIWA 




$this->excel->getActiveSheet()
        ->setCellValue('A' . $baris, "NO.")
        ->setCellValue('B' . $baris, "NAMA DUSUN / RT ")
        ->setCellValue('C' . $baris, "JUMLAH PENDUDUK AKHIR BULAN ")
        ->setCellValue('C' . ($baris+1), "JML. KK ")
        ->setCellValue('D' . ($baris+1), "WNI")
        ->setCellValue('F' . ($baris+1), "WNA")
        ->setCellValue('D' . ($baris+2), "L")
        ->setCellValue('E' . ($baris+2), "P")
        ->setCellValue('F' . ($baris+2), "L")
        ->setCellValue('G' . ($baris+2), "P")

        ->setCellValue('H' . ($baris+1), "JML. ANGGOTA KELUARGA")
        ->setCellValue('I' . ($baris+1), "JML. JIWA")

        ->setCellValue('J' . $baris, "TAMBAHAN BULAN INI")
        ->setCellValue('J' . ($baris+1), "LAHIR")
        ->setCellValue('N' . ($baris+1), "DATANG")

        ->setCellValue('J' . ($baris+2), "WNI")
        ->setCellValue('L' . ($baris+2), "WNA")

        ->setCellValue('N' . ($baris+2), "WNI")
        ->setCellValue('P' . ($baris+2), "WNA")

        ->setCellValue('J' . ($baris+3), "L")
        ->setCellValue('K' . ($baris+3), "P")

        ->setCellValue('L' . ($baris+3), "L")
        ->setCellValue('M' . ($baris+3), "P")

        ->setCellValue('N' . ($baris+3), "L")
        ->setCellValue('O' . ($baris+3), "P")

        ->setCellValue('P' . ($baris+3), "L")
        ->setCellValue('Q' . ($baris+3), "P")


        ->setCellValue('R' . $baris, "PENGURANGAN BULAN INI")
        ->setCellValue('R' . ($baris+1), "MATI")
        ->setCellValue('V' . ($baris+1), "PINDAH")

        ->setCellValue('R' . ($baris+2), "WNI")
        ->setCellValue('T' . ($baris+2), "WNA")

        ->setCellValue('U' . ($baris+2), "WNI")
        ->setCellValue('W' . ($baris+2), "WNA")

        ->setCellValue('R' . ($baris+3), "L")
        ->setCellValue('S' . ($baris+3), "P")

        ->setCellValue('T' . ($baris+3), "L")
        ->setCellValue('U' . ($baris+3), "P")

        ->setCellValue('V' . ($baris+3), "L")
        ->setCellValue('W' . ($baris+3), "P")

        ->setCellValue('X' . ($baris+3), "L")
        ->setCellValue('Y' . ($baris+3), "P")

         ->setCellValue('Z' . $baris, "JUMLAH PENDUDUK AKHIR BULAN ")

        ->setCellValue('Z' . ($baris+2), "WNI") 
        ->setCellValue('AB' . ($baris+2), "WNA") 

        ->setCellValue('Z' . ($baris+3), "L")
        ->setCellValue('AA' . ($baris+3), "P")

        ->setCellValue('AB' . ($baris+3), "L")
        ->setCellValue('AC' . ($baris+3), "P")

        ->setCellValue('AD' . ($baris+2), "JML KK")
        ->setCellValue('AE' . ($baris+2), "JML ANGGOTA KELUARGA")
        ->setCellValue('AF' . ($baris+2), "JML JIWA")
        ->setCellValue('AG' . $baris, "KETERANGAN")
        
        ;  
         
        
$arr_kolom = array('a','b','c','d','e','f','g','h','i','j','k','l','m','n','o','p','q','r','s','t','u','v','w','x','y',
    'z','aa','ab','ac','ad','ae','af','ag');
$this->format(array("arr_kolom"=>$arr_kolom, "baris" => $baris, "bold"=>true, "align"=>"center"));
$baris++;
$this->format(array("arr_kolom"=>$arr_kolom, "baris" => $baris, "bold"=>true, "align"=>"center"));
$baris++;
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

        ->setCellValue('P' . $baris, "16")
        ->setCellValue('Q' . $baris, "17")
        ->setCellValue('R' . $baris, "18")
        ->setCellValue('S' . $baris, "19")
        ->setCellValue('T' . $baris, "20")
        ->setCellValue('U' . $baris, "21")
        ->setCellValue('V' . $baris, "22")        
        ->setCellValue('W' . $baris, "23")
        ->setCellValue('X' . $baris, "24")
        ->setCellValue('Y' . $baris, "25")
        ->setCellValue('Z' . $baris, "26")
        ->setCellValue('AA' . $baris, "27")
        ->setCellValue('AB' . $baris, "28")
        ->setCellValue('AC' . $baris, "29")
        ->setCellValue('AD' . $baris, "30")
        ->setCellValue('AE' . $baris, "31")
        ->setCellValue('AF' . $baris, "32")
        ->setCellValue('AG' . $baris, "33")
        ;      
        
 
$this->format(array("arr_kolom"=>$arr_kolom, "baris" => $baris, "bold"=>true, "align"=>"center"));
$baris++;

    // $data['datart'] = $this->dm->datart();
    // //$data['record'] = $this->dm->get_data_per_tahun($tahun);
    // $data['tahun'] = $tahun;
    // $data['bulan'] = $this->uri->segment(4);
 $record = $this->dm->datart();
$n=0;
 
   
foreach($record->result() as $row) : 

    $ab_kk =      $this->dm->jumlah_kk_per_rt($row->rt,$tahun,$bulan);
    $ab_wni_l = $this->dm->jumlah_akhir_bulan($tahun,$bulan,$row->rt,"WNI","L");
    $ab_wni_p = $this->dm->jumlah_akhir_bulan($tahun,$bulan,$row->rt,"WNI","P")  ;
    $ab_wna_l = $this->dm->jumlah_akhir_bulan($tahun,$bulan,$row->rt,"WNA","L");
    $ab_wna_p =  $this->dm->jumlah_akhir_bulan($tahun,$bulan,$row->rt,"WNA","P");
    $ab_jak =   $ab_wni_l + $ab_wni_p + $ab_wna_l + $ab_wna_p;
    $jumlah_jiwa = $ab_jak + $ab_kk;

     $lahir_wni_l = $this->dm->jml_kelahiran($tahun,$bulan,$row->rt,"WNI","L");
     $lahir_wni_p = $this->dm->jml_kelahiran($tahun,$bulan,$row->rt,"WNI","P");
     $lahir_wna_l = $this->dm->jml_kelahiran($tahun,$bulan,$row->rt,"WNA","L");
     $lahir_wna_p = $this->dm->jml_kelahiran($tahun,$bulan,$row->rt,"WNA","P");

     $datang_wni_l = $this->dm->jml_kedatangan($tahun,$bulan,$row->rt,"WNI","L");
     $datang_wni_p = $this->dm->jml_kedatangan($tahun,$bulan,$row->rt,"WNI","P");
     $datang_wna_l = $this->dm->jml_kedatangan($tahun,$bulan,$row->rt,"WNA","L");
     $datang_wna_p = $this->dm->jml_kedatangan($tahun,$bulan,$row->rt,"WNA","P");

     $mati_wni_l = $this->dm->jml_kematian($tahun,$bulan,$row->rt,"WNI","L");
     $mati_wni_p = $this->dm->jml_kematian($tahun,$bulan,$row->rt,"WNI","P");
     $mati_wna_l = $this->dm->jml_kematian($tahun,$bulan,$row->rt,"WNA","L");
     $mati_wna_p = $this->dm->jml_kematian($tahun,$bulan,$row->rt,"WNA","P");

     $pindah_wni_l = $this->dm->jml_pindah($tahun,$bulan,$row->rt,"WNI","L");
     $pindah_wni_p = $this->dm->jml_pindah($tahun,$bulan,$row->rt,"WNI","P");
     $pindah_wna_l = $this->dm->jml_pindah($tahun,$bulan,$row->rt,"WNA","L");
     $pindah_wna_p = $this->dm->jml_pindah($tahun,$bulan,$row->rt,"WNA","P");


     $jumlah_wni_l = $this->dm->jml_penduduk($tahun,$bulan,$row->rt,"WNI","L");
     $jumlah_wni_p = $this->dm->jml_penduduk($tahun,$bulan,$row->rt,"WNI","P");
     $jumlah_wna_l = $this->dm->jml_penduduk($tahun,$bulan,$row->rt,"WNA","L");
     $jumlah_wna_p = $this->dm->jml_penduduk($tahun,$bulan,$row->rt,"WNA","P");

     $jumlah_kk = $this->dm->jml_kk($tahun,$bulan,$row->rt);

     $jumlah_warga = $jumlah_wni_l +
                    $jumlah_wni_p +
                    $jumlah_wna_l +
                    $jumlah_wna_p ;



    $n++;
    $this->excel->getActiveSheet()
        ->setCellValue('A' . $baris, $n)
        ->setCellValue('B' . $baris, $row->rt )
        ->setCellValue('C' . $baris,$ab_kk  )
        ->setCellValue('D' . $baris,$ab_wni_l  )
        ->setCellValue('E' . $baris,$ab_wni_p  )
        ->setCellValue('F' . $baris,$ab_wna_l  )
        ->setCellValue('G' . $baris,$ab_wna_p  )
        ->setCellValue('H' . $baris,$ab_jak  )
        ->setCellValue('I' . $baris,$jumlah_jiwa  )
        ->setCellValue('J' . $baris,$lahir_wni_l  )
        ->setCellValue('K' . $baris,$lahir_wni_p  )
        ->setCellValue('L' . $baris,$lahir_wna_l  )
        ->setCellValue('M' . $baris,$lahir_wna_p  )
        ->setCellValue('N' . $baris,$datang_wni_l  )
        ->setCellValue('O' . $baris,$datang_wni_p  )
        ->setCellValue('P' . $baris,$datang_wna_l  )
        ->setCellValue('Q' . $baris,$datang_wna_p  )
        ->setCellValue('R' . $baris,$mati_wni_l  )
        ->setCellValue('S' . $baris,$mati_wni_p  )
        ->setCellValue('T' . $baris,$mati_wna_l  )
        ->setCellValue('U' . $baris,$mati_wna_p  )
        ->setCellValue('V' . $baris,$pindah_wni_l  )
        ->setCellValue('W' . $baris,$pindah_wni_p  )
        ->setCellValue('X' . $baris,$pindah_wna_l  )
        ->setCellValue('Y' . $baris,$pindah_wna_p  )
        ->setCellValue('Z' . $baris,$jumlah_wni_l  )
        ->setCellValue('AA' . $baris, $jumlah_wni_p )
        ->setCellValue('AB' . $baris, $jumlah_wna_l )
        ->setCellValue('AC' . $baris, $jumlah_wna_p )
        ->setCellValue('AD' . $baris, $jumlah_kk )
        ->setCellValue('AE' . $baris, $jumlah_warga )
        ->setCellValue('AF' . $baris, ($jumlah_kk + $jumlah_warga) )
        ->setCellValue('AG' . $baris, "" )
        ;

        
         $this->format(array("arr_kolom"=>$arr_kolom, "baris" => $baris, "bold"=>false));
        $baris++;
endforeach;

$baris+=3;
 $this->excel->getActiveSheet()         
        ->setCellValue('B' . $baris, "MENGETAHUI")
        ->setCellValue('AD' . $baris, date("d-m-Y"));
$this->format_center(array("b","AD"),$baris);
$baris++;
$this->excel->getActiveSheet()         
        ->setCellValue('B' . $baris, "KEPALA ".strtoupper($this->desa2->bentuk_lembaga. " ".$this->desa2->desa) )
        ->setCellValue('AD' . $baris, "SEKTERTARIS");
$this->format_center(array("b","AD"),$baris);
$baris++;

$this->excel->getActiveSheet()         
        ->setCellValue('B' . $baris, strtoupper($this->desa2->bentuk_lembaga. " ".$this->desa2->desa) )
        ->setCellValue('AD' . $baris, "");
$this->format_center(array("b","AD"),$baris);
$baris+=3;  

$this->excel->getActiveSheet()         
        ->setCellValue('B' . $baris, $this->desa2->nama_kepala_desa )
        ->setCellValue('AD' . $baris, $this->desa2->nama_sek_desa);
$this->format_center(array("b","AD"),$baris);
$baris++;



         $filename = "BUKU DATA REKAPITUASI JUMLAH PENDUDUK  ".strtoupper($this->desa2->bentuk_lembaga).".xls";

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