<?php
$rank = 5;
$award = "";

// switch($rank){
//     case "1";
//     echo "금상";
//     break;
//     case "2";
//     echo "은상";
//     break;
//     case "3";
//     echo "동상";
//     break;
//     case "4";
//     echo "장려상";
//     break;
//     default:
//         echo "노력상";
//         break;
// }

if($rank === 1){
    echo "금상";
}
else if($rank === 2){
    echo "은상";
}
else if($rank === 3){
    echo "동상";
}
else if($rank === 4){
    echo "장려상";
}
else{
    echo "노력상";
};
?>