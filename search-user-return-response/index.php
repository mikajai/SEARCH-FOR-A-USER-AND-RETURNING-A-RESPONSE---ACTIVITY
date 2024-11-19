<?php require_once 'core/dbConfig.php'; ?>
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
            color: #333;
			font-size: 15px;
        }
        h1 {
            color: #DF7861;
            text-align: center;
            background-color: #ECDFC8;
            border: 2px solid #DF7861;
            padding: 10px;
        }
		form {
			text-align: right;
		}
		p {
			text-align: right;
			font-size: 15px;
			font-weight: bold;
		}
        form input[type="text"] {
            border: 2px solid #DF7861;
            padding: 5px;
            margin-right: 5px;
        }
        form input[type="submit"] {
            background-color: #DF7861;
            border: none;
            padding: 5px 10px;
            cursor: pointer;
            color: #FFF;
        }
        a {
            color: #DF7861;
            text-decoration: none;
        }
        a:hover {
            text-decoration: underline;
        }
        table {
            width: 100%;
            margin: 20px auto;
			font-size: 13px;
            border-collapse: collapse;
            background-color: #ECDFC8;
        }
        th, td {
            border: 1px solid #DF7861;
            padding: 8px;
            text-align: left;
			
        }
        th {
            background-color: #ECB390;
			text-align: center;
        }
        tr:nth-child(even) {
            background-color: #FCF8E8;
        }

    </style>
</head>
<body>

    <?php if (isset($_SESSION['message'])) { ?>
		<h1>	
			<?php echo $_SESSION['message']; ?>
		</h1>
	<?php } unset($_SESSION['message']); ?>

	<form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']);?>" method="GET">
		<input type="text" name="searchInput" placeholder="Search here">
		<input type="submit" name="searchBtn">
	</form>

    <p>
		<a href="index.php"> Clear Search Query | </a>
		<a href="insert.php"> Insert New User </a>
	</p>

	<table>
		<tr>
			<th>First Name</th>
			<th>Last Name</th>
			<th>Email</th>
			<th>Gender</th>
			<th>Date of Birth</th>
			<th>Phone Number</th>
			<th>Highest Educational Attainment</th>
			<th>Institution</th>
            <th>Year Graduated</th>
            <th>Licensed</th>
			<th>Date Added</th>
			<th>Action</th>
		</tr>

        <?php if (!isset($_GET['searchBtn'])) { ?>
			<?php $getAllTeachersData = getAllTeachersData($pdo); ?>
				<?php foreach ($getAllTeachersData as $row) { ?>
					<tr>
						<td><?php echo $row['first_name']; ?></td>
						<td><?php echo $row['last_name']; ?></td>
						<td><?php echo $row['email']; ?></td>
						<td><?php echo $row['gender']; ?></td>
						<td><?php echo $row['date_of_birth']; ?></td>
						<td><?php echo $row['phone_num']; ?></td>
						<td><?php echo $row['highest_educational_attainment']; ?></td>
						<td><?php echo $row['institution']; ?></td>
                        <td><?php echo $row['year_graduated']; ?></td>
                        <td><?php echo $row['licensed']; ?></td>
						<td><?php echo $row['date_added']; ?></td>
						<td>
							<a href="edit.php?id=<?php echo $row['id']; ?>"> Edit </a>
							<a href="delete.php?id=<?php echo $row['id']; ?>"> Delete </a>
						</td>
					</tr>
			<?php } ?>

            <?php } else { ?>
			<?php $searchForATeacher =  searchForATeacher($pdo, $_GET['searchInput']); ?>
				<?php foreach ($searchForATeacher as $row) { ?>
					<tr>
                    	<td><?php echo $row['first_name']; ?></td>
						<td><?php echo $row['last_name']; ?></td>
						<td><?php echo $row['email']; ?></td>
						<td><?php echo $row['gender']; ?></td>
						<td><?php echo $row['date_of_birth']; ?></td>
						<td><?php echo $row['phone_num']; ?></td>
						<td><?php echo $row['highest_educational_attainment']; ?></td>
						<td><?php echo $row['institution']; ?></td>
                        <td><?php echo $row['year_graduated']; ?></td>
                        <td><?php echo $row['licensed']; ?></td>
						<td><?php echo $row['date_added']; ?></td>
						<td>
							<a href="edit.php?id=<?php echo $row['id']; ?>"> Edit </a>
							<a href="delete.php?id=<?php echo $row['id']; ?>"> Delete </a>
						</td>
					</tr>
				<?php } ?>
		<?php } ?>	
		
	</table>
</body>
</html>