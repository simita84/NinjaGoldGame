<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Ninja Game</title>
	<link rel="stylesheet" 
			  href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.1/css/bootstrap.min.css">
	<style type="text/css">
		div{
			margin: 10px;
		}
		.box{
			border: 2px solid black;
			padding:20px;
			border-radius: 10px;	
			height: 200px;
			width: 250px; 
			background:#ccf; 
		}
		#gold_count{
			border: 2px solid black;
			width: 250px;
			height: 50px;
			background:gold; 
		}
		.activity{
			border: 2px solid black;
			padding:5px;
			width: auto;
		}
		.red{
			color: red;
		}
		.green{
			color:green;
		}	 

	</style>
</head>
<body class="container">
	<h1 class="page-header">Gold Game</h1>
	<div class="row">
		<div class="col-md-4">
			<p>Your Gold:
				<span id="gold_count"> 
				 <?php echo $total_gold;?>
			</span>
			</p>
		</div>
		<div class="col-md-4">
			 <form action="/casino/reset" method="post">
			 	<input type="submit" value="Start Over" class="btn btn-danger">
			 </form>
		</div>
	</div>
	<div class="row">
		<div class="col-md-2  box">
			<h4>Farm</h4>
			<p>(earns 10 - 20 golds)</p>
			<form action="casino/process_money" method="post">
				<input type="hidden" name="building" value="farm">
				<input type="submit" value="Find Gold!">
			</form>
		</div>
		<div class="col-md-2 box">
			<h4>Cave</h4>
			<p>(earns 5 - 10 golds)</p>
			<form action="casino/process_money" method="post">
				<input type="hidden" name="building" value="cave">
				<input type="submit" value="Find Gold!">
			</form>
		</div>
		<div class="col-md-2 box">
			<h4>House</h4>
			<p>(earns 2 - 5 golds)</p>
			<form action="casino/process_money" method="post">
				<input type="hidden" name="building" value="house">
				<input type="submit" value="Find Gold!">
			</form>
		</div>
		<div class="col-md-2 box">
			<h4>Casino</h4>
			<p>(earns/takes 0-50 golds)</p>
			<form action="casino/process_money" method="post">
				<input type="hidden" name="building" value="casino">
				<input type="submit" value="Find Gold!">
			</form>
		</div>
	</div>
	<div>
		<?php if($activity)
		{ ?>
		<h3>Activities</h3>
		<div>
			 <p class="well"> 
			<?php for ($count=0; $count <count($activity); $count++) { 
				if(preg_match('/Lost/', $activity[$count])){
					echo "<span class='red'>"
					.$activity[$count]."</span>"."<br>";
				}
				else
				{
					echo "<span class='green'>"
					.$activity[$count]."</span>"."<br>";
				}
			}?>
			</p>	 		
		</div>
		<?}?>
	</div>
</body>
</html>