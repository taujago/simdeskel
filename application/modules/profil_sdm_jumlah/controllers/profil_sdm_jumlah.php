<?php 
class profil_sdm_jumlah extends op_controller {
	function __construct(){
		parent::__construct();
		$this->load->model("core_model","cm");
		//$this->load->model("pst","dm");
	}


	function index(){
		$form['controller'] = get_class($this);
		
		$form['title1'] = 'Jumlah';
		$form['title2'] = 'jumlah';
		$form['table'] = 'profil_sdm_jumlah_2';
		$form['id'] = 'profil_sdm_jumlah_2';
		$form['f1'] = 'jumlah';
		$form['l1'] = 'Keterangan';
		$form['f2'] = 'nilai';
		$form['l2'] = 'Jumlah';
		$form['f3'] = 'id_satuan_teks';
		$form['l3'] = 'Satuan';
		$form['arr3'] = $this->cm->arr_tabel("master_satuan","id_satuan","satuan","satuan");
		//add
		$form['default'] = $form['f1'];
		$form['url'] = "grid/get_data";
		$form['nilai'] = $this->get();
		$cont = $form['controller'];
		$content = $this->load->view("$cont/grid2",$form,true);
		$this->set_content($content);
		$this->render();
	}
	
	    function simpan(){
        $data = $this->input->post();
        $res = $this->db->update("profil_sdm_jumlah",$data);

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
        echo json_encode($ret);
    }
	
	function get(){
		$res = $this->db->get("profil_sdm_jumlah")->result_array();
		return $res[0]['nilai'];
	}
}
?>