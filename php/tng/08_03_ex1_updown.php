<?php

$number=rand(1,100);
$i=0;

while($i<5){
$i++;
$in_str =trim(fgets(STDIN));

if(is_numeric($in_str)){
if($in_str===$number){
    echo "정답\n";
    break;
}
else if($in_str<$number){
    echo"up\n";
}
else if($in_str>$number){
    echo"down\n";
}
if($i===5){
    echo "실패 \n";
    echo "정답은 :", $number;
}
}
else{
    echo "잘못된값을입력했습니다.";
}
} 



?>