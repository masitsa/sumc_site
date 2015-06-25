<!DOCTYPE html>
<html lang="en">
	<?php echo $this->load->view('site/includes/header', '', TRUE);?>
	
    <body>
		<?php echo $this->load->view('site/includes/navigation', '', TRUE);?>

        <section id="blog" class="container">
            <div class="center">
                <h2><?php echo $page_title;?></h2>
            </div>
    
            <div class="blog">
                <div class="row">
                     <div class="col-md-8">
                        <?php echo $content;?>
                    </div><!--/.col-md-8-->
    
                    <aside class="col-md-4">
                        <?php echo $this->load->view('includes/sidebar', '', TRUE); ?>
                    </aside>  
                </div><!--/.row-->
            </div>
        </section><!--/#blog-->

    <?php echo $this->load->view('site/includes/footer', '', TRUE);?>
</body>
</html>