
<html>
<head>
	<title>Beauty and The Beast</title> 
</head>
	
	<body>		
		<img src="../note_images_both/beautyandthebeast_b1.png" id="mainImage">
		
		<script>
			// slide-show
			var myImage=document.getElementById("mainImage");
			var imageArray=["../note_images_both/beautyandthebeast_b2.png",
							"../note_images_both/beautyandthebeast_b3.png",
							"../note_images_both/beautyandthebeast_b4.png", 
							"../note_images_both/beautyandthebeast_b5.png",
							"../note_images_both/beautyandthebeast_b6.png", 
							"../note_images_both/beautyandthebeast_b7.png",
							"../note_images_both/beautyandthebeast_b8.png", 
							"../note_images_both/beautyandthebeast_b9.png",
							"../note_images_both/beautyandthebeast_b10.png",
							"../note_images_both/beautyandthebeast_b11.png",
							"../note_images_both/beautyandthebeast_b12.png", 
							"../note_images_both/beautyandthebeast_b13.png",
							"../note_images_both/beautyandthebeast_b14.png", 
							"../note_images_both/beautyandthebeast_b15.png",
							"../note_images_both/beautyandthebeast_b16.png",
							"../note_images_both/beautyandthebeast_b17.png",
							"../note_images_both/beautyandthebeast_b18.png"
							];
			var imageIndex=0;
			
			function changeImage(){
				myImage.setAttribute("src",imageArray[imageIndex]);
				imageIndex++;
				// 마지막(3마디)
				if(imageIndex==imageArray.length){
					clearInterval(refreshIntervalId);
				}
			}
			// 전체 4마디
			var refreshIntervalId = setInterval(changeImage,2000);	
		</script>
	</body>
</html>






