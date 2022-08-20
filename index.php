<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>T-students</title>
	<!-- <link rel="stylesheet" type="text/css" href="styles.css"> -->
	<link rel="stylesheet" type="text/css" href="styles.css" />
	<link rel="icon" type="image/x-icon" href="https://www.t-uni.ru/assets/img/T-BADGE.svg">
</head>
<body>
<form method='POST'>
	<table class="table">
		<td>
			<button type="submit" name="homepage">К списку студентов</button></p>
		</td>
		<td>
			<button type="submit" name="read_data">Чтение файла</button></p>
		</td>
		<td>
			<button type="submit" name="update_data">Актуализировать данные</button></p>
		</td>
	</table>
</form>
<div>

<?php 
// Подключение файлов
require_once('connection.php');
require_once('queries.php');
require_once('reader.php');

// Подключение к бд
$connection = connect();

if(isset($_POST["update_data"])){
	ini_set('max_execution_time', 1000);
	// Процент посещаемости суммарный за оба семестра
	totalAttendance($connection);
	totalScores($connection);
	averageValue($connection);
	header("Location: http://localhost/Algoritm/");
}

if(isset($_POST["read_data"])){
	fileReader($connection);
	header("Location: http://localhost/Algoritm/");
}

if(isset($_POST["homepage"])){
	$result = selectALL($connection);
	if (isset($result)) {
		echo "<table>
		<tr>
			<th>Код</th>
			<th>ФИО</th>
			<th>ОНТ</th>
			<th>П.О.С.%</th>
			<th>П.В.С.%</th>
			<th>П.О.%</th>
			<th>У.О.С.%</th>
			<th>У.В.С.%</th>
			<th>У.О.%</th>
			<th>C.Б.</th>
			<th>Команда осень</th>
			<th>Команда весна</th>
		</tr>";
		foreach ($result as $row) {
			echo "<tr>";
			echo "<td>" . $row["id_student"] . "</td>";
			echo "<td>" . $row["fio"] . "</td>";
			echo "<td>" . $row["ONT"] . "</td>";
			echo "<td>" . $row["attendance_autumn_semester"] . "</td>";
			echo "<td>" . $row["attendance_spring_semester"] . "</td>";
			echo "<td>" . $row["attendance_total"] . "</td>";
			echo "<td>" . $row["scores_autumn_semester"] . "</td>";
			echo "<td>" . $row["scores_spring_semester"] . "</td>";
			echo "<td>" . $row["scores_total"] . "</td>";
			echo "<td>" . $row["average_value"] . "</td>";
			echo "<td>" . $row["ONT_team_autumn"] . "</td>";
			echo "<td>" . $row["ONT_team_spring"] . "</td>";
			echo "</tr>";
		}
		echo "</table>";
	}
}

?>


</div>
</body>
</html>