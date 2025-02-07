<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Employee_advance extends CI_Controller {

	 function __construct()
     {
          parent::__construct();
          $this->load->database();
          $this->load->model('Employee_model');
          $this->load->helper(array('form', 'url','string'));
          $this->load->library('form_validation');
          $this->load->library('session');
     }

	public function index()
	{
		$data['incomexpense'] = $this->Salary_model->getall_record();
		$this->template->template_render('salarylist',$data);
	}

	public function addsalary()
	{
		$this->template->template_render('salary_add');
	}

	public function insertsalary()
	{
		
		$testxss = xssclean($_POST);
		if($testxss){
			$response = $this->Salary_model->add_salary($this->input->post());
			if($response) {
				$this->session->set_flashdata('successmessage', 'New '.$this->input->post('ie_type').' added successfully..');
			} else {
				$this->session->set_flashdata('warningmessage', 'Something went wrong..Try again');
			}
			redirect('salary');
		} else {
			$this->session->set_flashdata('warningmessage', 'Error! Your input are not allowed.Please try again');
			redirect('salary');
		}
	}

	public function editsalary()
	{
		$this->load->model('salary_model');
		// $data['vechiclelist'] = $this->trips_model->getall_vechicle();
		$e_id = $this->uri->segment(3);
		$data['incomexpensedetails'] = $this->salary_model->editsalary($e_id);
		$this->template->template_render('salary_add',$data);
	}

	public function updatesalary()
	{
		$testxss = xssclean($_POST);

		$data = $this->input->post();
	
		if($testxss){

			$data = $this->input->post();
		
			$this->db->where('id', $data['id']);
			$response =  $this->db->update('employee_advance', $data);
			
			// $response = $this->Incomexpense_model->updateincomexpense($this->input->post());
				if($response) {
					$this->session->set_flashdata('successmessage', ucfirst($this->input->post('ie_type')).' updated successfully..');
				    redirect('salary');
				} else
				{
					$this->session->set_flashdata('warningmessage', 'Something went wrong..Try again');
				    redirect('salary');
				}
		} else {
			$this->session->set_flashdata('warningmessage', 'Error! Your input are not allowed.Please try again');
			redirect('incomexpense');
		}
	}

	public function deletesalary()
	{
		$ie_id = $this->input->post('del_id');
		$deleteresp = $this->db->delete('salary', array('id' => $ie_id)); 
		if($deleteresp) {
			$this->session->set_flashdata('successmessage', 'Record deleted successfully..');
		} else {
			$this->session->set_flashdata('warningmessage', 'Unexpected error..Try again');
		}
		redirect('salary');
	}

	
}
