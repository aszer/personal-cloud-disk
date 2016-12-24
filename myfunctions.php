<!DOCTYPE html>
<html>
<body>

<?php

/***********************通用函数和类begin*************************************/
class GetFileType
{
	private static $typelist=array();
	private static $checkclass=null;

	function __construct()
	{
		# code...
		self::$typelist=self::_getTypeList();
	}
	private function _getTypeList(){
		return array(//在此添加新文件类型
				array(2669,"mkv"),
				array(8273,"avi"),
				array(0,"mp4"),
				array(7368,"mp3"),
				array(13780,"png"),
				array(255216,"jpg"),
				array(3780,"pdf"),
				array(6033,"php")
			);
	}
	private function _getFileType($filepath){
		if(!($f=@fopen($filepath,'rb'))) return 'error';
		$fbin=fread($f,2);
		fclose($f);
		$str_info=@unpack("C2chars",$fbin);
		$type_code = intval($str_info['chars1'].$str_info['chars2']);
		//echo $type_code;//用来添加新类型时输出typecode
		foreach (self::$typelist as $v) {
			if($v[0]==$type_code)
				return $v[1];
		}
		return "other";

	}
	public static function getFileType($filepath){
		if(!self::$checkclass)
			$checkclass=new self();
			return $checkclass->_getFileType($filepath);
	}
}

//函数区begin
function getFileSize($size){ 
	//转换文件大小成对应的单位
	if($size<0){ //32位php　integer 大于1GB多会溢出
		return ">1GB";
	}
	if($size>=1073741824){
		return (round($size/1073741824*100)/100).' gb';
	}elseif($size>=1048576){
		return (round($size/1048576*100)/100).' mb';
	}elseif($size>=1024){
		return (round($size/1024*100)/100).' kb';
	}else{
		return $size.' b';
	}
}


function getPrePath($currentpath){
	//求出上一个文件夹的路径
	$dirarray=explode("/",$currentpath);
	$num=count($dirarray);
	$prepath="";
	if($num>2){//当$num==2时说明是'/',即根目录
		for($i=0;$i<$num-2;$i++){
			$prepath=$prepath.$dirarray[$i]."/";
		}
		//echo $prepath;
		return $prepath;
	}
	return "/";
}

function getRelativePath($realPath){
	//return $realPath;
	$webpath="/var/www/html";
	$array=explode($webpath,$realPath);
	$num=count($array);
	if($num>1){
		return $array[$num-1];
	}
	return "";
}

function openMethod($dir,$filepath,$type){
	$relativepath=getRelativePath($dir.$filepath);
	//相对路径里面已经包含了文件的路径以及文件名
	//echo $relativepath;
	//是不是图片
	if($type=="png"||$type=="jpg"){
		return "<a  onclick='showPic(".'"'.$relativepath.'"'.");return false;' href='#' >".$filepath."</a>";
		//return $relativepath;
	}
	//是不是音频
	if($type=="mp3"){
		//return "<a href='showPic.html?path=".$filepath."'>".$filepath."</a>";
		return "<a  onclick='playAudio(".'"'.$relativepath.'"'.','.'"'.$filepath.'"'.");return false;' href='#' >".$filepath."</a>";
	}
	if($type=="pdf"){
		return "<a href='".$relativepath."' target='_blank'>".$filepath."</a>";
	}
	if($type=="mkv"||$type=="mp4"){
		return "<a href='".$relativepath."'>".$filepath."</a>";
	}else{
		return "<a href='".$relativepath."' target='_blank'>".$filepath."</a>";
	}
}
/*************************通用函数和类end***************************************************/



/************bycatagory.php自定义类begin***********************************************/
function catagory($type){
	if($type=="png"||$type=="jpg"){
		return "image";
	}
	//是不是音频
	if($type=="mp3"){
		return "audio";
	}
	if($type=="mkv"||$type=="mp4"||$type=="avi"){
		return "video";
	}
	return "";
}
function openByCatagory($dir,$filepath,$catagory){
	$relativepath=getRelativePath($dir.$filepath);
	//相对路径里面已经包含了文件的路径以及文件名
	//echo $relativepath;
	//是不是图片
	if($catagory=="image"){
		return "<a  onclick='showPic(".'"'.$relativepath.'"'.");return false;' href='#' >".$filepath."</a>";
		//return $relativepath;
	}
	//是不是音频
	if($catagory=="audio"){
		//return "<a href='showPic.html?path=".$filepath."'>".$filepath."</a>";
		return "<a  onclick='playAudio(".'"'.$relativepath.'"'.','.'"'.$filepath.'"'.");return false;' href='#' >".$filepath."</a>";
	}
	if($catagory=="video"){
		return "<a href='".$relativepath."'>".$filepath."</a>";
	}
}
/************bycatagory.php自定义类end**********************************************************/


/********************************变量定义begin*****************************************/
$defaultpath="/var/www/html/";	//index.php bycatagory.php search.php 默认起始路径
/********************************变量定义end*****************************************/


?>
</body>
</html>