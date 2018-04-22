<?php 
	header('Content-Type:text/html; charset=UTF-8');
    $conn = mysqli_connect('localhost', 'root' ,'' , 'makeorder');
    if (mysqli_connect_errno() !== 0) {
        die(mysqli_connect_error());
    }
    mysqli_query($conn,"set names utf8");
    $id=$_GET['id'];

    $result=mysqli_query($conn,"select * from category weight where id='".$id."'");
    $row = mysqli_fetch_assoc($result);
?>
<!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<title>Insert title here</title>

<link rel=stylesheet href="style/bootstrap-admin.css"> 
<link rel=stylesheet href="style/product.css"/>
</head>
<body>
<span class="main-title">类目列表 &gt; 修改类目</span>
<div class="form-add">
<form action="handle_editCate.php?id=<?=$id?>" method="post">
<table class="table  table-bordered table-hover">
	<tr>
		<td align="right"><span class="td-txt">类目名称</span></td>
		<td><input type="text" name="name" value="<?php echo $row['name'];?>"/></td>
	</tr>
    <tr>
        <td align="right"><span class="td-txt">类目权重</span></td>
        <td><input type="text" name="weight" maxlength="4" value="<?php echo $row['weight'];?>"/></td>
    </tr> 
</table>
<input type="submit" class="btn btn-primary" value="编辑完成"/>
</form>
</div>
</body>
</html>