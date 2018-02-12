<?php
ini_set('display_errors', 1);
error_reporting(E_ALL);

function recursive_glob($pattern){$first_files = glob($pattern, GLOB_BRACE|GLOB_ERR); foreach (glob(dirname($pattern).'/*', GLOB_BRACE|GLOB_ERR) as $dir) {$first_files = array_merge($first_files, recursive_glob($dir.'/'.basename($pattern)));} return $first_files;}

if(!empty($_GET["cam"]))
{
	$max_slideshow_pulls = 0;
	//$photos = glob(htmlspecialchars($_GET["cam"]) . "/*.{jpg,JPG,jpeg,JPEG,gif,GIF,png,PNG}", GLOB_BRACE|GLOB_ERR); //old, non-recursive
	$photos = recursive_glob(htmlspecialchars($_GET["cam"]) . "/*.{jpg,JPG,jpeg,JPEG,gif,GIF,png,PNG}");
	
	if(!empty($photos)){
		array_walk($photos, function(&$v)use($_GET){
			$date_str = preg_replace("/^(.*)\/ARC(.*)(\.)(.*)$/", "$2", $v);
			$video = intval($date_str)-1;
			$video_str = strtok(str_replace($date_str, $video, $v), ".") . ".mp4";
			$caption = date("l, m/d/Y, g:i A", strtotime($date_str)) . (file_exists($video_str)?" <a href=" . $video_str . ">Video</a>":"");
			$v = array("caption"=>$caption,"src"=>$v,"title"=>htmlspecialchars($_GET["title"]));
		});
	}
	
	echo json_encode(array_reverse($photos));
} else {echo "no camera specified.";}
?>