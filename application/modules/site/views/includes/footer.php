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
		<!-- Start site footer -->
        <footer class="site-footer">
            <div class="container">
                <div class="site-footer-top">
                    <div class="row">
                        <div class="col-md-4 widget footer_widget text_widget">
                            <h4>About our church</h4>
                            <hr class="sm">
                            <p><?php echo implode(' ', array_slice(explode(' ', strip_tags($company_details['about'])), 0, 50));?></p>
                        </div>
                        <div class="col-md-4 widget footer_widget twitter_widget">
                            <h4>Twitter feeds</h4>
                            <hr class="sm">
                            <ul class="twitter-widget"></ul>
                        </div>
                        <div class="col-md-4 widget footer_widget newsletter_widget">
                            <h4>News subscription</h4>
                            <hr class="sm">
                            <p>Subscribe to our newsletter in order to receive the latest new &amp; articles. We promise we won't spam your inbox!</p>
                            <div class="input-group">
                                <span class="input-group-addon">@</span>
                                <input type="text" class="form-control">
                                <span class="input-group-btn">
                                <button class="btn btn-primary" type="button">Go!</button>
                                </span>
                            </div>
                        </div>
                    </div>
                    <!-- Quick Info -->
                    <div class="quick-info">
                        <div class="row">
                            <div class="col-md-3 col-sm-6">
                                <h4><i class="fa fa-clock-o"></i> Service Times</h4>
                                <p>Sundays @ 10:00 am<br>Starting October 1</p>
                            </div>
                            <div class="col-md-3 col-sm-6">
                                <h4><i class="fa fa-map-marker"></i> Our Location</h4>
                                <p>777, Path to God<br>United States of America</p>
                            </div>
                            <div class="col-md-3 col-sm-6">
                                <h4><i class="fa fa-envelope"></i> Contact Info</h4>
                                <p>11 - 00 - 653240<br>email@adorechurch.com</p>
                            </div>
                            <div class="col-md-3 col-sm-6">
                                <h4><i class="fa fa-clock-o"></i> Socialize with us</h4>
                                <ul class="social-icons-colored inversed">
                                    <li class="facebook"><a href="http://www.facebook.com/"><i class="fa fa-facebook"></i></a></li>
                                    <li class="vimeo"><a href="http://www.vimeo.com/"><i class="fa fa-vimeo-square"></i></a></li>
                                    <li class="twitter"><a href="http://twitter.com/"><i class="fa fa-twitter"></i></a></li>
                                    <li class="googleplus"><a href="http://plus.google.com/"><i class="fa fa-google-plus"></i></a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="site-footer-bottom">
                        <div class="row">
                            <div class="col-md-6 col-sm-6 copyrights-coll">
                                &copy; 2014 Adore Church. All Rights Reserved
                            </div>
                            <div class="col-md-6 col-sm-6 copyrights-colr">
                                <nav class="footer-nav" role="navigation">
                                    <ul>
                                        <li><a href="index.html">Home</a></li>
                                        <li><a href="donate.html">Donate now</a></li>
                                        <li><a href="new-here.html">New here?</a></li>
                                        <li><a href="contact.html">Contact</a></li>
                                    </ul>
                                </nav>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </footer>
        <!-- End site footer -->
        <a id="back-to-top"><i class="fa fa-angle-double-up"></i></a>  
    <!-- Event Directions Popup -->
<div class="quick-info-overlay">
	<div class="quick-info-overlay-left accent-bg">
        <a href="index.html#" class="btn-close"><i class="icon-delete"></i></a>
    	<div class="event-info">
    		<h3 class="event-title"> </h3>
      		<div class="event-address"></div>
            <a href="index.html" class="btn btn-default btn-transparent btn-permalink">Full details</a>
        </div>
    </div>
	<div class="quick-info-overlay-right">
      	<div id="event-directions"></div>
    </div>
</div>
<!-- Event Contact Modal Window -->
<div class="modal fade" id="Econtact" tabindex="-1" data-backdrop="static" role="dialog" aria-labelledby="Econtact" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        <h4 class="modal-title" id="myModalLabel">Contact Event Manager <span class="accent-color"></span></h4>
      </div>
      <div class="modal-body">
        <form>
            <div class="row">
                <div class="col-md-6">
                    <input type="text" name="fname" class="form-control" placeholder="First name (Required)">
                </div>
                <div class="col-md-6">
                    <input type="text" name="lname" class="form-control" placeholder="Last name">
                </div>
            </div>
            <div class="row">
                <div class="col-md-6">
                    <input type="email" name="email" class="form-control" placeholder="Your email (Required)">
                </div>
                <div class="col-md-6">
                    <input type="number" name="phone" class="form-control" placeholder="Your phone">
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <textarea rows="3" cols="5" class="form-control" placeholder="Additional notes"></textarea>
                </div>
            </div>
            <input type="submit" name="donate" class="btn btn-primary btn-lg btn-block" value="Contact Now">
        </form>
      </div>
      <div class="modal-footer">
        <p class="small short">If you would prefer to call in for inquiries, please call 1800.785.876</p>
      </div>
    </div>
  </div>
</div>

