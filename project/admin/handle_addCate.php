<?php 
    header('Content-Type:text/html; charset=UTF-8');
    $conn = mysqli_connect('localhost', 'root' ,'' , 'makeorder');
    if (mysqli_connect_errno() !== 0) {
        die(mysqli_connect_error());
    }
    mysqli_query($conn,"set names utf8");
    $sql="INSERT INTO category(id,name,weight) values(null,'".$_POST['cname']."','".$_POST['weight']."')";
    mysqli_query($conn,$sql);
    if(mysqli_errno($conn)!==0){
        die(mysqli_error($conn));
    }
    echo '添加类目成功！';
?>