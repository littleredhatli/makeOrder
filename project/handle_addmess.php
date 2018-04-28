<?php 
    session_start();
    header('Content-Type:text/html; charset=UTF-8');
    $conn = mysqli_connect('localhost', 'root' ,'' , 'makeorder');
    if (mysqli_connect_errno() !== 0) {
        die(mysqli_connect_error());
    }
    mysqli_query($conn,"set names utf8");
    $sql="UPDATE user SET phone='".$_POST['phone']."',address='".$_POST['address']."',sex='".$_POST['sex']."' where id='".$_SESSION['user']['id']."'";
    mysqli_query($conn,$sql);
    $_SESSION['user']['phone']=$_POST['phone'];
    $_SESSION['user']['address']=$_POST['address'];
    $_SESSION['user']['sex']=$_POST['sex'];
    if(mysqli_errno($conn)!==0){
        die(mysqli_error($conn));
    }
?>
<script type="text/javascript">
alert("补充个人信息成功！");
window.location="order.php";
</script>