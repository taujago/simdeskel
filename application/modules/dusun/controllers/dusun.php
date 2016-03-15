<?php 
class dusun extends  master_controller {
 	function __construct() {
		parent::__construct();
 
		$this->load->model("dusunm","dm");
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
    	
    $data['header'] = "Data Dusun";
	$data['controller'] = "dusun";
   	$data['arr_provinsi'] = $this->cm->add_arr_head($this->cm->arr_tiger_provinsi(),'x',' - Semua Provinsi -');
   	$data['arr_provinsi2'] = $this->cm->add_arr_head($this->cm->arr_tiger_provinsi(),'x',' - Pilih Provinsi -');

   	$data['arr_kecamatan2'] = $this->cm->add_arr_head($this->cm->arr_kecamatan(),'x','- Semua Kecamatan - ');
   	$data['arr_kecamatan'] = $this->cm->add_arr_head($this->cm->arr_kecamatan(),'x','- Pilih Kecamatan - ');
   	$content = $this->load->view("dusun_view",$data,true);
	$this->set_title("Data Dusun");
	$this->set_content($content);
	$this->render();
    }
    
function cek_id_dusun($id) {
	//echo "hello... somebody call me " ;
	$this->db->where("id",$id);
	$res = $this->db->get("tiger_dusun");
	//echo $this->db->last_query();
	if($res->num_rows() > 0 ) {
		$this->form_validation->set_message('cek_id_dusun', ' %s Sudah ada ');
		return false;
	}
}  

function save(){
	//print_r($_POST);
	
		$this->load->library('form_validation');
		$this->form_validation->set_rules('dusun','Dusun','required');
		$this->form_validation->set_rules('id','Kode Dusun','callback_cek_id_dusun');			 
 		$this->form_validation->set_message('required', ' %s Harus diisi');
 		$this->form_validation->set_error_delimiters("* ", '<br>');
		if($this->form_validation->run() == TRUE ) { 
	   
 		$data =  $this->input->post();
		 
		unset($data['id_kecamatan']);

		 
		
		
		$res  = $this->db->insert("tiger_dusun",$data);
		
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
		$this->form_validation->set_rules('desa','Desa','required');			 
 		$this->form_validation->set_message('required', ' %s Harus diisi');
 		$this->form_validation->set_error_delimiters("* ", '<br>');
		if($this->form_validation->run() == TRUE ) { 
	   
 		$data =  $this->input->post();
		//unset($data['id']);
		unset($data['id_provinsi']);
		unset($data['id_kota']);
		 
		
		$this->db->where("id",$data['id']);
		$res  = $this->db->update("tiger_desa",$data);
		
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

function get_data(){
    	$page = $_REQUEST['page']; // get the requested page 
        $limit = $_REQUEST['rows']; // get how many rows we want to have into the grid 
        $sidx = isset($_REQUEST['sort'])?$_REQUEST['sort']:"provinsi"; // get index row - i.e. user click to sort 
        $sord = isset($_REQUEST['order'])?$_REQUEST['order']:"asc"; // get the direction if(!$sidx) $sidx =1;  
        $id_kecamatan  = isset($_REQUEST['search_id_kecamatan'])?$_REQUEST['search_id_kecamatan']:"x";
        $id_desa =  isset($_REQUEST['search_id_desa'])?$_REQUEST['search_id_desa']:"x";
        $dusun =  isset($_REQUEST['search_dusun'])?$_REQUEST['search_dusun']:"x";
       
        $req_param = array (
				"sort_by" => $sidx,
				"sort_direction" => $sord,
				"limit" => null  ,
				 
				"dusun" => $dusun,
				"id_kecamatan" => $id_kecamatan,
				"id_desa"		=> $id_desa
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
            $responce->rows[$i]['id']= $result[$i]['id'] ;
            $responce->rows[$i]['dusun']= $result[$i]['dusun'] ;
            $responce->rows[$i]['id_desa']= $result[$i]['id_desa'] ;    
            $responce->rows[$i]['desa']= $result[$i]['desa'] ;    
			$responce->rows[$i]['id_kecamatan']= $result[$i]['id_kecamatan'] ;  			 
			$responce->rows[$i]['kecamatan']= $result[$i]['kecamatan'] ;  

        } }
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
			$res = $this->db->delete("tiger_desa");
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
