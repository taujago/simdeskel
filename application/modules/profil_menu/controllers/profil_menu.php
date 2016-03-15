<?php 
class profil_menu extends op_controller {
	function __construct(){
				parent::__construct();
		$this->load->model("core_model","cm");
		$this->load->model("sm","mm");
        $this->load->model("add_model","am");
		$this->load->helper("tanggal"); 
	}


	function index(){
		
		$data['controller'] = get_class($this);
		
		$data['header'] = "Profil Desa";
		$data['title'] = $data['header'];
		$content = $this->load->view($data['controller']."_view",$data,true);
		$this->set_title($data['header']);
		$this->set_content($content);
		$this->render();
	}
	

	
function menu($q="",$s=""){
		

		function category_list( $pid = 0,$q="") 
		{ 

		    // build our category list only once 
		    static $cats; 

		    if ( ! is_array( $cats ) ) 
		    { 
				$temp = urldecode($q);
		        $sql  = "SELECT * FROM profil_menu where name like '%$temp%'"; 
				//echo $sql ."<br />";
		        $res  = mysql_query( $sql ); 
		        if(!$res) {
		        	echo "erorro... " . mysql_error();
		        }
		        $cats = array(); 
		         
		        while ( $cat = mysql_fetch_assoc( $res ) ) 
		        { 
		            $cats[] = $cat; 
		        } 
		    } 

		    // populate a list items array 
		    $list_items = array(); 
			//var_dump($cats);
		    foreach ( $cats as $cat ) 
		    { 
				if(empty($q)){
					// if not a match, move on
					if ( ( int ) $cat['pid'] !== ( int ) $pid ) 
					{ 
						continue; 
					} 
					// open the list item 
					$list_items[] = '<li>'; 
	
					// construct the category link 
					if(!empty($cat['controller'])){
						$list_items[] = '<a href="'. site_url($cat['controller']) .'">'; 
						$list_items[] = $cat['name']; 
						$list_items[] = '</a>'; 
					}
					else{
						$list_items[] = $cat['name'];
					}
	
					// recurse into the child list 
					$list_items[] = category_list( $cat['id']); 
	
					// close the list item 
					$list_items[] = '</li>'; 
				}
				else{
					if(!empty($cat['controller'])){
					$list_items[] = '<li>';
					$list_items[] = '<a href="'. site_url($cat['controller']) .'">'; 
					$list_items[] = $cat['name']; 
					$list_items[] = '</a>'; 
					//$list_items[] = category_list( $cat['id'], $q);
					$list_items[] = '</li>'; 
					}
				}
		    } 

		    // convert to a string 
		    $list_items = implode( '', $list_items ); 
			
		    // if empty, no list items! 
		    if ( '' == trim( $list_items ) ) 
		    { 
		        return ''; 
		    } 
			//echo htmlentities($list_items);
		    // ...otherwise, return the list 
		    return '<ul>' . $list_items . '</ul>'; 

		}  

		echo category_list('0',$q);  
	}
	
