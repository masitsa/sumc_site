<?php

class Site_model extends CI_Model 
{
	public function get_slides()
	{
  		$table = "slideshow";
		$where = "slideshow_status = 1";
		
		$this->db->where($where);
		$query = $this->db->get($table);
		
		return $query;
	}
	
	public function get_services()
	{
  		$table = "service";
		$where = "service_status = 1";
		
		$this->db->where($where);
		$query = $this->db->get($table);
		
		return $query;
	}
	
	public function get_gallery_services()
	{
  		$table = "service, gallery";
		$where = "gallery.gallery_status = 1 AND service.service_status = 1 AND gallery.service_id = service.service_id";
		
		$this->db->select('DISTINCT(service.service_name), service.service_id');
		$this->db->where($where);
		$query = $this->db->get($table);
		
		return $query;
	}
	
	public function get_jobs()
	{
  		$table = "jobs";
		$where = "job_status = 1";
		
		$this->db->where($where);
		$query = $this->db->get($table);
		
		return $query;
	}
	
	public function get_loans()
	{
  		$table = "loans";
		
		$query = $this->db->get($table);
		
		return $query;
	}
	
	public function get_contacts()
	{
  		$table = "contacts";
		
		$query = $this->db->get($table);
		$contacts = array();
		if($query->num_rows() > 0)
		{
			$row = $query->row();
			$contacts['email'] = $row->email;
			$contacts['phone'] = $row->phone;
			$contacts['facebook'] = $row->facebook;
			$contacts['twitter'] = $row->twitter;
			$contacts['linkedin'] = $row->pintrest;
			$contacts['company_name'] = $row->company_name;
			$contacts['logo'] = $row->logo;
			$contacts['address'] = $row->address;
			$contacts['city'] = $row->city;
			$contacts['post_code'] = $row->post_code;
			$contacts['building'] = $row->building;
			$contacts['floor'] = $row->floor;
			$contacts['location'] = $row->location;
			$contacts['working_weekend'] = $row->working_weekend;
			$contacts['working_weekday'] = $row->working_weekday;
			$contacts['mission'] = $row->mission;
			$contacts['vision'] = $row->vision;
			$contacts['motto'] = $row->motto;
			$contacts['about'] = $row->about;
			$contacts['objectives'] = $row->objectives;
			$contacts['core_values'] = $row->core_values;
		}
		return $contacts;
	}
	
	public function limit_text($text, $limit) 
	{
		$pieces = explode(" ", $text);
		$total_words = count($pieces);
		
		if ($total_words > $limit) 
		{
			$return = "<i>";
			$count = 0;
			for($r = 0; $r < $total_words; $r++)
			{
				$count++;
				if(($count%$limit) == 0)
				{
					$return .= $pieces[$r]."</i><br/><i>";
				}
				else{
					$return .= $pieces[$r]." ";
				}
			}
		}
		
		else{
			$return = "<i>".$text;
		}
		return $return.'</i><br/>';
    }
	
	public function get_navigation()
	{
		$page = explode("/",uri_string());
		$total = count($page);
		
		$name = strtolower($page[0]);
		
		$home = '';
		$about = '';
		$services = '';
		$departments = '';
		$blog = '';
		$contact = '';
		
		if($name == 'home')
		{
			$home = 'active';
		}
		
		if($name == 'about')
		{
			$about = 'active';
		}
		
		if($name == 'services')
		{
			$services = 'active';
		}
		
		if($name == 'departments')
		{
			$departments = 'active';
		}
		
		if($name == 'blog')
		{
			$blog = 'active';
		}
		
		if($name == 'contact')
		{
			$contact = 'active';
		}
		
		/*$navigation = 
		'
			<li class="'.$home.'"><a href="'.site_url().'home'.'">Home</a></li>
			<li class="'.$about.'"><a href="'.site_url().'about'.'">About us</a></li>
			<li class="'.$services.'"><a href="'.site_url().'services'.'">Services</a></li>
			<li class="'.$portfolio.'"><a href="'.site_url().'portfolio'.'">Portfolio</a></li>
			<li class="'.$blog.'"><a href="'.site_url().'blog'.'">Blog</a></li>
			<li class="'.$contact.'"><a href="'.site_url().'contact'.'">Contact</a></li>
			
		';*/
		
		
		$navigation = 
		'
			<li class="'.$home.'"><a href="#">Home</a></li>
			<li class="'.$about.'"><a href="#">About us</a></li>
			<li class="'.$services.'"><a href="#">Services</a></li>
			<li class="'.$departments.'"><a href="#">Departments</a></li>
			<li class="'.$blog.'"><a href="#">Blog</a></li>
			<li class="'.$contact.'"><a href="#">Contact</a></li>
			
		';
		
		return $navigation;
	}
	
	public function get_navigation_footer()
	{
		$page = explode("/",uri_string());
		$total = count($page);
		
		$name = strtolower($page[0]);
		
		$home = '';
		$about = '';
		$services = '';
		$departments = '';
		$blog = '';
		$contact = '';
		
		if($name == 'home')
		{
			$home = 'active';
		}
		
		if($name == 'about')
		{
			$about = 'active';
		}
		
		if($name == 'services')
		{
			$services = 'active';
		}
		
		if($name == 'departments')
		{
			$departments = 'active';
		}
		
		if($name == 'blog')
		{
			$blog = 'active';
		}
		
		if($name == 'contact')
		{
			$contact = 'active';
		}
		
		/*$navigation = 
		'
			<li class="'.$home.'"><a href="'.site_url().'home'.'">Home</a></li>
			<li class="'.$about.'"><a href="'.site_url().'about'.'">About us</a></li>
			<li class="'.$services.'"><a href="'.site_url().'services'.'">Services</a></li>
			<li class="'.$portfolio.'"><a href="'.site_url().'portfolio'.'">Portfolio</a></li>
			<li class="'.$blog.'"><a href="'.site_url().'blog'.'">Blog</a></li>
			<li class="'.$contact.'"><a href="'.site_url().'contact'.'">Contact</a></li>
			
		';*/
		
		
		$navigation = 
		'
			<li><a href="#" class="'.$home.'">Home</a></li>
			<li><a href="#" class="'.$about.'">About us</a></li>
			<li><a href="#" class="'.$services.'">Services</a></li>
			<li><a href="#" class="'.$departments.'">Departments</a></li>
			<li><a href="#" class="'.$blog.'">Blog</a></li>
			<li><a href="#" class="'.$contact.'">Contact</a></li>
			
		';
		
		return $navigation;
	}
}
?>