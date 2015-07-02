<?php
$related_query = $this->blog_model->get_related_posts($category_id, $post_id);

if($related_query->num_rows() > 0)
{
    foreach ($related_query->result() as $key) {
        # code...
        
    }
}
?>

<div class="row">
	<div class="col-lg-12">
    
    	<h4 class="pm-primary">Related Posts</h4>
        
        
        <div class="pm-single-blog-post-related-posts">
        
        	<ul class="pm-related-blog-posts">
                <!-- Post -->
                <li>
                    <div class="pm-related-blog-post-thumb" style="background-image:url(img/sidebar/post1.jpg);"></div>
                    <div class="pm-related-blog-post-details">
                        <a href="news-post.html">Lorem ipsum dolor sit amet consectetur adipiscing elit.</a>
                        <p class="pm-date">Jan 29, 2015 by Dr. Jane Williams</p>
                    </div>
                </li>
                <!-- Post end -->
                <!-- Post -->
                <li>
                    <div class="pm-related-blog-post-thumb" style="background-image:url(img/sidebar/post2.jpg);"></div>
                    <div class="pm-related-blog-post-details">
                        <a href="news-post.html">Pellentesque congue semper massa vitae consectetur. </a>
                        <p class="pm-date">Jan 29, 2015 by Dr. Jane Williams</p>
                    </div>
                </li>
                <!-- Post end -->
                <!-- Post -->
                <li>
                    <div class="pm-related-blog-post-thumb" style="background-image:url(img/sidebar/post3.jpg);"></div>
                    <div class="pm-related-blog-post-details">
                        <a href="news-post.html">Phasellus vestibulum et velit at fringilla curabitur elementum.</a>
                        <p class="pm-date">Jan 29, 2015 by Dr. Jane Williams</p>
                    </div>
                </li>
                <!-- Post end -->
            </ul>
        
        </div>
        
        
        
    </div>
</div>