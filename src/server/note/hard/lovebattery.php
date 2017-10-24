<?php
session_start();
$_SESSION['play_song'] = 'LOVERBATTERY';
?>

<?php
function CheckSheetExist($fileName) {
    chdir('../../sheet/sheetimg');
    //if(file_exists(_SESSION["play_song"]+ '_1.png'))
    if(file_exists($fileName))
        return true;
    else
        return false;
}

function CreateSheet() {
    chdir('../../sheet');
    //echo getcwd();
    $commend = "mono sheet.exe songs/" . $_SESSION['play_song'] . ".mid" . " " . $_SESSION['play_song'];
    //echo $commend;
    exec($commend);
}

function SheetCount() {
    $index = 1;
    while(file_exists($_SESSION['play_song']. "_" . $index . ".png")) {
        $index++;
    }
    return $index - 1;
}
?>

<?php
    // 현재 경로 -> php파일이 있는 경로
    // sheet.exe가 있는 경로로 이동해야 한다.
    chdir('../../sheet');
    //exec("mono sheet.exe songs/LOVERBATTERY.mid testmid", $output, $error);
    if(!CheckSheetExist($_SESSION['play_song'])) {
        CreateSheet();
    }
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
    var myImage=document.getElementById("mainImage");
    var theNumberOfSheet =  <?=SheetCount()?>;

    var imageArray = new Array();
    for(var i=0; i<theNumberOfSheet; i++)
        imageArray[i] = "../../sheet/LOVERBATTERY_" + parseInt(i+1) + ".png";
        //var imageArray=["../note_images/lovebattery2.png",
        //"../note_images/lovebattery3.png" ];

    var imageIndex=0;

    function ChangeImage(){
        myImage.setAttribute("src",imageArray[imageIndex]);
        imageIndex++;
        if(imageIndex==imageArray.length){
            clearInterval(refreshIntervalId);
        }
    }
    var refreshIntervalId = setInterval(ChangeImage,5000);	// 첫 줄 9초

</script>
<a href="http://10.30.112.19/end.php"><img src='/image/home.png'></a>
<meta http-equiv='refresh' content='33;url=http://35.161.154.86/score/score_load.php'>

</body>
</html>

