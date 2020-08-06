<!DOCTYPE html>
<html lang="en">

<head>
	<title><?php echo (isset($title))?$title:'Registration';?></title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="<?php echo base_url('/public/css/bootstrap.min.css'); ?>">
	<script src="<?php echo base_url('/public/js/jquery.min.js'); ?>"></script>
	<script src="<?php echo base_url('/public/js/bootstrap.min.js'); ?>"></script>
	<style>   
		.error {color: red}
	  	.textCls{ text-decoration: none; color: #fff ;}
		.textCls:hover{ text-decoration: none; color: #fff ;} 
		a:hover{text-decoration: none; } 
	</style>
</head>

<body> 