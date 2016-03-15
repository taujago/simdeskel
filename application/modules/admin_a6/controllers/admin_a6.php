<?php 
class admin_a6 extends op_controller {
    var $desa2;
	function __construct(){
		parent::__construct();
		$this->load->model("core_model","cm");
		$this->load->model("a6m","dm");
        $this->load->model("add_model","am");
		$this->load->helper("tanggal");
        $this->desa2 = $this->cm->data_desa();
	}


	function index(){
		$data['controller'] = get_class($this);
        $data['desa2'] = $this->cm->data_desa();
        $desa2 = $this->cm->data_desa();
		$data['header'] = "DATA TANAH DI    " . strtoupper($desa2->bentuk_lembaga );
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
            $responce->rows[$i]['id']			                = $result[$i]['id'] ;
            $responce->rows[$i]['nama_pemilik']    			    = $result[$i]['nama_pemilik'] ;             
            $responce->rows[$i]['luas']                         = $result[$i]['luas'] ;
            $responce->rows[$i]['luas_sertifikat_hm']           = $result[$i]['luas_sertifikat_hm'] ;
            $responce->rows[$i]['luas_sertifikat_hgb']          = $result[$i]['luas_sertifikat_hgb'] ;
            $responce->rows[$i]['luas_sertifikat_hp']           = $result[$i]['luas_sertifikat_hp'] ;
            $responce->rows[$i]['luas_sertifikat_hgu']          = $result[$i]['luas_sertifikat_hgu'] ;
            $responce->rows[$i]['luas_sertifikat_hpl']          =  $result[$i]['luas_sertifikat_hpl'] ;
            $responce->rows[$i]['luas_sertifikat_ma']           =  $result[$i]['luas_sertifikat_ma'] ;
            $responce->rows[$i]['luas_sertifikat_vi']           =  $result[$i]['luas_sertifikat_vi'] ;
            $responce->rows[$i]['luas_sertifikat_tn']           =  $result[$i]['luas_sertifikat_tn'] ;
            $responce->rows[$i]['non_pertanian_perumahan']      =  $result[$i]['non_pertanian_perumahan'] ;
            $responce->rows[$i]['non_pertanian_perdagangan']    =  $result[$i]['non_pertanian_perdagangan'] ; 
			$responce->rows[$i]['non_pertanian_perkantoran']    = $result[$i]['non_pertanian_perkantoran'] ;
			$responce->rows[$i]['non_pertanian_industri']  =  $result[$i]['non_pertanian_industri'] ;
			$responce->rows[$i]['non_pertanian_fasilitas_umum'] = $result[$i]['non_pertanian_fasilitas_umum'] ;
			$responce->rows[$i]['pertanian_sawah']              =  $result[$i]['pertanian_sawah'] ;
            $responce->rows[$i]['pertanian_tegalan']            =  $result[$i]['pertanian_tegalan'] ;
            $responce->rows[$i]['pertanian_perkebunan']         =  $result[$i]['pertanian_perkebunan'] ;
            $responce->rows[$i]['pertanian_peternakan']         =  $result[$i]['pertanian_peternakan'] ;
            $responce->rows[$i]['pertanian_hutan']              =  $result[$i]['pertanian_hutan'] ;
			$responce->rows[$i]['pertanian_hutan_lindung']      = $result[$i]['pertanian_hutan_lindung'] ;
            $responce->rows[$i]['pertanian_tanah_kosong']       = $result[$i]['pertanian_tanah_kosong'] ;
            $responce->rows[$i]['pertanian_lain']               = $result[$i]['pertanian_lain'] ;

             
             
             

        } }
		//echo "<hr />";
        echo json_encode($responce); 
    }

    function save(){
        $data = $this->input->post();
        $this->load->library('form_validation');
        $this->form_validation->set_rules('nama_pemilik','Pemilik ','required');    
        $this->form_validation->set_rules('luas','Luas ','required|numeric');        
 		$this->form_validation->set_rules('luas_sertifikat_hm','Luas Sertifikat HM ','numeric');  
		$this->form_validation->set_rules('luas_sertifikat_hgb','Luas Sertifikat Guna Bangunan ','numeric');  
		$this->form_validation->set_rules('luas_sertifikat_hp','Luas Sertifikat Hak Pakai','numeric'); 
        $this->form_validation->set_rules('luas_sertifikat_hgu','Luas Sertifikat Hak Guna Usaha  ','numeric'); 
        $this->form_validation->set_rules('luas_sertifikat_hpl','Luas Sertifikat hak Pengelolaan','numeric'); 
        $this->form_validation->set_rules('luas_sertifikat_ma','Luas Sertifikat Milik Adat ','numeric');
        $this->form_validation->set_rules('luas_sertifikat_vi','Luas Sertifikat Verponding Indonesia','numeric');
        $this->form_validation->set_rules('luas_sertifikat_tn','Luas Sertifikat Tanah Negara ','numeric');
        $this->form_validation->set_rules('non_pertanian_perumahan','Luas Perumahan','numeric');
        $this->form_validation->set_rules('non_pertanian_perdagangan','Luas Perdagangan','numeric');
        $this->form_validation->set_rules('non_pertanian_perkantoran','Luas Perkantoran','numeric');
        $this->form_validation->set_rules('non_pertanian_industri','Luas Industri','numeric');
        $this->form_validation->set_rules('non_pertanian_fasilitas_umum','Luas Fasilitas Umum','numeric');
        $this->form_validation->set_rules('pertanian_sawah','Luas Tanah Sawah','numeric');

        $this->form_validation->set_rules('pertanian_tegalan','Lua Tanahs Tegalan','numeric');
        $this->form_validation->set_rules('pertanian_perkebunan','Luas Tanah Perkebunan','numeric');
        $this->form_validation->set_rules('pertanian_peternakan','Luas Tanah Peternakan/ Perikanan','numeric');
        $this->form_validation->set_rules('pertanian_hutan','Luas Tanah Tanah Hutan ','numeric');
        $this->form_validation->set_rules('pertanian_hutan_lindung','Luas Tanah Hutan Lindung','numeric');
        $this->form_validation->set_rules('pertanian_tanah_kosong','Luas Tanah Kosong','numeric');
        $this->form_validation->set_rules('pertanian_lain','Luas Tanah Lainnya','numeric');
       

       

        $this->form_validation->set_message('required', ' %s Harus diisi '); 
        $this->form_validation->set_message('numeric', ' %s Harus diisi dengan angka ');
        $this->form_validation->set_message('alpha', ' %s Harus diisi dengan huruf ');
        
        
        $this->form_validation->set_error_delimiters("* ", '<br>');
        if($this->form_validation->run() == TRUE) {

                 

               
				 
               
                $data['id_desa'] = $this->desa2->id_desa;
                $res = $this->db->insert("admin_a6",$data);

                if($res) {    
                $ret = array("success"=>true,
                            "pesan"=>"Data berhasil disimpan",
                            "operation" =>"insert");
                }
                else {
                 $ret = array("success"=>false,
                            "pesan"=>"Data Gagal disimpan" .mysql_error(),
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
        $this->form_validation->set_rules('nama_pemilik','Pemilik ','required');    
        $this->form_validation->set_rules('luas','Luas ','required|numeric');        
        $this->form_validation->set_rules('luas_sertifikat_hm','Luas Sertifikat HM ','numeric');  
        $this->form_validation->set_rules('luas_sertifikat_hgb','Luas Sertifikat Guna Bangunan ','numeric');  
        $this->form_validation->set_rules('luas_sertifikat_hp','Luas Sertifikat Hak Pakai','numeric'); 
        $this->form_validation->set_rules('luas_sertifikat_hgu','Luas Sertifikat Hak Guna Usaha  ','numeric'); 
        $this->form_validation->set_rules('luas_sertifikat_hpl','Luas Sertifikat hak Pengelolaan','numeric'); 
        $this->form_validation->set_rules('luas_sertifikat_ma','Luas Sertifikat Milik Adat ','numeric');
        $this->form_validation->set_rules('luas_sertifikat_vi','Luas Sertifikat Verponding Indonesia','numeric');
        $this->form_validation->set_rules('luas_sertifikat_tn','Luas Sertifikat Tanah Negara ','numeric');
        $this->form_validation->set_rules('non_pertanian_perumahan','Luas Perumahan','numeric');
        $this->form_validation->set_rules('non_pertanian_perdagangan','Luas Perdagangan','numeric');
        $this->form_validation->set_rules('non_pertanian_perkantoran','Luas Perkantoran','numeric');
        $this->form_validation->set_rules('non_pertanian_industri','Luas Industri','numeric');
        $this->form_validation->set_rules('non_pertanian_fasilitas_umum','Luas Fasilitas Umum','numeric');
        $this->form_validation->set_rules('pertanian_sawah','Luas Tanah Sawah','numeric');
        $this->form_validation->set_rules('pertanian_tegalan','Lua Tanahs Tegalan','numeric');
        $this->form_validation->set_rules('pertanian_perkebunan','Luas Tanah Perkebunan','numeric');
        $this->form_validation->set_rules('pertanian_peternakan','Luas Tanah Peternakan/ Perikanan','numeric');
        $this->form_validation->set_rules('pertanian_hutan','Luas Tanah Tanah Hutan ','numeric');
        $this->form_validation->set_rules('pertanian_hutan_lindung','Luas Tanah Hutan Lindung','numeric');
        $this->form_validation->set_rules('pertanian_tanah_kosong','Luas Tanah Kosong','numeric');
        $this->form_validation->set_rules('pertanian_lain','Luas Tanah Lainnya','numeric');
		 

        $this->form_validation->set_message('required', ' %s Harus diisi '); 
        $this->form_validation->set_message('numeric', ' %s Harus diisi dengan angka ');
        $this->form_validation->set_message('alpha', ' %s Harus diisi dengan huruf ');
        
        
        $this->form_validation->set_error_delimiters("* ", '<br>');
        if($this->form_validation->run() == TRUE) {

               

              
             
                 

                $this->db->where("id",$data['id']);
                $res = $this->db->update("admin_a6",$data);

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
        $this->db->update("admin_a6",array("deleted"=>1));
		//echo $this->db->last_query();
    }
    echo json_encode(array("success"=>true,"pesan"=>"Berhasil dihapus"));
}

 
function cetak($tahun) {
     
    $data['controller'] = get_class($this);

   
    $data['record'] = $this->dm->get_data_per_tahun($tahun);
    $data['tahun'] = $tahun;
    $data['header'] = "Data Tanah Milik  ".$this->desa2->bentuk_lembaga;
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
    $data['header'] = "Data Tanah Milik  ".$this->desa2->bentuk_lembaga;

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


         $html = $this->load->view("pdf/admin_a6_pdf_view",$data,true);
         $pdf->writeHTML($html, true, false, true, false, '');



         $halaman  = $pdf->getPage();
         $pdf->startTransaction();
         $y = $pdf->getY();
      
         $html = $this->load->view("pdf/pdf_ttd",$data,true);
         $pdf->writeHTML($html, true, false, true, false, '');
       

         if($halaman <> $pdf->getPage() ) {
            $pdf->rollbackTransaction(true);

            $pdf->AddPage();
            $html = $this->load->view("pdf/admin_a6_pdf_view_table_header",$data,true);
            $pdf->writeHTML($html, true, false, true, false, '');

            $html = $this->load->view("pdf/pdf_ttd",$data,true);
            $pdf->writeHTML($html, true, false, true, false, '');

         }

         else if( $y < 20 ) {
            $pdf->rollbackTransaction(true);

            //$pdf->AddPage();
            $html = $this->load->view("pdf/admin_a6_pdf_view_table_header",$data,true);
            $pdf->writeHTML($html, true, false, true, false, '');

            $html = $this->load->view("pdf/pdf_ttd",$data,true);
            $pdf->writeHTML($html, true, false, true, false, '');

         }

         $pdf->Output($data['header']. $this->session->userdata("tahun") .'.pdf', 'I');
}
 

function excel($tahun) {


        $this->load->library('Excel');
        $this->excel->setActiveSheetIndex(0);
        $this->excel->getActiveSheet()->setTitle('Data Tanah Di   '. $this->desa2->bentuk_lembaga);

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
        $this->excel->getActiveSheet()->getColumnDimension('N')->setWidth(30);
        $this->excel->getActiveSheet()->getColumnDimension('O')->setWidth(30);
        $this->excel->getActiveSheet()->getColumnDimension('P')->setWidth(30);
        $this->excel->getActiveSheet()->getColumnDimension('Q')->setWidth(30);
        $this->excel->getActiveSheet()->getColumnDimension('R')->setWidth(30);
        $this->excel->getActiveSheet()->getColumnDimension('S')->setWidth(30);
        $this->excel->getActiveSheet()->getColumnDimension('T')->setWidth(30);
        $this->excel->getActiveSheet()->getColumnDimension('U')->setWidth(30);
        $this->excel->getActiveSheet()->getColumnDimension('V')->setWidth(30);
        $this->excel->getActiveSheet()->getColumnDimension('W')->setWidth(30);
        $this->excel->getActiveSheet()->getColumnDimension('x')->setWidth(30);
          


        $this->excel->getActiveSheet()->mergeCells('A1:x1');
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
        ->setCellValue('A' . $baris,"BUKU DATA TANAH DI   ". strtoupper($this->desa2->bentuk_lembaga) );
        $baris++;
        
        $this->excel->getActiveSheet()->mergeCells('A'.$baris.':x'.$baris);

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

 $this->excel->getActiveSheet()->mergeCells('A'.$baris.':x'.$baris);

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
        ->setCellValue('w5', "MODEL A.4 ");  


 
$this->excel->getActiveSheet()->mergeCells('A'.$baris.':A'.($baris+2));
$this->excel->getActiveSheet()->mergeCells('B'.$baris.':B'.($baris+2));
$this->excel->getActiveSheet()->mergeCells('C'.$baris.':C'.($baris+2));
 

$this->excel->getActiveSheet()->mergeCells('D'.$baris.':K'.$baris);
$this->excel->getActiveSheet()->mergeCells('L'.$baris.':x'.$baris);


$this->excel->getActiveSheet()->mergeCells('D'.($baris+1).':H'.($baris+1));
$this->excel->getActiveSheet()->mergeCells('I'.($baris+1).':K'.($baris+1));

$this->excel->getActiveSheet()->mergeCells('L'.($baris+1).':P'.($baris+1));
$this->excel->getActiveSheet()->mergeCells('Q'.($baris+1).':X'.($baris+1));


// $this->excel->getActiveSheet()->mergeCells('U'.$baris.':U'.($baris+2));
// $this->excel->getActiveSheet()->mergeCells('V'.$baris.':V'.($baris+2));
// $this->excel->getActiveSheet()->mergeCells('W'.$baris.':W'.($baris+2));

// $this->excel->getActiveSheet()->mergeCells('F'.($baris+1).':F'.($baris+2));
// $this->excel->getActiveSheet()->mergeCells('G'.($baris+1).':I'.($baris+1));
// $this->excel->getActiveSheet()->mergeCells('J'.($baris+1).':J'.($baris+2));
// $this->excel->getActiveSheet()->mergeCells('K'.($baris+1).':K'.($baris+2));

// $this->excel->getActiveSheet()->mergeCells('L'.$baris.':P'.$baris);
// $this->excel->getActiveSheet()->mergeCells('L'.($baris+1).':L'.($baris+2));
// $this->excel->getActiveSheet()->mergeCells('M'.($baris+1).':M'.($baris+2));
// $this->excel->getActiveSheet()->mergeCells('N'.($baris+1).':N'.($baris+2));
// $this->excel->getActiveSheet()->mergeCells('O'.($baris+1).':O'.($baris+2));
// $this->excel->getActiveSheet()->mergeCells('P'.($baris+1).':P'.($baris+2));

// $this->excel->getActiveSheet()->mergeCells('Q'.$baris.':R'.$baris);
// $this->excel->getActiveSheet()->mergeCells('Q'.($baris+1).':Q'.($baris+2));
// $this->excel->getActiveSheet()->mergeCells('R'.($baris+1).':R'.($baris+2));

// $this->excel->getActiveSheet()->mergeCells('S'.$baris.':T'.$baris);
// $this->excel->getActiveSheet()->mergeCells('S'.($baris+1).':S'.($baris+2));
// $this->excel->getActiveSheet()->mergeCells('T'.($baris+1).':T'.($baris+2));



$this->excel->getActiveSheet()
        ->setCellValue('A' . $baris, "NO.")
        ->setCellValue('B' . $baris, "NAMA PEMILIK ")
        ->setCellValue('C' . $baris, "LUAS")
        ->setCellValue('D' . $baris, "STATUS HAK TANAH (M<SUP>2</SUP>)")
        ->setCellValue('L' . $baris, "PENGGUNAAN  TANAH (M<SUP>2</SUP>)")
		->setCellValue('D' . ($baris+1), "SUDAH BERSERTIFIKAT ")
        ->setCellValue('I' . ($baris+1), "BELUM BERSERTIFIKAT ")
        ->setCellValue('L' . ($baris+1), "NON PERTANIAN  ")
        ->setCellValue('Q' . ($baris+1), "PERTANIAN  ")

		->setCellValue('D' . ($baris+2), "HM")
        ->setCellValue('E' . ($baris+2), "HGB")
        ->setCellValue('F' . ($baris+2), "HP")
        ->setCellValue('G' . ($baris+2), "HGU")
        ->setCellValue('H' . ($baris+2), "HPL")
        ->setCellValue('I' . ($baris+2), "MA")
        ->setCellValue('J' . ($baris+2), "VI")
        ->setCellValue('K' . ($baris+2), "TN")
        ->setCellValue('L' . ($baris+2), "PERUMAHAN")
        ->setCellValue('M' . ($baris+2), "PERDAGANGAN")
        ->setCellValue('N' . ($baris+2), "PERKANTORAN")
        ->setCellValue('O' . ($baris+2), "INDUSTRI")
        ->setCellValue('P' . ($baris+2), "FASILTAS UMUM ")
        ->setCellValue('Q' . ($baris+2), "SAWAH")
        ->setCellValue('R' . ($baris+2), "TEGALAN")
        ->setCellValue('S' . ($baris+2), "PERKEBUNAN")
        ->setCellValue('T' . ($baris+2), "PETERNAKAN/PERIKANAN")
        ->setCellValue('U' . ($baris+2), "HUTAN BELUKAR")
        ->setCellValue('V' . ($baris+2), "HUTAN LINDUNG")
        ->setCellValue('W' . ($baris+2), "TANAH KOSONG")
        ->setCellValue('X' . ($baris+2), "LAIN - LAIN")
       ;  
		
        
$arr_kolom = array('a','b','c','d','e','f','g','h','i','j','k','l','m','N','o','p','q','r','s','t','u','v','w','x');

$this->format(array("arr_kolom"=>$arr_kolom, "baris" => $baris, "bold"=>true, "align"=>"center"));
//$this->format_header($arr_kolom,$baris);
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
        ->setCellValue('W' . $baris, "24");      
        
 
$this->format(array("arr_kolom"=>$arr_kolom, "baris" => $baris, "bold"=>true, "align"=>"center"));
$baris++;


$record = $this->dm->get_data_per_tahun($tahun) ;
$n=0;
foreach($record->result() as $data) : 
    $n++;
    $this->excel->getActiveSheet()
        ->setCellValue('A' . $baris, $n)
        ->setCellValue('B' . $baris, $data->nama_pemilik)
        ->setCellValue('C' . $baris, $data->luas)
        ->setCellValue('D' . $baris, $data->luas_sertifikat_hm)
		->setCellValue('E' . $baris, $data->luas_sertifikat_hgb)
		->setCellValue('F' . $baris, $data->luas_sertifikat_hp)
		->setCellValue('G' . $baris, $data->luas_sertifikat_hgu)
		->setCellValue('H' . $baris, $data->luas_sertifikat_hpl)
		->setCellValue('I' . $baris, $data->luas_sertifikat_ma)
		->setCellValue('J' . $baris, $data->luas_sertifikat_vi  )
		->setCellValue('K' . $baris, $data->luas_sertifikat_tn)
		->setCellValue('L' . $baris, $data->non_pertanian_perumahan)
		->setCellValue('M' . $baris, $data->non_pertanian_perdagangan)
		->setCellValue('N' . $baris, $data->non_pertanian_perkantoran)
		->setCellValue('O' . $baris, $data->non_pertanian_industri)
		->setCellValue('P' . $baris, $data->non_pertanian_fasilitas_umum)
		->setCellValue('Q' . $baris, $data->pertanian_sawah)
		->setCellValue('R' . $baris, $data->pertanian_tegalan)
		->setCellValue('S' . $baris, $data->pertanian_perkebunan)
		->setCellValue('T' . $baris, $data->pertanian_peternakan)
		->setCellValue('U' . $baris, $data->pertanian_hutan)
		->setCellValue('V' . $baris, $data->pertanian_hutan_lindung)
		->setCellValue('W' . $baris, $data->pertanian_tanah_kosong)
        ->setCellValue('x' . $baris, $data->pertanian_lain)
        ;
        
         $this->format(array("arr_kolom"=>array('a','b'), "baris" => $baris, "bold"=>false));
         $this->format_center_line( array('b','c','d','e','f','g','h','i','j',
            'k','l','m','n','o','p','q','r','s','t','u','v','w','x') ,$baris);
        $baris++;
endforeach;

$baris+=3;
 $this->excel->getActiveSheet()         
        ->setCellValue('B' . $baris, "MENGETAHUI")
        ->setCellValue('w' . $baris, strtoupper($this->desa2->desa).", ".date("d-m-Y"));
 $baris++;
$this->excel->getActiveSheet()         
        ->setCellValue('B' . $baris, "KEPALA ".strtoupper($this->desa2->bentuk_lembaga. " ".$this->desa2->desa) )
        ->setCellValue('w' . $baris, "SEKTERTARIS");
 $baris++;

$this->excel->getActiveSheet()         
        //->setCellValue('B' . $baris, strtoupper($this->desa2->bentuk_lembaga. " ".$this->desa2->desa) )
        ->setCellValue('w' . $baris, "");
 $baris+=3;  

$this->excel->getActiveSheet()         
        ->setCellValue('B' . $baris, $this->desa2->nama_kepala_desa )
        ->setCellValue('w' . $baris, $this->desa2->nama_sek_desa);
 $baris++;
$this->excel->getActiveSheet()
->setCellValue('w' . $baris, "NIP : " . $this->desa2->nip_sek_desa);

$baris++;
$this->excel->getActiveSheet()
->setCellValue('w' . $baris, "Pangkat  : " . $this->desa2->pangkat_sek_desa);
//$this->format(array("arr_kolom"=>$arr_kolom,"bold"=>true,"baris"=>$baris,"align"=>"center"));



        $filename = "DATA TANAH DI  ".strtoupper($this->desa2->bentuk_lembaga).".xls";

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