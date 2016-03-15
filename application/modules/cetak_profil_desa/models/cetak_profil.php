<?php  if (!defined('BASEPATH')) exit('No direct script access allowed');

class cetak_profil extends CI_Model 
{

	function __construct()
	{
		parent::__construct();
       // $this->_table = 'country';
	}
    
	
	function get_data_1()
	{
		$this->db->order_by("k.no_kk,k.urutan","asc");
		$this->db->join("kk_anggota as k","p.id_penduduk = k.id_penduduk","left");
		$res = $this->db->get('v_penduduk as p')->result_array();

		// var_dump($res);die();
 		return $res;
	}
	
	function get_data_2()
	{
		$this->db->join("pendidikan","p.id_pendidikan = pendidikan.id_pendidikan");
		$this->db->join("penduduk_detail","p.id_penduduk = penduduk_detail.id_penduduk","left");
		$this->db->join("master_akseptor_kb","penduduk_detail.id_akseptor_kb = master_akseptor_kb.id_akseptor_kb","left");
		$this->db->join("master_status_kepemilikan_rumah","penduduk_detail.id_status_kepemilikan_rumah = master_status_kepemilikan_rumah.id_status_kepemilikan_rumah","left");
		$this->db->join("master_penghasilan","penduduk_detail.id_penghasilan = master_penghasilan.id_penghasilan","left");
		$this->db->join("master_pengeluaran","penduduk_detail.id_pengeluaran = master_pengeluaran.id_pengeluaran","left");
		$this->db->order_by("k.no_kk,k.urutan","asc");
		$this->db->join("kk_anggota as k","p.id_penduduk = k.id_penduduk","right");
		$this->db->select("master_pengeluaran.pengeluaran,pendidikan.*,penduduk_detail.*,master_akseptor_kb.*,master_status_kepemilikan_rumah.*,master_penghasilan.*,k.*,p.*");
		$this->db->from('v_penduduk as p');
		$res = $this->db->get()->result_array();
		// echo mysql_error();die();
		// echo $this->db->last_query();die();
		// var_dump($res);die();
 		return $res;
	}
	
	function get_pekerjaan($id)
	{
		$this->db->where("pp.id_penduduk",$id);
		$this->db->join("pekerjaan as p","p.id_pekerjaan = pp.id_pekerjaan","left");
		$this->db->from('penduduk_pekerjaan as pp');
		$res = $this->db->get()->result_array();
		if(!empty($res))
		{
		$c = 0;
		$p = '';
		foreach($res as $val)
		{
			$p .= ($c == 0)?strtoupper($val["pekerjaan"]):", ".strtoupper($val["pekerjaan"]);
			$c++;
		}
		// var_dump($p);die();
		}
		else $p = '-';
		return strtoupper($p);
	}
	
	function get_cacat($id)
	{
		$this->db->where("pp.id_penduduk",$id);
		$this->db->join("master_cacat as c","c.id_cacat = pp.id_cacat","left");
		$this->db->from('penduduk_cacat as pp');
		$res = $this->db->get()->result_array();
		if(!empty($res))
		{
		$c = 0;
		$p = '';
		$s = '';
		foreach($res as $val)
		{
			if($val['cacat_cat'] == '1')
				$s = 'CACAT FISIK';
			if($val['cacat_cat'] == '2')
				$s = 'CACAT MENTAL';
			
			$p .= ($c == '0')?strtoupper($s):", ".strtoupper($s);
			$c++;
		}
		// var_dump($p);die();
		}
		else $p = '';
		return strtoupper($p);
	}
	
	function get_data_3()
	{
		$this->db->where("p.deleted = '0'");
		$this->db->join("penduduk_detail","p.id_penduduk = penduduk_detail.id_penduduk","left");
		$this->db->join("master_kepemilikan_lahan as m1","penduduk_detail.id_kepemilikan_lahan = m1.id_kepemilikan_lahan","left");
		$this->db->join("master_kepemilikan_lahan as m2","penduduk_detail.id_kepemilikan_perkebunan = m2.id_kepemilikan_lahan","left");
		
		$this->db->join("kk_anggota as k","p.id_penduduk = k.id_penduduk","right");
		$this->db->order_by("k.no_kk,k.urutan","asc");
		$this->db->select('k.*,p.*,penduduk_detail.*,m1.kepemilikan_lahan as m1,m2.kepemilikan_lahan as m2');
		$this->db->from('penduduk as p');
		$res = $this->db->get()->result_array();
		// echo mysql_error();
		//echo $this->db->last_query();
		//die();
 		return $res;
	}
	
	function get_tanaman_pangan($id)
	{
		$this->db->join("master_produksi_tanaman_pangan","master_produksi_tanaman_pangan.id_produksi_tanaman_pangan = penduduk_produksi_tanaman_pangan.id_produksi_tanaman_pangan","left");
		$this->db->where("penduduk_produksi_tanaman_pangan.id_penduduk",$id);
		$this->db->where("penduduk_produksi_tanaman_pangan.deleted",'0');
		$this->db->from('penduduk_produksi_tanaman_pangan');
		$res = $this->db->get()->result_array();
		// echo $this->db->last_query();
		// die();
		if(!empty($res))
		{
			$p = '';
			$c = 0;
			$s = '';
			foreach($res as $val)
			{
				if($c != 0)
					$s = ', ';
				$p .= (!empty($val['produksi_tanaman_pangan']))?$s.$val['produksi_tanaman_pangan']." / ".$val['lahan_tanaman_pangan']." / ".$val['hasil_tanaman_pangan']:"";
				$c++;
			}
			// var_dump($p);die();
		}
		else $p = '';
		return strtoupper($p);
	}
	
