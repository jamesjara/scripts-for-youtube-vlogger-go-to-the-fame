<?php
/*
 * add watermark to any youtube video.
 * @jamesjara
 *
 * */
	$ch = curl_init();
	curl_setopt($ch, CURLOPT_URL, $_GET['img']); 
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1); 
	curl_setopt($ch, CURLOPT_BINARYTRANSFER, 1); 
	$data = curl_exec($ch);
	curl_close($ch);
 
	$stamp = imagecreatefrompng('watermark'.(int)$_GET['id'].'.png');
    	$im = imagecreatefromstring($data); 

	$marge_right = 10;
	$marge_bottom = 10;
	$sx = imagesx($stamp);
	$sy = imagesy($stamp);

	if(isset($_GET['flip']))
		imageflip($im, IMG_FLIP_HORIZONTAL); 

	imagecopy($im, $stamp, imagesx($im) - $sx - $marge_right, imagesy($im) - $sy - $marge_bottom, 0, 0, imagesx($stamp), imagesy($stamp));

	header('Content-type: image/png');
	imagepng($im);
	imagedestroy($im);

 
