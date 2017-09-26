<script>popup=window.open("http://10.30.112.19/chopsticks.php",'player','top=500,left=800,width=10,height=10,status=0,toolbar=0,location=0,menubar=0,resizable=0,scrollbars=0');
</script>
<?php
session_start();
$_SESSION['play_song'] = 'CHOPSTICKS';
?>
<html>
<head>
	<title>Chopsticks</title> 
</head>
	
	<body>
		<br/><br/>
		<img src="../note_images/chopstick1.png" id="mainImage">
		
		<script>
			// slide-show
			var myImage=document.getElementById("mainImage");
			var imageArray=["../note_images/chopstick2.png",
							"../note_images/chopstick3.png" ];
			
			var imageIndex=0;
			
			function changeImage(){
				myImage.setAttribute("src",imageArray[imageIndex]);
				imageIndex++;
				if(imageIndex==imageArray.length){
					clearInterval(refreshIntervalId);
				}
				else if(imageIndex == 0){
					clearInterval(refreshIntervalId);
					refreshIntervalId = setInterval(changeImage,10700); // 9.4초
				}
			}
			var refreshIntervalId = setInterval(changeImage,11300);	// 한 줄에 8.4초	

		</script> 
		<meta http-equiv='refresh' content='26;url=http://35.161.154.86/score/score_load.php'>

	</body>
</html>






