
<?php
	require_once '../preset.php';
	include '../header.php';
		
	$is_logged = $_SESSION['is_logged'];
	if($is_logged=='YES') {
		$user_id = $_SESSION['user_id'];
		}
	else {
		echo '<a href="http://'.$_SERVER['HTTP_HOST'].'/member/login.php">로그인</a>'; 
		}
	
	
?>

<html>
<head>

</head>
<body>
<a>...scoring...please wait...</a>
<!--meta http-equiv='refresh' content='10;url=http://10.30.116.201/test.php'-->
<meta http-equiv='refresh' content='5;url=http://35.161.154.86/score/my_score.php'>
</body>
</html>
<style>
        body{background-image: url(../image/back.png); background-size:cover;}
        	.myclass {
        		height:100px;
        		width:100%;
        		text-align:center;
        		padding-top:30px;
        	}
        	.leftrightMargin {
        		margin-left:10px;
        		margin-right:10px;
        	}
        	.marginzero {
        		margin:0px;
        	}
        	.MusicName {
        		margin-top: 100px;
        	}
</style>
