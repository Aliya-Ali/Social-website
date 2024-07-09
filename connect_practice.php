<?php
$name= "eathorne";
$number = 2;
$number1 = 2;
$number2 = 4;

echo "george" ."<br>";
echo $number . "<br>"; 
echo $name . "<br>"; 
echo $number1 + $number2 . "<br>";

$a[0] = "eathorne";
$a[1] = "eathorne";
$a[2] = "june";
$a[] = "july";

echo $a[1];
echo "<pre>";
print_r($a);
echo "</pre>";

$n = 0;
while($n < 10 ){
    $n = $n + 1;
    echo $n . "<br>";
}
$n1 = 10;
if($n1 > 20){
    echo "inside the if statement";
}elseif($n1<20){
    echo "it is lesser than 20";
}
else{
    echo " end";
}

echo "<br>";
echo "this is function for php <br>" ;
function say_something(){
    echo "this is a first funtion";
}

function show_something($name, $name2){
    echo $name2. " will show Miss." . $name;
}
show_something("Sadia","Aliya");
echo "<br>";
say_something();
echo "<br> <br>";
echo "this is a section for class <br>";

class myclass{
    //public $name2 = "water";
    function one($name){
        $name2 = "water";
        echo "give me one $name of $name2 <br>";
        //echo $this->$name2;

    }
    function two(){
        echo "two <br>";
    }    
}

$a = new myclass();
echo $a->one("Glass");
echo $a->two();
//echo $a->$name2;