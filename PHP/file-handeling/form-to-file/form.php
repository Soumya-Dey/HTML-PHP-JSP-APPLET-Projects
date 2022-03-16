<style>
    @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600&display=swap');

    body{
        font-family: 'Poppins', sans-serif;
    }
</style>

<?php
$file1=$_POST['file'];
$name=$_POST['name'];
$p1=$_POST['p1'];
$p2=$_POST['p2'];
$p3=$_POST['p3'];
$p4=$_POST['p3'];
$p5=$_POST['p3'];

echo "<body style=padding:2em;>";
echo "<h2 style=text-align:center;text-transform:uppercase;>";
if($name=="" || $p1=="" || $p2=="" || $p3==""){
    echo "Invalid Data. Try again.."."<br>";
}
else{
    $total = intval($p1) + intval($p2) + intval($p3) + intval($p4) + intval($p5);
    $avg = round($total/5);

    if($avg >= 60) $d='1st Division';
    elseif($avg >= 45) $d='2nd Division';
    elseif($avg >= 40) $d='3rd Division';
    else $d='FAIL!!';
    
    $fileOutput = $name . ',' . $p1 . ',' . $p2 . ',' . $p3 . ',' . $p4 . ',' . $p5 . ',' . $total . ',' . $avg . ',' . $d;

    $fp1=fopen($file1,'a');
    fwrite($fp1,$fileOutput);
    fwrite($fp1,chr(13));
    fwrite($fp1,chr(10));
    fclose($fp1);

    $fp1=fopen($file1,'r');
    $nsize=filesize($file1);
    $data=fread($fp1,$nsize);
    echo "Content of ".$file1.":"."<br/><br/><br/>";
    echo $data."<br><br/>";
    fclose($fp1);
    echo "<a href=".$file1.">"."Open Saved File"."</a><br>";
    echo "<a href=index.html>"."Go Back"."</a>";
}
?>