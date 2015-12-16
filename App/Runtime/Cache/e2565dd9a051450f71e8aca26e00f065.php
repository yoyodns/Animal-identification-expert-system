<?php if (!defined('THINK_PATH')) exit();?>
<!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<title>磁盘调度算法</title>
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport"
	content="width=device-width, initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0, user-scalable=no">
<meta name="format-detection" content="telephone=no">
<meta name="renderer" content="webkit">
<meta http-equiv="Cache-Control" content="no-siteapp" />
<script src="http://lib.sinaapp.com/js/jquery/1.9.1/jquery-1.9.1.min.js"></script>
<script src="http://cdn.amazeui.org/amazeui/2.4.0/js/amazeui.js"></script>
<script src="http://cdn.amazeui.org/amazeui/2.4.0/js/amazeui.legacy.min.js"></script>

<script src="http://cdn.amazeui.org/amazeui/2.4.0/js/amazeui.widgets.helper.js"></script>
<link rel="stylesheet"
	href="http://cdn.amazeui.org/amazeui/2.4.2/css/amazeui.min.css" />
<link rel="shortcut icon" href="/Public/logo.png">
<style>
.logo {
	width: 45px;
	height: 45px;
}

.header {
	text-align: center;
}

.header h1 {
	color: #333;
	margin-top: 30px;
}

.hengxian {
	color: #222;
}

.header p {
	font-size: 22px;
}
</style>
</head>

<body>
	<header class="am-topbar">
		<h1 class="am-topbar-brand">
			<a href="/">磁盘调度算法</a>
		</h1>
	</header>


	<div class="header">
		<h2>磁盘调度算法</h2>
	</div>
	<div class="am-g">
  <div class="am-u-md-8 am-u-sm-centered">
    <form class="am-form" method="get" action="/index.php/Index/os/">
      <fieldset class="am-form-set">
        <input type="text" id="test" name="test" placeholder="请输入待测试的数组，以英文逗号隔开,如55,58,39,18,90,160,150,38,184">
        <input type="text" id="start" name="start" placeholder="输入起始磁道号，如100">
      </fieldset>
      <button type="submit" class="am-btn am-btn-primary am-btn-block">计算</button>
    </form>
  </div>
</div>



	<hr>
	<div class="am-g">
<div data-am-widget="tabs" class="am-tabs am-tabs-d2">
  <ul class="am-tabs-nav am-cf">
    <li class="am-active">
      <a href="[data-tab-panel-0]">先来先服务算法（FCFS）</a>
    </li>
    <li class="">
      <a href="[data-tab-panel-1]">最短寻道时间优先算法（SSTF）</a>
    </li>
    <li class="">
      <a href="[data-tab-panel-2]">扫描算法（SCAN）</a>
    </li>

    <li class="">
      <a href="[data-tab-panel-3]">循环扫描算法（CSCAN）</a>
    </li>

    <li class="">
      <a href="[data-tab-panel-4]">综合比较</a>
    </li>
  </ul>
  <div class="am-tabs-bd">
    <div data-tab-panel-0 class="am-tab-panel am-active">
	<div class="am-g">
		<div class="col-lg-6 col-md-8 col-sm-centered" style="width:80%">
			<a type="button" class="am-btn am-btn-default">请求顺序</a>
			<?php if(is_array($fcfs)): $i = 0; $__LIST__ = $fcfs;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><a type="button" class="am-btn am-btn-primary"><?php echo ($vo); ?></a>
			&nbsp;<?php endforeach; endif; else: echo "" ;endif; ?>
			<br>
			<br>
			<a type="button" class="am-btn am-btn-default">起始磁道</a>
			<a type="button" class="am-btn am-btn-success"><?php echo ($start); ?></a>
			<br>
			<br>
			<a type="button" class="am-btn am-btn-default">访问顺序</a>
			<?php if(is_array($fcfs)): $i = 0; $__LIST__ = $fcfs;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><a type="button" class="am-btn am-btn-primary"><?php echo ($vo); ?></a>
			&nbsp;<?php endforeach; endif; else: echo "" ;endif; ?>
			<br>
			<br>
			<a type="button" class="am-btn am-btn-default">寻道长度</a>
			<a type="button" class="am-btn am-btn-success"><?php echo ($length); ?></a>
			<br>
			<br>
			<a type="button" class="am-btn am-btn-default">平均长度</a>
			<a type="button" class="am-btn am-btn-warning"><?php echo ($ave); ?></a>

		</div>
	</div>



    	</div>
