<?php
    include_once ("../SheetFunction.php");
?>

<script>
    popup=window.open("http://10.42.0.187/school.php",'player','top=500,left=800,width=10,height=10,status=0,toolbar=0,location=0,menubar=0,resizable=0,scrollbars=0');
</script>

<?php
    session_start();
    $_SESSION['play_song'] = 'ELISE';
?>

<?php
    chdir('../../sheet');
    if(!CheckSheetExist($_SESSION['play_song']))
        CreateSheet($_SESSION['play_song']);
?>

<html>
    <head>
        <title>Elise</title>
    </head>
	
	<body onload = "ScrollAuto();">
		<br/><br/>
        <script>
            // slide-show
            var theNumberOfSheet =  <?=CountSheet($_SESSION['play_song'])?>;
            console.log("the Number of Sheet : " + theNumberOfSheet);

            CreateImgTag(theNumberOfSheet, 'ELISE');
        </script>
	</body>

</html>



