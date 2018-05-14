<?php 
    header('Content-Type:text/html; charset=UTF-8');
    $conn = mysqli_connect('localhost', 'root' ,'' , 'makeorder');
    if (mysqli_connect_errno() !== 0) {
        die(mysqli_connect_error());
    }
    mysqli_query($conn,"set names utf8");

    $file = $_FILES['myFile'];
    $pro_image =  '../upload/pro_image/'.$file['name'];

    if (move_uploaded_file($file['tmp_name'], $pro_image)) {
    
        /*$imagesize = getimagesize($pro_image);
        $srcwdith = $imagesize[0];
        $srcheight = $imagesize[1];
    
        $newwidth = 150;
        $newheight = $srcheight * 150 / $srcwdith;
    
        $avatar_thumb = '../upload/pro_image/default.jpg';
    
        $srcimage = imagecreatefromjpeg($pro_image);
    
        $dstimage = imagecreatetruecolor($newwidth, $newheight);
        $image = imagecopyresized($dstimage, $srcimage, 0, 0, 0, 0, $newwidth, $newheight,  $srcwdith, $srcheight);
    
        imagejpeg($dstimage, $avatar_thumb);*/
        $sql="INSERT INTO product(id,name,price,description,icon,category_name) values(null,'".$_POST['pName']."','".$_POST['priceB']."','".$_POST['pdescrib']."','".$pro_image."','".$_POST['pCateId']."')";
        mysqli_query($conn,$sql);
        if(mysqli_errno($conn)!==0){
            die(mysqli_error($conn));
        }
        echo '发布商品成功！';
    }
?>