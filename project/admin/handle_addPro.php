<?php 
    header('Content-Type:text/html; charset=UTF-8');
    $conn = mysqli_connect('localhost', 'root' ,'' , 'makeorder');
    if (mysqli_connect_errno() !== 0) {
        die(mysqli_connect_error());
    }
    mysqli_query($conn,"set names utf8");
    $sql="INSERT INTO product(id,name,price,description,icon,category_name) values(null,'".$_POST['pName']."','".$_POST['priceB']."','".$_POST['pdescrib']."','图片','".$_POST['pCateId']."')";
    mysqli_query($conn,$sql);
    if(mysqli_errno($conn)!==0){
        die(mysqli_error($conn));
    }
    echo '发布商品成功！';
?>