	function get_hasil_tanaman_pangan($id)
	{
		$this->db->join("master_pemasaran_hasil","master_pemasaran_hasil.id_pemasaran_hasil = penduduk_produksi_tanaman_pangan.id_pemasaran_hasil","left");
		$this->db->where("penduduk_produksi_tanaman_pangan.id_penduduk",$id);
		$this->db->where("penduduk_produksi_tanaman_pangan.deleted",'0');
		$this->db->from('penduduk_produksi_tanaman_pangan');
		$res = $this->db->get()->result_array();
		// echo $this->db->last_query();
		// die();
		if(!empty($res))
		{
			$p = '';
			$c = 0;
			$s = '';
			foreach($res as $val)
			{
				if($c != 0)
					$s = ', ';
				$p .= (!empty($val['pemasaran_hasil']))?$s.$val['pemasaran_hasil']:"";
				$c++;
			}
			// var_dump($p);die();
		}
		else $p = '';
		return strtoupper($p);
	}
	
	function get_buah($id)
	{
		$this->db->join("master_produksi_tanaman_buah","master_produksi_tanaman_buah.id_produksi_tanaman_buah = penduduk_produksi_tanaman_buah.id_produksi_tanaman_buah","left");
		$this->db->where("penduduk_produksi_tanaman_buah.id_penduduk",$id);
		$this->db->where("penduduk_produksi_tanaman_buah.deleted",'0');
		$this->db->from('penduduk_produksi_tanaman_buah');
		$res = $this->db->get()->result_array();
		// echo mysql_error();
		
		if(!empty($res))
		{
			// echo $this->db->last_query();
			$p = '';
			$c = 0;
			$s = '';
			foreach($res as $val)
			{
				if($c != 0)
					$s = ', ';
				$p .= (!empty($val['produksi_tanaman_buah']))?$s.$val['produksi_tanaman_buah']." / ".$val['lahan_tanaman_buah']." / ".$val['hasil_tanaman_buah']:"";
				$c++;
			}
			// var_dump($p);die();
		}
		else $p = '';
		return strtoupper($p);
	}
	
	function get_hasil_buah($id)
	{
		$this->db->join("master_pemasaran_hasil","master_pemasaran_hasil.id_pemasaran_hasil = penduduk_produksi_tanaman_buah.id_pemasaran_hasil","left");
		$this->db->where("penduduk_produksi_tanaman_buah.id_penduduk",$id);
		$this->db->where("penduduk_produksi_tanaman_buah.deleted",'0');
		$this->db->from('penduduk_produksi_tanaman_buah');
		$res = $this->db->get()->result_array();
		// echo $this->db->last_query();
		// die();
		if(!empty($res))
		{
			$p = '';
			$c = 0;
			$s = '';
			foreach($res as $val)
			{
				if($c != 0)
					$s = ', ';
				$p .= (!empty($val['pemasaran_hasil']))?$s.$val['pemasaran_hasil']:"";
				$c++;
			}
		// var_dump($p);die();
		}
		else $p = '';
		return strtoupper($p);
	}
		
	function get_obat($id)
	{
		$this->db->join("master_produksi_tanaman_obat","master_produksi_tanaman_obat.id_produksi_tanaman_obat = penduduk_produksi_tanaman_obat.id_produksi_tanaman_obat","left");
		$this->db->where("penduduk_produksi_tanaman_obat.id_penduduk",$id);
		$this->db->where("penduduk_produksi_tanaman_obat.deleted",'0');
		$this->db->from('penduduk_produksi_tanaman_obat');
		$res = $this->db->get()->result_array();
		// echo $this->db->last_query();
		// die();
		if(!empty($res))
		{
			$p = '';
			$c = 0;
			$s = '';
			foreach($res as $val)
			{
				if($c != 0)
					$s = ', ';
				$p .= (!empty($val['produksi_tanaman_obat']))?$s.$val['produksi_tanaman_obat']." / ".$val['lahan_tanaman_obat']." / ".$val['hasil_tanaman_obat']:"";
				$c++;
			}
			// var_dump($p);die();
		}
		else $p = '';
		return strtoupper($p);
	}
		
	function get_hasil_obat($id)
	{
		$this->db->join("master_pemasaran_hasil","master_pemasaran_hasil.id_pemasaran_hasil = penduduk_produksi_tanaman_obat.id_pemasaran_hasil","left");
		$this->db->where("penduduk_produksi_tanaman_obat.id_penduduk",$id);
		$this->db->where("penduduk_produksi_tanaman_obat.deleted",'0');
		$this->db->from('penduduk_produksi_tanaman_obat');
		$res = $this->db->get()->result_array();
		// echo $this->db->last_query();
		// die();
		if(!empty($res))
		{
			$p = '';
			$c = 0;
			$s = '';
			foreach($res as $val)
			{
				if($c != 0)
					$s = ', ';
				$p .= (!empty($val['pemasaran_hasil']))?$s.$val['pemasaran_hasil']:"";
				$c++;
			}
			// var_dump($p);die();
		}
		else $p = '';
		return strtoupper($p);
	}
		
	function get_kebun($id)
	{
		$this->db->join("master_produksi_perkebunan","master_produksi_perkebunan.id_produksi_perkebunan = penduduk_produksi_perkebunan.id_produksi_perkebunan","left");
		$this->db->where("penduduk_produksi_perkebunan.id_penduduk",$id);
		$this->db->where("penduduk_produksi_perkebunan.deleted",'0');
		$this->db->from('penduduk_produksi_perkebunan');
		$res = $this->db->get()->result_array();
		// echo $this->db->last_query();
		// die();
		if(!empty($res))
		{
			$p = '';
			$c = 0;
			$s = '';
			foreach($res as $val)
			{
				if($c != 0)
					$s = ', ';
				$p .= (!empty($val['produksi_perkebunan']))?$s.$val['produksi_perkebunan']." / ".$val['lahan_perkebunan']." / ".$val['hasil_perkebunan']:"";
				$c++;
			}
			// var_dump($p);die();
		}
		else $p = '';
		return strtoupper($p);
	}
		
