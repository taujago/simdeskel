<?php 
class profil_inventaris extends op_controller {
    var $desa2;
	function __construct(){
		parent::__construct();
		$this->load->model("core_model","cm");
		$this->load->model("pim","dm");
        $this->load->model("add_model","am");
		$this->load->helper("tanggal");
        $this->desa2 = $this->cm->data_desa();
	}


	function index(){
		$data['controller'] = get_class($this);
        $desa2 = $this->cm->data_desa();
		$data['header'] = "Data inventaris " . $desa2->bentuk_lembaga;
		$content = $this->load->view($data['controller']."_view",$data,true);
		$this->set_title($data['header']);
		$this->set_content($content);
		$this->render();
	}

	function get_data(){
    	$page = $_REQUEST['page']; // get the requested page 
        $limit = $_REQUEST['rows']; // get how many rows we want to have into the grid 
        $sidx = isset($_REQUEST['sort'])?$_REQUEST['sort']:"tanggal"; // get index row - i.e. user click to sort 
        $sord = isset($_REQUEST['order'])?$_REQUEST['order']:"desc"; // get the direction if(!$sidx) $sidx =1;  
        $barang = isset($_REQUEST['search_barang'])?$_REQUEST['search_barang']:"x";
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
                "barang"  => $barang,
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
            $responce->rows[$i]['id']			            = $result[$i]['id'] ;
            $responce->rows[$i]['tanggal']                  = flipdate($result[$i]['tanggal']) ;
            $responce->rows[$i]['barang']                   = $result[$i]['barang'] ;
            $responce->rows[$i]['asal_sendiri']           = $result[$i]['asal_sendiri'] ;
            $responce->rows[$i]['asal_pemerintah']           = $result[$i]['asal_pemerintah'] ;
            $responce->rows[$i]['asal_provinsi']           = $result[$i]['asal_provinsi'] ;
            $responce->rows[$i]['asal_pemda']           = $result[$i]['asal_pemda'] ;
            $responce->rows[$i]['asal_sumbangan']           = $result[$i]['asal_sumbangan'] ;
            $responce->rows[$i]['kondisi_baik']           = $result[$i]['kondisi_baik'] ;
            $responce->rows[$i]['kondisi_rusak']           = $result[$i]['kondisi_rusak'] ;
            $responce->rows[$i]['hapus_dijual']           = $result[$i]['hapus_dijual'] ;
            $responce->rows[$i]['hapus_disumbangkan']           = $result[$i]['hapus_disumbangkan'] ;
            $responce->rows[$i]['hapus_tanggal']           =  flipdate($result[$i]['hapus_tanggal']) ;
            $responce->rows[$i]['kondisi_akhir_tahun_baik']           = $result[$i]['kondisi_akhir_tahun_baik'] ;
            $responce->rows[$i]['kondisi_akhir_tahun_rusak']           = $result[$i]['kondisi_akhir_tahun_rusak'] ;
            $responce->rows[$i]['keterangan']           = $result[$i]['keterangan'] ;


             
             
             

        } }
		//echo "<hr />";
        echo json_encode($responce); 
    }

    function save(){
        $data = $this->input->post();
        $this->load->library('form_validation');
        $this->form_validation->set_rules('barang','Barang / Bangunan ','required');              
        $this->form_validation->set_rules('tanggal','Tanggal ','required');              
        $this->form_validation->set_message('required', ' %s Harus diisi '); 
        $this->form_validation->set_message('numeric', ' %s Harus diisi dengan angka ');
        $this->form_validation->set_message('alpha', ' %s Harus diisi dengan huruf ');
        
        
        $this->form_validation->set_error_delimiters("* ", '<br>');
        if($this->form_validation->run() == TRUE) {

                $data['id'] = md5(date("Ymdhis"));       

                $data['tanggal'] = flipdate($data['tanggal']);
                $data['hapus_tanggal'] = flipdate($data['hapus_tanggal']);
           
                $data['id_desa'] = $this->desa2->id_desa;
                $res = $this->db->insert("profil_inventaris",$data);

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
        $this->form_validation->set_rules('barang','Barang / Bangunan ','required');              
        $this->form_validation->set_rules('tanggal','Tanggal ','required');              
        $this->form_validation->set_message('required', ' %s Harus diisi '); 
        $this->form_validation->set_message('numeric', ' %s Harus diisi dengan angka ');
        $this->form_validation->set_message('alpha', ' %s Harus diisi dengan huruf ');
        
        
        $this->form_validation->set_error_delimiters("* ", '<br>');
        if($this->form_validation->run() == TRUE) {

               

                $data['tanggal'] = flipdate($data['tanggal']);
                $data['hapus_tanggal'] = flipdate($data['hapus_tanggal']);

                $this->db->where("id",$data['id']);
                $res = $this->db->update("profil_inventaris",$data);

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
        $this->db->update("profil_inventaris",array("deleted"=>1));
    }
    echo json_encode(array("success"=>true,"pesan"=>"Berhasil dihapus"));
}

 
function cetak($tahun) {
     
    $data['controller'] = get_class($this);

   
    $data['record'] = $this->dm->get_data_per_tahun($tahun);
    $data['tahun'] = $tahun;
    $data['header'] = "inventaris ".$this->desa2->bentuk_lembaga;
    $data['title'] = $data['header'];
    $this->load->view($data['controller']."_print_view",$data);
   // $this->set_title($data['header']);
    //$this->set_content($content);
    //$this->render();
}
 
function excel($tahun) {


        $this->load->library('Excel');
        $this->excel->setActiveSheetIndex(0);
        $this->excel->getActiveSheet()->setTitle('Data inventaris '. $this->desa2->desa);

        $this->excel->getActiveSheet()->getColumnDimension('A')->setWidth(5);
        $this->excel->getActiveSheet()->getColumnDimension('B')->setWidth(20);
        $this->excel->getActiveSheet()->getColumnDimension('C')->setWidth(30);
        $this->excel->getActiveSheet()->getColumnDimension('D')->setWidth(20);
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
        $this->excel->getActiveSheet()->getColumnDimension('p')->setWidth(30);
         


        $this->excel->getActiveSheet()->mergeCells('A1:p1');
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
        ->setCellValue('A' . $baris,"BUKU INVENTARIS ". strtoupper($this->desa2->bentuk_lembaga));
        $baris++;
        
        $this->excel->getActiveSheet()->mergeCells('A'.$baris.':p'.$baris);

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

 $this->excel->getActiveSheet()->mergeCells('A'.$baris.':p'.$baris);

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

$this->excel->getActiveSheet()->mergeCells('A'.$baris.':a'.($baris+1));
$this->excel->getActiveSheet()
        ->setCellValue('A' . $baris, "No.");

$this->excel->getActiveSheet()->mergeCells('b'.$baris.':b'.($baris+1));
$this->excel->getActiveSheet()
        ->setCellValue('b' . $baris, "Tanggal");

$this->excel->getActiveSheet()->mergeCells('c'.$baris.':c'.($baris+1));
$this->excel->getActiveSheet()
        ->setCellValue('c' . $baris, "Barang / Bangunan");

$this->excel->getActiveSheet()->mergeCells('d'.$baris.':h'.$baris);        
$this->excel->getActiveSheet()
        ->setCellValue('d' . $baris, "Asal Barang / Bangunan");

$this->excel->getActiveSheet()->mergeCells('i'.$baris.':j'.$baris);        
$this->excel->getActiveSheet()
        ->setCellValue('i' . $baris, "Kondisi Barang / Bangunan");

$this->excel->getActiveSheet()->mergeCells('k'.$baris.':m'.$baris);        
$this->excel->getActiveSheet()
        ->setCellValue('k' . $baris, "Penghapusan Barang / Bangunan");

$this->excel->getActiveSheet()->mergeCells('n'.$baris.':o'.$baris);        
$this->excel->getActiveSheet()
        ->setCellValue('n' . $baris, "Kondisi Barang / Bangunan akhir tahun ");

$this->excel->getActiveSheet()->mergeCells('p'.$baris.':p'.($baris+1));
$this->excel->getActiveSheet()
        ->setCellValue('p' . $baris, "Keterangan");

$arr_kolom = array('a','b','c','d','e','f','g','h','i','j','k','l','m','n','o','p');
$this->format_header($arr_kolom,$baris);
$baris++;

$this->excel->getActiveSheet()
        ->setCellValue('d' . $baris, "Beli Sendiri")
        ->setCellValue('e' . $baris, "Pemerintah")
        ->setCellValue('f' . $baris, "Provinsi")
        ->setCellValue('g' . $baris, "Kab / Kota ")
        ->setCellValue('h' . $baris, "Sumbangan")
        ->setCellValue('i' . $baris, "Baik")
        ->setCellValue('j' . $baris, "Rusak")
        ->setCellValue('k' . $baris, "Dijual")
        ->setCellValue('l' . $baris, "Disumbangkan")
        ->setCellValue('m' . $baris, "Tanggal")
        ->setCellValue('n' . $baris, "Baik")
        ->setCellValue('o' . $baris, "Rusak");      
        
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
        ->setCellValue('p' . $baris, "16");
        
        
 $this->format_header($arr_kolom,$baris);
$baris++;
/*
<tr>
 

        <td><?php echo $data->hapus_dijual; ?></td>
        <td><?php echo $data->hapus_disumbangkan; ?></td>
        <td><?php echo flipdate($data->hapus_tanggal); ?></td>

        <td><?php echo $data->kondisi_akhir_tahun_baik; ?></td>
        <td><?php echo $data->kondisi_akhir_tahun_rusak; ?></td>
        <td><?php echo $data->keterangan; ?></td>
    </tr>
*/

$record = $this->dm->get_data_per_tahun($tahun) ;
$n=0;
foreach($record->result() as $data) : 
    $n++;
    $this->excel->getActiveSheet()
        ->setCellValue('A' . $baris, $n)
        ->setCellValue('B' . $baris, flipdate($data->tanggal))
        ->setCellValue('C' . $baris, $data->barang)
        ->setCellValue('D' . $baris, $data->asal_sendiri)
        ->setCellValue('e' . $baris, $data->asal_pemerintah)
        ->setCellValue('f' . $baris, $data->asal_provinsi)
        ->setCellValue('g' . $baris, $data->asal_pemda)
        ->setCellValue('h' . $baris, $data->asal_sumbangan)
        ->setCellValue('i' . $baris, $data->kondisi_baik)
        ->setCellValue('j' . $baris, $data->kondisi_rusak)
        ->setCellValue('k' . $baris, $data->hapus_dijual)
        ->setCellValue('l' . $baris, $data->hapus_disumbangkan)
        ->setCellValue('m' . $baris, flipdate($data->hapus_tanggal))
        ->setCellValue('n' . $baris, $data->kondisi_akhir_tahun_baik)
        ->setCellValue('o' . $baris, $data->kondisi_akhir_tahun_rusak)
        ->setCellValue('p' . $baris, $data->keterangan)   
        ;

        
         $this->format_baris($arr_kolom,$baris);
        $baris++;
endforeach;




$baris+=3;
 $this->excel->getActiveSheet()         
        ->setCellValue('c' . $baris, "MENGETAHUI")
        ->setCellValue('p' . $baris, date("d-m-Y"));
$this->format_center(array("c","p"),$baris);
$baris++;
$this->excel->getActiveSheet()         
        ->setCellValue('c' . $baris, "KEPALA ".strtoupper($this->desa2->bentuk_lembaga. " ".$this->desa2->desa) )
        ->setCellValue('p' . $baris, "SEKTERTARIS");
$this->format_center(array("c","p"),$baris);
$baris++;

$this->excel->getActiveSheet()         
        ->setCellValue('c' . $baris, strtoupper($this->desa2->bentuk_lembaga. " ".$this->desa2->desa) )
        ->setCellValue('p' . $baris, "");
$this->format_center(array("c","p"),$baris);
$baris+=3;  

$this->excel->getActiveSheet()         
        ->setCellValue('c' . $baris, $this->desa2->nama_kepala_desa )
        ->setCellValue('p' . $baris, $this->desa2->nama_sek_desa);
$this->format_center(array("c","p"),$baris);
$baris++;

//$this->format(array("arr_kolom"=>$arr_kolom,"bold"=>true,"baris"=>$baris,"align"=>"center"));



        $filename = "LAPORAN inventaris ".strtoupper($this->desa2->bentuk_lembaga).".xls";

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