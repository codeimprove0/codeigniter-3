 <div class="container-fluid">
 	<div class="jumbotron text-center">
 	</div>

 	<div class="row">
 		<div class="col-md-2"></div>
 		<div class="col-md-8">
		 <button class="btn btn-primary"><a href="<?php echo base_url('Registration/add/');?>" class="textCls">Add</a> </button> 
		 <?php
					if ($this->session->flashdata('myMsj')) {
						$message =  $this->session->flashdata('myMsj');
					?>
 					<div class="<?php echo $message['class'] ?>"><?php echo $message['message']; ?> </div>
 				<?php } ?>
 			<table class="table table-bordered">
 				<thead>
 					<tr>
 						<th>Name</th> 
						 <th>Email</th>
						 <th>Phone</th>
						 <th>Profile Pic</th>
						 <th>Action</th>
 					</tr>
 				</thead>
 				<tbody>
					 <?php  foreach($userList as $row){ ?>
 					<tr>
 						<td><?php echo $row->name;?></td>
 						<td><?php echo $row->email;?></td>
						 <td><?php echo $row->phone_no;?></td>   
						 <td>
							<?php if($row->profile_pic){?>
								<img src="<?php echo base_url('public/images/').$row->profile_pic;?>" style="width:50px;height:80px">
							<?php } ?>

						 </td>  
						 <td> 
							<button class="btn btn-primary"><a href="<?php echo base_url('Registration/edit/').$row->id;?>" class="textCls">Edit</a> </button>
						    <button class="btn btn-danger"><a href="<?php echo base_url('Registration/delete/').$row->id;?>" class="textCls">Delete</a> </button>
						</td> 
					 </tr> 
					 <?php } ?>
 				</tbody>
 			</table>
			 <?php if (isset($links)) { ?>
                <?php echo $links ?>
            <?php } ?>
 		</div>
 	</div>
 </div>