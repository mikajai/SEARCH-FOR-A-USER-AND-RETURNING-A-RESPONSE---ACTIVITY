<?php require_once 'core/models.php'; ?>
<?php require_once 'core/dbConfig.php'; ?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Document</title>
	
	<style>
		body {
			background-color: #FCF8E8;
            font-family: Times;
            color: #DF7861;
			margin: 0;
			padding: 0;
		}

		
        h1 {
            color: #DF7861;
            text-align: center;
            background-color: #ECDFC8;
            border: 2px solid #DF7861;
            padding: 10px;
        }

		div {
			background-color: #ECDFC8;
			padding: 30px;
			margin: 30px auto;
			max-width: 800px;
			border-radius: 8px;
			box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
		}

		h2 {
			color: #333;
			font-size: 18px;
			margin: 10px 0;
		}

		form input[type="submit"] {
			background-color: #DF7861;
			color: white;
			border: none;
			padding: 10px 20px;
			border-radius: 4px;
			cursor: pointer;
			width: 100%;
			font-size: 15px;
		}
	</style>

</head>
<body>
	<h1>Are you sure you want to delete this Teacher's data?</h1>
	<?php $getTeacherByID = getTeacherByID($pdo, $_GET['id']); ?>
	<div>
		<h2>First Name: <?php echo $getTeacherByID['first_name']; ?></h2>
		<h2>Last Name: <?php echo $getTeacherByID['last_name']; ?></h2>
		<h2>Email: <?php echo $getTeacherByID['email']; ?></h2>
		<h2>Gender: <?php echo $getTeacherByID['gender']; ?></h2>
		<h2>Date of Birth: <?php echo $getTeacherByID['date_of_birth']; ?></h2>
		<h2>Phone Number: <?php echo $getTeacherByID['phone_num']; ?></h2>
		<h2>Highest Educational Attainment: <?php echo $getTeacherByID['highest_educational_attainment']; ?></h2>
        <h2>Institution: <?php echo $getTeacherByID['institution']; ?></h2>
        <h2>Year Graduated: <?php echo $getTeacherByID['year_graduated']; ?></h2>
        <h2>Licensed: <?php echo $getTeacherByID['licensed']; ?></h2>

		<form action="core/handleForms.php?id=<?php echo $_GET['id']; ?>" method="POST">
			<input type="submit" name="deleteTeacherBtn" value="Delete Data">
		</form>			
		
	</div>
</body>
</html>