<!DOCTYPE html>
<html>
<head>
	<title>Chess PGN</title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
	<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">

	<!-- jQuery library -->
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

	<!-- Latest compiled JavaScript -->
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

	<style>
	img {
    display: block;
    margin-left: auto;
    margin-right: auto;}

    .upload-btn-wrapper {
	  position: relative;
	  overflow: hidden;
	  text-align: center;
	}

	.btn {
	  border: 2px solid gray;
	  color: gray;
	  background-color: white;
	  padding: 8px 20px;
	  border-radius: 8px;
	  font-size: 20px;
	  font-weight: bold;
	}

	.upload-btn-wrapper input[type=file] {
	  font-size: 100px;
	  position: absolute;
	  left: 0;
	  top: 0;
	  opacity: 0;
	}
</style>
</head>
<body>
	<nav class="navbar navbar-inverse">
		<div class="container-fluid">
			<div class="navbar-header">
				<button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#MyNavbar">
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
				</button>
				<a class="navbar-brand" href="#">Chess PGN</a>
			</div>
			<div class="collapse navbar-collapse" id="MyNavbar">
				<ul class="nav navbar-nav">
					<li><a href="<?php echo base_url(); ?>">Home</a></li>
					<li><a href="<?php echo base_url('playgame'); ?>">Play Game</a></li>
				</ul>
			</div>
		</div>
	</nav>

	<img src="<?php echo base_url('assets/img/chess.jpg');?>" alt="Chess" width="500" height="333" ><br>

