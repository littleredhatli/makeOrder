<?php
	$id = json_decode($_POST['id'],true);  
      
    header('Content-Type:text/html; charset=UTF-8');
    $conn = mysqli_connect('localhost', 'root' ,'' , 'makeorder');
    if (mysqli_connect_errno() !== 0) {
        die(mysqli_connect_error());
    }
    mysqli_query($conn,"set names utf8");   

    $query1="select name from category where id='".$id."'";
    $arry1=mysqli_query($conn,$query1);
    $result1=mysqli_fetch_assoc($arry1);
    $query2="select * from product where category_name='".$result1['name']."'";
    $arry2=mysqli_query($conn,$query2);
    $searches=[];
    while ($search=mysqli_fetch_assoc($arry2)) {
        $searches[]=$search;
    }

    $json = json_encode((object)$searches,JSON_FORCE_OBJECT);
    print_r($json);
?>