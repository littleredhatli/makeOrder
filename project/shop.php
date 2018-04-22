<?php
session_start();
if (!empty($_SESSION['user'])) {
    $is_login = 1;
} else {
    $is_login = 0;
}
    header('Content-Type:text/html; charset=UTF-8');
    $conn = mysqli_connect('localhost', 'root' ,'' , 'makeorder');
    if (mysqli_connect_errno() !== 0) {
        die(mysqli_connect_error());
    }
    mysqli_query($conn,"set names utf8");

    $sql="select * from category order by weight desc";
    $result=mysqli_query($conn,$sql);
    $rows=[];
    while ($row=mysqli_fetch_assoc($result)) {
        $rows[]=$row;
    }

    $query1="select name from category order by weight desc limit 1";
    $arry1=mysqli_query($conn,$query1);
    $result1=mysqli_fetch_assoc($arry1);
    $query2="select * from product where category_name='".$result1['name']."'";
    $arry2=mysqli_query($conn,$query2);
    $searches=[];
    while ($search=mysqli_fetch_assoc($arry2)) {
        $searches[]=$search;
    }
    
?>
<!DOCTYPE html>
<html>
<head lang="en">
    <meta charset="UTF-8">
    <link rel="stylesheet" href="./style/shop.css">
    <link rel="stylesheet" href="https://cdn.bootcss.com/font-awesome/4.7.0/css/font-awesome.css">
    <script src="./js/jquery-3.0.0.js"></script>
    <script src="./js/jquery.fly.min.js"></script>
    <script src="./js/script.js"></script>
    <title>某某餐饮有限公司</title>
