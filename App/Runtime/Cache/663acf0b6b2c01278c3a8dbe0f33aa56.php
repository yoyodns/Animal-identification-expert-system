<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<title>动物识别专家系统</title>
<meta name="author" content="v@yangzhe.net">
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
	href="http://cdn.amazeui.org/amazeui/1.0.1/css/amazeui.css" />
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
			<a href="/index.php/Ai/index">动物识别专家系统</a>
		</h1>

		<button
			class="am-topbar-btn am-topbar-toggle am-btn am-btn-sm am-btn-success am-show-sm-only"
			data-am-collapse="{target: '#doc-topbar-collapse'}">
			<span class="am-sr-only">导航切换</span> <span class="am-icon-bars"></span>
		</button>

		<div class="am-collapse am-topbar-collapse" id="doc-topbar-collapse">
			<ul class="am-nav am-nav-pills am-topbar-nav">
				<li class="am-active"><a href="/index.php/Ai/index">动物识别</a></li>
				<li class="am-active"><a href="/index.php/Ai/addInfo">数据录入</a></li>

			</ul>





		
		</div>
	</header>


	<div class="header">
		<h2>动物识别专家系统</h2>
	</div>
	<hr>
	<div class="am-g" style="width:60%">
				<form id="propertyform" method="post"
				class="am-form amz-mascot am-scrollspy-init am-scrollspy-inview am-animation-slide-left"
				data-am-scrollspy="{animation: 'slide-left', delay: 180}">
			    <div class="am-form-group">
			      <label for="doc-select-2">事实(按住Ctrl多选)</label>
			      <select multiple class="" id="propertys" style="height:250px">
			      <?php if(is_array($propertyList)): $i = 0; $__LIST__ = $propertyList;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$pr): $mod = ($i % 2 );++$i;?><option value="<?php echo ($pr["id"]); ?>"><?php echo ($pr["name"]); ?></option><?php endforeach; endif; else: echo "" ;endif; ?>
			      </select>
			    </div>	
			    </form>
			<div class="am-cf">
				<button id="sub" class="am-btn am-btn-primary am-btn-block">开始识别</button>
			</div>
<div class="am-panel-group" id="accordion">


  <div class="am-panel am-panel-default">
    <div class="am-panel-hd">
      <h4 class="am-panel-title" data-am-collapse="{parent: '#accordion', target: '#do-not-say-3'}">规则</h4>
    </div>
    <div id="do-not-say-3" class="am-panel-collapse am-collapse">
      <div class="am-panel-bd">
      <pre>
规则1：
如果：动物有毛发
则 ：该动物是哺乳动物
规则2：
如果：动物有奶
则 ：该单位是哺乳动物
规则3:
如果：该动物有羽毛
则 ：该动物是鸟
规则4：
如果：动物会飞，且会下蛋
则 ：该动物是鸟
规则5：
如果：动物吃肉
则 ：该动物是肉食动物
规则6：
如果：动物有犬齿，且有爪，且眼盯前方
则 ：该动物是食肉动物
规则7：
如果：动物是哺乳动物，且有蹄
则 ：该动物是有蹄动物
规则8：
如果：动物是哺乳动物，且是反刍动物
则 ：该动物是有蹄动物
规则9：
如果：动物是哺乳动物，且是食肉动物，且是黄褐色的，且有暗斑点
则 ：该动物是豹
规则10：
如果：如果：动物是黄褐色的，且是哺乳动物，且是食肉，且有黑条纹
则 ：该动物是虎
规则11：
如果：动物有暗斑点，且有长腿，且有长脖子，且是有蹄类
则 ：该动物是长颈鹿
规则12：
如果：动物有黑条纹，且是有蹄类动物
则 ：该动物是斑马
规则13：
如果：动物有长腿，且有长脖子，且是黑色的，且是鸟，且不会飞
则 ：该动物是鸵鸟
规则14：
如果：动物是鸟，且不会飞，且会游泳，且是黑色的
则 ：该动物是企鹅
规则15：
如果：动物是鸟，且善飞
则 ：该动物是信天翁

</pre>
      </div>
    </div>
  </div>
</div>

	</div>

	<center>
		<p>By 杨哲 李晓蒙  姜涛</p>
	</center>
	</div>
	</div>
<script>
		$(function() {
			$('#sub').click(function() {			
				var propertys = $('#propertys').val();
				var propertys = String(propertys);	
				if (propertys == '') {
		            $.ThinkBox.error("未选择事实", {

		              'delayClose' : 1800

		                  });

		            setTimeout(function(){refresh()}, 1800);					
				}
					else {
						$.ajax({
							type : "POST",
							url : "/Ai/doRecognition ",
							data : {
								propertys:propertys,
							},
							cache : false,
							dataType : 'json',
							timeout : 5000,
							success : function(data) {

								console.log(data);
								//添加html元素
								if (data['status'] == 1){
						            $.ThinkBox.success(data['data'], {

						              'delayClose' : 1800

						                  });
								}
								if (data['status'] == 0){
						            $.ThinkBox.error(data['data'], {

						              'delayClose' : 1800

						                  });
								}
							},
							error : function() {
								alert('请求超时请稍候再试');
							},
						});

					}
				})

			});

	</script>




    <!-- ThinkBOX相关 -->
<script type="text/javascript"
   src="http://lib.sinaapp.com/js/jquery/1.7.2/jquery.min.js"></script>
<script type="text/javascript" src="/Public/static/thinkbox2/jquery.ThinkBox.js"></script>

<link rel="stylesheet" type="text/css" href="/Public/static/thinkbox2/css/ThinkBox.css">


</body>
</html>