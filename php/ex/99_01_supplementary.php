<?php
// 1.출력 : echo, print

//2. php 데이터 타입 : 
// $num = 1;
// int : 숫자
// $str = "asdf";
// str : 문자
// $array = [1,2,3,4];
// array : 배열
// $boo =true; 
// boolean : true or false
// $double = 2.34;
// double : 실수 

//산술 연산자 
// 1+1;
// 1-1;
// 1*1;
// 1/1;
// 1%1;

// 증가/증감 연산자
// 1++;

// **() : 조건
// [] : 배열 만들 때
// {} : 내가 처리하고 싶은 연산들
// ; : 최소 연산 단위  **

// if($조건){
//     // 처리할 내용
// }

// for($조건; $종료조건; $루프마다얼마증가){
//     // 처리할 내용
// }


// if문 
// $num = 78;
// if($num===90){
//     echo "수";    
// }
// else if($num===80){
//     echo "우";
// }
// else if ($num<=79){
//     echo "노력";
// }

// while : 구구단 7단

// $num=1;
// while($num <= 9){
//  echo "7 X {$num} =",7*$num,"\n";
//  $num++;
// }

// while if
// $num=1;
// while($num <= 9){
//  echo "7 X {$num} =",7*$num,"\n";
//  $num++;
//     if($num===10){
//         break;
//     }
// }

// 배열 
$arr = [1,2,3];
$arr2=[
    "key1" => "val1"
    ,"key2" => [
            "key3" => "val3"
            ,"key4" => "val4"
    ]
];

// echo $arr[2],"\n";
// echo $arr2["key2"],"\n";
// echo $arr2["key2"]["key4"];
foreach($arr2["key2"] as $key => $val) {
    echo "{$key}:{$val},\n";
}
 