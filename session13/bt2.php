<?php 
$base = 50000000;
$coe = 4;
function mSalary($baseSalary, $coefficient){
    $salary = 0;
    $bonus = 0;
    if($coefficientSalary < 3){
        $bonus = 0.2;
    }
    else {
        $bonus = 0.5;
    }
    $salary = ($baseSalary * $coefficient) + ($baseSalary * $coefficient) * $bonus;
    echo $salary;
    if($salary >= 5000000 && $salary <50000000) {
        echo "ban can co gang hon";
    }
    else {
        echo "ban gioi day";
    }
}
mSalary($base, $coe);
?>