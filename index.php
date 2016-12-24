<!DOCTYPE html>
<html>
<head>
   	<meta charset="utf-8"> 
   	<title>my cloud disk</title>
   	<link rel="stylesheet" href="https://cdn.static.runoob.com/libs/bootstrap/3.3.7/css/bootstrap.min.css">  
   	<script src="js/mediaelement-and-player.min.js"></script>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.7.2/jquery.min.js"></script>
    <script src="https://cdn.static.runoob.com/libs/jquery/2.1.1/jquery.min.js"></script>
    <script src="https://cdn.static.runoob.com/libs/bootstrap/3.3.7/js/bootstrap.min.js"></script>

    <link rel="stylesheet" href="css/upload.css">

	


    <style type="text/css">
    	#image{
    		max-width: 570px;
    		height: auto
    	}
    </style>

   <script type="text/javascript">
	function allDocuments(path){
	var xmlhttp;
	if (window.XMLHttpRequest){
	// code for IE7+, Firefox, Chrome, Opera, Safari
	  xmlhttp=new XMLHttpRequest();
	}
	else{
	// code for IE6, IE5
	  xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
	}
	
	xmlhttp.onreadystatechange=function(){
	  if (xmlhttp.readyState==4 && xmlhttp.status==200){
	    document.getElementById("main").innerHTML=xmlhttp.responseText;
    	}
  	}
	xmlhttp.open("GET","allDocuments.php?dir="+path,true);//第三个参数true代表异步，false代表同步
	xmlhttp.send();
	}</script>

	<script type="text/javascript">$(document).pjax('a', '#pjax-container')</script>

	 <script type="text/javascript">
	function playAudio(path){
	var xmlhttp;
	if (window.XMLHttpRequest){
	// code for IE7+, Firefox, Chrome, Opera, Safari
	  xmlhttp=new XMLHttpRequest();
	}
	else{
	// code for IE6, IE5
	  xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
	}
	
	xmlhttp.onreadystatechange=function(){
	  if (xmlhttp.readyState==4 && xmlhttp.status==200){
	    document.getElementById("audioPlayer").innerHTML=xmlhttp.responseText;
    	}
  	}
	xmlhttp.open("GET","audioPlayer.php?dir="+path,true);//第三个参数true代表异步，false代表同步
	xmlhttp.send();
	}</script>

	<script type="text/javascript">
		function showPic(picpath){
			$('#image').attr("src",picpath);
			$('#picModal').modal('show');

		}
	</script>


	<script type="text/javascript">
		function playAudio(path,name){
			$('#audioname').html("<h1>"+name+"</h1>");
			$('#audioname').html("<h1><p onclick='document.getElementById("+'"audio-player"'+").pause()'>"+name+"</p><h1>");
			$('#audio-player').attr("src",path);
			document.getElementById("audioPlayer").style.visibility="visible";
		}
	</script>

	<script type="text/javascript">
		$(document).ready(function(){
		  $("#searchButton").click(function(){
		  	var key=$("#keyword").val();
			var xmlhttp;
			if (window.XMLHttpRequest){
			// code for IE7+, Firefox, Chrome, Opera, Safari
			  xmlhttp=new XMLHttpRequest();
			}
			else{
			// code for IE6, IE5
			  xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
			}
			
			xmlhttp.onreadystatechange=function(){
			  if (xmlhttp.readyState==4 && xmlhttp.status==200){
			    document.getElementById("main").innerHTML=xmlhttp.responseText;
		    	}
		  	}
			xmlhttp.open("GET","search.php?key="+key,true);//第三个参数true代表异步，false代表同步
			xmlhttp.send();

			//$('#myModal').modal('show');
		  });
		});
		
	</script>
	<script type="text/javascript">
		function showByCatagory(catagory,dir){
			var xmlhttp;
			if (window.XMLHttpRequest){
			// code for IE7+, Firefox, Chrome, Opera, Safari
			  xmlhttp=new XMLHttpRequest();
			}
			else{
			// code for IE6, IE5
			  xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
			}
			
			xmlhttp.onreadystatechange=function(){
			  if (xmlhttp.readyState==4 && xmlhttp.status==200){
			    document.getElementById("main").innerHTML=xmlhttp.responseText;
		    	}
		  	}
			xmlhttp.open("GET","bycatagory.php?catagory="+catagory+"&dir="+dir,true);//第三个参数true代表异步，false代表同步
			xmlhttp.send();
		}
	</script>

	<script>
     function choseTd() {
     	var inputs=document.getElementById("mytable").getElementsByTagName("input");
		for(var i=0;i<inputs.length;i++){	
			if(inputs[i].type=="checkbox"){
				if(inputs[i].checked&&inputs[i].name=="chk"){
					var checkedRow=inputs[i];
					var tr = checkedRow.parentNode.parentNode;
	         		var tds = tr.cells;       
					//alert(tds[0].title+tds[1].title);

						
				}
			}
		}
		var confirm=window.confirm("do you wanna delete them?");
		if(confirm){
			alert("yes");
		}
		
	}
	</script>
	<script>
     function deleteTds() {
     	

     	if(window.confirm("do you wanna delete them?")){
			var inputs=document.getElementById("mytable").getElementsByTagName("input");
			for(var i=0;i<inputs.length;i++){	
				if(inputs[i].type=="checkbox"){
					if(inputs[i].checked&&inputs[i].name=="chk"){
						var checkedRow=inputs[i];
						var tr = checkedRow.parentNode.parentNode;
		         		var tds = tr.cells; 
		         		var xmlhttp=new XMLHttpRequest();
						xmlhttp.open("GET","delete.php?type="+tds[0].title+"&path="+tds[1].title,true);//第三个参数true代表异步，false代表同步
						xmlhttp.send();
						
					}
				}
			}

		}
	}
	</script>
	<script type="text/javascript">
		function select(){
			if($('#alltds').text()=="select all"){
				$("[name='chk']").prop("checked",true);
				$("#flag").text("cancle all");
			}else{
				$("[name='chk']").prop("checked",false);
				$("#flag").text("select all");
			}
		}
	</script>
	
