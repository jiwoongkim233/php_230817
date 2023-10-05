<?php
define("ROOT", $_SERVER["DOCUMENT_ROOT"]."/mini_board/src/"); //웹서버 root 패스 생성
define("FILE_HEADER", ROOT."header.php"); //헤더 패스
require_once(ROOT."lib/lib_db.php"); // DB관련 라이브러리

try{
	//2.db connect
	//2-1. connection 함수 호출
	$conn=null; //PDO 저장용
	if(!my_db_conn($conn)){
		throw new Exception("DB Error : PDO Instance");
	}
	// Method 획득
	$http_method=$_SERVER["REQUEST_METHOD"];
	
	if($http_method==="GET"){
		// 3.1 get 일 경우
		// 3.1.1 파라미터에서 id 획득
		$id=isset($_GET["id"]) ? $_GET["id"] : "";
		$page=isset($_GET["page"]) ? $_GET["page"] : "";
		$arr_err_msg=[];
		if($id===""){
			$arr_err_msg[]="Parameter Error : id";
		}
		if($page===""){
			$arr_err_msg[]="Parameter Error : page";
		}
		
		if(count($arr_err_msg)>= 1) {
			throw new Exception(implode("<br>", $arr_err_msg));
		} 
	
	
		//3.1.2 게시글 정보 획득
		$arr_param=[
			"id"=>$id
		];
		$result=db_select_boards_id($conn,$arr_param);
		
		//3.1.3 예외 처리
		if($result===false){
			throw new Exception("DB Error : Select ID");

		}
		else if(!(count($result)===1)){
			throw new Exception("DB Error : Select ID count");
		}
		$item=$result[0];
	}
	else{
		// 3.2 post 일 경우
		// 3.2.1 파라미터에서 id 획득
		$id=isset($_POST["id"]) ? $_POST["id"] : "";
		$arr_err_msg=[];
		if($id===""){
			$arr_err_msg[]="Parameter Error : id";
		}
		
		if(count($arr_err_msg)>= 1) {
			throw new Exception(implode("<br>", $arr_err_msg));
		} 
		// 3.2.2 Transaction 시작
		$conn->beginTransaction();

		// 3.2.3 게시글 정보 삭제
		$arr_param=[
			"id" => $id
		];

		//3.2.3 예외 처리
		if(!db_delete_board_id($conn, $arr_param)){
			throw new Exception("DB Error : Delete Boards id");
		}
		$conn->commit(); // commit
		header("Location: list.php"); //리스트페이지 이동
		exit; // 처리 종료
	}
}catch(Exception $e){
	// POST일 경우에만 롤백
	if($http_method === "POST") {
		$conn->rollBack(); // 롤백
	}
	header("Location:error.php/?err_msg={$e->getMessage()}");
	// echo $e->getMessage(); //에러 메세지 출력
	exit;//처리종료
}finally{
	db_destroy_conn($conn);
}
?>

<!DOCTYPE html>
<html lang="ko">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="/mini_board/design/common.css">
	<title>삭제 페이지</title>
</head>
<body>
	<?php
	require_once(FILE_HEADER)
	?>
	<main>
		<table>
			<caption>
				삭제하면 영구삭제 처리됩니다.
				<br>
				진짜 하시겠습니까?
				<br><br>
			</caption>
			<tr>
				<th>게시글 번호</th>
				<td><?php echo $item["id"]?></td>
			</tr>
			<tr>
				<th>작성일</th>
				<td><?php echo $item["create_at"]?></td>
			</tr>
			<tr>
				<th>제목</th>
				<td><?php echo $item["title"]?></td>
			</tr>
			<tr>
				<th>내용</th>
				<td><?php echo $item["content"]?></td>
			</tr>
		</table>
	</main>
	<section>
		<form action="/mini_board/src/delete.php" method="post">
			<input type="hidden" name="id" value="<?php echo $id ?>">
		<button class="page_btn a_hover" type="submit">동의</button>
		<a class="page_btn a_hover" href="/mini_board/src/detail.php/?id=<?php echo $id ?>&page=<?php echo $page; ?>">취소</a>
		</form>
	</section>
</body>
</html>