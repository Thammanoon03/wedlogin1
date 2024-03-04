<?php
$lines = file('webdictionary.txt');
$count = 0;
foreach($lines as $line) {
    $count += 1;
  
    $arr1=explode(",",$line);
    $arrtest[]=explode(",",$line);
    $arrfull['row'.$count]=array(
        "name"=>$arr1[0],
        "surname"=>$arr1[1],
        "gender"=>$arr1[2],
        "age"=>$arr1[3],
        "id"=>$arr1[4],
        "grade"=>$arr1[5],
        "faculty"=>$arr1[6],
        "major"=>$arr1[7],
        "phone"=>$arr1[8],
        "email"=>$arr1[9],
        "username"=>$arr1[10],
        "password"=>$arr1[11],
        "image"=>$arr1[12] 
    );
}
    echo json_encode($arrfull);
?>