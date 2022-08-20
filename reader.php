<?php

require_once('connection.php');

const FILENAME = "Teams.csv";
const PATH = (__DIR__ . "\\resources\\" . FILENAME);

function fileReader($connection){

ini_set('max_execution_time', 1000);

	$line = 0;

	if (($handle = fopen(PATH, "r")) != FALSE) {
		while (($data = fgetcsv($handle, 200, "	")) != FALSE) {
			$id_student = ++$line;
			$num = count($data);

			$i=0;
			while ($i < $num){
			//for ($i=0; $i < $num; $i++) { 
				
				//	добавляем имена
				//$SQL = $query . "'" . $data[$i] . "')";

				//	обновляем имена 
				//$SQL = ("UPDATE `list_students` SET `fio`='" . $data[$i] . "' WHERE `id_student`= '" . $id_student ."'");

				// добавляем ОНТ
				//$SQL = ("UPDATE `list_students` SET `ONT`='" . $data[$i] . "' WHERE `id_student`= '" . $id_student ."'");

				//	добавляем посещаемость
				// $SQL = (
				// 	"UPDATE `list_students` SET 
				// 	`attendance_autumn_semester`= " . (double) $data[$i] . ",
				// 	`attendance_spring_semester`= " . (double) $data[$i+1] . "
				// 	WHERE `id_student`= " . (int) $id_student);

				// добавляем посещаемость
				// $SQL = (
				// 	"UPDATE `list_students` SET 
				// 	`scores_autumn_semester`= " . (double) $data[$i] . ",
				// 	`scores_spring_semester`= " . (double) $data[$i+1] . "
				// 	WHERE `id_student`= " . (int) $id_student);

				// добавляем команды
				$SQL = (
					"UPDATE `list_students` SET 
					`ONT_team_autumn`= " . $data[$i+1] . ",
					`ONT_team_spring`= " . $data[$i+2] . "
					WHERE `fio`= '" . $data[$i]) . "'";

				$i=$num;

				// Вывод на экран для отслеживания
				//print($SQL . "<br />");
				
				//	Запись в БД
				$connection->query($SQL); 
			}
		}

	fclose($handle);

	}
}

$connection = connect();


?>