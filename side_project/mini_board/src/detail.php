<?php
define("ROOT", $_SERVER["DOCUMENT_ROOT"]."/mini_board/src/");
define("FILE_HEADER", ROOT."header.php"); //헤더 패스
require_once(ROOT."lib/lib_db.php"); // DB관련 라이브러리


$id=""; //게시글 id
$conn=null; //DB connect

// $page_name = $_SERVER["PHP_SELF"];

// $chk_detail = isset($_GET["page"]) ? $_GET["test"] : "update";

try{
	// Id 확인
	if(!isset($_GET["id"])) {	
		throw new Exception("Parameter Error : No Id"); //강제 예외 발생: Parameter
	} 

	$id=$_GET["id"]; //id 셋팅

	if(!my_db_conn($conn)) {
		//DB instance error
		throw new Exception("DB Error : No id");
	}

	$arr_param = [
		"id" => $id
	];
	$result = db_select_boards_id($conn, $arr_param);

	if(!$result){
		throw new Exception("Parameter Error : PDO Select_id"); //강제 예외 발생: Parameter
	}
	else if(!(count($result)===1)) {
		throw new Exception("Parameter Error : PDO Select_id count,".count($result)); //강제 예외 발생: Parameter
	}
	$item=$result[0];

} catch(Exception $e) {
	echo $e->GetMessage(); //예외 메세지 출력
	exit; // 처리종료

} finally {
	db_destroy_conn($conn); //DB 파기

}
$input_id =$_GET["id"];

$page_num = $_GET["page"];




//게시글 조회 예외처리



?>

<!DOCTYPE html>
<html lang="ko">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="/mini_board/design/common.css">
	<title>상세 페이지</title>
</head>
<body>
	<?php
		require_once(FILE_HEADER);
	?>
	<table>
		<tr>
			<th>글 번호</th>
			<td><?php echo $item["id"]?></td>
		</tr>
		
		<tr>
			<th>제목</th>
			<td><?php echo $item["title"]?></td>
		</tr>
		
		<tr>
			<th>내용</th>
			<td><?php echo $item["content"]?></td>
		</tr>
		
		<tr>
			<th>작성일자</th>
			<td><?php echo $item["create_at"]?></td>
		</tr>
	</table>
	<a href="/mini_board/src/update.php/?id=<?php echo $id ?>&page=<?php echo $page_num ?>">수정페이지로</a>
	<a href="/mini_board/src/list.php/?page=<?php echo $page_num ?>">취소</a>
	<a href="#">삭제</a>
	
</body>
</html>