<!DOCTYPE html>
<html>
<body>
<?php
$type=$_GET["type"];
$path=$_GET["path"];

if(is_dir($path."/")){

	$dirs[]=$path."/";//把搜索根目录存进数组
	$num=1;
	$newadd=0;
	for($i=0;$i<$num;$i++){
		//echo $dir;
		$dir=$dirs[$i];
		$handle=opendir($dir);
		while(false!=($file=readdir($handle))){
			if($file=='.'||$file=='..'||substr($file,0,1)=='.')
				continue;
			if(is_dir($dir.$file)){
				$dirs[]=$dir.$file."/";
				$newadd++;
			}else{
					unlink($dir.$file);
						
					
				}

		}//主程序while循环的右括号,主程序end
		$num=$num+$newadd;
		$newadd=0;
		closedir($handle);
	}
}else{
	unlink($path);
}
?>
</body>
</html>