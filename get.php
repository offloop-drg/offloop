<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<meta http-equiv="refresh" content="5;url=./receive.php">
		<title>get</title>
	</head>
	<body>
	<h1>冷却中...</h1>
		<?php
			ini_set('date.timezone','Asia/Shanghai');
			$text=$_POST["textinput"];
			if ($text!="") {
				if(file_exists("var/cnt.txt"))
				{
					$date=date('Y-m-d H:i:s', time());
					$cnt_file=fopen("var/cnt.txt","r");
					$cnt=fgets($cnt_file);
					$cnt+=1;
					fclose($cnt_file);
					$cnt_file=fopen("var/cnt.txt","w");
					fwrite($cnt_file,$cnt);
					fclose($cnt_file);
					$submited_file=fopen("text/".(string)$cnt.".txt","w");
					fwrite($submited_file,"time:".(string)$date."\n");
					fwrite($submited_file,$text);
					fclose($submited_file);
				}
			}else {
				echo '还没有输入！';
			}
		?>
	</body>
</html>