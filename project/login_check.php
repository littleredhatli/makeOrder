<?php
session_start();
header('Content-Type:text/html; charset=UTF-8');
    $conn = mysqli_connect('localhost', 'root' ,'' , 'makeorder');
    if (mysqli_connect_errno() !== 0) {
        die(mysqli_connect_error());
    }
    mysqli_query($conn,"set names utf8");

$username = $_POST['username'];
$password = $_POST['password'];

$sql = "SELECT * FROM user WHERE name='".$username."'";
$result = mysqli_query($conn, $sql);
if (mysqli_errno($conn)) {
    die(mysqli_error($conn));
}

$user = mysqli_fetch_assoc($result);

if (empty($user)) {
    ?>
        <script type="text/javascript">
            alert("用户名或密码不正确，请重新登录！");
            window.location="login.php";
        </script>
        <?php
} else if($password != $user['passwd']) {
    ?>
        <script type="text/javascript">
            alert("用户名或密码不正确，请重新登录！");
            window.location="login.php";
        </script>
        <?php
} else if($user['user_grant']=='用户'){
    $_SESSION['user'] = $user;
    ?>
        <script type="text/javascript">
            window.location="shop_menu.php";
        </script>
        <?php
}
else if($user['user_grant']=='管理员'){
    $_SESSION['user'] = $user;
    ?>
        <script type="text/javascript">
            window.location="admin/index.php";
        </script>
        <?php
}
?>