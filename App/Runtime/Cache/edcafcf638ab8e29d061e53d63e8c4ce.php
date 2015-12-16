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
		<h2>运动会管理系统-班级比赛成绩</h2>
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
				<span class="am-modal-btn" onclick="window.location.href='/Index/result'">确定</span>
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
		<div class="col-lg-6 col-md-8 col-sm-centered">
			
			    <div data-tab-panel-0 class="am-tab-panel am-active">
<table class="am-table">
    <thead>
        <tr>
            <th>排名</th>
            <th>班级</th>
            <th>成绩</th>
        </tr>
    </thead>
    <tbody>
    <?php $i=1 ?>
    	<?php if(is_array($scoreList)): $i = 0; $__LIST__ = $scoreList;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><tr>   	
            <td><?php echo $i?></td>
            <td><?php echo ($vo["classnames"]); ?></td>
            <td><?php echo ($vo["total"]); ?></td>           
        </tr><?php endforeach; endif; else: echo "" ;endif; ?>
       
    </tbody>
</table>

    </div>
		
		</div>
	</div>
	<center>
		<p>By YangZhe</p>
	</center>
	</div>
	</div>
	<script>
		function get( uid ){
			var uid = uid;					
							$.ajax({
							type : "POST",
							url : "/Index/get",
							data : {
								uid:uid,
							},
							cache : false,
							dataType : 'json',
							timeout : 5000,
							success : function(data) {

								console.log(data);
								//添加html元素
								if (data['status'] == 1)
									$('#id-error').modal('open');
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





		$(function() {
			$('#subCheckIn').click(function() {
				
				var playerid=$('#playerid').val();
				var eventid = $('#eventid').val();
				var score = $('#score').val();

				if (playerid == '') {
					$('#playerNameBox').addClass('am-form-group am-form-error');
				
				}
				else if (eventid == '') {
					$('#eventidBox').addClass('am-form-group am-form-error');
				
				}
				else if (score == '') {
					$('#scoreBox').addClass('am-form-group am-form-error');
				
				}
					else {
						$.ajax({
							type : "POST",
							url : "/Index/addScore",
							data : {
								playerid:playerid,
								eventid:eventid,
								score:score,
							},
							cache : false,
							dataType : 'json',
							timeout : 5000,
							success : function(data) {

								console.log(data);
								//添加html元素
								if (data['status'] == 1)
									$('#id-error').modal('open');
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