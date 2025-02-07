<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Tripdetails_model extends CI_Model{
	
	public function add($data) { 
		// $data['ie_date'] = reformatDate($data['ie_date']);
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