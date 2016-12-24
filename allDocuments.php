<!DOCTYPE html>
<html>
<head>
   <meta charset="utf-8"> 
   <title>my cloud disk</title>
   <link rel="stylesheet" href="https://cdn.static.runoob.com/libs/bootstrap/3.3.7/css/bootstrap.min.css">  
   <script src="https://cdn.static.runoob.com/libs/jquery/2.1.1/jquery.min.js"></script>
   <script src="https://cdn.static.runoob.com/libs/bootstrap/3.3.7/js/bootstrap.min.js"></script>


</head>
<body>
<?php
//引入函数
include 'myfunctions.php';


//主程序begin						
$dir=$_GET["dir"];
$prepath=getPrePath($dir);
?>

<div data-spy="scroll" data-target="#navbar-example" data-offset="0"
     style="height:540px;overflow:auto; position: relative;" class="table-responsive" >
	<p>
		<?php
			echo "<a  onclick='allDocuments(".'"'.$prepath.'"'.");return false;' href='#' >predir</a>";
		?>
		current file path: <?php echo $dir;?>
	</p>
	<table class="table table-hover" id="mytable">
		<thead>
			<tr>
				<th>file type</th>
				<th>file name</th>
				<th>file size</th>
				<th>modification date</th>
				<th id="alltds"><a onclick="select();return false" href="#" id="flag">select all</a></th>
			</tr>
		</thead>
		<tbody>

		<?php   //主程序
		$size='';
		$type='';
		$modifytime='';
		$dirs=scandir($dir);
		foreach ($dirs as $file) {
			if($file=='.'||$file=='..'||substr($file,0,1)=='.')
				continue;
			if(is_dir($dir.$file)){
				$type='dir';
				$size='--';
				$modifytime='--';
			}else{
				$type=GetFileType::getFileType($dir.$file);
				$size=getFileSize(filesize($dir.$file));
				$modifytime=date('Y-m-d h:i',filemtime($dir.$file));   
			}						
		?>
			<tr>
				<?php echo "<td title='".$type."'>";?>
					<?php echo $type;?>
					
				</td>

				<?php echo "<td title='".$dir.$file."'>";?>
					<?php 
						
						if($type=='dir'){
							echo "<a  onclick='allDocuments(".'"'.$dir.$file.'/"'.");return false;' href='#' >".$file."</a>";

						}else{
							echo openMethod($dir,$file,$type);
						}
						
					?>
				</td>

				<td>
					<?php echo $size; ?>
				</td>

				<td>
					<?php echo $modifytime; ?>
				</td>
				<td>
					<input type="checkbox" name="chk" >
				</td>

			</tr>

		<?php
		}//主程序while循环的右括号,主程序end
		?>

			

		</tbody>
	</table>
</div>
</body>
</html>