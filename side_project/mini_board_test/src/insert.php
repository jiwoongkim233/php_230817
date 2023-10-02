<?php
define("ROOT", $_SERVER["DOCUMENT_ROOT"]."/mini_board_test/src/");
define("FILE_HEADER", ROOT."header.php"); 
require_once(ROOT."lib/lib_db.php");

// POST로 request가 왔을 때 처리
$http_method=$_SERVER["REQUEST_METHOD"];
if($http_method === "POST"){
	try{
		$arr_post = $_POST;
		$conn=null; //DB connection 변수

// DB 접속
	if(!my_db_conn($conn)){
		//db instance 에러
	throw new Exception("DB Error : PDO instance");
	}
	$conn->beginTransaction(); //트랜잭션 시작
	
	
	// insert
if(!db_insert_boards($conn, $arr_post)) {
	//DB Insert 에러
	throw new Exception("DB Error : Insert Boards");
}
$conn->commit(); //모든 처리 완료 시 커밋
	// 리스트 페이지로 이동
	header("Location: list.php");
	exit;


} catch(Exception $e) {
	$conn->rollBack();
	echo $e->getMessage(); //exception 메세지 출력
	exit;


	} finally {
	db_destroy_conn($conn); //DB 파기
	}
}
?>
<!DOCTYPE html>
<html lang="ko">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="/mini_board_test/src/design/deco.css">
	<title>작성페이지</title>
</head>
<body>
<header>Mini Board</header>
<section>
	
<form action="/mini_board_test/src/insert.php" method="post">
<div class="div_1">	
<label for="title">제목:</label>
	<input type="text" name="title" id="title">
</div>
	<br>
	<div class="div_2">
	<label for="content">내용:</label>
	<textarea name="content" id="content" rows="5" cols="50"></textarea>
	</div>
	<br>
	<button type="submit">작성</button>
	<a href="/mini_board_test/src/list.php">취소</a>
	</section>
</form>


</fieldset>
</body>
</html>