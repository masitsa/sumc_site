 <a id="comments"></a>
<?php
    $comments_query = $this->blog_model->get_post_comments($post_id);
    //comments
    $comments = 'No Comments';
    $total_comments = $comments_query->num_rows();
    if($total_comments == 1)
    {
        $title = 'comment';
    }
    else
    {
        $title = 'comments';
    }
    
    if($comments_query->num_rows() > 0)
    {
        $comments = '';
        foreach ($comments_query->result() as $row)
        {
            $post_comment_user = $row->post_comment_user;
            $post_comment_description = $row->post_comment_description;
            $date = date('jS M Y H:i a',strtotime($row->comment_created));
            
            $comments .= 
            '
            <!-- Comment -->
                <div class="pm-comment-box-container">
                                            
                    <div class="pm-comment-box-avatar-container">
                        <div class="pm-comment-avatar" style="background-image:url(img/news/01_avatar.jpg);">
                        </div>
                        <ul class="pm-comment-author-list">
                            <li><p class="pm-comment-name">'.$post_comment_user.'</p></li>
                            <li><p class="pm-comment-date">'.$date.'</p></li>
                        </ul>
                    </div>
                    <div class="pm-comment">
                        <p>'.$post_comment_description.'</p>
                    </div>
                </div>
            <!-- Comment end -->
               
            ';
        }
    }

?>

    <div class="pm-column-container pm-containerPadding80" style="background-color:#21BBC7;">
    
    	<div class="container">
        	<div class="row">
            	<div class="col-lg-12">
                	
                    <h4 class="pm-comments-response-title"><?php echo $total_comments;?> response to "<?php echo $post_title;?>"</h4>
                    
                    <!-- Comments --> 
                    <div class="pm-comments-container">
                        
                       <?php echo $comments;?>
                    
                    </div>
                    <!-- Comments end --> 
                    
                </div>
            </div>
        </div>
    
    </div>
    <!-- PANEL 4 end -->
    
    
    <!-- PANEL 5 -->
    <div class="container pm-containerPadding-top-100 pm-containerPadding-bottom-80">
    	<div class="row">
        	<div class="col-lg-12">
                
                <h4 class="pm-primary">Submit a Comment</h4>
                
                <p class="pm-required-comments">Your email address will not be published. Required fields are marked *</p>
                
                <div class="row pm-containerPadding-top-20">
                    
                    <form name="pm-submit-comment-form" action="post">
                    
                        <div class="col-lg-4 col-md-4 col-sm-12">
                            <input name="pm-comment-name" type="text" placeholder="Name *" class="pm-comment-form-textfield">
                        </div>
                        
                        <div class="col-lg-4 col-md-4 col-sm-12">
                            <input name="pm-comment-email" type="text" placeholder="Email *" class="pm-comment-form-textfield">
                        </div>
                        
                        <div class="col-lg-4 col-md-4 col-sm-12">
                            <input name="pm-comment-website" type="text" placeholder="Website" class="pm-comment-form-textfield">
                        </div>
                        
                        <div class="col-lg-12 pm-clear-element">
                            <textarea name="pm-comment-message" cols="20" rows="10" placeholder="Comment" class="pm-comment-form-textarea"></textarea>
                        </div>
                        
                        <div class="col-lg-12 pm-clear-element">
                            <div class="pm-comment-html-tags">
                                <span>You may use these HTML tags and attributes: </span>
    <p>&lt;a href="" title=""&gt; &lt;abbr title=""&gt; &lt;acronym title=""&gt; &lt;b&gt; &lt;blockquote cite=""&gt; &lt;cite&gt; &lt;code&gt; &lt;del datetime=""&gt; &lt;em&gt; &lt;i&gt; &lt;q cite=""&gt; &lt;strike&gt; &lt;strong&gt; </p>
                            </div>
                            
                            <input name="pm-comment-submit-btn" class="pm-rounded-btn no-border" type="button" value="Post Comment &plus;">
                            
                        </div>
                        
                    </form>
                
                </div>
                
            </div>
        </div>
    </div>
    <!-- PANEL 5 end-->