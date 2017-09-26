
<html>
<head>
	<title>Marry You</title> 
</head>
	
	<body>		
		<img src="../note_images_both/marryyou_b1.png" id="mainImage">
		
		<script>
			// slide-show
			var myImage=document.getElementById("mainImage");
			var imageArray=["../note_images_both/marryyou_b2.png",
							"../note_images_both/marryyou_b3.png",
							"../note_images_both/marryyou_b4.png",
							"../note_images_both/marryyou_b5.png",
							"../note_images_both/marryyou_b6.png",
							"../note_images_both/marryyou_b7.png",
							"../note_images_both/marryyou_b8.png",
							"../note_images_both/marryyou_b9.png",
							"../note_images_both/marryyou_b10.png",
							"../note_images_both/marryyou_b11.png",
							"../note_images_both/marryyou_b12.png",
							"../note_images_both/marryyou_b13.png",
							"../note_images_both/marryyou_b14.png",
							"../note_images_both/marryyou_b15.png",
							"../note_images_both/marryyou_b16.png",
							"../note_images_both/marryyou_b17.png",
							"../note_images_both/marryyou_b18.png",
							"../note_images_both/marryyou_b19.png",
							"../note_images_both/marryyou_b20.png",
							"../note_images_both/marryyou_b11.png",
							"../note_images_both/marryyou_b12.png",
							"../note_images_both/marryyou_b13.png",
							"../note_images_both/marryyou_b14.png",
							"../note_images_both/marryyou_b15.png",
							"../note_images_both/marryyou_b16.png",
							"../note_images_both/marryyou_b21.png",
							"../note_images_both/marryyou_b22.png",
							"../note_images_both/marryyou_b21.png",
							"../note_images_both/marryyou_b22.png",
							"../note_images_both/marryyou_b23.png",
							"../note_images_both/marryyou_b24.png",
							"../note_images_both/marryyou_b25.png",
							"../note_images_both/marryyou_b26.png"];
							
			var imageIndex=0;
			
			function changeImage(){
				myImage.setAttribute("src",imageArray[imageIndex]);
				imageIndex++;
				if(imageIndex==imageArray.length){
					clearInterval(refreshIntervalId);
				}
			}
			var refreshIntervalId = setInterval(changeImage,1000);
		</script>
	</body>
</html>





