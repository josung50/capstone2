<?php
    include_once ("../loadSheetFunction.php");
?>

<script>
    popup=window.open("http://10.30.112.19/totoro.php",'player','top=500,left=800,width=10,height=10,status=0,toolbar=0,location=0,menubar=0,resizable=0,scrollbars=0');
</script>

<?php
    session_start();
    $_SESSION['play_song'] = 'TOTORO';
?>

<?php
    // 현재 경로 -> php파일이 있는 경로
    // sheet.exe가 있는 경로로 이동해야 한다.
    chdir('../../sheet');
    if(!CheckSheetExist($_SESSION['play_song']))
        CreateSheet($_SESSION['play_song']);
?>

<html>
    <head>
        <title>totoro</title>
    </head>
	
	<body>
        <br/><br/>
        <img src="../../sheet/TOTORO_1.png" id="mainImage">
		
		<script>
			// slide-show
			var myImage=document.getElementById("mainImage");
            var theNumberOfSheet =  <?=SheetCount($_SESSION['play_song'])?>;

            var imageArray = new Array();
            for(var i = 0; i < theNumberOfSheet; i++)
                imageArray[i] = "../../sheet/CHOPSTICKS_" + parseInt(i + 1) + ".png";

            var imageIndex = 0;
			
			function changeImage() {
				myImage.setAttribute("src", imageArray[imageIndex]);
				imageIndex++;
				if(imageIndex==imageArray.length)
					clearInterval(refreshIntervalId);
				else if(imageIndex == 0) {
					clearInterval(refreshIntervalId);
					refreshIntervalId = setInterval(changeImage, 18000); // 나머지 : 12.8초
				}
				else if(imageIndex == 1) {
					clearInterval(refreshIntervalId);
					refreshIntervalId = setInterval(changeImage, 11500); // 나머지 : 12.8초
				}
				else if(imageIndex >= 2) {
					clearInterval(refreshIntervalId);
					refreshIntervalId = setInterval(changeImage, 13000); // 나머지 : 12.8초
				}
			}

			var refreshIntervalId = setInterval(changeImage,9550);		//한줄에 6.4초

		</script>

		<meta http-equiv='refresh' content='67;url=http://35.161.154.86/score/score_load.php'>

	</body>

</html>






