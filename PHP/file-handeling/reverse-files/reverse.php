<?php
//q3as3pt1.php : Write php program to reverse the content of
//one file
$file1=$_POST["file1"];
$file2=$_POST["file2"];
$n=filesize($file1); //$n= size of input file
$fp1=fopen($file1,'r');
$fp2=fopen($file2,'w');
echo "<body bgcolor=#00aa55>";
echo "<font face=times new roman size=6 color=black>";
$data=fread($fp1,$n); //Reading entire file data in $data
$data1=strrev($data); //To reverse the content of $data
fwrite($fp2,$data1); //Writing reverse data on output file
echo "Content of File Reverse is Over..."."<br>";
echo "Size of ".$file1."=".$n." Bytes"."</br>";
fclose($fp1);
fclose($fp2);
?>