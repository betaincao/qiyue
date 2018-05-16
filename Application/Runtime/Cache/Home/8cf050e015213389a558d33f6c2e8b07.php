<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="zh">
<head>
	<meta charset="UTF-8">
	<title>器约实验室仪器预约平台</title>
 <link rel="stylesheet" type="text/css" href="/qiyue/Public/Css/common.css" />
  <link rel="stylesheet" type="text/css" href="/qiyue/Public/Css/index.css" />
</head>
<body>
	<!-- 头部的搜索框开始 -->
	<div id="head">
     <a href="/qiyue/index.php/Home/Index/index"><img src="/qiyue/Public/Images/house.png" alt="主页" id="house" /></a>
     <p id="person-center" style="width:70%;margin:.2rem auto;text-align: center;">器约实验室仪器预约平台</p>
  </div>
	<!-- 头部的搜索框结束 -->
  

  <div id="nav">
    <img src="/qiyue/Public/Images/luWei2.jpg" width="100%" height="100%" />
    <div></div>
    <p><span>器约</span>实验室仪器预约平台</p>
  </div>

	 
   <!-- 信息展示的开始 -->
    <h4>仪器信息</h4>
    <div class="recommend" id="app">
    <?php if(is_array($Search)): foreach($Search as $key=>$vo): ?><div  class="laboratory" style="box-shadow: .02rem .02rem .02rem .02rem gray;">
	        <a href="/qiyue/index.php/Home/ApplianceInfo/ApplianceInfo/a_id/<?php echo ($vo["a_id"]); ?>/a_name/<?php echo ($vo["a_name"]); ?>/a_photo/{/qiyue/Public/Upload/<?php echo ($vo["a_photo"]); ?>}/l_name/<?php echo ($vo["l_name"]); ?>/a_num/<?php echo ($vo["a_num"]); ?>"><img src="/qiyue/Public/Upload/<?php echo ($vo["a_photo"]); ?>"  alt=""  /></a>
	        <p><?php echo ($vo["a_name"]); ?></p>
	     </div><?php endforeach; endif; ?>
    </div>
    <!-- 信息展示的结束 -->


  <!--  这里是页脚里面的部分的开始 -->
   <div style="width:100%;height:3rem;"></div>
    <table  id="footer" class="choice">
     <tr>
          <td>
          <a href="/qiyue/index.php/Home/Index/index">
          <img src="/qiyue/Public/Images/book.png"  alt="" style="background-color: #385A9A;" />
          <p>首页</p></a>
          </td>
          <td>
          <a href="/qiyue/index.php/Home/OrderForm/ViewOrderForm">
          <img src="/qiyue/Public/Images/book.png"  alt="" style="background-color: #D1473A;" />
          <p>订单</p></a>
          </td>
        <td>
        <a href="/qiyue/index.php/Home/Person/Person"><p>
          <img src="/qiyue/Public/Images/book.png"  alt="" style="background-color: #409AFA;" />
          我的</p></a>
          </td>
     </tr>
   </table>

  <!--  这里是页脚里面的部分的结束 -->
</body>
</html>