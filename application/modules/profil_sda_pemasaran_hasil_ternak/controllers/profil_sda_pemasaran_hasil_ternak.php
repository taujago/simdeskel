<?php 
class profil_sda_pemasaran_hasil_ternak extends op_controller {
	function __construct(){
		parent::__construct();
		$this->load->model("core_model","cm");
		//$this->load->model("pjkt","dm");
	}


	function index(){
		$data['controller'] = get_class($this);
		$cont = get_class($this);
		$data['header'] = "";
		$form['id'] = "pemasaran_hasil";
		$form['title1'] = "Pemasaran Hasil Ternak";
		$form['f1'] = "pemasaran_hasil";
		$form['f2'] = "keterangan";
		$form['l1'] = "Pemasaran Hasil";
		$form['l2'] = "Keterangan";
		$form['url'] = $data['controller']."/get_data";
		$form['table'] = "pemasaran_hasil_ternak";
		$form['default'] = "pemasaran_hasil";
		$content = $this->load->view("$cont/grid",$form,true);
		//$content = $this->load->view("grid/grid2_form",$form);
		//$content = $this->load->view("grid/grid2_js",$form);
		//$content = $this->load->view("grid/grid2_toolbar",$form);
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
		$res = $this->cm->get_grid_data($page,$limit,$sidx,$sord,$table);
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
		echo json_encode($responce);
	}
}
?>