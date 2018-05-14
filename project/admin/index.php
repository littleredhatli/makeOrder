<?php 
session_start();
$user=$_SESSION['user'];
?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="https://cdn.bootcss.com/font-awesome/4.7.0/css/font-awesome.css">
    <link rel="stylesheet" href="style/index.css">
    <script src="scripts/jquery-1.8.3.js"></script>
    <script src="scripts/backstage.js"></script>
    <title>Document</title>
</head>
<script>
</script>
<body>
<div class="header">
    <i class="fa fa-cutlery" style="vertical-align:middle;color:white;font-size: 1.6rem;margin-left: 1.5rem;line-height: 4rem;margin-right: 0.3rem;"></i>
    <span class="header_title">某某餐饮有限公司</span>
    <div class="header_a">
        <span class="welcome">欢迎您<span class="manager_name" style="margin-left: 0.5rem;"><?=$user['name']?></span></span>
        <a class="website" href="../shop_menu.php">预览前台</a>
        <a class="logout" href="../logout.php">退出登录</a>
    </div>
</div>
<div class="content">
    <!--左侧列表-->
    <div class="menu">
        <ul class="mList">
            <li>
                <div class="menu-item-title" onclick="show('menu1','change1')"><span  id="change1" class="menu-item-icon ico-close"></span>
                    <span class="menu-item-name">商品管理</span>
                </div>
                <dl id="menu1" style="display:none;">
                    <dd><a href="addPro.php" target="mainFrame">添加商品</a></dd>
                    <dd><a href="listPro.php" target="mainFrame">商品列表</a></dd>
                </dl>
            </li>
            <li>
                <div class="menu-item-title" onclick="show('menu2','change2')"><span  id="change2" class="menu-item-icon ico-close"></span>
                    <span class="menu-item-name">分类管理</span>
                </div>
                <dl id="menu2" style="display:none;">
                    <dd><a href="addCate.php" target="mainFrame">添加分类</a></dd>
                    <dd><a href="listCate.php" target="mainFrame">分类列表</a></dd>
                </dl>
            </li>
            <li>
                <div class="menu-item-title" onclick="show('menu3','change3')"><span  id="change3" class="menu-item-icon ico-close"></span>
                    <span class="menu-item-name">订单管理</span>
                </div>
                <dl id="menu3" style="display:none;">
                    <dd><a href="listOrder.php" target="mainFrame">订单列表</a></dd>
                    <dd><a href="searchOrder.php" target="mainFrame">订单查询</a></dd>
                </dl>
            </li>
            <li>
                <div class="menu-item-title" onclick="show('menu4','change4')"><span  id="change4" class="menu-item-icon ico-close"></span>
                    <span class="menu-item-name">用户管理</span>
                </div>
                <dl id="menu4" style="display:none;">
                    <dd><a href="listUser.php" target="mainFrame">用户列表</a></dd>
                </dl>
            </li>
            <li>
                <div class="menu-item-title" onclick="show('menu5','change5')"><span  id="change5" class="menu-item-icon ico-close"></span>
                    <span class="menu-item-name">管理员管理</span>
                </div>
                <dl id="menu5" style="display:none;">
                    <dd><a href="listManager.php" target="mainFrame">我的资料</a></dd>
                    <!-- <dd><a href="listAdmin.php" target="mainFrame">修改个人资料</a></dd> -->
                </dl>
            </li>
            <!--<li>
                <div class="menu-item-title" onclick="show('menu6','change6')"><span  id="change6" class="menu-item-icon ico-close"></span>
                    <span class="menu-item-name">接单管理</span>
                </div>
                <dl id="menu6" style="display:none;">
                    <dd><a href="addAdmin.php" target="mainFrame">我的资料</a></dd>
                    <dd><a href="listAdmin.php" target="mainFrame">修改个人资料</a></dd>
                </dl>
            </li>-->
        </ul>
    </div>
    <div class="main">
        <!--右侧内容-->
        <div class="cont">
            <!-- 嵌套网页开始 -->
            <iframe src="main.php"  frameborder="0" name="mainFrame" width="100%" height="100%" scrolling="yes"></iframe>
            <!-- 嵌套网页结束 -->
        </div>
    </div>
</div>
</body>
</html>