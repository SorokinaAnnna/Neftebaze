
<html lang="ru">
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		 <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
	</head>
<body>
	<nav class="navbar navbar-expand-lg ">
		<div class="container-fluid">
			<div class="collapse navbar-collapse" id="navbarSupportedContent">
				<ul style="width: 100%" class="navbar-nav me-auto mb-2 mb-lg-0">
					<li class="nav-item">
						<a class="nav-link" href="addInfo.php">Отправить заявку</a>
					</li>
					<li class="nav-item">
						<a class="nav-link active" href="index.php">Виды топлива</a>
					</li>
				</ul>
			</div>
		</div>
	</nav>
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
</body>
</html>
<?php
	function Enter()
	{
		if(isset($_POST['Entry']))
		{
			session_start();
			$_SESSION['login'] = $_POST['login'];
			$_SESSION['password'] = $_POST['password'];
			header("Location: enter1.php");
		}
	}
	Enter();
?>

<form method = 'post' style="margin-top: 10%; margin-left: 40%">
	<p>
	   Логин <br><input style="margin-bottom: 10px" type = "text" name = "login"> <br> 
	   Пароль<br><input type = "password" name = "password"> <br>
	</p>
	<button class="btn btn-info" type="submit" name="Entry">Войти</button>
</form>