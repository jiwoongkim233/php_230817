<?php
// 데이터를 웹서버에 저장 (보안성이 쿠키보다 좋고 속도도 더 빠름)
// *** 주의사항 ***
// 개인정보, 민감한 정보들은 되도록 저장하지 말아야함

// session start
session_name("login");
session_start("green");

$_SESSION["green"]="PHP";
$_SESSION["green2"]="JAVA";
print_r("$_session");

// 특정세션 삭제
unset($_SESSION["green"]);
print_r($_SESSION);

// 모든세션 삭제
session_destroy();
print_r($_session)
?>