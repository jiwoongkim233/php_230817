<?php
// xcopy D:\workspace_jiwoong\php_230817\Assignment1\src C:\Apache24\htdocs\Assignment1\src /E /Y
define("ROOT", $_SERVER["DOCUMENT_ROOT"]."/Assignment1/src/");
require_once(ROOT."assignment_lib.php");

$conn=null;
try{
	// db접속
	if(!my_db_conn($conn)){
		throw new exception ("DB Error: PDO Instance");
		exit;
	}
} catch (Exception $e){
	echo $e->getMessage();
}
finally{
	db_destroy_conn($conn);
}

?>
<!DOCTYPE html>
<html lang="ko">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Document</title>
</head>
<h1>Miniboard</h1>
<body>
	<main>
		<table>
			<colgroup>
				<col width="20%">
				<col width="50%">
				<col width="30%">
			</colgroup>
			<tr class="tr_1">
				<th>번호</th>
				<th>제목</th>
				<th>작성일자</th>
			</tr>
		<?php 
			foreach($result as $item) {
		?>
			<tr>
				<td>
					<?php echo $item["id"] ?>
				</td>
				<td>
					<?php ?>
				</td>
			</tr>




		<?php
			}
		?>		
		</table>
	</main>
</body>
</html>