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
		<h2>动物识别专家系统-数据录入</h2>
	</div>



	<hr>
	<div class="am-g">
<div data-am-widget="tabs" class="am-tabs am-tabs-d2">
  <ul class="am-tabs-nav am-cf">
    <li class="am-active">
      <a href="[data-tab-panel-0]">事实管理</a>
    </li>
    <li class="">
      <a href="[data-tab-panel-1]">规则管理</a>
    </li>

  </ul>
  <div class="am-tabs-bd">
    <div data-tab-panel-0 class="am-tab-panel am-active">
	<div class="am-g" style="width:80%;margin:0 auto">
		<form id="propertyform" method="post"
				class="am-form amz-mascot am-scrollspy-init am-scrollspy-inview am-animation-slide-left"
				data-am-scrollspy="{animation: 'slide-left', delay: 180}">			
				<div class="am-form-group" id="judgementNameBox">
					<label class="am-form-label" for="doc-ipt-error">事实名称<sup class="am-text-danger">*</sup>： <small></small>
					</label> <input type="text" id="property" placeholder="请输入事实名称"
						name="property" class="am-form-field">
				</div>
		</form>
		<div class="am-cf">
			<button id="subproperty" class="am-btn am-btn-primary am-btn-block">添加事实</button>
		</div>	
		<table class="am-table">
		    <thead>
		        <tr>
		            <th>id</th>
		            <th>属性名称</th>      
		            <th>操作</th>
		        </tr>
		    </thead>
		    <tbody>
				<?php if(is_array($propertyList)): $i = 0; $__LIST__ = $propertyList;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><tr>
				        
				            <td><?php echo ($vo["id"]); ?></td>
				            <td><?php echo ($vo["name"]); ?></td>
				            <td><a class="am-btn am-btn-warning am-btn-xs">删除</a></td>

				        </tr><?php endforeach; endif; else: echo "" ;endif; ?>

		    </tbody>
		</table>



    	</div>
    	</div>
   	 	<div data-tab-panel-1 class="am-tab-panel ">
    	<div class="am-g" style="width:80%;margin:0 auto">
			<form id="rulesform" method="post"
				class="am-form amz-mascot am-scrollspy-init am-scrollspy-inview am-animation-slide-left"
				data-am-scrollspy="{animation: 'slide-left', delay: 180}">		
				<div class="am-form-group" id="judgementNameBox">
					<label class="am-form-label" for="doc-ipt-error">名称<sup class="am-text-danger">*</sup>： <small></small>
					</label> <input type="text" id="rulename" placeholder="请输入名称"
						name="rulename" class="am-form-field">
				</div>
			    <div class="am-form-group">
			      <label for="doc-select-2">属性</label>
			      <select multiple class="" id="propertys" style="height:250px">
			      <?php if(is_array($propertyList)): $i = 0; $__LIST__ = $propertyList;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$pr): $mod = ($i % 2 );++$i;?><option value="<?php echo ($pr["id"]); ?>"><?php echo ($pr["name"]); ?></option><?php endforeach; endif; else: echo "" ;endif; ?>
			      </select>
			    </div>			
			</form>
			<div class="am-cf">
				<button id="subrules" class="am-btn am-btn-primary am-btn-block">添加规则</button>
			</div>	
			<table class="am-table">
			    <thead>
			        <tr>
			            <th>id</th>
			            <th>事实</th>      
			            <th>结论</th>
			        </tr>
			    </thead>
			    <tbody>
						<?php if(is_array($rulesList)): $i = 0; $__LIST__ = $rulesList;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$ru): $mod = ($i % 2 );++$i;?><tr>
						        
						            <td><?php echo ($ru["id"]); ?></td>
						            <td><?php echo ($ru["fact"]); ?></td>
						            <td><?php echo ($ru["conclusion"]); ?></td>

						        </tr><?php endforeach; endif; else: echo "" ;endif; ?>

			    </tbody>
			</table>

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
			$('#subproperty').click(function() {			
				var property = $('#property').val();	
				if (property == '') {
					
				}else {
						$.ajax({
							type : "POST",
							url : "/Ai/addProperty",
							data : {
								property:property,
							},
							cache : false,
							dataType : 'json',
							timeout : 5000,
							success : function(data) {

								console.log(data);
								//添加html元素
								if (data == 1){
							            $.ThinkBox.success("添加成功", {

							              'delayClose' : 1800

							                  });

							            setTimeout(function(){refresh()}, 1800);
							        }
								if (data == 0){
									    $.ThinkBox.error("添加失败", {

						              'delayClose' : 1800

						                  });

						             setTimeout(function(){refresh()}, 1800);
								}
							},
							error : function() {
								alert('请求超时请稍候再试');
							},
						});

					}
				})

			});



		$(function() {
				$('#subrules').click(function() {			
				var rulename = $('#rulename').val();
				var propertys = $('#propertys').val();	
				var propertys = String(propertys);
				alert(propertys);
				if (rulename == '') {
						 $.ThinkBox.error("名称为空", {
								'delayClose' : 1800
						});

						setTimeout(function(){refresh()}, 1800);					
				}
				else if (propertys == '') {
						 $.ThinkBox.error("属性为空", {
								'delayClose' : 1800
						});

						setTimeout(function(){refresh()}, 1800);

				} else {
						$.ajax({
							type : "POST",
							url : "/Ai/addRules",
							data : {
								rulename:rulename,
								propertys:propertys,
							},
							cache : false,
							dataType : 'json',
							timeout : 5000,
							success : function(data) {

								console.log(data);
								//添加html元素
								if (data == 1){
							            $.ThinkBox.success("添加成功", {

							              'delayClose' : 1800

							                  });

							        
							        }
								if (data == 0){
									    $.ThinkBox.error("添加失败", {

						              'delayClose' : 1800

						                  });

						             setTimeout(function(){refresh()}, 1800);
								}
							},
							error : function() {


								alert('请求超时请稍候再试');
							},
						});

					}
				})

			});



	
	function refresh(){

   		 window.location.href=window.location.href;

  	}
	</script>




    <!-- ThinkBOX相关 -->
<script type="text/javascript"
   src="http://lib.sinaapp.com/js/jquery/1.7.2/jquery.min.js"></script>
<script type="text/javascript" src="/Public/static/thinkbox2/jquery.ThinkBox.js"></script>
<link rel="stylesheet" type="text/css" href="/Public/static/thinkbox2/css/ThinkBox.css">

</body>
</html>