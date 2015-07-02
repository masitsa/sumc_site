<?php

class Blog_model extends CI_Model 
{	
	/*
	*	Retrieve all posts
	*	@param string $table
	* 	@param string $where
	*
	*/
	public function get_all_images($table, $where, $per_page, $page)
	{
		//retrieve all users
		$this->db->from($table);
		$this->db->select('gallery.*, department.department_name');
		$this->db->where($where);
		$this->db->order_by('gallery_id', 'DESC');
		$query = $this->db->get('', $per_page, $page);
		
		return $query;
	}
}