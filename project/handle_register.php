<?php 
    header('Content-Type:text/html; charset=UTF-8');
    $conn = mysqli_connect('localhost', 'root' ,'' , 'makeorder');
    if (mysqli_connect_errno() !== 0) {
        die(mysqli_connect_error());
    }
    mysqli_query($conn,"set names utf8");

        // 验证重名
    $sql = "SELECT * FROM user WHERE name='".$_POST['name']."'";
    $result = mysqli_query($conn, $sql);

    if (mysqli_errno($conn)) {
        die(mysqli_error($conn));
    }

    $user = mysqli_fetch_assoc($result);
    if(empty($_POST['name'])||empty($_POST['password'])){
        ?>
        <script type="text/javascript">
            window.location="index.php";
        </script>
        <?php
        die();
    }

    if(!empty($user)) {

        ?>
        <script type="text/javascript">
            alert("用户名已经存在,请重新注册!");
            window.location="index.php";
        </script>
        <?php
        die();
    }

    $sql="INSERT INTO user(id,name,phone,address,sex,passwd,user_grant) values(null,'".$_POST['name']."',null,null,null,'".$_POST['password']."','用户')";
    mysqli_query($conn,$sql);
    if(mysqli_errno($conn)!==0){
        die(mysqli_error($conn));
    }
    ?>
        <script type="text/javascript">
            alert("注册成功，请登录");
            window.location="index.php";
        </script>
