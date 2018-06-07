<?php 
    session_start();
    $user=$_SESSION['user'];
    header('Content-Type:text/html; charset=UTF-8');
    $conn = mysqli_connect('localhost', 'root' ,'' , 'makeorder');
    if (mysqli_connect_errno() !== 0) {
        die(mysqli_connect_error());
    }
    mysqli_query($conn,"set names utf8");

    $id=$_GET['id'];
    $result=mysqli_query($conn,"select * from user where id='".$id."'");
    $row = mysqli_fetch_assoc($result);

?>
<!doctype html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<title>Insert title here</title>
<link rel="stylesheet" href="https://cdn.bootcss.com/font-awesome/4.7.0/css/font-awesome.css">
<link rel="stylesheet" href="style/bootstrap-admin.css">
<link rel="stylesheet" href="style/product.css">
<link rel="stylesheet" type="text/css" href="../style/user.css">
</head>
<body>
<div class="content" style="margin-left: 2rem;margin-top: 1rem;">
<span class="main-title">用户详情如下：</span>
<span id="main-tip"></span>
<div class="form" style="width: 70%;">
<table class="table  table-bordered table-hover">
    <tr>
        <td align="right" width="15%"><span class="td-txt">我的昵称</span></td>
        <td style="padding-left: 2rem;"><?php echo $row['name'];?></td>
    </tr>
    <tr>
        <td align="right"><span class="td-txt">我的手机号</span></td>
        <td style="padding-left: 2rem;"><?php echo $row['phone'];?></td>
    </tr>
    <tr>
        <td align="right"><span class="td-txt">我的地址</span></td>
        <td style="padding-left: 2rem;"><?php echo $row['address'];?></td>
    </tr> 
    <tr>
        <td align="right"><span class="td-txt">我的性别</span></td>
        <td style="padding-left: 2rem;"><?php echo $row['sex'];?></td>
    </tr>   
</table>

</div>
</div>
</body>
</html>