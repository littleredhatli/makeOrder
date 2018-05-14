<?php 
    header('Content-Type:text/html; charset=UTF-8');
    $conn = mysqli_connect('localhost', 'root' ,'' , 'makeorder');
    if (mysqli_connect_errno() !== 0) {
        die(mysqli_connect_error());
    }
    mysqli_query($conn,"set names utf8");
    $id=$_GET['id'];

    $result=mysqli_query($conn,"select * from category");
    $rows = [];
    while($row = mysqli_fetch_assoc($result)){
        $rows[] = $row;
    }

    $lists=mysqli_query($conn,"select *from product where id='".$id."'");
    $search=mysqli_fetch_assoc($lists);
?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>-.-</title>
<link rel=stylesheet href="style/bootstrap-admin.css"> 
<link rel=stylesheet href="style/product.css">
</head>
<body>
<span class="main-title">商品列表 &gt; 编辑商品</span>
<div class="form-add">
<form action="handle_editPro.php?id=<?=$id?>" method="post" enctype="multipart/form-data">
<table class="table  table-bordered table-hover">

    <tr>
        <td align="right" width="15%"><span class="td-txt">商品编号</span></td>
        <td><input class="gray" type="text" disabled="true" readonly name="pSn" value="<?=$id?>"/></td>
    </tr>
	<tr>
		<td align="right"><span class="td-txt">商品名称</span></td>
		<td><input type="text" name="name"  value="<?php echo $search['name'];?>"/></td>
	</tr>
	<tr>
		<td align="right"><span class="td-txt">商品分类</span></td>
		<td>
		<select name="category_name">
			<?php foreach($rows as $key=>$row):?>
            <option value="<?php echo $row['name'];?>" <?php echo $row['name']==$search['category_name']?"selected='selected'":null;?>><?php echo $search['category_name'];?></option>
            <?php endforeach;?>
		</select>
		</td>
	</tr> 
	<tr>
		<td align="right"><span class="td-txt">商品价格</span></td>
		<td><input type="text" name="price"  value="<?php echo $search['price'];?>"/></td>
	</tr> 
    <tr>
        <td align="right"><span class="td-txt">商品描述</span></td>
        <td><input type="text" name="description"  value="<?php echo $search['description'];?>"/></td>
    </tr>
	<tr>
        <td align="right"><span class="td-txt">商品图像</span></td>
        <td> 
            <img style="margin:12px;width: 5rem;height: 5rem;" src="<?=$user['icon'];?>"/>
            <input class="btn btn-file" type="file" name="myFile"/>
        </td>
    </tr> 
</table>
<input class="btn btn-primary" type="submit"  value="编辑完成"/>
</form>
</div>
</body>
</html>