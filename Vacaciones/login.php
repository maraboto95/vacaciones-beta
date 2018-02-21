<!DOCTYPE html>
<html>
<head>
	<title>Vacaciones Beta</title>
	<meta charset="utf-8">
	<link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap.css">
	<script type="text/javascript" src="js/jquery-3.3.1.min.js"></script>
	<script type="text/javascript" src="bootstrap/js/bootstrap.min.js"></script>
</head>
<body>
	<div class="container" style="padding-left:300px;">
		<div class="row">
			<div class="col-md-8 col-md-offset-3">
				<div class="page-header text-center">
					<h1>Login <small>Admin</small></h1>
				</div>
				<form class="form-signin" method="post" action="manejador.php">
					<h2 class="form-signin-heading" style="padding-left:200px;">Sign in</h2>
					<label for="user" class="sr-only">Nombre</label>
					<input type="text" name="usuario" class="form-control" placeholder="Nombre" required autofocus>
					<label for="password" class="sr-only">Apellido</label>
					<input type="password" name="password" class="form-control" placeholder="Password" required>
					<input type="submit" name="submit" class="btn btn-lg btn-primary btn-block" value="Sign In">
				</form>
			</div>
		</div>
	</div>
</body>
</html>