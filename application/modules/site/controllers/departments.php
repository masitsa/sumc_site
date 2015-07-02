<?php   if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Departments extends MX_Controller {
	
	function __construct()
	{
		parent:: __construct();
		$this->load->model('admin/users_model');
		$this->load->model('site/departments_model');
		$this->load->model('site/site_model');
	}
    
	/*
	*
	*	Default action is to show all the posts
	*
	*/
	public function index($category = 0) 
	{
		$where = 'department_status = 1';
		$segment = 3;
		$base_url = base_url().'departments';
		
		$table = 'department';
		//pagination
		$this->load->library('pagination');
		$config['base_url'] = $base_url;
		$config['total_rows'] = $this->users_model->count_items($table, $where);
		$config['uri_segment'] = $segment;
		$config['per_page'] = 5;
		$config['num_links'] = 5;
		
		$config['full_tag_open'] = '<div class="wp-pagenavi">';
		$config['full_tag_close'] = '</div>';
		
		$config['next_link'] = 'Next';
		
		$config['prev_link'] = 'Prev';
		
		$config['cur_tag_open'] = '<span class="current">';
		$config['cur_tag_close'] = '</span>';
		$this->pagination->initialize($config);
		
		$page = ($this->uri->segment($segment)) ? $this->uri->segment($segment) : 0;
        $v_data["links"] = $this->pagination->create_links();
		$query = $this->departments_model->get_all_departments($table, $where, $config["per_page"], $page);
		
		if ($query->num_rows() > 0)
		{
			$v_data['query'] = $query;
			$v_data['page'] = $page;
			$data['content'] = $this->load->view('departments/department_list', $v_data, true);
		}
		
		else
		{
			$data['content'] = '<p>There are no departments posted yet</p>';
		}
		$this->load->view("site/departments/templates/departments", $data);
	}
	
	public function view_department($department_id)
	{
		// var_dump($department_id) or die();
		$query = $this->departments_model->get_department($department_id);

		if ($query->num_rows() > 0)
		{
			
			foreach ($query->result() as $row)
			{
				$department_id = $row->department_id;
		        $department_name = $row->department_name;
		        $department_status = $row->department_status;
		    
		        $created_by = $row->created_by;
		        $modified_by = $row->modified_by;
		        $description = $row->department_description;
				$ultra_mini_title = implode(' ', array_slice(explode(' ', $department_name), 0, 4));
				
			}
			$data['department_id'] = $department_id;
			$data['department_name'] = $department_name;
			$data['ultra_mini_title'] = $ultra_mini_title;
			$data['title'] = $department_name;
			$v_data['row'] = $query->row();
			$data['content'] = $this->load->view('departments/single_department', $v_data, true);
		}
		
		else
		{
			$data['department_id'] = 0;
			$data['ultra_mini_title'] = '';
			$data['department_name'] = '';
			$data['title'] = '';
			$data['content'] = 'department not found';
			$data['title'] = 'No active departments are available';
		}
		
		
		$this->load->view('site/departments/templates/department_single', $data);
	}
    
	
}