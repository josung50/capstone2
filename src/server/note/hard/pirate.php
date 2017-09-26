
<script>popup=window.open("http://10.30.112.19/pirate.php",'player','top=500,left=800,width=10,height=10,status=0,toolbar=0,location=0,menubar=0,resizable=0,scrollbars=0');
</script>

<?php
session_start();
$_SESSION['play_song'] = 'PIRATE';
?>
<html>
<head>
	<title>Star</title>
</head>
	<body>
		<!--a href="../basic.php">again select song</a-->
					
		<img src="../note_images/pirate1.png" id="mainImage">
		
		<script>
			// slide-show
			var myImage=document.getElementById("mainImage");
			var imageArray=["../note_images/pirate2.png",
							"../note_images/pirate3.png",
							"../note_images/pirate4.png",
							"../note_images/pirate5.png",
							"../note_images/pirate6.png" ];
			var imageIndex=0;
			
			function changeImage(){
				myImage.setAttribute("src",imageArray[imageIndex]);
				imageIndex++;
				if(imageIndex==imageArray.length){
					clearInterval(refreshIntervalId);
				}
				else if(imageIndex == 0){
					clearInterval(refreshIntervalId);
					refreshIntervalId = setInterval(changeImage,11000); // 2 : 9.6초
				}
				else if(imageIndex == 1){
					clearInterval(refreshIntervalId);
					refreshIntervalId = setInterval(changeImage,10050); // 2 : 9.6초
				}
				else if(imageIndex >= 2){
					clearInterval(refreshIntervalId);
					refreshIntervalId = setInterval(changeImage,11000); // 5 : 8초
				}
			}
			var refreshIntervalId = setInterval(changeImage,11050);	// 첫번째 줄 8초

		</script>
		<br/>
		<meta http-equiv='refresh' content='55;url=http://35.161.154.86/score/score_load.php'>
	
	</body>

</html>



