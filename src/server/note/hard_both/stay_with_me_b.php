<html>
<head>
	<title>Stay with me</title> 
</head>
	
	<body>		
		<img src="../note_images_both/staywithme_b1.png" id="mainImage">
		
		<script>
			// slide-show
			var myImage=document.getElementById("mainImage");
			var imageArray=["../note_images_both/staywithme_b2.png", // 4마디
							"../note_images_both/staywithme_b3.png", // 4마디
							"../note_images_both/staywithme_b4.png"];
			var imageIndex=0;
			
			function changeImage(){
				myImage.setAttribute("src",imageArray[imageIndex]);
				imageIndex++;
				// 마지막(5마디)
				if(imageIndex==imageArray.length){
					clearInterval(refreshIntervalId);
				}
				// 4마디
				else if(imageIndex==0 || imageIndex==1){
					clearInterval(refreshIntervalId);
					refreshIntervalId = setInterval(changeImage,1700);
				}
				
			}
			var refreshIntervalId = setInterval(changeImage,2000);
		</script>
	</body>
</html>










