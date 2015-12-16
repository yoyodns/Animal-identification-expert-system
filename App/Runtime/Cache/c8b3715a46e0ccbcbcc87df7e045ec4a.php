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
		<h2>运动会管理系统-已报项目</h2>
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
				<span class="am-modal-btn" onclick="step2()">确定</span>
			</div>
		</div>
	</div>

	<div class="am-modal am-modal-alert" tabindex="-1" id="error-repeat">
		<div class="am-modal-dialog">
			<div class="am-modal-hd">删除成功!</div>
			<div class="am-modal-footer">
				<span class="am-modal-btn" onclick="window.location.href='/Index/myinfo'">确定</span>
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

			<br>
<table class="am-table am-table-bordered">

    <thead>
        <tr>
            <th>编号</th>
            <th>项目</th>
            <th>时间</th>
            <th>操作</th>
        </tr>
    </thead>
    <tbody>
    <?php $i=1 ?>
    <?php if(is_array($info)): $i = 0; $__LIST__ = $info;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><tr>
            <td><?php echo $i ?></td>
            <td><?php echo ($vo["eventname"]); ?></td>
            <td><?php echo (date('Y-m-d',$vo["create_date"])); ?></td>
            <td><a class="am-btn am-btn-warning am-btn-xs" onclick="del(<?php echo ($vo["uid"]); ?>)">撤销报名</a></td>
        </tr><?php endforeach; endif; else: echo "" ;endif; ?>
    </tbody>

</table>

<!-- 			<form id="myform" method="post"
	class="am-form amz-mascot am-scrollspy-init am-scrollspy-inview am-animation-slide-left"
	data-am-scrollspy="{animation: 'slide-left', delay: 180}">
	
<input type="hidden" id="uid" placeholder="填写真实姓名"
			name="uid" class="am-form-field" value="<?php echo ($uid); ?>" >
			
	<div class="am-form-group" id="truenamebox">
		<label class="am-form-label" for="doc-ipt-error"> 真实姓名<sup class="am-text-danger">*</sup>： <small></small>
		</label> <input type="text" id="truename" placeholder="填写真实姓名" value="<?php echo ($info["true_name"]); ?>"
			name="truename" class="am-form-field" readonly>
	</div>

	<div class="am-form-group " id="agebox">
		<label class="am-form-label " for="name"> 年龄<sup class="am-text-danger">*</sup>： <small></small>
		</label> <input type="text" id="age" name="age" placeholder="请填写年龄" value="<?php echo ($info["age"]); ?>"
			class="am-form-field">
	</div>


	<div class="am-form-group " id="genderbox">
							<h3>性别<sup class="am-text-danger">*</sup>：</h3>
		<select id="gender" name="gender">
			<option value="<?php echo ($info["gender"]); ?>"><?php echo ($info["gender"]); ?></option>
			<option value="男">男</option>
			<option value="女">女</option>
		</select> <span class="am-form-caret"></span>
	</div>


	<div class="am-form-group " id="icnumberbox">
		<label class="am-form-label " for="name"> 身份证号<sup class="am-text-danger">*</sup>： <small></small>
		</label> <input type="text" id="icnumber" name="icnumber" value="<?php echo ($info["identity_card_number"]); ?>"
			placeholder="填写身份证号" class="am-form-field" readonly>
	</div>

	<div class="am-form-group " id="telbox">
		<label class="am-form-label" for="tel"> 手机<sup class="am-text-danger">*</sup>： <small></small>
		</label> <input type="text" id="tel" placeholder="填写手机号" name="tel" value="<?php echo ($info["tel"]); ?>"
			class="am-form-field">
	</div>

	<div class="am-form-group am-form-select" id="regtypebox">
		<label for="doc-select-1">报名<sup class="am-text-danger">*</sup>：</label> 
		<select id="regtype" name="regtype">
			<option value="<?php echo ($info["reg_type"]); ?>"><?php echo ($info["reg_type"]); ?></option>
			<option value="普通登记">普通登记</option>
			<option value="数字精品作家">数字精品作家</option>
			<option value="出版作家">出版作家</option>
			<option value="漫画作家">漫画作家</option>
			<option value="摄影艺术师">摄影艺术师</option>
			<option value="其他">其他</option>
		</select> <span class="am-form-caret"></span>
	</div>

	
	
	
	<div class="am-form-group">
		<label for="doc-ta-1">备注</label>
		<textarea class="" rows="5" id="introduction"><?php echo ($info["introduction"]); ?></textarea>
	</div>


</form>
<div class="am-cf">
	<button id="sub" class="am-btn am-btn-primary am-btn-block">修改信息</button>
</div> -->
		</div>
	</div>
	<center>
		<p>By Yangzhe</p>
	</center>
	</div>
	</div>
	
	<script>
		function del(did){
				var did = did;					
							$.ajax({
							type : "POST",
							url : "/Index/delSign",
							data : {
								did:did,
							},
							cache : false,
							dataType : 'json',
							timeout : 5000,
							success : function(data) {

								console.log(data);
								//添加html元素
								if (data['status'] == 1)
									$('#id-error').modal('open');
								if (data['status'] == 5)
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
			$('#sub').click(function() {
				
				var uid=$('#uid').val();
				var truename = $('#truename').val();
				var age = $('#age').val();
				var gender = $('#gender').val();
				var icnumber = $('#icnumber').val();
				var tel = $('#tel').val();
				var address = $('#address').val();
				var regtype = $('#regtype').val();
				var introduction = $('#introduction').val();
				if (truename == '') {
					$('#truenamebox').addClass('am-form-group am-form-error');
				
				}
				else if (age == '') {
					$('#agebox').addClass('am-form-group am-form-error');
				
				}
				else if (gender == '') {
					$('#genderbox').addClass('am-form-group am-form-error');
				
				}
				else if (icnumber == '') {
					$('#icnumberbox').addClass('am-form-group am-form-error');
				
				}
			
				else if (tel == '') {
					$('#telbox').addClass('am-form-group am-form-error');
				
				}
				else if (regtype == '') {
					$('#regtypebox').addClass('am-form-group am-form-error');
				
				}
					else {

						

						$.ajax({
							type : "POST",
							url : "/Index/edit",
							data : {
								uid:uid,
								truename:truename,
								age:age,
								gender:gender,
								icnumber:icnumber,
								tel:tel,
								address:address,
								regtype:regtype,
								introduction:introduction,
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