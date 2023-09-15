<?php


$game = ["rock", "scissors", "paper"];

while(true){
    $in_str =trim(fgets(STDIN));
    $random=array_rand($game);
    $i=$game[$random];

if($in_str === "rock"){
    if($i==$game[0]){
        echo"draw";
    }
    else if($i===$game[1]){
        echo"win";
    }
    else if($i===$game[2]){
        echo"lose";
    }    
    echo "컴퓨터 : ".$i."\n";
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
    echo "컴퓨터 : ".$i."\n";
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
    echo "컴퓨터 : ".$i."\n";
}
else if($in_str=="end"){
    echo "end";
    break;
}
else {
    echo "잘못된값을입력했습니다.";
}

}