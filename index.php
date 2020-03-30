<?php 
	include 'config.php';
?>

<!DOCTYPE html>
<html>
	<head>
		<title>Characters</title>
		<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css">
		<link rel="stylesheet" href="css/style.css">
	</head>
	<body>
		<header>
			<h1>Alle <?php echo $rc ?> characters uit de database</h1>
		</header>
		
		<div id="container">
			<div class="row justify-content-md-center">
				<?php
					$characters = "select * from characters order by name";
					$stm = $pdo->prepare($characters);
					$stm->execute();
					if($stm->execute()){
					$characters = $stm->fetchAll(PDO::FETCH_OBJ);
						foreach ($characters as $characters){
							echo "<a style='background-color: $characters->color' class='item' href='characters.php?name=$characters->name'>";
							echo "<div class='left'>";
							echo "<img class='avatar' src='img/$characters->avatar'>";
							echo "</div>";
							echo "<div class='right'>";
							echo "<h2>$characters->name</h2>";
							echo "<div class='stats'>";
							echo "<ul class='fa-ul'>";
							echo "<li><span class='fa-li'><i class='fas fa-heart'></i></span> $characters->health</li>";
							echo "<li><span class='fa-li'><i class='fas fa-fist-raised'></i></span> $characters->attack</li>";
							echo "<li><span class='fa-li'><i class='fas fa-shield-alt'></i></span> $characters->defense</li>";
							echo "</ul>";
							echo "</div>";
							echo "</div>";
							echo "</a>";
						}
					} 
				?>
			</div>
		</div>
		<footer>&copy; Jayco de Ligt - 2020</footer>
	</body>
	
	<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js"></script>
	<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
</html>