</head>
<body>
<div class="header"></div>
<div class="content">
    <div class="content_left">
        <div class="content_left_header">
            <i class="fa fa-cutlery" style="color:white;font-size: 1.4rem;margin-left: 1.5rem;line-height: 3.5rem;margin-right: 0.3rem;"></i>
            <span class="content_title">某某餐饮有限公司</span>
        </div>
        <div class="content_leftCon">
            <div class="left_icon" style="margin-bottom: 3rem;"></div>
            <?php  foreach($rows as $key=>$row):?>
            <!-- <div class="content_list" id="hot" style="background-color: #F63440;color: white;margin-top: 3rem;">
                <span class="hot">素菜类</span>
            </div> -->
            <button class="content_button" onclick="showMenu(<?php echo $row['id'];?>)"><div class="content_list">
                <span class="list_name"><?php echo $row['name']?></span>
            </div></button>
            <?php endforeach;?>
            <!-- <div class="content_list" id="noodle">
                <span class="noodle">面食类</span>
            </div>
            <div class="content_list" id="drink">
                <span class="drink">饮品</span>
            </div> -->
        </div>
    </div>
    <div class="content_center">
        <div class="content_center_header">
            <div class="search">
                <input type="text" class="search_block" placeholder="想吃点什么  ..."/>
                <button class="search_button"><i class="fa fa-search" style="position: absolute;color:#FA9FA6;font-size: 1.2rem;left:12rem;z-index: 1;top:1.1rem;"></i></button>
            </div>
        </div>
        <div class="content_center_content">
            <div class="center_notice">
                <span class="notice_content">公告：周一到周五午餐时间，11:00-11:30订 12：15前到~ 催单电话：13598825555</span>
            </div>
            <div class="menu_list1">
            <?php foreach($searches as $key=>$search):?>
                <div class="menu_list1_content">
                    <div class="menu_list1_content_img"></div>
                    <p class="menu_list1_name"><?php echo $search['name'];?></p>
                    <p class="menu_list1_description"><?php echo $search['description'];?></p>
                    <span style="font-size: 14px;color: #F63440;line-height: 3.5rem;margin-left: 1rem;position: absolute;right: 4.5rem;bottom: -0.5rem;">￥</span><span class="menu_list1_price"><?php echo $search['price'];?></span>
                    <div class="menu_list1_addshopcar"></div>
                </div>
            <?php  endforeach;?>
                <!-- <div class="menu_list1_content">
                    <div class="menu_list1_content_img"></div>
                    <p class="menu_list1_name">蚂蚁上树</p>
                    <p class="menu_list1_description">粉丝200g,猪肉馅50克。</p>
                    <span style="font-size: 14px;color: #F63440;line-height: 3.5rem;margin-left: 1rem;position: absolute;right: 4.5rem;bottom: -0.5rem;">￥</span><span class="menu_list1_price">13</span>
                    <div class="menu_list1_addshopcar"></div>
                </div>
                <div class="menu_list1_content">
                    <div class="menu_list1_content_img"></div>
                    <p class="menu_list1_name">蚂蚁上树</p>
                    <p class="menu_list1_description">粉丝200g,猪肉馅50克。</p>
                    <span style="font-size: 14px;color: #F63440;line-height: 3.5rem;margin-left: 1rem;position: absolute;right: 4.5rem;bottom: -0.5rem;">￥</span><span class="menu_list1_price">13</span>
                    <div class="menu_list1_addshopcar"></div>
                </div>
                <div class="menu_list1_content">
                    <div class="menu_list1_content_img"></div>
                    <p class="menu_list1_name">蚂蚁上树</p>
                    <p class="menu_list1_description">粉丝200g,猪肉馅50克。</p>
                    <span style="font-size: 14px;color: #F63440;line-height: 3.5rem;margin-left: 1rem;position: absolute;right: 4.5rem;bottom: -0.5rem;">￥</span><span class="menu_list1_price">13</span>
                    <div class="menu_list1_addshopcar"></div>
                </div>
                <div class="menu_list1_content">
                    <div class="menu_list1_content_img"></div>
                    <p class="menu_list1_name">蚂蚁上树</p>
                    <p class="menu_list1_description">粉丝200g,猪肉馅50克。</p>
                    <span style="font-size: 14px;color: #F63440;line-height: 3.5rem;margin-left: 1rem;position: absolute;right: 4.5rem;bottom: -0.5rem;">￥</span><span class="menu_list1_price">13</span>
                    <div class="menu_list1_addshopcar"></div>
                </div>
                <div class="menu_list1_content">
                    <div class="menu_list1_content_img"></div>
                    <p class="menu_list1_name">蚂蚁上树</p>
                    <p class="menu_list1_description">粉丝200g,猪肉馅50克。</p>
                    <span style="font-size: 14px;color: #F63440;line-height: 3.5rem;margin-left: 1rem;position: absolute;right: 4.5rem;bottom: -0.5rem;">￥</span><span class="menu_list1_price">13</span>
                    <div class="menu_list1_addshopcar"></div>
                </div>
                <div class="menu_list1_content">
                    <div class="menu_list1_content_img"></div>
                    <p class="menu_list1_name">蚂蚁上树</p>
                    <p class="menu_list1_description">粉丝200g,猪肉馅50克。</p>
                    <span style="font-size: 14px;color: #F63440;line-height: 3.5rem;margin-left: 1rem;position: absolute;right: 4.5rem;bottom: -0.5rem;">￥</span><span class="menu_list1_price">13</span>
                    <div class="menu_list1_addshopcar"></div>
                </div>
                <div class="menu_list1_content">
                    <div class="menu_list1_content_img"></div>
                    <p class="menu_list1_name">蚂蚁上树</p>
                    <p class="menu_list1_description">粉丝200g,猪肉馅50克。</p>
                    <span style="font-size: 14px;color: #F63440;line-height: 3.5rem;margin-left: 1rem;position: absolute;right: 4.5rem;bottom: -0.5rem;">￥</span><span class="menu_list1_price">13</span>
                    <div class="menu_list1_addshopcar"></div>
                </div> -->
            </div>
        </div>
    </div>
    <div class="content_right">
        <div class="content_right_header">
        <?php if($is_login):?>
            <span class="right_about">欢迎您,<?=$_SESSION['user']['name']?></a>
        <?php endif?>
            <a class="right_details" href="login.php">我的资料</a>
            <a class="logout" href="logout.php">退出登录</a>
        </div>
        <div class="content_right_content">
            <div class="right_header">
                <span class="header_content">购物车</span>
                <button class="header_submit"><span class="header_submit_txt">[清空]</span></button>
            </div>
            <div class="shopcar_list">
                <div class="shopcar_empty">
                    <div class="shopcar_empty_img"></div>
                    <p class="shopcar_empty_txt">购物车空空如也</p>
                </div>
                <div class="shopcar_notempty">
                    <div class="shopcar_onelist">
                        <span class="onelist_name">宫保鸡丁宫保鸡丁宫保鸡丁宫保鸡丁宫保鸡丁</span>
                        <button class="minus">-</button>
                        <input type="text" class="num" readonly value="1">
                        <button class="plus">+</button>
                        <span style="font-size: 14px;color: #F63440;line-height: 3.5rem;vertical-align: top;margin-left: 1rem;">￥</span><span class="onelist_price">13</span>
                    </div>
                </div>
            </div>
            <div class="right_content">
                <div class="amount">
                    <div class="img_box"></div>
                    <div class="empty_txt">购物车为空</div>
                    <div class="notempty_txt">
                        <span class="total">总计： ￥</span>
                        <span class="total_price">13</span>
                        <button class="calculate">结算</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script type="text/javascript">
    window.onload=function(){
        var list_name=document.getElementsByClassName("list_name")[0];
        console.log(list_name.innerText);



        var content_list=document.getElementsByClassName("content_list");
    content_list[0].style.backgroundColor="#F63440";
    content_list[0].style.color="white";
    for(var i=0;i<content_list.length;i++){
        content_list[i].index=i;
        content_list[i].onclick=function(){
            for(var j=0;j<content_list.length;j++){
                content_list[j].style.backgroundColor="#FAFAFA";
                content_list[j].style.color="black";
            }
            this.style.backgroundColor="#F63440";
            this.style.color="white";
        }
    }


        var offset = $('.img_box').offset();  
$('.menu_list1_addshopcar').click(function (event) {  
    var thisItem = $(this);  
    var flyer = thisItem.clone();  
    flyer.fly({  
        start: {  
            left: event.pageX,  
            top: event.pageY  
        },  
        end: {  
            left: offset.left + 20,  
            top: offset.top - 10,  
            width: 0, 
            height: 0  
        },  
        onEnd: function () {  
            $('.img_box').css({  
                /*background: 'red' */ 
            });  
            setTimeout(function () {  
                $('.img_box').css({  
                    /*background: 'blue'*/  
                });  
            }, 200);  
            this.destory();  
        }  
    });  
});  
}


    function showMenu(id){
        window.location="shop_menu.php?id="+id;
        
    }
</script>
</body>
</html>