<?php
    header('Content-Type:text/html; charset=UTF-8');
    $conn = mysqli_connect('localhost', 'root' ,'' , 'makeorder');
    if (mysqli_connect_errno() !== 0) {
        die(mysqli_connect_error());
    }
    mysqli_query($conn,"set names utf8");

    $result=mysqli_query($conn,"select * from orderlist");
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
<span class="main-title">订单列表</span>
<div class="details">
    <div class="details_operation clearfix">
        <div class="fl"></div>
            <div class="fr"> 
                <div class="text" style="margin-right: 3rem;">
                    <span>
                        <input type="text" value="" placeholder="搜索手机号" class="search form-control"  id="searchPhone" onkeypress="searchPhone()" >
                    </span>
                </div>
            </div>
    </div>
    <!--表格-->
    <table class="table  table-hover">
        <thead>
            <tr>
                <th width="5%">订单编号</th>
                <th width="5%">用户id</th> 
                <th width="10%">用户昵称</th>
                <th width="10%">用户手机</th>
                <th width="15%">用户地址</th>
                <th width="8%">订单总金额</th>
                <th width="5%">订单状态</th> 
                <th width="15%">下单时间</th>
                <th width="10%">操作</th>
            </tr>
        </thead>
    <tbody>
    <?php foreach($rows as $key=>$row):?>
        <tr align="center">
            <td><?php echo $row['order_id'];?></td> 
            <td><?php echo $row['user_id'];?></td> 
            <td><?php echo $row['user_name'];?></td>
            <td><?php echo $row['user_phone'];?></td>
            <td><?php echo $row['user_address'];?></td>
            <td><?php echo $row['order_amount'];?></td>
            <td><?php echo $row['order_status']==1?"已接":"未接";?></td>
            <td><?php echo $row['create_time'];?></td>
            <td align="center"><a class="btn btn-link"  onclick="orderDetail(<?=$row['order_id']?>)">查看详情</a>
            </td>
        </tr>
        <?php  endforeach;?> 
    </tbody>
    </table>
</div>
<script type="text/javascript">  
    function searchPhone(){
        if(event.keyCode==13){
            var val=document.getElementById("searchPhone").value;
            window.location="searchOrder_phone.php?orderPhone="+val;
        }
    } 
    function orderDetail(val){
        window.location="order_detail.php?id="+val;
    }
</script>
</body>
</html>