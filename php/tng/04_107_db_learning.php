<?php
// 1. db_conn 함수 생성
// 1-1 : db설정 및 pdo 객체 생성
// 2. 사원별 현재 급여를 조회하기
// 3. 조회한 데이터를 루프하면서 100,000 이상인 사원번호 출력
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



// 2 
$sql=
" SELECT "
." salary "
.",emp_no "
." FROM "
." salaries "
." WHERE "
." to_date >= now() "
." AND "
." salary>= :salary ";

$arr_ps = [
	":salary"=>80000
];

$stmt=$conn->prepare($sql);
$stmt->execute($arr_ps);  
$result=$stmt->fetchAll(); 
// print_r($result);

// 3
$cnt=0;
foreach($result as $items ){
	if($items["salary"]>=100000){
		echo $items["emp_no"],"\n";
		$cnt++;
	}
}
echo $cnt;
?>