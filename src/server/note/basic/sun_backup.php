
<script>popup=window.open("http://10.30.112.19/sun.php",'player','top=500,left=800,width=10,height=10,status=0,toolbar=0,location=0,menubar=0,resizable=0,scrollbars=0');
</script>

<?php
session_start();
$_SESSION['play_song'] = 'SUN';
?>
<html>
<head>
	<title>햇볕은 쨍쨍</title> 
</head>
	
	<body>		
		<img src="../note_images/sun1.jpg" id="mainImage">
		
		<script>
			// slide-show
			var myImage=document.getElementById("mainImage");
			var imageArray=["../note_images/sun2.jpg"];
			var imageIndex=0;
			
			function changeImage(){
				myImage.setAttribute("src",imageArray[imageIndex]);
				imageIndex++;
				if(imageIndex==imageArray.length){
					clearInterval(refreshIntervalId);
				}
			}
			var refreshIntervalId = setInterval(changeImage,19000);		// 19초

		</script>
		<br/>
		<meta http-equiv='refresh' content='39;url=http://35.161.154.86/score/score_load.php'>
		
	</body>
</html>
