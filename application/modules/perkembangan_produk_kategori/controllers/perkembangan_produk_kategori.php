<?php 
class perkembangan_produk_kategori extends op_controller {
	function __construct(){
		parent::__construct();
		$this->load->model("core_model","cm");
		//$this->load->model("pst","dm");
	}


	function index(){
		$form['controller'] = get_class($this);
		$cont = $form['controller'];
		
		$form['title1'] = 'Kategori produk domestik desa/kelurahan bruto';
		$form['title2'] = 'Kategori';
		$form['table'] = 'perkembangan_produk_kategori';
		$form['id'] = 'perkembangan_produk_kategori';
		$form['f1'] = 'cat';
		$form['l1'] = 'Kategori';
		$form['f2'] = 'subsek';
		$form['l2'] = 'Subsektor';
		//add
		$form['default'] = $form['f1'];
		$form['url'] = "grid/get_data";
		$content = $this->load->view("$cont/grid",$form,true);
		$this->load->view("$cont/grid_form",$form);
		$this->load->view("$cont/grid_js",$form);
		$this->load->view("$cont/grid_toolbar",$form);
		//////////////
		
		$form['title1'] = 'Kategori produk domestik desa/kelurahan bruto';
		$form['title2'] = 'Kategori';
		$form['table'] = 'perkembangan_produk_item';
		$form['id'] = 'perkembangan_produk_item';
		$form['f1'] = 'cat_teks';
		$form['l1'] = 'Kategori';
		$form['arr1'] = $this->cm->arr_tabel("perkembangan_produk_kategori","id","cat","cat");
		$form['f2'] = 'item';
		$form['l2'] = 'Item';
		$form['f3'] = 'jumlah';
		$form['l3'] = 'Jumlah';
		$form['f4'] = 'id_satuan_teks';
		$form['l4'] = 'Satuan';
		$form['arr4'] = $this->cm->arr_tabel("master_satuan","id_satuan","satuan","satuan");
		//add
		$form['default'] = $form['f1'];
		$form['url'] = "grid/get_data";
		$content .= "<br><br>";
		$content .= $this->load->view("$cont/grid1",$form,true);
		$this->load->view("$cont/grid_form",$form);
		$this->load->view("$cont/grid_js1",$form);
		$this->load->view("$cont/grid_toolbar",$form);
		////
		$form['title1'] = 'Nilai total pendapatan domestik';
		$form['title2'] = 'Nilai total pendapatan domestik';
		$form['table'] = 'perkembangan_produk_item_total';
		$form['id'] = 'perkembangan_produk_item_total';
		$form['f1'] = 'teks';
		$form['l1'] = 'Kategori';
		$form['f2'] = 'item';
		$form['l2'] = 'Total (Rp)';
		//add
		$form['default'] = $form['f1'];
		$form['url'] = "grid/get_data";
		$content .= "<br><br>";
		$content .= $this->load->view("$cont/grid",$form,true);
		$this->load->view("$cont/grid_form",$form);
		$this->load->view("$cont/grid_toolbar1",$form);
		//$this->set_title($data['header']);
		$this->set_content($content);
		$this->render();
	}

}
?>