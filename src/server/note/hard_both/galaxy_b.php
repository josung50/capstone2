

<html>
<head>
	<title>Galaxy</title> 
</head>
	
	<body>		
		<img src="../note_images_both/galaxy_b1.png" id="mainImage">
		
		<script>
			// slide-show
			var myImage=document.getElementById("mainImage");
			var imageArray=["../note_images_both/galaxy_b2.png", // 0=
							"../note_images_both/galaxy_b3.png", // 1=
							"../note_images_both/galaxy_b4.png", // 2
							"../note_images_both/galaxy_b5.png", // 3=
							"../note_images_both/galaxy_b6.png", // 4
							"../note_images_both/galaxy_b7.png", // 5
							"../note_images_both/galaxy_b8.png", // 6
							"../note_images_both/galaxy_b9.png", // 7=
							"../note_images_both/galaxy_b10.png", // 8=
							"../note_images_both/galaxy_b1.png", // 9
							"../note_images_both/galaxy_b2.png", // 10=
							"../note_images_both/galaxy_b3.png", // 11=
							"../note_images_both/galaxy_b4.png", // 12
							"../note_images_both/galaxy_b5-1.png", // 13=
							"../note_images_both/galaxy_b6.png", // 14
							"../note_images_both/galaxy_b7.png", // 15
							"../note_images_both/galaxy_b11.png", // 16=
							"../note_images_both/galaxy_b12.png", // 17
							"../note_images_both/galaxy_b13.png", // 18
							"../note_images_both/galaxy_b14.png"  // 19
							];
			var imageIndex=0;
			
			function changeImage(){
				myImage.setAttribute("src",imageArray[imageIndex]);
				imageIndex++;
				if(imageIndex==imageArray.length){ // 5마디
					clearInterval(refreshIntervalId);
				}
				// 4마디 0,1,3,7,8,10,11,13,16
				else if(imageIndex == 0 || imageIndex == 1 || imageIndex == 3 || imageIndex == 7
					  || imageIndex == 8 || imageIndex == 10 || imageIndex == 11 || imageIndex == 13
					  || imageIndex == 16){
					clearInterval(refreshIntervalId);
					refreshIntervalId = setInterval(changeImage,2000);
				}
			}
			var refreshIntervalId = setInterval(changeImage,1700); // 3마디
		</script>
	</body>
</html>










