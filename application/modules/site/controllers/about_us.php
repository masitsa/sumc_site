<?php   if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class About_us extends MX_Controller {
	
	function __construct()
	{
		parent:: __construct();
		$this->load->model('admin/users_model');
		$this->load->model('site/departments_model');
		// $this->load->model('site/about_us_model');
		$this->load->model('site/site_model');
		$this->load->model('admin/blog_model');
	}
    
	/*
	*
	*	Default action is to show all the posts
	*
	*/
	public function index($category = 0) 
	{

		$data['content'] = $this->load->view('about_us/about_us', '', true);
		$data['title'] = 'About Us';
		$this->load->view("site/about_us/templates/about_us", $data);
	}
}