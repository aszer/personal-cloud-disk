<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="utf-8">
	<title>audio palyer</title>
	<!-- Audio Player CSS & Scripts -->
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.7.2/jquery.min.js"></script>
	<script src="js/mediaelement-and-player.min.js"></script>
	<link rel="stylesheet" href="css/audioPlayer.css" media="screen">
	<!-- end Audio Player CSS & Scripts -->

</head>

<body>
	<!-- Audio Player HTML -->
	<div class="audio-player">
		<h1>Demo - Preview Song</h1>
		<!--img class="cover" src="img/cover2.png" alt=""-->
		<audio id="audio-player" src="media/demo.mp3" type="audio/mp3" controls="controls"></audio>
	</div>

	<script>
		$(document).ready(function() {
			$('#audio-player').mediaelementplayer({
				alwaysShowControls: true,
				features: ['playpause','volume','progress'],
				audioVolume: 'horizontal',
				audioWidth: 400,
				audioHeight: 120
			});
		});
	</script>
	<!-- end Audio Player HTML -->

</body>

</html>