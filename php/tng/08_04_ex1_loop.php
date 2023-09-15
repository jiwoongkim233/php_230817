<?php
// 1
for($i=1;$i<=10;$i++){
	echo $i,"\n";}

// 2
for($i=1;$i<=9;$i++){
	echo "8 X $i =",8*$i,"\n";
}

// 3
for($i=1;$i<=9;$i++){
	echo "19 X $i =",19*$i,"\n";
}

// 4 
// $i=1;
// $b=2;
// $sum=($i+$b);
// echo $sum; 

// 5
$food ="
";
switch($food){
	case "짜장면":
		echo "중식";
		break;
	case "비빔밥":
		echo"한식";
		break;
	default : 
	echo "양식";
} ;
?>