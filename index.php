<!DOCTYPE html>
<html>
<head>
	<title>烟酒店管理系统主页面</title>
	<meta charset="utf-8">
	<link rel="stylesheet" type="text/css" href="css/easyui.css">
	<link rel="stylesheet" type="text/css" href="css/icon.css">
	<link rel="stylesheet" type="text/css" href="css/app.css">
	<link rel="shortcut icon" href="images/ico.png" type="image/x-icon">
	<script src="js/jquery.min.js" type="text/javascript" ></script>
	<script src="js/jquery.easyui.min.js" type="text/javascript"></script>
	<script>
		//在主视图中添加标签
		function addTab(title, url){
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
		// 显示时间
		setInterval("setClock()",1000);
		function setClock(){
			var curTime = new Date();
   		    $("#clock").html(curTime.toLocaleString());
		}
		//
		function openInfoDialog(){
				$('#modify_info_dialog').dialog('open');
		}
		function openPswDialog(){
				$('#modify_psw_dialog').dialog('open');
		}
	</script>
</head>
<body class="easyui-layout panel-noscroll">
	<!-- 顶部 -->
	<div data-options="region:'north',border:false" style="height:60px;background:#B3DFDA;padding:10px">
		<span class="fontlogo">华名烟酒店</span>
		<div style="float:right">
			<span id="clock"></span>，您好，店长： 
			<a href="javascript:void(0)" class="easyui-menubutton" data-options="menu:'#user_setting'">
			蔡鹏博</a>
				<div id="user_setting">
					<div><a href="javascript:openInfoDialog()">个人设置</a></div>
					<div><a href="javascript:void(0)">退出</a></div>
				</div>
					<div id="modify_info_dialog" class="easyui-dialog" closed="true" style="width:200px;height:150px">修改个人信息</div>
					<div id="modify_psw_dialog" class="easyui-dialog" closed="true" style="width:200px;height:150px">修改密码</div>
					
		</div>
	</div>
	<!-- 左侧手风琴 -->
	<div data-options="region:'west',split:true,title:'功能菜单'" style="width:18%;padding:0px;overflow:hidden">
		<div class="easyui-accordion" style="width:100%;height: 100%;padding:0">
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
				<li><a href="javascript:addTab('所有用户','allusers_setting.html')">所有用户</a></li>
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
	<div data-options="region:'south',border:false" style="height:40px;background:#A9FACD;padding:4px;text-align:center;font-size:13px;">
	Copyright © 2014 - 2018 All Rights Reserved<br>CaiPengbo Database project
	</div>

</body>
</html>