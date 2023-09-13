<?php
// include : 없는파일을 불러왔을때 오류가 뜨고 다음 실행을 진행
include("./02_070_ex1.include2.php");
// require : 없는 파일을 불러왔을때 오류가 뜨고 다음 실행 중단
require("./02_070_ex1.include2.php");
// include_once : 파일을 불러올 때 이전에 실행했던 파일이면 실행을 한 번만 한다.
echo "include1\n";
?>