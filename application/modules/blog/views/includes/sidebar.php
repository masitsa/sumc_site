<?php
$recent_query = $this->blog_model->get_recent_posts();

if($recent_query->num_rows() > 0)
{
	$recent_posts = '';
	
	foreach ($recent_query->result() as $row)
	{
		$post_id = $row->post_id;
		$post_title = $row->post_title;
		$image = base_url().'assets/images/posts/thumbnail_'.$row->post_image;
		$comments = $this->users_model->count_items('post_comment', 'post_comment_status = 1 AND post_id = '.$post_id);
		$title = 'Comments';
		if($comments == 1)
		{
			$title = 'Comment';
		}
		
		$recent_posts .= '
        	<li><a href="'.site_url().'blog/post/'.$post_id.'"><img src="'.$image.'" alt="'.$post_title.'" /></a></li>
		';
	}
}

else
{
	$recent_posts = 'No posts yet';
}

$categories_query = $this->blog_model->get_all_active_category_parents();
if($categories_query->num_rows() > 0)
{
	$categories = '';
	foreach($categories_query->result() as $res)
	{
		$category_id = $res->blog_category_id;
		$category_name = $res->blog_category_name;
		
		$posts_total = $this->blog_model->count_posts($category_id);
		
		$categories .= '
			<li><a href="'.site_url()."blog/category/".$category_id.'">'.$category_name.' <span class="badge">'.$posts_total.'</span></a></li>';
	}
}

else
{
	$categories = 'No categories';
}

$where = 'post.post_id = post_comment.post_id';
$table = 'post_comment, post';
$per_page = 4;
$page = 0;

$comments_query = $this->blog_model->get_comments($table, $where, $per_page, $page);
if($comments_query->num_rows() > 0)
{
	$comments = '';
	foreach($comments_query->result() as $row)
	{
		$post_id = $row->post_id;
		$post_comment_id = $row->post_comment_id;
		$post_title = $row->post_title;
		$post_comment_status = $row->post_comment_status;
		$post_comment_user = $row->post_comment_user;
		$post_comment_description = $row->post_comment_description;
		$mini_desc = implode(' ', array_slice(explode(' ', $post_comment_description), 0, 10));
		
		$comments .= '
			<div class="single_comments">
                <img src="'.base_url().'assets/images/avatar3.png" alt="" class="img-responsive"  />
                <p>'.$mini_desc.'</p>
                <div class="entry-meta small muted">
                    <span>By <a href="#">'.$post_comment_user.'</a></span ><span>On <a href="'.site_url().'blog/post/'.$post_id.'">'.$post_title.'</a></span>
                </div>
            </div>';
	}
}

else
{
	$comments = 'No comments';
}
?>
<div class="widget search">
    <form role="form">
            <input type="text" class="form-control search_box" autocomplete="off" placeholder="Search Here">
    </form>
</div><!--/.search-->

<div class="widget categories">
    <h3>Recent Comments</h3>
    <div class="row">
        <div class="col-sm-12">
            <?php echo $comments;?>
        </div>
    </div>                     
</div><!--/.recent comments-->
 

<div class="widget categories">
    <h3>Categories</h3>
    <div class="row">
        <div class="col-sm-6">
            <ul class="blog_category">
            	<?php echo $categories;?>
            </ul>
        </div>
    </div>                     
</div><!--/.categories-->

<!--<div class="widget archieve">
    <h3>Archieve</h3>
    <div class="row">
        <div class="col-sm-12">
            <ul class="blog_archieve">
                <li><a href="#"><i class="fa fa-angle-double-right"></i> December 2013 <span class="pull-right">(97)</span></a></li>
                <li><a href="#"><i class="fa fa-angle-double-right"></i> November 2013 <span class="pull-right">(32)</a></li>
                <li><a href="#"><i class="fa fa-angle-double-right"></i> October 2013 <span class="pull-right">(19)</a></li>
                <li><a href="#"><i class="fa fa-angle-double-right"></i> September 2013 <span class="pull-right">(08)</a></li>
            </ul>
        </div>
    </div>                     
</div>--><!--/.archieve-->

<div class="widget blog_gallery">
    <h3>Our gallery</h3>
    <ul class="sidebar-gallery">
    	<?php echo $recent_posts;?>
    </ul>
</div><!--/.blog_gallery-->