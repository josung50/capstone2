<?php
    include_once ("../SheetFunction.php");
?>

<script>
    popup=window.open("http://10.42.0.187/school.php",'player','top=500,left=800,width=10,height=10,status=0,toolbar=0,location=0,menubar=0,resizable=0,scrollbars=0');
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

    <body onload = "ScrollAuto();">
        <br/><br/>

        <!-- php 현재 경로 : /var/www/html/sheet -->
        <!-- html 의 경로는 그대로 /var/www/html/note/hard -->
        <script>
            // slide-show
            var theNumberOfSheet =  <?=CountSheet($_SESSION['play_song'])?>;
            console.log("the Number of Sheet : " + theNumberOfSheet);

            CreateImgTag(theNumberOfSheet, 'LOVERBATTERY');
        </script>
    </body>
</html>

