<?php 
    session_start();
    $user=$_SESSION['user'];
    header('Content-Type:text/html; charset=UTF-8');
    $conn = mysqli_connect('localhost', 'root' ,'' , 'makeorder');
    if (mysqli_connect_errno() !== 0) {
        die(mysqli_connect_error());
    }
    mysqli_query($conn,"set names utf8");

    $sql="UPDATE user set name='".$_POST['name']."',phone='".$_POST['phone']."',address='".$_POST['address']."',sex='".$_POST['sex']."' where id='".$user['id']."'";
    mysqli_query($conn,$sql);
    if(mysqli_errno($conn)!==0){
        die(mysqli_error($conn));
    }

    $sql1="UPDATE orderlist set user_name='".$_POST['name']."',user_phone='".$_POST['phone']."',user_address='".$_POST['address']."' where user_id='".$user['id']."'";
    mysqli_query($conn,$sql1);
    if(mysqli_errno($conn)!==0){
        die(mysqli_error($conn));
    }
?>
<script type="text/javascript">
alert("修改个人资料成功！");
window.location="./admin/shop_menu.php";
</script>