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

// $sql = 
// " UPDATE employees "
// ." SET " 
// ." first_name = '둘리' "	
// ." WHERE " 
// ." emp_no = :emp_no "
// ;

// $arr_ps = [
// 	":emp_no" => 500010
// ];

// $stmt = $conn->prepare($sql);
// $result = $stmt->execute($arr_ps);
// $conn->commit();

// $sql = 
// " UPDATE employees "
// ." set " 
// ." last_name  = '호이' "
// ." where " 
// ." emp_no = :emp_no "; 

// $arr_ps=[
// 	":emp_no" => 500010
// ]
// ;

// $stmt = $conn -> prepare($sql);
// $result2 = $stmt -> execute($arr_ps);
// $conn->commit();

// 3
$sql=
" select "
." * "
." from "
." employees "
." where "
." emp_no = :emp_no "
;
$arr_ps= [
	"emp_no" => 500010
];
$stmt = $conn->prepare($sql);
$stmt->execute($arr_ps);  
$result = $stmt->fetchAll(); 
print_r($result);

// 4
// $sql = 

// " DELETE FROM "
// ." employees "
// ." WHERE "
// ." emp_no = :emp_no ";

// $arr_ps = [
//     ":emp_no" => 500010
// ];

// $stmt = $conn->prepare($sql);
// $result = $stmt->execute($arr_ps);
// $conn->commit();

// db_destroy_conn($conn);
?>