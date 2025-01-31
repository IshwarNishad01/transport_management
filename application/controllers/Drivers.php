<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Drivers extends CI_Controller
{

	function __construct()
	{
		parent::__construct();
		$this->load->database();
		$this->load->model('drivers_model');
		$this->load->helper(array('form', 'url', 'string'));
		$this->load->library('form_validation');
		$this->load->library('session');
	}

	public function index()
	{
		$data['driverslist'] = $this->drivers_model->getall_drivers();
		$this->template->template_render('drivers_management', $data);
	}
	public function adddrivers()
	{
		$this->template->template_render('drivers_add');
	}
	public function insertdriver()
	{
		// Validation rules
		$this->form_validation->set_rules('d_licenseno', 'License Number', 'required|trim|is_unique[vehicles.v_registration_no]');
		$this->form_validation->set_message('is_unique', '%s already exists');
		$this->form_validation->set_rules('d_name', 'Name', 'required|trim');
		$this->form_validation->set_rules('d_mobile', 'Mobile', 'required|trim');
		$this->form_validation->set_rules('d_adhar_number', 'Adhar Number', 'required|trim');
		$this->form_validation->set_rules('d_address', 'Address', 'required|trim');
		$this->form_validation->set_rules('d_contact', 'Alternate Contact', 'required|trim');
		$this->form_validation->set_rules('d_age', 'Age', 'required|trim');
		$this->form_validation->set_rules('d_license_expdate', 'License Exp Date', 'required|trim');
		$this->form_validation->set_rules('d_total_exp', 'Total Experience', 'required|trim');
		$this->form_validation->set_rules('d_doj', 'Date of Joining', 'required|trim');

		// Check form validation
		if ($this->form_validation->run() === TRUE) {
			// Collect input data
			$data = [
				'd_name' => $this->input->post('d_name'),
				'd_mobile' => $this->input->post('d_mobile'),
				'd_adhar_number' => $this->input->post('d_adhar_number'),
				'd_address' => $this->input->post('d_address'),
				'd_contact' => $this->input->post('d_contact'),
				'd_age' => $this->input->post('d_age'),
				'd_licenseno' => $this->input->post('d_licenseno'),
				'd_license_expdate' => $this->input->post('d_license_expdate'),
				'd_total_exp' => $this->input->post('d_total_exp'),
				'd_doj' => $this->input->post('d_doj'),
				'd_ref' => $this->input->post('d_ref'),
				'd_is_active' => $this->input->post('d_is_active') ? 1 : 0
			];

			// File upload configuration
			$this->load->library('upload');
			$config = [
				'upload_path' => 'assets/uploads/',
				'allowed_types' => 'jpg|jpeg|png|gif|pdf|docx'
			];
			$this->upload->initialize($config);

			// Handle file uploads
			$fileInputs = ['file', 'file1'];
			foreach ($fileInputs as $key) {
				if (!empty($_FILES[$key]['name'])) {
					if ($this->upload->do_upload($key)) {
						$uploadData = $this->upload->data();
						$data["d_{$key}"] = $uploadData['file_name'];
					} else {
						$this->session->set_flashdata('message', $this->upload->display_errors());
						redirect('drivers/adddrivers');
					}
				}
			}

			// Insert data into the database
			$response = $this->db->insert('drivers', $data);
			if ($response) {
				$this->session->set_flashdata('successmessage', 'New driver added successfully.');
				redirect('drivers');
			} else {
				$this->session->set_flashdata('warningmessage', 'Something went wrong. Please try again.');
				redirect('drivers/adddrivers');
			}
		} else {
			// Return validation errors
			$this->session->set_flashdata('warningmessage', validation_errors());
			redirect('drivers/adddrivers');
		}
	}

	public function editdriver()
	{
		$d_id = $this->uri->segment(3);
		$data['driverdetails'] = $this->drivers_model->get_driverdetails($d_id);
		$this->template->template_render('drivers_add', $data);
	}

	public function updatedriver()
	{
		$testxss = xssclean($_POST);
		if ($testxss) {
			$response = $this->drivers_model->edit_driver($this->input->post());
			if ($response) {
				$this->session->set_flashdata('successmessage', 'Driver updated successfully..');
				redirect('drivers');
			} else {
				$this->session->set_flashdata('warningmessage', 'Something went wrong..Try again');
				redirect('drivers');
			}
		} else {
			$this->session->set_flashdata('warningmessage', 'Error! Your input are not allowed.Please try again');
			redirect('drivers');
		}
	}


	public function deletedriver()
	{
		$d_id = $this->input->post('del_id');
		$deleteresp = $this->db->delete('drivers', array('d_id' => $d_id));
		if ($deleteresp) {
			$this->session->set_flashdata('successmessage', 'Driver deleted successfully..');
		} else {
			$this->session->set_flashdata('warningmessage', 'Unexpected error..Try again');
		}
		redirect('drivers');
	}
}
