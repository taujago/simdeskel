<?php 
class master_partai_politik extends op_controller {
	function __construct(){
		parent::__construct();
		$this->load->model("core_model","cm");
		$this->load->model("mppol","dm");
	}


	function index(){
		$data['controller'] = get_class($this);
		$data['header'] = "Partai-partai Politik";
		$content = $this->load->view($data['controller']."_view",$data,true);
		$this->set_title($data['header']);
		$this->set_content($content);
		$this->render();
	}

	function get_data(){
    	$page = $_REQUEST['page']; // get the requested page 
        $limit = $_REQUEST['rows']; // get how many rows we want to have into the grid 
        $sidx = isset($_REQUEST['sort'])?$_REQUEST['sort']:"partai_politik"; // get index row - i.e. user click to sort 
        $sord = isset($_REQUEST['order'])?$_REQUEST['order']:"desc"; // get the direction if(!$sidx) $sidx =1;  
        /*$nama_ibu = isset($_REQUEST['search_nama_ibu'])?$_REQUEST['search_nama_ibu']:"x";
        $nama_bapak = isset($_REQUEST['search_nama_bapak'])?$_REQUEST['search_nama_bapak']:"x";
        $jk = isset($_REQUEST['search_jk'])?$_REQUEST['search_jk']:"x";
        $id_kecamatan  = isset($_REQUEST['search_id_kecamatan'])?$_REQUEST['search_id_kecamatan']:"x";
        $id_desa =  isset($_REQUEST['search_id_desa'])?$_REQUEST['search_id_desa']:"x";
        $dusun =  isset($_REQUEST['search_dusun'])?$_REQUEST['search_dusun']:"x"; */
       
        $req_param = array (
				"sort_by" => $sidx,
				"sort_direction" => $sord,
				"limit" => null /*,
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
        	$responce->rows['1']['id_partai_politik']= "";
        }
        else {
                $x=0;
        for($i=0; $i<count($result); $i++){
        	$x++;
            //$responce->rows[$i]['id_partai_politik']=$result[$i]['id_provinsi'];
            // data berikut harus sesuai dengan kolom-kolom yang ingin ditampilkan di view (js)
            $responce->rows[$i]['id_partai_politik']	= $result[$i]['id_partai_politik'] ;
            $responce->rows[$i]['partai_politik']		= $result[$i]['partai_politik'] ;
			$responce->rows[$i]['lokal']				= $result[$i]['lokal'] ;
			$responce->rows[$i]['nasional']				= $result[$i]['nasional'] ;
     		$responce->rows[$i]['pemilih']				= $result[$i]['pemilih'] ;
            $responce->rows[$i]['alamat']  				= $result[$i]['alamat'] ;
          	$responce->rows[$i]['hukum']				= $result[$i]['hukum'] ;
            $responce->rows[$i]['jenis']    			= $result[$i]['jenis'] ;
			$responce->rows[$i]['yakni']    			= $result[$i]['yakni'] ;
			$responce->rows[$i]['underbow']    			= $result[$i]['underbow'] ;
        } }
		//echo "<hr />";
        echo json_encode($responce); 
    }

    function save(){
        $data = $this->input->post();
        $this->load->library('form_validation');
        $this->form_validation->set_rules('partai_politik','Partai Politik ','required');  
		$this->form_validation->set_rules('pemilih','pemilih ','required');  
		$this->form_validation->set_rules('alamat','alamat ','required');  
		$this->form_validation->set_rules('hukum','dasar hukum ','required');  
		$this->form_validation->set_rules('jenis','jenis ','required');  
		$this->form_validation->set_rules('yakni','yakni ','required');  
		$this->form_validation->set_rules('underbow','underbow ','required');  
        $this->form_validation->set_message('required', ' %s Harus diisi '); 
        
        
        $this->form_validation->set_error_delimiters("* ", '<br>');
        if($this->form_validation->run() == TRUE) {
 
 				unset($data['id_partai_politik']);
//				$data['partai_politik'] = 
					
                $res = $this->db->insert("master_partai_politik",$data);

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
        $this->form_validation->set_rules('partai_politik','Partai Politik ','required'); 
		$this->form_validation->set_rules('pemilih','pemilih ','required');  
		$this->form_validation->set_rules('alamat','alamat ','required');  
		$this->form_validation->set_rules('hukum','dasar hukum ','required');  
		$this->form_validation->set_rules('jenis','jenis ','required');  
		$this->form_validation->set_rules('yakni','yakni ','required');  
		$this->form_validation->set_rules('underbow','underbow ','required');  
        $this->form_validation->set_message('required', ' %s Harus diisi '); 
        
        
        $this->form_validation->set_error_delimiters("* ", '<br>');
        if($this->form_validation->run() == TRUE) {

                $this->db->where("id_partai_politik",$data['id_partai_politik']);
                $res = $this->db->update("master_partai_politik",$data);

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
        $this->db->where("id_partai_politik",$id);
        $this->db->update("master_partai_politik",array("deleted"=>1));
    }
    echo json_encode(array("success"=>true,"pesan"=>"Berhasil dihapus"));
}

}
?>