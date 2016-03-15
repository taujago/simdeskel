<?php 
class lembaga_tanah_desa extends op_controller {
    var $desa2;
	function __construct(){
		parent::__construct();
		$this->load->model("core_model","cm");
		$this->load->model("tddm","dm");
        $this->load->model("add_model","am");
		$this->load->helper("tanggal");
        $this->desa2 = $this->cm->data_desa();
	}


	function index(){
		$data['controller'] = get_class($this);
        $desa2 = $this->cm->data_desa();
		$data['header'] = "Data Tanah di " . $desa2->bentuk_lembaga;
		$content = $this->load->view($data['controller']."_view",$data,true);
		$this->set_title($data['header']);
		$this->set_content($content);
		$this->render();
	}

	function get_data(){
    	$page = $_REQUEST['page']; // get the requested page 
        $limit = $_REQUEST['rows']; // get how many rows we want to have into the grid 
        $sidx = isset($_REQUEST['sort'])?$_REQUEST['sort']:"nama"; // get index row - i.e. user click to sort 
        $sord = isset($_REQUEST['order'])?$_REQUEST['order']:"desc"; // get the direction if(!$sidx) $sidx =1;  
        $asal = isset($_REQUEST['search_asal'])?$_REQUEST['search_asal']:"x";
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
                "asal"  => $asal,
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
        $arr_status_tanah = $this->dm->arr_status_tanah;
		$arr_penggunaan =  $this->dm->arr_penggunaan;
		$arr_ya_tidak =  $this->dm->arr_ya_tidak;
        for($i=0; $i<count($result); $i++){
        	$x++;
            //$responce->rows[$i]['id']=$result[$i]['id_provinsi'];
            // data berikut harus sesuai dengan kolom-kolom yang ingin ditampilkan di view (js)
            $responce->rows[$i]['id']			        = $result[$i]['id'] ;
			$responce->rows[$i]['id_penduduk']                 = $result[$i]['id_penduduk'] ;
			$responce->rows[$i]['nama']                 = $result[$i]['nama'] ;
             $responce->rows[$i]['badan_hukum']                 = $result[$i]['badan_hukum'] ;
             $responce->rows[$i]['luas']                 = $result[$i]['luas'] ;
            $responce->rows[$i]['status_tanah']                = $result[$i]['status_tanah'] ;
			$responce->rows[$i]['status_tanah2']                = $arr_status_tanah[$result[$i]['status_tanah']] ;
			
            $responce->rows[$i]['sertifikat']               = $result[$i]['sertifikat'] ;
            $responce->rows[$i]['sertifikat2']               = $arr_ya_tidak[$result[$i]['sertifikat']] ;
			
			$responce->rows[$i]['penggunaan']                  = $result[$i]['penggunaan'] ;
			$responce->rows[$i]['penggunaan2']                  = $arr_penggunaan[$result[$i]['penggunaan']] ;
			
            $responce->rows[$i]['keterangan']         = $result[$i]['keterangan'] ;
             
 
             
             
             

        } }
		//echo "<hr />";
        echo json_encode($responce); 
    }

    function save(){
        $data = $this->input->post();
        $this->load->library('form_validation');
        $this->form_validation->set_rules('asal','Asal tanah ','required');    
        $this->form_validation->set_rules('no_sertifikat','No. Sertifikat ','required');              
        $this->form_validation->set_rules('luas','Luas ','numeric');              
        $this->form_validation->set_rules('tanggal','Tanggal ','required');    
        $this->form_validation->set_rules('tkd_id','TKD diperoleh dari  ','required');              
        $this->form_validation->set_rules('tkd_id_jenis','Jenis TKD  ','required');              
                     

        $this->form_validation->set_message('required', ' %s Harus diisi '); 
        $this->form_validation->set_message('numeric', ' %s Harus diisi dengan angka ');
        $this->form_validation->set_message('alpha', ' %s Harus diisi dengan huruf ');
        
        
        $this->form_validation->set_error_delimiters("* ", '<br>');
        if($this->form_validation->run() == TRUE) {

                $data['id'] = md5(date("Ymdhis"));       

                $data['tanggal'] = flipdate($data['tanggal']);
                $data['tkd_tgl'] = flipdate($data['tkd_tgl']);
 

                $data['id_desa'] = $this->desa2->id_desa;
                $res = $this->db->insert("profil_tanah",$data);

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
        $this->form_validation->set_rules('asal','Asal tanah ','required');    
        $this->form_validation->set_rules('no_sertifikat','No. Sertifikat ','required');              
        $this->form_validation->set_rules('luas','Luas ','numeric');              
        $this->form_validation->set_rules('tanggal','Tanggal ','required');    
        $this->form_validation->set_rules('tkd_id','TKD diperoleh dari  ','required');              
        $this->form_validation->set_rules('tkd_id_jenis','Jenis TKD  ','required');              
                     

        $this->form_validation->set_message('required', ' %s Harus diisi '); 
        $this->form_validation->set_message('numeric', ' %s Harus diisi dengan angka ');
        $this->form_validation->set_message('alpha', ' %s Harus diisi dengan huruf ');
        
        
        $this->form_validation->set_error_delimiters("* ", '<br>');
        if($this->form_validation->run() == TRUE) {

               

                 $data['tanggal'] = flipdate($data['tanggal']);
                $data['tkd_tgl'] = flipdate($data['tkd_tgl']);


                $this->db->where("id",$data['id']);
                $res = $this->db->update("profil_tanah",$data);

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
        $this->db->update("profil_tanah",array("deleted"=>1));
    }
    echo json_encode(array("success"=>true,"pesan"=>"Berhasil dihapus"));
}

 
function cetak($tahun) {
     
    $data['controller'] = get_class($this);

   
    $data['record'] = $this->dm->get_data_per_tahun($tahun);
    $data['tahun'] = $tahun;
    $data['header'] = "DATA TANAH MILIK  ".$this->desa2->bentuk_lembaga;
    $data['title'] = $data['header'];
    $this->load->view($data['controller']."_print_view",$data);
   // $this->set_title($data['header']);
    //$this->set_content($content);
    //$this->render();
}
 
function excel($tahun) {

        $desa2 = $this->cm->data_desa();

        $this->load->library('Excel');
        $this->excel->setActiveSheetIndex(0);
        $this->excel->getActiveSheet()->setTitle('Data tanah '. $this->desa2->desa);

        $this->excel->getActiveSheet()->getColumnDimension('A')->setWidth(5);
        $this->excel->getActiveSheet()->getColumnDimension('B')->setWidth(30);
        $this->excel->getActiveSheet()->getColumnDimension('C')->setWidth(30);
        $this->excel->getActiveSheet()->getColumnDimension('D')->setWidth(30);
        $this->excel->getActiveSheet()->getColumnDimension('E')->setWidth(20);
        $this->excel->getActiveSheet()->getColumnDimension('F')->setWidth(20);
        $this->excel->getActiveSheet()->getColumnDimension('G')->setWidth(20);
        $this->excel->getActiveSheet()->getColumnDimension('h')->setWidth(20);
        $this->excel->getActiveSheet()->getColumnDimension('i')->setWidth(20);
        $this->excel->getActiveSheet()->getColumnDimension('j')->setWidth(20);
        $this->excel->getActiveSheet()->getColumnDimension('k')->setWidth(20);
        $this->excel->getActiveSheet()->getColumnDimension('l')->setWidth(20);
        $this->excel->getActiveSheet()->getColumnDimension('m')->setWidth(20);
        $this->excel->getActiveSheet()->getColumnDimension('n')->setWidth(20);
        $this->excel->getActiveSheet()->getColumnDimension('o')->setWidth(20);
        $this->excel->getActiveSheet()->getColumnDimension('p')->setWidth(20);
        $this->excel->getActiveSheet()->getColumnDimension('q')->setWidth(20);
        $this->excel->getActiveSheet()->getColumnDimension('r')->setWidth(20);
        $this->excel->getActiveSheet()->getColumnDimension('s')->setWidth(20);
        $this->excel->getActiveSheet()->getColumnDimension('t')->setWidth(30);
        $this->excel->getActiveSheet()->getColumnDimension('u')->setWidth(30);
        
        
         


        $this->excel->getActiveSheet()->mergeCells('A1:u1');
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
        ->setCellValue('A' . $baris,"BUKU DATA TANAH MILIK  ". strtoupper($this->desa2->bentuk_lembaga). " / TANAH KHAS ". strtoupper($this->desa2->bentuk_lembaga));
        $baris++;
        
        $this->excel->getActiveSheet()->mergeCells('A'.$baris.':U'.$baris);

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

 $this->excel->getActiveSheet()->mergeCells('A'.$baris.':U'.$baris);

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
 


$this->excel->getActiveSheet()->mergeCells('A'.$baris.':A'.($baris+2));
$this->excel->getActiveSheet()
        ->setCellValue('A' . $baris, "NO.");

$this->excel->getActiveSheet()->mergeCells('B'.$baris.':B'.($baris+2));
$this->excel->getActiveSheet()
        ->setCellValue('B' . $baris, "ASAL TANAH MILIK $desa2->bentuk_lembaga / TANAH KAS $desa2->bentuk_lembaga");

$this->excel->getActiveSheet()->mergeCells('c'.$baris.':c'.($baris+2));
$this->excel->getActiveSheet()
        ->setCellValue('C' . $baris, "NO. SERTIFIKAT / BUKU LETTER C");

$this->excel->getActiveSheet()->mergeCells('D'.$baris.':D'.($baris+2));
$this->excel->getActiveSheet()
        ->setCellValue('D' . $baris, "LUAS (HA)");

$this->excel->getActiveSheet()->mergeCells('e'.$baris.':e'.($baris+2));
$this->excel->getActiveSheet()
        ->setCellValue('e' . $baris, "KELAS ");

$this->excel->getActiveSheet()->mergeCells('F'.$baris.':J'.$baris);
$this->excel->getActiveSheet()
        ->setCellValue('F' . $baris, "PEROLEHAN TKD ");

$this->excel->getActiveSheet()->mergeCells('k'.$baris.':o'.$baris);
$this->excel->getActiveSheet()
        ->setCellValue('k' . $baris, "JENIS TKD ");

$this->excel->getActiveSheet()->mergeCells('P'.$baris.':Q'.$baris);
$this->excel->getActiveSheet()
        ->setCellValue('P' . $baris, "PATOK TANDA BATAS ");

$this->excel->getActiveSheet()->mergeCells('R'.$baris.':s'.$baris);
$this->excel->getActiveSheet()
        ->setCellValue('R' . $baris, "PAPAN NAMA");

$this->excel->getActiveSheet()->mergeCells('t'.$baris.':t'.($baris+2));
$this->excel->getActiveSheet()
        ->setCellValue('t' . $baris, "LOKASI");

$this->excel->getActiveSheet()->mergeCells('u'.$baris.':u'.($baris+2));
$this->excel->getActiveSheet()
        ->setCellValue('u' . $baris, "PERUNTUKAN");

$arr_kolom = array('a','b','c','d','e','f','g','h','i','j','k','l','m','n','o','p','q','r','s','t','u');
$this->format_header($arr_kolom,$baris);
$baris++;


$this->excel->getActiveSheet()->mergeCells('f'.$baris.':f'.($baris+1));
$this->excel->getActiveSheet()
        ->setCellValue('f' . $baris, strtoupper("ASLI MILIK  $desa2->bentuk_lembaga") );

$this->excel->getActiveSheet()->mergeCells('g'.$baris.':i'.$baris);
$this->excel->getActiveSheet()
        ->setCellValue('g' . $baris, "BANTUAN" );

$this->excel->getActiveSheet()->mergeCells('J'.$baris.':J'.($baris+1));
$this->excel->getActiveSheet()
        ->setCellValue('J' . $baris, "LAIN - LAIN" );  

$this->excel->getActiveSheet()->mergeCells('K'.$baris.':K'.($baris+1));
$this->excel->getActiveSheet()
        ->setCellValue('K' . $baris, "SAWAH " );  

$this->excel->getActiveSheet()->mergeCells('L'.$baris.':L'.($baris+1));
$this->excel->getActiveSheet()
        ->setCellValue('L' . $baris, "TEGAL " );  

$this->excel->getActiveSheet()->mergeCells('M'.$baris.':M'.($baris+1));
$this->excel->getActiveSheet()
        ->setCellValue('M' . $baris, "KEBUN " );  

$this->excel->getActiveSheet()->mergeCells('N'.$baris.':N'.($baris+1));
$this->excel->getActiveSheet()
        ->setCellValue('N' . $baris, "TAMBAK " );  

$this->excel->getActiveSheet()->mergeCells('O'.$baris.':O'.($baris+1));
$this->excel->getActiveSheet()
        ->setCellValue('O' . $baris, "TANAH " );  


$this->excel->getActiveSheet()->mergeCells('P'.$baris.':P'.($baris+1));
$this->excel->getActiveSheet()
        ->setCellValue('P' . $baris, "ADA " );  

$this->excel->getActiveSheet()->mergeCells('Q'.$baris.':Q'.($baris+1));
$this->excel->getActiveSheet()
        ->setCellValue('Q' . $baris, "TIDAK ADA " ); 

$this->excel->getActiveSheet()->mergeCells('R'.$baris.':R'.($baris+1));
$this->excel->getActiveSheet()
        ->setCellValue('R' . $baris, "ADA " );  

$this->excel->getActiveSheet()->mergeCells('S'.$baris.':S'.($baris+1));
$this->excel->getActiveSheet()
        ->setCellValue('S' . $baris, "TIDAK ADA " ); 

$this->format_header($arr_kolom,$baris);
$baris++;

$this->excel->getActiveSheet()
        ->setCellValue('g' . $baris, "PEMERINTAH " )
        ->setCellValue('h' . $baris, "PROVINSI " )
        ->setCellValue('I' . $baris, "KAB/KOTA " )
        ;  
$this->format_header($arr_kolom,$baris);
$baris++;
 


$this->excel->getActiveSheet()
        ->setCellValue('A' . $baris, "1")
        ->setCellValue('B' . $baris, "2")
        ->setCellValue('C' . $baris, "3")
        ->setCellValue('D' . $baris, "4")
        ->setCellValue('E' . $baris, "5")
        ->setCellValue('F' . $baris, "6")
        ->setCellValue('g' . $baris, "7")
        ->setCellValue('h' . $baris, "8")
        ->setCellValue('i' . $baris, "9")
        ->setCellValue('j' . $baris, "10")
        ->setCellValue('k' . $baris, "11")
        ->setCellValue('l' . $baris, "12")
        ->setCellValue('m' . $baris, "13")
        ->setCellValue('n' . $baris, "14")
        ->setCellValue('o' . $baris, "15")
        ->setCellValue('p' . $baris, "16")
        ->setCellValue('q' . $baris, "17")
        ->setCellValue('r' . $baris, "18")
        ->setCellValue('s' . $baris, "19")
        ->setCellValue('t' . $baris, "20")
        ->setCellValue('u' . $baris, "21")
        ;      
        
$this->format_header($arr_kolom,$baris);
$baris++;

 
$record = $this->dm->get_data_per_tahun($tahun) ;
$n=0;
foreach($record->result() as $row) : 
    $n++;
 
    $this->excel->getActiveSheet()
        ->setCellValue('A' . $baris, $n)
        ->setCellValue('B' . $baris, $row->asal)
        ->setCellValue('C' . $baris, $row->no_sertifikat)
        ->setCellValue('D' . $baris, $row->luas)
        ->setCellValue('e' . $baris, $row->kelas)
        ->setCellValue('f' . $baris, $row->asli)
        ->setCellValue('g' . $baris, $row->pemerintah)
        ->setCellValue('h' . $baris, $row->provinsi)
        ->setCellValue('i' . $baris, $row->kota)
        ->setCellValue('j' . $baris, $row->lain) 
        ->setCellValue('k' . $baris, $row->sawah)
        ->setCellValue('l' . $baris, $row->tegal)
        ->setCellValue('m' . $baris, $row->kebun)
        ->setCellValue('n' . $baris, $row->tambak)   
        ->setCellValue('o' . $baris, $row->tanah)
        ->setCellValue('p' . $baris, $row->patok_ada) 
        ->setCellValue('q' . $baris, $row->patok_tidak_ada)
        ->setCellValue('r' . $baris, $row->papan_nama_ada)
        ->setCellValue('s' . $baris, $row->papan_nama_tidak_ada)
        ->setCellValue('t' . $baris, $row->lokasi)     
        ->setCellValue('u' . $baris, $row->peruntukan);      
        
         $this->format_baris($arr_kolom,$baris);
        $baris++;
endforeach;
 
//exit;
$baris+=3;
 $this->excel->getActiveSheet()         
        ->setCellValue('B' . $baris, "MENGETAHUI")
        ->setCellValue('t' . $baris, date("d-m-Y"));
$this->format_center(array("b","t"),$baris);
$baris++;
$this->excel->getActiveSheet()         
        ->setCellValue('B' . $baris, "KEPALA ".strtoupper($this->desa2->bentuk_lembaga. " ".$this->desa2->desa) )
        ->setCellValue('t' . $baris, "SEKTERTARIS");
$this->format_center(array("b","t"),$baris);
$baris++;

$this->excel->getActiveSheet()         
        ->setCellValue('B' . $baris, strtoupper($this->desa2->bentuk_lembaga. " ".$this->desa2->desa) )
        ->setCellValue('t' . $baris, "");
$this->format_center(array("b","t"),$baris);
$baris+=3;  

$this->excel->getActiveSheet()         
        ->setCellValue('b' . $baris, $this->desa2->nama_kepala_desa )
        ->setCellValue('t' . $baris, $this->desa2->nama_sek_desa);
$this->format_center(array("b","t"),$baris);
$baris++;

//$this->format(array("arr_kolom"=>$arr_kolom,"bold"=>true,"baris"=>$baris,"align"=>"center"));



        $filename = "LAPORAN tanah ".strtoupper($this->desa2->bentuk_lembaga).".xls";

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