<!-- ################################################ -->
    <div data-tab-panel-1 class="am-tab-panel ">
	    	<div class="am-g">
		<div class="col-lg-6 col-md-8 col-sm-centered" style="width:80%">
			<a type="button" class="am-btn am-btn-default">请求顺序</a>
			<?php if(is_array($fcfs)): $i = 0; $__LIST__ = $fcfs;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><a type="button" class="am-btn am-btn-primary"><?php echo ($vo); ?></a>
			&nbsp;<?php endforeach; endif; else: echo "" ;endif; ?>
			<br>
			<br>
			<a type="button" class="am-btn am-btn-default">起始磁道</a>
			<a type="button" class="am-btn am-btn-success"><?php echo ($start); ?></a>
			<br>
			<br>
			<a type="button" class="am-btn am-btn-default">访问顺序</a>
			<?php if(is_array($sstf)): $i = 0; $__LIST__ = $sstf;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><a type="button" class="am-btn am-btn-primary"><?php echo ($vo); ?></a>
			&nbsp;<?php endforeach; endif; else: echo "" ;endif; ?>
			<br>
			<br>
			<a type="button" class="am-btn am-btn-default">寻道长度</a>
			<a type="button" class="am-btn am-btn-success"><?php echo ($length2); ?></a>
			<br>
			<br>
			<a type="button" class="am-btn am-btn-default">平均长度</a>
			<a type="button" class="am-btn am-btn-warning"><?php echo ($ave2); ?></a>

		</div>
		</div>	
    </div>
<!-- ############################################# -->
 	 <div data-tab-panel-2 class="am-tab-panel ">
    	<div class="am-g">
		<div class="col-lg-6 col-md-8 col-sm-centered" style="width:80%">
			<a type="button" class="am-btn am-btn-default">请求顺序</a>
			<?php if(is_array($fcfs)): $i = 0; $__LIST__ = $fcfs;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><a type="button" class="am-btn am-btn-primary"><?php echo ($vo); ?></a>
			&nbsp;<?php endforeach; endif; else: echo "" ;endif; ?>
			<br>
			<br>
			<a type="button" class="am-btn am-btn-default">起始磁道</a>
			<a type="button" class="am-btn am-btn-success"><?php echo ($start); ?></a>
			<br>
			<br>
			<a type="button" class="am-btn am-btn-default">向磁道增加方向移动</a>
			<a type="button" class="am-btn am-btn-default">访问顺序</a>
			<?php if(is_array($scan)): $i = 0; $__LIST__ = $scan;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><a type="button" class="am-btn am-btn-primary"><?php echo ($vo); ?></a>
			&nbsp;<?php endforeach; endif; else: echo "" ;endif; ?>
			<br>
			<br>
			<a type="button" class="am-btn am-btn-default">寻道长度</a>
			<a type="button" class="am-btn am-btn-success"><?php echo ($length3); ?></a>
			<br>
			<br>
			<a type="button" class="am-btn am-btn-default">平均长度</a>
			<a type="button" class="am-btn am-btn-warning"><?php echo ($ave3); ?></a>

		</div>

		<div class="col-lg-6 col-md-8 col-sm-centered" style="width:80%">
			<br>
			<br>
			<a type="button" class="am-btn am-btn-default">向磁道减少方向移动</a>
			<a type="button" class="am-btn am-btn-default">访问顺序</a>
			<?php if(is_array($scan2)): $i = 0; $__LIST__ = $scan2;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><a type="button" class="am-btn am-btn-primary"><?php echo ($vo); ?></a>
			&nbsp;<?php endforeach; endif; else: echo "" ;endif; ?>
			<br>
			<br>
			<a type="button" class="am-btn am-btn-default">寻道长度</a>
			<a type="button" class="am-btn am-btn-success"><?php echo ($length32); ?></a>
			<br>
			<br>
			<a type="button" class="am-btn am-btn-default">平均长度</a>
			<a type="button" class="am-btn am-btn-warning"><?php echo ($ave32); ?></a>

		</div>
	</div>
 	 </div>
