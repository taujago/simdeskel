<?php 
class admin_a3 extends op_controller {
    var $desa2;
	function __construct(){
		parent::__construct();
		$this->load->model("core_model","cm");
		$this->load->model("a3m","dm");
        $this->load->model("add_model","am");
		$this->load->helper("tanggal");
        $this->desa2 = $this->cm->data_desa();
	}

 
	function index(){
		$data['controller'] = get_class($this);
        $desa2 = $this->cm->data_desa();
		$data['header'] = "Data Inventaris   " . $desa2->bentuk_lembaga;
		$content = $this->load->view($data['controller']."_view",$data,true);
		$this->set_title($data['header']);
		$this->set_content($content);
		$this->render();
	}

	function get_data(){
    	$page = $_REQUEST['page']; // get the requested page 
        $limit = $_REQUEST['rows']; // get how many rows we want to have into the grid 
        $sidx = isset($_REQUEST['sort'])?$_REQUEST['sort']:"id"; // get index row - i.e. user click to sort 
        $sord = isset($_REQUEST['order'])?$_REQUEST['order']:"desc"; // get the direction if(!$sidx) $sidx =1;  
        $jenis = isset($_REQUEST['search_jenis'])?$_REQUEST['search_jenis']:"x";
        
       /*$nama_ibu = isset($_REQUEST['search_nama_ibu'])?$_REQUEST['search_nama_ibu']:"x";
        $nama_bapak = isset($_REQUEST['search_nama_bapak'])?$_REQUEST['search_nama_bapak']:"x";
        $jk = isset($_REQUEST['search_jk'])?$_REQUEST['search_jk']:"x";
        $id_kecamatan  = isset($_REQUEST['search_id_kecamatan'])?$_REQUEST['search_id_kecamatan']:"x";
        $id_desa =  isset($_REQUEST['search_id_desa'])?$_REQUEST['search_id_desa']:"x";
        $dusun =  isset($_REQUEST['search_dusun'])?$_REQUEST['search_dusun']:"x"; */
       
        $req_param = array (
				"sort_by" => $sidx,
				"sort_direction" => $sord,
				"limit" => null  ,
                "jenis"  => $jenis/*,
                "tgl_awal" => $tgl_awal,
                "tgl_akhir" => $tgl_akhir
                ,
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
            $responce->rows[$i]['jenis_inventaris']     = $result[$i]['jenis_inventaris'] ;             
            $responce->rows[$i]['asal_sendiri']           = $result[$i]['asal_sendiri'] ;
            $responce->rows[$i]['asal_pemerintah']           = $result[$i]['asal_pemerintah'] ;
            $responce->rows[$i]['asal_sumbangan']           = $result[$i]['asal_sumbangan'] ;
 
            $responce->rows[$i]['awal_tahun_baik']           = $result[$i]['awal_tahun_baik'] ;
            $responce->rows[$i]['awal_tahun_rusak']           =  $result[$i]['awal_tahun_rusak'] ;
			
            $responce->rows[$i]['hapus_rusak']           =  $result[$i]['hapus_rusak'] ;
            $responce->rows[$i]['hapus_jual']           =  $result[$i]['hapus_jual'] ;
            $responce->rows[$i]['hapus_sumbang']           =  $result[$i]['hapus_sumbang'] ;
            $responce->rows[$i]['hapus_tanggal']           =  flipdate($result[$i]['hapus_tanggal'] );
            $responce->rows[$i]['akhir_tahun_baik']           =  $result[$i]['akhir_tahun_baik'] ;
            $responce->rows[$i]['akhir_tahun_rusak']           =  $result[$i]['akhir_tahun_rusak'] ;
            
            $responce->rows[$i]['keterangan']           = $result[$i]['keterangan'] ;

             
             
             

        } }
		//echo "<hr />";
        echo json_encode($responce); 
    }

    function save(){
        $data = $this->input->post();
        $this->load->library('form_validation');
        $this->form_validation->set_rules('jenis_inventaris','Nomor ','required');    
        $this->form_validation->set_rules('asal_sendiri','Jumlah Beli Sendiri ','numeric');        
		$this->form_validation->set_rules('asal_pemerintah','Jumlah dari Pemerintah ','numeric');        
		$this->form_validation->set_rules('asal_sumbangan','Jumlah Sumbangan ','numeric');  
		$this->form_validation->set_rules('awal_tahun_baik','Keadaan baik awal tahun  ','numeric');  
		$this->form_validation->set_rules('awal_tahun_rusak','Keadaan rusak awal tahun  ','numeric');
		$this->form_validation->set_rules('hapus_rusak','Penghapusan rusak ','numeric');
		$this->form_validation->set_rules('hapus_jual','Penghapusan dijual ','numeric');
		$this->form_validation->set_rules('hapus_sumbang','Penghapusan disumbangkan ','numeric');
		
		$this->form_validation->set_rules('akhir_tahun_baik','Keadaan baik akhir tahun  ','numeric');  
		$this->form_validation->set_rules('akhir_tahun_rusak','Keadaan rusak akhir tahun  ','numeric');
       

        $this->form_validation->set_message('required', ' %s Harus diisi '); 
        $this->form_validation->set_message('numeric', ' %s Harus diisi dengan angka ');
        $this->form_validation->set_message('alpha', ' %s Harus diisi dengan huruf ');
        
        
        $this->form_validation->set_error_delimiters("* ", '<br>');
        if($this->form_validation->run() == TRUE) {

                $data['id'] = md5(date("Ymdhis"));       

                $data['hapus_tanggal'] = flipdate($data['hapus_tanggal']);
                
                $data['id_desa'] = $this->desa2->id_desa;
                $res = $this->db->insert("admin_a3",$data);

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
        $this->load->library('form_validation');
        $this->form_validation->set_rules('jenis_inventaris','Nomor ','required');    
        $this->form_validation->set_rules('asal_sendiri','Jumlah Beli Sendiri ','numeric');        
		$this->form_validation->set_rules('asal_pemerintah','Jumlah dari Pemerintah ','numeric');        
		$this->form_validation->set_rules('asal_sumbangan','Jumlah Sumbangan ','numeric');  
		$this->form_validation->set_rules('awal_tahun_baik','Keadaan baik awal tahun  ','numeric');  
		$this->form_validation->set_rules('awal_tahun_rusak','Keadaan rusak awal tahun  ','numeric');
		$this->form_validation->set_rules('hapus_rusak','Penghapusan rusak ','numeric');
		$this->form_validation->set_rules('hapus_jual','Penghapusan dijual ','numeric');
		$this->form_validation->set_rules('hapus_sumbang','Penghapusan disumbangkan ','numeric');
		
		$this->form_validation->set_rules('akhir_tahun_baik','Keadaan baik akhir tahun  ','numeric');  
		$this->form_validation->set_rules('akhir_tahun_rusak','Keadaan rusak akhir tahun  ','numeric');

        $this->form_validation->set_message('required', ' %s Harus diisi '); 
        $this->form_validation->set_message('numeric', ' %s Harus diisi dengan angka ');
        $this->form_validation->set_message('alpha', ' %s Harus diisi dengan huruf ');
        
        
        $this->form_validation->set_error_delimiters("* ", '<br>');
        if($this->form_validation->run() == TRUE) {

               

                $data['hapus_tanggal'] = flipdate($data['hapus_tanggal']);
             
                 

                $this->db->where("id",$data['id']);
                $res = $this->db->update("admin_a3",$data);

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
        $this->db->update("admin_a3",array("deleted"=>1));
    }
    echo json_encode(array("success"=>true,"pesan"=>"Berhasil dihapus"));
}

 
function cetak($tahun) {
     
    $data['controller'] = get_class($this);

   
    $data['record'] = $this->dm->get_data_per_tahun($tahun);
    $data['tahun'] = $tahun;
    $data['header'] = "Buku Inventaris  ".$this->desa2->bentuk_lembaga;
    $data['title'] = $data['header'];
    $this->load->view($data['controller']."_print_view",$data);
   // $this->set_title($data['header']);
    //$this->set_content($content);
    //$this->render();
}
 



function pdf($tahun){
    $data['controller'] = get_class($this);

  // echo "  \n";
    $data['record'] = $this->dm->get_data_per_tahun($tahun);
    $data['tahun'] = $tahun;
    $data['header'] = "Buku Inventaris  ".$this->desa2->bentuk_lembaga;
    $data['title'] = $data['header'];

        $this->load->library('Pdf');
        $pdf = new Pdf('L', 'mm', 'F4', true, 'UTF-8', false);
        $pdf->SetTitle('Test ');
        //$pdf->SetHeaderMargin(30);
        //$pdf->SetTopMargin(10);

 


         
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


         $html = $this->load->view("pdf/admin_a3_pdf_view",$data,true);
         $pdf->writeHTML($html, true, false, true, false, '');



         $halaman  = $pdf->getPage();
         $pdf->startTransaction();
         $y = $pdf->getY();
      
         $html = $this->load->view("pdf_ttd",$data,true);
         $pdf->writeHTML($html, true, false, true, false, '');
       

         if($halaman <> $pdf->getPage() ) {
            $pdf->rollbackTransaction(true);

            $pdf->AddPage();
            $html = $this->load->view("pdf/admin_a3_pdf_view_table_header",$data,true);
            $pdf->writeHTML($html, true, false, true, false, '');

            $html = $this->load->view("pdf_ttd",$data,true);
            $pdf->writeHTML($html, true, false, true, false, '');

         }

         else if( $y < 20 ) {
            $pdf->rollbackTransaction(true);

            //$pdf->AddPage();
            $html = $this->load->view("pdf/admin_a3_pdf_view_table_header",$data,true);
            $pdf->writeHTML($html, true, false, true, false, '');

            $html = $this->load->view("pdf_ttd",$data,true);
            $pdf->writeHTML($html, true, false, true, false, '');

         }

         $pdf->Output($data['header']. $this->session->userdata("tahun") .'.pdf', 'I');
}
function excel($tahun) {


        $this->load->library('Excel');
        $this->excel->setActiveSheetIndex(0);
        $this->excel->getActiveSheet()->setTitle('Buku Inventaris '. $this->desa2->desa);

        $this->excel->getActiveSheet()->getColumnDimension('A')->setWidth(5);
        $this->excel->getActiveSheet()->getColumnDimension('B')->setWidth(30);
        $this->excel->getActiveSheet()->getColumnDimension('C')->setWidth(30);
        $this->excel->getActiveSheet()->getColumnDimension('D')->setWidth(10);
        $this->excel->getActiveSheet()->getColumnDimension('E')->setWidth(10);
        $this->excel->getActiveSheet()->getColumnDimension('F')->setWidth(10);
        $this->excel->getActiveSheet()->getColumnDimension('G')->setWidth(10);
		$this->excel->getActiveSheet()->getColumnDimension('H')->setWidth(10);
		$this->excel->getActiveSheet()->getColumnDimension('I')->setWidth(10);
		$this->excel->getActiveSheet()->getColumnDimension('J')->setWidth(10);
		$this->excel->getActiveSheet()->getColumnDimension('K')->setWidth(20);
		$this->excel->getActiveSheet()->getColumnDimension('L')->setWidth(10);
		$this->excel->getActiveSheet()->getColumnDimension('M')->setWidth(10);
		$this->excel->getActiveSheet()->getColumnDimension('N')->setWidth(30);
         


        $this->excel->getActiveSheet()->mergeCells('A1:N1');
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
        ->setCellValue('A' . $baris,"BUKU INVENTARIS  ". strtoupper($this->desa2->bentuk_lembaga));
        $baris++;
        
        $this->excel->getActiveSheet()->mergeCells('A'.$baris.':n'.$baris);

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

 $this->excel->getActiveSheet()->mergeCells('A'.$baris.':N'.$baris);

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
        ->setCellValue('N5', "MODEL A.3 ");  




$this->excel->getActiveSheet()->mergeCells('A'.$baris.':A'.($baris+1));
$this->excel->getActiveSheet()->mergeCells('B'.$baris.':B'.($baris+1));

$this->excel->getActiveSheet()->mergeCells('C'.$baris.':E'.$baris);
$this->excel->getActiveSheet()->mergeCells('F'.$baris.':G'.$baris);
$this->excel->getActiveSheet()->mergeCells('H'.$baris.':K'.$baris);
$this->excel->getActiveSheet()->mergeCells('L'.$baris.':M'.$baris);
$this->excel->getActiveSheet()->mergeCells('N'.$baris.':N'.($baris+1));


$this->excel->getActiveSheet()
        ->setCellValue('A' . $baris, "No.")
        ->setCellValue('B' . $baris, "JENIS BARANG / BANGUNAN ")
        ->setCellValue('C' . $baris, "ASAL BARANG / BANGUNAN ")
        ->setCellValue('F' . $baris, "KEADAAN AWAL TAHUN ")
		->setCellValue('H' . $baris, "PENGHAPUSAN  ")
		->setCellValue('L' . $baris, "KEADAAN AKHIR TAHUN   ")
        ->setCellValue('N' . $baris, "KETERANGAN")
		->setCellValue('C' . ($baris+1), "DIBELI SENDIRI")
		->setCellValue('D' . ($baris+1), "PEMERINTAH")
		->setCellValue('E' . ($baris+1), "SUMBANGAN")
		->setCellValue('F' . ($baris+1), "BAIK")
		->setCellValue('G' . ($baris+1), "RUSAK")
		->setCellValue('H' . ($baris+1), "RUSAK")
		->setCellValue('I' . ($baris+1), "DIJUAL")
		->setCellValue('J' . ($baris+1), "SIDUMBANGKAN")
		->setCellValue('K' . ($baris+1), "TANGGAL PENGHAPUSAN")
		->setCellValue('l' . ($baris+1), "BAIK")
		->setCellValue('m' . ($baris+1), "RUSAK")
		->setCellValue('n' . ($baris+1), "KETERANGAN");  
		
        
$arr_kolom = array('a','b','c','d','e','f','g','h','i','j','k','l','m','n');

$this->format(array("arr_kolom"=>$arr_kolom, "baris" => $baris, "bold"=>true, "align"=>"center"));
//$this->format_header($arr_kolom,$baris);
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
        ->setCellValue('N' . $baris, "14");      
        
 
$this->format(array("arr_kolom"=>$arr_kolom, "baris" => $baris, "bold"=>true, "align"=>"center"));
$baris++;


$record = $this->dm->get_data_per_tahun($tahun) ;
$n=0;
foreach($record->result() as $data) : 
    $n++;
    $this->excel->getActiveSheet()
        ->setCellValue('A' . $baris, $n)
        ->setCellValue('B' . $baris, $data->jenis_inventaris)
        ->setCellValue('C' . $baris, $data->asal_sendiri)
        ->setCellValue('D' . $baris, $data->asal_pemerintah)
		->setCellValue('E' . $baris, $data->asal_sumbangan)
		->setCellValue('F' . $baris, $data->awal_tahun_baik)
		->setCellValue('G' . $baris, $data->awal_tahun_rusak)
		->setCellValue('H' . $baris, $data->hapus_rusak)
		->setCellValue('I' . $baris, $data->hapus_jual)
		->setCellValue('J' . $baris, $data->hapus_sumbang)
		->setCellValue('K' . $baris, flipdate($data->hapus_tanggal))
		->setCellValue('L' . $baris, $data->akhir_tahun_baik)
		->setCellValue('M' . $baris, $data->akhir_tahun_baik)
		->setCellValue('N' . $baris, $data->keterangan)
         ;
        
         
        
        $this->format_center_line( array('a','c','d','e','f','g','h','i','j','l','m') ,$baris);
        $this->format(array("arr_kolom"=>array('b','k','n'), "baris" => $baris, "bold"=>false));
        $baris++;
endforeach;

$baris+=3;
 $this->excel->getActiveSheet()         
        ->setCellValue('B' . $baris, "MENGETAHUI")
        ->setCellValue('k' . $baris, strtoupper($this->desa2->bentuk_lembaga. " ".$this->desa2->desa).", ".date("d-m-Y"));
 $baris++;
$this->excel->getActiveSheet()         
        ->setCellValue('B' . $baris, "KEPALA ".strtoupper($this->desa2->bentuk_lembaga. " ".$this->desa2->desa) )
        ->setCellValue('k' . $baris, "SEKTERTARIS");
 $baris++;

$this->excel->getActiveSheet()         
       // ->setCellValue('B' . $baris, strtoupper($this->desa2->bentuk_lembaga. " ".$this->desa2->desa) )
        ->setCellValue('k' . $baris, "");
 $baris+=3;  

$this->excel->getActiveSheet()         
        ->setCellValue('B' . $baris, $this->desa2->nama_kepala_desa )
        ->setCellValue('k' . $baris, $this->desa2->nama_sek_desa);
 $baris++;

//$this->format(array("arr_kolom"=>$arr_kolom,"bold"=>true,"baris"=>$baris,"align"=>"center"));



        $filename = "BUKU INVENTARIS  ".strtoupper($this->desa2->bentuk_lembaga).".xls";

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