<?php 
class kecamatan extends  master_controller {
	var $error;
	function __construct() {
		parent::__construct();
 
		$this->load->model("kecm","dm");
		$this->load->model("core_model","cm");
		 
		 
	}


function index()
    {
    	//$tpl['content'] = $this->load->view("pengguna_view");
  /* 
	$content = $this->load->view("kota_view",$data,true);
	//$this->load->view("template",$tpl);
	$this->set_title("Data kota");
		$this->set_content($content);
		$this->render();
   * */
    	
    $data['header'] = "Data Kecamatan";
	$data['controller'] = "kecamatan";
   	$data['arr_provinsi'] = $this->cm->add_arr_head($this->cm->arr_tiger_provinsi(),'x',' - Semua Provinsi -');
   	$data['arr_provinsi2'] = $this->cm->add_arr_head($this->cm->arr_tiger_provinsi(),'x',' - Pilih Provinsi -');

   	$content = $this->load->view("kecamatan_view",$data,true);
	$this->set_title("Data Kecamatan");
	$this->set_content($content);
	$this->render();
    }
    
  

function save(){
	//print_r($_POST);
	
		$this->load->library('form_validation');
		$this->form_validation->set_rules('kecamatan','Kecamatan','required');			 
		$this->form_validation->set_rules('kode_kecamatan','Kode Kecamatan','required');			 
		$this->form_validation->set_message('required', ' %s Harus diisi');
 		$this->form_validation->set_error_delimiters("* ", '<br>');
		if($this->form_validation->run() == TRUE ) { 
	   
 		$data =  $this->input->post();
		unset($data['id']);
		unset($data['id_provinsi']);
		 
		
		
		$res  = $this->db->insert("tiger_kecamatan",$data);
		
		//echo $this->db->last_query();
	 		if($res) {
	 			$ret = array("success"=>true,
							"pesan"=>"Berhasil disimpan",
							"operation" =>"insert");
							
			}	
	
		}
		else {
			$ret = array("success"=>false,
						"pesan"=> validation_errors());
		}
		echo json_encode($ret);
}


function update(){
		$this->load->library('form_validation');
		$this->form_validation->set_rules('kecamatan','Kecamatan','required');			 
		$this->form_validation->set_rules('kode_kecamatan','Kode Kecamatan','required');			 
		$this->form_validation->set_message('required', ' %s Harus diisi');
 		$this->form_validation->set_error_delimiters("* ", '<br>');
		if($this->form_validation->run() == TRUE ) { 
	   
 		$data =  $this->input->post();
		//unset($data['id']);
		unset($data['id_provinsi']);
		 
		
		$this->db->where("id",$data['id']);
		$res  = $this->db->update("tiger_kecamatan",$data);
		
		//echo $this->db->last_query();
	 		if($res) {
	 			$ret = array("success"=>true,
							"pesan"=>"Berhasil diupdate",
							"operation" =>"insert");
							
			}	
	
		}
		else {
			$ret = array("success"=>false,
						"pesan"=> validation_errors());
		}
		echo json_encode($ret);
}

function get_data(){
    	$page = $_REQUEST['page']; // get the requested page 
        $limit = $_REQUEST['rows']; // get how many rows we want to have into the grid 
        $sidx = isset($_REQUEST['sort'])?$_REQUEST['sort']:"provinsi"; // get index row - i.e. user click to sort 
        $sord = isset($_REQUEST['order'])?$_REQUEST['order']:"asc"; // get the direction if(!$sidx) $sidx =1;  
        $id_provinsi  = isset($_REQUEST['search_id_provinsi'])?$_REQUEST['search_id_provinsi']:"x";
        $id_kota  = isset($_REQUEST['search_id_kota'])?$_REQUEST['search_id_kota']:"x";
        $kecamatan  = isset($_REQUEST['search_kecamatan'])?$_REQUEST['search_kecamatan']:"x";
       
        $req_param = array (
				"sort_by" => $sidx,
				"sort_direction" => $sord,
				"limit" => null  ,
				"id_provinsi" => $id_provinsi    ,
				"id_kota"	=> $id_kota,
				"kecamatan" => $kecamatan
		);     
           
        $row = $this->dm->get_data($req_param)->result_array();
        $count = count($row); 
		//echo "jumlah $count ".$this->db->last_query();
        
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
                $x=0;
        for($i=0; $i<count($result); $i++){
        	$x++;
            //$responce->rows[$i]['id']=$result[$i]['id_provinsi'];
            // data berikut harus sesuai dengan kolom-kolom yang ingin ditampilkan di view (js)
            $responce->rows[$i]['id']= $result[$i]['id'] ;    
			$responce->rows[$i]['kode_kecamatan']= $result[$i]['kode_kecamatan'] ; 
			$responce->rows[$i]['id_kota']= $result[$i]['id_kota'] ;       
			$responce->rows[$i]['id_provinsi']= $result[$i]['id_provinsi'] ;    
			$responce->rows[$i]['provinsi']= $result[$i]['provinsi'] ;  
			$responce->rows[$i]['kota']= $result[$i]['kota'] ;  
			$responce->rows[$i]['kecamatan']= $result[$i]['kecamatan'] ;  

        }
		//echo "<hr />";
        echo json_encode($responce); 
    }
 

function hapus() {
		$ids = $_POST['ids'];
		$arr_id = explode(",",$ids);
		$a=array(); $b=array();
		foreach($arr_id as $id) {
			//$this->core_model->delete_table_data('kk',array("no_kk"=>$id)); 
			$this->db->where('id',$id);
			$res = $this->db->delete("tiger_kecamatan");
			if($res) $a[]=$id;
			else $b[]=$id;
			//echo $this->db->last_query()."<br />";
		}
		if(count($a)>0) $pesan =  "Id ".implode(",", $a). " Berhasil dihapus  ";
		if(count($b)>0) $pesan = "Id ".implode(",", $b). " Gagal dihapus  ";

		echo json_encode(array("success"=>true,"pesan"=>$pesan));
	}    
    
 
 
	
}


?>
