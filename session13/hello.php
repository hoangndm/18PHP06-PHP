<?php
$so1 = 5;
$so2 = 3;
function tinh($a, $b, $pt) {
    switch ($pt) {
        case '+':
            echo $a + $b;
            break;
        case '-':
            echo $a - $b;
            break;
        case '*':
            echo $a * $b;
            break;
        case '/':
            echo $a / $b;
            break;
        default:
            echo "Nhap lai ";
            break;
    }
}
tinh($so1, $so2 , '/');
?>
