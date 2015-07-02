<?php   if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Blog extends MX_Controller {
	
	function __construct()
	{
		parent:: __construct();
		$this->load->model('admin/users_model');
		$this->load->model('admin/blog_model');
		$this->load->model('site/site_model');
	}
    
	/*
	*
	*	Default action is to show all the posts
	*
	*/
	public function index($category = 0) 
	{
		$where = 'post.blog_category_id = blog_category.blog_category_id AND post.post_status = 1';
		$segment = 3;
		$base_url = base_url().'blog/'.$category;
		if($category > 0)
		{
			$segment = 4;
			$base_url = base_url().'blog/category/'.$category;
			$where .= ' AND (blog_category.blog_category_id = '.$category.' OR blog_category.blog_category_parent = '.$category.')';
		}
		$table = 'post, blog_category';
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
		$query = $this->blog_model->get_all_posts($table, $where, $config["per_page"], $page);
		
		if ($query->num_rows() > 0)
		{
			$v_data['query'] = $query;
			$v_data['page'] = $page;
			$data['content'] = $this->load->view('blog/blog_list', $v_data, true);
		}
		
		else
		{
			$data['content'] = '<p>There are no posts</p>';
		}
		$this->load->view("blog/templates/blog", $data);
	}
	
	public function view_post($post_id)
	{
		$this->blog_model->update_views_count($post_id);
		$query = $this->blog_model->get_post($post_id);
		$v_data['comments_query'] = $this->blog_model->get_post_comments($post_id);
		
		if ($query->num_rows() > 0)
		{
			$administrators = $this->users_model->get_all_administrators();
			if ($administrators->num_rows() > 0)
			{
				$admins = $administrators->result();
			}
			
			else
			{
				$admins = NULL;
			}
			
			foreach ($query->result() as $row)
			{
				$post_id = $row->post_id;
				$blog_category_name = $row->blog_category_name;
				$blog_category_id = $row->blog_category_id;
				$post_title = $row->post_title;
				$created_by = $row->created_by;
				$description = $row->post_content;
				$ultra_mini_title = implode(' ', array_slice(explode(' ', $post_title), 0, 4));
				$administrators = $this->users_model->get_all_administrators();
				if ($administrators->num_rows() > 0)
				{
					$admins = $administrators->result();
					if($admins != NULL)
					{
						foreach($admins as $adm)
						{
							$user_id = $adm->user_id;
							
							if($user_id == $created_by)
							{
								$created_by_name = $adm->first_name;
							}
						}
					}
				}
				
				else
				{
					$admins = NULL;
				}
			}
			$data['post_id'] = $post_id;
			$data['post_title'] = $post_title;
			$data['created_by'] = $created_by;
			$data['category_id'] = $blog_category_id;
			$data['ultra_mini_title'] = $ultra_mini_title;
			$data['title'] = $post_title;
			$v_data['row'] = $query->row();
			$data['content'] = $this->load->view('blog/single_post', $v_data, true);
		}
		
		else
		{
			$data['post_id'] = 0;
			$data['created_by'] = 0;
			$data['category_id'] = 0;
			$data['ultra_mini_title'] = '';
			$data['post_title'] = '';
			$data['content'] = 'Post not found';
			$data['title'] = 'No active posts are available';
		}
		
		
		$this->load->view('blog/templates/new_post', $data);
	}
    
	/*
	*
	*	Add a new comment
	*
	*/
	public function add_comment($post_id) 
	{
		//form validation rules
		$this->form_validation->set_rules('post_comment_description', 'Comment', 'required|xss_clean');
		$this->form_validation->set_rules('name', 'Name', 'required|xss_clean');
		$this->form_validation->set_rules('email', 'Email', 'valid_email|xss_clean');
		
		//if form has been submitted
		if ($this->form_validation->run() == FALSE)
		{
			$this->view_post($post_id);
		}
		
		else
		{
			if($this->blog_model->add_comment_user($post_id))
			{
				$this->session->set_userdata('success_message', 'Comment added successfully. Pending approval by admin');
				redirect('blog/post/'.$post_id);
			}
			
			else
			{
				$this->session->set_userdata('error_message', 'Could not add comment. Please try again');
				$this->view_post($post_id);
			}
		}
	}
	
}