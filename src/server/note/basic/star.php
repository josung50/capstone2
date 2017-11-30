<?php
    include_once ("../SheetFunction.php");
?>

<script>
    //popup=window.open("http://10.42.0.187/star.php",'player','top=500,left=800,width=10,height=10,status=0,toolbar=0,location=0,menubar=0,resizable=0,scrollbars=0');
</script>

<?php
    session_start();
    $_SESSION['play_song'] = 'STAR';
	
	$user_ip[] = $_SERVER["REMOTE_ADDR"];
	//echo $user_ip[0];

	$rasp_songfile = 'star.php';
?>

<script>

    popup=window.open("http://<?php echo $user_ip[0];?>/<?php echo $rasp_songfile;?>",'player','top=500,left=800,width=10,height=10,status=0,toolbar=0,location=0,menubar=0,resizable=0,scrollbars=0');
</script>

<?php
    // 현재 경로 -> php파일이 있는 경로
    // sheet.exe가 있는 경로로 이동해야 한다.
    chdir('../../sheet');
    if(!CheckSheetExist($_SESSION['play_song']))
        CreateSheet($_SESSION['play_song']);
?>

<html>
    <head>
        <title>Star</title>
    </head>
	
	<body onload = "ScrollAuto();">
        <br/><br/>
        <script>
            // slide-show
            var theNumberOfSheet =  <?=CountSheet($_SESSION['play_song'])?>;
            console.log("the Number of Sheet : " + theNumberOfSheet);

            CreateImgTag(theNumberOfSheet, 'STAR');
        </script>
	</body>
</html>






