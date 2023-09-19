<?php
//1. titles 테이블에 데이터가 없는 사원을 검색
//2. 1번에 해당하는 사원의 직책 정보를 insert
// 2-1 직책은 "green", from_date = 현재시간, to_date = 99990101
// db 저장




$conn = null;
db_conn($conn);
function db_conn( &$conn ){
	$db_host = "localhost"; // host 
	$db_user = "root"; // user
	$db_pw = "php504"; // pw
	$db_name = "employees"; // DB name 
	$db_charset = "utf8mb4"; // charset
	$db_dns = "mysql:host=".$db_host. ";dbname=".$db_name.";charset=".$db_charset;

	$db_options= [
			// DB의 prepared statement 기능을 사용하도록 설정
			PDO::ATTR_EMULATE_PREPARES 	=> false
			// PDO Exception Throws하도록 설정
			,PDO:: ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
			// 연상배열로 Fetch를 하도록 설정
			,PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC
		];

	$conn = new PDO($db_dns,$db_user,$db_pw,$db_options);
}
// 1
$sql =
" SELECT "
." * "
." FROM "
." employees "
." WHERE "
." emp_no "
." NOT IN "
." ( "
." SELECT "
." emp_no "
." FROM " 
." titles " 
." ) "
;
$arr_ps=[];

$stmt = $conn->prepare($sql);
$stmt -> execute($arr_ps);
$result1 = $stmt -> fetchALL();
print_r($result1);

// 2
$sql=
" INSERT INTO  titles "
." VALUES "
." ( "
. " :emp_no "
." ,:title "
." ,:from_date "
.",:to_date "
." ) "
;

$arr_ps=[
	":emp_no"=>700000;
	,":title"=>"green"
	,":from_date"=>20230919
	,":to_date"=>99990101
];

$stmt = $conn->prepare($sql);
$stmt -> execute($arr_ps);
print_r($result);
$conn->commit();


?>