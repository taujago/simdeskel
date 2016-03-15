<?php 
class perkembangan_pemerintahan_apbdesa extends op_controller {
	function __construct(){
		parent::__construct();
		$this->load->model("core_model","cm");
		//$this->load->model("pst","dm");
	}


	function index(){
		$form['controller'] = get_class($this);
		$cont = $form['controller'];
		
		$form['title1'] = 'APB-Desa dan anggaran kelurahan';
		$form['title2'] = 'APB-Desa';
		$form['table'] = 'perkembangan_pemerintahan_apbdesa';
		$form['id'] = 'perkembangan_pemerintahan_apbdesa';
		$form['f1'] = 'apb';
		$form['l1'] = 'APD-Desa';
		$form['f2'] = 'jumlah';
		$form['l2'] = 'Jumlah';
		$form['w'] = '200px';
		//add
		$form['default'] = $form['f1'];
		$form['url'] = "grid/get_data";
		$content = $this->load->view("$cont/grid",$form,true);
		$this->load->view("$cont/grid_form",$form);
		$this->load->view("$cont/grid_js",$form);
		//$this->set_title($data['header']);
		
		$form['title1'] = 'Sumber Anggaran';
		$form['title2'] = 'Sumber anggaran';
		$form['table'] = 'perkembangan_pemerintahan_sumber_anggaran';
		$form['id'] = 'perkembangan_pemerintahan_sumber_anggaran';
		$form['f1'] = 'apb';
		$form['l1'] = 'Sumber anggaran';
		$form['f2'] = 'jumlah';
		$form['l2'] = 'Jumlah';
		$form['w'] = '375px';
		//add
		$form['default'] = 'id';
		$form['url'] = "grid/get_data";
		$content .= "<br><br>";
		$content .= $this->load->view("$cont/grid",$form,true);
		$this->load->view("$cont/grid_form",$form);
		//$this->load->view("$cont/grid_js",$form);
		$this->load->view("$cont/grid_toolbar",$form);
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
		//echo $this->db->last_query();
		echo json_encode($responce);
	}

}
?>