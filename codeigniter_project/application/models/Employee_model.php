<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Employee_model extends CI_Model {

	public function addNewEmployee()
	{
		$new_employee_insert = array(
			'name' => $this->input->post('name'),
			'email' => $this->input->post('email'),
			'address' => $this->input->post('address')			
			);

		$insert = $this->db->insert('employee', $new_employee_insert); //if this is success this $insert will return true
		return $insert; //if this is succesfull insert will return true
	
	}

	public function getEmployee() 
	{
		/*$this->db->select("id, name, email, address");
		$this->db->from("employee_db");

		$query = $this->db->get();

		return $query->result();

		$num_data_returned = $query->num_rows;

		if ($num_data_returned < 1) {
			echo "There are no data in the database";
			exit();
		}*/

		$query = $this->db->get('employee');
		return $query->result_array();
	}

	public function get_employee_by_id($id = 0)
    {
        if ($id === 0)
        {
            $query = $this->db->get('employee');
            return $query->result_array();
        }
 
        $query = $this->db->get_where('employee', array('id' => $id));
        return $query->row_array();
    }

    public function updateEmployee($id = 0)
    {
        $this->load->helper('url');
 
        $data = array(
            'name' => $this->input->post('name'),
            'email' => $this->input->post('email'),
            'address' => $this->input->post('address')   
        );
        
        if ($id == 0) {
            return $this->db->insert('employee', $data);
        } else {
            $this->db->where('id', $id);
            return $this->db->update('employee', $data);
        }
    }
	
	public function deleteEmployee($id)
    {
        $this->db->where('id', $id);
        return $this->db->delete('employee');
    }
}
