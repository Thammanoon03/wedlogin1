<?php
$myfile = fopen("webdictionary.txt", "r") or die("Unable to open file!");
echo fread($myfile,filesize("webdictionary.txt"));
fclose($myfile);

echo "<hr> show Array <hr><br>";
$lines = file('webdictionary.txt');
$count = 0;
foreach($lines as $line) {
    $count += 1;
    echo str_pad($count,2, 0, STR_PAD_LEFT).",".$line."<br>";

    $arr=array($line);
}
?>