	function get_hasil_kebun($id)
	{
		$this->db->join("master_pemasaran_hasil","master_pemasaran_hasil.id_pemasaran_hasil = penduduk_produksi_perkebunan.id_pemasaran_hasil","left");
		$this->db->where("penduduk_produksi_perkebunan.id_penduduk",$id);
		$this->db->where("penduduk_produksi_perkebunan.deleted",'0');
		$this->db->from('penduduk_produksi_perkebunan');
		$res = $this->db->get()->result_array();
		// echo $this->db->last_query();
		// die();
		if(!empty($res))
		{
			$p = '';
			$c = 0;
			$s = '';
			foreach($res as $val)
			{
				if($c != 0)
					$s = ', ';
				$p .= (!empty($val['pemasaran_hasil']))?$s.$val['pemasaran_hasil']:"";
				$c++;
			}
			// var_dump($p);die();
		}
		else $p = '';
		return strtoupper($p);
	}
	
	function get_data_4()
	{
		$this->db->where("p.deleted = '0'");
		$this->db->join("penduduk_detail","p.id_penduduk = penduduk_detail.id_penduduk","left");
		$this->db->join("master_kepemilikan_lahan as m","penduduk_detail.id_kepemilikan_hutan = m.id_kepemilikan_lahan","left");
		$this->db->join("master_alat_produksi_ikan as mi","penduduk_detail.id_alat_produksi_ikan = mi.id_alat_produksi_ikan","left");
		$this->db->join("master_sumber_air as ma","penduduk_detail.id_sumber_air = ma.id_sumber_air","left");
		$this->db->join("master_kualitas_air as mk","penduduk_detail.id_kualitas_air = mk.id_kualitas_air","left");
		$this->db->join("kk_anggota as k","p.id_penduduk = k.id_penduduk","right");
		$this->db->order_by("k.no_kk,k.urutan","asc");
		$res = $this->db->get('penduduk as p')->result_array();
		// echo mysql_error();
		//echo $this->db->last_query();
 		return $res;
	}
	
	function get_produksi_hutan($id = '')
	{
		$this->db->join("master_produksi_hutan","master_produksi_hutan.id_produksi_hutan = penduduk_produksi_hutan.id_produksi_hutan","left");
		$this->db->where("penduduk_produksi_hutan.id_penduduk",$id);
		$this->db->where("penduduk_produksi_hutan.deleted",'0');
		$this->db->from('penduduk_produksi_hutan');
		$res = $this->db->get()->result_array();
		// echo $this->db->last_query();
		// die();
		if(!empty($res))
		{
			$p = '';
			$c = 0;
			$s = '';
			foreach($res as $val)
			{
				if($c != 0)
					$s = ', ';
				$p .= (!empty($val['produksi_hutan']))?$s.$val['produksi_hutan']:"";
				$c++;
			}
			// var_dump($p);die();
		}
		else $p = '';
		return strtoupper($p);
	}
	
	function get_hasil_hutan($id = '')
	{
		$this->db->join("master_pemasaran_hasil","master_pemasaran_hasil.id_pemasaran_hasil = penduduk_produksi_hutan.id_pemasaran_hasil","left");
		$this->db->where("penduduk_produksi_hutan.id_penduduk",$id);
		$this->db->where("penduduk_produksi_hutan.deleted",'0');
		$this->db->from('penduduk_produksi_hutan');
		$res = $this->db->get()->result_array();
		// echo $this->db->last_query();
		// die();
		if(!empty($res))
		{
			$p = '';
			$c = 0;
			$s = '';
			foreach($res as $val)
			{
				if($c != 0)
					$s = ', ';
				$p .= (!empty($val['pemasaran_hasil']))?$s.$val['pemasaran_hasil']:"";
				$c++;
			}
			// var_dump($p);die();
		}
		else $p = '';
		return strtoupper($p);
	}
	
	function get_kepemilikan_ternak($id = '')
	{
		$this->db->join("master_kepemilikan_ternak","master_kepemilikan_ternak.id_kepemilikan_ternak = penduduk_produksi_ternak.id_produksi_ternak","left");
		$this->db->where("penduduk_produksi_ternak.id_penduduk",$id);
		$this->db->where("penduduk_produksi_ternak.deleted",'0');
		$this->db->from('penduduk_produksi_ternak');
		$res = $this->db->get()->result_array();
		// echo $this->db->last_query();
		// die();
		if(!empty($res))
		{
			$p = '';
			$c = 0;
			$s = '';
			foreach($res as $val)
			{
				if($c != 0)
					$s = ', ';
				$p .= (!empty($val['kepemilikan_ternak']))?$s.$val['kepemilikan_ternak']:"";
				$c++;
			}
			// var_dump($p);die();
		}
		else $p = '';
		return strtoupper($p);
	}
	
	function get_pengolahan_ternak($id = '')
	{
		$this->db->join("master_pengolahan_ternak","master_pengolahan_ternak.id_pengolahan_ternak = penduduk_produksi_pengolahan_ternak.id_produksi_pengolahan_ternak","left");
		$this->db->where("penduduk_produksi_pengolahan_ternak.id_penduduk",$id);
		$this->db->where("penduduk_produksi_pengolahan_ternak.deleted",'0');
		$this->db->from('penduduk_produksi_pengolahan_ternak');
		$res = $this->db->get()->result_array();
		// echo $this->db->last_query();
		// die();
		if(!empty($res))
		{
			$p = '';
			$c = 0;
			$s = '';
			foreach($res as $val)
			{
				if($c != 0)
					$s = ', ';
				$p .= (!empty($val['pengolahan_ternak']))?$s.$val['pengolahan_ternak']:"";
				$c++;
			}
			// var_dump($p);die();
		}
		else $p = '';
		return strtoupper($p);
	}
	
