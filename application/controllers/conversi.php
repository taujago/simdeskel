<?php 
class conversi extends CI_Controller {



	function index(){

		$res = $this->db->get("akun_langsung");
		foreach($res->result() as $row) : 
			echo $row->id. "  $row->kode  $row->nama <br />";
		endforeach;


	}


}


?>