	function cetak($data='')
	{
		$cont = get_class($this);
		$q = "SELECT * FROM setting_desa AS a JOIN lokasi AS b ON a.`id_desa` = b.`id_desa`";
		$res = $this->db->query($q)->result_array();
		$temp['desa'] = $res[0];
		if($data == 'perkembangan_menu')
		{
			$data = $this->am->arr_cetak_perkembangan();
			$temp['str'] = "TINGKAT PERKEMBANGAN DESA DAN KELURAHAN"; 
		}
		else{
			$data = $this->am->arr_cetak_profil();
			$temp['str'] = "POTENSI DESAN DAN KELURAHAN"; 
		}
		$this->load->view("$cont/potensi",$temp);
		echo "<style>
				.thin{
					border:1px solid black;
				}
				.menjorok{
					position:relative;
					left:30px;
				}
				.dekat{
					margin-top:-17px;
				}
				.left{
					text-align:left;
				}
			</style>";
		foreach($data as $val)
		{
			if(!isset($val['except'])){
				//var_dump($val);
				if(isset($val['title'])){
					$temp['t'] = $val['title'];
					unset($val['title']);
				}
				else{ $temp['t'] = ''; }
				if(isset($val['title1'])){
					$temp['t1'] = $val['title1'];
					unset($val['title1']);
				}
				else{ $temp['t1'] = ''; }
				if(isset($val['h'])){
					$temp['h'] = $val['h'];
					unset($val['h']);
				}
				else{ $temp['h'] = ''; }
				if(isset($val['border'])){
					$temp['b'] = $val['border'];
					unset($val['border']);
				}
				else{ $temp['b'] = '0'; }
				if(isset($val['melekat'])){
					$temp['m'] = $val['melekat'];
					unset($val['melekat']);
				}
				else{ $temp['m'] = '0'; }
				if(isset($val['merge'])){
					$temp['merge'] = $val['merge'];
					unset($val['merge']);
				}
				else{ $temp['merge'] = ''; }
				$table = $val[1];
				unset($val[1]);
				$temp['data'] = $this->mm->export($val);
				$temp['row'] = $this->mm->get($temp['data'],$table);
				//var_dump($temp);
				$this->load->view("$cont/table",$temp);
				//unset($val['t']);unset($val['t1']);
			}
			else{
					$table = $val['except'];
					if($table == 'v_profil_sdm_lembaga_kemasyarakatan'){
						$temp['data'] = $this->mm->get_all($table,'order_lembaga');
						$temp['rw'] = $this->mm->get_all('profil_sdm_rw');
						$temp['rt'] = $this->mm->get_all('profil_sdm_rt');
						//var_dump($tes1);
						$this->load->view("$cont/table_lembaga",$temp);
					}
					else if($table == 'v_profil_sdm_partai_politik'){
						$temp['data'] = $this->mm->get_all($table);
						$temp['underbow'] = $this->mm->get_all('profil_sdm_underbow','','del');
						$this->load->view("$cont/table_lembaga_politik",$temp);
					}
					else if($table == 'v_perkembangan_perkapita_struktur_pencaharian'){
						$temp['data'] = $this->mm->get_all($table);
						$this->load->view("$cont/table_struktur_pencaharian",$temp);
					}
					else if($table == 'v_perkembangan_produk_item'){
						$temp['data'] = $this->mm->get_all($table,'subsek');
						$temp['data2'] = $this->mm->get_all('perkembangan_produk_item_total');
						$this->load->view("$cont/table_produk_domestik",$temp);
					}
					else if($table == 'pendapatan_perkapita_sektor'){
						$arr = "v_perkembangan_perkapita_pertanian,v_perkembangan_perkapita_perkebunan,v_perkembangan_perkapita_peternakan,v_perkembangan_perkapita_perikanan,v_perkembangan_perkapita_kerajinan,v_perkembangan_perkapita_pertambangan,v_perkembangan_perkapita_kehutanan,v_perkembangan_perkapita_industri,v_perkembangan_perkapita_jasa";
						$tit = "A.1. PERTANIAN,A.2. PERKEBUNAN,A.3. PETERNAKAN,A.4. PERIKANAN,A.5. KERAJINAN,A.6. PERTAMBANGAN,A.7. KEHUTANAN,A.8. INDUSTRI KECIL&#44; MENENGAH DAN BESAR,A.9. JASA DAN PERDAGANGAN";
						$arr = explode(",",$arr);
						$tit = explode(",",$tit);
						$dat = array();
						$c = 0;
						foreach($arr as $i=>$val){
							$dat[$c] = $this->mm->get_all($val);
							$dat[$c]['title'] = $tit[$i];
							$c++;
						}
						$temp['data'] = $dat;
						//die();
						$this->load->view("$cont/table_pendapatan_perkapita",$temp);
					}
					else if($table == 'v_profil_sdm_prasarana_darat'){
						$t1 = $this->mm->get_all($table,'id');
						$t2 = $this->mm->get_all('profil_sdm_prasarana_darat2');
						$t3 = $this->mm->get_all('profil_sdm_prasarana_darat3');
						$new1 = array();
						foreach($t2 as $i=>$val){
							$new1[$i] = $val;
							$new1[$i]['cat_teks'] = "Jembatan Desa/Kelurahan";
						}
						$new2 = array();
						foreach($t3 as $i=>$val){
							$new2[$i] = $val;
							$new2[$i]['cat_teks'] = "Prasarana Angkutan Darat";
						}
						$new = array_merge($t1,$new1,$new2);
						$temp['data'] = $new;
						$this->load->view("$cont/table_transportasi_darat",$temp);
					}
					else if($table == 'v_profil_sdm_pendidikan_formal_keagamaan'){
						$temp['data'] = $this->mm->get_all($table);
						$this->load->view("$cont/table_pendidikan_keagamaan",$temp);
					}
					else if($table == 'v_profil_sarana_lembaga_kemasyarakatan'){
						$temp['data'] = $this->mm->get_all($table,'ordr');
						$this->load->view("$cont/table_prasarana_sarana",$temp);
					}
					else if($table == 'profil_sdm_jasa_pengangkutan'){
						$table = 'v_profil_sdm_jasa_pengangkutan';
						$temp['title'] = '4. Usaha Jasa Pengangkutan';
						$temp['dekat'] = ' dekat';
						$temp['data'] = $this->mm->get_all($table);
						$this->load->view("$cont/table2",$temp);
						$table = 'v_profil_sdm_jasa_pengangkutan2';
						$temp['title'] = 'Angkutan Sungai';
						$temp['dekat'] = ' dekat';
						$temp['style'] = 'style="text-align:left"';
						$temp['data'] = $this->mm->get_all($table);
						$this->load->view("$cont/table2",$temp);
					}
			}
		}
	}
	

}
?>