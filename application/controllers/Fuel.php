<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Fuel extends CI_Controller
{

	function __construct()
	{
		parent::__construct();
		$this->load->database();
		$this->load->model('Fuel_model');
		$this->load->helper(array('form', 'url', 'string'));
		$this->load->library('form_validation');
		$this->load->library('session');
	}

	public function index()
	{
		$data['fuel'] = $this->Fuel_model->getall_fuel();
		$this->template->template_render('fuel', $data);
	}
	public function addfuel()
	{
		$this->load->model('trips_model');
		$data['driverlist'] = $this->trips_model->getall_driverlist();
		$data['vechiclelist'] = $this->trips_model->getall_vechicle();
		$this->template->template_render('fuel_add', $data);
	}

	public function insertfuel()
	{
		// Clean and validate input
		$testxss = xssclean($_POST); // Ensure `xssclean()` function exists and works
		if ($testxss) {
			$fuelData = [
				'v_id' => $this->input->post('r_v_id'), // Vehicle ID
				'v_fueladdedby' => $this->input->post('v_fueladdedby'), // Driver ID
				'v_fuelfilldate' => $this->input->post('v_fuelfilldate'), // Fill Date
				'v_fuel_quantity' => $this->input->post('v_fuel_quantity'), // Quantity
				'v_odometerreading' => $this->input->post('v_odometerreading'), // Odometer
				'v_fuelprice' => $this->input->post('v_fuelprice'), // Price
				'v_fuelcomments' => $this->input->post('v_fuelcomments'), // Comments
				'v_created_date' => date('Y-m-d H:i:s') // Created Date
			];
			// print_r($fuelData);die();
			// Call the model to insert data
			$response = $this->Fuel_model->add_fuel($fuelData);

			if ($response) {
				// Check for expense inclusion
				if ($this->input->post('exp')) {
					$expenseData = [
						'ie_v_id' => $fuelData['v_id'],
						'ie_date' => date('Y-m-d'),
						'ie_type' => 'expense',
						'ie_description' => 'Added fuel - ' . $fuelData['v_fuelcomments'],
						'ie_amount' => $fuelData['v_fuelprice'],
						'ie_created_date' => date('Y-m-d H:i:s')
					];
					$this->db->insert('incomeexpense', $expenseData);
				}
				$this->session->set_flashdata('successmessage', 'Fuel details added successfully.');
			} else {
				$this->session->set_flashdata('warningmessage', 'Something went wrong. Try again.');
			}
		} else {
			$this->session->set_flashdata('warningmessage', 'Error! Your input is not allowed. Please try again.');
		}
		redirect('fuel');
	}


	// public function insertfuel()
	// {
	// 	$testxss = xssclean($_POST);
	// 	if($testxss){
	// 		$response = $this->Fuel_model->add_fuel($this->input->post());
	// 		if($response) {
	// 			$is_include = $this->input->post('exp');
	// 			if(isset($is_include)) {
	// 				$addincome = array('ie_v_id'=>$this->input->post('v_id'),'ie_date'=>date('Y-m-d'),'ie_type'=>'expense','ie_description'=>'Added fuel - '.$this->input->post('v_fuelcomments'),'ie_amount'=>$this->input->post('v_fuelprice'),'ie_created_date'=>date('Y-m-d'));
	// 				$this->db->insert('incomeexpense',$addincome);
	// 			}
	// 			$this->session->set_flashdata('successmessage', 'Fuel details added successfully..');
	// 		} else {
	// 			$this->session->set_flashdata('warningmessage', 'Something went wrong..Try again');
	// 		}
	// 		redirect('fuel');
	// 	} else {
	// 		$this->session->set_flashdata('warningmessage', 'Error! Your input are not allowed.Please try again');
	// 		redirect('fuel');
	// 	}
	// }
	public function editfuel()
	{
		$f_id = $this->uri->segment(3);
		$this->load->model('trips_model');
		$data['vechiclelist'] = $this->trips_model->getall_vechicle();
		$data['driverlist'] = $this->trips_model->getall_driverlist();
		$data['fueldetails'] = $this->Fuel_model->editfuel($f_id);
		$data['reminderdetails'] = $this->Fuel_model->editfuel($f_id);
		$this->template->template_render('fuel_add', $data);
	}

	public function updatefuel()
	{
		// Clean the input to prevent XSS attacks
		$testxss = $this->security->xss_clean($_POST);

		if ($testxss) {
			// Get the v_fuel_id from POST data or some other method
			$v_fuel_id = $this->input->post('v_fuel_id'); // Assuming 'v_fuel_id' is in the form

			// Prepare data to update
			$data = array(
				'v_id' => $this->input->post('r_v_id'), // Vehicle ID
				'v_fueladdedby' => $this->input->post('v_fueladdedby'), // Driver ID
				'v_fuelfilldate' => $this->input->post('v_fuelfilldate'), // Fill Date
				'v_fuel_quantity' => $this->input->post('v_fuel_quantity'), // Quantity
				'v_odometerreading' => $this->input->post('v_odometerreading'), // Odometer
				'v_fuelprice' => $this->input->post('v_fuelprice'), // Price
				'v_fuelcomments' => $this->input->post('v_fuelcomments'), // Comments
			);

			// Call the model method to update
			$response = $this->Fuel_model->updatefuel($v_fuel_id, $data);

			if ($response) {
				// If update is successful, set a success flash message
				$this->session->set_flashdata('successmessage', 'Fuel details updated successfully..');
				redirect('fuel');
			} else {
				// If update fails, set a warning flash message
				$this->session->set_flashdata('warningmessage', 'Something went wrong.. Try again');
				redirect('fuel');
			}
		} else {
			// If the input is invalid (XSS detected), set a warning flash message
			$this->session->set_flashdata('warningmessage', 'Error! Your input is not allowed. Please try again');
			redirect('fuel');
		}
	}

	public function deletefuel()
	{
		$v_fuel_id = $this->input->post('del_id');
		$deleteresp = $this->db->delete('fuel', array('v_fuel_id' => $v_fuel_id));
		if ($deleteresp) {
			$this->session->set_flashdata('successmessage', 'Fuel deleted successfully..');
		} else {
			$this->session->set_flashdata('warningmessage', 'Unexpected error..Try again');
		}
		redirect('fuel');
	}
}
