
<script>popup=window.open("http://10.30.112.19/elise.php",'player','top=500,left=800,width=10,height=10,status=0,toolbar=0,location=0,menubar=0,resizable=0,scrollbars=0');
</script>


<?php
session_start();
$_SESSION['play_song'] = 'ELISE';
?>
<html>
<head>
	<title>Elise</title> 
</head>
	
	<body>
		<!--a href="../basic.php">again select song</a-->
			
		<img src="../note_images/elise1.png" id="mainImage">
		
		<script>
			// slide-show
			var myImage=document.getElementById("mainImage");
			var imageArray=["../note_images/elise2.png"];
			var imageIndex=0;
			
			function changeImage(){
				myImage.setAttribute("src",imageArray[imageIndex]);
				imageIndex++;
				if(imageIndex==imageArray.length){
					clearInterval(refreshIntervalId);
				}
			}
			var refreshIntervalId = setInterval(changeImage,21000);		

		</script>
		<meta http-equiv='refresh' content='28;url=http://35.161.154.86/score/score_load.php'>

	</body>

</html>



