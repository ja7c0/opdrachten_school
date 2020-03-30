<?php
	include 'config.php';

	$name = $_GET['name'];
	$q = "SELECT * FROM characters WHERE name=?";
	$stmt = $pdo->prepare($q);
	if($stmt->execute([$name])){
		$q = $stmt->fetch(PDO::FETCH_OBJ);
	}
?>

<!DOCTYPE html>
<html>
	<head>
		<title><?php echo "$q->name's character info" ?></title>
		
		<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css">
		<link rel="stylesheet" href="css/style.css">
	</head>
	<body>
		<header>
			<h1><?php echo "$q->name" ?></h1>
			<a class="backbutton" href="index.php"><i class="fas fa-long-arrow-alt-left"></i> Terug</a>
		</header>
		<div id="container">
			<div class="detail">
				<div class="left">
					<img class="avatar" src="<?php echo "img/$q->avatar" ?>">
					<div class="stats" style="background-color: <?php echo $q->color ?>">
						<ul class="fa-ul">
							<li><span class="fa-li"><i class="fas fa-heart"></i></span> <?php echo "$q->health" ?></li>
							<li><span class="fa-li"><i class="fas fa-fist-raised"></i></span> <?php echo "$q->attack" ?></li>
							<li><span class="fa-li"><i class="fas fa-shield-alt"></i></span> <?php echo "$q->defense" ?></li>
						</ul>
						<ul class="gear">
							<li><b>Weapon</b>: <?php echo "$q->weapon" ?></li>
							<li><b>Armor</b>: <?php echo "$q->armor" ?></li>
						</ul>
					</div>
				</div>
				<div class="right">
					<p><?php echo "$q->bio"; ?></p>
				</div>
				<div style="clear: both"></div>
			</div>
		</div>
		<footer>&copy; Jayco de Ligt - 2020</footer>
	</body>
</html>
