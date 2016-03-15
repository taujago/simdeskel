<?php 
class profil_sdm_prasarana_darat extends op_controller {
	function __construct(){
		parent::__construct();
		$this->load->model("core_model","cm");
		//$this->load->model("pst","dm");
	}


	function index(){
		$form['controller'] = get_class($this);
		$cont = get_class($this);
		$form['title1'] = 'Prasarana transportasi darat';
		$form['title2'] = 'jenis sarana dan prasarana';
		$form['table'] = 'profil_sdm_prasarana_darat';
		$form['id'] = 'profil_sdm_prasarana_darat';
		$form['f1'] = 'jenis';
		$form['l1'] = 'Jenis sarana dan prasarana';
		$form['f2'] = 'cat_teks';
		$form['l2'] = 'Kategori';
		$form['f3'] = 'baik';
		$form['l3'] = 'Baik (km)';
		$form['f4'] = 'Rusak';
		$form['l4'] = 'Rusak (km)';
		//add
		$form['default'] = $form['f1'];
		$form['url'] = "$cont/get_data";
		
		$content = $this->load->view("$cont/grid",$form,true);
		$this->load->view("$cont/grid_form",$form);
		$this->load->view("$cont/grid_js",$form);
		/////////////////////////
		
		$cont = $form['controller'];
		$form['title1'] = 'Jembatan desa / kelurahan';
		$form['title2'] = 'jenis sarana dan prasarana';
		$form['table'] = 'profil_sdm_prasarana_darat2';
		$form['id'] = 'profil_sdm_prasarana_darat2';
		$form['f1'] = 'jenis';
		$form['l1'] = 'Jenis sarana dan prasarana';
		$form['f2'] = 'baik';
		$form['l2'] = 'Baik (unit)';
		$form['f3'] = 'Rusak';
		$form['l3'] = 'Rusak (unit)';
		//add
		$form['default'] = 'id';
		$form['url'] = "$cont/get_data";
		$content .= "<br><br>";
		$content .= $this->load->view("$cont/grid2",$form,true);
		$this->load->view("$cont/grid_form2",$form);
		$this->load->view("$cont/grid_js",$form);
		$this->load->view("$cont/grid_toolbar",$form);
		///////////////////////////
		
		$cont = $form['controller'];
		$form['title1'] = 'Prasarana angkutan darat';
		$form['title2'] = 'jenis sarana dan prasarana';
		$form['table'] = 'profil_sdm_prasarana_darat3';
		$form['id'] = 'profil_sdm_prasarana_darat3';
		$form['f1'] = 'jenis';
		$form['l1'] = 'Jenis sarana dan prasarana';
		$form['f2'] = 'baik';
		$form['l2'] = 'Baik (unit)';
		$form['f3'] = 'Rusak';
		$form['l3'] = 'Rusak (unit)';
		//add
		$form['default'] = 'id';
		$form['url'] = "$cont/get_data";
		$content .= "<br><br>";
		$content .= $this->load->view("$cont/grid2",$form,true);
		$this->load->view("$cont/grid_form2",$form);
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
		$foot = $this->db->query("SELECT SUM(baik) as baik, SUM(rusak) as rusak FROM $table where $table.deleted = 0")->result_array();
		$temp = $foot;
		$foot[0]['jenis'] = "<strong>Jumlah</strong>";
		$foot[0]['baik'] = "<strong>".$foot[0]['baik']."</strong>";
		$foot[0]['Rusak'] = "<strong>".$foot[0]['rusak']."</strong>";
		
		$responce->footer = $foot;
		if($total == 0){$responce->rows[1][$sidx] = '';}
		//echo $this->db->last_query();
		echo json_encode($responce);
	}

}
?>