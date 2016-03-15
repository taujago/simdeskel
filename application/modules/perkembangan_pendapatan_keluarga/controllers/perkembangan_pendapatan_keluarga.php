<?php 
class perkembangan_pendapatan_keluarga extends op_controller {
	function __construct(){
		parent::__construct();
		$this->load->model("core_model","cm");
		//$this->load->model("pst","dm");
	}


	function index(){
		$form['controller'] = get_class($this);
		$cont = $form['controller'];
		
		$form['title1'] = 'Pendapatan rill keluarga';
		$form['title2'] = 'pendapatan';
		$form['table'] = 'perkembangan_pendapatan_keluarga';
		$form['id'] = 'perkembangan_pendapatan_keluarga';
		$form['f1'] = 'ket';
		$form['l1'] = 'Keterangan';
		$form['f2'] = 'jumlah';
		$form['l2'] = 'Jumlah';
		$form['f3'] = 'id_satuan_teks';
		$form['l3'] = 'Satuan';
		$form['arr3'] = $this->cm->arr_tabel("master_satuan","id_satuan","satuan","satuan");
		
		//add
		$form['default'] = 'id';
		$form['url'] = "$cont/get_data";
		$content = $this->load->view("$cont/grid",$form,true);
		$this->load->view("$cont/grid_form",$form);
		$this->load->view("$cont/grid_js",$form);
		$this->load->view("$cont/grid_toolbar",$form);
		//$this->set_title($data['header']);
		$this->set_content($content);
		$this->render();
	}

	function get_data()
	{
		$page = $_REQUEST['page']; // get the requested page 
        $limit = $_REQUEST['rows']; // get how many rows we want to have into the grid 
        $sidx = isset($_REQUEST['sort'])?$_REQUEST['sort']:$_REQUEST['default']; // get index row - i.e. user click to sort 
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
		$foot = $this->db->query("SELECT SUM(a.`jumlah`) AS jumlah FROM v_perkembangan_pendapatan_keluarga AS a WHERE a.`id` BETWEEN 3 AND 4")->result_array();
		$temp = $foot;
		$foot[0]['ket'] = "<strong>Jumlah total pendapatan keluarga</strong>";
		$foot[0]['jumlah'] = "<strong>".$foot[0]['jumlah']."</strong>";
		$foot[0]['id_satuan_teks'] = "<strong>Rp</strong>";
		
		$foot2 = $this->db->query("SELECT SUM(a.`jumlah`) AS jumlah FROM v_perkembangan_pendapatan_keluarga AS a WHERE a.`id` BETWEEN 1 AND 2")->result_array();
		$temp = $temp[0]['jumlah']/$foot2[0]['jumlah'];
		$foot[1]['ket'] = "<strong>Rata-rata pendapatan peranggota keluarga</strong>";
		$foot[1]['jumlah'] = "<strong>".$temp."</strong>";
		$foot[1]['id_satuan_teks'] = "<strong>Rp</strong>";
		$responce->footer = $foot;
		if($total == 0){$responce->rows[1][$sidx] = '';}
		//echo $this->db->last_query();
		echo json_encode($responce);
	}

}
?>