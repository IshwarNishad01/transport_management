<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Employee extends CI_Controller {

	 function __construct()
     {
          parent::__construct();
          $this->load->database();
          $this->load->model('Employee_model');
		  $this->load->model('vehicle_model');
          $this->load->helper(array('form', 'url','string'));
          $this->load->library('form_validation');
          $this->load->library('session');
     }

	public function index()
	{
		$data['incomexpense'] = $this->Salary_model->getall_record();
		$this->template->template_render('employee_advance_list',$data);
	}

	public function all_records(){
		$data['employeeRecords'] = $this->Employee_model->getall_record();
		$this->template->template_render('employee_advance_list',$data);
	}

	public function add_record()
	{
		$data['vehiclelist'] = $this->vehicle_model->getall_vehicle();
		$this->template->template_render('add_employee_advance',$data);
	}

	public function insertrecord()
	{
		
		$testxss = xssclean($_POST);
		if($testxss){
			$response = $this->Employee_model->add_record($this->input->post());
			if($response) {
				$this->session->set_flashdata('successmessage', 'New '.$this->input->post('ie_type').' added successfully..');
			} else {
				$this->session->set_flashdata('warningmessage', 'Something went wrong..Try again');
			}
			redirect('Employee/all_records');
		} else {
			$this->session->set_flashdata('warningmessage', 'Error! Your input are not allowed.Please try again');
			redirect('Employee/all_records');
		}
	}

	public function editRecord()
	{
		$this->load->model('salary_model');
		$data['vehiclelist'] = $this->vehicle_model->getall_vehicle();
		$e_id = $this->uri->segment(3);
		$data['incomexpensedetails'] = $this->Employee_model->editsalary($e_id);
		$this->template->template_render('add_employee_advance',$data);
	}

	public function updaterecord()
	{
		$testxss = xssclean($_POST);

		$data = $this->input->post();
	
		if($testxss){

			$data = $this->input->post();
		
			$this->db->where('id', $data['id']);
			$response =  $this->db->update('employee_advance', $data);
			
			// $response = $this->Incomexpense_model->updateincomexpense($this->input->post());
				if($response) {
					$this->session->set_flashdata('successmessage', 'updated successfully..');
					redirect('Employee/all_records');
				} else
				{
					$this->session->set_flashdata('warningmessage', 'Something went wrong..Try again');
					redirect('Employee/all_records');
				}
		} else {
			$this->session->set_flashdata('warningmessage', 'Error! Your input are not allowed.Please try again');
			redirect('Employee/all_records');
		}
	}

	public function delete()
	{
		$ie_id = $this->input->post('del_id');
		$deleteresp = $this->db->delete('employee_advance', array('id' => $ie_id)); 
		if($deleteresp) {
			$this->session->set_flashdata('successmessage', 'Record deleted successfully..');
		} else {
			$this->session->set_flashdata('warningmessage', 'Unexpected error..Try again');
		}
		redirect('Employee/all_records');
	}

	
}
