<!DOCTYPE html>
<html>
<head>
   <meta charset="utf-8"> 
   <title>my cloud disk</title>
   <link rel="stylesheet" href="https://cdn.static.runoob.com/libs/bootstrap/3.3.7/css/bootstrap.min.css">  
   <script src="https://cdn.static.runoob.com/libs/jquery/2.1.1/jquery.min.js"></script>
   <script src="https://cdn.static.runoob.com/libs/bootstrap/3.3.7/js/bootstrap.min.js"></script>

   <script>
     function test() {
     
     	var inputs=document.getElementById("mytable").getElementsByTagName("input");
			for(var i=0;i<inputs.length;i++){	
				if(inputs[i].type=="checkbox"){
					if(inputs[i].checked&&inputs[i].name=="chk"){
						var checkedRow=inputs[i];
						 var tr = checkedRow.parentNode.parentNode;
		         var tds = tr.cells;
		         //循环列	         
		        
						alert(tds[1].title);
		           
		          
						}
						
					}
				}
	}
         
</script>

</head>
<body>
<?php
//引入函数
include 'myfunctions.php';


//主程序begin						
$dir=$_GET["dir"];
$dir="/var/www/html/"

?>

<div data-spy="scroll" data-target="#navbar-example" data-offset="0"
     style="height:540px;overflow:auto; position: relative;" class="table-responsive" >
	
	<table class="table table-hover" id="mytable">
		<thead>
			<tr>
				<th>file type</th>
				<th>file name</th>
				<th>file size</th>
				<th>modification date</th>
				<th>select all</th>
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
				<td>
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
<input type="button" name="my_button"value="取值" onclick="test();"></input>
</body>
</html>




<!--!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.0 Transitional//EN">
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
    <title>获取表格选中的多行对象</title>
    <script>
     function test() {
     
     	var inputs=document.getElementById("myTable_id").getElementsByTagName("input");
			for(var i=0;i<inputs.length;i++){	
				if(inputs[i].type=="checkbox"){
					if(inputs[i].checked&&inputs[i].name=="chk"){
						var checkedRow=inputs[i];
						 var tr = checkedRow.parentNode.parentNode;
		         var tds = tr.cells;
		         //循环列	         
		        /*
						for(var j = 1;j < tds.length;j++){		 
									 var str="";             
		               str += "title:"+tds[j].title+ "~ value:"+tds[j].value+"~innerHTML:"+tds[j].innerHTML ;
		               alert(str);                 		             
		            }
		            */
		            alter(td[2].innerHTML);
						}
						
					}
				}
	}
         
</script>
</head>
<body>
<table id ="myTable_id" width="60%" cellspacing="0" cellpadding="0" align="left" border="1" bordercolordark="#ffffff" bordercolorlight="#B3B5B4" >
    <tbody id="tabstore1">
        <tr>
            <td><input type="checkbox" name="chk"value="123"></td>
            <td title="want u sweet heart!" value="want">b1</td>
            <td>b2</td>
            <td>b3</td>
        </tr>
        <tr>
            <td><input type="checkbox" name="chk"value="456"></td>
            <td title="love u sweet heart!"  value="love">c1</td>
            <td>c2</td>
            <td>c3</td>
        </tr>
        <tr>
            <td><input type="checkbox" name="chk"value="456"></td>
            <td title="miss u sweet heart!" value="miss">d1</td>
            <td>d2</td>
            <td>d3</td>
        </tr>
    </tbody>
</table>
<input type="button" name="my_button"value="取值" onclick="test();"></input>
</body>
</html-->