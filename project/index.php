<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>登陆页面</title>
    <script src="./js/jquery-3.0.0.js"></script>
    <link rel="stylesheet" href="https://cdn.bootcss.com/font-awesome/4.7.0/css/font-awesome.css">
    <link rel="stylesheet" href="./style/log.css">
</head>
<body>
<div class="back_img"></div>
<div class="block">
    <div class="block_top">
        <div class="block_top_left">
            <p class="login">快速登录</p>
        </div>
        <div class="block_top_left">
            <p class="register">快速注册</p>
        </div>
    </div>
    <div class="underline"></div>
    <div class="login_form">
        <form class="login_form_content" action="login_check.php" method="post">
            <span class="login_form_txt" style="margin-top: 10%;">用户名：</span><input class="login_form_input login_user" type="text" name="username" />
            <span class="login_form_txt">密码：</span><input class="login_form_input login_pass" type="password" name="password"/>
            <button class="login_form_button" style="margin-right: 5%;">快速登录</button>
        </form>
    </div>
    <div class="register_form">
        <form class="register_form_content" action="handle_register.php" method="post">
            <span class="register_form_txt" style="margin-top: 10%;">用户名：</span><input class="register_form_input username" type="text" name="name"/>
            <span class="register_form_txt">密码：</span><input class="register_form_input password" type="password" name="password"/>
            <div class="password_block"></div>
            <span class="register_form_txt">验证码：</span><input class="register_form_input code" type="text" style="margin-top: 3%;" name="number"/>
            <button class="register_form_button" style="margin-right: 5%;">同意并注册</button>
        </form>
    </div>
</div>
<script>
    window.onload=function() {
        var password_block=document.getElementsByClassName("password_block")[0];
        shownumber(password_block);
        password_block.onclick=function(){
            shownumber(password_block);
        }
        var register=document.getElementsByClassName("register")[0];
        var login=document.getElementsByClassName("login")[0];
        register.onclick=function(){
            var block=document.getElementsByClassName("block")[0];
            block.style.height="25rem";
            var register_form=document.getElementsByClassName("register_form")[0];
            register_form.style.display="block";
            var login_form=document.getElementsByClassName("login_form")[0];
            login_form.style.display="none";
            var underline=document.getElementsByClassName("underline")[0];
            underline.style.transform="translatex(160px)";
            login.onmouseenter=function(){
                login.style.color="black";
            }
            login.onmouseleave=function(){
                login.style.color="grey";
            }
            login.style.color="grey";
            register.style.color="black";
        }
        login.onclick=function(){
            var block=document.getElementsByClassName("block")[0];
            block.style.height="20rem";
            var register_form=document.getElementsByClassName("register_form")[0];
            register_form.style.display="none";
            var login_form=document.getElementsByClassName("login_form")[0];
            login_form.style.display="block";
            var underline=document.getElementsByClassName("underline")[0];
            underline.style.transform="translatex(0px)";
            register.style.color="grey";
            register.onmouseenter=function(){
                register.style.color="black";
            }
            register.onmouseleave=function(){
                register.style.color="grey";
            }
            register.style.color="grey";
            login.style.color="black";
        }
        $(".register_form_button").click(function(){
            var code=$(".password_block").text();
            var number=$(".code").val();
            var username=$(".username").val();
            var password=$(".password").val();
            if(username=="" || password==""){
                alert("用户名或密码不能为空！");
                $(".register_form_content").attr("action","");
            }
            if(number!=code){
                alert("验证码不正确，请重新注册！");
                $(".register_form_content").attr("action","");
                console.log(number);
                console.log(code);
            }
            else{
                $(".register_form_content").attr("action","handle_register.php");
            }
        });
        $(".login_form_content").click(function(){
            var username=$(".login_user").val();
            var password=$(".login_pass").val();
            if(username=="" || password==""){
                $(".login_form_content").attr("action","");
            }
            else{
                $(".login_form_content").attr("action","login_check.php");
            }
        });
        
}
    function shownumber(obj)
    {
        obj.innerHTML="";
        for(var i=0;i<4;i++)
        {
            var size=Math.random()*6+26;
            var color="rgba("+Math.round(Math.random()*255)+","+Math.round(Math.random()*255)+","+Math.round(Math.random()*255)+","+Math.round(Math.random()+0.85)+")";
            var numtxt=Math.floor(Math.random()*10);
            var rotate=Math.floor(Math.random()*-120)+80;
            var num="<span class='txt' style='color:"+color+"; font-size: "+size+"px;transform:rotatez("+rotate+"deg);'>"+numtxt+"</span>";
            obj.innerHTML+=num;
        }
    }
</script>
</body>
</html>