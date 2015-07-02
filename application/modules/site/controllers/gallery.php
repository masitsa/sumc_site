<?php   if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Gallery extends MX_Controller {
	
	function __construct()
	{
		parent:: __construct();
		$this->load->model('admin/users_model');
		$this->load->model('site/gallery_model');
		$this->load->model('site/site_model');
	}
    
	/*
	*
	*	Default action is to show all the posts
	*
	*/
	public function index($category = 0) 
	{
		$where = 'gallery.department_id = department.department_id AND gallery_status = 1';
		$segment = 3;
		$base_url = base_url().'gallery';
		
		$table = 'department, gallery';
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
		$query = $this->gallery_model->get_all_images($table, $where, $config["per_page"], $page);
		
		if ($query->num_rows() > 0)
		{
			$v_data['query'] = $query;
			$v_data['page'] = $page;
			$data['content'] = $this->load->view('gallery/gallery_list', $v_data, true);
		}
		
		else
		{
			$data['content'] = '<p>There are no gallery posted yet</p>';
		}
		$this->load->view("site/gallery/templates/gallery", $data);
	}
	
	
	
}