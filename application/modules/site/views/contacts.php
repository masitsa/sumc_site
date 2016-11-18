<?php 
	if(count($contacts) > 0)
	{
		$email = $contacts['email'];
		$phone = $contacts['phone'];
		$facebook = $contacts['facebook'];
		$twitter = $contacts['twitter'];
		$linkedin = $contacts['linkedin'];
		$logo = $contacts['logo'];
		$company_name = $contacts['company_name'];
		$address = $contacts['address'];
		$city = $contacts['city'];
		$post_code = $contacts['post_code'];
		$building = $contacts['building'];
		$floor = $contacts['floor'];
		$location = $contacts['location'];
		$working_weekend = $contacts['working_weekend'];
		$working_weekday = $contacts['working_weekday'];
		
		if(!empty($email))
		{
			$mail = '<div class="top-number"><p><i class="fa fa-envelope-o"></i> '.$email.'</p></div>';
		}
		
		if(!empty($facebook))
		{
			$facebook = '<li><a href="'.$facebook.'" target="_blank"><i class="fa fa-facebook"></i></a></li>';
		}
		
		if(!empty($twitter))
		{
			$twitter = '<li><a href="'.$twitter.'" target="_blank"><i class="fa fa-twitter"></i></a></li>';
		}
		
		if(!empty($linkedin))
		{
			$linkedin = '<li><a href="'.$linkedin.'" target="_blank"><i class="fa fa-linkedin"></i></a></li>';
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
	}
?>
<?php echo $this->load->view('site/includes/sub_header', '', TRUE);?>

        
        <!-- PANEL 1 -->
        <div class="container pm-containerPadding-top-80 pm-containerPadding-bottom-50">
        
        	<div class="row">
            	<div class="col-lg-12 pm-columnPadding30 pm-center">
                	
                    <h5>Get in touch with us</h5>
                    <div class="pm-column-title-divider">
                    	<img height="29" width="29" src="<?php echo base_url();?>assets/themes/medicallink/img/logo-small.png" alt="icon">
                    </div>
                    
                    <p>Get in touch with us by phone, email or visit us in Strathmore University Madaraka, Ole Sangale Road</p>
                    
                    <br />
                    
                    <p><strong>Phone:</strong> <?php echo $phone;?></p>
                    <p><strong>Email:</strong> <a href="mailto:<?php echo $email;?>"><?php echo $email;?></a></p>
                    
                    <br />
                    <br />
                    
                    <h5>Location</h5>
                    <div class="pm-column-title-divider">
                    	<img height="29" width="29" src="<?php echo base_url();?>assets/themes/medicallink/img/logo-small.png" alt="icon">
                    </div>
                    
                    <p><?php echo $building;?> <br /><?php echo $location;?> <br /><?php echo $floor;?></p>
                    
                </div>
            </div>
        
        
        </div>
        
        <div class="row">
            <div class="col-md-12">
                <div id="map_canvas" style="width: 100%; height:450px"></div>
            </div>
        </div>
        <!-- PANEL 1 end -->
        
        <!-- PANEL 2 -->
        <div class="container pm-containerPadding110">
        
        	<div class="row">
            	<div class="col-lg-12 pm-center pm-column-spacing">
                	<h5>Contact us by Form</h5>
                    <div class="pm-column-title-divider">
                    	<img height="29" width="29" src="<?php echo base_url();?>assets/themes/medicallink/img/logo-small.png" alt="icon">
                    </div>
                </div>
            </div>
            
            <div class="row">
                
                	<form action="<?php echo site_url();?>site/contact_us/contact" method="post" id="contact-form">
                		<p class="col-md-12" id="appointment_message" style="text-align:center; color:#0db7c4;"></p>
                    	
                        <div class="col-lg-6 col-md-6 col-sm-12">
                            <input name="first_name" class="pm-form-textfield" type="text" placeholder="First Name">
                        </div>
                        
                        <div class="col-lg-6 col-md-6 col-sm-12">
                            <input name="last_name" class="pm-form-textfield" type="text" placeholder="Last Name">
                        </div>
                        
                        <div class="col-lg-6 col-md-6 col-sm-12">
                            <input name="email" class="pm-form-textfield" type="text" placeholder="Email Address">
                        </div>
                        
                        <div class="col-lg-6 col-md-6 col-sm-12">
                            <input name="phone" class="pm-form-textfield" type="text" placeholder="Phone Number">
                        </div>
                        
                        <div class="col-lg-12">
                            <textarea name="message" class="pm-form-textarea" cols="50" rows="10" placeholder="Message"></textarea>
                        </div>
                        
                        <div class="col-lg-12 pm-center">
                            <input type="submit" value="Submit Form &plus;" name="pm-form-submit-btn" class="pm-form-submit-btn" id="pm-contact-form-btn">
                            <div id="pm-contact-form-response"></div>
                            <p class="pm-required">all fields are required</p>
                        </div>
                    
                    </form>
                
                
                </div>
            
        </div>
        <!-- PANEL 2 end -->
        


<script type="text/javascript"   src="http://maps.google.com/maps/api/js?sensor=false"> </script>

<script type="text/javascript">
$(document).ready(function() {
	initialize()
});
  function initialize() {
    var position = new google.maps.LatLng('-1.309690', '36.814021');
	 <!-- var position = new google.maps.LatLng(latitude, longitude);-->
    var myOptions = {
      zoom: 18,
      center: position,
      mapTypeId: google.maps.MapTypeId.ROADMAP
		//mapTypeId: google.maps.MapTypeId.HYBRID
    };
    var map = new google.maps.Map(
        document.getElementById("map_canvas"),
        myOptions);
 
    var marker = new google.maps.Marker({
        position: position,
        map: map,
        title:"<?php echo $company_name;?>"
    });  
 
   var contentString = '<br/><span itemprop="streetAddress"><?php echo $building;?></span>, <span itemprop="addressLocality"><?php echo $location.', '.$floor;?></span>';
    //var contentString = '';
    var infowindow = new google.maps.InfoWindow({
        content: contentString
    });
       infowindow.open(map,marker);
    google.maps.event.addListener(marker, 'click', function() {
      infowindow.open(map,marker);
    });
 
  }
			
			$( document ).on( "submit", "form#contact-form", function(e) 
			{
				var formData = new FormData(this);
				
				$.ajax({
					url: '<?php echo site_url();?>site/contact_us/contact',
					data: formData,
					processData: false,
					contentType: false,
					type: 'POST',
					dataType: "json",
					success: function(data)
					{
						$('#pm-contact-form-response').html(data.message);
						if(data.status == 'success')
						{
							$( "form#contact-form" )[0].reset();
						}
						
						else
						{
							
						}
					}
				});
				
				return false;
			});
 
</script>
