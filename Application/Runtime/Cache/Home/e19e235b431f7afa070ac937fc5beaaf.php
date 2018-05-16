<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="zh">

<head>
    <meta charset="UTF-8">
    <title>订单</title>
    <link rel="stylesheet" type="text/css" href="/qiyue/Public/Css/common.css" />
    <link rel="stylesheet" type="text/css" href="/qiyue/Public/Css/list.css" />
</head>

<body>
    <!-- 头部的搜索框开始 -->
    <div id="head">
        <a href="/qiyue/index.php/Home/Index/index"><img src="/qiyue/Public/Images/house.png" alt="主页" id="house" /></a>
        <p id="person-center">我的订单</p>
    </div>
    <!-- 头部的搜索框结束 -->

    <!-- 轮播图的开始 -->
    <div id="nav">
        <img src="/qiyue/Public/Images/luWei2.jpg" width="100%" height="100%" />
        <div></div>
        <p><span>器约</span>实验室仪器预约平台</p>
    </div>

    <!-- 轮播图的结束 -->

    <!-- 类似于选项卡的东西的开始 -->
    <div class="choice">
        <div>
            <a href="/qiyue/index.php/Home/OrderForm/ViewOrderForm0/state/1"><img src="/qiyue/Public/Images/shopping.png" alt="" /></a>
            <p>进行中</p>
        </div>
        <div>
            <a href="/qiyue/index.php/Home/OrderForm/ViewOrderForm1/state/0"><img src="/qiyue/Public/Images/shopping.png" alt="" /></a>
            <p>已完成</p>
        </div>
        <div>
            <a href="/qiyue/index.php/Home/OrderForm/ViewOrderForm2/state/2"><img src="/qiyue/Public/Images/shopping.png" alt="" /></a>
            <p>待审批</p>
        </div>
        <div>
            <a href="/qiyue/index.php/Home/OrderForm/ViewOrderForm3/state/3"><img src="/qiyue/Public/Images/shopping.png" alt="" /></a>
            <p>未通过</p>
        </div>
    </div>
    <!-- 类似于选项卡的东西的结束-->

    <!-- 开始信息展示 -->
    <!-- 开始信息展示 -->
    <ul id="collect">
        <?php if(is_array($OrderForm)): foreach($OrderForm as $key=>$vo): ?><li>
                <h5>编号：
                    <?php echo ($vo["a_num"]); ?>
                </h5>
                <hr/>
                <button class="button" id="button"></button>
                <a href="/qiyue/index.php/Home/ApplianceInfo/ApplianceInfo/a_id/<?php echo ($vo["a_id"]); ?>/a_name/<?php echo ($vo["a_name"]); ?>/a_photo/'/qiyue/Public/Images/book.jpg'/l_name/计算机应用技术协会/a_num/XX55-3"><img src="/qiyue/Public/Upload/<?php echo ($vo['a_photo']); ?>" /></a>
                <div class="basic">
                    <span style="display: none;"><?php echo ($vo["a_id"]); ?></span>
                    <span class="cause" style="display: none;"><?php echo ($vo["o_comment"]); ?></span>
                    <p>
                        <span class="name">仪器名称</span>
                        <span class="value"><?php echo ($vo["a_name"]); ?></span>
                    </p>
                    <p>
                        <span class="name">指导老师</span>
                        <span class="value"><?php echo ($vo["o_teacher"]); ?></span>
                    </p>
                </div>
                <div style="clear: both;"></div>
                <p class="message-end">
                    <?php echo (date('Y-m-d H:i:s' ,$vo["o_stoptime"])); ?>
                </p>
                <p class="message-start">
                    <?php echo (date('Y-m-d H:i:s' ,$vo["o_starttime"])); ?>
                </p>
                <!-- 这里是一个遮罩层 -->
                <div class="shade">
                    <p>留下您最真实的感受</p>
                    <form name="comment" data-aId="<?php echo ($vo['a_id']); ?>" data-oId="<?php echo ($vo['o_id']); ?>" method='POST'>
                        <textarea cols="4" rows="8" class="comment"></textarea>
                        <input type="button" value="下次再说" style="background-color: #FFCCCC;" class="hide" />
                        <input type="button" value="提交" class="submit" />
                    </form>
                </div>
                <script type="text/javascript">
                    var button = document.getElementsByClassName('button');
                    var causeArr = document.getElementsByClassName('cause');
                    for (var i = 0; i < causeArr.length; i++) {
                        (function(j) {
                            if (causeArr[j].innerText == '0') {
                                button[j].style.display = "none";
                            } else {
                                button[j].innerText = "评论";
                                button[j].style.display = "block";
                            }
                        })(i)
                    };

                    //这里实现的遮罩层
                    var shade = document.getElementsByClassName('shade');
                    var submit = document.getElementsByClassName('submit');
                    var hide = document.getElementsByClassName('hide');
                    for (var m = 0; m < submit.length; m++) {
                        (function(n) {
                            button[n].onclick = function() {
                                shade[n].style.display = "block";
                            }
                            hide[n].onclick = function() {
                                shade[n].style.display = "none";
                            }

                            submit[n].onclick = function() {
                                loadXMLDoc(n);
                            }
                        })(m)
                    };

                    function loadXMLDoc(m) {
                        // var event = event || window.event;
                        // event.preventDefault(); // 兼容标准浏览器
                        // window.event.returnValue = false; // 兼容IE6~8
                        var comment = document.getElementsByClassName("comment")[m];

                        var texta = document.getElementsByTagName('form')[m].getAttribute("data-aId");
                        var texto = document.getElementsByTagName('form')[m].getAttribute("data-oId");
                        console.log(texta);
                        console.log(texto);

                        var dataInfo = {
                            aid: texta,
                            oid: texto,
                            comment: comment.value,
                        }

                        var xhr;
                        if (window.XMLHttpRequest) {
                            //  IE7+, Firefox, Chrome, Opera, Safari 浏览器执行代码
                            xhr = new XMLHttpRequest();
                        } else {
                            // IE6, IE5 浏览器执行代码
                            xhr = new ActiveXObject("Microsoft.XMLHTTP");
                        }
                        console.log(dataInfo);
                        //请求头必须写在open的方法的后面
                        xhr.open("POST", "/qiyue/index.php/Home/Comment/WriteComment");
                        xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
                        xhr.send('aid=' + dataInfo.aid + '&oid=' + dataInfo.oid + '&comment=' + dataInfo.comment);
                        xhr.onreadystatechange = function() {
                            if (xhr.readyState == 4 && xhr.status == 200) {
                                if (xhr.responseText == '1') {
                                    var shade = document.getElementsByClassName('shade')[m];
                                    var button = document.getElementsByClassName('button')[m];
                                    shade.style.display = "none";
                                    button.style.display = "none";
                                    console.log('asd');
                                } else {
                                    var shade = document.getElementsByClassName('shade')[m];
                                    shade.style.display = "none";
                                    alert('额哦~出错了！');
                                }
                            }
                        }
                    };
                </script>
            </li><?php endforeach; endif; ?>
    </ul>
    <!-- 信息展示结束 -->

    <!--  这里是页脚里面的部分的开始 -->
    <div style="width:100%;height:3rem;"></div>
    <table id="footer" class="choice">
        <tr>
            <td>
                <a href="/qiyue/index.php/Home/Index/index">
                    <img src="/qiyue/Public/Images/book.png" alt="" style="background-color: #385A9A;" />
                    <p>首页</p>
                </a>
            </td>
            <td>
                <a href="/qiyue/index.php/Home/OrderForm/ViewOrderForm">
                    <img src="/qiyue/Public/Images/book.png" alt="" style="background-color: #D1473A;" />
                    <p>订单</p>
                </a>
            </td>
            <td>
                <a href="/qiyue/index.php/Home/Person/Person">
                    <img src="/qiyue/Public/Images/book.png" alt="" style="background-color: #409AFA;" />
                    <p>我的</p>
                </a>
            </td>
        </tr>
    </table>

    <!--  这里是页脚里面的部分的结束 -->
    <!-- /qiyue/index.php/Home/Comment/WriteComment/a_id/<?php echo ($vo['a_id']); ?> -->
</body>

</html>