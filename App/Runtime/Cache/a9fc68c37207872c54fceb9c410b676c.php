<?php if (!defined('THINK_PATH')) exit();?>
<!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<title>运动会管理系统</title>
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
			<a href="/">运动会管理系统</a>
		</h1>

		<button
			class="am-topbar-btn am-topbar-toggle am-btn am-btn-sm am-btn-success am-show-sm-only"
			data-am-collapse="{target: '#doc-topbar-collapse'}">
			<span class="am-sr-only">导航切换</span> <span class="am-icon-bars"></span>
		</button>

		<div class="am-collapse am-topbar-collapse" id="doc-topbar-collapse">
			<ul class="am-nav am-nav-pills am-topbar-nav">
			<?php if($group == 2): ?><li class="am-active"><a href="/index.php/Index/signUp">运动员报名</a></li>
				
				<li class="am-active"><a href="/index.php/Index/myinfo">已报项目</a></li><?php endif; ?>
			<?php if($group == 3): ?><li class="am-active"><a href="/index.php/Index/checkIn">比赛检录</a></li><?php endif; ?>
				<li class="am-active"><a href="/index.php/Index/result">个人比赛成绩</a></li>
				<li class="am-active"><a href="/index.php/Index/classResult">班级比赛成绩</a></li>
			<?php if($group == 1): ?><li class="am-active"><a href="/index.php/Index/userInfo">运动员信息查询</a></li>
				<li class="am-active"><a href="/index.php/Index/system">系统维护</a></li><?php endif; ?>

			</ul>

		  <div class="am-topbar-right">
		      <div class="am-dropdown" data-am-dropdown="{boundary: '.am-topbar'}">
		       	<?php if($group == 1): ?><button class="am-btn am-btn-danger am-topbar-btn am-btn-sm">管理员</button><?php endif; ?>
				<?php if($group == 2): ?><button class="am-btn am-btn-danger am-topbar-btn am-btn-sm">运动员</button><?php endif; ?>
				<?php if($group == 3): ?><button class="am-btn am-btn-danger am-topbar-btn am-btn-sm>裁判员</button><?php endif; ?>

		        <button class="am-btn am-btn-secondary am-topbar-btn am-btn-sm am-dropdown-toggle" data-am-dropdown-toggle>
		        <?php echo ($name); ?>,欢迎您 <span class="am-icon-caret-down"></span></button>
		        <ul class="am-dropdown-content">
		          <li><a href="/Index/logout">退出</a></li>
		        </ul>
		      </div>
		    </div>



			<div class="am-topbar-right">
				<button class="am-btn am-btn-primary am-topbar-btn am-btn-sm"
					onclick="window.open('/', '_blank')">返回</button>
			</div>

		</div>
	</header>


	<div class="header">
		<h2>运动会管理系统-运动员信息</h2>
	</div>
	<div id="model" class="am-modal am-modal-loading am-modal-no-btn"
		tabindex="-1" id="my-modal-loading">
		<div class="am-modal-dialog">
			<div class="am-modal-hd">提交中...</div>
			<div class="am-modal-bd"></div>
		</div>
	</div>
	<div class="am-modal am-modal-alert" tabindex="-1" id="success">
		<div class="am-modal-dialog">
			<div class="am-modal-hd">信息登记成功,正在跳转..</div>
			<div class="am-modal-footer">
				<span class="am-modal-btn" onclick="window.location.href='/Index/system'">确定</span>
			</div>
		</div>
	</div>

	<div class="am-modal am-modal-alert" tabindex="-1" id="error-repeat">
		<div class="am-modal-dialog">
			<div class="am-modal-hd">您已经提交过信息了,请勿重复提交！</div>
			<div class="am-modal-footer">
				<span class="am-modal-btn">确定</span>
			</div>
		</div>
	</div>
	<div class="am-modal am-modal-alert" tabindex="-1" id="error-empty">
		<div class="am-modal-dialog">
			<div class="am-modal-hd">您填写的信息不完善，请补充填写！</div>
			<div class="am-modal-footer">
				<span class="am-modal-btn">确定</span>
			</div>
		</div>
	</div>


	<hr>
	<div class="am-g">
