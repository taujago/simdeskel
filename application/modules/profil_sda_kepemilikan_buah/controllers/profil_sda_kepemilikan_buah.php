<?php 
class profil_sda_kepemilikan_buah extends op_controller {
	function __construct(){
		parent::__construct();
		$this->load->model("core_model","cm");
		//$this->load->model("pjkt","dm");
	}


	function index(){
		$data['controller'] = get_class($this);
		$data['header'] = '';
		$cont = get_class($this);
		$form['controller'] = get_class($this);
		$form['id'] = "kepemilikan_buah";
		$form['title1'] = "Kepemilikan lahan tanaman buah";//untuk title grid
		$form['title2'] = "Kepemilikan lahan";//untuk title pop-up form
		$form['f1'] = "kepemilikan_lahan";
		$form['f2'] = "hasil";
		$form['l1'] = "Kepemilikan lahan";
		$form['l2'] = "Jumlah pemilik (keluarga)";
		$form['url'] = "$cont/get_data";
		$form['table'] = "profil_sda_kepemilikan_buah";
		$form['table_m'] = "master_kepemilikan_lahan";//nama tabel master yang akan dijoin dengan tabel profil_sda
		$form['default'] = $form['f1'];
		$form['id1'] = "id_kepemilikan_lahan";//id untuk dropdown di popup
		//$form['f1'] = "id_kepemilikan_lahan";
		$content = $this->load->view("$cont/grid",$form,true);
		$this->load->view("$cont/grid_form",$form);
		$this->load->view("$cont/grid_js",$form);
		$this->load->view("$cont/grid_toolbar",$form);
		$this->set_title($data['header']);
		$this->set_content($content);
		$this->render();
	}
	
	function get_data()
	{
		$page = $_REQUEST['page']; // get the requested page 
        $limit = $_REQUEST['rows']; // get how many rows we want to have into the grid 
        $sidx = isset($_REQUEST['sort'])?$_REQUEST['sort']:$_REQUEST['default']; // get index row - i.e. user click to sort 
        $sord = isset($_REQUEST['order'])?$_REQUEST['order']:"desc"; // get the direction if(!$sidx) $sidx =1;
		$table = $_REQUEST['table']; // nama tabel yang di-request 
		$del = isset($_REQUEST['del'])?$_REQUEST['del']:""; // nama tabel yang di-request 
		$res = $this->cm->get_grid_data($page,$limit,$sidx,$sord,$table,$del);
		$total = $res['total'];
		unset($res['total']);
		$responce = new stdClass();
		$responce->total = $total;
		$c = 0;
		foreach($res as $var)
		{
			$responce->rows[$c] = $var;
			$c++;
		}
		$foot = $this->db->query("SELECT '<strong>Jumlah total keluarga petani</strong>' as kepemilikan_lahan, sum($table.hasil) as hasil FROM $table where $table.deleted = 0 and $table.id between 2 and 7")->result_array();
		$responce->footer = $foot;
		if($total == 0){$responce->rows[1][$sidx] = '';}
		//echo $this->db->last_query();
		echo json_encode($responce);
	}

	
	
}
?>