	function get_hasil_ternak($id = '')
	{
		$this->db->join("master_pemasaran_hasil","master_pemasaran_hasil.id_pemasaran_hasil = penduduk_produksi_pengolahan_ternak.id_pemasaran_hasil","left");
		$this->db->where("penduduk_produksi_pengolahan_ternak.id_penduduk",$id);
		$this->db->where("penduduk_produksi_pengolahan_ternak.deleted",'0');
		$this->db->from('penduduk_produksi_pengolahan_ternak');
		$res = $this->db->get()->result_array();
		// echo $this->db->last_query();
		// die();
		if(!empty($res))
		{
			$p = '';
			$c = 0;
			$s = '';
			foreach($res as $val)
			{
				if($c != 0)
					$s = ', ';
				$p .= (!empty($val['pemasaran_hasil']))?$s.$val['pemasaran_hasil']:"";
				$c++;
			}
			// var_dump($p);die();
		}
		else $p = '';
		return strtoupper($p);
	}
	
	function get_produksi_perikanan($id = '')
	{
		$this->db->join("master_produksi_perikanan","master_produksi_perikanan.id_produksi_perikanan = penduduk_produksi_perikanan.id_produksi_perikanan","left");
		$this->db->where("penduduk_produksi_perikanan.id_penduduk",$id);
		$this->db->where("penduduk_produksi_perikanan.deleted",'0');
		$this->db->from('penduduk_produksi_perikanan');
		$res = $this->db->get()->result_array();
		// echo $this->db->last_query();
		// die();
		if(!empty($res))
		{
			$p = '';
			$c = 0;
			$s = '';
			foreach($res as $val)
			{
				if($c != 0)
					$s = ', ';
				$p .= (!empty($val['produksi_perikanan']))?$s.$val['produksi_perikanan']:"";
				$c++;
			}
			// var_dump($p);die();
		}
		else $p = '';
		return strtoupper($p);
	}
	
	function get_hasil_ikan($id = '')
	{
		$this->db->join("master_pemasaran_hasil","master_pemasaran_hasil.id_pemasaran_hasil = penduduk_produksi_perikanan.id_pemasaran_hasil","left");
		$this->db->where("penduduk_produksi_perikanan.id_penduduk",$id);
		$this->db->where("penduduk_produksi_perikanan.deleted",'0');
		$this->db->from('penduduk_produksi_perikanan');
		$res = $this->db->get()->result_array();
		// echo $this->db->last_query();
		// die();
		if(!empty($res))
		{
			$p = '';
			$c = 0;
			$s = '';
			foreach($res as $val)
			{
				if($c != 0)
					$s = ', ';
				$p .= (!empty($val['pemasaran_hasil']))?$s.$val['pemasaran_hasil']:"";
				$c++;
			}
			// var_dump($p);die();
		}
		else $p = '';
		return strtoupper($p);
	}
	
	function get_produksi_galian($id = '')
	{
		$this->db->join("master_bahan_galian","master_bahan_galian.id_bahan_galian = penduduk_produksi_bahan_galian.id_bahan_galian","left");
		$this->db->where("penduduk_produksi_bahan_galian.id_penduduk",$id);
		$this->db->where("penduduk_produksi_bahan_galian.deleted",'0');
		$this->db->from('penduduk_produksi_bahan_galian');
		$res = $this->db->get()->result_array();
		// echo $this->db->last_query();
		// die();
		if(!empty($res))
		{
			$p = '';
			$c = 0;
			$s = '';
			foreach($res as $val)
			{
				if($c != 0)
					$s = ', ';
				$p .= (!empty($val['bahan_galian']))?$s.$val['bahan_galian']:"";
				$c++;
			}
			// var_dump($p);die();
		}
		else $p = '';
		return strtoupper($p);
	}
	
	function get_hasil_galian($id = '')
	{
		$this->db->join("master_pemasaran_hasil","master_pemasaran_hasil.id_pemasaran_hasil = penduduk_produksi_bahan_galian.id_pemasaran_hasil","left");
		$this->db->where("penduduk_produksi_bahan_galian.id_penduduk",$id);
		$this->db->where("penduduk_produksi_bahan_galian.deleted",'0');
		$this->db->from('penduduk_produksi_bahan_galian');
		$res = $this->db->get()->result_array();
		// echo $this->db->last_query();
		// die();
		if(!empty($res))
		{
			$p = '';
			$c = 0;
			$s = '';
			foreach($res as $val)
			{
				if($c != 0)
					$s = ', ';
				$p .= (!empty($val['pemasaran_hasil']))?$s.$val['pemasaran_hasil']:"";
				$c++;
			}
			// var_dump($p);die();
		}
		else $p = '';
		return strtoupper($p);
	}
	
	function get_data_5()
	{
		$this->db->where("p.deleted = '0'");
		$this->db->join("penduduk_detail","p.id_penduduk = penduduk_detail.id_penduduk","left");
		$this->db->join("master_lembaga_diikuti","master_lembaga_diikuti.id_lembaga_diikuti = penduduk_detail.id_lembaga_diikuti","left");
		$this->db->join("master_lembaga_kemasyarakatan_master","master_lembaga_kemasyarakatan_master.id_lembaga_kemasyarakatan_master = penduduk_detail.id_lembaga_kemasyarakatan","left");
		$this->db->join("master_partai_politik","master_partai_politik.id_partai_politik = penduduk_detail.id_partai_politik","left");
		$this->db->join("master_aset_tanah","master_aset_tanah.id_aset_tanah = penduduk_detail.id_aset_tanah","left");
		$this->db->join("kk_anggota as k","p.id_penduduk = k.id_penduduk","right");
		$this->db->order_by("k.no_kk,k.urutan","asc");
		$res = $this->db->get('penduduk as p')->result_array();	
		//echo $this->db->last_query();
 		return $res;
	}
	
