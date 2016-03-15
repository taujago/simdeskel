<?php 
class profil_sda_pemanfaatan_danau extends op_controller {
	function __construct(){
		parent::__construct();
		$this->load->model("core_model","cm");
		//$this->load->model("pjkt","dm");
	}


	function index(){
		$data['controller'] = get_class($this);
		$cont = get_class($this);
		$data['header'] = "";
		
		$form['id'] = "pemanfaatan_danau";
		$form['title1'] = "Pemanfaatan dan kondisi danau / waduk / situ";
		$form['f1'] = "pemanfaatan_danau";
		$form['f2'] = "keterangan";
		$form['l1'] = "Pemanfaatan";
		$form['l2'] = "Keterangan";
		$form['url'] = "grid/get_data";
		$form['table'] = "profil_sda_pemanfaatan_danau";
		$form['default'] = "pemanfaatan_danau";
		$content = $this->load->view("$cont/grid1",$form,true);
		///////////////////
		
		$form['id'] = "kondisi";//id form
		$form['title1'] = "Kondisi";//untuk title grid
		$form['title2'] = "kondisi";//untuk title pop-up form
		$form['f1'] = "kondisi";
		$form['f2'] = "ket_teks";
		$form['f3'] = "luas";
		$form['l1'] = "Kondisi";
		$form['l2'] = "Keterangan";
		$form['l3'] = "Luas (ha)";
		$form['url'] = "$cont/get_data";
		$form['table'] = "profil_sda_kondisi_danau";
		$form['default'] = 'id';
		$content .= $this->load->view("$cont/grid",$form,true);
		$this->load->view("$cont/grid_form",$form);
		$this->load->view("$cont/grid_js",$form);
		$this->load->view("$cont/grid_toolbar",$form);
		//////////////////////
		
		
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
		$foot = $this->db->query("SELECT round(SUM(luas),2) as jumlah FROM $table")->result_array();
		$foot[0]['kondisi'] = "<strong>Luas</strong>";
		$foot[0]['luas'] = "<strong>".$foot[0]['jumlah']."</strong>";
		$responce->footer = $foot;
		echo json_encode($responce);
	}
}
?>