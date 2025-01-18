<?php if (! defined('BASEPATH')) exit('No direct script access allowed');

class Fuel_model extends CI_Model
{

	public function add_fuel($data)
	{
		unset($data['exp']);
		// $data['v_fuelfilldate'] = reformatDate($data['v_fuelfilldate']);
		return	$this->db->insert('fuel', $data);
	}

	// public function add_fuel($data)
	// {
	// 	if ($this->db->insert('fuel', $data)) {
	// 		return $this->db->insert_id();
	// 	} else {
	// 		log_message('error', 'Database Error: ' . json_encode($this->db->error()));
	// 		return false;
	// 	}
	// }


	public function getall_fuel()
	{
		$fuel = $this->db->select('*')->from('fuel')->order_by('v_fuel_id', 'desc')->get()->result_array();
		if (!empty($fuel)) {
			foreach ($fuel as $key => $fuels) {
				$newfuel[$key] = $fuels;
				$newfuel[$key]['v_name'] =  $this->db->select('v_registration_no,v_name')->from('vehicles')->where('v_id', $fuels['v_id'])->get()->row();
				$newfuel[$key]['filled_by'] =  $this->db->select('d_name')->from('drivers')->where('d_id', $fuels['v_fueladdedby'])->get()->row();
			}
			// print_r($newfuel);die();
			return $newfuel;
		} else {
			return false;
		}
	}
	public function editfuel($f_id)
	{
		return $this->db->select('*')->from('fuel')->where('v_fuel_id', $f_id)->get()->result_array();
	}
	public function updatefuel($v_fuel_id, $data)
	{
		// Use $this->db->where() to set the condition for the update
		$this->db->where('v_fuel_id', $v_fuel_id);

		// Perform the update with the data array
		return $this->db->update('fuel', $data);
	}

	public function getall_vechicle()
	{
		$this->db->select("vehicles.*,vehicle_group.gr_name");
		$this->db->from('vehicles');
		$this->db->join('vehicle_group', 'vehicles.v_group=vehicle_group.gr_id', 'LEFT');
		$query = $this->db->get();
		return $query->result_array();
	}

	public function fuel_reports($from, $to, $v_id)
	{
		$newincomexpense = array();
		if ($v_id == 'all') {
			$where = array('v_fuelfilldate >=' => $from, 'v_fuelfilldate<=' => $to);
		} else {
			$where = array('v_fuelfilldate >=' => $from, 'v_fuelfilldate<=' => $to, 'v_id' => $v_id);
		}
		$fuel = $this->db->select('*')->from('fuel')->where($where)->order_by('v_fuel_id', 'desc')->get()->result_array();
		if (!empty($fuel)) {
			foreach ($fuel as $key => $fuels) {
				$newfuel[$key] = $fuels;
				$newfuel[$key]['v_id'] =  $this->db->select('v_registration_no,v_name')->from('vehicles')->where('v_id', $fuels['v_id'])->get()->row();
				$newfuel[$key]['filled_by'] =  $this->db->select('d_name')->from('drivers')->where('d_id', $fuels['v_fueladdedby'])->get()->row();
			}
			return $newfuel;
		} else {
			return false;
		}
	}
}
