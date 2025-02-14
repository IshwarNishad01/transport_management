<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Tripdetails_model extends CI_Model{
	
	public function add($data) { 
		$last_serial = $this->db->select('serial_no')
		->from('truck_trip_details')
		->order_by('serial_no', 'DESC')
		->limit(1)
		->get()
		->row_array();

// Assign the next serial number
$data['serial_no'] = isset($last_serial['serial_no']) ? $last_serial['serial_no'] + 1 : 1;

		return	$this->db->insert('truck_trip_details',$data);
	} 

    public function getall_record() { 
		$records = $this->db->select('*')->from('truck_trip_details')->order_by('date','desc')->get()->result_array();
		return $records;
	
	} 

	public function updatesalary() { 
		$_POST['ie_date'] = reformatDate($_POST['ie_date']);
		$this->db->where('id',$this->input->post('ie_id'));
		return $this->db->update('truck_trip_details',$this->input->post());
	}
	public function editRecord($v_id) { 
		return $this->db->select('*')->from('truck_trip_details')->where('id',$v_id)->order_by('id','DESC')->get()->result_array();
	} 

} 