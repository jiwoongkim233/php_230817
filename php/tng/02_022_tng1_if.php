<?php
    $num = 59;
   $grade = "";
   echo "당신의 점수는 {$num}점 입니다. $grade";
    
    if($num === 100) {
        $grade = "<A+>";
    }

    else if ($num >= 90 && $num <100) {
        $grade = "<A>";
    }

    else if ($num >= 80 && $num <=90) {
        $grade = "<B>";
    }
    else if ($num >= 70 && $num <=80){
        $grade = "<C>";
    }
    else if ($num >= 60 && $num <=70){
        $grade = "<D>";
    }
    else {
        $grade = "<F>";
    };
    if($num<=100 && $num >= 0){
        echo "당신의 점수는 {$num}점 입니다.$grade";
    }
    else{
        echo "잘못된 값을 입력했습니다";
    }
    

?>