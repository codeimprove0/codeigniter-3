

 
 Welcome :- <?php  echo  $this->session->userdata('USER_NAME'); ?>


 <a href="<?php echo base_url('/user/setdata')?>">Set</a><br/>
 <a href="<?php echo base_url('/user/sessionout')?>">LogOut</a>