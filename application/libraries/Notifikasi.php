<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed'); 
class Notifikasi    {
	function __construct(){
		  $this->CI =& get_instance();
          $this->CI->load->library('email');

	}



	function kirim_email($pengirim,$nama,$tujuan,$subject,$pesan) {
	$config['protocol'] = 'mail';
	#$config['mailpath'] = '/usr/sbin/sendmail';
	$config['charset'] = 'iso-8859-1';
	$config['wordwrap'] = TRUE;
	$config['mailtype'] = 'html';


	$this->CI->email->initialize($config);

	$this->CI->email->from($pengirim, $nama);
	$this->CI->email->to($tujuan);

	$this->CI->email->subject($subject);
	$this->CI->email->message($pesan);

	$this->CI->email->send();

	//echo $this->CI->email->print//_debugger();

	 

 

}

}
?>