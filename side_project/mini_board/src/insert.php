<?php
define("ROOT", $_SERVER["DOCUMENT_ROOT"]."/mini_board/src/"); //웹서버 root 패스 생성
define("FILE_HEADER", ROOT."header.php"); //헤더 패스
define("ERROR_MSG_PARAM", "Parameter Error : %s"); //파라미터 에러 메세지
require_once(ROOT."lib/lib_db.php"); // DB관련 라이브러리

$arr_err_msg=[];
$title="";
$content="";
// POST로 request가 왔을 때 처리
$http_method=$_SERVER["REQUEST_METHOD"];
if($http_method === "POST"){
	try{
		$arr_post = $_POST;
		$conn=null; //DB connection 변수
		// 파라미터 획득
		$title=isset($_POST["title"]) ? trim($_POST["title"]) : "";
		$content=isset($_POST["content"]) ? trim($_POST["content"]) : "";

		if($title === "") {
			$arr_err_msg[] = sprintf(ERROR_MSG_PARAM, "title");
		}
		if($content === "") {
			$arr_err_msg[] = sprintf(ERROR_MSG_PARAM,"content");
		}

		if(count($arr_err_msg) === 0) {
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
		}
	} catch(Exception $e) {
		$conn->rollBack();
		header("Location:error.php/?err_msg={$e->getMessage()}");
		// echo $e->getMessage(); //exception 메세지 출력
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
	<link rel="stylesheet" href="/mini_board/design/common.css">
	<title>작성페이지</title>
</head>
<body>
	<?php
	require_once(FILE_HEADER)
	?>
	<?php 
	foreach($arr_err_msg as $val){
	?> 
	<p><?php echo $val ?></p>
	<?php 
	}
	?>
	


<form class="form_1" action="/mini_board/src/insert.php" method="post">
	<div >
	<label for="title">제목</label>
	<input type="text" name="title" id="title" size="48" value="<?php echo $title ?>">
	</div>
	<br><br>
	<div>
	<label for="content">내용</label>
	<textarea name="content" id="content" rows="20" cols="50"><?php echo $content ?></textarea>
	</div>
	<br>
	<div class="div_insert">
	<button class="page_btn" type="submit">작성</button>
	<a class="a_hover page_btn" href="/mini_board/src/list.php">취소</a>
	</div>
</form>


</fieldset>
</body>
</html>