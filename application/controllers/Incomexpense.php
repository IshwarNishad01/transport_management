<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Incomexpense extends CI_Controller {

	 function __construct()
     {
          parent::__construct();
          $this->load->database();
          $this->load->model('Incomexpense_model');
          $this->load->helper(array('form', 'url','string'));
          $this->load->library('form_validation');
          $this->load->library('session');

     }

	public function index()
	{
		$data['incomexpense'] = $this->Incomexpense_model->getall_incomexpense();
		$this->template->template_render('incomexpense',$data);
	}
	public function addincomexpense()
	{
		$this->load->model('trips_model');
		$data['vechiclelist'] = $this->trips_model->getall_vechicle();
		$this->template->template_render('incomexpense_add',$data);
	}
	public function insertincomexpense()
	{
		$testxss = xssclean($_POST);
		if($testxss){
			$response = $this->Incomexpense_model->add_incomexpense($this->input->post());
			if($response) {
				$this->session->set_flashdata('successmessage', 'New '.$this->input->post('ie_type').' added successfully..');
			} else {
				$this->session->set_flashdata('warningmessage', 'Something went wrong..Try again');
			}
			redirect('incomexpense');
		} else {
			$this->session->set_flashdata('warningmessage', 'Error! Your input are not allowed.Please try again');
			redirect('incomexpense');
		}
	}
	public function editincomexpense()
	{
		$this->load->model('trips_model');
		$data['vechiclelist'] = $this->trips_model->getall_vechicle();
		$e_id = $this->uri->segment(3);
		$data['incomexpensedetails'] = $this->Incomexpense_model->editincomexpense($e_id);
		$this->template->template_render('incomexpense_add',$data);
	}

	public function updateincomexpense()
	{
		$testxss = xssclean($_POST);

		$data = $this->input->post();
	
		if($testxss){

			$data = $this->input->post();
		
			$this->db->where('ie_id', $data['ie_id']);
			$response =  $this->db->update('incomeexpense', $data);
			
			// $response = $this->Incomexpense_model->updateincomexpense($this->input->post());
				if($response) {
					$this->session->set_flashdata('successmessage', ucfirst($this->input->post('ie_type')).' updated successfully..');
				    redirect('incomexpense');
				} else
				{
					$this->session->set_flashdata('warningmessage', 'Something went wrong..Try again');
				    redirect('incomexpense');
				}
		} else {
			$this->session->set_flashdata('warningmessage', 'Error! Your input are not allowed.Please try again');
			redirect('incomexpense');
		}
	}
	public function deleteincomexpense()
	{
		$ie_id = $this->input->post('del_id');
		$deleteresp = $this->db->delete('incomeexpense', array('ie_id' => $ie_id)); 
		if($deleteresp) {
			$this->session->set_flashdata('successmessage', 'Record deleted successfully..');
		} else {
			$this->session->set_flashdata('warningmessage', 'Unexpected error..Try again');
		}
		redirect('incomexpense');
	}
}
