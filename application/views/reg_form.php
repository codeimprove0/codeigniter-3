 <div class="container-fluid">
 	<div class="jumbotron text-center">
 	</div>
 
 	<div class="row">
 		<div class="col-md-2"></div>
 		<div class="col-md-8">

 			<form method="post" action="<?php  if(isset($editInfo)){
			echo base_url('Registration/edit/').$editInfo->id;}else{  echo base_url('Registration/add'); } ?>" enctype="multipart/form-data">
 				<?php
					if ($this->session->flashdata('myMsj')) {
						$message =  $this->session->flashdata('myMsj');
					?>
 					<div class="<?php echo $message['class'] ?>"><?php echo $message['message']; ?> </div>
 				<?php } ?>
 				<div class="form-group row">
 					<div class="col-sm-1"> </div>
 					<label class="col-sm-3" for="name"> Name </label>
 					<div class="col-sm-4">
 						<input type="text" class="form-control" placeholder="Enter Name" name="userName" id="userName" value="<?php  if(isset($editInfo)){ echo $editInfo->name; }else{  echo set_value('userName'); }?>">
 					</div>
 					<?php echo form_error('userName'); ?>
 				</div>

 				<div class="form-group row">
 					<div class="col-sm-1"> </div>
 					<label class="col-sm-3" for="Email"> Email </label>
 					<div class="col-sm-4">
 						<input type="text" class="form-control" placeholder="Enter Email" name="emailId" id="emailId" value="<?php  if(isset($editInfo)){ echo $editInfo->email; }else{  echo set_value('emailId'); }?>" >
 					</div>
 					<?php echo form_error('emailId'); ?>
 				</div>

 				<div class="form-group row">
 					<div class="col-sm-1"> </div>
 					<label class="col-sm-3" for="name"> Phone No </label>
 					<div class="col-sm-4">
 						<input type="text" class="form-control" placeholder="Enter Phone No" name="phoneNo" id="phoneNo" value="<?php  if(isset($editInfo)){ echo $editInfo->phone_no; }else{  echo set_value('phoneNo'); }?>">
 					</div>
 					<?php echo form_error('phoneNo'); ?>
				 </div>
				 
				 <div class="form-group row">
 					<div class="col-sm-1"> </div>
 					<label class="col-sm-3" for="name"> Profile Pic </label>
 					<div class="col-sm-4">
 						<input type="file" class="form-control"  name="profile_pic" id="profile_pic" >
 					</div> 
 				</div>

 				<div class="form-group row">
 					<div class="col-sm-1"> </div>
 					<label class="col-sm-3" for="name"> Password </label>
 					<div class="col-sm-4">
 						<input type="password" class="form-control" placeholder="Enter Password" name="password" id="password" value="<?php  if(isset($editInfo)){ echo $editInfo->password; }else{  echo set_value('password'); }?>" >
 					</div>
 					<?php echo form_error('password'); ?>
 				</div>

 				<div class="form-group row">
 					<div class="col-sm-1"> </div>
 					<label class="col-sm-3" for="name"> Confirm Password </label>
 					<div class="col-sm-4">
 						<input type="password" class="form-control" placeholder="Confirm  Password" name="confirm_password" id="confirm_password" value="<?php  if(isset($editInfo)){ echo $editInfo->password; }else{  echo set_value('confirm_password'); }?>" >
 					</div>
 					<?php echo form_error('confirm_password'); ?>
 				</div>

 				<div class="form-group row">
 					<div class="col-sm-4"> </div>
 					<div class="col-sm-4">
						 <button type="submit" class="btn btn-primary"><?php echo $pageType;?></button>
						 <button class="btn btn-danger"><a href="<?php echo base_url('Registration/table/');?>" class="textCls">Back</a> </button> 
 					</div>
 				</div>

 			</form>
 		</div>
 	</div>
 </div>