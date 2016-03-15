<?php 
class profil_sda_luas_tanaman_obat extends op_controller {
	function __construct(){
		parent::__construct();
		$this->load->model("core_model","cm");
		//$this->load->model("pst","dm");
	}


	function index(){
		$data['controller'] = get_class($this);
		$cont  = get_class($this);
		$data['header'] = "";
		$form['id'] = "luas_tanaman_obat";
		$form['title1'] = "Tanaman apotik hidup dan sejenisnya";
		$form['f1'] = "produksi_tanaman_obat";
		$form['f2'] = "lahan";
		$form['f3'] = "hasil";
		$form['l1'] = "Jenis tanaman";
		$form['l2'] = "Luas (Ha)";
		$form['l3'] = "Produksi (Ton/Ha)";
		$form['url'] = $data['controller']."/get_data";
		$form['table'] = "total_tanaman_obat";
		$form['default'] = "produksi_tanaman_obat";
		$content = $this->load->view("$cont/grid",$form,true);
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
			//var_dump($var);
			$hasil = $var['hasil']/$var['lahan'];
			$var['hasil'] = round($hasil,5);
			$responce->rows[$c] = $var;
			$c++;
		}
		echo json_encode($responce);
	}
}
?>