<?php 
    session_start();
    $user=$_SESSION['user'];
    header('Content-Type:text/html; charset=UTF-8');
    $conn = mysqli_connect('localhost', 'root' ,'' , 'makeorder');
    if (mysqli_connect_errno() !== 0) {
        die(mysqli_connect_error());
    }
    mysqli_query($conn,"set names utf8");

    $length=$_GET['length'];
    $_SESSION['length']=$length;

    if (empty($_SESSION['user']['phone'])) {
        $is_complete = 0;
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel=stylesheet href="style/bootstrap-admin.css">
    <link rel="stylesheet" href="https://cdn.bootcss.com/font-awesome/4.7.0/css/font-awesome.css">
    <link rel=stylesheet href="style/user.css">
    <link rel="stylesheet" type="text/css" href="./style/header.css">
    <script src="js/jquery-1.8.3.js"></script>
    <title></title>
</head>
<body>
<div class="header" style="height: 5rem;line-height: 5rem;">
        <div class="left_header">
            <i class="fa fa-cutlery" style="color:white;font-size: 1.4rem;margin-left: 1.5rem;line-height: 3.5rem;margin-right: 0.3rem;"></i>
            <span class="content_title">某某餐饮有限公司</span>
        </div>
        <div class="right_menu">
            <span class="user">欢迎您，<?=$user['name']?></span>
            <a class="details" href="">我的资料</a>
            <a class="logout" href="logout.php">退出登录</a>
        </div>
    </div>
<span class="main-title">请补充完整用户信息</span>
<span id="main-tip" style="display: none;">用户名为空</span>
<div class="form-add" style="margin-left: 2rem;">
    <form action="handle_addmess.php" id="info" method="post" enctype="multipart/form-data">
    <table class="table  table-bordered table-hover">
        <tr>
            <td align="right" width="20%"><span class="td-txt">手机号</span></td>
            <td><input type="text" width="100%" id="cname" name="phone" placeholder="请输入手机号"/></td>
        </tr>
        <tr>
            <td align="right"><span class="td-txt">地址</span></td>
            <td><input type="text" name="address" placeholder="请输入地址"/></td>
        </tr> 
        <tr>
            <td align="right"><span class="td-txt">性别</span></td>
            <td>
                <select name="sex">
                    <option selected="selected">?</option>
                    <option value="男">男</option>
                    <option value="女">女</option>
                </select>
            </td>
        </tr> 

    </table>
    <input class="btn btn-primary"  type="submit"  value="提交"/>
    </form>
</div>
<script type="text/javascript">
$(function(){ 
   $("#info").submit(function () {
    if(isValid()){ 
        return true;
    }else{ 
        return false;
    }
 });
}); 

function isValid(){ 
    if($("input[name='cname']").val().length<=0){ 
        $("#main-tip").html('手机号不能为空');
        $("#main-tip").css('display', 'inline-block');
        return false;
    }
    if($("input[name='address']").val().length<=0){ 
        $("#main-tip").html('地址不能为空');
        $("#main-tip").css('display', 'inline-block');
        return false;
    }
    if($("input[name='sex']").val().length<=0){ 
        $("#main-tip").html('性别不能为空');
        $("#main-tip").css('display', 'inline-block');
        return false;
    }
    $("#main-tip").hide();
    return true;
 }

</script>
</body>
</html>
<?php
    } else {
        $is_complete = 1;
?>
<script type="text/javascript">
    window.location="order.php";
</script>
<?php
    }
?>

