<!--Создать две таблицы в БД: Автор (id, ФИО автора), Книга (id, id_автора, Название книги, Количество страниц, Издательство, год издания). Реализовать сайт из 3-х страниц: главная, Добавление информации, Просмотр сведений. Главная содержит общую информацию (вывод из БД). 
Добавление информации содержит формы для добавления информации об авторах и книгах с сохранением в БД. 
Просмотр сведений содержит таблицу с данными из 2 таблиц с возможностью фильтрации по автору и году издания, сортировка данных по авторам, названию книги, году издания). -->
<?

	//функция для добавления новой книги
	function NewApplication()
	{
		include "connection.php";
		
			$result = mysqli_query($link,"SELECT id FROM tb_oil WHERE id = '".$_POST['oils']."'");
			$row = mysqli_fetch_assoc($result);
			if (empty($row) == true) //проверка на пустое поле с выбором автора
			{
				return "Выберите топливо";
			}
			else 
			{
				$result = mysqli_query($link,"INSERT INTO `tb_application`(id, name_AZS, INN, address, bank_details, phone_number, id_oil, count_oil) 
				VALUES (NULL, '".$_POST['AZSName']."','".$_POST['INN']."','".$_POST['AZSAddress']."','".$_POST['bankDetails']."','".$_POST['phoneNumber']."','".$_POST['oils']."', '".$_POST['countOil']."')");
				return "Заявка отправлена";

				
			}
		mysqli_close($link);
	}

?>
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
						<a class="nav-link active" href="addInfo.php">Отправить заявку</a>
					</li>
					<li class="nav-item">
						<a class="nav-link " href="index.php">Виды топлива</a>
					</li>
					<li style='margin-left: 75%; border: 1px solid #cfe2ff; border-radius: 10px; background-color: #cfe2ff; padding-left: 2px; padding-right: 2px;' class="nav-item">
						<a style="color:black;" class="nav-link" href="enter.php">Войти</a>
					</li>
				</ul>
			</div>
		</div>
	</nav>
	<!--<form style="margin-left:20px" method="POST">
		<label>Добавление автора:</label> <br>
		<input type="text" style="width:280px" name="author" pattern="^[А-Яа-яЁё\s]+$" value="" placeholder = "Пушкин Александр Сергеевич" required>
		<input class="btn btn-info" type="submit" name="button_author" value="Добавить">
	</form>-->
	<form style="margin-left:20px"  method="POST">
		<label >Название АЗС:</label>
		<input style= "margin-bottom: 10px" type="text" name="AZSName" pattern="^[А-Яа-яЁё\s]+$" value="" placeholder = "Лукойл" required><br>
		
		<label >ИНН:</label>
		<input style= "margin-bottom: 10px; width:120px" type="number" name="INN" value="" min=5 max=9999999999 required> <br>
		
		<label >Адрес АЗС:</label>
		<input style= "margin-bottom: 10px; width:200px" type="text" name="AZSAddress" pattern="^[А-Яа-яЁё\s]+[0-9]+$" value="" placeholder = "проспект Ленина 38" required><br>
		
		<label >Банковские реквизиты:</label>
		<input style= "margin-bottom: 10px; width:120px" type="number" name="bankDetails" value="" min=5 max=9999999999 required> <br>
		
		<label >Контактный номер телефона:</label>
		<input style= "margin-bottom: 10px; width:140px" type="number" name="phoneNumber" placeholder = "8 900 800 00 00" value="" min=5 max=99999999999 required> <br>
		
		<select style= "margin-bottom: 10px" name="oils" required>
			<option value="0">Выберите топливо</option> 
			<!--Формирование выпадающего списка из уже имеющихся авторов-->
				<? 
					include "connection.php";
					$result = mysqli_query($link, "SELECT * FROM `tb_oil`");
					while($row = mysqli_fetch_assoc($result))
						{
							echo "<option value='".$row["id"]."'>".$row["oil_name"]."</option>";
						}
						mysqli_close($link);
				?>
		</select><br>
		
		<label >Количество необходимого топлива (в литрах):</label>
		<input style= "margin-bottom: 10px;" type="number" name="countOil" placeholder = "500" value="" min=5 max=999 required> <br>
		
		<input class="btn btn-info" type="submit" name="button_application">
	</form>
				
	<div style= " margin-left:40%; font-size: 20px">
		<? 
			if (isset($_POST["button_application"]))
				{
					echo NewApplication();
				}
		?>
	</div>
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
</body>
</html>