<?php

class Resize{

	function __construct(){
		
	}
	
	function cropImage($width2, $height2, $photo, $save, $width_true = false){				
		$height = $width2;		
		$size_image = getimagesize($photo);						
		if($size_image['1'] > $size_image['0']){
			$width = $height;
			$height = $size_image['1']/($size_image['0']/$height);			
		}else{
			$width = $size_image['0']/($size_image['1']/$height);			
		}				
		exec("convert -geometry ".$width."x".$height." ".$photo." ".$save);
		exec("convert -gravity center ".$save." -crop ".$width2."x".$height2."+0+0\! ".$save);
	}
	
	function resizeImage($height = 105, $photo, $save, $width = false){
		$size = getimagesize($photo);	
		if(!$width){
			$width = $size['0']/($size['1']/$height);
		}else{
			$width = $height;
			$height = $size['1']/($size['0']/$height);

		}
		exec("convert -geometry ".$width."x".$height." ".$photo." ".$save);
	}
	
}


?>  