<?php 

include 'config/configlogin.php';

session_start();

error_reporting(0);

if (isset($_SESSION['username'])) {
    header("Location: cerdos.php");
}

if (isset($_POST['submit'])) {
	$email = $_POST['email'];
	$password = ($_POST['password']);

	$sql = "SELECT * FROM usuarios WHERE email='$email' AND passwordd='$password'";
	$result = mysqli_query($conn, $sql);
	if ($result->num_rows > 0) {
		$row = mysqli_fetch_assoc($result);
		$_SESSION['username'] = $row['username'];
		$userx=$row['username'];
		header("Location: cerdos.php");
		echo "<script>alert('Bienvenido $email.')</script>";
	} else {
		echo "<script>alert('Oink! Usuario o contraseña incorrecta(s).')</script>";
	}
}

?>

<!DOCTYPE html>
<html>
<head>
<link rel="icon" href="imagenes/cerdo.ico">
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">

	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">

	<link rel="stylesheet" type="text/css" href="css/estilologin.css">

	<title>EstroApp | Ingresar</title>
</head>
<body>
	<div class="container">
		<form action="" method="POST" class="login-email">
			<p class="login-text" style="font-size: 2rem; font-weight: 800;">EstroApp</p>
			<div class="input-group">
				<input placeholder="Usuario" name="email" value="<?php echo $email; ?>" required>
			</div>
			<div class="input-group">
				<input type="password" placeholder="Contraseña" name="password" value="<?php echo $_POST['password']; ?>" required>
			</div>
			<div class="input-group">
				<button name="submit" class="btn">Iniciar Sesión</button>
			</div>
			<p class="login-register-text">¿Deseas contratar EstroApp? Pulsa <a href="#">Aquí</a>.</p>
		</form>
	</div>
</body>
</html>