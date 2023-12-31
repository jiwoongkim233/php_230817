<?php
function my_db_conn( &$conn ){
	$db_host = "localhost"; // host 
	$db_user = "root"; // user
	$db_pw = "php504"; // pw
	$db_name = "mini_board"; // DB name 
	$db_charset = "utf8mb4"; // charset
	$db_dns = "mysql:host=".$db_host. ";dbname=".$db_name.";charset=".$db_charset;

try{
	$db_options= [
		// DB의 prepared statement 기능을 사용하도록 설정
		PDO::ATTR_EMULATE_PREPARES 	=> false
		// PDO Exception Throws하도록 설정
		,PDO:: ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
		// 연상배열로 Fetch를 하도록 설정
		,PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC
	];
	$conn = new PDO($db_dns,$db_user,$db_pw,$db_options);
	return true;
	
}catch (exception $e){
	$conn=null;
	return false;
}
}
function db_destroy_conn(&$conn){
	$conn=null;
};
// -------------------------------
// 함수명 : db_select_boards_paging
// 기능 : boards paging 조회
// 파라미터 : PDO &$conn, &$arr_param
// 리턴 : Array / false
// -------------------------------
function db_select_boards_paging(&$conn, &$arr_param){
	try{
	
	$sql=
" SELECT "
	." id "
	." ,title "
	." ,create_at "
." FROM "
	." boards "
." WHERE "
." delflag = '0' "
." ORDER BY "
	." id DESC "
	." LIMIT :list_cnt OFFSET :offset "
	;
	
	$arr_ps=[
		":list_cnt" => $arr_param["list_cnt"]
		,":offset" => $arr_param["offset"]
	];

	$stmt=$conn->prepare($sql);
	$stmt->execute($arr_ps);
	$result = $stmt->fetchAll();
	return $result; 
} 
catch(Exception $e){
return false;
}
}

// ------------------------------
// 함수명 : db_select_boards_cnt
// 기능 : boards count 조회
// 파라미터 : PDO &$conn, &$arr_param
// 리턴 : INT / false
// -------------------------------

function db_select_boards_cnt(&$conn){
	$sql = 
		 " SELECT "
		." COUNT(id) as cnt "
		." FROM "
		." boards "
		." WHERE "
		."		delflag = '0' "
	;

	try {
		$stmt=$conn->query($sql);
		$result=$stmt->fetchAll();

		return $result[0]["cnt"]; // 정상 : 쿼리 결과 리턴
		
	} catch (Exception $e){
		return false; //예외발생 : false 리턴
	}
}
// $conn = null;
// my_db_conn($conn);
// echo db_select_boards_cnt($conn);
// $conn = null;

// ------------------------------
// 함수명 : db_insert_boards
// 기능 : boards 레코드 작성
// 파라미터 : PDO 	&$conn, 
//			 Array		&$arr_param
// 리턴 : Boolean
// -------------------------------

function db_insert_boards(&$conn, &$arr_param){
	$sql = 
		" INSERT INTO boards( "
		." title "
		." ,content "
		." ) "
		." VALUES ( "
		." :title "
		." ,:content "
		." ) "
		;
		
$arr_ps =[
		":title" => $arr_param["title"]
		,":content" => $arr_param["content"]
		];
		try{
		$stmt=$conn->prepare($sql);
		$result=$stmt->execute($arr_ps);
		return $result; //결과 리턴
	} catch (Exception $e){
		return false; //예외발생 : false 리턴
	}
}

// 게시글 데이터 조회
// 함수명 : db_select_boards_id
// 기능 : boards 게시글 조회
// 파라미터 : PDO 	&$conn, 
//			 Array		&$arr_param
// 리턴 : Array / false
// -------------------------------

	function db_select_boards_id( &$conn,&$arr_param ){

		$sql=
		" SELECT "
		." 		title "
		." 		,content "
		." 		,id "
		." 		,create_at "
		." FROM "
		." boards "
		." WHERE "
		."		id = :id "
		." AND "
		."		delflag = '0' "
		;
	
		$arr_ps =[
			":id" => $arr_param["id"]
		];
	try{
		$stmt=$conn->prepare($sql);
		$stmt->execute($arr_ps);
		$result=$stmt->fetchAll();
		return $result;
	} catch(Exception $e) {
		echo $e->getMessage(); //Exception 메세지 출력
		return false; // 예외발생 false 출력
	}
}
// 게시글 데이터 조회
// 함수명 : db_update_boards_id
// 기능 : boards 게시글 조회
// 파라미터 : PDO 	&$conn, 
//			 Array		&$arr_param
// 리턴 : boolean
// -------------------------------

function db_update_boards_id(&$conn, &$arr_param) {
$sql= " UPDATE "
." boards "
." SET "
." title=:title "
." ,content=:content "
." WHERE "
." id=:id "
;

$arr_ps=[
	":id" => $arr_param["id"]
	,":title"=>$arr_param["title"]
	,":content"=>$arr_param["content"]
];

try{
	$stmt=$conn->prepare($sql);
	$result=$stmt->execute($arr_ps);
		return $result;
}catch(Exception $e){
	echo $e->getMessage();
	return false;
}
}

// 게시글 데이터 삭제
// 함수명 : db_delete_board_id
// 기능 : 특정 id의 레코드 삭제처리
// 파라미터 : PDO 	&$conn, 
//			 Array		&$arr_param
// 리턴 : boolean
// -------------------------------

function db_delete_board_id(&$conn, &$arr_param) {
	// sql 작성
$sql=
	" UPDATE boards "
	." SET "
	." 		del_at = now() "
	." 		,delflag = '1' "
	." WHERE "
	." 		id= :id "
	;

$arr_ps=[
	":id"=>$arr_param["id"]
];

try{
	// 쿼리 실행
	$stmt=$conn->prepare($sql);
	$result=$stmt->execute($arr_ps);
	return $result; //정상종료 : true 리턴
}catch(Exception $e){
	echo $e->getMessage(); // exception 메세지
	return false;
}
}


?>