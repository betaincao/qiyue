<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>完善信息</title>
    <link rel="stylesheet" type="text/css" href="/qiyue/Public/Css/common.css" />

    <style>
        body{
            background-image: url("/qiyue/Public/Images/luwei2.jpg");
        }
        .content{
            margin-top: 1rem;
        }
        .content div{
            padding:0.25rem 0.15rem;
        }
        .content div label{
            display: block;
            width:4rem;
            font-size: 0.8rem;
            margin: 0.4rem 0 0.15rem 0;
        }
        .content div input[type='text']{
            width:12rem;
            margin: 0.2rem  0 0.4rem 0;
            height:1.5rem;
            font-size: 0.8rem;
            padding:0 5px 0 5px;
            border:1px solid rgba(255,255,255,0.3);
            background-color: rgba(255,255,255,0.85);
            color:black;
            border-radius: 0.3rem;
            outline: none;
            outline: none;
        }
        .content div input[type='submit']{
            width: 11.8rem;
            height:1.5rem;
            border:none;
            border-radius: 0.35rem;
            margin:1.5rem 0 1rem 1.5rem;
            background-color: rgba(113,165,242,0.7);
            color:white;
            font-size:0.8rem;
            outline: none;
        }
        .content form .alert{
            width:0.4rem;
            height:0.4rem;
            display:none;
            position: absolute;
        }
        #logo{
            height:6rem;
            text-align: center;

        }
        #form{
            width:90%;
            text-align:center;
            border-radius: 0.5rem;
            margin:0 auto;
        }/*input框前图标的样式*/
        .icon{
            width:1.4rem;
            height:1.4rem;
            margin-right: 0.1rem;
            vertical-align: middle;
        }
        /* 遮罩层的样式*/
        .black_overlay{
            display: none;
            position: absolute;
            top: 0%;
            left: 0%;
            width: 100%;
            background-color: black;
            z-index:1001;
            -moz-opacity: 0.8;
            opacity:.80;
            filter: alpha(opacity=80);
        }
        .white_content {
            display: none;
            position: absolute;
            top: 28%;
            left: 12%;
            width: 75%;
            height: 26%;
            border: 1px solid lightblue;
            border-radius: 0.35rem;
            background-color: white;
            z-index:1002;
            overflow: auto;
            padding:0.5rem;
            text-align: center;
        }
        .white_content input{
            width:45%;
            height:1.5rem;
            border-radius: 0.2rem;
            font-size: 0.8rem;
            color:white;
        }
        .white_content p{
            font-size: 0.8rem;
            margin:0.5rem 0 1.2rem 0;
        }
    </style>
    <script type="text/javascript"src="http://code.jquery.com/jquery-latest.js"></script>
</head>
<body>
<div id="logo">
    <img src="/qiyue/Public/Images/logo.png" title="logol" style="width:100%">
</div>

<div class="content">
    <div id="form">
        <form method="POST" onsubmit="return test()" action="/qiyue/index.php/home/registered/RegSuccess/id/<?php echo ($id); ?>">
            <img src="/qiyue/Public/Images/star.png" class="icon">
            <input type='text'  name = 'name' placeholder="姓名" autocomplete="off"/>
            <img src="/qiyue/Public/Images/alert.png" style="width: 1.5rem;height:1.5rem" class="alert"><br>
            <img src="/qiyue/Public/Images/star.png" class="icon">
            <input type='text'  name = 'class'  placeholder="专业班级" autocomplete="off"/>
            <img src="/qiyue/Public/Images/alert.png" style="width: 1.5rem;height:1.5rem" class="alert"><br>
            <img src="/qiyue/Public/Images/star.png" class="icon">
            <input type='text'  name = 'studentid'  placeholder="学号" autocomplete="off"/>
            <img src="/qiyue/Public/Images/alert.png" style="width: 1.5rem;height:1.5rem" class="alert"><br>
            <img src="/qiyue/Public/Images/mobile.png" class="icon">
            <input type='text'  name = 'phone'  placeholder="手机号" autocomplete="off"/>
            <img src="/qiyue/Public/Images/alert.png" style="width: 1.5rem;height:1.5rem" class="alert"><br>
           <input id="sub" type="submit" value="提交" />

            <div class="white_content" id="MyDiv">
                <h5>信息已完善</h5>
                <p>一经提交，不得修改！</p>
                <input type="button" id="btOK" style="background-color: #E6524E;border:1px solid #C1C1C1;" value="确定" onclick="CloseDiv('MyDiv','fade');">
                <input type="button" id="btBACK" style="background-color: #CCCCCC;border:1px solid #ACACAC;" value="取消" onclick="CloseDiv('MyDiv','fade')">
            </div>
        </form>
    </div>
</div>

<div class="black_overlay"  id="fade">
</div>

</body>
<script>

       function which()
        {
            var obj = event.target;
            console.log(obj);
            //var obj = document.getElementById('MyDiv').event.srcElement;
            if(obj.type == "button" && odj.id=="btOK"){
                return true; }
                else {  return false;}
        };

    function testsign() {
        var div = document.getElementsByClassName('content')[0].getElementsByTagName('div')[0];
        var form = div.getElementsByTagName('form')[0];
        var inputs = form.getElementsByTagName('input');
        var imgs = form.getElementsByTagName('img');
        var flag=1;

        for(var i=0;i<4;i++){
            if(inputs[i].value=="") {
                imgs[i].style.display="inline";
                flag=0;
            }
        }
        if(!flag) return false;
        else return true;
    }
    /*
    //弹出隐藏层
    function ShowDiv(show_div,bg_div){
        document.getElementById(show_div).style.display='block';
        document.getElementById(bg_div).style.display='block' ;
        var bgdiv = document.getElementById(bg_div);
        bgdiv.style.width = document.body.scrollWidth;
        // bgdiv.style.height = $(document).height();
        $("#"+bg_div).height($(document).height());
    };
    //关闭弹出层
    function CloseDiv(show_div,bg_div)
    {
        document.getElementById(show_div).style.display='none';
        document.getElementById(bg_div).style.display='none';
    }
    function test(){
        if(testsign()) {
            $('#sub').bind('click',ShowDiv('MyDiv','fade'));

            if(which()) {return true;}
            else return false;
        }
        return false;
    }
    */
</script>
</html>