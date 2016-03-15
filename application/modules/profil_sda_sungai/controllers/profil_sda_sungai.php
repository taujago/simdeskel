<?php 
class profil_sda_sungai extends op_controller {
	function __construct(){
		parent::__construct();
		$this->load->model("core_model","cm");
		//$this->load->model("pst","dm");
	}


	function index(){
		$form['controller'] = get_class($this);
		$cont = $form['controller'];
		$form['id'] = "sungai";//id form
		$form['title1'] = "Sungai";//untuk title grid
		$form['title2'] = "kondisi sungai";//untuk title pop-up form
		$form['f1'] = "kondisi";
		$form['f4'] = "keterangan_teks";
		$form['f3'] = "keterangan";
		$form['f2'] = "jumlah";
		$form['l1'] = "Kondisi";
		$form['l2'] = "Jumlah (buah)";
		$form['l4'] = "Keterangan";
		$form['url'] = "$cont/get_data";
		$form['table'] = "profil_sda_sungai";
		$form['default'] = 'id';
		$content = $this->load->view("$cont/grid",$form,true);
		$this->load->view("$cont/grid_form",$form);
		$this->load->view("$cont/grid_js",$form);
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
		$foot = $this->db->query("SELECT SUM(jumlah) as jumlah FROM $table")->result_array();
		$foot[0]['kondisi'] = "<strong>Total</strong>";
		$foot[0]['jumlah'] = "<strong>".$foot[0]['jumlah']."</strong>";
		$responce->footer = $foot;
		if($total == 0){$responce->rows[1][$sidx] = '';}
		//echo $this->db->last_query();
		echo json_encode($responce);
	}

}
?>