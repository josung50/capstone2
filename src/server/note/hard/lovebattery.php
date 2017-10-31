<?php
    include_once ("../loadSheetFunction.php");
?>

<script>
    popup=window.open("http://10.30.112.19/lovebattery.php",'player','top=500,left=800,width=10,height=10,status=0,toolbar=0,location=0,menubar=0,resizable=0,scrollbars=0');
</script>

<?php
    session_start();
    $_SESSION['play_song'] = 'LOVERBATTERY';
?>

<?php
    // 현재 경로 -> php파일이 있는 경로
    // sheet.exe가 있는 경로로 이동해야 한다.
    chdir('../../sheet');
    //exec("mono sheet.exe songs/LOVERBATTERY.mid testmid", $output, $error);
    if(!CheckSheetExist($_SESSION['play_song']))
        CreateSheet($_SESSION['play_song']);
    //echo SheetCount(); 결과 : 5 , 실제 악보수는 4
?>

<html>
    <head>
        <title>loverbattery</title>
    </head>

    <body>
        <br/><br/>

        <!-- php 현재 경로 : /var/www/html/sheet -->
        <!-- html 의 경로는 그대로 /var/www/html/note/hard -->

        <img src="../../sheet/LOVERBATTERY_1.png" id="mainImage">

        <script>
            // slide-show
            var myImage = document.getElementById("mainImage");
            var theNumberOfSheet =  <?=SheetCount($_SESSION['play_song'])?>;

            var imageArray = new Array();
            for(var i = 0; i < theNumberOfSheet; i++)
                imageArray[i] = "../../sheet/LOVERBATTERY_" + parseInt(i + 1) + ".png";
                //var imageArray=["../note_images/lovebattery2.png",
                //"../note_images/lovebattery3.png" ];

            var imageIndex=0;

            function ChangeImage() {
                myImage.setAttribute("src", imageArray[imageIndex]);
                imageIndex++;
                if(imageIndex == imageArray.length) {
                    clearInterval(refreshIntervalId);
                }
            }
            var refreshIntervalId = setInterval(ChangeImage, 5000);	// 첫 줄 9초

        </script>

        <a href="http://10.30.112.19/end.php">
            <img src='/image/home.png'>
        </a>
        <meta http-equiv='refresh' content='33;url=http://35.161.154.86/score/score_load.php'>

    </body>
</html>

