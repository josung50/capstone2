<html>
<head>
	<title>오랜날 오랜밤</title> 
</head>
	
	<body>		
		<img src="../note_images_both/lastgoodbye_b1.png" id="mainImage">
		
		<script>
			// slide-show
			var myImage=document.getElementById("mainImage");
			var imageArray=["../note_images_both/lastgoodbye_b2.png", // 0 -5
							"../note_images_both/lastgoodbye_b3.png", // 1 
							"../note_images_both/lastgoodbye_b4.png", // 2 -5
							"../note_images_both/lastgoodbye_b5.png", // 3 
							"../note_images_both/lastgoodbye_b6.png", // 4 -5
							"../note_images_both/lastgoodbye_b7.png", // 5 
							"../note_images_both/lastgoodbye_b8.png", // 6 -3
							"../note_images_both/lastgoodbye_b9.png", // 7 -3
							"../note_images_both/lastgoodbye_b10.png", // 8 
							"../note_images_both/lastgoodbye_b11.png", // 9 
							"../note_images_both/lastgoodbye_b12.png", // 10 
							"../note_images_both/lastgoodbye_b13.png", // 11 -3
							"../note_images_both/lastgoodbye_b14.png", // 12 -3
							"../note_images_both/lastgoodbye_b15.png", // 13 
							"../note_images_both/lastgoodbye_b16.png", // 14 
							"../note_images_both/lastgoodbye_b17.png", // 15 -5
							"../note_images_both/lastgoodbye_b18.png", // 16 
							"../note_images_both/lastgoodbye_b19.png", // 17 -5
							"../note_images_both/lastgoodbye_b20.png", // 18 
							"../note_images_both/lastgoodbye_b21.png", // 19 
							"../note_images_both/lastgoodbye_b21-1.png", // 20 -1
							"../note_images_both/lastgoodbye_b10.png", // 21 
							"../note_images_both/lastgoodbye_b11.png", // 22 
							"../note_images_both/lastgoodbye_b12.png", // 23 
							"../note_images_both/lastgoodbye_b13.png", // 24 -3
							"../note_images_both/lastgoodbye_b22.png", // 25 -3
							"../note_images_both/lastgoodbye_b23.png", // 26 
							"../note_images_both/lastgoodbye_b24.png", // 27 
							"../note_images_both/lastgoodbye_b25.png", // 28 -6
							"../note_images_both/lastgoodbye_b26.png", // 29 
							"../note_images_both/lastgoodbye_b27.png", // 30 
							"../note_images_both/lastgoodbye_b28.png", // 31 
							"../note_images_both/lastgoodbye_b29.png"  // 32 -5
							]; 
			var imageIndex=0;
			
			function changeImage(){
				myImage.setAttribute("src",imageArray[imageIndex]);
				imageIndex++;
				// 마지막:5마디
				if(imageIndex==imageArray.length){
					clearInterval(refreshIntervalId);
				}
				// 1마디
				else if(imageIndex==20){
					clearInterval(refreshIntervalId);
					refreshIntervalId = setInterval(changeImage,700);
				}
				// 3마디:6,7,11,12,24,25
				else if(imageIndex==6 || imageIndex==7 || imageIndex==11
						 || imageIndex==12 || imageIndex==24 || imageIndex==25){
					clearInterval(refreshIntervalId);
					refreshIntervalId = setInterval(changeImage,500);
				}
				// 5마디:0,2,4,15,17
				else if(imageIndex==0 || imageIndex==2 || imageIndex==4
						 || imageIndex==15 || imageIndex==17){
					clearInterval(refreshIntervalId);
					refreshIntervalId = setInterval(changeImage,2500);
				}
				// 6마디
				else if(imageIndex==28){
					clearInterval(refreshIntervalId);
					refreshIntervalId = setInterval(changeImage,3000);
				}
				// 원래(4마디)
				else{
					clearInterval(refreshIntervalId);
					refreshIntervalId = setInterval(changeImage,2000);	
				}
			}
			var refreshIntervalId = setInterval(changeImage,2000);
		</script>
	</body>
</html>










