<?php

function selectAll($connection){

	$SQL = "SELECT * FROM list_students";
	$query = $connection->query($SQL);

	return $query;
}

function totalAttendance($connection){

	$num = countStudents($connection);
	$i = 1;
	while($i <= $num){
		$SQL = "UPDATE `list_students` SET `attendance_total` = (`attendance_autumn_semester`+`attendance_spring_semester`) WHERE `id_student`=" . $i;
		//print($SQL . "<br/>");
		$connection->query($SQL);
		$i++;
	}
}

function averageValue($connection){

	$num = countStudents($connection);
	$i = 1;
	while($i <= $num){
		$SQL = "UPDATE `list_students` SET `average_value` = ((`attendance_total`+`scores_total`)/2) WHERE `id_student`=" . $i;
		//print($SQL . "<br/>");
		$connection->query($SQL);
		$i++;
	}
}

function totalScores($connection){

	$num = countStudents($connection);
	$i = 1;
	while($i <= $num){
		$SQL = "UPDATE `list_students` SET `scores_total` = (`scores_autumn_semester`+`scores_spring_semester`) WHERE `id_student`=" . $i;
		//print($SQL . "<br/>");
		$connection->query($SQL);
		$i++;
	}
}

function countStudents($connection){

	$SQL = "SELECT COUNT(`id_student`) AS `sumStudents` FROM `list_students`";
	$query = $connection->query($SQL);
	$sumStudents = 0;
	foreach($query as $q){
		$sumStudents = (int) $q["sumStudents"];
	}

	return $sumStudents;
}

?>