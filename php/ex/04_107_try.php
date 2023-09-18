<?php

require_once("./04_107_fnc_db_connect.php");
$conn = null;


	// try-catch문 : 예외 처리를 하기 위한 문법
try{
	echo"try";
	my_db_conn($conn);
	$sql = " select * from employees where emp_no = :emp_no ";

$arr_ps=[
	":emp_no1" => 10004
];

$stmt = $conn -> prepare($sql);
$stmt -> execute($arr_ps);
$result= $stmt -> fetchAll();

print_r($result);
	// 우리가 실행하고 싶은 소스코드를 작성
} catch( Exception $e ){
	// 예외가 발생 했을 때 실행되는 소스코드를 작성
	echo "예외발생 : {$e -> getMessage()}";
} finally {
	// db 파기
	// 정상처리 또는 예외처리에 관계없이 무조건 실행되는 소스코드를 작성
	db_destroy_conn($conn);
	echo "파이널리";
}

?>