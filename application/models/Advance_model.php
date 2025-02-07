<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Employee_model extends CI_Model{
	
	public function add_salary($data) { 
		return	$this->db->insert('employee_advance',$data);
	} 

    public function getall_record() { 
		$records = $this->db->select('*')->from('employee_advance')->order_by('date','desc')->get()->result_array();
		return $records;
	} 
	
	public function updatesalary() { 
		$_POST['ie_date'] = reformatDate($_POST['ie_date']);
		$this->db->where('id',$this->input->post('ie_id'));
		return $this->db->update('employee_advance',$this->input->post());
	}
	public function editsalary($v_id) { 
		return $this->db->select('*')->from('employee_advance')->where('id',$v_id)->order_by('id','DESC')->get()->result_array();
	} 

} 