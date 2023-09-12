<?php

$arr = [
[
    "id" => "meerkat1"
    ,"pw" => "php504"
]

,[
    "id" => "meerkat2"
    ,"pw" => "php504"
]

,[
    "id" => "meerkat3"
    ,"pw" => "php504"
]

];
foreach($arr as $val){
    echo $val["id"]," \n";
}
?>