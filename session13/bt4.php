<?php
   $a = 0;
   $b = 0;
   $caculate = 50;
   while((2/5)*$a + (3/4)*$b != 27) {
       $a++;
       $b = $caculate - $a;
   }
  echo $a, '<br>';
  echo $b;
?>