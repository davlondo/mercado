<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Orders extends CI_Controller {

	public function index()
	{
		
	}

	
	public function myOrder()
	{
		if(null ===$this->session->userdata('bnr_ss')){
			redirect('first');
		}else{
			$form = $this->input->post('fijo');
			var_dump($form);
			die;
	 		$mini_data['name']=$this->session->userdata('name')." ".$this->session->userdata('last_name');
	 		$item_sku = $this->uri->segment(3);
	 		$this->load->database();

	 		$sql = "SELECT g.id id,name,description as infor,image_url,available as qty from gifts g join inventory i on g.id = i.item_id where g.id=$item_sku and active=1;";
			$query = $this->db->query($sql);

			$sqlUPD = "UPDATE inventory set used=(used+1), available=(total - (used + 1)) where item_id=$item_sku";
			$queryUPD = $this->db->query($sqlUPD);

			if ($query->num_rows() > 0)
				{
				   $row = $query->row(); 
				}else{
					$row= 'error';
				}
			#var_dump($this->uri);
			$itemDetails= $row;
			#var_dump($itemDetails);
			#die;
	 		#$mini_data['name']='Ana Romero';
	 		$data['item'] = $itemDetails;
	 		$data['header'] = $this->load->view('partials/header', $mini_data, TRUE);
	 		$data['footer'] = $this->load->view('partials/footer', NULL, TRUE);
			$this->load->view('gifts',$data);
		}
	}



}
