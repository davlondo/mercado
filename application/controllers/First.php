<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class First extends CI_Controller {

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
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */
	public function index()
	{
 		
		$this->load->view('index');
	}

	public function loginIn()
	{
		/*
		#$this->session;
		$this->load->database();
		
		$newdata = array(
                   'cc'  => $this->input->post('numberdoc'),
                   'bnr_ss' => session_id(),
                   'last_ip' => $_SERVER['REMOTE_ADDR']
               );
		$this->session->set_userdata($newdata);
		$sic_code = $this->input->post('numberdoc');
		#var_dump($sic_code);
		#die;
		$sql = "SELECT id_mask from preload where sic_code={$sic_code};";
		$query = $this->db->query($sql);
		#var_dump($_SERVER);
		if ($query->num_rows() > 0)
		{
		   foreach ($query->result() as $row)
		   {
		      echo $row->id_mask;
		   }
		}
		*/
		redirect('secondStep');
	}
}
