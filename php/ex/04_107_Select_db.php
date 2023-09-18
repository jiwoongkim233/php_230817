<?php
// 
// 파일명 : 04_107_Select_db.php
// 기능 : DB 연동 관련 함수
// 버전 : 230918 new (이름)


// 함수명 : my_db_conn
// 기능 : DB connect
// 파라미터 : PDO & Conn
// 리턴 : 없음
// 



function my_db_con( &$conn ){
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
	$obj_conn=new PDO($db_dns,$db_user,$db_pw,$db_options);
	
	};

?>
