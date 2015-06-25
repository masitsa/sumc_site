<?php session_start();
/*
	This module loads the head, header, footer &/or Social media sections.
*/
class Site extends CI_Controller 
{	
	var $slideshow_location;
	var $service_location;
	var $gallery_location;
	
	function __construct() 
	{
		parent:: __construct();
		
		$this->load->model('site_model');
		
		$this->slideshow_location = base_url().'assets/slideshow/';
		$this->service_location = base_url().'assets/service/';
		$this->gallery_location = base_url().'assets/gallery/';
  	}
	
	public function index()
	{
		redirect('home');
	}
	
	function home_page()
	{
		//Retrieve active slides
		$data['slides'] = $this->site_model->get_slides();
		$data['services'] = $this->site_model->get_services();
		$data['company_details'] = $this->site_model->get_contacts();
		$data['jobs'] = $this->site_model->get_jobs();
		$data['loans'] = $this->site_model->get_loans();
		
		$data['slideshow_location'] = $this->slideshow_location;
		$data['service_location'] = $this->service_location;
		
		$v_data['title'] = 'Home';
		$v_data['content'] = $this->load->view("home", $data, TRUE);
		
		$this->load->view("includes/templates/general", $v_data);
	}
	
	public function about()
	{
		$data['company_details'] = $this->site_model->get_contacts();
		
		$v_data['title'] = 'About us';
		$v_data['class'] = '';
		$v_data['content'] = $this->load->view("about", $data, TRUE);
		
		$this->load->view("includes/templates/general", $v_data);
	}
	
	public function services()
	{
		$data['services'] = $this->site_model->get_services();
		$data['service_location'] = $this->service_location;
		
		$v_data['title'] = 'Services';
		$v_data['class'] = '';
		$v_data['content'] = $this->load->view("services", $data, TRUE);
		
		$this->load->view("includes/templates/general", $v_data);
	}
	
	public function loans()
	{
		$data['loans'] = $this->site_model->get_loans();
		
		$v_data['title'] = 'Loans';
		$v_data['class'] = '';
		$v_data['content'] = $this->load->view("loans", $data, TRUE);
		
		$this->load->view("includes/templates/general", $v_data);
	}
	
	public function contact()
	{
		$data['contacts'] = $this->site_model->get_contacts();
		
		$v_data['title'] = 'Contact us';
		$v_data['class'] = '';
		$v_data['content'] = $this->load->view("contacts", $data, TRUE);
		
		$this->load->view("includes/templates/general", $v_data);
	}
}