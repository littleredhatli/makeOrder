<?php 
    header('Content-Type:text/html; charset=UTF-8');
    $conn = mysqli_connect('localhost', 'root' ,'' , 'makeorder');
    if (mysqli_connect_errno() !== 0) {
        die(mysqli_connect_error());
    }
    mysqli_query($conn,"set names utf8");

    $sql="select * from category order by weight asc";
    $result=mysqli_query($conn,$sql);
    $rows=[];
    while ($row=mysqli_fetch_assoc($result)) {
        $rows[]=$row;
    }
?>
<!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<title>Insert title here</title>
<link rel="stylesheet" href="style/bootstrap-admin.css">
<link rel="stylesheet" href="style/product.css">
</head>
<body>
<span class="main-title">类目列表</span>
<div class="details">
    <div class="details_operation clearfix" style="margin-top: 1.5rem;">
        <div class="bui_select">
            <input type="button" value="添加类目" class="btn btn-primary"  onclick="addCate()">
        </div>                   
    </div>
    <!--表格-->
    <table class="table table-hover" cellspacing="0" cellpadding="0">
        <thead>
            <tr>
                <th align="center"  width="30%">类目</th>
                <th align="center" width="30%">权重</th>
                <th align="center" >操作</th>
            </tr>
        </thead>
        <tbody>
        <?php  foreach($rows as $key=>$row):?>
            <tr>
            <!--这里的id和for里面的c1 需要循环出来-->
                <td align="center"><?php echo $row['name'];?></td>
                <td align="center"><?php echo $row['weight'];?></td>
                <td align="center"><a class="btn btn-link" onclick="editCate(<?php echo $row['id'];?>)">修改</a><a class="btn btn-link"  onclick="delCate(<?php echo $row['id'];?>)">删除</a></td>
            </tr>
        <?php endforeach;?>
        </tbody>
    </table>
</div>
<script type="text/javascript">
	function editCate(id){
		window.location="editCate.php?id="+id;
	}
	function delCate(id){
		if(window.confirm("您确定要删除吗？删除之后不能恢复哦！！！")){
			window.location="delCate?id="+id;
		}
	}
	function addCate(){
		window.location="addCate.php";
	}
</script>
</body>
</html>