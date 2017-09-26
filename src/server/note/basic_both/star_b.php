
<html>
<head>
	<title>작은 별</title> 
</head>
	
	<body>		
		<img src="../note_images_both/star_b1.jpg" id="mainImage">
		
		<script>
			// slide-show
			var myImage=document.getElementById("mainImage");
			var imageArray=["../note_images_both/star_b2.jpg",
							"../note_images_both/star_b3.jpg",
							"../note_images_both/star_b4.jpg",
							"../note_images_both/star_b5.jpg",
							"../note_images_both/star_b6.jpg",
							"../note_images_both/star_b7.jpg",
							"../note_images_both/star_b8.jpg"];
			var imageIndex=0;
			
			function changeImage(){
				myImage.setAttribute("src",imageArray[imageIndex]);
				imageIndex++;
				if(imageIndex==imageArray.length){
					clearInterval(refreshIntervalId);
				}
			}
			var refreshIntervalId = setInterval(changeImage,3000);		

		</script>
	</body>
</html>






