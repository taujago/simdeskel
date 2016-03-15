<?php 
class admin_a5 extends op_controller {
    var $desa2;
	function __construct(){
		parent::__construct();
		$this->load->model("core_model","cm");
		$this->load->model("a5m","dm");
        $this->load->model("add_model","am");
		$this->load->helper("tanggal");
        $this->desa2 = $this->cm->data_desa();
	}


	function index(){
		$data['controller'] = get_class($this);
        $data['desa2'] = $this->cm->data_desa();
        $desa2 = $this->cm->data_desa();
		$data['header'] = "DATA TANAH MILIK    " . strtoupper($desa2->bentuk_lembaga ). " / TANAH KAS ".strtoupper($desa2->bentuk_lembaga ) ;
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
            $responce->rows[$i]['asal_tanah']    			 = $result[$i]['asal_tanah'] ;             
            $responce->rows[$i]['nomor_sertifikat']           = $result[$i]['nomor_sertifikat'] ;
            $responce->rows[$i]['luas']           = $result[$i]['luas'] ;
            $responce->rows[$i]['kelas_tanah']           = $result[$i]['kelas_tanah'] ;
 
            $responce->rows[$i]['luas_biaya_desa']           = $result[$i]['luas_biaya_desa'] ;
            $responce->rows[$i]['luas_biaya_pemerintah']           =  $result[$i]['luas_biaya_pemerintah'] ;
            $responce->rows[$i]['luas_biaya_pemprov']           =  $result[$i]['luas_biaya_pemprov'] ;
            $responce->rows[$i]['luas_biaya_pemkab']           =  $result[$i]['luas_biaya_pemkab'] ;
            $responce->rows[$i]['luas_biaya_lainnya']           =  $result[$i]['luas_biaya_lainnya'] ;
            $responce->rows[$i]['tanggal_perolehan']           =  flipdate($result[$i]['tanggal_perolehan']) ;
            $responce->rows[$i]['jenis_sawah']     =  $result[$i]['jenis_sawah'] ;
            
			$responce->rows[$i]['jenis_tegalan']    = $result[$i]['jenis_tegalan'] ;
			$responce->rows[$i]['jenis_kebun']   =  $result[$i]['jenis_kebun'] ;
			
			$responce->rows[$i]['jenis_kolam']    = $result[$i]['jenis_kolam'] ;
			$responce->rows[$i]['jenis_tanah_kering']   =  $result[$i]['jenis_tanah_kering'] ;
            $responce->rows[$i]['tanda_ada']   =  $result[$i]['tanda_ada'] ;
            $responce->rows[$i]['tanda_tidak_ada']   =  $result[$i]['tanda_tidak_ada'] ;
            $responce->rows[$i]['papan_nama_ada']   =  $result[$i]['papan_nama_ada'] ;
            $responce->rows[$i]['papan_nama_tidak_ada']   =  $result[$i]['papan_nama_tidak_ada'] ;
			$responce->rows[$i]['lokasi']           = $result[$i]['lokasi'] ;
            $responce->rows[$i]['peruntukan']           = $result[$i]['peruntukan'] ;
            $responce->rows[$i]['keterangan']           = $result[$i]['keterangan'] ;

             
             
             

        } }
		//echo "<hr />";
        echo json_encode($responce); 
    }

    function save(){
        $data = $this->input->post();
        $this->load->library('form_validation');
        $this->form_validation->set_rules('asal_tanah','Asal Tanah ','required');    
        $this->form_validation->set_rules('luas','Luas ','required|numeric');        
 		$this->form_validation->set_rules('luas_biaya_desa','Luas Tanah Biaya Desa ','numeric');  
		$this->form_validation->set_rules('luas_biaya_pemerintah','Luas Tanah Bantuan Pemerintah ','numeric');  
		$this->form_validation->set_rules('luas_biaya_pemprov','Luas Tanah Bantuan Pemerintah Provinsi','numeric'); 
        $this->form_validation->set_rules('luas_biaya_pemkab','Luas Tanah Bantuan Pemerintah Kabupaten ','numeric'); 
        $this->form_validation->set_rules('luas_biaya_lainnya','Luas Tanah Bantuan Lainnya','numeric'); 
        $this->form_validation->set_rules('jenis_sawah','Luas Tanah Jenis Sawah','numeric');
        $this->form_validation->set_rules('jenis_tegalan','Luas Tanah Jenis Tegalan','numeric');
        $this->form_validation->set_rules('jenis_kebun','Luas Tanah Jenis Kebun','numeric');
        $this->form_validation->set_rules('jenis_kolam','Luas Tanah Jenis Kolam','numeric');
        $this->form_validation->set_rules('jenis_tanah_kering','Luas Tanah Jenis Tanah Kering','numeric');
        $this->form_validation->set_rules('tanda_ada','Luas Tanah Ada Patok Batas','numeric');
        $this->form_validation->set_rules('tanda_tidak_ada','Luas Tanah  Tidak Ada Patok Batas','numeric');
        $this->form_validation->set_rules('papan_nama_ada','Luas Tanah Ada Papan Nama','numeric');
        $this->form_validation->set_rules('papan_nama_tidak_ada','Luas Tanah Tidak Ada Papan Nama','numeric');
        $this->form_validation->set_rules('lokasi','Lokasi','required');

       

        $this->form_validation->set_message('required', ' %s Harus diisi '); 
        $this->form_validation->set_message('numeric', ' %s Harus diisi dengan angka ');
        $this->form_validation->set_message('alpha', ' %s Harus diisi dengan huruf ');
        
        
        $this->form_validation->set_error_delimiters("* ", '<br>');
        if($this->form_validation->run() == TRUE) {

                 

               
				 
                $data['tanggal_perolehan'] = flipdate($data['tanggal_perolehan']);
                $data['id_desa'] = $this->desa2->id_desa;
                $res = $this->db->insert("admin_a5",$data);

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
         $this->form_validation->set_rules('asal_tanah','Asal Tanah ','required');    
        $this->form_validation->set_rules('luas','Luas ','required|numeric');        
        $this->form_validation->set_rules('luas_biaya_desa','Luas Tanah Biaya Desa ','numeric');  
        $this->form_validation->set_rules('luas_biaya_pemerintah','Luas Tanah Bantuan Pemerintah ','numeric');  
        $this->form_validation->set_rules('luas_biaya_pemprov','Luas Tanah Bantuan Pemerintah Provinsi','numeric'); 
        $this->form_validation->set_rules('luas_biaya_pemkab','Luas Tanah Bantuan Pemerintah Kabupaten ','numeric'); 
        $this->form_validation->set_rules('luas_biaya_lainnya','Luas Tanah Bantuan Lainnya','numeric'); 
        $this->form_validation->set_rules('jenis_sawah','Luas Tanah Jenis Sawah','numeric');
        $this->form_validation->set_rules('jenis_tegalan','Luas Tanah Jenis Tegalan','numeric');
        $this->form_validation->set_rules('jenis_kebun','Luas Tanah Jenis Kebun','numeric');
        $this->form_validation->set_rules('jenis_kolam','Luas Tanah Jenis Kolam','numeric');
        $this->form_validation->set_rules('jenis_tanah_kering','Luas Tanah Jenis Tanah Kering','numeric');
        $this->form_validation->set_rules('tanda_ada','Luas Tanah Ada Patok Batas','numeric');
        $this->form_validation->set_rules('tanda_tidak_ada','Luas Tanah  Tidak Ada Patok Batas','numeric');
        $this->form_validation->set_rules('papan_nama_ada','Luas Tanah Ada Papan Nama','numeric');
        $this->form_validation->set_rules('papan_nama_tidak_ada','Luas Tanah Tidak Ada Papan Nama','numeric');
        $this->form_validation->set_rules('lokasi','Lokasi','required');
		 

        $this->form_validation->set_message('required', ' %s Harus diisi '); 
        $this->form_validation->set_message('numeric', ' %s Harus diisi dengan angka ');
        $this->form_validation->set_message('alpha', ' %s Harus diisi dengan huruf ');
        
        
        $this->form_validation->set_error_delimiters("* ", '<br>');
        if($this->form_validation->run() == TRUE) {

               

               $data['tanggal_perolehan'] = flipdate($data['tanggal_perolehan']);
             
                 

                $this->db->where("id",$data['id']);
                $res = $this->db->update("admin_a5",$data);

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
        $this->db->update("admin_a5",array("deleted"=>1));
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


         $html = $this->load->view("pdf/admin_a5_pdf_view",$data,true);
         $pdf->writeHTML($html, true, false, true, false, '');



         $halaman  = $pdf->getPage();
         $pdf->startTransaction();
         $y = $pdf->getY();
      
         $html = $this->load->view("pdf/pdf_ttd",$data,true);
         $pdf->writeHTML($html, true, false, true, false, '');
       

         if($halaman <> $pdf->getPage() ) {
            $pdf->rollbackTransaction(true);

            $pdf->AddPage();
            $html = $this->load->view("pdf/admin_a5_pdf_view_table_header",$data,true);
            $pdf->writeHTML($html, true, false, true, false, '');

            $html = $this->load->view("pdf/pdf_ttd",$data,true);
            $pdf->writeHTML($html, true, false, true, false, '');

         }

         else if( $y < 20 ) {
            $pdf->rollbackTransaction(true);

            //$pdf->AddPage();
            $html = $this->load->view("pdf/admin_a5_pdf_view_table_header",$data,true);
            $pdf->writeHTML($html, true, false, true, false, '');

            $html = $this->load->view("pdf/pdf_ttd",$data,true);
            $pdf->writeHTML($html, true, false, true, false, '');

         }

         $pdf->Output($data['header']. $this->session->userdata("tahun") .'.pdf', 'I');
}
 
function excel($tahun) {


        $this->load->library('Excel');
        $this->excel->setActiveSheetIndex(0);
        $this->excel->getActiveSheet()->setTitle('Data Tanah Milik   '. $this->desa2->bentuk_lembaga);

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
          


        $this->excel->getActiveSheet()->mergeCells('A1:W1');
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
        ->setCellValue('A' . $baris,"BUKU DATA TANAH MILIK   ". strtoupper($this->desa2->bentuk_lembaga). " / TANAH KAS ". strtoupper($this->desa2->bentuk_lembaga));
        $baris++;
        
        $this->excel->getActiveSheet()->mergeCells('A'.$baris.':W'.$baris);

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

 $this->excel->getActiveSheet()->mergeCells('A'.$baris.':W'.$baris);

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
        ->setCellValue('U5', "MODEL A.4 ");  


 
$this->excel->getActiveSheet()->mergeCells('A'.$baris.':A'.($baris+2));
$this->excel->getActiveSheet()->mergeCells('B'.$baris.':B'.($baris+2));
$this->excel->getActiveSheet()->mergeCells('C'.$baris.':C'.($baris+2));
$this->excel->getActiveSheet()->mergeCells('D'.$baris.':D'.($baris+2));
$this->excel->getActiveSheet()->mergeCells('E'.$baris.':E'.($baris+2));

$this->excel->getActiveSheet()->mergeCells('F'.$baris.':K'.$baris);
$this->excel->getActiveSheet()->mergeCells('L'.$baris.':P'.$baris);
$this->excel->getActiveSheet()->mergeCells('Q'.$baris.':R'.$baris);
$this->excel->getActiveSheet()->mergeCells('S'.$baris.':T'.$baris);

$this->excel->getActiveSheet()->mergeCells('U'.$baris.':U'.($baris+2));
$this->excel->getActiveSheet()->mergeCells('V'.$baris.':V'.($baris+2));
$this->excel->getActiveSheet()->mergeCells('W'.$baris.':W'.($baris+2));

$this->excel->getActiveSheet()->mergeCells('F'.($baris+1).':F'.($baris+2));
$this->excel->getActiveSheet()->mergeCells('G'.($baris+1).':I'.($baris+1));
$this->excel->getActiveSheet()->mergeCells('J'.($baris+1).':J'.($baris+2));
$this->excel->getActiveSheet()->mergeCells('K'.($baris+1).':K'.($baris+2));

$this->excel->getActiveSheet()->mergeCells('L'.$baris.':P'.$baris);
$this->excel->getActiveSheet()->mergeCells('L'.($baris+1).':L'.($baris+2));
$this->excel->getActiveSheet()->mergeCells('M'.($baris+1).':M'.($baris+2));
$this->excel->getActiveSheet()->mergeCells('N'.($baris+1).':N'.($baris+2));
$this->excel->getActiveSheet()->mergeCells('O'.($baris+1).':O'.($baris+2));
$this->excel->getActiveSheet()->mergeCells('P'.($baris+1).':P'.($baris+2));

$this->excel->getActiveSheet()->mergeCells('Q'.$baris.':R'.$baris);
$this->excel->getActiveSheet()->mergeCells('Q'.($baris+1).':Q'.($baris+2));
$this->excel->getActiveSheet()->mergeCells('R'.($baris+1).':R'.($baris+2));

$this->excel->getActiveSheet()->mergeCells('S'.$baris.':T'.$baris);
$this->excel->getActiveSheet()->mergeCells('S'.($baris+1).':S'.($baris+2));
$this->excel->getActiveSheet()->mergeCells('T'.($baris+1).':T'.($baris+2));



$this->excel->getActiveSheet()
        ->setCellValue('A' . $baris, "NO.")
        ->setCellValue('B' . $baris, "ASAL TANAH MILIK DESA \nTANAH KAS DESA")
        ->setCellValue('C' . $baris, "NOMOR SERTIFIKAT/ \nBUKU LETTER C/PERSIL")
        ->setCellValue('D' . $baris, "LUAS TANAH (Ha)")
		->setCellValue('E' . $baris, "KELAS")
		->setCellValue('f' . $baris, "PEROLEHAN TKD")
        ->setCellValue('L' . $baris, "JENIS TKD ")
		->setCellValue('Q' . $baris, "PATOK TANDA BATAS ")
		->setCellValue('S' . $baris, "PAPAN NAMA")
		->setCellValue('U' . $baris, "LOKASI")
		->setCellValue('V' . $baris, "PERUNTUKAN")
		->setCellValue('W' . $baris, "KETERANGAN")
		->setCellValue('F' . ($baris+1), "ASLI MILIK DESA")
		->setCellValue('G' . ($baris+1), "BANTUAN")
		->setCellValue('G' . ($baris+2), "PEMERINTAH")
		->setCellValue('H' . ($baris+2), "PROV")
		->setCellValue('I' . ($baris+2), "KAB/KOTA")
		->setCellValue('J' . ($baris+1), "LAIN-LAIN")
		->setCellValue('K' . ($baris+1), "TGL PEROLEHAN")
		->setCellValue('L' . ($baris+1), "SAWAH")
		->setCellValue('M' . ($baris+1), "TEGALAN")
		->setCellValue('N' . ($baris+1), "KEBUN")
		->setCellValue('O' . ($baris+1), "TAMBAK/KOLAM")
		->setCellValue('P' . ($baris+1), "TANAH KERING/DARAT")
		->setCellValue('Q' . ($baris+1), "ADA")
		->setCellValue('R' . ($baris+1), "TIDAK ADA")
		->setCellValue('S' . ($baris+1), "ADA")
		->setCellValue('T' . ($baris+1), "TIDAK ADA");  
		
        
$arr_kolom = array('a','b','c','d','e','f','g','h','i','j','k','l','m','N','o','p','q','r','s','t','u','v','w');

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
		->setCellValue('W' . $baris, "23");      
        
 
$this->format(array("arr_kolom"=>$arr_kolom, "baris" => $baris, "bold"=>true, "align"=>"center"));
$baris++;


$record = $this->dm->get_data_per_tahun($tahun) ;
$n=0;
foreach($record->result() as $data) : 
    $n++;
    $this->excel->getActiveSheet()
        ->setCellValue('A' . $baris, $n)
        ->setCellValue('B' . $baris, $data->asal_tanah)
        ->setCellValue('C' . $baris, $data->nomor_sertifikat)
        ->setCellValue('D' . $baris, $data->luas)
		->setCellValue('E' . $baris, $data->kelas_tanah)
		->setCellValue('F' . $baris, $data->luas_biaya_desa)
		->setCellValue('G' . $baris, $data->luas_biaya_pemerintah)
		->setCellValue('H' . $baris, $data->luas_biaya_pemprov)
		->setCellValue('I' . $baris, $data->luas_biaya_pemkab)
		->setCellValue('J' . $baris, $data->luas_biaya_lainnya  )
		->setCellValue('K' . $baris, flipdate($data->tanggal_perolehan))
		->setCellValue('L' . $baris, $data->jenis_sawah)
		->setCellValue('M' . $baris, $data->jenis_tegalan)
		->setCellValue('N' . $baris, $data->jenis_kebun)
		->setCellValue('O' . $baris, $data->jenis_kolam)
		->setCellValue('P' . $baris, $data->jenis_tanah_kering)
		->setCellValue('Q' . $baris, $data->tanda_ada)
		->setCellValue('R' . $baris, $data->tanda_tidak_ada)
		->setCellValue('S' . $baris, $data->papan_nama_ada)
		->setCellValue('T' . $baris, $data->papan_nama_tidak_ada)
		->setCellValue('U' . $baris, $data->lokasi)
		->setCellValue('V' . $baris, $data->peruntukan)
		->setCellValue('W' . $baris, $data->keterangan);
        
         $this->format(array("arr_kolom"=>$arr_kolom, "baris" => $baris, "bold"=>false));
        
         $this->format_center_line( array('d','e','f','g','h','i','j','k',
            'l','m','n','o','p','q','r','s','t') ,$baris);
        $this->format(array("arr_kolom"=>array('a','b','n','u','v','w'), "baris" => $baris, "bold"=>false));
        

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



        $filename = "DATA TANAH MILIK  ".strtoupper($this->desa2->bentuk_lembaga).".xls";

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