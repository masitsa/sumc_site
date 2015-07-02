<?php

$company_details = $this->site_model->get_contacts();

$popular_query = $this->blog_model->get_popular_posts();

if($popular_query->num_rows() > 0)
{
	$popular_posts = '';
	$count = 0;
	foreach ($popular_query->result() as $row)
	{
		$count++;
		
		if($count < 3)
		{
			$post_id = $row->post_id;
			$post_title = $row->post_title;
			$image = base_url().'assets/images/posts/thumbnail_'.$row->post_image;
			$comments = $this->users_model->count_items('post_comment', 'post_id = '.$post_id);
			$description = $row->post_content;
			$mini_desc = implode(' ', array_slice(explode(' ', $description), 0, 10));
			$created = date('jS M Y',strtotime($row->created));
			
			$popular_posts .= '
				<li>
					<div style="background-image:url('.$image.');" class="pm-recent-blog-post-thumb"></div>
					<div class="pm-recent-blog-post-details">
						<a href="'.site_url().'blog/view-single/'.$post_id.'">'.$mini_desc.'</a>
						<p class="pm-date">'.$created.'</p>
						<div class="pm-recent-blog-post-divider"></div>
					</div>
				</li>
			';
		}
	}
}

else
{
	$popular_posts = 'There are no posts yet';
}
?>
        <div class="pm-fat-footer pm-parallax-panel" data-stellar-background-ratio="0.5">
        	
            <div class="container">
                <div class="row">
                
                    <div class="col-lg-3 col-md-3 col-sm-12 pm-widget-footer">
                    
                    	<h6 class="pm-fat-footer-title"><span>About</span> us</h6>
                        <div class="pm-fat-footer-title-divider"></div>
                        
                        <p><?php echo implode(' ', array_slice(explode(' ', strip_tags($company_details['about'])), 0, 50));?></p>
                        
                    </div>
                    
                    
                    <div class="col-lg-4 col-md-4 col-sm-12 pm-widget-footer">
                    
                       <h6 class="pm-fat-footer-title"> <span>Request</span> an appointment</h6>
                       <div class="pm-fat-footer-title-divider"></div>
                       
                       <ul class="pm-general-icon-list">
                       	  <li>
                          	<span class="fa fa-mobile-phone pm-general-icon"></span>
                       		<p><?php echo $company_details['phone'];?></p>
                          </li>
                          <li>
                          	<span class="fa fa-inbox pm-general-icon"></span>
                       		<p><a href="mailto:<?php echo $company_details['email'];?>"><?php echo $company_details['email'];?></a></p>
                          </li>
                          <li>
                          	<span class="fa fa-bars pm-general-icon"></span>
                       		<p><a href="#">Fill out our appointment form</a></p>
                          </li>
                       </ul>
                        
                    </div>
                    
                    <div class="col-lg-4 col-md-4 col-sm-12 pm-widget-footer">
                    
                        <h6 class="pm-fat-footer-title"><span>Popular</span> Posts</h6>
                        <div class="pm-fat-footer-title-divider"></div>
                        
                        <ul class="pm-recent-blog-posts">
                            <?php echo $popular_posts;?>
                        </ul>
                        
                    </div>
                    
                </div>	
            </div>
            
        </div>
        
        <footer>

            
            <div class="container pm-containerPadding20">
            	<div class="row">
                
                	<div class="col-lg-4 col-md-4 col-sm-12 pm-center-mobile">
                        <img src="<?php echo base_url().'assets/logo/'.$company_details['logo'];?>" class="img-responsive pm-inline" alt="<?php echo $company_details['company_name'];?>" width="264" height="81" class="img-responsive pm-inline">
                    </div>
                    
                    <div class="col-lg-8 col-md-8 col-sm-12">
                    	<ul class="pm-footer-navigation">
                        	<?php echo $this->site_model->get_navigation_footer();?>
                        </ul>
                    </div>
                
                </div>
            </div>

                
        </footer>