<?php
 session_start();
$Random = rand(10001, 99999);
$_SESSION['captcha'] = md5($Random);
$im = imagecreatetruecolor(110, 30);
imagefilledrectangle($im, 0, 0, 110, 30, imagecolorallocate($im, 450, 100, 100));
imagettftext($im, 50, 0, 15, 23, imagecolorallocate($im, 255, 255, 255), 'font.ttf', $Random );
header('Expires: Wed, 1 Jan 1997 00:00:00 GTM');
header('Last-Modified: '.gmdate('D, d M Y H:i:s').' GTM');
header('Cache-Control: post-chec=0, pre-check=0', false);
header('Pragma: no-cache');
header('Content-type: image/gif');
imagegif($im);
imagedestroy($im);
 ?>
