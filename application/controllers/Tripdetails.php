<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Tripdetails extends CI_Controller
{

	function __construct()
	{
		parent::__construct();
		$this->load->database();
		$this->load->model('Tripdetails_model');
		$this->load->model('customer_model');
		$this->load->model('vehicle_model');
		$this->load->model('drivers_model');
		$this->load->helper(array('form', 'url', 'string'));
		$this->load->library('form_validation');
		$this->load->library('session');
	}

	public function index()
	{
		$data['triplist'] = $this->Tripdetails_model->getall_record();
		$this->template->template_render('trip_details');
	}

    public function addtripdetails(){
		$data['customerlist'] = $this->customer_model->getall_customer();
		$data['vehiclelist'] = $this->vehicle_model->getall_vehicle();
        $this->template->template_render('add_trip_details',$data);
    }

    public function showtripdetails(){
		$data['tripdetails'] = $this->Tripdetails_model->getall_record();
        $this->template->template_render('trip_details',$data);
    }


	public function inserttrucktrip()
	{
		
		$testxss = xssclean($_POST);
		if($testxss){
			$response = $this->Tripdetails_model->add($this->input->post());
			if($response) {
				$this->session->set_flashdata('successmessage', 'New Record added successfully..');
			} else {
				$this->session->set_flashdata('warningmessage', 'Something went wrong..Try again');
			}
			redirect('Tripdetails/showtripdetails');
		} else {
			$this->session->set_flashdata('warningmessage', 'Error! Your input are not allowed.Please try again');
			redirect('Tripdetails/showtripdetails');
		}
	}


    public function edittrip()
	{
		$this->load->model('Tripdetails_model');
		// $data['vechiclelist'] = $this->trips_model->getall_vechicle();
		$e_id = $this->uri->segment(3);
		$data['customerlist'] = $this->customer_model->getall_customer();
		$data['vehiclelist'] = $this->vehicle_model->getall_vehicle();
		$data['tripDetails'] = $this->Tripdetails_model->editRecord($e_id);
		$this->template->template_render('add_trip_details',$data);
	}

	public function viewRecord()
	{
		$this->load->model('Tripdetails_model');
		$e_id = $this->uri->segment(3);
		$data['customerlist'] = $this->customer_model->getall_customer();
		$data['vehiclelist'] = $this->vehicle_model->getall_vehicle();
		$data['tripDetails'] = $this->Tripdetails_model->editRecord($e_id);
		$this->template->template_render('view_trip_details',$data);
	}

	public function updatetrip()
	{
		$testxss = xssclean($_POST);

		$data = $this->input->post();
	
		if($testxss){

			$data = $this->input->post();
		
			$this->db->where('id', $data['id']);
			$response =  $this->db->update('truck_trip_details', $data);
			
				if($response) {
					$this->session->set_flashdata('successmessage', 'updated successfully..');
					redirect('Tripdetails/showtripdetails');
				} else
				{
					$this->session->set_flashdata('warningmessage', 'Something went wrong..Try again');
				    redirect('Tripdetails/showtripdetails');
				}
		} else {
			$this->session->set_flashdata('warningmessage', 'Error! Your input are not allowed.Please try again');
			redirect('Tripdetails/showtripdetails');
		}
	}
	public function deletetrip()
	{
		$id = $this->input->post('del_id');
		$deleteresp = $this->db->delete('truck_trip_details', array('id' => $id)); 
		if($deleteresp) {
			$this->session->set_flashdata('successmessage', 'Record deleted successfully..');
		} else {
			$this->session->set_flashdata('warningmessage', 'Unexpected error..Try again');
		}
		redirect('Tripdetails/showtripdetails');
	}


}