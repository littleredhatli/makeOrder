<?php 
    header('Content-Type:text/html; charset=UTF-8');
    $conn = mysqli_connect('localhost', 'root' ,'' , 'makeorder');
    if (mysqli_connect_errno() !== 0) {
        die(mysqli_connect_error());
    }
    mysqli_query($conn,"set names utf8");
    $id=$_GET['id'];

    $sql="UPDATE product set name='".$_POST['name']."',price='".$_POST['price']."',description='".$_POST['description']."',icon='1',category_name='".$_POST['category_name']."' where id='".$id."'";
    mysqli_query($conn,$sql);
    if(mysqli_errno($conn)!==0){
        die(mysqli_error($conn));
    }
    echo '修改商品信息成功！';
?>