<?php
    function resizeImageToWidthJPGPNG($maxDim, $fileInput, $uploadDir){
		$fileTemp = $fileInput['tmp_name'];
		$fileName = $fileInput['name'];
		$uploadFilePath = $uploadDir.$fileName;
		$image_info = getimagesize($fileTemp);
		$imgType = $fileInput['type'];
		if ($image_info[0] > $maxDim) {
			$ratio = $image_info[0]/$image_info[1];
			if ($ratio > 1) {
				$new_width = $maxDim;
		        $new_height = $maxDim/$ratio;
			} else {
				$new_width = $maxDim*$ratio;
		        $new_height = $maxDim;
		}
		if(move_uploaded_file($fileTemp, $uploadFilePath)){
			if ($imgType == 'image/jpeg') {
				$ext = pathinfo($fileInput['name'], PATHINFO_EXTENSION);
				$newFileName = substr(bin2hex($fileInput['name']), 6).mt_rand().substr(bin2hex($fileInput['name']), -6).".".$ext;
				$image = imagecreatefromjpeg($uploadFilePath);
				$img = imagescale($image, $new_width, $new_height, IMG_BILINEAR_FIXED);
				$im = imagejpeg($img, $uploadDir.$newFileName);
				unlink($uploadDir.$fileName);
				return $newFileName;
			} else if ($imgType == 'image/png') {
				$ext = pathinfo($fileInput['name'], PATHINFO_EXTENSION);
				$newFileName = substr(bin2hex($fileInput['name']), 6).mt_rand().substr(bin2hex($fileInput['name']), -6).".".$ext;
				$image = imagecreatefrompng($uploadFilePath);
				$img = imagescale($image, $new_width, $new_height, IMG_BILINEAR_FIXED);
				$im = imagepng($img, $uploadDir.$newFileName);
				unlink($uploadDir.$fileName);
				return $newFileName;
			} else {
				return false;
			}
		} else {
			return false;
			}
		} else {
			$ext = pathinfo($fileInput['name'], PATHINFO_EXTENSION);
			$newFileName = mt_rand().".".$ext;
			move_uploaded_file($fileTemp, $uploadDir.$newFileName);
			return $newFileName;
		}
    }
?>