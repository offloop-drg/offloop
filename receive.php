<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<title>中天留言墙---写留言</title>
		<link rel="icon" href="img/ico.png">
		<link rel="stylesheet" type="text/css" href="style.css">
	</head>
	<body>
		<div class="header">
			<h1 style="font-size: 50px;"> 中天留言墙</h1>
			<h3>留言的墙罢...</h3>
			<h2>写留言！</h2>
			<a href="./wall1.php" style="float: left;" class="able">我要返回<----------------------------------</a>
		</div>
		<div class="main">
			<div class="message">
				<h1>公告</h1>
				<?php
					if(file_exists("disc/post.txt"))
					{
						$p=fopen("disc/post.txt","r");
						$post=fread($p,filesize("disc/post.txt"));
						$post=str_replace(array("\r\n","\n"),"</br>",$post);
						echo '<h3>'.$post.'</h3>';
						fclose($p);
					}else {
						echo '<h3>文本已丢失或删除！</h3>';
					}
				?>
				<a class="able" href="./pay.php">我要赞助</a>
			</div>
		</div>
		<div class="main" style="text-align: center;">
			<h3>留言</h3>
			<p class="smg">最多700字</p>
			<p class="smg">自己放大这个框罢...</p>
			<form action="./get.php" method="POST">
				<textarea name="textinput" cols="auto" rows="auto" maxlength="700"></textarea>
				</br>
				<?php
					if(file_exists("var/cnt.txt")) {
						$cnt_file=fopen("var/cnt.txt","r");
						$cnt=fgets($cnt_file);
						fclose($cnt_file);
						if($cnt<=40) {
							echo '<input type="submit" onclick="alert("已递交！");" href="./wall1.html" name="submit" value="提交">';
						}else {
							echo '<p>输入已达上限！</p>';
						}
					}else {
						echo '配置文件丢失！';
					}
				?>
			</form>
		</div>
		<div class="footer">
			<h3>by OFFLOOP</h3>
			<p>QQ：783375142 邮箱：offloop@qq.com</p>
		</div>
	</body>
</html>