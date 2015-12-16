<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head> 
<meta http-equiv="content-type" content="text/html;charset=utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0, user-scalable=no">
<meta name="format-detection" content="telephone=no">
<meta name="renderer" content="webkit">
<meta http-equiv="Cache-Control" content="no-siteapp" />
<title>运动会管理系统</title>
	
<script src="http://lib.sinaapp.com/js/jquery/1.7.2/jquery.min.js"></script>
<script src="http://cdn.bootcss.com/zepto/1.1.4/zepto.min.js"></script>
<script src="http://cdn.amazeui.org/amazeui/1.0.1/js/amazeui.min.js"></script>
<link rel="stylesheet" href="http://cdn.amazeui.org/amazeui/1.0.1/css/amazeui.css" />

	</head>
	<body style="background: #F8F8F8">


		<div
			style="margin: auto; margin-top: 50px; width: 500px; text-align: center;">
			<div class="header">
				<h2>数据库课程设计-运动会管理系统</h2>
			</div>
			<form action="/Index/login" method="post" target="_parent" name="myform"
				onsubmit="return Checklogin();">

				<div class="am-input-group">
					<span class="am-input-group-label">
						<i class="am-icon-user"></i>
					</span>
					<input type="text" class="am-form-field" placeholder="用户名" id="username" name="username">
				
				</div>

				<div class="am-input-group">
					<span class="am-input-group-label">
						<i class="am-icon-lock" style="width: 13px;"></i>
					</span>
					<input type="password" class="am-form-field" placeholder="密码" id="password" name="password">
				
				</div>

				<div class="am-cf">
					<button id="sub" class="am-btn am-btn-primary am-btn-block">登陆</button>
				</div>



			</form>
			<div class="am-cf" id="but">
				<button id="sub" class="am-btn am-btn-default am-btn-block"
					data-am-modal="{target: '#my-modal'}">注册</button>
			</div>
			
	
			<!-- 注册模态窗口 -->
			<div class="am-modal am-modal-prompt" tabindex="-1" id="my-modal">
				<div class="am-modal-dialog">
					<div class="am-modal-hd">注册</div>
					<div class="am-modal-bd">
						<form action="/Index/reg" method="post" id="reg">
							<div class="am-input-group">
								<span class="am-input-group-label">
									<i class="am-icon-user"></i>
								</span>
								<input type="text" class="am-form-field" placeholder="用户名" name="username"  id="username" >
							</div>

							<div class="am-input-group">
								<span class="am-input-group-label">
									<i class="am-icon-lock" style="width: 13px;"></i>
								</span>
								<input type="password" class="am-form-field" placeholder="密码"
									name="password" id="password">
							</div>
							
							<div class="am-input-group">
								<span class="am-input-group-label">
									<i class="am-icon-lock" style="width: 13px;"></i>
								</span>
								<input type="password" class="am-form-field" placeholder="请重复密码"
									name="repassword" id="repassword">
							</div>
							<div class="am-cf">
								<button id="btn_reg" class="am-btn am-btn-primary am-btn-block">提交信息</button>
							</div>
						</form>
					</div>

				</div>
			</div>



</div>
	</body>
</html>