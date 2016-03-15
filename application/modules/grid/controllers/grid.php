<?php 
class grid extends  op_controller {
 	function __construct() {
		parent::__construct();
		$this->load->model("core_model","cm");	 
	}
	
 function get_data()
	{
		$page = $_REQUEST['page']; // get the requested page 
        $limit = $_REQUEST['rows']; // get how many rows we want to have into the grid 
        $sidx = isset($_REQUEST['sort'])?$_REQUEST['sort']:$_REQUEST['default']; // get index row - i.e. user click to sort 
        $sord = isset($_REQUEST['order'])?$_REQUEST['order']:"asc"; // get the direction if(!$sidx) $sidx =1;
		$table = $_REQUEST['table']; // nama tabel yang di-request 
		$del = isset($_REQUEST['del'])?$_REQUEST['del']:""; // nama tabel yang di-request 
		$id = isset($_REQUEST['id_penduduk'])?$_REQUEST['id_penduduk']:""; // nama tabel yang di-request 
		$res = $this->cm->get_grid_data($page,$limit,$sidx,$sord,$table,$del,$id);
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
		if($total == 0){$responce->rows[1][$sidx] = '';}
		//echo $this->db->last_query();
		echo json_encode($responce);
	}
	
function simpan(){
        $data = $this->input->post();
		
		$table = $data['tab'];
		unset($data['tab']);
		unset($data['id']);
		$temp = $this->validation($data,$table);
		if($temp['ret'] == true){
			$res = $this->db->insert($table,$data);
					if($res) {    
					$ret = array("success"=>true,
								"pesan"=>"Data berhasil disimpan",
								"operation" =>"insert");
					}
					else {
					 $ret = array("success"=>false,
								"pesan"=>"Data gagal disimpan" .mysql_error(),
								"operation" =>"insert");   
					}
		}
		else{
			 $ret = array("success"=>false,
								"pesan"=>$temp['err'],
								"operation" =>"insert");   
		}
		//echo $this->db->last_query();
        echo json_encode($ret);
}
function hapus_det($table){
    $data = $this->input->post();
    $ids = explode(",", $data['ids']);
	$res = $this->hapus_except($table,$data);
	if($res['f']==0){
		foreach($ids as $id) {
			$this->db->where("id",$id);
			$this->db->update($table,array("deleted"=>1));
			//echo $this->db->last_query();
		}
		echo json_encode(array("success"=>true,"pesan"=>"Berhasil dihapus"));
	}
	else{
		echo json_encode(array("success"=>false,"pesan"=>$res['psn'],"operation"=>"insert"));
	}
}
function hapus_except($table,$data){
	$ids = explode(",", $data['ids']);
	if($table == 'profil_sdm_pendidikan_formal_keagamaan_cat'){
		$flag = true;
		foreach($ids as $id) {
			$query = "SELECT id FROM  profil_sdm_pendidikan_formal_keagamaan AS a WHERE a.cat = $id AND a.deleted=0";
			$res = $this->db->query($query)->result();
			if(!empty($res[0])){
				$flag = false;
				$i = $id;
				break;
			}
		}
		if($flag==false){
			$res = $this->db->query("select cat from profil_sdm_pendidikan_formal_keagamaan_cat where id = $i")->result();
			$temp['psn'] = "Kategori ".$res[0]->cat." masih dipakai";
			$temp['f'] = 1;
			return $temp;
		}
		$tmp['f'] = 0;
		return $tmp;
	}
	if($table == 'profil_sarana_lembaga_kemasyarakatan_cat'){
		$flag = true;
		foreach($ids as $id) {
			$query = "SELECT id FROM  profil_sarana_lembaga_kemasyarakatan AS a WHERE a.cat = $id AND a.deleted=0";
			$res = $this->db->query($query)->result();
			if(!empty($res[0])){
				$flag = false;
				$i = $id;
				break;
			}
		}
		if($flag==false){
			$res = $this->db->query("select cat from profil_sarana_lembaga_kemasyarakatan_cat where id = $i")->result();
			$temp['psn'] = "Kategori ".$res[0]->cat." masih dipakai";
			$temp['f'] = 1;
			return $temp;
		}
		$tmp['f'] = 0;
		return $tmp;
	}
}
function update_det(){
	 $data = $this->input->post();
	 $table = $data['tab'];
	 unset($data['tab']);
	 if(isset($data['milik_adat'])){
		 $data['milik_adat'] == 'Ya' ? $data['milik_adat'] = 1 : $data['milik_adat'] = 0;
		 $data['milik_perorangan'] == 'Ya' ? $data['milik_perorangan'] = 1 : $data['milik_perorangan'] = 0;
	 }
	 $temp = $this->validation($data,$table);
		if($temp['ret'] == true){
			 $this->db->where("id",$data['id']);
			 $res = $this->db->update($table,$data);
			 if($res) {    
				$ret = array("success"=>true,
				"pesan"=>"Data berhasil disimpan",
				"operation" =>"insert");
			}
			else {
			$ret = array("success"=>false,
				"pesan"=>"Data gagal disimpan\n" .mysql_error(),
				"operation" =>"insert");   
			}
		}
		else{
			 $ret = array("success"=>false,
								"pesan"=>$temp['err'],
								"operation" =>"insert");   
		}
	echo json_encode($ret);
}  

function validation($data,$table){
	$this->load->library('form_validation');
	if($table == 'profil_sdm_kantor_pos'){
		$this->form_validation->set_rules('kantor','Kantor pos ','required');
	}
	else if($table == 'profil_sdm_telepon'){
	$this->form_validation->set_rules('telepon','Telepon ','required');
	}
	else if($table == 'profil_sarana_lembaga_kemasyarakatan_cat'){
	$this->form_validation->set_rules('cat','Nama kategori  ','required');
	$this->form_validation->set_rules('ordr','Urutan/Order  ','required');
	}
	else if($table == 'profil_sarana_lembaga_kemasyarakatan'){
	$this->form_validation->set_rules('cat','Kategori  ','required');
	$this->form_validation->set_rules('sarana','Prasarana dan sarana  ','required');
	}
	else if($table == 'profil_sarana_kebersihan'){
	$this->form_validation->set_rules('sarana','Prasarana dan sarana ','required');
	}

	else if($table == 'perkembangan_pengangguran'){
	$this->form_validation->set_rules('pengangguran','pengangguran ','required');
	$this->form_validation->set_rules('jumlah','Jumlah ','required');
	}
	else if($table == 'perkembangan_kesejahteraan_keluarga'){
	$this->form_validation->set_rules('ket','Keterangan ','required');
	$this->form_validation->set_rules('jumlah','Jumlah ','required');
	}
	else if($table == 'perkembangang_perkapita_pertanian'){
	$this->form_validation->set_rules('ket','keterangan ','required');
	}
	else if($table == 'perkembangan_perkapita_pertanian'){
	$this->form_validation->set_rules('ket','Keterangan ','required');
	$this->form_validation->set_rules('jumlah','Jumlah ','required');
	$this->form_validation->set_rules('id_satuan','Satuan ','required');
	}
	else if($table == 'perkembangan_perkapita_perkebunan'){
	$this->form_validation->set_rules('ket','Keterangan ','required');
	$this->form_validation->set_rules('jumlah','Jumlah ','required');
	$this->form_validation->set_rules('id_satuan','Satuan ','required');
	}
	else if($table == 'perkembangan_perkapita_peternakan'){
	$this->form_validation->set_rules('ket','Keterangan ','required');
	$this->form_validation->set_rules('jumlah','Jumlah ','required');
	$this->form_validation->set_rules('id_satuan','Satuan ','required');
	}
	else if($table == 'perkembangan_perkapita_perikanan'){
	$this->form_validation->set_rules('ket','Keterangan ','required');
	$this->form_validation->set_rules('jumlah','Jumlah ','required');
	$this->form_validation->set_rules('id_satuan','Satuan ','required');
	}
	else if($table == 'perkembangan_perkapita_kerajinan'){
	$this->form_validation->set_rules('ket','Keterangan ','required');
	$this->form_validation->set_rules('jumlah','Jumlah ','required');
	$this->form_validation->set_rules('id_satuan','Satuan ','required');
	}
	else if($table == 'perkembangan_perkapita_pertambangan'){
	$this->form_validation->set_rules('ket','Keterangan ','required');
	$this->form_validation->set_rules('jumlah','Jumlah ','required');
	$this->form_validation->set_rules('id_satuan','Satuan ','required');
	}
	else if($table == 'perkembangan_perkapita_kehutanan'){
	$this->form_validation->set_rules('ket','Keterangan ','required');
	$this->form_validation->set_rules('jumlah','Jumlah ','required');
	$this->form_validation->set_rules('id_satuan','Satuan ','required');
	}
	else if($table == 'perkembangan_perkapita_industri'){
	$this->form_validation->set_rules('ket','Keterangan ','required');
	$this->form_validation->set_rules('jumlah','Jumlah ','required');
	$this->form_validation->set_rules('id_satuan','Satuan ','required');
	}
	else if($table == 'perkembangan_perkapita_jasa'){
	$this->form_validation->set_rules('ket','Keterangan ','required');
	$this->form_validation->set_rules('jumlah','Jumlah ','required');
	$this->form_validation->set_rules('id_satuan','Satuan ','required');
	}
	else if($table == 'perkembangan_pendapatan_keluarga'){
	$this->form_validation->set_rules('ket','keterangan ','required');
	}
	else if($table == 'perkembangan_pendapatan_keluarga'){
	$this->form_validation->set_rules('ket','keterangan ','required');
	}
	else if($table == 'perkembangan_wajib_belajar'){
	$this->form_validation->set_rules('ket','Keterangan ','required');
	$this->form_validation->set_rules('jumlah','Jumlah ','required');
	}
	else if($table == 'perkembangan_rasio_guru'){
	$this->form_validation->set_rules('ket','Keterangan ','required');
	$this->form_validation->set_rules('jumlah','Jumlah ','required');
	}
	else if($table == 'perkembangan_kelembagaan_pendidikan'){
	$this->form_validation->set_rules('ket','Keterangan ','required');
	$this->form_validation->set_rules('jumlah','Jumlah ','required');
	$this->form_validation->set_rules('id_satuan','Satuan ','required');
	}
	else if($table == 'perkembangan_pemerintahan_apbdesa'){
	$this->form_validation->set_rules('apb','APD-Desa ','required');
	}
	else if($table == 'perkembangan_pemerintahan_pertanggungjawaban'){
	$this->form_validation->set_rules('jenis','pertanggungjawaban ','required');
	}
	else if($table == 'perkembangan_prasarana_desa'){
	$this->form_validation->set_rules('sarana','Prasarana dan administrasi ','required');
	}
	else if($table == 'perkembangan_prasarana_alat_tulis'){
	$this->form_validation->set_rules('inventaris','Inventaris dan alat tulis kantor ','required');
	}
	else if($table == 'perkembangan_prasarana_administrasi_pemerintahan'){
	$this->form_validation->set_rules('administrasi','Administrasi pemerintahan desa/kelurahan ','required');
	}
	else if($table == 'perkembangan_prasarana_bpd'){
	$this->form_validation->set_rules('bpd','Administrasi pemerintahan desa/kelurahan ','required');
	}
	else if($table == 'perkembangan_prasarana_inventaris'){
	$this->form_validation->set_rules('inventaris','Inventaris dan alat tulis kantor ','required');
	$this->form_validation->set_rules('jumlah','Jumlah ','required');
	}
	else if($table == 'perkembangan_prasarana_dusun'){
	$this->form_validation->set_rules('sarana','Prasarana dan sarana ','required');
	}
	else if($table == 'perkembangan_prasarana_inventaris_dusun'){
	$this->form_validation->set_rules('inventaris','Prasarana dan sarana ','required');
	$this->form_validation->set_rules('jumlah','Jumlah ','required');
	}
	else if($table == 'perkembangan_prasarana_pembinaan_desa'){
	$this->form_validation->set_rules('jenis','jenis pembinaan ','required');
	}
	else if($table == 'perkembangan_prasarana_pembinaan_provinsi_desa'){
	$this->form_validation->set_rules('jenis','jenis pembinaan ','required');
	}
	else if($table == 'perkembangan_prasarana_pembinaan_kabupaten_desa'){
	$this->form_validation->set_rules('jenis','jenis pembinaan ','required');
	}
	else if($table == 'perkembangan_lembaga_kemasyarakatan_desa'){
	$this->form_validation->set_rules('lembaga','lembaga kemasyarakatan ','required');
	}
	else if($table == 'perkembangan_lembaga_organisasi_anggota_lembaga_kemasyarakatan'){
	$this->form_validation->set_rules('organisasi','lembaga kemasyarakatan ','required');
	}
	else if($table == 'perkembangan_lembaga_data_organisasi'){
	$this->form_validation->set_rules('data','data organisasi ','required');
	}
	else if($table == 'perkembangan_kedaulatan_etos_kerja'){
	$this->form_validation->set_rules('etos_kerja','Etos kerja ','required');
	$this->form_validation->set_rules('ket','Keterangan ','required');
	}
	else if($table == 'perkembangan_kedaulatan_adat'){
	$this->form_validation->set_rules('adat','Adat ','required');
	$this->form_validation->set_rules('ket','Keterangan ','required');
	}
	else if($table == 'perkembangan_kedaulatan_mental'){
	$this->form_validation->set_rules('mental','mental ','required');
	}
	else if($table == 'perkembangan_kedaulatan_kegotongroyongan'){
	$this->form_validation->set_rules('gotongroyong','Semangat kegotongroyongan ','required');
	}
	else if($table == 'perkembangan_kedaulatan_peranserta'){
	$this->form_validation->set_rules('peranserta','Peranserta masyarakat ','required');
	}
	else if($table == 'perkembangan_kedaulatan_musyawarah'){
	$this->form_validation->set_rules('musyawarah','Musyawarah ','required');
	}
	else if($table == 'perkembangan_kedaulatan_kesadaran'){
	$this->form_validation->set_rules('kesadaran','Kesadaran ','required');
	$this->form_validation->set_rules('jumlah','Jumlah ','required');
	$this->form_validation->set_rules('id_satuan','Satuan ','required');
	}
	else if($table == 'perkembangan_kedaulatan_kesadaran_pajak'){
	$this->form_validation->set_rules('kesadaran_pajak','Kesadaran ','required');
	$this->form_validation->set_rules('jumlah','Jumlah ','required');
	$this->form_validation->set_rules('id_satuan','Satuan ','required');
	}
	else if($table == 'perkembangan_kedaulatan_kesadaran_partai_politik'){
	$this->form_validation->set_rules('parpol','Kesadaran ','required');
	$this->form_validation->set_rules('jumlah','Jumlah ','required');
	$this->form_validation->set_rules('id_satuan','Satuan ','required');
	}
	else if($table == 'perkembangan_kedaulatan_kesadaran_kepala_daerah'){
	$this->form_validation->set_rules('kepala_daerah','Kesadaran ','required');
	$this->form_validation->set_rules('jumlah','Jumlah ','required');
	$this->form_validation->set_rules('id_satuan','Satuan ','required');
	}
	else if($table == 'perkembangan_penguasaan_aset_tanah'){
	$this->form_validation->set_rules('aset','Aset tanah ','required');
	$this->form_validation->set_rules('jumlah','Jumlah ','required');
	}
	else if($table == 'perkembangan_tempat_persalinan'){
	$this->form_validation->set_rules('tempat_persalinan','Tempat persalinan ','required');
	$this->form_validation->set_rules('jumlah','Jumlah ','required');
	}
	else if($table == 'perkembangan_angka_harapan_hidup'){
	$this->form_validation->set_rules('harapan','Angka harapan hidup ','required');
	$this->form_validation->set_rules('jumlah','Jumlah ','required');
	}
	else if($table == 'perkembangan_perilaku_kebiasaan_berobat'){
	$this->form_validation->set_rules('kebiasaan','Kebiasaan ','required');
	$this->form_validation->set_rules('ket','Keterangan ','required');
	}
	else if($table == 'perkembangan_sarana_prasarana_kesehatan'){
	$this->form_validation->set_rules('perkembangan','perkembangan sarana dan prasarana ','required');
	}
	else if($table == 'perkembangan_keamanan_konflik_sara'){
	$this->form_validation->set_rules('konflik','Konflik SARA ','required');
	$this->form_validation->set_rules('jumlah','Jumlah ','required');
	$this->form_validation->set_rules('id_satuan','Satuan ','required');
	}
	else if($table == 'perkembangan_keamanan_perkelahian'){
	$this->form_validation->set_rules('perkelahian','Perkelahian ','required');
	$this->form_validation->set_rules('jumlah','Jumlah ','required');
	$this->form_validation->set_rules('id_satuan','Satuan ','required');
	}
	else if($table == 'perkembangan_keamanan_pencurian'){
	$this->form_validation->set_rules('pencurian','Pencurian ','required');
	$this->form_validation->set_rules('jumlah','Jumlah ','required');
	$this->form_validation->set_rules('id_satuan','Satuan ','required');
	}
	else if($table == 'perkembangan_keamanan_penjarahan'){
	$this->form_validation->set_rules('penjarahan','Penjarahan ','required');
	$this->form_validation->set_rules('jumlah','Jumlah ','required');
	$this->form_validation->set_rules('id_satuan','Satuan ','required');
	}
	else if($table == 'perkembangan_keamanan_perjudian'){
	$this->form_validation->set_rules('perjudian','Perjudian, penipuan dan penggelapan ','required');
	$this->form_validation->set_rules('jumlah','Jumlah ','required');
	$this->form_validation->set_rules('id_satuan','Satuan ','required');
	}
	else if($table == 'perkembangan_keamanan_miras'){
	$this->form_validation->set_rules('miras','Pemakaian minuman keras ','required');
	$this->form_validation->set_rules('jumlah','Jumlah ','required');
	$this->form_validation->set_rules('id_satuan','Satuan ','required');
	}
	else if($table == 'perkembangan_keamanan_pembunuhan'){
	$this->form_validation->set_rules('pembunuhan','Pembunuhan ','required');
	$this->form_validation->set_rules('jumlah','Jumlah ','required');
	$this->form_validation->set_rules('id_satuan','Satuan ','required');
	}
	else if($table == 'perkembangan_keamanan_penculikan'){
	$this->form_validation->set_rules('penculikan','Penculikan ','required');
	$this->form_validation->set_rules('jumlah','Jumlah ','required');
	$this->form_validation->set_rules('id_satuan','Satuan ','required');
	}
	else if($table == 'perkembangan_keamanan_kejahatan_seksual'){
	$this->form_validation->set_rules('kejahatan_seksual','Kejahatan seksual ','required');
	$this->form_validation->set_rules('jumlah','Jumlah ','required');
	$this->form_validation->set_rules('id_satuan','Satuan ','required');
	}
	else if($table == 'perkembangan_keamanan_kesejahteraan_sosial'){
	$this->form_validation->set_rules('kesejahteraan_sosial','Kesejahteraan sosial ','required');
	$this->form_validation->set_rules('jumlah','Jumlah ','required');
	$this->form_validation->set_rules('id_satuan','Satuan ','required');
	}
	else if($table == 'perkembangan_keamanan_teror'){
	$this->form_validation->set_rules('keamanan_teror','Teror dan intimidasi ','required');
	$this->form_validation->set_rules('jumlah','Jumlah ','required');
	$this->form_validation->set_rules('id_satuan','Satuan ','required');
	}
	else if($table == 'perkembangan_pelembagaan_keamanan'){
	$this->form_validation->set_rules('pelembagaan','Pelembagaan sistem keamanan ','required');
	}
	else if($table == 'perkembangan_keamanan_prostitusi'){
	$this->form_validation->set_rules('prostitusi','prostitusi ','required');
	}
	else if($table == 'perkembangan_keamanan_kekerasan_rumah'){
	$this->form_validation->set_rules('kekerasan_rumah','kekerasan dalam rumah tangga ','required');
	$this->form_validation->set_rules('jumlah','Jumlah ','required');
	$this->form_validation->set_rules('id_satuan','Satuan ','required');
	}
	else if($table == 'perkembangan_pendidikan_penduduk'){
	$this->form_validation->set_rules('tingkat_pendidikan','tingkat pendidikan ','required');
	}
	else if($table == 'perkembangan_kesehatan_cakupan_immunisasi'){
	$this->form_validation->set_rules('immunisasi','cakupan immunisasi ','required');
	}
	else if($table == 'perkembangan_kesehatan_pasangan_subur'){
	$this->form_validation->set_rules('pasangan','pasangan usia subur ','required');
	}
	else if($table == 'perkembangan_kesehatan_wabah'){
	$this->form_validation->set_rules('penyakit','Wabah penyakit ','required');
	$this->form_validation->set_rules('ket','Keterangan ','required');
	$this->form_validation->set_rules('jumlah','Jumlah ','required');
	}
	else if($table == 'perkembangan_kesehatan_sakit'){
	$this->form_validation->set_rules('id_jenis_penyakit','Penyakit ','required');
	$this->form_validation->set_rules('jumlah','Jumlah ','required');
	$this->form_validation->set_rules('rawat','Di rawat di ','required');
	}
	else if($table == 'perkembangan_jumlah_penduduk'){
	$this->form_validation->set_rules('jumlah','jumlah ','required');
	}
	else if($table == 'perkembangan_jumlah_keluarga'){
	$this->form_validation->set_rules('jumlah','jumlah ','required');
	}
	else if($table == 'perkembangan_penentuan_kepala_desa'){
	$this->form_validation->set_rules('penentuan','Penentuan ','required');
	$this->form_validation->set_rules('ket','Keterangan ','required');
	}
	else if($table == 'perkembangan_penentuan_bpd'){
	$this->form_validation->set_rules('bpd','Penentuan ','required');
	$this->form_validation->set_rules('ket','Keterangan ','required');
	}
	else if($table == 'perkembangan_pemilihan_fungsi'){
	$this->form_validation->set_rules('lemabaga','Penentuan ','required');
	$this->form_validation->set_rules('ket','Keterangan ','required');
	}
	else if($table == 'profil_lembaga_keamanan'){
	$this->form_validation->set_rules('satpam','satpam swakarsa ','required');
	}
	else if($table == 'profil_sarana_tv'){
	$this->form_validation->set_rules('radio','radio/TV ','required');
	}
	else if($table == 'profil_sarana_dusun'){
	$this->form_validation->set_rules('sarana','Prasarana dan sarana ','required');
	}
	else if($table == 'profil_sarana_bpd'){
	$this->form_validation->set_rules('bpd','Administrasi BPD ','required');
	}
	else if($table == 'profil_sarana_inventaris_bpd'){
	$this->form_validation->set_rules('inventaris','inventaris dan alat tulis ','required');
	}
	else if($table == 'profil_sarana_inventaris_bpd'){
	$this->form_validation->set_rules('sarana','prasarana dan sarana ','required');
	}
	else if($table == 'profil_sarana_prasarana_bpd'){
	$this->form_validation->set_rules('sarana','prasarana dan sarana ','required');
	}
	else if($table == 'profil_sarana_sanitasi'){
	$this->form_validation->set_rules('sanitasi','Sanitasi ','required');
	}
	else if($table == 'perkembangan_produk_kategori'){
		$this->form_validation->set_rules('cat','Kategori ','required');
		$this->form_validation->set_rules('subsek','Subsektor ','required');
	}
	else if($table == 'profil_sda_pemilikan_lahan_pertanian'){
		//$this->form_validation->set_rules('kepemilikan_lahan','Kepemilikan lahan ','required');
		$this->form_validation->set_rules('jumlah','Jumlah ','required');
	}
	else if($table == 'profil_sda_kepemilikan_perkebunan'){
		//$this->form_validation->set_rules('kepemilikan_lahan','Kepemilikan lahan ','required');
		$this->form_validation->set_rules('total','Jumlah ','required');
	}
	else if($table == 'profil_sda_kepemilikan_buah'){
		//$this->form_validation->set_rules('kepemilikan_lahan','Kepemilikan lahan ','required');
		$this->form_validation->set_rules('hasil','Jumlah pemilik ','required');
	}
	else if($table == 'profil_sda_pemasaran_hasil_buah'){
		$this->form_validation->set_rules('id_pemasaran_hasil','Pemasaran hasil ','required');
		$this->form_validation->set_rules('keterangan','Keterangan ','required');
	}
	else if($table == 'profil_sda_luas_hasil_perkebunan'){
		$this->form_validation->set_rules('id_produksi_perkebunan','Jenis tanaman ','required');
	}
	else if($table == 'profil_sda_hasil_hutan'){
		$this->form_validation->set_rules('id_produksi_hutan','Hasil hutan ','required');
		$this->form_validation->set_rules('hasil','Hasil ','required');
		$this->form_validation->set_rules('id_satuan','Satuan ','required');
	}
	else if($table == 'profil_sda_kondisi_hutan'){
		$this->form_validation->set_rules('kondisi_hutan','Kondisi hutan ','required');
		$this->form_validation->set_rules('luas_baik','Baik ','required');
		$this->form_validation->set_rules('luas_rusak','Rusak ','required');
	}
	else if($table == 'profil_sda_dampak_pengolahan_hutan'){
		$this->form_validation->set_rules('dampak','Dampak ','required');
		$this->form_validation->set_rules('keterangan','Keterangan ','required');
	}
	else if($table == 'profil_sda_luas_lahan_kehutanan'){
		$this->form_validation->set_rules('luas_lahan','Kepemilikan ','required');
		$this->form_validation->set_rules('nilai','Luas ','required');
	}
	else if($table == 'profil_sda_ketersediaan_lahan_ternak'){
		$this->form_validation->set_rules('ketersediaan_lahan_ternak','Ketersediaan lahan ','required');
		$this->form_validation->set_rules('nilai','Luas ','required');
	}
	else if($table == 'profil_sda_pakan_ternak'){
		$this->form_validation->set_rules('pakan_ternak','Ketersediaan pakan ternak','required');
		$this->form_validation->set_rules('nilai','Keterangan ','required');
		$this->form_validation->set_rules('id_satuan','Satuan ','required');
	}
	else if($table == 'profil_sda_jenis_sarana_produksi_ikan'){
		$this->form_validation->set_rules('jenis_sarana_produksi_ikan','Jenis alat ','required');
		$this->form_validation->set_rules('nilai1','Jumlah ','required');
		$this->form_validation->set_rules('id_satuan','Satuan ','required');
		$this->form_validation->set_rules('nilai2','Produksi ','required');
	}
	else if($table == 'profil_sda_produksi_bahan_galian'){
		$this->form_validation->set_rules('id_bahan_galian','Bahan galian ','required');
		$this->form_validation->set_rules('produksi','Volume produksi ','required');
	}
	else if($table == 'profil_sda_pengelolaan_bahan_galian'){
		$this->form_validation->set_rules('id_bahan_galian','Bahan galian ','required');
		$this->form_validation->set_rules('id_pengelola','Pengelola/pemilik ','required');
	}
	else if($table == 'profil_sda_kualitas_air'){
		$this->form_validation->set_rules('kualitas','kualitas air ','required');
		$this->form_validation->set_rules('ket','Keterangan ','required');
	}
	else if($table == 'profil_sda_sungai'){
		$this->form_validation->set_rules('kondisi','Kondisi ','required');
		$this->form_validation->set_rules('keterangan','Keterangan ','required');
	}
	else if($table == 'profil_sda_rawa'){
		$this->form_validation->set_rules('rawa','Pemanfaatan ','required');
		$this->form_validation->set_rules('jumlah','Jumlah ','required');
		$this->form_validation->set_rules('keterangan','Keterangan ','required');
	}
	else if($table == 'profil_sda_kondisi_danau'){
		$this->form_validation->set_rules('kondisi','Kondisi ','required');
		$this->form_validation->set_rules('ket','Keterangan ','required');
	}
	else if($table == 'profil_sda_air_panas'){
		$this->form_validation->set_rules('sumber','Sumber ','required');
		$this->form_validation->set_rules('jumlah','Jumlah ','required');
		$this->form_validation->set_rules('pemanfaatan','Pemanfaatan ','required');
		$this->form_validation->set_rules('pemda','Pemda ','required');
		$this->form_validation->set_rules('swasta','Swasta ','required');
		$this->form_validation->set_rules('adat','Adat ','required');
	}
	else if($table == 'profil_sda_kualitas_udara'){
		$this->form_validation->set_rules('sumber','Sumber ','required');
		$this->form_validation->set_rules('jumlah','Jumlah lokasi ','required');
		$this->form_validation->set_rules('polutan','Polutan ','required');
		$this->form_validation->set_rules('efek_kesehatan','Efek kesehatan ','required');
		$this->form_validation->set_rules('kepemilikan','Kepemilikan ','required');
	}
	else if($table == 'profil_sda_kebisingan'){
		$this->form_validation->set_rules('tingkat','Tingkat kebisingan ','required');
		$this->form_validation->set_rules('ekses','Ekses dampak ','required');
	}
	else if($table == 'profil_sda_ruang_publik'){
		$this->form_validation->set_rules('ruang_publik','Ruang publik ','required');
		$this->form_validation->set_rules('keberadaan','Keberadaan ','required');
	}
	else if($table == 'profil_sda_potensi_wisata'){
		$this->form_validation->set_rules('lokasi','Lokasi wisata ','required');
		$this->form_validation->set_rules('keberadaan','Keberadaan ','required');
	}
	else if($table == 'profil_sdm_jumlah'){
$this->form_validation->set_rules('jumlah','Keterangan ','required');
$this->form_validation->set_rules('nilai','Jumlah ','required');
$this->form_validation->set_rules('id_satuan','Satuan ','required');
}
else if($table == 'profil_sdm_pendidikan'){
$this->form_validation->set_rules('pendidikan','Pendidikan  ','required');
$this->form_validation->set_rules('lk','Laki-laki  ','required');
$this->form_validation->set_rules('pr','Perempuan  ','required');
}
else if($table == 'profil_sdm_kewarganegaraan'){
$this->form_validation->set_rules('warga','Kewarganegaraan ','required');
$this->form_validation->set_rules('lk','Laki-laki ','required');
$this->form_validation->set_rules('pr','Perempuan ','required');
}
else if($table == 'profil_sdm_tenaga_kerja'){
$this->form_validation->set_rules('tenaga_kerja','Tenaga kerja ','required');
$this->form_validation->set_rules('lk','Laki-laki ','required');
$this->form_validation->set_rules('pr','Perempuan ','required');
}
else if($table == 'profil_sdm_angkatan_kerja'){
$this->form_validation->set_rules('angkatan','Angkatan kerja ','required');
$this->form_validation->set_rules('lk','Laki-laki ','required');
$this->form_validation->set_rules('pr','Perempuan ','required');
}
else if($table == 'profil_sdm_lembaga_pemerintah'){
	$this->form_validation->set_rules('lembaga','Lembaga pemerintah ','required');
}
else if($table == 'profil_sdm_tingkat_pendidikan'){
$this->form_validation->set_rules('aparat','Aparat ','required');
$this->form_validation->set_rules('tingkat','Tingkat pendidikan ','required');
}
else if($table == 'profil_sdm_tingkat_pendidikan_bpd'){
$this->form_validation->set_rules('aparat','Jabatan ','required');
$this->form_validation->set_rules('tingkat','Tingkat pendidikan ','required');
}
else if($table == 'profil_sdm_kemasyarakatan_lainnya'){
$this->form_validation->set_rules('nama','Nama  ','required');
$this->form_validation->set_rules('jumlah','Jumlah organisasi ','required');
$this->form_validation->set_rules('hukum','Dasar hukum ','required');
$this->form_validation->set_rules('alamat','Alamat kantor ','required');
$this->form_validation->set_rules('jenis','Ruang lingkup kegiatan (jenis) ','required');
$this->form_validation->set_rules('yakni','Ruang lingkup kegiatan (yakni) ','required');
}
else if($table == 'profil_sdm_underbow'){
$this->form_validation->set_rules('underbow','Nama organisasi ','required');
$this->form_validation->set_rules('jumlah','Jumlah unit organisasi ','required');
$this->form_validation->set_rules('pengurus','Jumlah pengurus ','required');
$this->form_validation->set_rules('anggota','Jumlah anggota ','required');
$this->form_validation->set_rules('alamat','Alamat kantor ','required');
$this->form_validation->set_rules('hukum','Dasar hukum ','required');
$this->form_validation->set_rules('jenis','Ruang lingkup kegiatan (jenis) ','required');
$this->form_validation->set_rules('yakni','Ruang lingkup kegiatan (yakni) ','required');
}
else if($table == 'profil_sdm_lembaga_ekonomi_desa'){
$this->form_validation->set_rules('lembaga_ekonomi','Lembaga ekonomi ','required');
$this->form_validation->set_rules('jumlah','Jumlah ','required');
$this->form_validation->set_rules('kegiatan','Jumlah kegiatan ','required');
$this->form_validation->set_rules('pengurus','Jumlah pengurus ','required');
}
else if($table == 'profil_sdm_lembaga_keuangan'){
$this->form_validation->set_rules('lembaga_keuangan','Jasa lembaga keuangan ','required');
$this->form_validation->set_rules('jumlah','Jumlah ','required');
$this->form_validation->set_rules('kegiatan','Jumlah kegiatan ','required');
$this->form_validation->set_rules('pengurus','Jumlah pengurus ','required');
}
else if($table == 'profil_sdm_industri_kecil'){
$this->form_validation->set_rules('industri','Industri ','required');
$this->form_validation->set_rules('jumlah','Jumlah ','required');
$this->form_validation->set_rules('kegiatan','Jumlah kegiatan ','required');
$this->form_validation->set_rules('pengurus','Jumlah pengurus ','required');
}
else if($table == 'profil_sdm_jasa_pengangkutan'){
$this->form_validation->set_rules('pengangkutan','Usaha pengangkutan ','required');
}
else if($table == 'profil_sdm_jasa_pengangkutan2'){
$this->form_validation->set_rules('pengangkutan','Usaha pengangkutan ','required');
}
else if($table == 'profil_sdm_jasa_pengangkutan3'){
$this->form_validation->set_rules('pengangkutan','Usaha pengangkutan ','required');
$this->form_validation->set_rules('jumlah','Jumlah ','required');
$this->form_validation->set_rules('kapasitas','Kapasitas ','required');
$this->form_validation->set_rules('tenaga_kerja','Tenaga kerja ','required');
}
else if($table == 'profil_sdm_jasa_pengangkutan4'){
$this->form_validation->set_rules('pengangkutan','Usaha pengangkutan ','required');
$this->form_validation->set_rules('jumlah','Jumlah ','required');
$this->form_validation->set_rules('kapasitas','Kapasitas ','required');
$this->form_validation->set_rules('tenaga_kerja','Tenaga kerja ','required');
}
else if($table == 'profil_sdm_jasa_pengangkutan5'){
$this->form_validation->set_rules('pengangkutan','Usaha pengangkutan ','required');
$this->form_validation->set_rules('jumlah','Jumlah ','required');
$this->form_validation->set_rules('kapasitas','Kapasitas ','required');
$this->form_validation->set_rules('tenaga_kerja','Tenaga kerja ','required');
}
else if($table == 'profil_sdm_perdagangan'){
$this->form_validation->set_rules('perdagangan','Usaha ','required');
$this->form_validation->set_rules('jumlah','Jumlah ','required');
$this->form_validation->set_rules('id_satuan','Satuan ','required');
$this->form_validation->set_rules('jenis','Jenis produk ','required');
$this->form_validation->set_rules('id_satuan2','Satuan ','required');
$this->form_validation->set_rules('tenaga_kerja','Jumlah tenaga kerja ','required');
}
else if($table == 'profil_sdm_usaha_hiburan'){
$this->form_validation->set_rules('hiburan','Usaha hiburan ','required');
$this->form_validation->set_rules('jumlah','Jumlah ','required');
$this->form_validation->set_rules('jenis','Jenis produk ','required');
$this->form_validation->set_rules('tenaga_kerja','Tenaga kerja ','required');
}
else if($table == 'profil_sdm_usaha_gas'){
$this->form_validation->set_rules('gas','Usaha jasa ','required');
$this->form_validation->set_rules('jumlah','Jumlah ','required');
$this->form_validation->set_rules('jenis','Jenis produk ','required');
$this->form_validation->set_rules('tenaga_kerja','Jumlah tenaga kerja ','required');
}
else if($table == 'profil_sdm_jasa_keterampilan'){
$this->form_validation->set_rules('keterampilan','Usaha jasa ','required');
$this->form_validation->set_rules('jumlah','Jumlah ','required');
$this->form_validation->set_rules('jenis','Jenis produk ','required');
$this->form_validation->set_rules('tenaga_kerja','Tenaga kerja ','required');
}
else if($table == 'profil_sdm_jasa_hukum'){
$this->form_validation->set_rules('hukum','Usaha jasa ','required');
$this->form_validation->set_rules('jumlah','Jumlah ','required');
$this->form_validation->set_rules('jenis','Jenis produk ','required');
$this->form_validation->set_rules('tenaga_kerja','Tenaga kerja ','required');
}
else if($table == 'profil_sdm_jasa_penginapan'){
$this->form_validation->set_rules('penginapan','Usaha jasa ','required');
$this->form_validation->set_rules('jumlah','Jumlah ','required');
$this->form_validation->set_rules('jenis','Jenis produk ','required');
$this->form_validation->set_rules('tenaga_kerja','Tenaga kerja ','required');
}
else if($table == 'profil_sdm_pendidikan_formal'){
$this->form_validation->set_rules('pendidikan_formal','Nama pendidikan ','required');
$this->form_validation->set_rules('jumlah','Jumlah ','required');
$this->form_validation->set_rules('status','Status ','required');
$this->form_validation->set_rules('pengajar','Tenaga pengajar ','required');
$this->form_validation->set_rules('siswa','Jumlah siswa ','required');
}
else if($table == 'profil_sdm_pendidikan_formal_keagamaan'){
$this->form_validation->set_rules('pendidikan_formal','Nama pendidikan ','required');
$this->form_validation->set_rules('cat','Kategori ','required');
$this->form_validation->set_rules('jumlah','Jumlah ','required');
$this->form_validation->set_rules('status','Status ','required');
$this->form_validation->set_rules('pengajar','Tenaga pengajar ','required');
$this->form_validation->set_rules('siswa','Jumlah siswa ','required');
}
else if($table == 'profil_sdm_pendidikan_nonformal'){
$this->form_validation->set_rules('pendidikan','Nama pendidikan ','required');
$this->form_validation->set_rules('jumlah','Jumlah ','required');
$this->form_validation->set_rules('status','Status ','required');
$this->form_validation->set_rules('kepemilikan','Kepemilikan ','required');
$this->form_validation->set_rules('pengajar','Jumlah pengajar ','required');
$this->form_validation->set_rules('siswa','Jumlah siswa ','required');
}
else if($table == 'profil_sdm_lembaga_adat'){
$this->form_validation->set_rules('adat','Lembaga adat ','required');
$this->form_validation->set_rules('keterangan','Keterangan ','required');
}
else if($table == 'profil_sdm_simbol_adat'){
$this->form_validation->set_rules('adat','Simbol adat ','required');
$this->form_validation->set_rules('keterangan','Keterangan ','required');
}
else if($table == 'profil_sdm_jenis_kegiatan_adat'){
$this->form_validation->set_rules('adat','Jenis kegiatan ','required');
$this->form_validation->set_rules('keterangan','Keterangan ','required');
}
else if($table == 'profil_sdm_hansip'){
$this->form_validation->set_rules('hansip','Hansip dan linmas ','required');
}
else if($table == 'profil_lembaga_keamanan'){
$this->form_validation->set_rules('satpam','satpam ','required');
}
else if($table == 'profil_sdm_tni'){
$this->form_validation->set_rules('kerjasama','Kerjasama ','required');
}
else if($table == 'profil_sdm_prasarana_darat'){
$this->form_validation->set_rules('baik','Baik ','required');
$this->form_validation->set_rules('Rusak','Rusak ','required');
}
else if($table == 'profil_sdm_prasarana_darat2'){
	$this->form_validation->set_rules('jenis','Jenis ','required');
	$this->form_validation->set_rules('baik','Baik ','required');
	$this->form_validation->set_rules('Rusak','Rusak ','required');
}
else if($table == 'profil_sdm_prasarana_darat3'){
	$this->form_validation->set_rules('jenis','Jenis ','required');
	$this->form_validation->set_rules('baik','Baik ','required');
	$this->form_validation->set_rules('Rusak','Rusak ','required');
}
else if($table == 'profil_sdm_transportasi_darat'){
$this->form_validation->set_rules('transportasi','Tansportasi ','required');
$this->form_validation->set_rules('ket','Keterangan ','required');
}
else if($table == 'profil_sdm_transportasi_air'){
$this->form_validation->set_rules('transportasi','Tansportasi ','required');
$this->form_validation->set_rules('jumlah','Jumlah ','required');
}
else if($table == 'profil_sdm_transportasi_sungai'){
$this->form_validation->set_rules('transportasi','Tansportasi ','required');
$this->form_validation->set_rules('ket','Keterangan ','required');
}
else if($table == 'profil_sdm_transportasi_udara'){
$this->form_validation->set_rules('prasarana','Tansportasi ','required');
$this->form_validation->set_rules('ket','Keterangan ','required');
}
else if($table == 'profil_sdm_majalah'){
$this->form_validation->set_rules('surat_kabar','Koran/majalah ','required');
$this->form_validation->set_rules('ket','Keterangan ','required');
}
else if($table == 'profil_sdm_air_bersih'){
$this->form_validation->set_rules('prasarana','Prasarana air ','required');
$this->form_validation->set_rules('jumlah','Jumlah ','required');
}
else if($table == 'profil_sdm_irigasi'){
$this->form_validation->set_rules('prasarana','Prasarana irigasi ','required');
$this->form_validation->set_rules('jumlah','Jumlah ','required');
$this->form_validation->set_rules('id_satuan','Satuan ','required');
}
else if($table == 'profil_sdm_kondisi'){
$this->form_validation->set_rules('kondisi','Kondisi ','required');
$this->form_validation->set_rules('jumlah','Jumlah ','required');
$this->form_validation->set_rules('id_satuan','Satuan ','required');
}
else if($table == 'profil_sarana_desa'){
$this->form_validation->set_rules('gedung','Gedung kantor ','required');
$this->form_validation->set_rules('ket','Keterangan ','required');
}
else if($table == 'profil_sarana_inventaris'){
$this->form_validation->set_rules('inventaris','Inventaris ','required');
$this->form_validation->set_rules('jumlah','Jumlah ','required');
$this->form_validation->set_rules('id_satuan','Satuan ','required');
}
else if($table == 'profil_sarana_administrasi'){
$this->form_validation->set_rules('administrasi','Administrasi ','required');
$this->form_validation->set_rules('ket1','Ada/Tidak ','required');
}
else if($table == 'profil_sarana_lembaga_kemasyarakatan'){
	$this->form_validation->set_rules('sarana','sarana ','required');
	$this->form_validation->set_rules('ket','Keterangan ','required');
	$this->form_validation->set_rules('jumlah','Jumlah ','required');
	$this->form_validation->set_rules('id_satuan','Satuan ','required');
}
else if($table == 'profil_sarana_peribadatan'){
	$this->form_validation->set_rules('prasarana','Prasarana peribadatan ','required');
	$this->form_validation->set_rules('jumlah','Jumlah ','required');
}
else if($table == 'profil_sarana_olah_raga'){
	$this->form_validation->set_rules('prasarana','Prasarana ','required');
}
else if($table == 'profil_sarana_prasarana_kesehatan'){
$this->form_validation->set_rules('prasarana','Prasarana kesehatan ','required');
$this->form_validation->set_rules('jumlah','Jumlah ','required');
}
else if($table == 'profil_sarana_kesehatan'){
$this->form_validation->set_rules('sarana','Sarana kesehatan ','required');
$this->form_validation->set_rules('jumlah','Jumlah ','required');
}
else if($table == 'profil_sarana_pendidikan'){
$this->form_validation->set_rules('prasarana','Prasarana dan sarana pendidikan ','required');
$this->form_validation->set_rules('sewa','Sewa ','required');
$this->form_validation->set_rules('milik_sendiri','Milik sendiri ','required');
}
else if($table == 'profil_sarana_penerbangan'){
$this->form_validation->set_rules('prasarana','Prasarana ','required');
$this->form_validation->set_rules('jumlah','Jumlah ','required');
$this->form_validation->set_rules('id_satuan','Satuan ','required');
}
else if($table == 'profil_sarana_hiburan'){
$this->form_validation->set_rules('prasarana','Prasarana ','required');
$this->form_validation->set_rules('jumlah','Jumlah ','required');
}
else if($table == 'profil_sda_sungai_jumlah'){
$this->form_validation->set_rules('teks','Jumlah sungai ','required');
$this->form_validation->set_rules('jumlah','Jumlah ','required');
}
else if($table == 'profil_sdm_rw'){
$this->form_validation->set_rules('unit','Jumlah ','required');
$this->form_validation->set_rules('order','Urutan ','required');
$this->form_validation->set_rules('hukum','Dasar hukum ','required');
$this->form_validation->set_rules('jumlah_pengurus','Jumlah pengurus ','required');
$this->form_validation->set_rules('alamat','Alamat ','required');
$this->form_validation->set_rules('jenis','Jenis ','required');
$this->form_validation->set_rules('yakni','Yakni ','required');
}
else if($table == 'profil_sdm_rt'){
$this->form_validation->set_rules('unit','Jumlah ','required');
$this->form_validation->set_rules('order','Urutan ','required');
$this->form_validation->set_rules('hukum','Dasar hukum ','required');
$this->form_validation->set_rules('jumlah_pengurus','Jumlah pengurus ','required');
$this->form_validation->set_rules('alamat','Alamat ','required');
$this->form_validation->set_rules('jenis','Jenis ','required');
$this->form_validation->set_rules('yakni','Yakni ','required');
}
else if($table == 'perkembangan_prasarana_administrasi_bpd'){
$this->form_validation->set_rules('administrasi','Administrasi ','required');
}
else if($table == 'profil_sdm_pendidikan_formal_keagamaan_cat'){
$this->form_validation->set_rules('cat','Kategori ','required');
}
else if($table == 'perkembangan_produk_item'){
$this->form_validation->set_rules('cat','Kategori ','required');
$this->form_validation->set_rules('item','Item ','required');
$this->form_validation->set_rules('jumlah','Jumlah ','required');
$this->form_validation->set_rules('id_satuan','Satuan ','required');
}
else if($table == 'profil_sda_jenis_alat_produksi_ikan'){
$this->form_validation->set_rules('jenis_alat_produksi_ikan','Jenis/Alat Budidaya ','required');
$this->form_validation->set_rules('nilai1','Jumlah ','required');
$this->form_validation->set_rules('id_satuan','Satuan ','required');
$this->form_validation->set_rules('nilai2','Produksi ','required');
}
else if($table == 'profil_sda_potensi_air'){
$this->form_validation->set_rules('sumber_air','Potensi air ','required');
$this->form_validation->set_rules('debit','Debit ','required');
$this->form_validation->set_rules('keterangan','Keterangan ','required');
}
else if($table == 'profil_sda_sumber_air'){
$this->form_validation->set_rules('id_sumber_air','Jenis ','required');
$this->form_validation->set_rules('jumlah','Jumlah ','required');
$this->form_validation->set_rules('pemanfaat','Pemanfaat ','required');
$this->form_validation->set_rules('kondisi','Kondisi ','required');
}
//add
	$this->form_validation->set_message('required', ' %s Harus diisi ');
	$this->form_validation->set_error_delimiters("* ", '<br>');
	$ret = $this->form_validation->run();
	$err = validation_errors();
	$temp = array();
	$temp['ret'] = $ret;
	$temp['err'] = $err;
	return $temp;
}
    

}


?>

