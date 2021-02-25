<?php

	session_start();
	header("Content-type: image/png");
	$str=strtoupper(substr(md5(time()+15), 0,7));
	$_SESSION['captcha']=$str;
	$handle=imagecreate(130, 50) or die("Can't create image!!!");
	$bg_color=imagecolorallocate($handle, 200, 150, 100);
	$text_color=imagecolorallocate($handle, 0, 0, 0);
	$line_color=imagecolorallocate($handle, 0, 0, 0);
	for($i=5;$i<=150;$i=$i+20)
	{
		imageline($handle, $i, $i, 130, 50, $line_color);
	}
	imagestring($handle, 10, 10, 18, $str, $text_color);
	imagepng($handle);
?>