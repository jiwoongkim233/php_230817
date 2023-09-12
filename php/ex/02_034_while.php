<?php
// while : 조건이 참이면 루프
// $i = 0;
// while ($i <= 2) {
// echo "{$i}\n";
// $i++;
// }

$num = 1;
while ($num <= 9){
    echo "2*$num = ", 2*$num,"\n" ;
    $num++;
}

// do ~ while : 무조건 한 번은 실행하고, 그 다음부터 조건이 참이면 루프하는 문법
$num = 0;
do {
    echo "ttt";
}
while($num < 0);{

}

?>