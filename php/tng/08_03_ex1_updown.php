<?php

$number=rand(1,100);
$i=0;

while($i<5)
$i++;
$in_str =trim(fgets(STDIN));
if($in_str===$number){
    echo "정답\n";
}
else if($in_str<$number){
    echo"up\n";
}
else if($in_str>$number){
    echo"down\n";
}
if($i===5){
    echo "실패";
}


?>