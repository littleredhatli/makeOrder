<?php
    header('Content-Type:text/html; charset=UTF-8');
    $conn = mysqli_connect('localhost', 'root' ,'' , 'makeorder');
    if (mysqli_connect_errno() !== 0) {
        die(mysqli_connect_error());
    }

    mysqli_query($conn,"set names utf8");
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
<span class="main-title">添加类目</span>
<span id="main-tip">用户名为空</span>
<div class="form-add">
<form action="handle_addCate.php" id="add_product" method="post" enctype="multipart/form-data">
<table class="table  table-bordered table-hover">
    <tr>
        <td align="right" width="20%"><span class="td-txt">类目名称</span></td>
        <td><input type="text" width="100%" id="cname" name="cname" placeholder="请输入类目名称"/></td>
    </tr>
    <tr>
        <td align="right"><span class="td-txt">权重</span></td>
        <td><input type="text" name="weight" placeholder="权重数字，越大越靠前"/></td>
    </tr> 

</table>
<input class="btn btn-primary"  type="submit"  value="添加类目"/>
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
    if($("input[name='cname']").val().length<=0){ 
        $("#main-tip").html('分类不能为空');
        $("#main-tip").css('display', 'inline-block');
        return false;
    }
    if($("input[name='weight']").val().length<=0){ 
        $("#main-tip").html('权重不能为空');
        $("#main-tip").css('display', 'inline-block');
        return false;
    }
    if(isNaN($("input[name='weight']").val())){ 
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