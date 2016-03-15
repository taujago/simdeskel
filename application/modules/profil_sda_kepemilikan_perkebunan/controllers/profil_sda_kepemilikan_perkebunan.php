<?php 
class profil_sda_kepemilikan_perkebunan extends op_controller {
	function __construct(){
		parent::__construct();
		$this->load->model("core_model","cm");
		//$this->load->model("pjkt","dm");
	}


	function index(){
		$data['controller'] = get_class($this);
		$cont = get_class($this);
		$data['header'] = "";
		$form['id'] = "kepemilikan_perkebunan";
		$form['title1'] = "Kepemilikan Lahan Perkebunan";
		$form['title2'] = "Kepemilikan Lahan Perkebunan";
		$form['f1'] = "perkebunan";
		$form['f2'] = "total";
		$form['l1'] = "Kepemilikan lahan";
		$form['l2'] = "Total";
		$form['url'] = "$cont/get_data";
		$form['table'] = "profil_sda_kepemilikan_perkebunan";
		$form['default'] = "id";
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
        $sidx = isset($_REQUEST['sort'])?$_REQUEST['sort']:'id'; // get index row - i.e. user click to sort 
        $sord = isset($_REQUEST['order'])?$_REQUEST['order']:"asc"; // get the direction if(!$sidx) $sidx =1;
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

		if($total == 0){$responce->rows[1][$sidx] = '';}
		//echo $this->db->last_query();
		echo json_encode($responce);
	}}
?>