<?php
    $num1 = 10;
    $num2 = 20;
    $num3 = 30;
    $num4 = 40;

    $sum = $num1 + $num2;
    $diff = $num3 - $num2;
    $prod = $num1 * $num4;
    $quot = $num4 / $num2;
    $total = $sum + $diff + $prod + $quot;

    $average = $total / 4;

   
    echo "The sum of $num1 and $num2 is $sum <br>";
    echo "The difference between $num3 and $num2 is $diff <br>";
    echo "The product of $num1 and $num4 is $prod <br>";
    echo "The division of $num4 by $num2 is $quot <br>";
    echo "The total of all result is $total <br>";
    echo "The average of all result is $average <br>";
?>