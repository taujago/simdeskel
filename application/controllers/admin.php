<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

//class Welcome extends master_controller {\
class admin extends master_controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -  
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in 
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see http://codeigniter.com/user_guide/general/urls.html
	 */
	public function index()
	{
		/*$content = "<h2>Administrator panel";	
		$this->set_title("Administrator control panel");
		$this->set_content($content);
		$this->render(); */
		$data['controller'] = "komisi";
	$data['title'] = "Administrator Control Panel ";
	$data['content'] = "";
   	$this->load->view("test",$data); //$this->load->view($data['controller']."_view",$data,true);
	
	}
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */