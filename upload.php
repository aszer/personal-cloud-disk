<?php
$newname = $_POST["filename"];
$newpath = $_POST["targetpath"];
$defaultpath="documents/uploads/";
$filename="";
$filepath="";
if($newname!==""){
	$filename=$newname;
	if(count(explode(".", $newname))>=2){
		$filename = $newname;
	}else{
		$filetype=explode(".", $_FILES["file"]["name"]);
		$num=count($filetype);
		if($num>=2){
			$filename=$newname.".".$filetype[$num-1];
		}
	}
}else{
	$filename=$_FILES["file"]["name"];
}

if($newpath!=""){
	$filepath=$newpath;
}else{
	$filepath=$defaultpath;
}

	
if ($_FILES["file"]["error"] > 0){
	//echo "错误：: " . $_FILES["file"]["error"]. "<br>";
	$error_code = $_FILES["file"]["error"];
	switch ($error_code) {
		case '1':
			echo "上传的文件超过了 php.ini 中 upload_max_filesize 选项限制的值<br>";
			break;
		case '2':
			echo "上传文件的大小超过了 HTML 表单中 MAX_FILE_SIZE 选项指定的值";
			break;
		case '3':
			echo "文件只有部分被上传";
			break;
		case '4':
			echo "没有文件被上传";
			break;
		default:
			echo "未知错误";
			break;
		
		
	}
}else{
	echo "上传文件名: " . $_FILES["file"]["name"] . "<br>";
	echo "文件类型: " . $_FILES["file"]["type"] . "<br>";
	echo "文件大小: " . ($_FILES["file"]["size"] / 1024) . " kB<br>";
	echo "文件临时存储的位置: " . $_FILES["file"]["tmp_name"] . "<br>";
	
	// 判断当期目录下的 upload 目录是否存在该文件
	// 如果没有 upload 目录，你需要创建它，upload 目录权限为 777
	if (file_exists($filepath . $filename)){
		echo $filename . " 文件已经存在。 ";
	}else{
		// 如果 upload 目录不存在该文件则将文件上传到 upload 目录下
		move_uploaded_file($_FILES["file"]["tmp_name"], $filepath . $filename);
		echo "文件存储在: " . $filepath . $filename;
	}
}


?>