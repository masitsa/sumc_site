<?php

if(isset($department_id))
{
    $prev_checker = $this->departments_model->check_previous_department($department_id);
    $department_checker = $this->departments_model->check_department_department($department_id);

    if($prev_checker > 0)
    {
        $prev_link = '<li class="pm_tip_static_top" title="Prev. Department"><a href="'.site_url().'departments/view-single/'.$prev_checker.'" class="fa fa-angle-left"></a></li>';
    }
    else
    {
        $prev_link = '';
    }

    if($department_checker > 0)
    {
        $department_link = '<li class="pm_tip_static_top" title="Next department"><a href="'.site_url().'departments/view-single/'.$department_checker.'" class="fa fa-angle-right"></a></li>';
    }

    else
    {
        $department_link ='';
    }
}
if(!isset($title))
{
    $title_name = '<p class="pm-page-title">SUMC Departments</p>
                    <p class="pm-page-message">Keeping you up to date on the latest news in the medical world </p>';

    $ultra_mini_text = ' <ul class="pm-breadcrumbs">
                            <li><a href="'.site_url().'home">Home </a></li>
                            <li><i class="fa fa-angle-right"></i></li>
                            <li>departments</li>
                        </ul>
                        
                        <!--<ul class="pm-post-navigation">
                            <li class="pm_tip_static_top" title="Prev. Department"><a href="#" class="fa fa-angle-left"></a></li>
                            <li class="pm_tip_static_top" title="Next Department"><a href="#" class="fa fa-angle-right"></a></li>
                        </ul>-->';
}
else
{
    $title_name = '<p class="pm-page-title">'.$title.'</p>';
     $ultra_mini_text = '   <ul class="pm-breadcrumbs">
                                <li><a href="'.site_url().'home">Home </a></li>
                                <li><i class="fa fa-angle-right"></i></li>
                                <li ><a href="'.site_url().'departments">Departments</a></li>
                                <li><i class="fa fa-angle-right"></i></li>
                                <li>'.$ultra_mini_title.'...</li>
                            </ul>
                            
                            <ul class="pm-post-navigation">
                                '.$prev_link.'
                                '.$department_link.'
                            </ul>';
}

?>


<div class="pm-sub-header-container">
        
	<div class="pm-sub-header-info">
    	
        <div class="container">
        	<div class="row">
            	<div class="col-lg-12">
                	
                    <?php echo $title_name;?>
                    
                </div>
            </div>
        </div>
        
    </div>
    
    <div class="pm-sub-header-breadcrumbs">
    	
        <div class="container">
        	<div class="row">
            	<div class="col-lg-12">
                    <?php echo $ultra_mini_text;?>
                </div>
            </div>
        </div>
        
    </div>

</div>