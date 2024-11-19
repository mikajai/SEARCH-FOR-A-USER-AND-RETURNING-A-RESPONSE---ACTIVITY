<?php  

require_once 'dbConfig.php';

// to display teacher's data
function getAllTeachersData($pdo) {
	$sql = "SELECT * FROM search_teacher_data 
			ORDER BY first_name ASC";
	$stmt = $pdo->prepare($sql);
	$executeQuery = $stmt->execute();
	
    if ($executeQuery) {
		return $stmt->fetchAll();
	}
}

// accessing teacher's data by ID
function getTeacherByID($pdo, $id) {
	$sql = "SELECT * from search_teacher_data WHERE id = ?";
	$stmt = $pdo->prepare($sql);
	$executeQuery = $stmt->execute([$id]);

	if ($executeQuery) {
		return $stmt->fetch();
	}
}

// searching for teacher's data
function searchForATeacher($pdo, $searchQuery) {
	
	$sql = "SELECT * FROM search_teacher_data WHERE 
			CONCAT(first_name, last_name, email, gender,
				date_of_birth, phone_num, highest_educational_attainment, institution, year_graduated, licensed) 
			LIKE ?";

	$stmt = $pdo->prepare($sql);
	$executeQuery = $stmt->execute(["%".$searchQuery."%"]);
	if ($executeQuery) {
		return $stmt->fetchAll();
	}
}

// inserting a record
function insertTeacher($pdo, $first_name, $last_name, $email, $gender, $date_of_birth, 
    $phone_num, $highest_educational_attainment, $institution, $year_graduated, $licensed) {

	$sql = "INSERT INTO search_teacher_data 
			(first_name,
		    last_name,
			email,
			gender,
			date_of_birth,
			phone_num,
			highest_educational_attainment,
			institution,
            year_graduated,
            licensed)
		    VALUES (?,?,?,?,?,?,?,?,?,?)";

	$stmt = $pdo->prepare($sql);
	$executeQuery = $stmt->execute([$first_name, $last_name, $email, $gender, $date_of_birth, 
                            $phone_num, $highest_educational_attainment, $institution, $year_graduated, $licensed]);
	
        if ($executeQuery) {
			return ['message' => "A new Teacher's data is successfully inserted.",
					'statusCode' => 200];
		}
		else {
			return ['message' => "An error occurred",
			'statusCode' => 400];
		}
}

// editing of record
function editTeacher($pdo, $first_name, $last_name, $email, $gender, $date_of_birth, 
    $phone_num, $highest_educational_attainment, $institution, $year_graduated, $licensed, $id) {

	$sql = "UPDATE search_teacher_data
				SET first_name = ?,
					last_name = ?,
					email = ?,
					gender = ?,
					date_of_birth = ?,
					phone_num = ?,
                    highest_educational_attainment = ?,
					institution = ?,
					year_graduated = ?,
					licensed = ?
				WHERE id = ? ";

	$stmt = $pdo->prepare($sql);
	$executeQuery = $stmt->execute([$first_name, $last_name, $email, $gender, $date_of_birth, 
                            $phone_num, $highest_educational_attainment, $institution, $year_graduated, $licensed, $id]);

		if ($executeQuery) {
			return ['message' => "A Teacher's data is successfully edited.",
					'statusCode' => 200];
		}
		else {
			return ['message' => "An error occurred",
					'statusCode' => 400];
		}
}

// deletion of record
function deleteTeacher($pdo, $id) {
	$sql = "DELETE FROM search_teacher_data 
			WHERE id = ?";
	$stmt = $pdo->prepare($sql);
	$executeQuery = $stmt->execute([$id]);

	if ($executeQuery) {
		return ['message' => "A Teacher's data is successfully deleted.",
				'statusCode' => 200];
	}
	else {
		return ['message' => "An error occurred",
		'statusCode' => 400];
	}
}
?>
