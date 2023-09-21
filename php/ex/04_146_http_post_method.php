<?php
// POST method

print_r($_post);
?>
<!DOCTYPE html>
<html lang="ko">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Document</title>
</head>
<body>
	<form action="/04_146_http_post_method.php" method="post">
	<label for="id">ID</label>
	<input type="text" id="id" maxlength="20">
	<br>
	<label for="pw">PW</label>	
	<input type="password" id="pw">
	<br>
	<button type="submit">전송</button>
</form>
</body>
</html>