<?php
//q2as3pt1.php : To copy content of 2 input files to 1 outpuut file
$file1=$_POST["file1"];
$file2=$_POST["file2"];
$file3=$_POST["file3"];
$n1=filesize($file1); //$n1= size of 1st input file
$n2=filesize($file2); //$n2= size of 2nd input file
$fp1=fopen($file1,'r');
$fp2=fopen($file2,'r');
$fp3=fopen($file3,'w');
echo "<body bgcolor=skyblue>";
echo "<font face=arial size=6 color=midnightblue>";
$data1=fread($fp1,$n1); //Reading entire file-1 data in $data1
$data2=fread($fp2,$n2); //Reading entire file-2 data in $data2
fwrite($fp3,$data1); //Writing data of file-1 to output file
fwrite($fp3,$data2); //Writing data of file-2 to output file
echo "File Copying is Over..."."<br>";
echo "Size of ".$file1."=".$n1." Bytes"."</br>";
echo "Size of ".$file2."=".$n2." Bytes"."</br>";
echo "Size of ".$file3."=".($n1+$n2)." Bytes"."</br>";
fclose($fp1);
fclose($fp2);
fclose($fp3);
?>