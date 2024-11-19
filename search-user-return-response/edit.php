<?php require_once 'core/handleForms.php'; ?>
<?php require_once 'core/models.php'; ?>
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

		form {
			width: 650px;
			margin: 30px auto;
			background-color: #ECDFC8;
			padding: 20px;
			border-radius: 8px;
			box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
		}


		form p {
			margin: 10px 0;
			padding: 5px 0;
		}

		form label {
			display: block;
			font-weight: bold;
			margin-bottom: 5px;
		}

		form input[type="text"], form input[type="date"], form select {
			width: 97%;
			padding: 10px;
			margin-top: 5px;
			border: 1px solid #DF7861;
			border-radius: 4px;
		}

        form select {
			width: 100%;
			padding: 10px;
			margin-top: 5px;
			border: 1px solid #DF7861;
			border-radius: 4px;
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
    <?php $getTeacherByID = getTeacherByID($pdo, $_GET['id']); ?>
	<h1>You are editing the information of this Teacher</h1>
	<form action="core/handleForms.php?id=<?php echo $_GET['id']; ?>" method="POST">
    <p>
			<label for="first_name">First Name</label> 
			<input type="text" name="first_name" value="<?php echo $getTeacherByID['first_name']; ?>">
		</p>
		<p>
			<label for="last_name">Last Name</label> 
			<input type="text" name="last_name" value="<?php echo $getTeacherByID['last_name']; ?>">
		</p>
		<p>
			<label for="email">Email</label> 
			<input type="text" name="email" value="<?php echo $getTeacherByID['email']; ?>">
		</p>
		<p>
			<label for="gender">Gender</label> 
			<input type="text" name="gender" value="<?php echo $getTeacherByID['gender']; ?>">
		</p>
		<p>
			<label for="date_of_birth">Date of Birth</label> 
			<input type="date" name="date_of_birth" value="<?php echo $getTeacherByID['date_of_birth']; ?>">
		</p>
		<p>
			<label for="phone_num">Phone Number</label> 
			<input type="text" name="phone_num" value="<?php echo $getTeacherByID['phone_num']; ?>">
		</p>
		<p>
			<label for="highest_educational_attainment">Highest Educational Attainment</label> 
            <select name="highest_educational_attainment" required value="<?php echo $getTeacherByID['highest_educational_attainment']; ?>">
                    <option value="Master’s Degree"> Master’s Degree </option>
                    <option value="Bachelor’s Degree"> Bachelor’s Degree </option>
                    <option value="Doctorate"> Doctorate </option>
            </select>
		</p>
        <p>
			<label for="institution">Institution</label> 
			<input type="text" name="institution" value="<?php echo $getTeacherByID['institution']; ?>">
		</p>
        <p>
			<label for="year_graduated">Year Graduated</label> 
			<input type="text" name="year_graduated" value="<?php echo $getTeacherByID['year_graduated']; ?>">
		</p>
        <p>
			<label for="licensed">Licensed</label> 
            <select name="licensed" required value="<?php echo $getTeacherByID['licensed']; ?>">
                    <option value="Yes"> Yes </option>
                    <option value="No"> No </option>
            </select>
		</p>
        <p>
			<input type="submit" name="editTeacherBtn" value="Save Updated Data">
		</p>
	</form>
</body>
</html>