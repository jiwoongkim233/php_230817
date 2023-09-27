<?php

$e=1;
while($e<=5){
$star=1;
$s=1;
	while ($s<=5-$e){
		echo " ";
		$s++;
	}
	while($star<=$e){
		echo "*";
		$star++;
	}
	echo "\n";
	$e++;
};


?>