<?php
// foreach : 배열의 길이만큼 루프하는 운영

$arr = [1,2,3];
// echo count($arr);
// for($num = 0; $num <= count($arr) -1;$num++){
//     echo $arr[$num];
// }

foreach($arr as $key => $val){
    echo $val;
};

$arr2 = [
    "dd" => "aa"
    ,"cc" => "bb"
    ,"ww" => "rr"
];


?>