<div data-am-widget="tabs" class="am-tabs am-tabs-d2">
  <ul class="am-tabs-nav am-cf">
    <li class="am-active">
      <a href="[data-tab-panel-0]">所有报名信息</a>
    </li>
    <li class="">
      <a href="[data-tab-panel-1]">符合条件的运动员</a>
    </li>

  </ul>
  <div class="am-tabs-bd">
    <div data-tab-panel-0 class="am-tab-panel am-active">
	<div class="am-g">
			<table class="am-table">
    <thead>
        <tr>
            <th>姓名</th>
            <th>班级</th>
            <th>性别</th>
            <th>已报名项目</th>
            <th>性别限制</th>
            <th>报名时间</th>

        </tr>
    </thead>   
    <tbody>
    <?php if(is_array($userList)): $i = 0; $__LIST__ = $userList;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><tr>
            <td><?php echo ($vo["true_name"]); ?></td>
            <td><?php echo ($vo["classnames"]); ?></td>
            <td><?php echo ($vo["sexname"]); ?></td>
            <td><?php echo ($vo["eventname"]); ?></td>
            <td><?php echo ($vo["sexLimitName"]); ?></td>    
            <td><?php echo (date('Y-m-d H:i:s',$vo["create_date"])); ?></td>   
         
        </tr><?php endforeach; endif; else: echo "" ;endif; ?>

    </tbody>
</table>


	</div>



    	</div>
    <div
    data-tab-panel-1 class="am-tab-panel ">
<div>
				<table class="am-table">
    <thead>
        <tr>
            <th>编号</th>       	
            <th>姓名</th>
            <th>班级</th>
            <th>性别</th>
            <th>已报名项目</th>
            <th>性别限制</th>
         	
        </tr>
    </thead>   
    <tbody>
    <?php  $i=1; ?>
       <?php if(is_array($userLists)): $i = 0; $__LIST__ = $userLists;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><tr>
            <td><?php echo $i;$i+1?></td>
            <td><?php echo ($vo["name"]); ?></td>
            <td><?php echo ($vo["classname"]); ?></td>
            <td><?php echo ($vo["sexname"]); ?></td>
            <td><?php echo ($vo["eventname"]); ?></td>
            <td><?php echo ($vo["sexLimitName"]); ?></td>       
         
        </tr><?php endforeach; endif; else: echo "" ;endif; ?>

    </tbody>
</table>
</div>
    </div>

</div>
</div>
	</div>
	<center>
		<p>By YangZhe</p>
	</center>
	</div>
	</div>
<script>
		$(function() {
			$('#subEvent').click(function() {
				
				var eventName = $('#eventName').val();
				var noLimit = $('#noLimit').val();
				var sexLimit = $('#sexLimit').val();
				
				if (eventName == '') {
					$('#eventNameBox').addClass('am-form-group am-form-error');
				
				}
				else if (noLimit == '') {
					$('#noLimitBox').addClass('am-form-group am-form-error');
				
				}
				else if (sexLimit == '') {
					$('#sexLimitBox').addClass('am-form-group am-form-error');
				
				}
					else {

						

						$.ajax({
							type : "POST",
							url : "/Index/addEvent",
							data : {
								eventName:eventName,
								noLimit:noLimit,
								sexLimit:sexLimit,
							},
							cache : false,
							dataType : 'json',
							timeout : 5000,
							success : function(data) {

								console.log(data);
								//添加html元素
								if (data['status'] == 1)
									alert('成功');
								if (data['status'] == 2)
									$('#error-repeat').modal('open');
								if (data['status'] == 3) {
									$('#success').modal('open');
								}
								if (data['status'] == 4) {
									$('#penname-error').modal('open');
								}
							},
							error : function() {
								setTimeout(function() {
									$('#model').modal('close');
								}, 2000);

								alert('请求超时请稍候再试');
							},
						});

					}
				})
			});
	
	</script>
</body>
</html>