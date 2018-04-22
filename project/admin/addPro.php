<?php
    header('Content-Type:text/html; charset=UTF-8');
    $conn = mysqli_connect('localhost', 'root' ,'' , 'makeorder');
    if (mysqli_connect_errno() !== 0) {
        die(mysqli_connect_error());
}

    mysqli_query($conn,"set names utf8");
    $result=mysqli_query($conn,"select * from category");

    $rows = [];

    while($row = mysqli_fetch_assoc($result)){
    $rows[] = $row;
}
    
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
<span class="main-title">添加商品</span>
<span id="main-tip">用户名为空</span>
<div class="form-add">
<form action="handle_addPro.php" id="add_product" method="post" enctype="multipart/form-data">
<table  class="table  table-bordered table-hover">
	<tr>
		<td align="right" width="15%"><span class="td-txt">商品名称</span></td>
		<td ><input width="100px" type="text" name="pName"  placeholder="请输入商品名称"/></td>
	</tr>
	<tr>
		<td align="right"><span class="td-txt">商品分类</span></td>
		<td>
		<select id="cate" name="pCateId" class="">
            <option value="?" selected='selected'>?</option>
			<?php foreach($rows as $key=>$row):?>
                <option value="<?=$row['name']?>">
                    <?php echo $row['name'];?>
                </option>
            <?php endforeach;?>
		</select>
		</td>
	</tr>  
	<tr>
		<td align="right"><span class="td-txt">商品价格</span></td>
		<td><input class="" type="text" name="priceB"  placeholder="单位（元）"/></td>
	</tr>  
    <tr>
        <td align="right" width="15%"><span class="td-txt">商品描述</span></td>
        <td ><input width="100px" type="text" name="pdescrib"  placeholder="请输入商品描述"/></td>
    </tr>
	<tr>
		<td align="right"><span class="td-txt">商品图像</span></td>
		<td> 
            <input class="btn btn-file" type="file" name="myFile"/>
		</td>
	</tr>
</table>
<input class="btn btn-primary"  type="submit"  value="发布商品"/>
</form>
</div>

<script src="scripts/jquery-1.8.3.js"></script>
<script src="scripts/fileinput.min.js"></script>
<script type="text/javascript">
 $(function(){ 
   $("#add_product").submit(function () {
    if(isValid()){ 
        return true;
    }else{ 
        return false;
    }
 });
}); 



 function isValid(){ 
    if($("input[name='pName']").val().length<=0){ 
        $("#main-tip").html('商品名称不能为空');
        $("#main-tip").css('display', 'inline-block');
        return false;
    }
    if($("input[name='priceB']").val().length<=0){ 
        $("#main-tip").html('价格不能为空');
        $("#main-tip").css('display', 'inline-block');
        return false;
    } 
    if($("input[name='pdescrib']").val().length<=0){
        $("#main-tip").html('商品描述不能为空');
        $("#main-tip").css('display', 'inline-block');
        return false;
    }
    if($("#cate option:selected").text()=="?"){
        $("#main-tip").html('分类不能为空');
        $("#main-tip").css('display', 'inline-block');
        return false;
    }
    if($("input[name='myFile']").val().length<=0){ 
        $("#main-tip").html('图片不能为空');
        $("#main-tip").css('display', 'inline-block');
        return false;
    }
    if(isNaN($("input[name='priceB']").val())){ 
        $("#main-tip").html('权重必须为数字');
        $("#main-tip").css('display', 'inline-block');
        return false;
    }
    $("#main-tip").hide();
    return true;
 }
</script>
</body>
</html>