	function get_pemanfaatan_danau($id = '')
	{
		$this->db->join("master_pemanfaatan_danau","master_pemanfaatan_danau.id_pemanfaatan_danau = penduduk_pemanfaatan_danau.id_pemanfaatan_danau","left");
		$this->db->where("penduduk_pemanfaatan_danau.id_penduduk",$id);
		$this->db->where("penduduk_pemanfaatan_danau.deleted",'0');
		$this->db->from('penduduk_pemanfaatan_danau');
		$res = $this->db->get()->result_array();
		// echo $this->db->last_query();
		// die();
		if(!empty($res))
		{
			$p = '';
			$c = 0;
			$s = '';
			foreach($res as $val)
			{
				if($c != 0)
					$s = ', ';
				$p .= (!empty($val['pemanfaatan_danau']))?$s.$val['pemanfaatan_danau']:"";
				$c++;
			}
			// var_dump($p);die();
		}
		else $p = '';
		return strtoupper($p);
	}
	
	function get_lembaga_pendidikan($id = '')
	{
		$this->db->join("master_lembaga_pendidikan","master_lembaga_pendidikan.id_lembaga_pendidikan = penduduk_lembaga_pendidikan.id_lembaga_pendidikan","left");
		$this->db->where("penduduk_lembaga_pendidikan.id_penduduk",$id);
		$this->db->where("penduduk_lembaga_pendidikan.deleted",'0');
		$this->db->from('penduduk_lembaga_pendidikan');
		$res = $this->db->get()->result_array();
		// echo $this->db->last_query();
		// die();
		if(!empty($res))
		{
			$p = '';
			$c = 0;
			$s = '';
			foreach($res as $val)
			{
				if($c != 0)
					$s = ', ';
				$p .= (!empty($val['lembaga_pendidikan']))?$s.$val['lembaga_pendidikan']:"";
				$c++;
			}
			// var_dump($p);die();
		}
		else $p = '';
		return strtoupper($p);
	}
	
	function get_lembaga_ekonomi($id = '')
	{
		$this->db->join("master_lembaga_ekonomi","master_lembaga_ekonomi.id_lembaga_ekonomi = penduduk_lembaga_ekonomi.id_lembaga_ekonomi","left");
		$this->db->where("penduduk_lembaga_ekonomi.id_penduduk",$id);
		$this->db->where("penduduk_lembaga_ekonomi.deleted",'0');
		$this->db->from('penduduk_lembaga_ekonomi');
		$res = $this->db->get()->result_array();
		// echo $this->db->last_query();
		// die();
		if(!empty($res))
		{
			$p = '';
			$c = 0;
			$s = '';
			foreach($res as $val)
			{
				if($c != 0)
					$s = ', ';
				$p .= (!empty($val['lembaga_ekonomi']))?$s.$val['lembaga_ekonomi']:"";
				$c++;
			}
			// var_dump($p);die();
		}
		else $p = '';
		return strtoupper($p);
	}
	
	function get_aset_transportasi($id = '')
	{
		$this->db->join("master_aset_transportasi","master_aset_transportasi.id_aset_transportasi = penduduk_aset_transportasi.id_aset_transportasi","left");
		$this->db->where("penduduk_aset_transportasi.id_penduduk",$id);
		$this->db->where("penduduk_aset_transportasi.deleted",'0');
		$this->db->from('penduduk_aset_transportasi');
		$res = $this->db->get()->result_array();
		// echo $this->db->last_query();
		// die();
		if(!empty($res))
		{
			$p = '';
			$c = 0;
			$s = '';
			foreach($res as $val)
			{
				if($c != 0)
					$s = ', ';
				$p .= (!empty($val['aset_transportasi']))?$s.$val['aset_transportasi']:"";
				$c++;
			}
			// var_dump($p);die();
		}
		else $p = '';
		return strtoupper($p);
	}
	
	function get_aset_produksi($id = '')
	{
		$this->db->join("master_aset_produksi","master_aset_produksi.id_aset_produksi = penduduk_aset_produksi.id_aset_produksi","left");
		$this->db->where("penduduk_aset_produksi.id_penduduk",$id);
		$this->db->where("penduduk_aset_produksi.deleted",'0');
		$this->db->from('penduduk_aset_produksi');
		$res = $this->db->get()->result_array();
		// echo $this->db->last_query();
		// die();
		if(!empty($res))
		{
			$p = '';
			$c = 0;
			$s = '';
			foreach($res as $val)
			{
				if($c != 0)
					$s = ', ';
				$p .= (!empty($val['aset_produksi']))?$s.$val['aset_produksi']:"";
				$c++;
			}
			// var_dump($p);die();
		}
		else $p = '';
		return strtoupper($p);
	}
	
	function get_aset_perumahan($id = '')
	{
		$this->db->join("master_aset_perumahan","master_aset_perumahan.id_aset_perumahan = penduduk_aset_perumahan.id_aset_perumahan","left");
		$this->db->where("penduduk_aset_perumahan.id_penduduk",$id);
		$this->db->where("penduduk_aset_perumahan.deleted",'0');
		$this->db->from('penduduk_aset_perumahan');
		$res = $this->db->get()->result_array();
		// echo $this->db->last_query();
		// die();
		if(!empty($res))
		{
			$p = '';
			$c = 0;
			$s = '';
			foreach($res as $val)
			{
				if($c != 0)
					$s = ', ';
				$p .= (!empty($val['aset_perumahan']))?$s.$val['aset_perumahan']:"";
				$c++;
			}
			// var_dump($p);die();
		}
		else $p = '';
		return strtoupper($p);
	}
	
	function get_aset_lainnya($id = '')
	{
		$this->db->join("master_aset_lainnya","master_aset_lainnya.id_aset_lainnya = penduduk_aset_lainnya.id_aset_lainnya","left");
		$this->db->where("penduduk_aset_lainnya.id_penduduk",$id);
		$this->db->where("penduduk_aset_lainnya.deleted",'0');
		$this->db->from('penduduk_aset_lainnya');
		$res = $this->db->get()->result_array();
		// echo $this->db->last_query();
		// die();
		if(!empty($res))
		{
			$p = '';
			$c = 0;
			$s = '';
			foreach($res as $val)
			{
				if($c != 0)
					$s = ', ';
				$p .= (!empty($val['aset_lainnya']))?$s.$val['aset_lainnya']:"";
				$c++;
			}
			// var_dump($p);die();
		}
		else $p = '';
		return strtoupper($p);
	}
	
