<?php
	$contacts = $this->site_model->get_contacts();
	
	if(count($contacts) > 0)
	{
		$email = $contacts['email'];
		$email2 = $contacts['email'];
		$facebook = $contacts['facebook'];
		$twitter = $contacts['twitter'];
		$linkedin = $contacts['linkedin'];
		$logo = $contacts['logo'];
		$company_name = $contacts['company_name'];
		$phone = $contacts['phone'];
		
		if(!empty($email))
		{
			$email = '<div class="top-number"><p><i class="fa fa-envelope-o"></i> '.$email.'</p></div>';
		}
		
		if(!empty($facebook))
		{
			$twitter = '<li class="pm_tip_static_bottom" title="Twitter"><a href="#" class="fa fa-twitter" target="_blank"></a></li>';
		}
		
		if(!empty($facebook))
		{
			$linkedin = '<li class="pm_tip_static_bottom" title="Linkedin"><a href="#" class="fa fa-linkedin" target="_blank"></a></li>';
		}
		
		if(!empty($facebook))
		{
			$google = '<li class="pm_tip_static_bottom" title="Google Plus"><a href="#" class="fa fa-google-plus" target="_blank"></a></li>';
		}
		
		if(!empty($facebook))
		{
			$facebook = '<li class="pm_tip_static_bottom" title="Facebook"><a href="#" class="fa fa-facebook" target="_blank"></a></li>';
		}
	}
	else
	{
		$email = '';
		$facebook = '';
		$twitter = '';
		$linkedin = '';
		$logo = '';
		$company_name = '';
		$google = '';
	}
?>
    
    
    	<!-- Sub-Menu -->
    	<div class="pm-sub-menu-container">
        
        	<div class="container">
            
            	<div class="row">
                	
                    <div class="col-lg-6 col-md-6 col-sm-12">
                    	
                        <div class="pm-sub-menu-info">
                        	
                            <ul class="pm-micro-navigation">
                            	<li><a href="#">Clinic Information</a></li>
                                <li><a href="#">General Questions</a></li>
                                <li><a href="#" class="pm-appointment-form-btn">Request an appointment</a></li>
                            </ul>
                            
                        </div>
                                                
                    </div>
                    
                    
                    <div class="col-lg-6 col-md-6 col-sm-12">
                    
                    	<ul class="pm-social-navigation">
                        	<?php echo $facebook; echo $twitter; echo $linkedin; echo $google;?>
                        </ul>
                        
                    </div>
                    
                </div>
            
            </div>
            
        </div>
        <!-- /Sub-header -->
        
        <!-- Request appointment form -->
        <div class="pm-request-appointment-form" id="pm-appointment-form-container">
        	
            <div class="container">
            	<div class="row">
                	
                    <form action="#" method="post" id="pm-appointment-form">
                        <div class="col-lg-4 col-md-4 col-sm-6">
                        	<input name="pm_app_form_name" id="pm_app_form_name" type="text" class="pm-request-appointment-form-textfield" placeholder="Full Name">
                        </div>
                        <div class="col-lg-4 col-md-4 col-sm-6">
                        	<input name="pm_app_form_email" id="pm_app_form_email" type="email" class="pm-request-appointment-form-textfield" placeholder="Email Address">
                        </div>
                        <div class="col-lg-4 col-md-4 col-sm-6">
                        	<input name="pm_app_form_phone" id="pm_app_form_phone" type="phone" class="pm-request-appointment-form-textfield" placeholder="Phone Number">
                        </div>
                        <div class="col-lg-6 col-md-6 col-sm-6">
                        	<input name="pm_app_form_date" id="pm_app_form_date" class="pm-request-appointment-form-textfield appointment-form-datepicker" type="text" placeholder="Date of Appointment" id="datepicker">
                        </div>
                        <div class="col-lg-6 col-md-6 col-sm-12">
                        	<input name="pm_app_form_time" id="pm_app_form_time" class="pm-request-appointment-form-textfield" type="text" placeholder="Time of Appointment (ex. 10:30am)">
                        </div>
                        
                        <div class="col-lg-12 pm-clear-element" style="padding-top:20px;">
                        	<div id="pm-appointment-form-response"></div>
                        	<input type="submit" value="Submit Request" class="pm-square-btn appointment-form" id="pm-appointment-form-btn" />
                            <p class="pm-appointment-form-notice">All fields are required.</p>
                            <a href="#" class="pm-appointment-form-close" id="pm-close-appointment-form"><i class="fa fa-close"></i> Close Appointment form</a>
                        </div>
                        
                        <input type="hidden" value="info@pulsarmedia.ca" name="pm_app_form_recipient" />
                        
                    </form>
                    
                </div>
            </div>
            
        </div>
        <!-- Request appointment form end -->
            
    	<!-- Header area -->
        <header>
                
        	<div class="container">
            
            	<div class="row">
                
                	<div class="col-lg-4 col-md-4 col-sm-12">
                    
                    	 <div class="pm-header-logo-container">
                            <a href="<?php echo site_url();?>"><img src="<?php echo base_url().'assets/logo/'.$logo;?>" class="img-responsive pm-header-logo" alt="<?php echo $company_name;?>" class="img-responsive"></a> 
                        </div>
                        
                    </div>
                    
                    <div class="col-lg-8 col-md-8 col-sm-12">
                    	
                        <ul class="pm-header-info">
                        	<li><p><i class="fa fa-mobile-phone"></i> <?php echo $phone?></p></li>
                            <li><p> <i class="fa fa-inbox"></i> &nbsp;<a href="mailto:<?php echo $email2;?>"><?php echo $email2;?></a></p></li>
                        </ul>
                        
                        <ul class="pm-search-container">
                        	<li>
                            	<div class="pm-search-field-container">
                                	<a href="#" class="fa fa-search"></a>
                                	<form action="#" method="post">
                                    	<input name="pm-search-field" class="pm-search-field" type="text" placeholder="search...">
                                    </form>
                                </div>
                            </li>
                            <li>
                            	<div class="pm-dropdown pm-categories-menu">
                                    <div class="pm-dropmenu">
                                        <p class="pm-menu-title">Categories</p>
                                        <i class="fa fa-angle-down"></i>
                                    </div>
                                    <div class="pm-dropmenu-active">
                                        <ul>
                                           <li><a href="news.html">Health</a></li>
                                           <li><a href="news.html">Medicine</a></li>
                                           <li><a href="news.html">Research</a></li>
                                           <li><a href="news.html">Diseases</a></li>
                                        </ul>
                                    </div>
                                </div>
                            </li>
                        </ul>
                        
                    </div>
                    
                </div>
            
            </div>
                    
        </header>
        <!-- /Header area end -->
        
        <!-- Navigation area -->
        <div class="pm-nav-container">
        
        	<div class="container">
            
                <div class="row">
                    
                    <div class="col-lg-12 col-md-12 col-sm-12">
                        
                        <nav class="navbar-collapse collapse" id="pm-main-navigation">
                        
                            <ul class="sf-menu pm-nav">
                        
                        		<?php echo $this->site_model->get_navigation();?>
                            
                            </ul>
                        
                        </nav> 
                    
                    </div>
                    
                </div>
            
            </div>
        
        </div>
        <!-- Navigation area end -->

