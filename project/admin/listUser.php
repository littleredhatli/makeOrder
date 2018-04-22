<?php 
    header('Content-Type:text/html; charset=UTF-8');
    $conn = mysqli_connect('localhost', 'root' ,'' , 'makeorder');
    if (mysqli_connect_errno() !== 0) {
        die(mysqli_connect_error());
    }
    mysqli_query($conn,"set names utf8");

    $result=mysqli_query($conn,"select * from user");
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
<link rel="stylesheet" href="style/bootstrap-admin.css">
<link rel="stylesheet" href="style/product.css">
</head> 
<body>
<span class="main-title">用户列表</span>
<div class="details">
    <div class="details_operation clearfix">
        <div class="bui_select"></div>                    
    </div>
    <!--表格-->
    <table class="table  table-hover">
        <thead>
            <tr>
                <th width="20%">用户昵称</th>
                <th width="20%">用户手机号</th>
                <th width="20%">用户地址</th>
                <th width="20%">用户性别</th>
                <th>操作</th>
            </tr>
        </thead>
        <tbody>
        <?php  foreach($rows as $key=>$row):?>
            <tr align="center">               
                <td><?php echo $row['name'];?></td>
                <td><?php echo $row['phone'];?></td>
                <td><?php echo $row['address'];?></td>
                <td><?php echo $row['sex'];?></td>           
                <td align="center"><a class="btn btn-link" onclick="">查看详细信息</a></td>
            </tr>
        <?php endforeach;?>
        </tbody>
    </table>
</div>
</body>
<script type="text/javascript">

	function addUser(){
		window.location="addUser.php";	
	}
	function limitUser(id){
			
	}
	function delUser(username){
			if(window.confirm("确认删除？")){
				window.location="doAdminAction.php?act=delUser&username="+username;
			}
	}
</script>
</html>