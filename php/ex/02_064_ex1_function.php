<?php
// 두 숫자를 받아서 더해주는 함수를 맨들어봅시다잇
// 리턴이 없는 함수
// function my_sum($a, $b) {
//     echo $a + $b;
// }

// my_sum(5,4);

// 리턴이 있는 함수 (에코써야함)
// function my_sum2($a, $b){
//     return $a + $b;
// }
// $result = my_sum2(1,2);
// echo $result;

// // 빼기 
// function subt ($a, $b){
//     return $a - $b;
// }
// $result = subt (2, 1);
//     echo $result, "\n";

//  곱하기
// function mult($a, $b){
//     return $a * $b;
// }
// $result = mult(3,4);
// echo $result,"\n";

//  나누기
// function div ($a, $b){
//     return $a/$b;
// }
// $result = div(6,3);
// echo $result, "\n";

//  나머지
// function rest($a, $b){
//     return $a%$b;
// }
// $result = rest(2,1);
// echo $result,"\n";

// 파라미터의 기본값이 설정되어 있는 함수
// function my_sum3($a, $b = 5) {
//     return $a + $b + $c;
// }
// echo my_sum3(3,2);
// 가변 파라미터
// php 5.6이상 가능
// function my_args_param(...$items) {
// echo $items[1];
// }
// my_args_param("a", "b", "c");


// $a = 1;
// $b = 0;

// function my_recursion($i) {
//     if($i === 1) {
//         return 1;
//     }
//     return $i + my_recursion ($i -1);
// }
//  echo my_recursion(3);

for($i=0; $i<5;$i++){
    for($w=0; $w<=$i;$w++){
    echo "*";}   
    echo "\n";
}




?>
