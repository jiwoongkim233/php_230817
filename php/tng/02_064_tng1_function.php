<?php
// 몇개일지 모르는 숫자를 다 더해주는 함수를 만들어주세요
// function add(...$items){
//     $number = 0;
//     foreach ($items as $value){
//         $number += $value;
//     }
//     return $number;
// }
// echo add(1,2,3,4,5,6);

$num = 0;
$nums = 5;
while($nums >= 1){
    $num += $nums;
    $nums--;
}
echo $num;




   


?>