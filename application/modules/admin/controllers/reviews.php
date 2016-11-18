<?php   if ( ! defined('BASEPATH')) exit('No direct script access allowed');

require_once "./application/modules/admin/controllers/admin.php";

class Reviews extends admin 
{
	function __construct()
	{
		parent:: __construct();
		$this->load->model('users_model');
		$this->load->model('review_model');
	}
    
	/*
	*
	*	Default action is to show all the registered review
	*
	*/
	public function index() 
	{
		$where = 'review_id > 0';
		$table = 'review';
		$segment = 3;
		//pagination
		$this->load->library('pagination');
		$config['base_url'] = base_url().'administration/all-reviews';
		$config['total_rows'] = $this->users_model->count_items($table, $where);
		$config['uri_segment'] = $segment;
		$config['per_page'] = 20;
		$config['num_links'] = 5;
		
		$config['full_tag_open'] = '<ul class="pagination pull-right">';
		$config['full_tag_close'] = '</ul>';
		
		$config['first_tag_open'] = '<li>';
		$config['first_tag_close'] = '</li>';
		
		$config['last_tag_open'] = '<li>';
		$config['last_tag_close'] = '</li>';
		
		$config['next_tag_open'] = '<li>';
		$config['next_link'] = 'Next';
		$config['next_tag_close'] = '</span>';
		
		$config['prev_tag_open'] = '<li>';
		$config['prev_link'] = 'Prev';
		$config['prev_tag_close'] = '</li>';
		
		$config['cur_tag_open'] = '<li class="active"><a href="#">';
		$config['cur_tag_close'] = '</a></li>';
		
		$config['num_tag_open'] = '<li>';
		$config['num_tag_close'] = '</li>';
		$this->pagination->initialize($config);
		
		$page = ($this->uri->segment($segment)) ? $this->uri->segment($segment) : 0;
        $data["links"] = $this->pagination->create_links();
		$query = $this->review_model->get_all_reviews($table, $where, $config["per_page"], $page);
		
		if ($query->num_rows() > 0)
		{
			$v_data['query'] = $query;
			$v_data['page'] = $page;
			$data['content'] = $this->load->view('review/all_reviews', $v_data, true);
		}
		
		else
		{
			$data['content'] = '<a href="'.site_url().'administration/add-review" class="btn btn-success pull-right">Add Review</a>There are no reviews';
		}
		$data['title'] = 'All Reviews';
		
		$this->load->view('templates/general_admin', $data);
	}
	
	function add_review()
	{
		$this->form_validation->set_rules('review_name', 'Title', 'trim|xss_clean');
		$this->form_validation->set_rules('review_description', 'Description', 'trim|xss_clean');

		if ($this->form_validation->run())
		{	
			if(empty($review_error))
			{
				$data2 = array(
					'review_name'=>$this->input->post("review_name"),
					'review_status'=>1,
					'created_by' => $this->session->userdata('user_id'),
					'modified_by' => $this->session->userdata('user_id'),
					'created' => date('Y-m-d H:i:s')
				);
				
				$table = "review";
				$this->db->insert($table, $data2);
				$this->session->set_userdata('success_message', 'Review has been added');
				
				redirect('administration/all-reviews');
			}
		}
		
		$data['content'] = $this->load->view("review/add_review", '', TRUE);
		$data['title'] = 'Add Review';
		
		$this->load->view('templates/general_admin', $data);
	}
	
	function edit_review($review_id, $page)
	{
		//get review data
		$table = "review";
		$where = "review_id = ".$review_id;
		
		$this->db->where($where);
		$reviews_query = $this->db->get($table);
		$review_row = $reviews_query->row();
		$v_data['review_row'] = $review_row;
		
		$this->form_validation->set_rules('check', 'check', 'trim|xss_clean');
		$this->form_validation->set_rules('review_name', 'Title', 'trim|xss_clean');
		$this->form_validation->set_rules('review_description', 'Description', 'trim|xss_clean');

		if ($this->form_validation->run())
		{	
			if(empty($review_error))
			{
				$data2 = array(
					'review_name'=>$this->input->post("review_name"),
					'modified_by' => $this->session->userdata('user_id')
				);
				
				$table = "review";
				$this->db->where('review_id', $review_id);
				$this->db->update($table, $data2);
				$this->session->set_userdata('success_message', 'Review has been edited');
				
				redirect('administration/all-reviews/'.$page);
			}
		}
		$data['content'] = $this->load->view("review/edit_review", $v_data, TRUE);
		$data['title'] = 'Edit Review';
		
		$this->load->view('templates/general_admin', $data);
	}
    
	/*
	*
	*	Delete an existing review
	*	@param int $review_id
	*
	*/
	function delete_review($review_id, $page)
	{
		if($this->review_model->delete_review($review_id))
		{
			$this->session->set_userdata('success_message', 'Review has been deleted');
		}
		
		else
		{
			$this->session->set_userdata('error_message', 'Review could not be deleted');
		}
		redirect('administration/all-reviews/'.$page);
	}
    
	/*
	*
	*	Activate an existing review
	*	@param int $review_id
	*
	*/
	public function activate_review($review_id, $page)
	{
		if($this->review_model->activate_review($review_id))
		{
			$this->session->set_userdata('success_message', 'Review has been activated');
		}
		
		else
		{
			$this->session->set_userdata('error_message', 'Review could not be activated');
		}
		redirect('administration/all-reviews/'.$page);
	}
    
	/*
	*
	*	Deactivate an existing review
	*	@param int $review_id
	*
	*/
	public function deactivate_review($review_id, $page)
	{
		if($this->review_model->deactivate_review($review_id))
		{
			$this->session->set_userdata('success_message', 'Review has been disabled');
		}
		
		else
		{
			$this->session->set_userdata('error_message', 'Review could not be disabled');
		}
		redirect('administration/all-reviews/'.$page);
	}
}
?>