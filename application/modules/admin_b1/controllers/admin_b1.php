<?php 
class admin_b1 extends op_controller {
    var $desa2;
	function __construct(){
		parent::__construct();
		$this->load->model("core_model","cm");
		$this->load->model("b1m","dm");
        $this->load->model("add_model","am");
		$this->load->helper("tanggal");
        $this->desa2 = $this->cm->data_desa();
	}


	function index(){
		$data['controller'] = get_class($this);
        $desa2 = $this->cm->data_desa();
		$data['header'] = "Buku data Induk Penduduk " . $desa2->bentuk_lembaga;
		$content = $this->load->view($data['controller']."_view",$data,true);
		$this->set_title($data['header']);
		$this->set_content($content);
		$this->render();
	}

	function get_data(){
    	$page = $_REQUEST['page']; // get the requested page 
        $limit = $_REQUEST['rows']; // get how many rows we want to have into the grid 
        $sidx = isset($_REQUEST['sort'])?$_REQUEST['sort']:"no_kk, nama "; // get index row - i.e. user click to sort 
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
				"limit" => null  /*,
                "tentang"  => $tentang,
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
        	$responce->rows['1']['id_penduduk']= "";
        }
        else {
                $x=0;
        for($i=0; $i<count($result); $i++){
        	$x++;
            //$responce->rows[$i]['id']=$result[$i]['id_provinsi'];
            // data berikut harus sesuai dengan kolom-kolom yang ingin ditampilkan di view (js)
         $responce->rows[$i]['id_penduduk']  = $result[$i]['id_penduduk'] ;    
            $responce->rows[$i]['nik']           = $result[$i]['nik'] ;    
            $responce->rows[$i]['nama']          = $result[$i]['nama'] ; 
            $responce->rows[$i]['tgl_lahir']     = $result[$i]['tgl_lahir'] ;       
            
            $responce->rows[$i]['tmp_lahir']     = $result[$i]['tmp_lahir'] ; 
            $responce->rows[$i]['jk']            = $result[$i]['jk'] ;  
            $responce->rows[$i]['alamat']        = $result[$i]['alamat'] ;  
            $responce->rows[$i]['rt']            = $result[$i]['rt'] ;  
            $responce->rows[$i]['rw']            = $result[$i]['rw'] ;
            $responce->rows[$i]['id_desa']       = $result[$i]['id_desa'] ; 
            $responce->rows[$i]['desa']          = $result[$i]['desa'] ;   
            $responce->rows[$i]['id_dusun']      = $result[$i]['id_dusun'] ;
            $responce->rows[$i]['id_kecamatan']  = $result[$i]['id_kecamatan'] ;   
            $responce->rows[$i]['kecamatan']     = $result[$i]['kecamatan'] ; 
            $responce->rows[$i]['id_pendidikan'] = $result[$i]['id_pendidikan'] ;  
            $responce->rows[$i]['baca_tulis']    = $result[$i]['baca_tulis'] ;  
            
              
        
            $responce->rows[$i]['warga_negara'] = $result[$i]['warga_negara'] ;   
            $responce->rows[$i]['golongan_darah']   = $result[$i]['golongan_darah'] ;  
            $responce->rows[$i]['id_agama'] = $result[$i]['id_agama'] ;  
            $responce->rows[$i]['agama'] = $result[$i]['agama'] ; 
            $responce->rows[$i]['id_pekerjaan'] = $result[$i]['id_pekerjaan'] ;
            $responce->rows[$i]['status_kawin'] = $result[$i]['status_kawin'] ;             
            $responce->rows[$i]['id_pendidikan']    = $result[$i]['id_pendidikan'] ;  
            $responce->rows[$i]['id_kecamatan'] = $result[$i]['id_kecamatan'] ;  
            $responce->rows[$i]['status_kependudukan']  = $result[$i]['status_kependudukan'] ; 
            
            $arr_status_kependudukan = $this->cm->arr_status_kependudukan; 
            $responce->rows[$i]['status_kependudukan2'] = ($result[$i]['status_kependudukan'] == "")?"":$arr_status_kependudukan[$result[$i]['status_kependudukan']] ; 
            $responce->rows[$i]['hidup_mati']   = $result[$i]['hidup_mati'] ; 
            //$responce->rows[$i]['id_suku']    = $result[$i]['id_suku'] ;      
            $responce->rows[$i]['keturunan']    = $result[$i]['keturunan'] ;    
            $responce->rows[$i]['dusun']    = $result[$i]['dusun'] ;    
            $responce->rows[$i]['pendidikan']   = $result[$i]['pendidikan'] ;   
            $responce->rows[$i]['pekerjaan']    = $result[$i]['pekerjaan'] ;            
            $responce->rows[$i]['status_hidup'] = $result[$i]['status_hidup'] ;     
            $responce->rows[$i]['umur'] = $result[$i]['umur'] ; 
            $responce->rows[$i]['jenis_kedatangan'] = $result[$i]['jenis_kedatangan'] ; 
            $responce->rows[$i]['no_kk'] = $result[$i]['no_kk'] ; 
            
            $responce->rows[$i]['asal_negara']  = $result[$i]['asal_negara'] ;
            $responce->rows[$i]['umur'] = $result[$i]['umur'] ; 
            $responce->rows[$i]['rt_sebelumnya']        = $result[$i]['rt_sebelumnya'] ; 
            $responce->rows[$i]['rw_sebelumnya']        = $result[$i]['rw_sebelumnya'] ; 
            $responce->rows[$i]['alamat_sebelumnya']        = $result[$i]['alamat_sebelumnya'] ; 
            $responce->rows[$i]['id_desa_sebelumnya']       = $result[$i]['id_desa_sebelumnya'] ; 
            $responce->rows[$i]['id_kecamatan_sebelumnya']      = $result[$i]['id_kecamatan_sebelumnya'] ; 
            $responce->rows[$i]['id_kota_sebelumnya']       = $result[$i]['id_kota_sebelumnya'] ; 
            $responce->rows[$i]['id_provinsi_sebelumnya']       = $result[$i]['id_provinsi_sebelumnya'] ; 
            $responce->rows[$i]['sementara_maksud']     = $result[$i]['sementara_maksud'] ; 
            $responce->rows[$i]['sementara_id_tujuan']      = $result[$i]['sementara_id_tujuan'] ; 
             
             
             

        } }
		//echo "<hr />";
        echo json_encode($responce); 
    }

    function save(){
        $data = $this->input->post();
        $this->load->library('form_validation');
        $this->form_validation->set_rules('nomor','Nomor ','required');    
        $this->form_validation->set_rules('tanggal','Tanggal ','required');              
        $this->form_validation->set_rules('tentang','Tentang ','required');              
        $this->form_validation->set_rules('persetujuan_bpd_nomor','Nomor persetujuan BPD ','required');              
        $this->form_validation->set_rules('persetujuan_bpd_tgl','Tanggal persetujuan BPD  ','required');              
        $this->form_validation->set_rules('dilaporkan_nomor','Nomor dilaporkan ','required');              
        $this->form_validation->set_rules('dilaporkan_tgl','Tanggal dilaporkan ','required');              

        $this->form_validation->set_message('required', ' %s Harus diisi '); 
        $this->form_validation->set_message('numeric', ' %s Harus diisi dengan angka ');
        $this->form_validation->set_message('alpha', ' %s Harus diisi dengan huruf ');
        
        
        $this->form_validation->set_error_delimiters("* ", '<br>');
        if($this->form_validation->run() == TRUE) {

                $data['id'] = md5(date("Ymdhis"));       

                $data['tanggal'] = flipdate($data['tanggal']);
                $data['persetujuan_bpd_tgl'] = flipdate($data['persetujuan_bpd_tgl']);
                $data['dilaporkan_tgl'] = flipdate($data['dilaporkan_tgl']);

                $data['id_desa'] = $this->desa2->id_desa;
                $res = $this->db->insert("admin_a1",$data);

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
        $this->form_validation->set_rules('nomor','Nomor ','required');    
        $this->form_validation->set_rules('tanggal','Tanggal ','required');              
        $this->form_validation->set_rules('tentang','Tentang ','required');              
        $this->form_validation->set_rules('persetujuan_bpd_nomor','Nomor persetujuan BPD ','required');              
        $this->form_validation->set_rules('persetujuan_bpd_tgl','Tanggal persetujuan BPD  ','required');              
        $this->form_validation->set_rules('dilaporkan_nomor','Nomor dilaporkan ','required');              
        $this->form_validation->set_rules('dilaporkan_tgl','Tanggal dilaporkan ','required');              

        $this->form_validation->set_message('required', ' %s Harus diisi '); 
        $this->form_validation->set_message('numeric', ' %s Harus diisi dengan angka ');
        $this->form_validation->set_message('alpha', ' %s Harus diisi dengan huruf ');
        
        
        $this->form_validation->set_error_delimiters("* ", '<br>');
        if($this->form_validation->run() == TRUE) {

               

                $data['tanggal'] = flipdate($data['tanggal']);
                $data['persetujuan_bpd_tgl'] = flipdate($data['persetujuan_bpd_tgl']);
                $data['dilaporkan_tgl'] = flipdate($data['dilaporkan_tgl']);
                 

                $this->db->where("id",$data['id']);
                $res = $this->db->update("admin_a1",$data);

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
        $this->db->update("admin_a1",array("deleted"=>1));
    }
    echo json_encode(array("success"=>true,"pesan"=>"Berhasil dihapus"));
}

 
function cetak($tahun) {
     
    $data['controller'] = get_class($this);

   
    $data['record'] = $this->dm->get_data_per_tahun($tahun);
    $data['tahun'] = $tahun;
    $data['header'] = "Buku Data Induk Penduduk ".$this->desa2->bentuk_lembaga;
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
    $data['header'] = "Buku Data Induk Penduduk ".$this->desa2->bentuk_lembaga;
    $data['title'] = $data['header'];

        $this->load->library('Pdf');
        $pdf = new Pdf('L', 'mm', 'F4', true, 'UTF-8', false);
        $pdf->SetTitle($data['header']);
      


         
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


         $html = $this->load->view("pdf/admin_b1_pdf_view",$data,true);
         $pdf->writeHTML($html, true, false, true, false, '');



         $halaman  = $pdf->getPage();
         $pdf->startTransaction();
         $y = $pdf->getY();
      
         $html = $this->load->view("pdf/pdf_ttd",$data,true);
         $pdf->writeHTML($html, true, false, true, false, '');
       

         if($halaman <> $pdf->getPage() ) {
            $pdf->rollbackTransaction(true);

            $pdf->AddPage();
            $html = $this->load->view("pdf/admin_b1_pdf_view_table_header",$data,true);
            $pdf->writeHTML($html, true, false, true, false, '');

            $html = $this->load->view("pdf/pdf_ttd",$data,true);
            $pdf->writeHTML($html, true, false, true, false, '');

         }

         else if( $y < 20 ) {
            $pdf->rollbackTransaction(true);

            //$pdf->AddPage();
            $html = $this->load->view("pdf/admin_b1_pdf_view_table_header",$data,true);
            $pdf->writeHTML($html, true, false, true, false, '');

            $html = $this->load->view("pdf/pdf_ttd",$data,true);
            $pdf->writeHTML($html, true, false, true, false, '');

         }

         $pdf->Output($data['header']. $this->session->userdata("tahun") .'.pdf', 'I');
}
 

function excel($tahun) {


        $this->load->library('Excel');
        $this->excel->setActiveSheetIndex(0);
        $this->excel->getActiveSheet()->setTitle('buku induk penduduk ');

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
		$this->excel->getActiveSheet()->getColumnDimension('P')->setWidth(30);
         


        $this->excel->getActiveSheet()->mergeCells('A1:P1');
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
        ->setCellValue('A' . $baris,"BUKU DATA INDUK PENDUDUK ". strtoupper($this->desa2->bentuk_lembaga));
        $baris++;
        
        $this->excel->getActiveSheet()->mergeCells('A'.$baris.':P'.$baris);

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

 $this->excel->getActiveSheet()->mergeCells('A'.$baris.':P'.$baris);

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
        ->setCellValue('P5', "MODEL B.1 ");  



$this->excel->getActiveSheet()->mergeCells('A'.$baris.':A'.($baris+1));
$this->excel->getActiveSheet()->mergeCells('B'.$baris.':B'.($baris+1));
$this->excel->getActiveSheet()->mergeCells('C'.$baris.':C'.($baris+1));
$this->excel->getActiveSheet()->mergeCells('D'.$baris.':D'.($baris+1));
$this->excel->getActiveSheet()->mergeCells('E'.$baris.':F'.$baris);
$this->excel->getActiveSheet()->mergeCells('G'.$baris.':G'.($baris+1));
$this->excel->getActiveSheet()->mergeCells('H'.$baris.':H'.($baris+1));
$this->excel->getActiveSheet()->mergeCells('I'.$baris.':I'.($baris+1));
$this->excel->getActiveSheet()->mergeCells('J'.$baris.':J'.($baris+1));
$this->excel->getActiveSheet()->mergeCells('K'.$baris.':K'.($baris+1));
$this->excel->getActiveSheet()->mergeCells('L'.$baris.':L'.($baris+1));
$this->excel->getActiveSheet()->mergeCells('M'.$baris.':M'.($baris+1));
$this->excel->getActiveSheet()->mergeCells('N'.$baris.':N'.($baris+1));
$this->excel->getActiveSheet()->mergeCells('O'.$baris.':O'.($baris+1));
$this->excel->getActiveSheet()->mergeCells('P'.$baris.':P'.($baris+1));


$this->excel->getActiveSheet()
        ->setCellValue('A' . $baris, "NO.")
        ->setCellValue('B' . $baris, "NAMA")
        ->setCellValue('C' . $baris, "JK")
        ->setCellValue('D' . $baris, "STATUS PERKAWINAN ")
        ->setCellValue('E' . $baris, "TEMPAT DAN TANGGAL LAHIR ")
        ->setCellValue('E' . ($baris+1), "TEMPAT LAHIR")
		->setCellValue('F' . ($baris+1), "TEMPAT LAHIR")
		->setCellValue('G' . $baris, "AGAMA")
		->setCellValue('H' . $baris, "PENDIDIKAN TERAKHIR")
		->setCellValue('I' . $baris, "PEKERJAAN")
		->setCellValue('J' . $baris, "DAPAT MEMBACA HURUF")
		->setCellValue('K' . $baris, "KEWARGANEGARAAN")
		->setCellValue('L' . $baris, "ALAMAT")
		->setCellValue('M' . $baris, "KEDUDUKAN DALAM KELUARGA")
		->setCellValue('N' . $baris, "NOMOR KTP")
		->setCellValue('O' . $baris, "NOMOR KSK")
		->setCellValue('P' . $baris, "KETERANGAN")
		
		;  
		 
        
$arr_kolom = array('a','b','c','d','e','f','g','h','i','j','k','l','m','n','o','p');
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
		->setCellValue('P' . $baris, "16");      
        
 
$this->format(array("arr_kolom"=>$arr_kolom, "baris" => $baris, "bold"=>true, "align"=>"center"));
$baris++;


$record = $this->dm->get_data_per_tahun($tahun) ;
$n=0;

 $arr_status_kawin = $this->cm->arr_status_kawin;
  $arr_baca_tulis = $this->cm->arr_baca_tulis;
   
foreach($record->result() as $row) : 
    $n++;
    $this->excel->getActiveSheet()
        ->setCellValue('A' . $baris, $n)
        ->setCellValue('B' . $baris, $row->nama)
        ->setCellValue('C' . $baris, $row->jk)
        ->setCellValue('D' . $baris, $arr_status_kawin[$row->status_kawin])
        ->setCellValue('E' . $baris, $row->tmp_lahir)
        ->setCellValue('F' . $baris, $row->tgl_lahir)
		->setCellValue('G' . $baris, $row->agama)
		->setCellValue('H' . $baris, $row->pendidikan)
		->setCellValue('I' . $baris, $row->pekerjaan)
		->setCellValue('J' . $baris, isset($arr_baca_tulis[$row->baca_tulis])?$arr_baca_tulis[$row->baca_tulis]:"")
		->setCellValue('K' . $baris, $row->warga_negara)
		->setCellValue('L' . $baris, $row->alamat)
		->setCellValue('M' . $baris, @$this->dm->kedudukan_keluarga($row->id_penduduk))
		->setCellValue('N' . $baris,  $row->nik)
		->setCellValue('O' . $baris, $row->no_kk)
		->setCellValue('P' . $baris, "" );      
        
         $this->format(array("arr_kolom"=>$arr_kolom, "baris" => $baris, "bold"=>false));
        $baris++;
endforeach;

$baris+=3;
 $this->excel->getActiveSheet()         
        ->setCellValue('B' . $baris, "MENGETAHUI")
        ->setCellValue('O' . $baris, strtoupper($this->desa2->desa).", ".date("d-m-Y"));
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

//$this->format(array("arr_kolom"=>$arr_kolom,"bold"=>true,"baris"=>$baris,"align"=>"center"));



        $filename = "BUKU DATA INDUK PENDUDUK  ".strtoupper($this->desa2->bentuk_lembaga).".xls";

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