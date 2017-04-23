<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
<!-- 所有股票的实时行情 -->
<head>
    <meta charset="utf-8">
    <meta http-equiv="refresh" content="300">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1" user-scalable="no">
    <meta name="description" content="ECharts, a powerful, interactive charting and visualization library for browser">
    <link rel="shortcut icon" href="/Public/images/favicon.png">
    <link rel="stylesheet" type="text/css" href="http://apps.bdimg.com/libs/bootstrap/3.3.4/css/bootstrap.min.css">
    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries-->
    <!--[if lt IE 9]><script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script><script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script><![endif]-->
    <link rel="stylesheet" type="text/css" href="/Public/css/main.css">
    <script type="text/javascript" src="/Public/vendors/pace/pace.min.js"></script>
    <script id="font-hack" type="text/javascript">
    if (/windows/i.test(navigator.userAgent)) {
        var el = document.createElement('style');
        el.innerHTML = '' + '@font-face {font-family:"noto-thin";src:local("Microsoft Yahei");}' + '@font-face {font-family:"noto-light";src:local("Microsoft Yahei");}';
        document.head.insertBefore(el, document.getElementById('font-hack'));
    }
    </script>
    <title>Personalized Examples</title>
    <link rel="stylesheet" href="/Public/vendors/perfect-scrollbar/0.6.8/css/perfect-scrollbar.min.css">
    <script type="text/javascript" src="/Public/vendors/jquery/jquery.min.js"></script>
    <script type="text/javascript" src="/Public/css/global.css"></script>
</head>
<!--[if lte IE 8]>
<body class="lower-ie">
<![endif]-->
<!--[if (gt IE 8)|!(IE)]><body class="undefined"></body><![endif]-->
<div id="lowie-main"><img src="/Public/images/forie.png" alt="ie tip"></div>
<div id="main">
    <nav class="navbar navbar-default navbar-fixed-top">
        <div class="container-fluid">
            <div class="navbar-header">
                <button type="button" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false" class="navbar-toggle collapsed"><span class="sr-only">Toggle navigation</span><span class="icon-bar"></span><span class="icon-bar"></span><span class="icon-bar"></span></button>
                <a href="http://echarts.baidu.com/index.html" class="navbar-brand"><img src="/Public/images/logo.png" alt="echarts logo" class="navbar-logo"></a>
            </div>
            <div id="bs-example-navbar-collapse-1" class="collapse navbar-collapse">
                <ul class="nav navbar-nav navbar-right">
                    <li id="nav-index"><a href="<?php echo U('Index/index');?>">首页</a></li>  
                    <li id="nav-index"><a href="<?php echo U('Tradingdata/index');?>">大盘行情</a></li>
                    <li id="nav-index"><a href="<?php echo U('Tradingdata/realtime');?>">自选行情</a></li>  
                    <li id="nav-index"><a href="<?php echo U('Tradingdata/news');?>">新闻事件</a></li>  
                </ul>
            </div>
        </div>
    </nav>
    
    <div> <br><br><br><h3 align="center">自选实时行情</h3></div>   

     <div id="all-data" class="table-responsive">
     <table class="table table-bordered table-hover">
        <!-- <caption align="center">大盘指数</caption> -->
        <thead>
            <tr>
                <th>Code</th>
                <th>名称</th>
                <th>涨跌幅(%)</th>
                <th>昨日收盘价</th>
                <th>当前价格</th>
                <th>最高价</th>
                <th>最低价</th>
                <th>竞买价</th>
                <th>竞卖价</th>
                <th>成交量(手)</th>
                <th>成交金额(万)</th>
                 <th>时间</th>
            </tr>
        </thead>
        <tbody>
        <!-- 循环输出数据 -->
        <?php if(is_array($res['res'])): $i = 0; $__LIST__ = $res['res'];if( count($__LIST__)==0 ) : echo "$empty" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><tr>
                    <td><?php echo ($vo["code"]); ?></td>
                    <td><?php echo ($vo["name"]); ?></td>
                    <td><?php echo ($vo["ratio"]); ?></td>
                    <td><?php echo ($vo["pre_close"]); ?></td>
                    <td><?php echo ($vo["price"]); ?></td>
                    <td><?php echo ($vo["high"]); ?></td>
                    <td><?php echo ($vo["low"]); ?></td>
                    <td><?php echo ($vo["bid"]); ?></td>
                    <td><?php echo ($vo["ask"]); ?></td>
                    <td><?php echo ($vo["volume"]); ?></td>
                    <td><?php echo ($vo["amount"]); ?></td>  
                    <td><?php echo ($vo["time"]); ?></td>                 
                </tr><?php endforeach; endif; else: echo "$empty" ;endif; ?>
        </tbody>
    </table>
    </div>

    <!--分页-->
    <div id="pages" align="center">
        <?php echo ($res['page']); ?>
    </div>

</div>

        <script type="text/javascript" src="/Public/js/hm.js">
        </script>
</html>