<!-- ############################################# -->
 	 	 <div data-tab-panel-3 class="am-tab-panel ">
    	<div class="am-g">
		<div class="col-lg-6 col-md-8 col-sm-centered" style="width:80%">
			<a type="button" class="am-btn am-btn-default">请求顺序</a>
			<?php if(is_array($fcfs)): $i = 0; $__LIST__ = $fcfs;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><a type="button" class="am-btn am-btn-primary"><?php echo ($vo); ?></a>
			&nbsp;<?php endforeach; endif; else: echo "" ;endif; ?>
			<br>
			<br>
			<a type="button" class="am-btn am-btn-default">起始磁道</a>
			<a type="button" class="am-btn am-btn-success"><?php echo ($start); ?></a>
			<br>
			<br>
			<a type="button" class="am-btn am-btn-default">向磁道增加方向移动</a>
			<a type="button" class="am-btn am-btn-default">访问顺序</a>
			<?php if(is_array($cscan)): $i = 0; $__LIST__ = $cscan;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><a type="button" class="am-btn am-btn-primary"><?php echo ($vo); ?></a>
			&nbsp;<?php endforeach; endif; else: echo "" ;endif; ?>
			<br>
			<br>
			<a type="button" class="am-btn am-btn-default">寻道长度</a>
			<a type="button" class="am-btn am-btn-success"><?php echo ($length4); ?></a>
			<br>
			<br>
			<a type="button" class="am-btn am-btn-default">平均长度</a>
			<a type="button" class="am-btn am-btn-warning"><?php echo ($ave4); ?></a>
		</div>

		<div class="col-lg-6 col-md-8 col-sm-centered" style="width:80%">
			<br>
			<br>
			<a type="button" class="am-btn am-btn-default">向磁道减少方向移动</a>
			<a type="button" class="am-btn am-btn-default">访问顺序</a>
			<?php if(is_array($cscan2)): $i = 0; $__LIST__ = $cscan2;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><a type="button" class="am-btn am-btn-primary"><?php echo ($vo); ?></a>
			&nbsp;<?php endforeach; endif; else: echo "" ;endif; ?>
			<br>
			<br>
			<a type="button" class="am-btn am-btn-default">寻道长度</a>
			<a type="button" class="am-btn am-btn-success"><?php echo ($length42); ?></a>
			<br>
			<br>
			<a type="button" class="am-btn am-btn-default">平均长度</a>
			<a type="button" class="am-btn am-btn-warning"><?php echo ($ave42); ?></a>

		</div>
		</div>
 	 	 </div>

<!-- ############################################# -->
 	 	 <div data-tab-panel-3 class="am-tab-panel ">
				<?php if(is_array($analyse)): $i = 0; $__LIST__ = $analyse;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><div style="background:#4aaa4a;width:<?php echo ($vo["times"]); ?>%;color:white;height:35px;line-height:35px;">&nbsp;&nbsp;&nbsp;<?php echo ($vo["method"]); ?>---<?php echo ($vo["time"]); ?>s</div>
					</br><?php endforeach; endif; else: echo "" ;endif; ?>
		
 	 	 </div>
</div>
</div>
	</div>
	<center>
		<p>By YangZhe</p>
	</center>
	</div>
	</div>
</body>
</html>