
        <!-- PANEL 6 -->
        <div class="pm-column-container testimonials pm-parallax-panel" style="background-color:#20bac7; background-image:url(<?php echo base_url().'assets/images/center-blue.jpg'?>); background-repeat:repeat-y;" data-stellar-background-ratio="0.5" data-stellar-vertical-offset="0">
        	
            <div class="container pm-containerPadding100">
            	<div class="row">
                
                	<div class="col-lg-12 pm-center">
                    	<h5 class="light">What patients are saying about SUMC</h5>
                    </div>
                                
                	<div class="pm-testimonials-carousel" id="pm-testimonials-carousel">
                    
                    	<ul class="pm-testimonial-items">
                            <?php
                                if($reviews->num_rows() > 0)
                                {
                                    $reviews_no = $reviews->num_rows();
                                    $count = -1;
                                    foreach($reviews->result() as $rev)
                                    {           
                                        $review_id = $rev->review_id;
                                        $review_status = $rev->review_status;
                                        $review_name = $rev->review_name;
                                    ?>
                                    	<li>
                                            <div class="pm-testimonial-img" style="background-image:url(<?php echo base_url().'assets/images/avatar.jpg'?>);">
                                            	<div class="pm-testimonial-img-icon">
                                                	<img src="<?php echo base_url().'assets/themes/medicallink/'?>img/logo-small.png" class="img-responsive pm-center-align" alt="icon">
                                                </div>
                                            </div>
                                            <p class="pm-testimonial-name">Anonymous</p>
                                            <!-- <p class="pm-testimonial-title">Graphic Artist</p> -->
                                            <div class="pm-testimonial-divider"></div>
                                            <p class="pm-testimonial-quote"><?php echo $review_name;?></p>
                                        </li>
                            <?php
                                    }
                                }
                            ?>
                        </ul>
                    
                    </div>
                
                </div>
            </div>
            
        </div>
        <!-- PANEL 6 end -->
        