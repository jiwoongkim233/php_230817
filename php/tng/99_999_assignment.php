<?php

require_once("../ex/04_107_fnc_db_connect.php");
$conn = null;
my_db_conn( $conn );

// $sql = " INSERT INTO employees ( " 
// 	." emp_no " 
// 	." ,birth_date "
// 	." ,first_name "
// 	." ,last_name "
// 	." ,gender "
// 	." ,hire_date "
// 	." ) "
// 	." VALUES ( "
// 	." :emp_no "
// 	." ,:birth_date "
// 	." ,:first_name "
// 	." ,:last_name "
// 	." ,:gender "
// 	." ,:hire_date "
// 	." ) ";
	
// $arr_ps=[
// 	":emp_no" => 500010
// 	,":birth_date" => 19961203
// 	,":first_name" => 'jiwoong'
// 	,":last_name" => 'kim'
// 	,":gender" => 'M'
// 	,":hire_date" => 20230915
// ];

// $stmt = $conn -> prepare($sql);
// $result = $stmt -> execute($arr_ps);
// $conn->commit();

// var_dump($result);

// db_destroy_conn($conn);

// 2
$sql2 = " UPDATE employees "
." SET " 
	." first_name "
	." ,last_name "
." WHERE " 
." emp_no = 500010";

$arr_ps2 = [
	":first_name" => 'dooly'
	,":last_name" => 'hoi'
];

$stmt = $conn -> prepare($sql2);
$result2 = $stmt -> execute($arr_ps2);
$conn->commit();
var_dump($result2);

db_destroy_conn($conn);


?>