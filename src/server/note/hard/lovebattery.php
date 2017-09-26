<script>popup=window.open("http://10.30.112.19/lovebattery.php",'player','top=500,left=800,width=10,height=10,status=0,toolbar=0,location=0,menubar=0,resizable=0,scrollbars=0');
</script>
<?php
session_start();
$_SESSION['play_song'] = 'LOVEBATTERY';
?>

<html>
<head>
	<title>lovebattery</title> 
</head>
	
	<body>
		<br/><br/>
		<img src="../note_images/lovebattery1.png" id="mainImage">
		
		<script>
			// slide-show
			var myImage=document.getElementById("mainImage");
			var imageArray=["../note_images/lovebattery2.png",
							"../note_images/lovebattery3.png" ];
			
			var imageIndex=0;
			
			function changeImage(){
				myImage.setAttribute("src",imageArray[imageIndex]);
				imageIndex++;
				if(imageIndex==imageArray.length){
					clearInterval(refreshIntervalId);
				}
			}
			var refreshIntervalId = setInterval(changeImage,10000);	// 첫 줄 9초 

		</script> 
		<a href="http://10.30.112.19/end.php"><img src='/image/home.png'></a>
		<meta http-equiv='refresh' content='33;url=http://35.161.154.86/score/score_load.php'>

	</body>
</html>






