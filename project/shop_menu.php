<?php
    session_start();
    if (!empty($_SESSION['user'])) {
        $is_login = 1;
    } else {
        $is_login = 0;
        die("请先登录！");
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

    $query="select * from product";
    $arry=mysqli_query($conn,$query);
    $searches=[];
    while ($search=mysqli_fetch_assoc($arry)) {
        $searches[]=$search;
    }
    
    $list1="select name from category order by weight desc limit 1";
    $show1=mysqli_query($conn,$list1);
    $result1=mysqli_fetch_assoc($show1);
    $list2="select * from product where category_name='".$result1['name']."'";
    $result2=mysqli_query($conn,$list2);
    $showes=[];
    while ($show=mysqli_fetch_assoc($result2)) {
        $showes[]=$show;
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
    <script src="./ajax/Ajax.js"></script>
    <script src="./ajax/Json.js"></script>
    <script src="./js/json2.js"></script>
    <title>某某餐饮有限公司</title>
</head>
<body>

<div class="content">
    <div class="content_left">
        <div class="content_left_header">
            <i class="fa fa-cutlery" style="color:white;font-size: 1.4rem;margin-left: 1.5rem;line-height: 3.5rem;margin-right: 0.3rem;"></i>
            <span class="content_title">某某餐饮有限公司</span>
        </div>
        <div class="content_leftCon">
            <div class="left_icon" style="margin-bottom: 3rem;"></div>
            <?php  foreach($rows as $key=>$row):?>
            <button class="content_button">
            <div class="content_list">
                <span class="category_index" style="display: none;"><?php echo $row['id']?></span>
                <span class="list_name"><?php echo $row['name']?></span>
            </div>
            </button>
            <?php endforeach;?>
        </div>
    </div>
    <div class="content_center">
        <div class="content_center_header">
        </div>
        <div class="content_center_content">
            <div class="center_notice">
                <span class="notice_content">公告：周一到周五午餐时间，11:00-11:30订 12：15前到~ 催单电话：13598825555</span>
            </div>
            <div class="menu_list1">
                <?php foreach($showes as $key=>$show):?>
                <div class="menu_list1_content each-<?=$show['id']?> first_view" id="<?php echo $show['id'];?>">
                    <div class="menu_list1_content_img"></div>
                    <p class="menu_list1_name"><?php echo $show['name'];?></p>
                    <p class="menu_list1_description"><?php echo $show['description'];?></p>
                    <span style="font-size: 14px;color: #F63440;line-height: 3.5rem;margin-left: 1rem;position: absolute;right: 4.5rem;bottom: -0.5rem;">￥</span><span class="menu_list1_price"><?php echo $show['price'];?></span>
                    <div class="menu_list1_addshopcar"></div>
                </div>
                <?php  endforeach;?>
                <?php foreach($searches as $key=>$search):?>
                <div class="menu_list1_content each-<?=$search['id']?>" id="<?php echo $search['id'];?>" style="display: none;">
                    <div class="menu_list1_content_img"></div>
                    <p class="menu_list1_name"><?php echo $search['name'];?></p>
                    <p class="menu_list1_description"><?php echo $search['description'];?></p>
                    <span style="font-size: 14px;color: #F63440;line-height: 3.5rem;margin-left: 1rem;position: absolute;right: 4.5rem;bottom: -0.5rem;">￥</span><span class="menu_list1_price"><?php echo $search['price'];?></span>
                    <div class="menu_list1_addshopcar"></div>
                </div>
                <?php  endforeach;?>
                
            </div>
        </div>
    </div>
    <div class="content_right">
        <div class="content_right_header">
        <?php if($is_login):?>
            <span class="right_about">欢迎您,<?=$_SESSION['user']['name']?></span>
            <a class="right_details">我的资料</a>
            <a class="logout" href="logout.php">退出登录</a>
        <?php endif?>
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
                <div class="shopcar_notempty" style="display: none;">
                </div>
            </div>
            <div class="right_content">
                <div class="amount">
                    <div class="img_box"></div>
                    <div class="empty_txt">购物车为空</div>
                    <div class="notempty_txt" style="display: none;">
                        <span class="total">总计： ￥</span>
                        <span class="total_price">0</span>
                        <button class="calculate" onclick="makeorder()">结算</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


<script type="text/javascript">
window.onload=function(){
    var data;
    var Arrays=new Array();
    

    var empty_txt=document.getElementsByClassName("empty_txt")[0];
    var notempty_txt=document.getElementsByClassName("notempty_txt")[0];
    var shopcar_empty=document.getElementsByClassName("shopcar_empty")[0];
    var shopcar_notempty=document.getElementsByClassName("shopcar_notempty")[0];

    var content_list=document.getElementsByClassName("content_list");
    for(var i=0;i<content_list.length;i++){
        content_list[0].style.backgroundColor="#F63440";
        content_list[0].style.color="white";
        content_list[i].onclick=function(){
            for(var j=0;j<content_list.length;j++){
                content_list[j].style.backgroundColor="#FAFAFA";
                content_list[j].style.color="black";
            }
            this.style.backgroundColor="#F63440";
            this.style.color="white";
        }
    }


    $(".content_list").click(function(){
        $(".first_view").remove();
        var thisID=$(this).children(".category_index").html();
        data={id:thisID};
        post_ajax("handle_menu.php", data, sucess_function);                   
        
    });


    var offset = $('.img_box').offset();  
    $(".header_submit").click(function(){
        Arrays=[];
        $(".shopcar_onelist").remove();
        $(".total_price").html("0");
        empty_txt.style.display="block";
        notempty_txt.style.display="none";
        shopcar_empty.style.display="block";
        shopcar_notempty.style.display="none";

    });
    $(document).on('click','.menu_list1_addshopcar',function(event){
        var thisItem = $(this);  
        var flyer = thisItem.clone();  
        flyer.fly({  
            start: {  
                left: event.pageX,  
                top: event.pageY  
            },  
            end: {  
                left: offset.left + 10,  
                top: offset.top + 10,  
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

    $(document).on('click','.menu_list1_addshopcar',function(){
        empty_txt.style.display="none";
        notempty_txt.style.display="block";
        shopcar_empty.style.display="none";
        shopcar_notempty.style.display="block";


        var thisID=$(this).parent(".menu_list1_content").attr("id");
        var itemname  = $(this).parent(".menu_list1_content").children(".menu_list1_name").html();
        var itemprice = $(this).parent(".menu_list1_content").children(".menu_list1_price").html();
        if(include(Arrays,thisID))
        {
            var price    = $('#each-'+thisID).children(".onelist_price").html();
            var quantity = $('#each-'+thisID).children(".num").html();

            quantity = parseInt(quantity)+parseInt(1);
            
            var total = parseFloat(itemprice)*parseFloat(quantity);
            
            
            $('#each-'+thisID).children(".onelist_price").html(total);
            $('#each-'+thisID).children(".num").html(quantity);
            
            var prev_charges = $('.total_price').html();
            prev_charges = parseFloat(prev_charges)-parseFloat(price);
            
            prev_charges = parseFloat(prev_charges)+parseFloat(total);
            $('.total_price').html(prev_charges);
            
        }
        else
        {
            Arrays.push(thisID);
            
            var prev_charges = $('.total_price').html();
            prev_charges = parseFloat(prev_charges)+parseFloat(itemprice);
            
            $('.total_price').html(prev_charges);
            
            $('.shopcar_notempty').append('<div class="shopcar_onelist" id="each-'+thisID+'" name="'+thisID+'"><span class="onelist_name">'+itemname+'</span><button class="minus">-</button><span class="num">1</span><button class="plus">+</button><span style="font-size: 14px;color: #F63440;line-height: 3.5rem;vertical-align: top;margin-left: 1rem;">￥</span><span class="onelist_price">'+itemprice+'</span></div>');           
        }
    });

    $(document).on('click','.plus',function(){
        var thisID=$(this).parent(".shopcar_onelist").attr("id");
        var txt=$('#'+thisID).children(".num").html();
        txt=parseInt(txt)+parseInt(1);
        $('#'+thisID).children(".num").html(txt);

        var list=$("."+thisID).children(".menu_list1_price").html();
        var price=$('#'+thisID).children(".onelist_price").html();
        price=parseFloat(price)+parseFloat(list);
        $('#'+thisID).children(".onelist_price").html(price);

        var prev_charges = $('.total_price').html();
        prev_charges = parseFloat(prev_charges)+parseFloat(list);
        $('.total_price').html(prev_charges);
    });

    $(document).on('click','.minus',function(){
        var thisID=$(this).parent(".shopcar_onelist").attr("id");
        var id=$("."+thisID).attr("id");
        var index=$.inArray( id, Arrays );
        var txt=$('#'+thisID).children(".num").html();
        var list=$("."+thisID).children(".menu_list1_price").html();
        var price=$('#'+thisID).children(".onelist_price").html();  
        if(txt!=1){
            txt=parseInt(txt)-parseInt(1);
        }
        else if(txt==1){
            $(this).parent(".shopcar_onelist").remove();
            Arrays.splice(index,1);
            txt=0;
        }
        $('#'+thisID).children(".num").html(txt);

        var total = parseFloat(txt)*parseFloat(list);
        $('#'+thisID).children(".onelist_price").html(total);
        var prev_charges = $('.total_price').html();
        prev_charges = parseFloat(prev_charges)-parseFloat(price);
            
        prev_charges = parseFloat(prev_charges)+parseFloat(total);
        $('.total_price').html(prev_charges);

    });

}


    function include(arr, obj) {
        for(var i=0; i<arr.length; i++) {
            if (arr[i] == obj) return true;
        }
    }
    function sucess_function(ret){
        ret=JSON.parse(ret);
        $(".menu_list1_content").css('display','none');
        for(var i=0;i<getJsonLength(ret);i++){
            $("#"+ret[i].id).css('display','inline-block');
            
        }
        
    }
    function makeorder(){   
        var formData=new FormData();
        var orderlist={};
        window.location="add_mess.php";
        var shopcar_onelist=document.getElementsByClassName("shopcar_onelist");
        var id=[];
        for (var i = 0; i < shopcar_onelist.length; i++) {
            id[i]=shopcar_onelist[i].getAttribute('name');
        }
        var onelist_name=document.getElementsByClassName("onelist_name");
        var num=document.getElementsByClassName("num");
        var onelist_price=document.getElementsByClassName("onelist_price");
        var total_price=document.getElementsByClassName("total_price")[0];
        for(var i=0;i<shopcar_onelist.length;i++){
            var formdata=new FormData();
            formdata.append('pro_id',id[i]);
            formdata.append('pro_name',onelist_name[i].innerHTML);
            formdata.append('quantity',num[i].innerHTML);
            formdata.append('price',onelist_price[i].innerHTML);
            formdata.append('amount',total_price.innerHTML);
            // formData.append(str(i),formdata);
            formData.append("str",formdata);    
        }
        console.log(formData);
        get_ajax("order.php",formData, false);
    }
</script>
</body>
</html>