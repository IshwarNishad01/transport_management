<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Salary_model extends CI_Model{
	
	public function add_salary($data) { 
		// $data['ie_date'] = reformatDate($data['ie_date']);
		return	$this->db->insert('salary',$data);
	} 

    public function getall_record() { 
		$records = $this->db->select('*')->from('salary')->order_by('date','desc')->get()->result_array();
		return $records;
		// if(!empty($incomexpense)) {
		// 	foreach ($incomexpense as $key => $incomexpenses) {
		// 		$newincomexpense[$key] = $incomexpenses;
		// 		$newincomexpense[$key]['vech_name'] =  $this->db->select('v_registration_no,v_name')->from('vehicles')->where('v_id',$incomexpenses['ie_v_id'])->get()->row();
		// 	}
		// 	return $newincomexpense;
		// } else 
		// {
		// 	return false;
		// }
	} 
	// public function editincomexpense($e_id) { 
	// 	return $this->db->select('*')->from('incomeexpense')->where('ie_id',$e_id)->get()->result_array();
	// }
	public function updatesalary() { 
		$_POST['ie_date'] = reformatDate($_POST['ie_date']);
		$this->db->where('id',$this->input->post('ie_id'));
		return $this->db->update('salary',$this->input->post());
	}
	public function editsalary($v_id) { 
		return $this->db->select('*')->from('salary')->where('id',$v_id)->order_by('id','DESC')->get()->result_array();
	} 
	// public function incomexpense_reports($from,$to,$v_id) { 
	// 	$newincomexpense = array();
	// 	if($v_id=='all') {
	// 		$where = array('ie_date>='=>$from,'ie_date<='=>$to);
	// 	} else {
	// 		$where = array('ie_date>='=>$from,'ie_date<='=>$to,'ie_v_id'=>$v_id);
	// 	}

	// 	$incomexpense = $this->db->select('*')->from('incomeexpense')->where($where)->order_by('ie_id','desc')->get()->result_array();
	// 	if(!empty($incomexpense)) {
	// 		foreach ($incomexpense as $key => $incomexpenses) {
	// 			$newincomexpense[$key] = $incomexpenses;
	// 			$newincomexpense[$key]['vech_name'] =  $this->db->select('v_registration_no,v_name')->from('vehicles')->where('v_id',$incomexpenses['ie_v_id'])->get()->row();
	// 		}
	// 		return $newincomexpense;
	// 	} else 
	// 	{
	// 		return array();
	// 	}
	// }
} 