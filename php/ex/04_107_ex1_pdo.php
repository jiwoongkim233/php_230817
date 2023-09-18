<?php
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



// PDO Class로 DB연동
$obj_conn=new PDO($db_dns,$db_user,$db_pw,$db_options);

// // SQL 작성
// $sql=" select " 
// ." * "
// ." from " 
// ." employees "
// ." where " 
// ." emp_no = :emp_no "
// ;
// // prepared statement
// $arr_ps = [
// "emp_no" => 10004
// ];
// // create prepared statement
// $stmt = $obj_conn->prepare($sql);
// $stmt -> execute($arr_ps); // 쿼리 실행 
// $result = $stmt -> fetchAll(); // 쿼리 결과를 fetch 한다
// print_r($result);

// $sql= " select " 
// ." emp.birth_date "
// ." ,emp.emp_no "
// ." ,sal.salary "
// ." from " 
// ." employees AS emp "
// ." inner join "
// ." salaries AS sal "
// ." on " 
// ." sal.emp_no=emp.emp_no "
// ." and " 
// ." (emp.emp_no = :emp_no " 
// ." or "
// ." emp.emp_no = :emp_no1) "
// ." and " 
// ." sal.to_date >= NOW() "
// ; 
// $arr_ps=[
// 	":emp_no" => 10001 
// 	,":emp_no1"=> 10004
// ];

// $stmt = $obj_conn->prepare($sql);
// $stmt -> execute($arr_ps);
// $result = $stmt -> fetchALL();
// print_r($result);

// insert 

$sql = " INSERT INTO departments ( " 
	." dept_no "
	." ,dept_name "
	." ) "
	." VALUES ( " 
	." :dept_no "
	." ,:dept_name "
	." ) ";

// $arr_ps =[
// 	":dept_no" => "d010"
// 	,":dept_name" => "php-504"
// ];

// $stmt = $obj_conn -> prepare($sql);
// $result = $stmt -> execute($arr_ps);
// $obj_conn->commit(); //auto commit

// var_dump($result);

// $obj_conn =null;

" delete from departments "
." where dept_no = :dept_no ";



$stmt = $obj_conn -> prepare($sql);
$result = $stmt -> execute($arr_ps);
$res_cnt - $stmt -> rowcount();
if($res_cnt >=2 ){
	$obj_conn -> rollback();
}
else {
	$obj_conn -> commit();
}
;

?>