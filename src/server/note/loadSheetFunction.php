<?php
function CheckSheetExist($fileName) {
    chdir('../../sheet/sheetimg');
    //if(file_exists(_SESSION["play_song"]+ '_1.png'))
    if(file_exists($fileName))
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

function SheetCount($songName) {
    $index = 1;
    while(file_exists($songName. "_" . $index . ".png")) {
        $index++;
    }
    return $index - 1;
}
?>