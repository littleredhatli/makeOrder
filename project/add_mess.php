<?php 
    session_start();
    header('Content-Type:text/html; charset=UTF-8');
    $conn = mysqli_connect('localhost', 'root' ,'' , 'makeorder');
    if (mysqli_connect_errno() !== 0) {
        die(mysqli_connect_error());
    }
    mysqli_query($conn,"set names utf8");

    if (empty($_SESSION['user']['phone'])) {
        $is_complete = 0;
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel=stylesheet href="style/bootstrap-admin.css">
    <link rel=stylesheet href="style/user.css">
    <title></title>
</head>
<body>
<span class="main-title">请补充完整用户信息</span>
<div class="form-add" style="margin-left: 2rem;">
    <form action="handle_addmess.php" id="add_product" method="post" enctype="multipart/form-data">
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
