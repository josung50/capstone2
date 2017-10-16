<?php
session_start();
$_SESSION['play_song'] = 'LOVEBATTERY';
?>

<?php
//악보 존재여부 체크
$file_name = "http://35.161.154.86/note/hard/LOVERBATTERY_1.png";
function FileExistCheck($file_path) {
    if(file_exists($file_path))
        return true;
    else
        return false;
    }
?>
<?php
//echo shell_exec("ls");
echo shell_exec("ls");
$command = "mono ../../sheet/sheet.exe";
$midi_file_path = "../../songs/LOVERBATTERY.mid";
$sheet_name = "LOVERBATTERY";
echo shell_exec('"'.$command.'" "'.$midi_file_path.'" "'.$sheet_name.'"');
//echo shell_exec('mono ../../sheet/sheet.exe "'.$midi_file_path.'" "'.$sheet_name.'"');
//echo FileExistCheck(file_name);
/*
if(FileExistCheck($file_name) == 1){
    echo "<img src=\"LOVERBATTERY_1.png\" id=\"mainImage\">";
}
else {
    //echo shell_exec('mono ../../sheet/sheet.exe LOVERBATTERY.mid LOVERBATTERY');
    //echo shell_exec("mono ../../sheet/sheet.exe");
    //echo "<pre>$command</pre>";
    //echo "<img src=\"LOVERBATTERY_1.png\" id=\"mainImage\">";
}
*/
?>






