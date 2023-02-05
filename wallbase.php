<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<title>中天留言墙</title>
		<link rel="icon" href="img/ico.png">
		<link rel="stylesheet" type="text/css" href="style.css">
	</head>
	<body>
		<!--标题-->
		<div class="header">
			<h1 style="font-size: 50px;"> 中天留言墙</h1>
			<h3>留言的墙罢...</h3>
			<p class="smg">推荐使用电脑访问</p>
			<a style="float: right;" class="able" href="./receive.php">---------------------------------->我要留言</a>
		</div>
		<!--ad-->
		<div class="ad">
			<?php
				if(file_exists("disc/ad.txt"))
				{
					$d=fopen("disc/ad.txt","r");
					$ad=fread($d,filesize("disc/ad.txt"));
					$ad=str_replace(array("\r\n","\n"),"</br>",$ad);
					echo $ad;
					fclose($d);
				}else {
					echo '<h3>文本已丢失或删除！</h3>';
				}
			?>
		</div>
		<!--主部分-->
		<div class="main">
			<?php
				$cnt=$maxcol=0;
				if(file_exists("var/config.txt")) {
					$n=fopen("var/config.txt","r");
					$cnt=(int)fgets($n);
					//当前页面控制 每一页只需更改此变量
					$now=0;
					$next_page="./wall".$now+1 .".php";
					$last_page="./wall".$now-1 .".php";
					$maxcol=(int)fgets($n);
					fclose($n);
				}else {
					echo '配置文件丢失！';
				}
			?>
			<h2 style="text-align: center;">留言</h2>
			<?php
				echo '<p style="text-align: center;">第'.$now.'页</p>';
			?>
			<div class="message">
				<?php
				if($cnt-($now-1)*$maxcol>0) {
					$end=0;
					if($cnt/$maxcol>=$now) {
						$end=$maxcol;
					}else {
						$end=$cnt%$maxcol;
					}
					for($n=0;$n<$end;$n++) {
						$nowtext=$cnt-$n-($now-1)*$maxcol;
						if(file_exists("use_text/".$nowtext.".txt")) {
							$f=fopen("use_text/".$nowtext.".txt","r");
							$time=fgets($f);
							echo '<p style="font-weight: bold;">id:'.$nowtext.'</p>';
							$t=fread($f,filesize("use_text/".$nowtext.".txt"));
							$t=str_replace(array("\r\n","\n"),"</br>",$t);
							echo $t; 
							echo '<p class="smg"">'.$time.'</p>';
							echo '</br>';
						}else {
							echo '<h3>文本已丢失或删除！</h3>';
							echo '</br>';
						}
					}
					}else {
						echo '<h1 style="text-align: center;">空空如也</h1>';
					}
				?>
			</div>
				<?php
					if($cnt/$maxcol>$now) {
						echo '<a style="float: right;" class="able" href="'.$next_page.'">下一页</a>';
					}else {
						echo '<a style="float: right;" class="disable">下一页</a>';
					}
					if($now==1) {
						echo '<a style="float: left;" class="disable">上一页</a>';
					}else {
						echo '<a style="float: left;" class="able" href="'.$last_page.'">上一页</a>';
					}
				?>
		</div>
		<div class="footer">
			<h3>by OFFLOOP</h3>
			<p>QQ：783375142 邮箱：offloop@qq.com</p>
		</div>
	</body>
</html>