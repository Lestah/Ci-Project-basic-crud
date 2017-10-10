<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Employee extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */
	public function index()
	{
		$this->load->view('includes/header');
		$this->load->view('employee_list');
		$this->load->view('includes/footer');
	}

	public function addEmployee()
	{
		$this->load->library('form_validation');

		$this->form_validation->set_rules('name', 'Name','required|trim');
		$this->form_validation->set_rules('email', 'Email','required|valid_email');
		$this->form_validation->set_rules('address', 'Address','required');

		if ($this->form_validation->run() == FALSE) 
		{

			$this->load->view('includes/header');
			$this->load->view('add_employee');
			$this->load->view('includes/footer');

		} else {

			$this->load->model('Employee_model');

			if ($query = $this->Employee_model->addNewEmployee())
			{
				$data['employee_added'] = 'new employee is added';
				$this->load->view('includes/header');
				$this->load->view('add_success');
				$this->load->view('add_employee', $data);
				$this->load->view('includes/footer');
			}
		}

	}

	public function getEmployee()
	{
		$this->load->model('Employee_model');

		/*$query = $this->Employee_model->getEmployee();
		echo '<pre>';
		print_r($query);
		exit;*/

		$this->data['employee'] = $this->Employee_model->getEmployee();

		$this->load->view('includes/header');
		$this->load->view('employee_list', $this->data);
		$this->load->view('includes/footer');

	}

	public function edit()
    {
        $id = $this->uri->segment(3);
        
        if (empty($id))
        {
            show_404();
        }
        
        $this->load->helper('form');
        $this->load->library('form_validation');
        $this->load->model('Employee_model');
        
        $data['title'] = 'Edit employee data';        
        $data['employee'] = $this->Employee_model->get_employee_by_id($id);

        $this->form_validation->set_rules('name', 'Name','required|trim');
		$this->form_validation->set_rules('email', 'Email','required|valid_email');
		$this->form_validation->set_rules('address', 'Address','required');
 
 
        if ($this->form_validation->run() === FALSE)
        {
            $this->load->view('includes/header', $data);
            $this->load->view('edit_employee', $data);
            $this->load->view('includes/footer');
 
        }
        else
        {
            $this->Employee_model->updateEmployee($id);
            redirect('Employee/getEmployee');
        }
    }

    public function delete()
    {
        $id = $this->uri->segment(3);
        
        if (empty($id))
        {
            show_404();
        }

        $this->load->model('Employee_model');
                
        $news_item = $this->Employee_model->get_employee_by_id($id);
        
        $this->Employee_model->deleteEmployee($id);        
        redirect('Employee/getEmployee');        
    }
}