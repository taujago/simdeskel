<?php 
class profil_sdm_usia extends op_controller {
	function __construct(){
		parent::__construct();
		$this->load->model("core_model","cm");
		//$this->load->model("pst","dm");
	}


	function index(){
		$form['controller'] = get_class($this);
		$cont = $form['controller'];
		
		$form['title1'] = 'Usia';
		$form['title2'] = '';
		$form['table'] = 'profil_sdm_usia';
		$form['id'] = 'profil_sdm_usia';
		$form['f1'] = 'usia';
		$form['l1'] = 'Usia';
		$form['f2'] = 'lk';
		$form['l2'] = 'Laki-laki (orang)';
		$form['f3'] = 'pr';
		$form['l3'] = 'Perempuan (orang)';
		//add
		$form['default'] = $form['f1'];
		$form['url'] = "$cont/get_data";
		$content = $this->load->view("$cont/grid",$form,true);
		//$this->set_title($data['header']);
		$this->set_content($content);
		$this->render();
	}
	
	function get_data()
	{
		$page = $_REQUEST['page']; // get the requested page 
        $limit = $_REQUEST['rows']; // get how many rows we want to have into the grid 
        $sidx = isset($_REQUEST['sort'])?$_REQUEST['sort']:$_REQUEST['default']; // get index row - i.e. user click to sort 
        $sord = isset($_REQUEST['order'])?$_REQUEST['order']:""; // get the direction if(!$sidx) $sidx =1;
		$table = $_REQUEST['table']; // nama tabel yang di-request 
		$del = isset($_REQUEST['del'])?$_REQUEST['del']:""; // nama tabel yang di-request 
		if($sidx == 'usia'){
			$sord ='';
		}
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
		$foot = $this->db->query("SELECT SUM(lk) as lk, SUM(pr) as pr FROM $table")->result_array();
		$temp = $foot;
		$foot[0]['usia'] = "<strong>Jumlah</strong>";
		$foot[0]['lk'] = "<strong>".$foot[0]['lk']."</strong>";
		$foot[0]['pr'] = "<strong>".$foot[0]['pr']."</strong>";
		$responce->footer = $foot;
		if($total == 0){$responce->rows[1][$sidx] = '';}
		//echo $this->db->last_query();
		echo json_encode($responce);
	}

}
?>