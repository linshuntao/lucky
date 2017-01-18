<?php
/**
 * 西藏承亿抽奖系统
 * 林少能
 * 10832126@qq.com
 */

if (isset($_GET['name'])) {
    $name = $_GET['name'];
    $name = explode('，', $name);
    foreach ($name as $key => $v) {
        $name[$key] = '"' . $v . '"';
    }
    $name = implode(',', $name);
}

?>
<!DOCTYPE html>
<html>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<title>抽奖系统</title>
	<head>
	<script id="jquery_172" type="text/javascript" class="library" src="js/jquery-1.7.2.min.js"></script>
	<script type="text/javascript">

	$(function(){
		var alldata = new Array(<?php echo $name; ?>);
		var num = alldata.length - 1;
		var show = $("#show");
		var btn = $("#btn");
		var open = false;

		function change(){
			var randomVal = Math.round(Math.random() * num);
			var prizeName = alldata[randomVal];
			show.html(prizeName);
		}

		function run(){
			if(!open){
				timer=setInterval(change,30);
				btn.removeClass('start').addClass('stop').text('停止');
				open = true;
			}else{
				clearInterval(timer);
				btn.removeClass('stop').addClass('start').text('开始抽奖');
				open = false;
			}
		}

		btn.click(function(){run();})

	})

	</script>
	<style>
	body{ background:#fff;}
	.wrap{ width:400px; margin:100px auto; font-family:"微软雅黑";}
	.show{ width:400px; height:400px; background-color:#ff3300; line-height:300px; text-align:center; color:#fff; font-size:28px; -moz-border-radius:150px; -webkit-border-radius:150px; border-radius:150px; background-image: -webkit-gradient(linear,0% 0%, 0% 100%, from(#FF9600), to(#F84000), color-stop(0.5,#fb6c00)); -moz-box-shadow:2px 2px 10px #BBBBBB; -webkit-box-shadow:2px 2px 10px #BBBBBB; box-shadow:2px 2px 10px #BBBBBB;border-radius:50%; overflow:hidden;}
	.btn a{ display:block; width:120px; height:50px; margin:30px auto; text-align:center; line-height:50px; text-decoration:none; color:#fff; -moz-border-radius:25px; -webkit-border-radius:25px; border-radius:25px;}
	.btn a.start{ background:#80b600;}
	.btn a.start:hover{ background:#75a700;}
	.btn a.stop{ background:#00a2ff;}
	.btn a.stop:hover{ background:#008bdb;}
	</style>

	</head>

	<body>
	<form>
		<table>
			<center><h2>请输入所有姓名，“，”分隔。</h2></center>

			<center>姓名：<input type="text" name="name" size="250" height="100"/></center>
			<center><input type="submit" name="submit" value="提交"/></center>
		</table>
	</form>
	<div class="wrap">
		<div class="show" id="show">点击按钮开始抽奖</div>
		<div class="btn">
			<a href="javascript:void(0)" class="start" id="btn">开始抽奖</a>
		</div>
	</div>

	</body>
</html>