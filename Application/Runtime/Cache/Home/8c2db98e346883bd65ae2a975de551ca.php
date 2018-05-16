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
        <a href="/qiyue/index.php/Home/OrderForm/ViewOrderForm0/state/1"><img src="/qiyue/Public/Images/shopping.png"  alt=""  /></a>
        <p>进行中</p>
     </div>
      <div>
        <a href="/qiyue/index.php/Home/OrderForm/ViewOrderForm1/state/0"><img src="/qiyue/Public/Images/shopping.png"  alt=""  /></a>
        <p>已完成</p>
     </div>
      <div>
        <a href="/qiyue/index.php/Home/OrderForm/ViewOrderForm2/state/2"><img src="/qiyue/Public/Images/shopping.png"  alt=""  /></a>
        <p>待审批</p>
      </div>
     <div>
        <a href="/qiyue/index.php/Home/OrderForm/ViewOrderForm3/state/3"><img src="/qiyue/Public/Images/shopping.png"  alt=""  /></a>
        <p>未通过</p>
     </div>
   </div>
    <!-- 类似于选项卡的东西的结束-->

    <h5 style="margin:1rem 0 0 2rem">当前无订单！</h5>

   

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
        <a href="/qiyue/index.php/Home/Person/Person">
          <img src="/qiyue/Public/Images/book.png"  alt="" style="background-color: #409AFA;" />
          <p>我的</p></a>
          </td>
     </tr>
   </table>

  <!--  这里是页脚里面的部分的结束 -->
</body>
</html>