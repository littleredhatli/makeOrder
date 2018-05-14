<?php
    header('Content-Type:text/html; charset=UTF-8');
    $conn = mysqli_connect('localhost', 'root' ,'' , 'makeorder');
    if (mysqli_connect_errno() !== 0) {
        die(mysqli_connect_error());
    }
    mysqli_query($conn,"set names utf8");

    $id=$_GET['id'];
    $result=mysqli_query($conn,"select * from order_detail where order_id='".$id."'");
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
    <link rel="stylesheet" href="style/bootstrap-admin.css">
    <link rel="stylesheet" href="style/product.css">
</head>
<body>
        <span class="main-title">订单详情如下：</span>
        <table class="table  table-hover">
        <thead>
            <tr>
                <th width="5%">订单编号</th>
                <th width="5%">商品编号</th> 
                <th width="10%">商品名称</th>
                <th width="10%">商品单价</th>
                <th width="15%">下单数量</th>
                <th width="15%">商品图标</th>
                <th width="15%">下单时间</th>
                <th width="8%">订单总金额</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach($searches as $key=>$search):?>
            <tr align="center">
                <td><?php echo $search['order_id'];?></td> 
                <td><?php echo $search['product_id'];?></td> 
                <td><?php echo $search['product_name'];?></td>
                <td><?php echo $search['product_price'];?></td>
                <td><?php echo $search['product_quantity'];?></td>
                <td><?php echo $search['product_icon'];?></td>
                <td><?php echo $search['create_time'];?></td>
                <td><?php echo $search['order_amount'];?></td>
            </tr>
            <?php  endforeach;?> 
        </tbody>
        </table>
</body>
</html>