</head>

<?php
include 'myfunctions.php';

$path=$_GET['path'];
if(!$path){
	$path=$defaultpath;//默认初始路径，在myfunctions.php里定义
}
?>
<body onload='allDocuments("<?php echo $path;?>")'>
<body>


<div class="container">
	<div class="row clearfix">
		<div class="col-xs-12 col-md-12 column">
			<div class="row clearfix page-header">
				<!--div class="page-header"></div-->
					<div class="col-xs-8 col-md-8">
						<h1>
							Personal Cloud disk <small>aszer</small>
						</h1>
						
					</div>
					<div class="col-xs-4 col-md-4">
					<!-- Audio Player CSS & Scripts -->
				    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.7.2/jquery.min.js"></script>
					<script src="js/mediaelement-and-player.min.js"></script>
					<link rel="stylesheet" href="css/audioPlayer.css" media="screen">
					<!-- end Audio Player CSS & Scripts -->
						<div id="audioPlayer" style="visibility:hidden;">
							<body>
								<!-- Audio Player HTML -->
								<div class="audio-player">
								<div id="audioname" onclick="document.getElementById('audioPlayer').style.visibility='hidden'"></div>

								<audio id="audio-player" src="asa" type="audio/mp3" controls="controls" autoplay="autoplay"></audio>
								</div>

								<script>
									var j=jQuery.noConflict();
									j(document).ready(function($) {
										$('#audio-player').mediaelementplayer({
											alwaysShowControls: true,
											features: ['playpause','volume','progress'],
											audioVolume: 'horizontal',
											audioWidth: 400,
											audioHeight: 120
										});
										var end=document.getElementById('audio-player');
										end.addEventListener('ended',function(){
											document.getElementById("audioPlayer").style.visibility="hidden";
										});
									});
									
								</script>
								
								<!-- end Audio Player HTML -->

							</body>
						</div>
											
					</div>
			</div>
				

			
			<div class="row clearfix">
				<div class="col-xs-3 col-md-2 column">
					 <span class="label label-default"> navigation bar &nbsp</span>
					<ul class="nav nav-tabs　nav-stacked">
						<li class="active">
							 <a  onclick='allDocuments("<?php echo $path;?>");return false;' href="#" >all documents</a>
						</li>
						<li>
							 <a onclick='showByCatagory("video","<?php echo $path;?>");return false;' href="#">video</a>
						</li>
						<li>
							 <a onclick='showByCatagory("audio","<?php echo $path;?>");return false;' href="#">music</a>
						</li>
						<li>
							 <a onclick='showByCatagory("image","<?php echo $path;?>");return false;' href="#">pictures</a>
						</li>
						
					</ul>
				</div>
				
				<div class="col-xs-9 col-md-10 column">
					<nav class="navbar navbar-default" role="navigation">
						<div class="navbar-header">
							 <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1"> <span class="sr-only">Toggle navigation</span><span class="icon-bar"></span><span class="icon-bar"></span><span class="icon-bar"></span></button> <a class="navbar-brand" href="#">Brand</a>
						</div>
						<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
							<ul class="nav navbar-nav">
								<li >
									 <a href="#" btn-lg" data-toggle="modal" data-target="#uploadModal">upload</a>
								</li>
								<li>
									 <a onclick="choseTd();return false" href="#">move</a>
								</li>
								<li>
									 <a onclick="deleteTds();return false" href="#">delete</a>
								</li>
								<li>
									 <a href="#">new document</a>
								</li>
								<li>
									 <a href="#">aria2</a>
								</li>

							</ul>
							<ul class="nav navbar-nav navbar-right">
								
								<!--li class="dropdown">
									 <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-expanded="false">Dropdown<strong class="caret"></strong></a>
									<ul class="dropdown-menu">
										<li>
											 <a href="#">Action</a>
										</li>
										<li>
											 <a href="#">Another action</a>
										</li>
										<li>
											 <a href="#">Something else here</a>
										</li>
										<li class="divider">
										</li>
										<li>
											 <a href="#">Separated link</a>
										</li>
									</ul>
								</li-->
							</ul>
							<div class="navbar-form navbar-right" role="search" >
								<div class="form-group" style="width: 178px">
									<input type="text" class="form-control" id="keyword">
								</div> <button  class="btn btn-default" id="searchButton">search</button>
							</div>
							
						</div>
					</nav>

					<div id="main">	</div>
					<!-- 提示信息模态框（Modal） -->

					<div class="modal fade" id="showMessage" tabindex="0" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" data-show="false">
					    <div class="modal-dialog" >
					        <div class="modal-content">
					       		<div class="modal-header">
					                <h6 class="modal-title" id="messageModalLabel"> 按下 ESC 按钮退出。</h6>
					            </div>
					            <div class="modal-body">
					               
					                <div id="messagediv">
					                	
					                </div>
					            </div>
					            <div class="modal-footer">
					            </div>
					        </div><!-- /.modal-content -->
					    </div><!-- /.modal-dialog -->
					</div><!-- /.modal -->
					<script>
					$(function () { $('#picModal').modal({
					    keyboard: true
					})});
					</script>
					<!-- 提示信息模态框 end-->
					<!-- 显示图片模态框（Modal） -->

					<div class="modal fade" id="picModal" tabindex="0" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" data-show="false">
					    <div class="modal-dialog" >
					        <div class="modal-content">
					       		<div class="modal-header">
					                <h6 class="modal-title" id="picModalLabel"> 按下 ESC 按钮退出。</h6>
					            </div>
					            <div class="modal-body">
					               
					                <div id="picdiv">
					                	<img src=' '   id="image"/>
					                </div>
					            </div>
					            <div class="modal-footer">
					            </div>
					        </div><!-- /.modal-content -->
					    </div><!-- /.modal-dialog -->
					</div><!-- /.modal -->
					<script>
					$(function () { $('#picModal').modal({
					    keyboard: true
					})});
					</script>
					<!-- 显示图片模态框 end-->
					<!-- upload模态框（Modal） -->

					<div class="modal fade" id="uploadModal" tabindex="0" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" data-show="false">
					    <div class="modal-dialog" >
					        <div class="modal-content">
					       		
					            <div class="modal-body">
					               
					                <form class="form-horizontal"  action="upload.php" method="post" enctype="multipart/form-data" target="a">
									    <fieldset>
									      <div id="legend" class="" >
									        <legend class="" style="left: 40px">upload file</legend>
									      </div>
									    <div class="control-group">

									          <!-- Text input-->
									          <label class="control-label" for="input01">file name</label>
									          <div class="controls">
									            <input type="text" name="filename" placeholder="empty for default" class="input-xlarge" style="height: 28px">
									            <p class="help-block"></p>
									          </div>
									        </div>
									    <div class="control-group">
									          <label class="control-label">from</label>

									          <!-- File Upload -->
									          <div class="controls">
									            <input class="input-file" id="file" type="file" name="file" >
									          </div>
									        </div> 

									    <div class="control-group">

									          <!-- Text input-->
									          <label class="control-label" for="input01">to</label>
									          <div class="controls">
									            <input type="text" name="targetpath" placeholder="input the target path" class="input-xlarge" style="height: 28px">
									            <p class="help-block"></p>
									          </div>
									        </div><div class="control-group">
									          <label class="control-label"></label>

									          <!-- Button -->
									          <div class="controls" >
									            <button class="btn btn-primary" >submit</button>
									             <!--button class="btn btn-danger">cancle</button-->
									          </div>
									        </div>
									    </fieldset>
									  </form>
					            </div>
					            <div class="modal-footer">
					            </div>
					        </div><!-- /.modal-content -->
					    </div><!-- /.modal-dialog -->
					</div><!-- /.modal -->
					<script>
					$(function () { $('#uploadModal').modal({
					    keyboard: true
					})});
					</script>
					<!-- upload模态框 end-->

					
				</div>
			</div>
		</div>
	</div>
</div>
</body>
</body>
</html>

