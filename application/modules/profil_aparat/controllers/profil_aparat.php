<?php 
class profil_aparat extends op_controller {
    var $desa2;
	function __construct(){
		parent::__construct();
		$this->load->model("core_model","cm");
		$this->load->model("pam","dm");
        $this->load->model("add_model","am");
		$this->load->helper("tanggal");
        $this->desa2 = $this->cm->data_desa();
	}


	function index(){
		$data['controller'] = get_class($this);
        $desa2 = $this->cm->data_desa();
		$data['header'] = "Data aparat " . $desa2->bentuk_lembaga;
		$content = $this->load->view($data['controller']."_view",$data,true);
		$this->set_title($data['header']);
		$this->set_content($content);
		$this->render();
	}

	function get_data(){
    	$page = $_REQUEST['page']; // get the requested page 
        $limit = $_REQUEST['rows']; // get how many rows we want to have into the grid 
        $sidx = isset($_REQUEST['sort'])?$_REQUEST['sort']:"pengangkatan_tgl"; // get index row - i.e. user click to sort 
        $sord = isset($_REQUEST['order'])?$_REQUEST['order']:"desc"; // get the direction if(!$sidx) $sidx =1;  
        $nama = isset($_REQUEST['search_nama'])?$_REQUEST['search_nama']:"x";
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
                "nama"  => $nama,
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
            $responce->rows[$i]['id']			        = $result[$i]['id'] ;
            $responce->rows[$i]['nip']                  = $result[$i]['nip'] ;
            $responce->rows[$i]['niap']                 = $result[$i]['niap'] ;
            $responce->rows[$i]['nama']                 = $result[$i]['nama'] ;
            $responce->rows[$i]['jk']                   = $result[$i]['jk'] ;
            $responce->rows[$i]['tmp_lahir']            = $result[$i]['tmp_lahir'] ;
            $responce->rows[$i]['tgl_lahir']            = flipdate($result[$i]['tgl_lahir']) ;
            $responce->rows[$i]['id_agama']             = $result[$i]['id_agama'] ;
            $responce->rows[$i]['agama']                = $result[$i]['agama'] ;
            $responce->rows[$i]['jabatan']              = $result[$i]['jabatan'] ;
            $responce->rows[$i]['pangkat']              = $result[$i]['pangkat'] ;
            $responce->rows[$i]['id_pendidikan']        = $result[$i]['id_pendidikan'] ;
            $responce->rows[$i]['pendidikan']           = $result[$i]['pendidikan'] ;
            $responce->rows[$i]['pengangkatan_tgl']     = flipdate($result[$i]['pengangkatan_tgl']) ;
            $responce->rows[$i]['pengangkatan_no']      = $result[$i]['pengangkatan_no'] ;
            $responce->rows[$i]['berhenti_tgl']         = flipdate($result[$i]['berhenti_tgl']) ;
            $responce->rows[$i]['berhenti_no']          = $result[$i]['berhenti_no'] ;
            $responce->rows[$i]['keterangan']           = $result[$i]['keterangan'] ;

             
             
             

        } }
		//echo "<hr />";
        echo json_encode($responce); 
    }

    function save(){
        $data = $this->input->post();
        $this->load->library('form_validation');
        $this->form_validation->set_rules('nama','Nama ','required');    
        $this->form_validation->set_rules('nip','NIAP ','required');              
        $this->form_validation->set_rules('pangkat','Pangkat ','required');              
        $this->form_validation->set_rules('jabatan','Jabatan ','required');              
                     

        $this->form_validation->set_message('required', ' %s Harus diisi '); 
        $this->form_validation->set_message('numeric', ' %s Harus diisi dengan angka ');
        $this->form_validation->set_message('alpha', ' %s Harus diisi dengan huruf ');
        
        
        $this->form_validation->set_error_delimiters("* ", '<br>');
        if($this->form_validation->run() == TRUE) {

                $data['id'] = md5(date("Ymdhis"));       

                $data['tgl_lahir'] = flipdate($data['tgl_lahir']);
                $data['pengangkatan_tgl'] = flipdate($data['pengangkatan_tgl']);
                $data['berhenti_tgl'] = flipdate($data['berhenti_tgl']);


                $data['id_desa'] = $this->desa2->id_desa;
                $res = $this->db->insert("profil_aparat",$data);

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
        $this->form_validation->set_rules('nip','NIAP ','required');              
        $this->form_validation->set_rules('pangkat','Pangkat ','required');              
        $this->form_validation->set_rules('jabatan','Jabatan ','required');              
                     

        $this->form_validation->set_message('required', ' %s Harus diisi '); 
        $this->form_validation->set_message('numeric', ' %s Harus diisi dengan angka ');
        $this->form_validation->set_message('alpha', ' %s Harus diisi dengan huruf ');
        
        
        $this->form_validation->set_error_delimiters("* ", '<br>');
        if($this->form_validation->run() == TRUE) {

               

                $data['tgl_lahir'] = flipdate($data['tgl_lahir']);
                $data['pengangkatan_tgl'] = flipdate($data['pengangkatan_tgl']);
                $data['berhenti_tgl'] = flipdate($data['berhenti_tgl']);


                $this->db->where("id",$data['id']);
                $res = $this->db->update("profil_aparat",$data);

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
        $this->db->update("profil_aparat",array("deleted"=>1));
    }
    echo json_encode(array("success"=>true,"pesan"=>"Berhasil dihapus"));
}

 
function cetak($tahun) {
     
    $data['controller'] = get_class($this);

   
    $data['record'] = $this->dm->get_data_per_tahun($tahun);
    $data['tahun'] = $tahun;
    $data['header'] = "aparat ".$this->desa2->bentuk_lembaga;
    $data['title'] = $data['header'];
    $this->load->view($data['controller']."_print_view",$data);
   // $this->set_title($data['header']);
    //$this->set_content($content);
    //$this->render();
}
 
function excel($tahun) {


        $this->load->library('Excel');
        $this->excel->setActiveSheetIndex(0);
        $this->excel->getActiveSheet()->setTitle('Data aparat '. $this->desa2->desa);

        $this->excel->getActiveSheet()->getColumnDimension('A')->setWidth(5);
        $this->excel->getActiveSheet()->getColumnDimension('B')->setWidth(30);
        $this->excel->getActiveSheet()->getColumnDimension('C')->setWidth(30);
        $this->excel->getActiveSheet()->getColumnDimension('D')->setWidth(30);
        $this->excel->getActiveSheet()->getColumnDimension('E')->setWidth(5);
        $this->excel->getActiveSheet()->getColumnDimension('F')->setWidth(30);
        $this->excel->getActiveSheet()->getColumnDimension('G')->setWidth(30);
        $this->excel->getActiveSheet()->getColumnDimension('h')->setWidth(30);
        $this->excel->getActiveSheet()->getColumnDimension('i')->setWidth(30);
        $this->excel->getActiveSheet()->getColumnDimension('j')->setWidth(30);
        $this->excel->getActiveSheet()->getColumnDimension('k')->setWidth(30);
        $this->excel->getActiveSheet()->getColumnDimension('l')->setWidth(30);
        $this->excel->getActiveSheet()->getColumnDimension('m')->setWidth(30);
        
         


        $this->excel->getActiveSheet()->mergeCells('A1:m1');
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
        ->setCellValue('A' . $baris,"BUKU APARAT ". strtoupper($this->desa2->bentuk_lembaga));
        $baris++;
        
        $this->excel->getActiveSheet()->mergeCells('A'.$baris.':m'.$baris);

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

 $this->excel->getActiveSheet()->mergeCells('A'.$baris.':m'.$baris);

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
        ->setCellValue('A' . $baris, "No.")
        ->setCellValue('B' . $baris, "NAMA")
        ->setCellValue('C' . $baris, "NIAP")
        ->setCellValue('D' . $baris, "NIP")
        ->setCellValue('E' . $baris, "JK")
        ->setCellValue('F' . $baris, "TMP / TGL LAHIR ")
        ->setCellValue('g' . $baris, "AGAMA")
        ->setCellValue('h' . $baris, "PANGKAT / GOLONGAN ")
        ->setCellValue('i' . $baris, "JABATAN")
        ->setCellValue('j' . $baris, "PENDIDIKAN TERAKHIR ")
        ->setCellValue('k' . $baris, "NO. DAN TANGGAL PENGANGKATAN ")
        ->setCellValue('l' . $baris, "NO. DAN TANGGAL PEMBERHENTIAN")
        ->setCellValue('m' . $baris, "KETERANGAN")
        ;      
        
$arr_kolom = array('a','b','c','d','e','f','g','h','i','j','k','l','m');
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
        ;      
        
$this->format_header($arr_kolom,$baris);
$baris++;


$record = $this->dm->get_data_per_tahun($tahun) ;
$n=0;
foreach($record->result() as $row) : 
    $n++;
//echo "<pre>"; print_r($row); echo "</pre>";
/*
        <td><?php echo $i ?></td>
        <td><?php echo $data->nama ?></td>
        <td><?php echo $data->niap ?></td>
        <td><?php echo $data->nip ?></td>
        <td><?php echo $data->jk ?></td>
        <td><?php echo $data->tmp_lahir. " ".flipdate($data->tgl_lahir); ?></td>
        <td><?php echo $data->agama ?></td>
        <td><?php echo $data->pangkat ?></td>
        <td><?php echo $data->jabatan ?></td>
        <td><?php echo $data->pendidikan ?></td>         
        <td><?php echo "No. : ".$data->pengangkatan_no. "<Br />Tgl :  ".flipdate($data->pengangkatan_tgl) ?></td>
        <td><?php echo "No. : ".$data->berhenti_no. "<br /> Tgl :".flipdate($data->berhenti_tgl) ?></td>
        <td><?php echo $data->keterangan ?></td>
*/
    $this->excel->getActiveSheet()
        ->setCellValue('A' . $baris, $n)
        ->setCellValue('B' . $baris, $row->nama)
        ->setCellValue('C' . $baris, $row->niap)
        ->setCellValue('D' . $baris, $row->nip)
        ->setCellValue('e' . $baris, $row->jk)
        ->setCellValue('f' . $baris, $row->tmp_lahir. " ".flipdate($row->tgl_lahir))
        ->setCellValue('g' . $baris, $row->agama)
        ->setCellValue('h' . $baris, $row->pangkat)
        ->setCellValue('i' . $baris, $row->jabatan)
        ->setCellValue('j' . $baris, $row->pendidikan)
        ->setCellValue('k' . $baris, "No. : $row->pengangkatan_no Tanggal : ". flipdate($row->pengangkatan_tgl))
        ->setCellValue('l' . $baris,"No. :  $row->berhenti_no Tanggal : ". flipdate($row->berhenti_tgl) )
        ->setCellValue('m' . $baris, $row->keterangan);      
        
         $this->format_baris($arr_kolom,$baris);
        $baris++;
endforeach;
//exit;
$baris+=3;
 $this->excel->getActiveSheet()         
        ->setCellValue('B' . $baris, "MENGETAHUI")
        ->setCellValue('j' . $baris, date("d-m-Y"));
$this->format_center(array("b","j"),$baris);
$baris++;
$this->excel->getActiveSheet()         
        ->setCellValue('B' . $baris, "KEPALA ".strtoupper($this->desa2->bentuk_lembaga. " ".$this->desa2->desa) )
        ->setCellValue('j' . $baris, "SEKTERTARIS");
$this->format_center(array("b","j"),$baris);
$baris++;

$this->excel->getActiveSheet()         
        ->setCellValue('B' . $baris, strtoupper($this->desa2->bentuk_lembaga. " ".$this->desa2->desa) )
        ->setCellValue('j' . $baris, "");
$this->format_center(array("b","j"),$baris);
$baris+=3;  

$this->excel->getActiveSheet()         
        ->setCellValue('b' . $baris, $this->desa2->nama_kepala_desa )
        ->setCellValue('j' . $baris, $this->desa2->nama_sek_desa);
$this->format_center(array("b","j"),$baris);
$baris++;

//$this->format(array("arr_kolom"=>$arr_kolom,"bold"=>true,"baris"=>$baris,"align"=>"center"));



        $filename = "LAPORAN aparat ".strtoupper($this->desa2->bentuk_lembaga).".xls";

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