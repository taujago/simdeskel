<?php 
class maintenance extends op_controller {
	function __construct(){
		parent::__construct();
		$this->load->helper(array("tanggal","file"));
		$this->load->model("core_model","cm");
	}


	function backup(){

		$data['title'] = "BACKUP DATABASE";
		 
	   	$content = $this->load->view("backup_view",$data,true);
		$this->set_title($data['title']);
		$this->set_content($content);
		$this->render();
	}
	function restore(){

		$data['title'] = "RESTORE DATABASE";
		 
	   	$content = $this->load->view("restore_view",$data,true);
		$this->set_title($data['title']);
		$this->set_content($content);
		$this->render();
	}
	
	function contact(){

		$data['title'] = "SMS CENTER - PUSAT KONSULTASI PEMERINTAHAN DAERAH";
		 
	   	$content = $this->load->view("contact_view",$data,true);
		$this->set_title($data['title']);
		$this->set_content($content);
		$this->render();
	}

	function dobackup(){

	$desa = $this->cm->data_desa();
	//$outfile="sikdes_lutar_".$desa->desa."_backupdb_".date("dmY_his").".sql";
	$outfile="simdeskel_backupdb_".$desa->desa.".sql";
	$outfile = str_replace(" ", "_", $outfile);

	$url = base_url()."backup/backup.php?outfile=$outfile";
	
	$x = file_get_contents($url); 
	 
	// if($x){
	// 	$this->load->helper('download');
	// 	$content = file_get_contents("./backup/tmp/$outfile"); 
	// 	force_download($outfile, $content);
	// 	unlink("./backup/tmp/$outfile");
	// }
	
	// $this->load->helper('download');
	// $name = $outfile;
	//copy("backup/tmp/$outfile",'foto');
	//copy("backup/tmp/simdeskel_backupdb_18082014_042027.sql",'foto');
	//exit;
		$file_path = "backup/tmp/$outfile";
 		$this->load->library('zip');
		$path = 'foto/';
		//echo $path;
		$this->zip->read_dir($path); 
		$this->zip->read_file($file_path); 
		$time = time();
		$backupfile="SIMDESKEL_BACKUP_". str_replace(" ", "_", $desa->desa).date("dmY_his");
		$x = $result = $this->zip->download($backupfile); 
		
		if($x) {
			unlink($outfile);
		}
	 

	}


	function zip(){
		$this->load->library('zip');
		$path = 'foto/';
		//echo $path;
		$this->zip->read_dir($path); 
		$time = time();
		$x = $result = $this->zip->download('backup.'.$time.'.zip'); 
		//$x = $this->zip->archive('./backup/backup.zip');
		if($x) echo "berhasil buat"; else echo "gagal buat";
		//$this->zip->download('my_backup.zip'); 

	}


	function dorestore(){
		ini_set('max_execution_time', 0);
		$ret = array();
		//print_r($_FILES);
		$tmp_name="tmp_backup_".date("dmyhis").".sql";
		if(empty($_FILES['backup']['tmp_name'])) {
			$ret = array("success"=>false,"pesan"=>"Tidak ada file yang diupload");
		}
		
		else {
			if(is_uploaded_file($_FILES['backup']['tmp_name'])){
				//echo "file terupload " ;
				
				
				$x = copy($_FILES['backup']['tmp_name'], "backup/tmp_restore/".$_FILES['backup']['name']);
				if($x) { 
					//echo "copy sukses";
				$ret = array("success"=>true,"pesan"=>"Data berhasil direstore ");
				//exit;
				}

				// extract semua file dan direxctory
				$zip = new ZipArchive;

				if ($zip->open("backup/tmp_restore/".$_FILES['backup']['name']) === TRUE) {
					$zip->extractTo('backup/tmp_restore/');
					$zip->close();
					//unlink(APPPATH.'/foto');
					$photo_source = realpath('backup/tmp_restore/foto/');
					$photo_path = realpath('foto/');
					//unlink($photo_path);
					//echo $photo_source . " ". $photo_path;

					// proses foto 
					recurse_copy($photo_source,$photo_path);
					//exit;

					// restore database. 
					//copy('backup/tmp_restore/foto','/');
					$desa = $this->cm->data_desa();
					$tmp_name ="simdeskel_backupdb_".$desa->desa.".sql";
					$tmp_name = str_replace(" ", "_", $tmp_name);
					$url = base_url()."backup/restore.php?tmp_file=$tmp_name";
					$y = @file_get_contents($url);
					//$tmp_name = ""

					$ret = array("success"=>true,"pesan"=>"Data berhasil direstore ");
				}
				else {
					$ret = array("false"=>true,"pesan"=>"Gagal extract file ");
				}

				// extract filenya dan ambil 

				
				// $url = base_url()."backup/restore.php?tmp_file=$tmp_name";
				// $y = @file_get_contents($url);
				
				
				 
				
			}
		
		} 
		echo json_encode($ret);
	}

}
?>