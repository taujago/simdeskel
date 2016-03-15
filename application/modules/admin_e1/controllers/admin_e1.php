<?php 
class admin_e1 extends op_controller {
    var $desa2;
	function __construct(){
		parent::__construct();
		$this->load->model("core_model","cm");
		$this->load->model("e1m","dm");
        $this->load->model("add_model","am");
		$this->load->helper("tanggal");
        $this->desa2 = $this->cm->data_desa();
	}


	function index(){
		$data['controller'] = get_class($this);
        $desa2 = $this->cm->data_desa();
		$data['header'] = "Data anggota badan permusyawaratan desa ";
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
        $tentang = isset($_REQUEST['search_tentang'])?$_REQUEST['search_tentang']:"x";
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
                "tentang"  => $tentang,
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
            $responce->rows[$i]['id']					= $result[$i]['id'] ;
            $responce->rows[$i]['nama']           		= $result[$i]['nama'] ;
            $responce->rows[$i]['jenis_kelamin'] 		= $result[$i]['jenis_kelamin'] ;
            $responce->rows[$i]['tempat_lahir']   		= $result[$i]['tempat_lahir'] ;
            $responce->rows[$i]['tanggal_lahir']   		= flipdate($result[$i]['tanggal_lahir']) ;
            $responce->rows[$i]['tanggal']   		= flipdate($result[$i]['tanggal']) ;
            $responce->rows[$i]['agama']           		= $result[$i]['agama'] ;
            $responce->rows[$i]['jabatan']         		= $result[$i]['jabatan'] ;
            $responce->rows[$i]['pendidikan_terakhir']	= $result[$i]['pendidikan_terakhir'] ;
            $responce->rows[$i]['tanggal_pengangkatan']	= flipdate($result[$i]['tanggal_pengangkatan']) ;
			$responce->rows[$i]['nomor_pengangkatan']  	= $result[$i]['nomor_pengangkatan'] ;
			$responce->rows[$i]['tanggal_pemberhentian']= flipdate($result[$i]['tanggal_pemberhentian']) ;
			$responce->rows[$i]['nomor_pemberhentian']	= $result[$i]['nomor_pemberhentian'] ;
            $responce->rows[$i]['ket']           		= $result[$i]['ket'] ;
           
        } }
		//echo "<hr />";
        echo json_encode($responce); 
    }

    function save(){
        $data = $this->input->post();
        $this->load->library('form_validation');
        $this->form_validation->set_rules('nama','Nama lengkap ','required');    
        $this->form_validation->set_rules('tanggal','Tanggal data ','required');    
        $this->form_validation->set_rules('jenis_kelamin','Jenis kelamin ','required');              
        $this->form_validation->set_rules('tempat_lahir','Tempat lahir ','required');              
        $this->form_validation->set_rules('tanggal_lahir','Tanggal lahir ','required');              
        $this->form_validation->set_rules('agama','Agama ','required');              
        $this->form_validation->set_rules('jabatan','Jabatan ','required');              
        $this->form_validation->set_rules('pendidikan_terakhir','Pendidikan terakhir ','required');              
        $this->form_validation->set_rules('tanggal_pengangkatan','Tanggal pengangkatan ','required');              
        $this->form_validation->set_rules('nomor_pengangkatan','Nomor pengangkatan ','required');                         

        $this->form_validation->set_message('required', ' %s Harus diisi '); 
        $this->form_validation->set_message('numeric', ' %s Harus diisi dengan angka ');
        $this->form_validation->set_message('alpha', ' %s Harus diisi dengan huruf ');
        
        
        $this->form_validation->set_error_delimiters("* ", '<br>');
        if($this->form_validation->run() == TRUE) {     

                $data['tanggal'] = flipdate($data['tanggal']);
                $data['tanggal_lahir'] = flipdate($data['tanggal_lahir']);
                $data['tanggal_pengangkatan'] = flipdate($data['tanggal_pengangkatan']);
                $data['tanggal_pemberhentian'] = flipdate($data['tanggal_pemberhentian']);

                $data['id_desa'] = $this->desa2->id_desa;
                $res = $this->db->insert("admin_e1",$data);

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
        $this->form_validation->set_rules('nama','Nama lengkap ','required');    
        $this->form_validation->set_rules('tanggal','Tanggal data ','required');    
        $this->form_validation->set_rules('jenis_kelamin','Jenis kelamin ','required');              
        $this->form_validation->set_rules('tempat_lahir','Tempat lahir ','required');              
        $this->form_validation->set_rules('tanggal_lahir','Tanggal lahir ','required');              
        $this->form_validation->set_rules('agama','Agama ','required');              
        $this->form_validation->set_rules('jabatan','Jabatan ','required');              
        $this->form_validation->set_rules('pendidikan_terakhir','Pendidikan terakhir ','required');              
        $this->form_validation->set_rules('tanggal_pengangkatan','Tanggal pengangkatan ','required');              
        $this->form_validation->set_rules('nomor_pengangkatan','Nomor pengangkatan ','required');                         

        $this->form_validation->set_message('required', ' %s Harus diisi '); 
        $this->form_validation->set_message('numeric', ' %s Harus diisi dengan angka ');
        $this->form_validation->set_message('alpha', ' %s Harus diisi dengan huruf ');
        
        
        $this->form_validation->set_error_delimiters("* ", '<br>');
        if($this->form_validation->run() == TRUE) {      

                $data['tanggal'] = flipdate($data['tanggal']);
                $data['tanggal_lahir'] = flipdate($data['tanggal_lahir']);
                $data['tanggal_pengangkatan'] = flipdate($data['tanggal_pengangkatan']);
                $data['tanggal_pemberhentian'] = flipdate($data['tanggal_pemberhentian']);

                $this->db->where("id",$data['id']);
                $res = $this->db->update("admin_e1",$data);

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


function hapus(){
    $data = $this->input->post();
    $ids = explode(",", $data['ids']);
    foreach($ids as $id) {
        $this->db->where("id",$id);
        $this->db->update("admin_e1",array("deleted"=>1));
    }
    echo json_encode(array("success"=>true,"pesan"=>"Berhasil dihapus"));
}

 
function cetak($tahun) {
     
    $data['controller'] = get_class($this);

   
    $data['record'] = $this->dm->get_data_per_tahun($tahun);
    $data['tahun'] = $tahun;
    $data['header'] = "Peraturan ".$this->desa2->bentuk_lembaga;
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
    $data['header'] = "Peraturan ".$this->desa2->bentuk_lembaga;
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


         $html = $this->load->view("pdf/admin_e1_pdf_view",$data,true);
         $pdf->writeHTML($html, true, false, true, false, '');



         $halaman  = $pdf->getPage();
         $pdf->startTransaction();
         $y = $pdf->getY();
      
         $html = $this->load->view("pdf/pdf_ttd",$data,true);
         $pdf->writeHTML($html, true, false, true, false, '');
       

         if($halaman <> $pdf->getPage() ) {
            $pdf->rollbackTransaction(true);

            $pdf->AddPage();
            $html = $this->load->view("pdf/admin_e1_pdf_view_table_header",$data,true);
            $pdf->writeHTML($html, true, false, true, false, '');

            $html = $this->load->view("pdf/pdf_ttd",$data,true);
            $pdf->writeHTML($html, true, false, true, false, '');

         }

         else if( $y < 20 ) {
            $pdf->rollbackTransaction(true);

            //$pdf->AddPage();
            $html = $this->load->view("pdf/admin_e1_pdf_view_table_header",$data,true);
            $pdf->writeHTML($html, true, false, true, false, '');

            $html = $this->load->view("pdf/pdf_ttd",$data,true);
            $pdf->writeHTML($html, true, false, true, false, '');

         }

         $pdf->Output($data['header']. $this->session->userdata("tahun") .'.pdf', 'I');
}
  
function excel($tahun) {


        $this->load->library('Excel');
        $this->excel->setActiveSheetIndex(0);
        $this->excel->getActiveSheet()->setTitle('BUKU DATA ANGGOTA BPD');

        $this->excel->getActiveSheet()->getColumnDimension('A')->setWidth(5);
        $this->excel->getActiveSheet()->getColumnDimension('B')->setWidth(20);
        $this->excel->getActiveSheet()->getColumnDimension('C')->setWidth(20);
        $this->excel->getActiveSheet()->getColumnDimension('D')->setWidth(20);
        $this->excel->getActiveSheet()->getColumnDimension('E')->setWidth(20);
        $this->excel->getActiveSheet()->getColumnDimension('F')->setWidth(20);
        $this->excel->getActiveSheet()->getColumnDimension('G')->setWidth(20);
        $this->excel->getActiveSheet()->getColumnDimension('H')->setWidth(20);
        $this->excel->getActiveSheet()->getColumnDimension('I')->setWidth(20);
        $this->excel->getActiveSheet()->getColumnDimension('J')->setWidth(20);
        $this->excel->getActiveSheet()->getColumnDimension('K')->setWidth(20);
        $this->excel->getActiveSheet()->getColumnDimension('L')->setWidth(20);
        $this->excel->getActiveSheet()->getColumnDimension('M')->setWidth(20);
		
        $this->excel->getActiveSheet()->mergeCells('A1:M1');
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
        ->setCellValue('A' . $baris,"BUKU DATA ANGGOTA BADAN PERMUSYAWARATAN DESA");
        $baris++;

		$this->excel->getActiveSheet()->mergeCells('A'.$baris.':M'.$baris);
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
        $baris += 2;
		
		//$this->excel->getActiveSheet()->mergeCells('A'.$baris.':M'.$baris);
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
        ->setCellValue('M' . $baris, "MODEL E.1");      
        $baris += 2;
		
		$this->excel->getActiveSheet()->mergeCells('A'.$baris.':A'.($baris+1));
		$this->excel->getActiveSheet()->mergeCells('B'.$baris.':B'.($baris+1));
		$this->excel->getActiveSheet()->mergeCells('C'.$baris.':C'.($baris+1));
		$this->excel->getActiveSheet()->mergeCells('D'.$baris.':E'.$baris);
		$this->excel->getActiveSheet()->mergeCells('F'.$baris.':F'.($baris+1));
		$this->excel->getActiveSheet()->mergeCells('G'.$baris.':G'.($baris+1));
		$this->excel->getActiveSheet()->mergeCells('H'.$baris.':H'.($baris+1));
		$this->excel->getActiveSheet()->mergeCells('I'.$baris.':J'.$baris);
		$this->excel->getActiveSheet()->mergeCells('K'.$baris.':L'.$baris);
		$this->excel->getActiveSheet()->mergeCells('M'.$baris.':M'.($baris+1));

		$this->excel->getActiveSheet()
				->setCellValue('A' . $baris, "NO")
				->setCellValue('B' . $baris, "NAMA LENGKAP")
				->setCellValue('C' . $baris, "JENIS KELAMIN")
				->setCellValue('D' . $baris, "TEMPAT & TANGGAL LAHIR ")
				->setCellValue('D' . ($baris+1), "TEMPAT")
				->setCellValue('E' . ($baris+1), "TANGGAL")
				->setCellValue('F' . $baris, "AGAMA")
				->setCellValue('G' . $baris, "JABATAN")    
				->setCellValue('H' . $baris, "PENDIDIKAN TERAKHIR")    
				->setCellValue('I' . $baris, "KEPUTUSAN PENGANGKATAN")   
				->setCellValue('I' . ($baris+1), "TANGGAL")    
				->setCellValue('J' . ($baris+1), "NOMOR")   
				->setCellValue('K' .$baris, "KEPUTUSAN DAN PEMBERHENTIAN")
				->setCellValue('K' . ($baris+1), "TANGGAL")   
				->setCellValue('L' . ($baris+1), "NOMOR")  		 
				->setCellValue('M' .$baris, "KET");   		 
        
$arr_kolom = array('a','b','c','d','e','f','g','h','i','j','k','l','m');
$this->format(array("arr_kolom"=>$arr_kolom, "baris" => $baris, "bold"=>true, "align"=>"center"));
$this->format(array("arr_kolom"=>$arr_kolom, "baris" => ($baris+1), "bold"=>true, "align"=>"center"));
//$this->format_header($arr_kolom,$baris);
$baris += 2;

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
		->setCellValue('M' . $baris, "13");      
        
 
$this->format(array("arr_kolom"=>$arr_kolom, "baris" => $baris, "bold"=>true, "align"=>"center"));
$baris++;


$record = $this->dm->get_data_per_tahun($tahun) ;
$n=0;
foreach($record->result() as $row) : 
    $n++;
    $this->excel->getActiveSheet()
        ->setCellValue('A' . $baris, $n)
        ->setCellValue('B' . $baris, $row->nama)
        ->setCellValue('C' . $baris, $row->jenis_kelamin)
        ->setCellValue('D' . $baris, $row->tempat_lahir)
        ->setCellValue('E' . $baris, flipdate($row->tanggal_lahir))
		->setCellValue('F' . $baris, $row->agama)     
		->setCellValue('G' . $baris, $row->jabatan)     
		->setCellValue('H' . $baris, $row->pendidikan_terakhir)   
		->setCellValue('I' . $baris, flipdate($row->tanggal_pengangkatan))    
		->setCellValue('J' . $baris, $row->nomor_pengangkatan)    
		->setCellValue('K' . $baris, flipdate($row->tanggal_pemberhentian))     
		->setCellValue('L' . $baris, $row->nomor_pemberhentian)      
		->setCellValue('M' . $baris, $row->ket);      
        
         $this->format(array("arr_kolom"=>$arr_kolom, "baris" => $baris, "bold"=>false));
        $baris++;
endforeach;

$baris+=3;
 $this->excel->getActiveSheet()         
        ->setCellValue('B' . $baris, "MENGETAHUI")
        ->setCellValue('L' . $baris, strtoupper($this->desa2->desa) .", ".date("d-m-Y"));
 $baris++;
$this->excel->getActiveSheet()         
        ->setCellValue('B' . $baris, "KEPALA ".strtoupper($this->desa2->bentuk_lembaga. " ".$this->desa2->desa) )
        ->setCellValue('L' . $baris, "SEKTERTARIS");
 $baris++;

$this->excel->getActiveSheet()         
        //->setCellValue('B' . $baris, strtoupper($this->desa2->bentuk_lembaga. " ".$this->desa2->desa) )
        ->setCellValue('L' . $baris, "");
 $baris+=3;  

$this->excel->getActiveSheet()         
        ->setCellValue('B' . $baris, $this->desa2->nama_kepala_desa )
        ->setCellValue('L' . $baris, $this->desa2->nama_sek_desa);
 $baris++;
$this->excel->getActiveSheet()
->setCellValue('l' . $baris, "NIP : " . $this->desa2->nip_sek_desa);

$baris++;
$this->excel->getActiveSheet()
->setCellValue('l' . $baris, "Pangkat  : " . $this->desa2->pangkat_sek_desa);
//$this->format(array("arr_kolom"=>$arr_kolom,"bold"=>true,"baris"=>$baris,"align"=>"center"));



        $filename = "BUKU DATA ANGGOTA BPD ".$this->desa2->desa.".xls";

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