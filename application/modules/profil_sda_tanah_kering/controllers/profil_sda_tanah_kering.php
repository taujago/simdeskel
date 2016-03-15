<?php 
class profil_sda_tanah_kering extends op_controller {
	function __construct(){
		parent::__construct();
		$this->load->model("core_model","cm");
		$this->load->model("tnkr","dm");
	}


	function index(){
		$data['controller'] = get_class($this);
		$data['header'] = "Tanah Kering";
		$content = $this->load->view($data['controller']."_view",$data,true);
		$this->set_title($data['header']);
		$this->set_content($content);
		$this->render();
	}

	function get_data(){
    	$page = $_REQUEST['page']; // get the requested page 
        $limit = $_REQUEST['rows']; // get how many rows we want to have into the grid 
        $sidx = isset($_REQUEST['sort'])?$_REQUEST['sort']:"id_tanah_kering"; // get index row - i.e. user click to sort 
        $sord = isset($_REQUEST['order'])?$_REQUEST['order']:"asc"; // get the direction if(!$sidx) $sidx =1;  
       
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
        	$responce->rows['1']['id_tanah_kering']= "";
        }
        else {
                $x=0;
        for($i=0; $i<count($result); $i++){
        	$x++;
            //$responce->rows[$i]['id_tanah_kering']=$result[$i]['id_provinsi'];
            // data berikut harus sesuai dengan kolom-kolom yang ingin ditampilkan di view (js)
            $responce->rows[$i]['id_tanah_kering']			= $result[$i]['id_tanah_kering'] ;
            $responce->rows[$i]['tanah_kering']           = $result[$i]['tanah_kering'] ;
			$responce->rows[$i]['nilai']			= $result[$i]['nilai'] ;
        } }
		$temp = $this->db->query("SELECT ROUND(SUM(a.nilai),2) AS nilai FROM profil_sda_tanah_kering AS a WHERE a.`deleted` = 0")->result_array();
		$foot[0]['tanah_kering'] = "<strong>Total luas</strong>";
		$foot[0]['nilai'] = "<strong>".$temp[0]['nilai']."</strong>";
		$responce->footer = $foot;
		//echo "<hr />";
        echo json_encode($responce); 
    }

    function save(){
        $data = $this->input->post();
        $this->load->library('form_validation');
        $this->form_validation->set_rules('tanah_kering','Tanah Kering ','required'); 
		$this->form_validation->set_rules('nilai','Nilai ','required'); 
        $this->form_validation->set_message('required', ' %s Harus diisi '); 
        
        
        $this->form_validation->set_error_delimiters("* ", '<br>');
        if($this->form_validation->run() == TRUE) {
 
 				unset($data['id_tanah_kering']);
//				$data['tanah_kering'] = 
					
                $res = $this->db->insert("profil_sda_tanah_kering",$data);

                if($res) {    
                $ret = array("success"=>true,
                            "pesan"=>"Data berhasil disimpan",
                            "operation" =>"insert");
                }
                else {
                 $ret = array("success"=>false,
                            "pesan"=>"Data gagal disimpan " .mysql_error(),
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
        $this->form_validation->set_rules('tanah_kering','Tanah Kering ','required');
		$this->form_validation->set_rules('nilai','Nilai ','required');
        $this->form_validation->set_message('required', ' %s Harus diisi '); 
        
        
        $this->form_validation->set_error_delimiters("* ", '<br>');
        if($this->form_validation->run() == TRUE) {

                $this->db->where("id_tanah_kering",$data['id_tanah_kering']);
                $res = $this->db->update("profil_sda_tanah_kering",$data);

                if($res) {    
                $ret = array("success"=>true,
                            "pesan"=>"Data berhasil disimpan",
                            "operation" =>"insert");
                }
                else {
                 $ret = array("success"=>false,
                            "pesan"=>"Data gagal disimpan " .mysql_error(),
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
        $this->db->where("id_tanah_kering",$id);
        $this->db->update("profil_sda_tanah_kering",array("deleted"=>1));
    }
    echo json_encode(array("success"=>true,"pesan"=>"Berhasil dihapus"));
}

}
?>