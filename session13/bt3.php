<?php
 $vo =0;
 $candy = 0;
 $money = 2000;
    while($money > 0) {
        $money -= 200;
        $candy++;
        $vo ++;
        while($vo == 2) {
            $candy++;
            $vo ++;
        }
    }

echo $candy;
?>