	function get_data_6()
	{
		$this->db->where("p.deleted = '0'");
		$this->db->join("penduduk_detail","p.id_penduduk = penduduk_detail.id_penduduk","left");
		$this->db->join("master_hidup_sehat","master_hidup_sehat.id_hidup_sehat = penduduk_detail.id_hidup_sehat","left");
		$this->db->join("master_pola_makan","master_pola_makan.id_pola_makan = penduduk_detail.id_pola_makan","left");
		$this->db->join("master_kebiasaan_berobat","master_kebiasaan_berobat.id_kebiasaan_berobat = penduduk_detail.id_kebiasaan_berobat","left");
		$this->db->join("master_status_gizi","master_status_gizi.id_status_gizi = penduduk_detail.id_status_gizi","left");
		$this->db->join("kk_anggota as k","p.id_penduduk = k.id_penduduk","right");
		$this->db->order_by("k.no_kk,k.urutan","asc");
		$res = $this->db->get('penduduk as p')->result_array();	
		//echo $this->db->last_query();
 		return $res;
	}
	
	function get_kualitas_hamil($id = '')
	{
		$this->db->join("master_kualitas_hamil","master_kualitas_hamil.id_kualitas_hamil = penduduk_kualitas_hamil.id_kualitas_hamil","left");
		$this->db->where("penduduk_kualitas_hamil.id_penduduk",$id);
		$this->db->where("penduduk_kualitas_hamil.deleted",'0');
		$this->db->from('penduduk_kualitas_hamil');
		$res = $this->db->get()->result_array();
		// echo $this->db->last_query();
		// die();
		if(!empty($res))
		{
			$p = '';
			$c = 0;
			$s = '';
			foreach($res as $val)
			{
				if($c != 0)
					$s = ', ';
				$p .= (!empty($val['kualitas_hamil']))?$s.$val['kualitas_hamil']:"";
				$c++;
			}
			// var_dump($p);die();
		}
		else $p = '';
		return strtoupper($p);
	}
	
	function get_kualitas_bayi($id = '')
	{
		$this->db->join("master_kualitas_bayi","master_kualitas_bayi.id_kualitas_bayi = penduduk_kualitas_bayi.id_kualitas_bayi","left");
		$this->db->where("penduduk_kualitas_bayi.id_penduduk",$id);
		$this->db->where("penduduk_kualitas_bayi.deleted",'0');
		$this->db->from('penduduk_kualitas_bayi');
		$res = $this->db->get()->result_array();
		// echo $this->db->last_query();
		// die();
		if(!empty($res))
		{
			$p = '';
			$c = 0;
			$s = '';
			foreach($res as $val)
			{
				if($c != 0)
					$s = ', ';
				$p .= (!empty($val['kualitas_bayi']))?$s.$val['kualitas_bayi']:"";
				$c++;
			}
			// var_dump($p);die();
		}
		else $p = '';
		return strtoupper($p);
	}
	
	function get_kualitas_persalinan($id = '')
	{
		$this->db->join("master_kualitas_persalinan","master_kualitas_persalinan.id_kualitas_persalinan = penduduk_kualitas_persalinan.id_kualitas_persalinan","left");
		$this->db->where("penduduk_kualitas_persalinan.id_penduduk",$id);
		$this->db->where("penduduk_kualitas_persalinan.deleted",'0');
		$this->db->from('penduduk_kualitas_persalinan');
		$res = $this->db->get()->result_array();
		// echo $this->db->last_query();
		// die();
		if(!empty($res))
		{
			$p = '';
			$c = 0;
			$s = '';
			foreach($res as $val)
			{
				if($c != 0)
					$s = ', ';
				$p .= (!empty($val['kualitas_persalinan']))?$s.$val['kualitas_persalinan']:"";
				$c++;
			}
			// var_dump($p);die();
		}
		else $p = '';
		return strtoupper($p);
	}
	
	function get_cakupan_immunisasi($id = '')
	{
		$this->db->join("master_cakupan_immunisasi","master_cakupan_immunisasi.id_cakupan_immunisasi = penduduk_cakupan_immunisasi.id_cakupan_immunisasi","left");
		$this->db->where("penduduk_cakupan_immunisasi.id_penduduk",$id);
		$this->db->where("penduduk_cakupan_immunisasi.deleted",'0');
		$this->db->from('penduduk_cakupan_immunisasi');
		$res = $this->db->get()->result_array();
		// echo $this->db->last_query();
		// die();
		if(!empty($res))
		{
			$p = '';
			$c = 0;
			$s = '';
			foreach($res as $val)
			{
				if($c != 0)
					$s = ', ';
				$p .= (!empty($val['cakupan_immunisasi']))?$s.$val['cakupan_immunisasi']:"";
				$c++;
			}
			// var_dump($p);die();
		}
		else $p = '';
		return strtoupper($p);
	}
	
	function get_penderita_sakit($id = '')
	{
		$this->db->join("master_penderita_sakit","master_penderita_sakit.id_penderita_sakit = penduduk_penderita_sakit.id_penderita_sakit","left");
		$this->db->where("penduduk_penderita_sakit.id_penduduk",$id);
		$this->db->where("penduduk_penderita_sakit.deleted",'0');
		$this->db->from('penduduk_penderita_sakit');
		$res = $this->db->get()->result_array();
		// echo $this->db->last_query();
		// die();
		if(!empty($res))
		{
			$p = '';
			$c = 0;
			$s = '';
			foreach($res as $val)
			{
				if($c != 0)
					$s = ', ';
				$p .= (!empty($val['penderita_sakit']))?$s.$val['penderita_sakit']:"";
				$c++;
			}
			// var_dump($p);die();
		}
		else $p = '';
		return strtoupper($p);
	}
	
