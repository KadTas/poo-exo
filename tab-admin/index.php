<?php session_start();

if (isset($_SESSION['email']) AND isset($_SESSION['pass']))
{

?>


<!DOCTYPE html>
<html lang="en">
<head>
	<title>Pannel D'admin</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
<!--===============================================================================================-->
	<link rel="icon" type="image/png" href="images/icons/favicon.ico"/>
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/bootstrap/css/bootstrap.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="fonts/font-awesome-4.7.0/css/font-awesome.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/animate/animate.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/select2/select2.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/perfect-scrollbar/perfect-scrollbar.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="css/util.css">
	<link rel="stylesheet" type="text/css" href="css/main.css">
<!--===============================================================================================-->
</head>
<body>

	<div class="limiter">
		<div class="container-table100">
			<div class="wrap-table100">
				<div class="table100">
					<table>
						<thead>
							<tr class="table100-head">
								<th class="column1">id</th>
								<th class="column2">mail</th>
								<th class="column3">mdp</th>
								<th class="column4">Modifier</th>
								<th class="column5">Supprimer</th>
							</tr>
						</thead>
						<tbody>
								<tr>
									<td class="column1">1</td>
									<td class="column2">test@test.fr</td>
									<td class="column3">password</td>
									<td class="column4"><a href="#">Modifier</a></td>
									<td class="column5"><a href="#">Supprimer</a></td>
								</tr>
								<tr>
									<td class="column1">2</td>
									<td class="column2">test1@test.fr</td>
									<td class="column3">password1</td>
									<td class="column4"><a href="#">Modifier</a></td>
									<td class="column5"><a href="#">Supprimer</a></td>
								</tr>
						</tbody>
					</table>
					<br><br><br><br><br>
					<table>
						<thead>
							<tr class="table100-head">
								<th class="column1"><center><a href="logout.php">Se déconnecter</a></center></th>
							</tr>
						</thead>

					</table>
				</div>
			</div>
		</div>
	</div>




<!--===============================================================================================-->
	<script src="vendor/jquery/jquery-3.2.1.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/bootstrap/js/popper.js"></script>
	<script src="vendor/bootstrap/js/bootstrap.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/select2/select2.min.js"></script>
<!--===============================================================================================-->
	<script src="js/main.js"></script>

</body>
</html>
<?php }
else {
	header("Location:../index.php");
 } ?>
