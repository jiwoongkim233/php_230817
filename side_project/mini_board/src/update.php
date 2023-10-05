<?php
define("ROOT", $_SERVER["DOCUMENT_ROOT"]."/mini_board/src/"); //웹서버 root 패스 생성
define("FILE_HEADER", ROOT."header.php"); //헤더 패스
define("ERROR_MSG_PARAM", "Parameter Error : %s은 필수 입력 사항입니다."); //파라미터 에러 메세지
require_once(ROOT."lib/lib_db.php"); // DB관련 라이브러리


$conn = null; //db 연결용 변수
// $id = isset($_GET["id"]) ? $_GET["id"] : $_POST["id"]; // id 셋팅
// $page = isset($_GET["page"]) ? $_GET["page"] : $_POST["page"]; // set id
$arr_err_msg=[];
$http_method=$_SERVER["REQUEST_METHOD"]; // method 확인



try{
		// DB 접속
	if(!my_db_conn($conn)){
		//db instance 에러
	throw new Exception("DB Error : PDO instance");
	}

	if($http_method === "GET"){
		//case of GET Method
		$id=isset($_GET["id"]) ? trim($_GET["id"]) : "";
		$page=isset($_GET["page"]) ? trim($_GET["page"]) : "";

		
		if($id === "") {
			$arr_err_msg[] = sprintf(ERROR_MSG_PARAM, "id");
		}
		if($page === "") {
			$arr_err_msg[] = sprintf(ERROR_MSG_PARAM,"page");
		}
		if(count($arr_err_msg) >= 1) {
			throw new Exception(implode("<br>", $arr_err_msg));
		}
	//게시글 데이터 조회를 위한 파라미터 세팅	
	}

	 else {
		// case of post method

		$id=isset($_POST["id"]) ? trim($_POST["id"]) : "";
		$page=isset($_POST["page"]) ? trim($_POST["page"]) : "";
		$title=trim($_POST["title"]) ? trim($_POST["title"]) : "";
		$content=trim($_POST["content"]) ? trim($_POST["content"]) : "";

	
		if($id === "") {
			$arr_err_msg[] = sprintf(ERROR_MSG_PARAM, "id");
		}
		if($page === "") {
			$arr_err_msg[] = sprintf(ERROR_MSG_PARAM,"page");
		}
		if($title === "") {
			$arr_err_msg[] = sprintf(ERROR_MSG_PARAM, "title");
		}
		if($content === "") {
			$arr_err_msg[] = sprintf(ERROR_MSG_PARAM,"content");
		}
		if(count($arr_err_msg) === 0) {
			// 게시글 수정을 위해 파라미터 세팅
			$arr_param = [
				"id" => $id
				,"title" => $_POST["title"]
				,"content" => $_POST["content"]
			];

			//게시글 수정 처리
			$conn->beginTransaction(); //트랜잭션 시작

			if(!db_update_boards_id($conn,$arr_param)){
				throw new Exception("DB Error : Update_Boards_id");
			}
			$conn->commit();

			header("Location: detail.php/?id={$id}&page={$page}"); //디테일 페이지로 이동
			exit;
		}
	}
		$arr_param = [
			"id" => $id
		];
		//게시글 데이터 조회
		$result = db_select_boards_id($conn, $arr_param);
		// 게시글 조회 예외처리
		if($result === false) {
			throw new Exception("DB Error : PDO Select_id");
		} else if(!(count($result) === 1)){
			//게시글 조회 카운트 에러
		throw new Exception("DB Error : PDO Select_id Count,".count($result));
		}
		$item = $result[0];
}
	
catch (Exeption $e){
	if($http_method==="POST"){
		$conn->rollBack(); // rollback
	}
	header("Location:/mini_board/src/error.php/?err_msg={$e->getMessage()}");
	// echo $e->getMessage();
	exit;
}finally{
	db_destroy_conn($conn);
}

?>

<!DOCTYPE html>
<html lang="ko">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=\, initial-scale=1.0">
	<link rel="stylesheet" href="/mini_board/design/common.css">
	<title>수정 페이지</title>
</head>
<body>
	<?php
		require_once(FILE_HEADER);
	?>
		<?php 
	foreach($arr_err_msg as $val){
	?> 
	<p><?php echo $val ?></p>
	<?php 
	}
	?>
	<form action="/mini_board/src/update.php" method="post">
	<table>
		<input type="hidden" name="id" value="<?php echo $id ?>">
		<input type="hidden" name="page" value="<?php echo $page ?>">
	<tr>
		<th>글 번호</th>
		<td class="update_td"><?php echo $item["id"]?></td>
	</tr>
	
	<tr>
		<th>제목</th>
		<td class="update_td"><input type="text" name="title" size="48" value="<?php echo $item["title"]?>">
	</td>

	</tr>
	
	<tr>
		<th>내용</th>
		<td class="update_td"><textarea name="content" id="content" cols="50" rows="10"><?php echo $item["content"] ?></textarea></td>
	</tr>
</table>
<div class="div_update">
<button class="page_btn a_hover" type="submit">수정</button>
<a class="page_btn a_hover" href="/mini_board/src/detail.php/?id=<?php echo $id; ?>&page=<?php echo $page; ?>">취소 </a>
</div>
</form>

</body>
</html>