	function get_jenis_penyakit($id = '')
	{
		$this->db->join("master_jenis_penyakit","master_jenis_penyakit.id_jenis_penyakit = penduduk_jenis_penyakit.id_jenis_penyakit","left");
		$this->db->where("penduduk_jenis_penyakit.id_penduduk",$id);
		$this->db->where("penduduk_jenis_penyakit.deleted",'0');
		$this->db->from('penduduk_jenis_penyakit');
		$res = $this->db->get()->result_array();
		// echo $this->db->last_query();
		// die();
		if(!empty($res))
		{
			$p = '';
			$c = 0;
			$s = '';
			foreach($res as $val)
			{
				if($c != 0)
					$s = ', ';
				$p .= (!empty($val['jenis_penyakit']))?$s.$val['jenis_penyakit']:"";
				$c++;
			}
			// var_dump($p);die();
		}
		else $p = '';
		return strtoupper($p);
	}

	
	function get_data_7()
	{
		$this->db->where("p.deleted = '0'");
		$this->db->join("penduduk_detail","p.id_penduduk = penduduk_detail.id_penduduk","left");
		$this->db->join("kk_anggota as k","p.id_penduduk = k.id_penduduk","right");
		$this->db->order_by("k.no_kk,k.urutan","asc");
		$res = $this->db->get('penduduk as p')->result_array();	
		//echo $this->db->last_query();
 		return $res;
	}
	
	function get_kerukunan($id = '')
	{
		$this->db->join("master_kerukunan","master_kerukunan.id_kerukunan = penduduk_kerukunan.id_kerukunan","left");
		$this->db->where("penduduk_kerukunan.id_penduduk",$id);
		$this->db->where("penduduk_kerukunan.deleted",'0');
		$this->db->from('penduduk_kerukunan');
		$res = $this->db->get()->result_array();
		// echo $this->db->last_query();
		// die();
		if(!empty($res))
		{
			$p = '';
			$c = 0;
			$s = '';
			foreach($res as $val)
			{
				if($c != 0)
					$s = ', ';
				$p .= (!empty($val['kerukunan']))?$s.$val['kerukunan']:"";
				$c++;
			}
			// var_dump($p);die();
		}
		else $p = '';
		return strtoupper($p);
	}
	
	function get_perkelahian($id = '')
	{
		$this->db->join("master_perkelahian","master_perkelahian.id_perkelahian = penduduk_perkelahian.id_perkelahian","left");
		$this->db->where("penduduk_perkelahian.id_penduduk",$id);
		$this->db->where("penduduk_perkelahian.deleted",'0');
		$this->db->from('penduduk_perkelahian');
		$res = $this->db->get()->result_array();
		// echo $this->db->last_query();
		// die();
		if(!empty($res))
		{
			$p = '';
			$c = 0;
			$s = '';
			foreach($res as $val)
			{
				if($c != 0)
					$s = ', ';
				$p .= (!empty($val['perkelahian']))?$s.$val['perkelahian']:"";
				$c++;
			}
			// var_dump($p);die();
		}
		else $p = '';
		return strtoupper($p);
	}
	
	function get_pencurian($id = '')
	{
		$this->db->join("master_pencurian","master_pencurian.id_pencurian = penduduk_pencurian.id_pencurian","left");
		$this->db->where("penduduk_pencurian.id_penduduk",$id);
		$this->db->where("penduduk_pencurian.deleted",'0');
		$this->db->from('penduduk_pencurian');
		$res = $this->db->get()->result_array();
		// echo $this->db->last_query();
		// die();
		if(!empty($res))
		{
			$p = '';
			$c = 0;
			$s = '';
			foreach($res as $val)
			{
				if($c != 0)
					$s = ', ';
				$p .= (!empty($val['pencurian']))?$s.$val['pencurian']:"";
				$c++;
			}
			// var_dump($p);die();
		}
		else $p = '';
		return strtoupper($p);
	}
	
	function get_penjarahan($id = '')
	{
		$this->db->join("master_penjarahan","master_penjarahan.id_penjarahan = penduduk_penjarahan.id_penjarahan","left");
		$this->db->where("penduduk_penjarahan.id_penduduk",$id);
		$this->db->where("penduduk_penjarahan.deleted",'0');
		$this->db->from('penduduk_penjarahan');
		$res = $this->db->get()->result_array();
		// echo $this->db->last_query();
		// die();
		if(!empty($res))
		{
			$p = '';
			$c = 0;
			$s = '';
			foreach($res as $val)
			{
				if($c != 0)
					$s = ', ';
				$p .= (!empty($val['penjarahan']))?$s.$val['penjarahan']:"";
				$c++;
			}
			// var_dump($p);die();
		}
		else $p = '';
		return strtoupper($p);
	}
	
	function get_perjudian($id = '')
	{
		$this->db->join("master_perjudian","master_perjudian.id_perjudian = penduduk_perjudian.id_perjudian","left");
		$this->db->where("penduduk_perjudian.id_penduduk",$id);
		$this->db->where("penduduk_perjudian.deleted",'0');
		$this->db->from('penduduk_perjudian');
		$res = $this->db->get()->result_array();
		// echo $this->db->last_query();
		// die();
		if(!empty($res))
		{
			$p = '';
			$c = 0;
			$s = '';
			foreach($res as $val)
			{
				if($c != 0)
					$s = ', ';
				$p .= (!empty($val['perjudian']))?$s.$val['perjudian']:"";
				$c++;
			}
			// var_dump($p);die();
		}
		else $p = '';
		return strtoupper($p);
	}
	
