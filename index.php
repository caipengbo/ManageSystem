<?php
	//防止非法未登陆进入
	session_start();//必须启动session
	if (!isset($_SESSION['username'])) {
		header("Location: login.html"); 
		exit;
	}
	?>
	<!DOCTYPE html>
	<html>
	<head>
		<title>烟酒店管理系统主页面</title>
		<meta charset="utf-8">
		<link rel="stylesheet" type="text/css" href="css/easyui.css">
		<link rel="stylesheet" type="text/css" href="css/icon.css">
		<link rel="stylesheet" type="text/css" href="css/app.css">
		<link rel="stylesheet" type="text/css" href="css/sweetalert2.min.css">
		<link rel="shortcut icon" href="images/ico.png" type="image/x-icon">
		<script src="js/jquery.min.js" type="text/javascript"></script>
		<script src="js/jquery.easyui.min.js" type="text/javascript"></script>
		<script type="text/javascript" src="js/sweetalert2.min.js"></script>
		<script type="text/javascript" src="login/js/md5.js"></script>
	</head>
	<body class="easyui-layout panel-noscroll">
		<!-- 顶部 -->
		<div data-options="region:'north',border:false" style="height:60px;background:#B3DFDA;padding:10px">
			<span class="fontlogo">华名烟酒店销售系统</span>
			<div style="float:right;margin-top:10px">
				<span id="clock" style="font-size:1.5em"></span>
				<span style="font-size:1.5em"><?php 
					if ($_SESSION['flag']==1) {
						echo "店长";
					} else
						echo "店员";
				?>
				</span>
				<a href="javascript:void(0)" class="easyui-menubutton" data-options="menu:'#user_setting'">
				<span id="login_user" style="font-size:1.5em"></span></a>
				<div id="user_setting">
					<div><a href="javascript:openInfoDialog()">个人设置</a></div>
					<div><a href="javascript:exitSystem()">退出</a></div>
				</div>
				<!-- 修改个人信息对话框 -->
				<div id="modify_info_dialog" class="easyui-dialog" closed="true"   buttons="#dlg-buttons" style="width:400px;height:298px;padding-left:30px;padding-right:30px;padding-top:10px">
					<form id="private_modify_form" method="post" action="./controller/private_modify.php">
						<div>
							<input class="easyui-textbox" name="username" label="用户名" style="width:75%;" data-options="disabled:true">
							<input id="username_hidden" type="hidden" name="username">
						</div>
						<div>
							<input class="easyui-textbox" label="姓名" name="name" style="width:75%;">
						</div>
						<div>
							<input id="old_password" class="easyui-passwordbox" label="原密码" prompt="旧密码" iconWidth="28" style="width:75%;">
						</div>
						<div>
							<input id="new_password" class="easyui-passwordbox" label="新密码" prompt="新密码" iconWidth="28" style="width:75%;">
						</div>
						<div>
							<input id="repeat_password" name="newpsw" class="easyui-passwordbox" label="重复密码" prompt="重复新密码" iconWidth="28" validType="confirmPass['#new_password']" style="width:75%;">
						</div>
					</form>
					<div id="dlg-buttons">
						<a href="#" class="easyui-linkbutton" iconCls="icon-ok" onclick="submitForm()">修改</a>
						<a href="#" class="easyui-linkbutton" iconCls="icon-cancel" onclick="javascript:$('#modify_info_dialog').dialog('close')">取消</a>
					</div>
				</div><!-- 修改个人信息对话框结束 -->
			</div>
		</div>
		<!-- 左侧手风琴 -->
		<div data-options="region:'west',split:true,title:'功能菜单'" style="width:18%;padding:0px;overflow:hidden">
			<div id="left_accordion" class="easyui-accordion" style="width:100%;height: 100%;padding:0">
				<div title="商品管理" data-options="iconCls:'icon-production'" style="padding:0px;">
					<li><a href="javascript:addTab('商品信息录入','commodity_input.html')">商品信息录入</a></li>
					<li><a href="javascript:addTab('商品信息更改','commodity_modify.html')">商品信息更改</a></li>
					<li><a href="javascript:addTab('进货入库','stock_input.html')">进货入库</a></li>
					<li><a href="javascript:addTab('商品损耗','commodity_destroy.html')">商品损耗</a></li>
				</div>
				<div title="销售管理" data-options="iconCls:'icon-sale'" style="padding:0px;">
					<li><a href="javascript:addTab('销售信息录入','sale_input.html')">销售信息录入</a></li>
					<li><a href="javascript:addTab('退货','sale_return.html')">退货</a></li>
				</div>
				<div title="信息查询" data-options="iconCls:'icon-search'" style="padding:0px;">
					<li><a href="javascript:addTab('商品信息查询','commodity_search.html')">商品信息查询</a></li>
					<li><a href="javascript:addTab('销售清单','salelist_search.html')">销售清单查询</a></li>
					<li><a href="javascript:addTab('商品损耗查询','commoditydestroy_search.html')">商品损耗查询</a></li>
					<li><a href="javascript:addTab('销售额查询','saleroom_search.html')">销售额查询</a></li>
				</div>
				<div title="统计" data-options="iconCls:'icon-large-chart'" style="padding:0px;">
					<li><a href="javascript:addTab('年销售统计','years_statistic.html')">年销售统计</a></li>
					<li><a href="javascript:addTab('月销售统计','monthly_statistic.html')">月销售统计</a></li>
					<li><a href="javascript:addTab('日销售统计','daily_statistic.html')">日销售统计</a></li>
				</div>
				<div title="账目管理" data-options="iconCls:'icon-accounts'" style="padding:0px;">
					<li><a href="javascript:addTab('账目管理','account_manage.html')">账目管理</a></li>
					<li><a href="javascript:addTab('账目查看','account_view.html')">账目查看</a></li>
				</div>
				<div title="用户管理" data-options="iconCls:'icon-setting'"">
					<li><a href="javascript:addTab('个人设置','private_setting.html')">个人设置</a></li>
					<li><a href="javascript:addTab('店员管理','employee_manage.html')">店员管理</a></li>
				</div>
			</div>
		</div>

		<!-- 中部主视图 -->
		<div data-options="region:'center',border:false" style="height:50px;background:#A9FACD;padding:0px;">
			<div id="main-view" class="easyui-tabs" style="width:100%;height:100%;">
				<div title="主页">
					<iframe scrolling="auto" frameborder="0"  src="home.html" style="width:100%;height:100%;"></iframe>
				</div>
			</div>
		</div>
		<!-- 页脚底部 -->
		<div data-options="region:'south',border:false" style="height:30px;background:#A9FACD;padding:2px;text-align:center;font-size:12px;overflow:hidden">
			Copyright © 2014 - 2018 All Rights Reserved<br>CaiPengbo Database project
		</div>
		<script>
		//获取session信息
		var loginuser; //登录的用户
		$(document).ready(function(){
			$.ajax({
				url:"controller/get_session_info.php",
				dataType: "json",
				success:function(data){
					loginuser = data;
					$("#login_user").text(loginuser.name);
					}
			});
		});
		//在主视图中添加标签
		function addTab(title, url){
			if (loginuser.flag!=1 && (title == "商品信息录入"||title =="商品信息更改"||title =="进货入库"||title =="商品损耗"||title =="账目管理"||title =="店员管理")) {
				swal("对不起,权限不足","","error");
				return false;
			}
			if ($('#main-view').tabs('exists', title)){
				$('#main-view').tabs('select', title);
			} else {
				var content = '<iframe scrolling="auto" frameborder="0"  src="'+url+'" style="width:100%;height:100%;"></iframe>';
				$('#main-view').tabs('add',{
					title:title,
					content:content,
					closable:true,
				});
			}
		}
		// 实时刷新时间
		setInterval("setClock()",1000);
		function setClock(){
			var curTime = new Date();
			$("#clock").html(curTime.toLocaleString());
		}
		//打开修改个人信息对话框
		var oldPassword = "";
		function openInfoDialog(){
			$('#modify_info_dialog').dialog({
				onClose:function(){
					clearForm();
				}
			});
			$('#modify_info_dialog').dialog('open').dialog('setTitle','个人设置');
			$('#private_modify_form').form('load',loginuser);
			oldPassword = loginuser.password;
			$('#username_hidden').val(loginuser.username);
		}
		// 重复输入密码，验证
		$.extend($.fn.validatebox.defaults.rules, {
			confirmPass: {
				validator: function(value, param){
					var pass = $(param[0]).passwordbox('getValue');
					return value == pass;
				},
				message: '密码不一致'
			}
		});
		//个人设置表单（和private_setting.html功能一样）
		function submitForm(){
			$('#private_modify_form').form('submit',{
				onSubmit:function(){
					if (oldPassword !=  hex_md5($('#old_password').passwordbox('getValue'))) {
						alert("原密码错误");
						clearForm();
						return false;
					}
					if ($('#new_password').passwordbox('getValue') != $('#repeat_password').passwordbox('getValue')) {
						alert("两次密码不一致!");
						clearForm();
						return false;
					}
					return true;
				},
				success:function(data){
					var dataobj = eval('('+ data +')');
					if (dataobj.return_num == 1) {
						//更新loginuser对象
						loginuser.name = dataobj.new_name;
						loginuser.password = dataobj.newpsw;
						oldPassword = dataobj.newpsw;
						//更新右上角名字
						$("#login_user").text(loginuser.name);
						$('#modify_info_dialog').dialog('close');
						swal('已修改!','','success');
					} else {
						swal('发生未知的错误!','','error');
					}
				}
			});
		}
		function clearForm(){
			$('#old_password').passwordbox('clear');
			$('#new_password').passwordbox('clear');
			$('#repeat_password').passwordbox('clear');
		}
		//退出系统
		function exitSystem(){
			//使用 sweetalert2 弹框插件
			swal({
				title: '确定退出？',
				type: 'warning',
				showCancelButton: true,
				confirmButtonColor: '#3085d6',
				cancelButtonColor: '#d33',
				cancelButtonText: '取消',
				confirmButtonText: '退出'
			}).then(function() {
				$.post("./controller/exit_system.php",function(result){
					if (result == 2) {
						location.href = "login.html";
					}
					else {
						swal('退出失败!','','error');
					}
				});
			});
		}
	</script>
</body>
</html>