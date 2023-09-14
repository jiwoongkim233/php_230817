<?php

$in_str =trim(fgets(STDIN));
echo "입력값 : {$in_str}\n";

$game = ["rock", "scissors", "paper"];
$random=array_rand($game);
$i=$game[$random];

if($in_str === "rock"){
    if($i==$game[0]){
        echo"draw";
    }
    else if($i===$game[1]){
        echo"lose";
    }
    else if($i===$game[2]){
        echo"win";
    }    
}
else if($in_str==="scissors"){
    if($i==$game[0]){
        echo"lose";
    }
    else if($i===$game[1]){
        echo"draw";
    }
    else if($i===$game[2]){
        echo"win";
    }    
}
else if($in_str==="paper"){
    if($i===$game[0]){
        echo"win";
    }
    else if($i===$game[1]){
        echo"lose";
    }
    else if($i===$game[2]){
        echo"draw";
    }
}
else {
    echo "잘못된값을입력했습니다.";
}
