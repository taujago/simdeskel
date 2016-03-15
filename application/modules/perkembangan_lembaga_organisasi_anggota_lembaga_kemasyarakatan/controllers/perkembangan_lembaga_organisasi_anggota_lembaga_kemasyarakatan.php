<?php 
class perkembangan_lembaga_organisasi_anggota_lembaga_kemasyarakatan extends op_controller {
	function __construct(){
		parent::__construct();
		$this->load->model("core_model","cm");
		//$this->load->model("pst","dm");
	}


	function index(){
		$form['controller'] = get_class($this);
		$cont = $form['controller'];
		
		$form['title1'] = 'Organisasi anggota lembaga kemasyarakatan';
		$form['title2'] = '';
		$form['table'] = 'perkembangan_lembaga_organisasi_anggota_lembaga_kemasyarakatan';
		$form['id'] = 'perkembangan_lembaga_organisasi_anggota_lembaga_kemasyarakatan';
		$form['f1'] = 'organisasi';
		$form['l1'] = 'Organisasi anggota lembaga kemasyarakatan';
		$form['f2'] = 'ket_teks';
		$form['l2'] = 'Keterangan';
		$form['arr2'] = array("1"=>"Ada","2"=>"Tidak");
		//add
		$form['default'] = 'id';
		$form['url'] = "grid/get_data";
		$content = $this->load->view("$cont/grid",$form,true);
		$this->load->view("$cont/grid_form",$form);
		$this->load->view("$cont/grid_js",$form);
		$this->load->view("$cont/grid_toolbar",$form);
		////////////
		
		$form['title1'] = 'Data organisasi anggota lembaga kemasyarakatan';
		$form['title2'] = '';
		$form['table'] = 'perkembangan_lembaga_data_organisasi';
		$form['id'] = 'perkembangan_lembaga_data_organisasi';
		$form['f1'] = 'data';
		$form['l1'] = 'Data organisasi';
		$form['f2'] = 'cat_teks';
		$form['l2'] = 'Organisasi';
		$form['arr2'] = $this->arr_tabel2("perkembangan_lembaga_organisasi_anggota_lembaga_kemasyarakatan","id","organisasi","ket");
		$form['f3'] = 'ket_teks';
		$form['l3'] = 'Keterangan';
		$form['arr3'] = array("1"=>"Ada","2"=>"Aktif","3"=>"Lengkap","4"=>"Tidak","5"=>"Peraturan desa","6"=>"Peraturan daerah");
		$form['arr3'] = $this->cm->add_arr_head($form['arr3'],"0","Kosong");
		$form['f4'] = 'jumlah';
		$form['l4'] = 'Jumlah';
		$form['f5'] = 'id_satuan_teks';
		$form['l5'] = 'Satuan';
		$form['arr5'] = $this->cm->arr_tabel("master_satuan","id_satuan","satuan","satuan");
		$form['arr5'] = $this->cm->add_arr_head($form['arr5'],"0","Kosong");
		//add
		$form['default'] = 'cat';
		$form['url'] = "grid/get_data";
		$content .= "<br><br>";
		$content .= $this->load->view("$cont/grid2",$form,true);
		$this->load->view("$cont/grid_form2",$form);
		$this->load->view("$cont/grid_js",$form);
		$this->load->view("$cont/grid_toolbar",$form);
		
		//$this->set_title($data['header']);
		$this->set_content($content);
		$this->render();
	}
	
	function arr_tabel2($tb_name, $index, $value, $order_by) {
	
	$arr = array();
	$this->db->order_by($order_by);
	$this->db->where("deleted","0");
	$this->db->where("ket","1");
	$res = $this->db->get($tb_name);
	
	foreach($res->result_array() as $row) : 
		$arr[$row["$index"]] = $row["$value"];
	endforeach;
	
	return $arr;
	}

}
?>