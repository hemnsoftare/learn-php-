<?php

//                function addation($num){
//                echo   $num + $num;
//                }
//                 addation(34);




$numGlobal = 34 ;
function addiantion($num)
{
    global $numGlobal;
    echo $numGlobal;
    echo "<br>";
    echo $num["num1"] +   $num["num2"] + $num["num3"] + $num["num4"] + $numGlobal;
}
addiantion(["num1"=> 12,"num2"=>234,"num3"=>343,"num4"=>23]);

function sub($num1 , $num2)
{
    echo $num1 - $num2;
    echo "<br>";
    echo $num1 + $num2;
}
sub(34 , 234)







?>