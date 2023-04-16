<?php

require __DIR__ . '/../vendor/autoload.php';

$dotenv = Dotenv\Dotenv::createImmutable(__DIR__ . '/..');
$dotenv->load();

$project_name = $_ENV['APP_NAME'];
$dev_name     = $_ENV['DEV_NAME'];
$php_version  = 8.1;
$phpMyadmin   = $_ENV["APP_URL"].":8080";

?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Happy Coding</title>

	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">

	<style>
		body{
			background-color: #191919;
		}

		.greeting{
			margin-top:80px;
		}

		.greeting .card-bottom{
			position: relative;
			height:270px
		}

		.greeting .card-principal{
			position: absolute;
			left: 14px;
			top:-14px;
		}

		.greeting .card{
			font-family: "Lucida Console";
			border-color: rgb(63, 248, 63);;
			background-color: #192020;
			color: white;

			min-width: 400px;
		}

		.greeting .group-fake-btn{
			display:flex;
			align-items: center;
		}
		
		.greeting .fake-btn{
			width: 16px;
			height: 16px;
			background-color: rgb(63, 248, 63);
			border-radius: 50px;
			margin-right:5px
		}

		.greeting .fake-btn.one{
			background-color: #ff6363;
		}

		.greeting .fake-btn.two{
			background-color: #ffff61;
		}

		.greeting .card-header{
			border-color: rgb(63, 248, 63);
			display: flex;
			justify-content: space-between;
			padding-top: 8px;
		}

		.greeting .title{
			color: rgb(63, 248, 63);
			margin-bottom: 10px;
		}

		.greeting .card-body{
			min-height: 220px;
			padding-top: 30px;
		}

		.greeting .card-body .item-info{
			display: flex;
			margin-bottom: 8px;
		}

		.greeting .card-body .item-info p{
			color: rgb(63, 248, 63);
		}

	</style>
</head>
<body>
	<main class="greeting">
		<div class="container">
			
			<div class="card card-bottom mx-auto col-6">

				<div class="card-header">
						<div class="group-fake-btn">
							<div class="fake-btn one"></div>
							<div class="fake-btn two"></div>
							<div class="fake-btn 3"></div>
						</div>
				</div>

				<div class="card card-principal col-12">
					<div class="card-header">
						<!-- <h5 class="my-0"><b>Happy Coding</b> 🎉</h5> -->
	
						<div class="group-fake-btn">
							<div class="fake-btn one"></div>
							<div class="fake-btn two"></div>
							<div class="fake-btn 3"></div>
						</div>
						
					</div>
					<div class="card-body ">
						<div class="item-info">
							<h5 class="title"><b>Happy Coding</b> 🎉</h5>
						</div>

						<div class="item-info">
							<p class="card-text"><b>Project &nbsp;&nbsp;&nbsp;&nbsp;:</b></p> 
							&nbsp; <?php echo $project_name ?>
						</div>
	
						<div class="item-info">
							<p class="card-text"><b>Dev name &nbsp;&nbsp;&nbsp;: </b></p> 
							&nbsp; <?php echo $dev_name ?>
						</div>
	
						<div class="item-info">
							<p class="card-text"><b>PHP version :</b></p>
							&nbsp; <?php echo $php_version ?>					
						</div>
	
						<div class="item-info">
							<p class="card-text"><b>PHP_MyAdmin :</b></p> 
							&nbsp;&nbsp;<a href="<?php echo $phpMyadmin ?>" target="_blank"><?php echo $phpMyadmin ?></a>						
						</div>
	
					</div>
					
				</div>
			</div>
		</div>
		
	</main>
</body>
</html>