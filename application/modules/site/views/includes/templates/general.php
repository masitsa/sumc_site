<!DOCTYPE html>
<html lang="en">
	<?php echo $this->load->view('includes/header', '', TRUE);?>
	
    <body>
		<div id="pm_layout_wrapper" class="pm-full-mode"><!-- Use wrapper for wide or boxed mode -->
			<?php echo $this->load->view('includes/navigation', '', TRUE);?>
            <?php echo $content; ?>
            <?php echo $this->load->view('includes/footer', '', TRUE);?>
		</div>
        
        <!-- Bootstrap core JavaScript
        ================================================== -->
        <!-- Placed at the end of the document so the pages load faster -->
        <script src="<?php echo base_url().'assets/themes/medicallink/'?>js/jquery.viewport.mini.js"></script>
        <script src="<?php echo base_url().'assets/themes/medicallink/'?>js/jquery.easing.1.3.js"></script>
        <script src="<?php echo base_url().'assets/themes/medicallink/'?>bootstrap3/js/bootstrap.min.js"></script>
        <script src="<?php echo base_url().'assets/themes/medicallink/'?>js/modernizr.custom.js"></script>
        <script src="<?php echo base_url().'assets/themes/medicallink/'?>js/owl-carousel/owl.carousel.js"></script>
        <script src="<?php echo base_url().'assets/themes/medicallink/'?>js/main.js"></script>
        <script src="<?php echo base_url().'assets/themes/medicallink/'?>js/jquery.tooltip.js"></script>
        <script src="<?php echo base_url().'assets/themes/medicallink/'?>js/superfish/superfish.js"></script>
        <script src="<?php echo base_url().'assets/themes/medicallink/'?>js/superfish/hoverIntent.js"></script>
        <script src="<?php echo base_url().'assets/themes/medicallink/'?>js/stellar/jquery.stellar.js"></script>
        <script src="<?php echo base_url().'assets/themes/medicallink/'?>js/theme-color-selector/theme-color-selector.js"></script>
        <script src="<?php echo base_url().'assets/themes/medicallink/'?>js/pulse/jquery.PMSlider.js"></script>
        <script src="<?php echo base_url().'assets/themes/medicallink/'?>js/meanmenu/jquery.meanmenu.min.js"></script>
        <script src="<?php echo base_url().'assets/themes/medicallink/'?>js/flexslider/jquery.flexslider.js"></script>
        <script src="<?php echo base_url().'assets/themes/medicallink/'?>js/jquery.testimonials.js"></script>
        <script src="<?php echo base_url().'assets/themes/medicallink/'?>js/wow/wow.min.js"></script>
        <script src="<?php echo base_url().'assets/themes/medicallink/'?>js/jquery-migrate-1.2.1.js"></script>
        <script src="<?php echo base_url().'assets/themes/medicallink/'?>js/prettyphoto/js/jquery.prettyPhoto.js"></script>
        <script src="<?php echo base_url().'assets/themes/medicallink/'?>js/tinynav.js"></script>
        <script src="<?php echo base_url().'assets/themes/medicallink/'?>js/jquery-ui.js"></script>
    	<script src="<?php echo base_url().'assets/themes/medicallink/'?>js/isotope/jquery.isotope.min.js"></script>
        <script type="text/javascript">
			$( document ).on( "submit", "form#pm-appointment-form", function(e) 
			{
				var formData = new FormData(this);
				
				$.ajax({
					url: '<?php echo site_url();?>site/contact_us/book_appointment',
					data: formData,
					processData: false,
					contentType: false,
					type: 'POST',
					dataType: "json",
					success: function(data)
					{
						$('#appointment_message').html(data.message);
						if(data.status == 'success')
						{
							$( "form#pm-appointment-form" )[0].reset();
						}
						
						else
						{
							
						}
					}
				});
				
				return false;
			});
		</script>
        <p id="back-top" class="visible-lg visible-md visible-sm"></p>
	</body>
</html>