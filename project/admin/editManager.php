<?php 
    session_start();
    $user=$_SESSION['user'];
    header('Content-Type:text/html; charset=UTF-8');
    $conn = mysqli_connect('localhost', 'root' ,'' , 'makeorder');
    if (mysqli_connect_errno() !== 0) {
        die(mysqli_connect_error());
    }
    mysqli_query($conn,"set names utf8");

    $result=mysqli_query($conn,"select * from user where id='".$user['id']."'");
    $row = mysqli_fetch_assoc($result);

?>
<!doctype html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<title>Insert title here</title>
<link rel=stylesheet href="style/bootstrap-admin.css">
<link rel=stylesheet href="style/product.css"/>
</head>
<body>
<span class="main-title">我的资料</span>
<span id="main-tip"></span>
<div class="form" style="width: 70%;">
<form action="handle_editMana" method="post" enctype="multipart/form-data">
<table class="table  table-bordered table-hover">
    <tr>
        <td align="right" width="15%"><span class="td-txt">管理员名称</span></td>
        <td style="padding-left: 2rem;"><input type="text" name="name" value="<?php echo $row['name'];?>"/></td>
    </tr>
    <tr>
        <td align="right"><span class="td-txt">管理员手机号</span></td>
        <td style="padding-left: 2rem;"><input type="text" name="phone" value="<?php echo $row['phone'];?>"/></td>
    </tr>
    <tr>
        <td align="right"><span class="td-txt">管理员地址</span></td>
        <td style="padding-left: 2rem;"><input type="text" name="address" value="<?php echo $row['address'];?>"/></td>
    </tr> 
    <tr>
        <td align="right"><span class="td-txt">管理员性别</span></td>
        <td style="padding-left: 2rem;"><input type="text" name="sex" value="<?php echo $row['sex'];?>"/></td>
    </tr>   
</table>
<input class="btn btn-primary" type="submit"  value="确定修改" onclick="handle_editManager()" />
</form>
</div>
<script type="text/javascript">
function handle_editManager(){
    window.location="handle_editMana.php";
}
</script>
</body>
</html>