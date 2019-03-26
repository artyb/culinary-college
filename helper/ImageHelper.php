<?php

namespace app\helper;

use Yii;


class ImageHelper
{
	public function checkextension($extension)
	{
		if($extension=='jpeg' || $extension=='png')
			return true;
		else
			return false;
	}

	public function resize($path,$extension)
	{
		list($width,$height) = getimagesize($path);
		$newwidth = $width;
		$newheight = $height;
		if($extension=='jpeg'){
			$flag=true;
			$newfile = imagecreatefromjpeg($path);
		}else{
			$flag=false;
			$newfile = imagecreatefrompng($path);
		}
		$thumb = 'images/companylogo.'. $extension;
		$truecolor = imagecreatetruecolor($newwidth, $newheight);	
		imagecopyresampled($truecolor, $newfile, 0, 0, 0, 0, $newwidth, $newheight, $width, $height);
		if($flag){
			imagejpeg($truecolor,$thumb,60);
		}else{
			imagepng($truecolor,$thumb,60);
		}
		unlink($path);
		return $thumb;
	}

	public function imageresize($path,$extension,$location,$counter,$name)
	{
		list($width,$height) = getimagesize($path);
		$newwidth = $width;
		$newheight = $height;
		$newfile = imagecreatefromjpeg($path);
		$thumb = $location.$name.$counter.time().'.'. $extension;
		$truecolor = imagecreatetruecolor($newwidth, $newheight);	
		imagecopyresampled($truecolor, $newfile, 0, 0, 0, 0, $newwidth, $newheight, $width, $height);
		imagejpeg($truecolor,$thumb,60);
		unlink($path);
		return $thumb;
	}
}