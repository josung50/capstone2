
<html>
<head>
	<title>햇볕은 쨍쨍</title> 
</head>
	
	<body>		
		<img src="../note_images_both/sun_b1.jpg" id="mainImage">
		
		<script>
			// slide-show
			var myImage=document.getElementById("mainImage");
			var imageArray=["../note_images_both/sun_b2.jpg",
							"../note_images_both/sun_b3.jpg",
							"../note_images_both/sun_b4.jpg"];
			var imageIndex=0;
			
			function changeImage(){
				myImage.setAttribute("src",imageArray[imageIndex]);
				imageIndex++;
				if(imageIndex==imageArray.length){
					clearInterval(refreshIntervalId);
				}
			}
			var refreshIntervalId = setInterval(changeImage,3500);		

		</script>
	</body>
</html>
