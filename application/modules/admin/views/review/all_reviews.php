<div class="padd">
<a href="<?php echo site_url().'administration/add-review';?>" class="btn btn-success pull-right">Add Review</a>
<?php	

		$success = $this->session->userdata('success_message');
		
		if(!empty($success))
		{
			echo '<div class="alert alert-success"> <strong>Success!</strong> '.$success.' </div>';
			$this->session->unset_userdata('success_message');
		}
		
		$error = $this->session->userdata('error_message');
		
		if(!empty($error))
		{
			echo '<div class="alert alert-danger"> <strong>Oh snap!</strong> '.$error.' </div>';
			$this->session->unset_userdata('error_message');
		}
		
		//if users exist display them
		if ($query->num_rows() > 0)
		{
				?>
                <table class="table table-condensed table-striped table-hover">
                    <tr>
                    	<th>#</th>
                    	<th>Review</th>
                    	<th>Created</th>
                    	<th>Last modified</th>
                    	<th>Status</th>
                    	<th>Actions</th>
                    </tr>
                <?php
				$count = $page;
				foreach($query->result() as $cat){
					
					$review_id = $cat->review_id;
					$review_status = $cat->review_status;
					$review_name = $cat->review_name;
					$mini_desc = implode(' ', array_slice(explode(' ', strip_tags($review_name)), 0, 10));
					$created = date('jS M Y H:i a',strtotime($cat->created));
					$last_modified = date('jS M Y H:i a',strtotime($cat->last_modified));
					$count++;
					
					if($review_status == 1){
						$status = '<span class="label label-success">Active</span>';
					}
					else{
						$status = '<span class="label label-important">Deactivated</span>';
					}
					?>
                    <tr>
                    	<td><?php echo $count?></td>
                    	<td><?php echo $mini_desc?></td>
                    	<td><?php echo $created?></td>
                    	<td><?php echo $last_modified?></td>
                    	<td><?php echo $status?></td>
                    	<td>
                        	<a href="<?php echo site_url()."administration/edit-review/".$review_id.'/'.$page;?>" class="i_size" title="Edit">
                            <button class="btn btn-success btn-sm" type="button" ><i class="fa fa-pencil-square-o"></i> Edit</button>
                            	
                            </a>
                        	<a href="<?php echo site_url()."administration/delete-review/".$review_id.'/'.$page;?>" class="i_size" title="Delete" onclick="return confirm('Do you really want to delete this review?');">
                            	 <button class="btn btn-danger btn-sm" type="button" ><i class="fa fa-trash-o"></i> Delete</button>
                            </a>
                            <?php
								if($review_status == 1){
									?>
                                        <a href="<?php echo site_url()."administration/deactivate-review/".$review_id.'/'.$page;?>" class="i_size" title="Deactivate" onclick="return confirm('Do you really want to deactivate this review?');">
                            <button class="btn btn-warning btn-sm" type="button" ><i class="fa fa-thumbs-o-down"></i> Deactivate</button>
                                        </a>
                                    <?php
								}
								else{
									?>
                                        <a href="<?php echo site_url()."administration/activate-review/".$review_id.'/'.$page;?>" class="i_size" title="Activate" onclick="return confirm('Do you really want to activate this review?');">
                            <button class="btn btn-info btn-sm" type="button" ><i class="fa fa-thumbs-o-up"></i> Activate</button>
                                        </a>
                                    <?php
								}
							?>
                        </td>
                    </tr>
                    <?php
				}
				?>
                </table>
                <?php
			}
			
			else{
				echo "There are no reviews to display :-(";
			}
		?>
</div>