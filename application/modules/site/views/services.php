
    <section id="feature" class="transparent-bg">
        <div class="container">
           <div class="center wow fadeInDown">
                <h2>Our Services</h2>
                <p class="lead">We are a leading provider in the following services</p>
            </div>

            <div class="row">
                <div class="features">
            	<?php
				if($services->num_rows() > 0)
				{
					foreach($services->result() as $serv)
					{
						$service_name = $serv->service_name;
						$description = $serv->service_description;
						$service_image = $serv->service_image_name;
						$description = implode(' ', array_slice(explode(' ', strip_tags($description)), 0, 5));
						
						?>
                        <div class="col-md-4 col-sm-6 wow fadeInDown" data-wow-duration="1000ms" data-wow-delay="600ms">
                            <div class="feature-wrap">
                            	<div class="row">
                                	<div class="col-md-3">
                                		<img class="img-responsive" src="<?php echo $service_location.$service_image;?>" alt="<?php echo $service_name;?>">
                                    </div>
                                    
                                    <div class="col-md-9">
                                        <h2><?php echo $service_name;?></h2>
                                    </div>
                            	</div>
                            </div>
                        </div><!--/.col-md-4-->
                        <?php
					}
				}
				?>
                </div><!--/.services-->
            </div><!--/.row--> 
			
			<?php
            if($services->num_rows() > 0)
            {
                foreach($services->result() as $serv)
                {
                    $service_name = $serv->service_name;
                    $description = $serv->service_description;
                    $service_image = $serv->service_image_name;
                    
                    ?>
                   <div class="get-started center wow fadeInDown">
                        <h2><?php echo $service_name;?></h2>
                        <div class="row">
                        	<div class="col-lg-5 col-md-4 col-sm-12 col-xs-12">
                            	<img class="img-responsive" src="<?php echo $service_location.$service_image;?>" alt="<?php echo $service_name;?>">
                            </div>
                            
                        	<div class="col-lg-7 col-md-8 col-sm-12 col-xs-12">
                            	<p class="lead"><?php echo $description;?></p>
                            </div>
                        </div>
                    </div><!--/.get-started-->
                    <?php
                }
            }
            ?>

            <!--<div class="clients-area center wow fadeInDown">
                <h2>What our client says</h2>
                <p class="lead">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut <br> et dolore magna aliqua. Ut enim ad minim veniam</p>
            </div>

            <div class="row">
                <div class="col-md-4 wow fadeInDown">
                    <div class="clients-comments text-center">
                        <img src="images/client1.png" class="img-circle" alt="">
                        <h3>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt</h3>
                        <h4><span>-John Doe /</span>  Director of corlate.com</h4>
                    </div>
                </div>
                <div class="col-md-4 wow fadeInDown">
                    <div class="clients-comments text-center">
                        <img src="images/client2.png" class="img-circle" alt="">
                        <h3>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt</h3>
                        <h4><span>-John Doe /</span>  Director of corlate.com</h4>
                    </div>
                </div>
                <div class="col-md-4 wow fadeInDown">
                    <div class="clients-comments text-center">
                        <img src="images/client3.png" class="img-circle" alt="">
                        <h3>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt</h3>
                        <h4><span>-John Doe /</span>  Director of corlate.com</h4>
                    </div>
                </div>
           </div>-->

        </div><!--/.container-->
    </section><!--/#feature-->
