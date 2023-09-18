<?php

require_once("./04_107_fnc_db_connect.php");

$conn = null;
my_db_conn($conn);

// sql 작성

$sql = " select * from employees where emp_no = :emp_no ";

$arr_ps=[
	":emp_no" => 10004
];

$stmt = $conn -> prepare($sql);
$stmt -> execute($arr_ps);
$result= $stmt -> fetchAll();

print_r($result);


?>