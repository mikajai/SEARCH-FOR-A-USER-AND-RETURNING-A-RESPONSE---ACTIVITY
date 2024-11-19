<?php  

require_once 'dbConfig.php';
require_once 'models.php';

// insertion of data
if (isset($_POST['insertTeacherBtn'])) {
	$insertTeacher = insertTeacher($pdo,$_POST['first_name'], $_POST['last_name'], $_POST['email'], 
	$_POST['gender'], $_POST['date_of_birth'], $_POST['phone_num'], $_POST['highest_educational_attainment'], $_POST['institution'], $_POST['year_graduated'], $_POST['licensed']);

	if ($insertTeacher['statusCode'] === 200) { //if status code is 200, it means that the action is successfully executed.
		$_SESSION['message'] = $insertTeacher['message'];
		header("Location: ../index.php");
	}
	else { //else status code is 400, it means that the action is unsuccessfully executed or an error occurred.
		$_SESSION['message'] = $insertTeacher['message'];
	}
}

// editing of data
if (isset($_POST['editTeacherBtn'])) {
	$editTeacher = editTeacher($pdo, $_POST['first_name'], $_POST['last_name'], $_POST['email'], 
	$_POST['gender'], $_POST['date_of_birth'], $_POST['phone_num'], $_POST['highest_educational_attainment'], $_POST['institution'], $_POST['year_graduated'], $_POST['licensed'], $_GET['id']);

	if ($editTeacher['statusCode'] === 200) { //if status code is 200, it means that the action is successfully executed.
		$_SESSION['message'] = $editTeacher['message'];
		header("Location: ../index.php");
	}
	else { //else status code is 400, it means that the action is unsuccessfully executed or an error occurred.
		$_SESSION['message'] = $editTeacher['message'];
	}
}

// deletion of data
if (isset($_POST['deleteTeacherBtn'])) {
	$deleteTeacher = deleteTeacher($pdo,$_GET['id']);

	if ($deleteTeacher['statusCode'] === 200) { //if status code is 200, it means that the action is successfully executed.
		$_SESSION['message'] = $deleteTeacher['message'];
		header("Location: ../index.php");
	}
	else { //else status code is 400, it means that the action is unsuccessfully executed or an error occurred.
		$_SESSION['message'] = $deleteTeacher['message'];
	}
}

// searching of data
if (isset($_GET['searchBtn'])) {
	$searchForATeacher = searchForATeacher($pdo, $_GET['searchInput']);
	foreach ($searchForATeacher as $row) {
		echo "<tr> 
				<td>{$row['id']}</td>
				<td>{$row['first_name']}</td>
				<td>{$row['last_name']}</td>
				<td>{$row['email']}</td>
				<td>{$row['gender']}</td>
				<td>{$row['date_of_birth']}</td>
				<td>{$row['phone_num']}</td>
				<td>{$row['highest_educational_attainment']}</td>
				<td>{$row['institution']}</td>
				<td>{$row['year_graduated']}</td>
				<td>{$row['licensed']}</td>
			  </tr>";
	}
}

?>
