<?php

class Review_model extends CI_Model 
{
	public function get_all_reviews($table, $where, $per_page, $page)
	{
		//retrieve all reviews
		$this->db->from($table);
		$this->db->select('*');
		$this->db->where($where);
		$this->db->order_by('last_modified', 'DESC');
		$query = $this->db->get('', $per_page, $page);
		
		return $query;
	}
	
	/*
	*	Delete an existing review
	*	@param int $review_id
	*
	*/
	public function delete_review($review_id)
	{
		if($this->db->delete('review', array('review_id' => $review_id)))
		{
			return TRUE;
		}
		else{
			return FALSE;
		}
	}
	
	/*
	*	Activate a deactivated review
	*	@param int $review_id
	*
	*/
	public function activate_review($review_id)
	{
		$data = array(
				'review_status' => 1
			);
		$this->db->where('review_id', $review_id);
		
		if($this->db->update('review', $data))
		{
			return TRUE;
		}
		else{
			return FALSE;
		}
	}
	
	/*
	*	Deactivate an activated review
	*	@param int $review_id
	*
	*/
	public function deactivate_review($review_id)
	{
		$data = array(
				'review_status' => 0
			);
		$this->db->where('review_id', $review_id);
		
		if($this->db->update('review', $data))
		{
			return TRUE;
		}
		else{
			return FALSE;
		}
	}
	
	public function get_active_reviews()
	{
  		$table = "review";
		$where = "review_status = 1";
		
		$this->db->where($where);
		$query = $this->db->get($table);
		
		return $query;
	}
	
	public function get_review_id($review_name)
	{
  		$table = "review";
		$where = array('review_name' => $review_name);
		
		$this->db->where($where);
		$query = $this->db->get($table);
		
		if($query->num_rows() > 0)
		{
			$row = $query->row();
			$review_id = $row->review_id;
		}
		
		else
		{
			$review_id = FALSE;
		}
		
		return $review_id;
	}
	
	public function get_recent_reviews($limit = NULL)
	{
		if($limit != NULL)
		{
			$this->db->limit($limit);
		}
		
		$this->db->where('review_status', 1);
		$this->db->order_by('last_modified', 'DESC');
		return $this->db->get('review');
	}
}