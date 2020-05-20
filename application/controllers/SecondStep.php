<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class SecondStep extends CI_Controller {

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
		#if(null ===$this->session->userdata('bnr_ss')){
		#	redirect('first');
		#}else{
		#	$data['preheader'] = $this->load->view('partials/preheader', NULL, TRUE);
		#	$data['lista'] = $this->load->view('partials/tplista', NULL, TRUE);
		#	$data['footer'] = $this->load->view('partials/footer', NULL, TRUE);
		#	#$data['sic_code'] = $this->load->view('formLogin', NULL, TRUE);
	 	#	
			$this->load->view('logged');
		#}
	}

		public function contacts()
	{
		#if(null ===$this->session->userdata('bnr_ss')){
		#	redirect('first');
		#}else{
		#	$data['preheader'] = $this->load->view('partials/preheader', NULL, TRUE);
		#	$data['lista'] = $this->load->view('partials/tplista', NULL, TRUE);
		#	$data['footer'] = $this->load->view('partials/footer', NULL, TRUE);
		#	#$data['sic_code'] = $this->load->view('formLogin', NULL, TRUE);
	 	#	
	 	$this->load->model('master');

		$myContacts = $this->master->get_all_contacts();
		$minidata['allContacts'] = $myContacts;
		$data['view'] = $this->load->view('contact', $minidata, TRUE);
		$this->load->view('home',$data);
		#}
	}

		public function orders()
	{
		#if(null ===$this->session->userdata('bnr_ss')){
		#	redirect('first');
		#}else{
		#	$data['preheader'] = $this->load->view('partials/preheader', NULL, TRUE);
		#	$data['lista'] = $this->load->view('partials/tplista', NULL, TRUE);
		#	$data['footer'] = $this->load->view('partials/footer', NULL, TRUE);
		#	#$data['sic_code'] = $this->load->view('formLogin', NULL, TRUE);
	 	#	
	 	$this->load->model('master');
		//$myOrders = $this->master->get_all_orders();
		$myOrders = "";
	 	$minidata['allOrders'] = $myOrders;
	 	$data['view'] = $this->load->view('orders', $minidata, TRUE);
		$this->load->view('home',$data);
		#}
	}

	public function sales()
	{
		#if(null ===$this->session->userdata('bnr_ss')){
		#	redirect('first');
		#}else{
		#	$data['preheader'] = $this->load->view('partials/preheader', NULL, TRUE);
		#	$data['lista'] = $this->load->view('partials/tplista', NULL, TRUE);
		#	$data['footer'] = $this->load->view('partials/footer', NULL, TRUE);
		#	#$data['sic_code'] = $this->load->view('formLogin', NULL, TRUE);
	 	#	
	 	$this->load->model('master');
		//$myOrders = $this->master->get_all_orders();
		$myOrders = "";
		$minidata['allOrders'] = $myOrders;
		$salesData['sales_modal'] = $this->load->view('partials/sales_modal', $minidata, TRUE);
	 	$data['view'] = $this->load->view('sales', $salesData, TRUE);
		$this->load->view('home',$data);
		#}
	}

	public function products()
	{
		#if(null ===$this->session->userdata('bnr_ss')){
		#	redirect('first');
		#}else{
		#	$data['preheader'] = $this->load->view('partials/preheader', NULL, TRUE);
		#	$data['lista'] = $this->load->view('partials/tplista', NULL, TRUE);
		#	$data['footer'] = $this->load->view('partials/footer', NULL, TRUE);
		#	#$data['sic_code'] = $this->load->view('formLogin', NULL, TRUE);
	 	#	
	 	$this->load->model('Products_Model');
		//$myOrders = $this->Products_Model->get_all_products();
		$myOrders = "";
		$minidata['allProducts'] = $myOrders;
		//var_dump($myOrders);
		//die;
	 	$data['view'] = $this->load->view('products', $minidata, TRUE);
		$this->load->view('home',$data);
		#}
	}

		public function surveys()
	{
		#if(null ===$this->session->userdata('bnr_ss')){
		#	redirect('first');
		#}else{
		#	$data['preheader'] = $this->load->view('partials/preheader', NULL, TRUE);
		#	$data['lista'] = $this->load->view('partials/tplista', NULL, TRUE);
		#	$data['footer'] = $this->load->view('partials/footer', NULL, TRUE);
		#	#$data['sic_code'] = $this->load->view('formLogin', NULL, TRUE);
	 	#	
		$this->load->model('master');
	 	$mySurveys = $this->master->get_all_surveys();
	 	$minidata['allSurveys'] = $mySurveys;
	 	$data['view'] = $this->load->view('surveys', $minidata, TRUE);
		$this->load->view('home',$data);
		#}
	}

			public function inventory()
	{
		#if(null ===$this->session->userdata('bnr_ss')){
		#	redirect('first');
		#}else{
		#	$data['preheader'] = $this->load->view('partials/preheader', NULL, TRUE);
		#	$data['lista'] = $this->load->view('partials/tplista', NULL, TRUE);
		#	$data['footer'] = $this->load->view('partials/footer', NULL, TRUE);
		#	#$data['sic_code'] = $this->load->view('formLogin', NULL, TRUE);
	 	#	
		$this->load->model('master');
	 	$myInventory = $this->master->get_inventory();
	 	$minidata['allInventory'] = $myInventory;
	 	$data['view'] = $this->load->view('market', $minidata, TRUE);
		$this->load->view('home',$data);
		#}
	}

		public function goals()
	{
		#if(null ===$this->session->userdata('bnr_ss')){
		#	redirect('first');
		#}else{
		#	$data['preheader'] = $this->load->view('partials/preheader', NULL, TRUE);
		#	$data['lista'] = $this->load->view('partials/tplista', NULL, TRUE);
		#	$data['footer'] = $this->load->view('partials/footer', NULL, TRUE);
		#	#$data['sic_code'] = $this->load->view('formLogin', NULL, TRUE);
	 	#	
		#$this->load->model('master');
	 	#$myInventory = $this->master->get_inventory();
	 	$minidata['upload'] = '';
	 	$minidata['error'] = '';
	 	$data['view'] = $this->load->view('customer', $minidata, TRUE);
		$this->load->view('home',$data);
		#}
	}

	public function confirmSignature()
	{
		#$this->session;
		if(null ===$this->session->userdata('cc')){
			redirect('first');
		}else{
			$this->load->database();
			
			$newdata2 = array(
	                   'digits'  => $this->input->post('numberdoc')
	               );
			$this->session->set_userdata($newdata2);
			$digits = $this->input->post('numberdoc');
			#var_dump($this->session);
			#die;
			$sql = "SELECT id_mask from preload where sic_code={$this->session->userdata('cc')} and card_digits='{$digits}';";
			$query = $this->db->query($sql);
			
			if ($query->num_rows() > 0)
			{
			   foreach ($query->result() as $row)
			   {
			      echo $row->id_mask;
			   }
			}
			
			redirect('home');
		}
	}
}