	function get_miras($id = '')
	{
		$this->db->join("master_miras","master_miras.id_miras = penduduk_miras.id_miras","left");
		$this->db->where("penduduk_miras.id_penduduk",$id);
		$this->db->where("penduduk_miras.deleted",'0');
		$this->db->from('penduduk_miras');
		$res = $this->db->get()->result_array();
		// echo $this->db->last_query();
		// die();
		if(!empty($res))
		{
			$p = '';
			$c = 0;
			$s = '';
			foreach($res as $val)
			{
				if($c != 0)
					$s = ', ';
				$p .= (!empty($val['miras']))?$s.$val['miras']:"";
				$c++;
			}
			// var_dump($p);die();
		}
		else $p = '';
		return strtoupper($p);
	}
	
	function get_pembunuhan($id = '')
	{
		$this->db->join("master_pembunuhan","master_pembunuhan.id_pembunuhan = penduduk_pembunuhan.id_pembunuhan","left");
		$this->db->where("penduduk_pembunuhan.id_penduduk",$id);
		$this->db->where("penduduk_pembunuhan.deleted",'0');
		$this->db->from('penduduk_pembunuhan');
		$res = $this->db->get()->result_array();
		// echo $this->db->last_query();
		// die();
		if(!empty($res))
		{
			$p = '';
			$c = 0;
			$s = '';
			foreach($res as $val)
			{
				if($c != 0)
					$s = ', ';
				$p .= (!empty($val['pembunuhan']))?$s.$val['pembunuhan']:"";
				$c++;
			}
			// var_dump($p);die();
		}
		else $p = '';
		return strtoupper($p);
	}
	
	function get_penculikan($id = '')
	{
		$this->db->join("master_penculikan","master_penculikan.id_penculikan = penduduk_penculikan.id_penculikan","left");
		$this->db->where("penduduk_penculikan.id_penduduk",$id);
		$this->db->where("penduduk_penculikan.deleted",'0');
		$this->db->from('penduduk_penculikan');
		$res = $this->db->get()->result_array();
		// echo $this->db->last_query();
		// die();
		if(!empty($res))
		{
			$p = '';
			$c = 0;
			$s = '';
			foreach($res as $val)
			{
				if($c != 0)
					$s = ', ';
				$p .= (!empty($val['penculikan']))?$s.$val['penculikan']:"";
				$c++;
			}
			// var_dump($p);die();
		}
		else $p = '';
		return strtoupper($p);
	}
	
	function get_kejahatan_seks($id = '')
	{
		$this->db->join("master_kejahatan_seksual","master_kejahatan_seksual.id_kejahatan_seksual = penduduk_kejahatan_seksual.id_kejahatan_seksual","left");
		$this->db->where("penduduk_kejahatan_seksual.id_penduduk",$id);
		$this->db->where("penduduk_kejahatan_seksual.deleted",'0');
		$this->db->from('penduduk_kejahatan_seksual');
		$res = $this->db->get()->result_array();
		// echo $this->db->last_query();
		// die();
		if(!empty($res))
		{
			$p = '';
			$c = 0;
			$s = '';
			foreach($res as $val)
			{
				if($c != 0)
					$s = ', ';
				$p .= (!empty($val['kejahatan_seksual']))?$s.$val['kejahatan_seksual']:"";
				$c++;
			}
			// var_dump($p);die();
		}
		else $p = '';
		return strtoupper($p);
	}
	
	function get_kekerasan($id = '')
	{
		$this->db->join("master_kekerasan_rumah","master_kekerasan_rumah.id_kekerasan_rumah = penduduk_kekerasan_rumah.id_kekerasan_rumah","left");
		$this->db->where("penduduk_kekerasan_rumah.id_penduduk",$id);
		$this->db->where("penduduk_kekerasan_rumah.deleted",'0');
		$this->db->from('penduduk_kekerasan_rumah');
		$res = $this->db->get()->result_array();
		// echo $this->db->last_query();
		// die();
		if(!empty($res))
		{
			$p = '';
			$c = 0;
			$s = '';
			foreach($res as $val)
			{
				if($c != 0)
					$s = ', ';
				$p .= (!empty($val['kekerasan_rumah']))?$s.$val['kekerasan_rumah']:"";
				$c++;
			}
			// var_dump($p);die();
		}
		else $p = '';
		return strtoupper($p);
	}
	
	function get_pajak($id = '')
	{
		$this->db->join("master_kedudukan_pajak","master_kedudukan_pajak.id_kedudukan_pajak = penduduk_kedudukan_pajak.id_kedudukan_pajak","left");
		$this->db->where("penduduk_kedudukan_pajak.id_penduduk",$id);
		$this->db->where("penduduk_kedudukan_pajak.deleted",'0');
		$this->db->from('penduduk_kedudukan_pajak');
		$res = $this->db->get()->result_array();
		// echo $this->db->last_query();
		// die();
		if(!empty($res))
		{
			$p = '';
			$c = 0;
			$s = '';
			foreach($res as $val)
			{
				if($c != 0)
					$s = ', ';
				$p .= (!empty($val['kedudukan_pajak']))?$s.$val['kedudukan_pajak']:"";
				$c++;
			}
			// var_dump($p);die();
		}
		else $p = '';
		return strtoupper($p);
	}
	
	function get_kesejahteraan($id = '')
	{
		$this->db->join("master_kesejahteraan_kel","master_kesejahteraan_kel.id_kesejahteraan_kel = penduduk_kesejahteraan_kel.id_kesejahteraan_kel","left");
		$this->db->where("penduduk_kesejahteraan_kel.id_penduduk",$id);
		$this->db->where("penduduk_kesejahteraan_kel.deleted",'0');
		$this->db->from('penduduk_kesejahteraan_kel');
		$res = $this->db->get()->result_array();
		// echo $this->db->last_query();
		// die();
		if(!empty($res))
		{
			$p = '';
			$c = 0;
			$s = '';
			foreach($res as $val)
			{
				if($c != 0)
					$s = ', ';
				$p .= (!empty($val['kesejahteraan_kel']))?$s.$val['kesejahteraan_kel']:"";
				$c++;
			}
			// var_dump($p);die();
		}
		else $p = '';
		return strtoupper($p);
	}
		
}
