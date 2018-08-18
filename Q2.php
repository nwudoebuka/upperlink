<?php
//declaring function.
function array_special($a){

for($i=0;$i<count($a);$i++){
//getting the maxium value from the given array assuming they are all positive integers

	$y = max($a);


//checking if array contains a negetive integer

	foreach($a as $v)
{
    if($v<0)
    {
        $y = min($a);
        break;
    }
}

if($y < 0){
//from the question if array contans a negetive value then the lowest positive integer is always 1
$answer = 1;

}else{
	$answer = $y + 1;
}


}



echo $answer;

}
//declaring an array
$x = ['1','3'];
//calling function
array_special($x);
