<?php
    session_start();
    foreach ($_COOKIE as $key => $value) {
        setcookie($key, null);
    }
    $time=date("Y-m-d H:i:s");
    /*$order = json_decode($_POST['orderli'],true); */ 
    $pro_id=$_COOKIE['pro_id'];
    $pro_name=$_COOKIE['pro_name'];
    $quantity=$_COOKIE['quantity'];
    $price=$_COOKIE['price'];
    $amount=$_COOKIE['amount'];
    $user=$_SESSION['user'];
    /*$length = json_decode($_POST['len'],true);*/
    for($i=0;$i<sizeof($pro_id);$i++) {
        setcookie("pro_id["+$i+"]", "", -1);
        setcookie("pro_name["+$i+"]","", -1);
        setcookie("quantity["+$i+"]","", -1);
        setcookie("price["+$i+"]","", -1);
        setcookie("amount["+$i+"]","", -1);
    }
    header('Content-Type:text/html; charset=UTF-8');
    $conn = mysqli_connect('localhost', 'root' ,'' , 'makeorder');
    if (mysqli_connect_errno() !== 0) {
        die(mysqli_connect_error());
    }
    mysqli_query($conn,"set names utf8");

    $sql="INSERT INTO orderlist(order_id, user_id, user_name, user_phone, user_address, order_amount,  order_status, create_time) VALUES(null,'".$user['id']."','".$user['name']."','".$user['phone']."','".$user['address']."','".$amount[0]."','0',now())";
    mysqli_query($conn,$sql);
    if(mysqli_errno($conn)!==0){
        die(mysqli_error($conn));
    }

    $query=mysqli_query($conn,"select order_id from orderlist where create_time=now()");
    $order_id= mysqli_fetch_assoc($query);
    for($i=0;$i<sizeof($pro_id);$i++) {
        $row="INSERT INTO order_detail(order_id, product_id, product_name, product_price, product_quantity, order_amount, product_icon, create_time) VALUES('".$order_id['order_id']."','".$pro_id[$i]."','".$pro_name[$i]."','".$price[$i]."','".$quantity[$i]."','".$amount[0]."','0',now())";
        mysqli_query($conn,$row);
        if(mysqli_errno($conn)!==0){
            die(mysqli_error($conn));
        }
    }

    $result=mysqli_query($conn,"select * from order_detail where create_time=now()");
    $searches = [];
    while($search = mysqli_fetch_assoc($result)){
        $searches[] = $search;
    }
?>
<script type="text/javascript">
window.location="orderlist.php";
</script>