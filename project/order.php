<?php
    $order = json_decode($_GET['0'],true);  
      
    header('Content-Type:text/html; charset=UTF-8');
    $conn = mysqli_connect('localhost', 'root' ,'' , 'makeorder');
    if (mysqli_connect_errno() !== 0) {
        die(mysqli_connect_error());
    }
    mysqli_query($conn,"set names utf8");

    /*for($i=0;$i<1;$i++){
        $id=$_POST[$i]['pro_id'];
    } */

    print_r($order);
?>