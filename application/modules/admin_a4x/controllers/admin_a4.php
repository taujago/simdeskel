    <?php 
class admin_a4 extends op_controller {
    var $desa2;
	function __construct(){
		parent::__construct();
		$this->load->model("core_model","cm");
		$this->load->model("a4m","dm");
        $this->load->model("add_model","am");
		$this->load->helper("tanggal");
        $this->desa2 = $this->cm->data_desa();
	}


	function index(){
		$data['controller'] = get_class($this);
        $desa2 = $this->cm->data_desa();
		$data['header'] = "DATA APARATUR PEMERINTAH   " . $desa2->bentuk_lembaga;
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
        $nama = isset($_REQUEST['search_nama'])?$_REQUEST['search_nama']:"x";
        
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
                
                "nama" => $nama/*,
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
            $responce->rows[$i]['nama']    			 = $result[$i]['nama'] ;             
            $responce->rows[$i]['nip']           = $result[$i]['nip'] ;
            $responce->rows[$i]['niap']           = $result[$i]['niap'] ;
            $responce->rows[$i]['jk']           = $result[$i]['jk'] ;
 
            $responce->rows[$i]['tmp_lahir']           = $result[$i]['tmp_lahir'] ;
            $responce->rows[$i]['tgl_lahir']           =  flipdate($result[$i]['tgl_lahir']) ;
			
            $responce->rows[$i]['id_agama']           =  $result[$i]['id_agama'] ;
            $responce->rows[$i]['agama']           =  $result[$i]['agama'] ;
            $responce->rows[$i]['pangkat']           =  $result[$i]['pangkat'] ;
            $responce->rows[$i]['golongan']           =  $result[$i]['golongan'] ;
            $responce->rows[$i]['jabatan']           =  $result[$i]['jabatan'] ;
            $responce->rows[$i]['pendidikan_terakhir']     =  $result[$i]['pendidikan_terakhir'] ;
            
			$responce->rows[$i]['pengangkatan_nomor']    = $result[$i]['pengangkatan_nomor'] ;
			$responce->rows[$i]['pengangkatan_tanggal']   = flipdate($result[$i]['pengangkatan_tanggal']) ;
			
			$responce->rows[$i]['pemberhentian_nomor']    = $result[$i]['pemberhentian_nomor'] ;
			$responce->rows[$i]['pemberhentian_tanggal']   = flipdate($result[$i]['pemberhentian_tanggal']) ;
			
            $responce->rows[$i]['keterangan']           = $result[$i]['keterangan'] ;

             
             
             

        } }
		//echo "<hr />";
        echo json_encode($responce); 
    }

    function save(){
        $data = $this->input->post();
        $this->load->library('form_validation');
        $this->form_validation->set_rules('nama','Nama ','required');    
        $this->form_validation->set_rules('niap','Nomor Induk Aparatur Pemerintahan ','required');        
 		$this->form_validation->set_rules('jk','Jenis Kelamin ','required');  
		$this->form_validation->set_rules('jabatan','Jabatan ','required');  
		 
       

        $this->form_validation->set_message('required', ' %s Harus diisi '); 
        $this->form_validation->set_message('numeric', ' %s Harus diisi dengan angka ');
        $this->form_validation->set_message('alpha', ' %s Harus diisi dengan huruf ');
        
        
        $this->form_validation->set_error_delimiters("* ", '<br>');
        if($this->form_validation->run() == TRUE) {

                 

                $data['tgl_lahir'] = flipdate($data['tgl_lahir']);
				$data['pengangkatan_tanggal'] = flipdate($data['pengangkatan_tanggal']);
                $data['pemberhentian_tanggal'] = flipdate($data['pemberhentian_tanggal']);
                $data['id_desa'] = $this->desa2->id_desa;
                $res = $this->db->insert("admin_a4",$data);

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
         $this->form_validation->set_rules('nama','Nama ','required');    
        $this->form_validation->set_rules('niap','Nomor Induk Aparatur Pemerintahan ','required');        
 		$this->form_validation->set_rules('jk','Jenis Kelamin ','required');  
		$this->form_validation->set_rules('jabatan','Jabatan ','required');  
		 

        $this->form_validation->set_message('required', ' %s Harus diisi '); 
        $this->form_validation->set_message('numeric', ' %s Harus diisi dengan angka ');
        $this->form_validation->set_message('alpha', ' %s Harus diisi dengan huruf ');
        
        
        $this->form_validation->set_error_delimiters("* ", '<br>');
        if($this->form_validation->run() == TRUE) {

               

                $data['tgl_lahir'] = flipdate($data['tgl_lahir']);
				$data['pengangkatan_tanggal'] = flipdate($data['pengangkatan_tanggal']);
                $data['pemberhentian_tanggal'] = flipdate($data['pemberhentian_tanggal']);
             
                 

                $this->db->where("id",$data['id']);
                $res = $this->db->update("admin_a4",$data);

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
        $this->db->update("admin_a4",array("deleted"=>1));
		//echo $this->db->last_query();
    }
    echo json_encode(array("success"=>true,"pesan"=>"Berhasil dihapus"));
}

 
function cetak($tahun) {
     
    $data['controller'] = get_class($this);

   
    $data['record'] = $this->dm->get_data_per_tahun($tahun);
    $data['tahun'] = $tahun;
    $data['header'] = "Data Aparatru Pemerintah   ".$this->desa2->bentuk_lembaga;
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
    $data['header'] = "Data Aparatur Pemerintah   ".$this->desa2->bentuk_lembaga;
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


         $html = $this->load->view("pdf/admin_a4_pdf_view",$data,true);
        echo $html; exit; 
         $pdf->writeHTML($html, true, false, true, false, '');

//         exit; 

         $halaman  = $pdf->getPage();
         $pdf->startTransaction();
         $y = $pdf->getY();
      
         $html = $this->load->view("pdf/pdf_ttd",$data,true);
         
         $pdf->writeHTML($html, true, false, true, false, '');
         $pdf->Output($data['header']. $this->session->userdata("tahun") .'.pdf', 'I'); exit;

         if($halaman <> $pdf->getPage() ) {
            $pdf->rollbackTransaction(true);

            $pdf->AddPage();
            $html = $this->load->view("pdf/admin_a4_pdf_view_table_header",$data,true);
            $pdf->writeHTML($html, true, false, true, false, '');

            $html = $this->load->view("pdf/pdf_ttd",$data,true);
            $pdf->writeHTML($html, true, false, true, false, '');

         }

         else if( $y < 20 ) {
            $pdf->rollbackTransaction(true);

            //$pdf->AddPage();
            $html = $this->load->view("pdf/admin_a4_pdf_view_table_header",$data,true);
            $pdf->writeHTML($html, true, false, true, false, '');

            $html = $this->load->view("pdf/pdf_ttd",$data,true);
            $pdf->writeHTML($html, true, false, true, false, '');

         }
         //exit;
         
}

function excel($tahun) {


        $this->load->library('Excel');
        $this->excel->setActiveSheetIndex(0);
        $this->excel->getActiveSheet()->setTitle('Data Aparatur  '. $this->desa2->desa);

        $this->excel->getActiveSheet()->getColumnDimension('A')->setWidth(5);
        $this->excel->getActiveSheet()->getColumnDimension('B')->setWidth(30);
        $this->excel->getActiveSheet()->getColumnDimension('C')->setWidth(30);
        $this->excel->getActiveSheet()->getColumnDimension('D')->setWidth(30);
        $this->excel->getActiveSheet()->getColumnDimension('E')->setWidth(10);
        $this->excel->getActiveSheet()->getColumnDimension('F')->setWidth(30);
        $this->excel->getActiveSheet()->getColumnDimension('G')->setWidth(30);
		$this->excel->getActiveSheet()->getColumnDimension('H')->setWidth(30);
		$this->excel->getActiveSheet()->getColumnDimension('I')->setWidth(30);
		$this->excel->getActiveSheet()->getColumnDimension('J')->setWidth(30);
		$this->excel->getActiveSheet()->getColumnDimension('K')->setWidth(30);
		$this->excel->getActiveSheet()->getColumnDimension('L')->setWidth(30);
		$this->excel->getActiveSheet()->getColumnDimension('M')->setWidth(30);
          


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
        ->setCellValue('A' . $baris,"DATA APARATUR   ". strtoupper($this->desa2->bentuk_lembaga));
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
        ->setCellValue('A' . $baris,strtoupper($this->desa2->bentuk_lembaga." ".$this->desa2->desa));      
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
        $baris++;

$baris +=3;

  $this->excel->getActiveSheet()
        ->setCellValue('M5', "MODEL A.4 ");  


 


$this->excel->getActiveSheet()
        ->setCellValue('A' . $baris, "No.")
        ->setCellValue('B' . $baris, "NAMA")
        ->setCellValue('C' . $baris, "NIAP")
        ->setCellValue('D' . $baris, "NIP")
		->setCellValue('E' . $baris, "JK")
		->setCellValue('f' . $baris, "TEMPAT TANGGAL LAHIR")
        ->setCellValue('g' . $baris, "AGAMA")
		->setCellValue('h' . $baris, "PANGKAT GOLONGAN")
		->setCellValue('i' . $baris, "JABATAN")
		->setCellValue('j' . $baris, "PENDIDIKAN TERAKHIR")
		->setCellValue('k' . $baris, "NOMOR DAN TANGGAL KEPUTUSAN PENGANGKATAN ")
		->setCellValue('l' . $baris, "NOMOR DAN TANGGAL KEPUTUSAN PEMBERHENTIAN")
		->setCellValue('m' . $baris, "KETERANGAN");  
		
        
$arr_kolom = array('a','b','c','d','e','f','g','h','i','j','k','l','m');

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
        ->setCellValue('J' . $baris, "10")
        ->setCellValue('K' . $baris, "11")
        ->setCellValue('L' . $baris, "12")
		->setCellValue('M' . $baris, "13");      
        
 
$this->format(array("arr_kolom"=>$arr_kolom, "baris" => $baris, "bold"=>true, "align"=>"center"));
$baris++;


$record = $this->dm->get_data_per_tahun($tahun) ;
$n=0;
foreach($record->result() as $data) : 
    $n++;
    $this->excel->getActiveSheet()
        ->setCellValue('A' . $baris, $n)
        ->setCellValue('B' . $baris, $data->nama)
        ->setCellValue('C' . $baris, $data->niap)
        ->setCellValue('D' . $baris, $data->nip)
		->setCellValue('E' . $baris, $data->jk)
		->setCellValue('F' . $baris, $data->tmp_lahir." \n".flipdate($data->tgl_lahir))
		->setCellValue('G' . $baris, $data->agama)
		->setCellValue('H' . $baris, $data->pangkat." \n".$data->golongan)
		->setCellValue('I' . $baris, $data->jabatan)
		->setCellValue('J' . $baris, $data->pendidikan_terakhir  )
		->setCellValue('K' . $baris, $data->pengangkatan_nomor." \n".flipdate($data->pengangkatan_tanggal))
		->setCellValue('L' . $baris, $data->pemberhentian_nomor." \n".flipdate($data->pemberhentian_tanggal))
		->setCellValue('M' . $baris, $data->keterangan) ;
        
        // $this->format(array("arr_kolom"=>$arr_kolom, "baris" => $baris, "bold"=>false));
        
        $this->format_center_line( array('a','k') ,$baris);
        $this->format(array("arr_kolom"=>array('b','c','d','e','f','g','h','i','j',
            'k','l','m'), "baris" => $baris, "bold"=>false));
        

        $baris++;
endforeach;

$baris+=3;
 $this->excel->getActiveSheet()         
        ->setCellValue('B' . $baris, "MENGETAHUI")
        ->setCellValue('k' . $baris,  $this->desa2->desa.", ".date("d-m-Y"));
 $baris++;
$this->excel->getActiveSheet()         
        ->setCellValue('B' . $baris, "KEPALA ".strtoupper($this->desa2->bentuk_lembaga. " ".$this->desa2->desa) )
        ->setCellValue('k' . $baris, "SEKTERTARIS");
 $baris++;

$this->excel->getActiveSheet()         
        //->setCellValue('B' . $baris, strtoupper($this->desa2->bentuk_lembaga. " ".$this->desa2->desa) )
        ->setCellValue('k' . $baris, "");
 $baris+=3;  

$this->excel->getActiveSheet()         
        ->setCellValue('B' . $baris, $this->desa2->nama_kepala_desa )
        ->setCellValue('k' . $baris, $this->desa2->nama_sek_desa);
 $baris++;
 $this->excel->getActiveSheet()
->setCellValue('k' . $baris, "NIP : " . $this->desa2->nip_sek_desa);

$baris++;
$this->excel->getActiveSheet()
->setCellValue('k' . $baris, "Pangkat  : " . $this->desa2->pangkat_sek_desa);
//$this->format(array("arr_kolom"=>$arr_kolom,"bold"=>true,"baris"=>$baris,"align"=>"center"));



        $filename = "DATA APARATUR PEMERINTAHAN   ".strtoupper($this->desa2->bentuk_lembaga).".xls";

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