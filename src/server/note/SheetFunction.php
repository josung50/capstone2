<?php
function CheckSheetExist($songName) {
    chdir('../../sheet/sheetimg');
    //if(file_exists(_SESSION["play_song"]+ '_1.png'))
    if(file_exists($songName + '_1.png'))
        return true;
    else
        return false;
}

function CreateSheet($songName) {
    chdir('../../sheet');
    //echo getcwd();
    $commend = "mono sheet.exe songs/" . $songName . ".mid" . " " . $songName;
    //echo $commend;
    exec($commend);
}

function CountSheet($songName) {
    $index = 1;
    while(file_exists($songName. "_" . $index . ".png")) {
        $index++;
    }
    return $index;
}
?>

<script language = "javascript">
    var position = 0;
    function ScrollAuto() {
        scroll(0, position);
        position += 0.5;
        var timer = setTimeout("ScrollAuto()" , 10);
        if(document.body.scrollHeight < position) {
            clearTimeout(timer);
            console.log("This is end of scroll");
            LoadScorePHP();
        }
    }

    function LoadScorePHP() {
        var scorePHP = document.createElement('meta');
        scorePHP.setAttribute('http-equiv', 'refresh');
        scorePHP.setAttribute('content', '1;url=http://35.161.154.86/score/score_load.php');
        document.body.append(scorePHP);
    }

    function CreateImgTag(theNumberOfSheet, songName) {
        var imageArray = new Array();
        for(var i = 1; i < theNumberOfSheet; i++) {
            imageArray[i] = "../../sheet/" + songName + "_" + parseInt(i) + ".png";
            var img = document.createElement('img');
            img.setAttribute("src" , imageArray[i]);
            document.body.append((img));
        }
    }
</script>
