<?php
// 버블 정렬

// asort($arr);

// print_r($arr);

// $arr2 = [3, 2, 1];

// $tmp =$arr2[0];
// $arr2[0]=$arr2[2];
// $arr2[2]=$tmp;

// print_r($arr2);
$arr = [5,34,4,2,6,7,3,12];
$len = count($arr);
for($i=0; $i<$len;$i++){
    for($o=0;$o<$len-1;$o++){
        if($arr[$o]>$arr[$o+1]){
            $tmp=$arr[$o];
            $arr[$o]=$arr[$o+1];
            $arr[$o+1]=$tmp;
            
        }

        }
    }

print_r($arr);


?>