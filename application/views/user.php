<?php
defined('BASEPATH') or exit('No direct script access allowed');
?>
<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="utf-8">
	<title>Code</title>

</head>

<body>
<?php   
echo form_open('email/send');


$data = array(
	'type'  => 'text',
	'name'  => 'email',
	'id'    => 'hiddenemail',
	'value' => '',
	'class' => 'hiddenemail'
);

echo form_input($data); 

$data2 = array(
	'type'  => 'text',
	'name'  => 'email',
	'id'    => 'hiddenemail',
	'value' => '',
	'class' => 'hiddenemail'
);

echo form_input($data2);
$options = array(
	'small'         => 'Small Shirt',
	'med'           => 'Medium Shirt',
	'large'         => 'Large Shirt',
	'xlarge'        => 'Extra Large Shirt',
); 
$shirts_on_sale = array('small', 'large');
echo form_dropdown('shirts', $options, 'large'); 
echo form_submit('mysubmit', 'Submit Post!');

echo form_close();
?>
	<div id="container">
		 Name: <?php  echo $user_info[0]->name;   ?>
		<h2>User View Page - <?php echo $title; ?></h2>
		<ul>
			<?php foreach ($list as $val) { ?>
				<li> <?php echo $val; ?></li>
			<?php } ?>
		</ul>
	</div>
	<?php echo done(); echo "<br/>";
		echo amounts(100,'Amount is');
	?>

</body>

</html>