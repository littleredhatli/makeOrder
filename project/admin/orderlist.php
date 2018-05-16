<?php
    session_start();
    $user=$_SESSION['user'];
    header('Content-Type:text/html; charset=UTF-8');
    $conn = mysqli_connect('localhost', 'root' ,'' , 'makeorder');
    if (mysqli_connect_errno() !== 0) {
        die(mysqli_connect_error());
    }
    mysqli_query($conn,"set names utf8");

    
    $result=mysqli_query($conn,"select * from order_detail where create_time=now()");
    $searches = [];
    while($search = mysqli_fetch_assoc($result)){
        $searches[] = $search;
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title></title>
    <link rel="stylesheet" href="https://cdn.bootcss.com/font-awesome/4.7.0/css/font-awesome.css">
    <link rel="stylesheet" type="text/css" href="../style/header.css">
    <link rel="stylesheet" type="text/css" href="../style/user.css">
</head>
<body>
    <div class="header">
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
    <div class="content">
        <span class="main-title" style="border: none;font-size: 18px;">您已成功成功提交订单，请耐心等待商家配送</span>
        <span class="main-title" style="font-size: 16px;color: #F63440;">您的订单的如下：</span>
        <table class="table  table-hover" style="margin-left: 1rem;">
        <thead>
            <tr>
                <th width="6%">订单编号</th>
                <th width="6%">商品编号</th> 
                <th width="10%">商品名称</th>
                <th width="15%">下单数量</th>
                <th width="10%">商品总价</th>
                <th width="15%">商品图标</th>
                <th width="15%">下单时间</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach($searches as $key=>$search):?>
            <tr align="center">
                <td><?php echo $search['order_id'];?></td> 
                <td><?php echo $search['product_id'];?></td> 
                <td><?php echo $search['product_name'];?></td>
                <td><?php echo $search['product_quantity'];?></td>
                <td><?php echo $search['product_price'];?></td>
                <td><div class="orderimg_block"><img class="order_img" src="<?=$search['product_icon']?>"/></div></td>
                <td><?php echo $search['create_time'];?></td>
            </tr>
            <?php  endforeach;?> 
        </tbody>
        </table>
        <span class="main-title" style="display: inline-block;margin-bottom: 2rem;margin-left: 2rem;">订单总金额：<?php echo $search['order_amount'];?></span>
        <button class="back" onclick="back()" style="margin-bottom: 2rem;">返回首页</button>
    </div>
    <script type="text/javascript">
		function back(){
			window.location="shop_menu.php";
		}
	</script>
</body>
</html>