<?php

//$file = fopen("../library/logins.txt", 'r+');


if ($file2)
{
    $i = 1;
    while (!feof($file))
        {
            $str = fgets($file, 999);
            $str = substr($str, 0, strlen($str)-1);

            if ((strlen($str) >= 5) && (strlen($str) <= 5)) {
             echo "$str"."<br />";
             $i++;
            }
        }
}


$fp = file("../library/logins.txt");

$num_stroka = rand(1, count($fp)); //Удалим 5 строку из файла
$file = file("../library/logins.txt"); // Считываем весь файл в массив

for($i = 0; $i < sizeof($file); $i++)
if($i == $num_stroka) {
    //echo "<br>$num_stroka - ".$file[$i];
    $login = $file[$i];
    unset($file[$i]);
}

$fp = fopen("../library/logins.txt", "w");
fputs($fp, implode("", $file));
fclose($fp);

$fp = file("../library/logins.txt");
//fclose($file);
