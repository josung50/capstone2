<!DOCTYPE HTML>
<HTML>
    <HEAD>
        <TITLE>Maestro</TITLE>
        <meta charset="utf-8">
        <style>
        	a {
        		text-decoration: none;
        	}
        </style>
    </HEAD>
    <BODY>
	<div class="header">
            <!-- 헤더 -->
	</div>
	<!--<div class="content"></div>-->


<?php 

	//echo '<a href="http://'.$_SERVER['HTTP_HOST'].'">  홈   </a>'; 
	
$is_logged = $_SESSION['is_logged'];
if($is_logged=='YES') {
	echo '<div>';
	echo '<div style="float:right">';
	echo '<a href="http://'.$_SERVER['HTTP_HOST'].'/note/select_mode.php"> <img src="http://'.$_SERVER['HTTP_HOST'].'/image/play_top.png"> </a>'; 
	echo '<a href="http://'.$_SERVER['HTTP_HOST'].'/score/score_board.php"> <img src="http://'.$_SERVER['HTTP_HOST'].'/image/rank_top.png"> </a>';  
	echo '</div>';
	echo '<br>'; echo '<br>'; echo '<br>';
	echo '<div style="text-align:center">';
	echo '<a href="http://'.$_SERVER['HTTP_HOST'].'/member/login_done.php"> <img src="http://'.$_SERVER['HTTP_HOST'].'/image/home.png"> </a>';
    $user_id = $_SESSION['user_id'];
    echo '<font color="white" size="5">'.$user_id . ' 님</span>'; // 사용자 표시
	//echo '<span style="color:white">'$user_id . ' 님</span>';
	echo '<span><img width="250px" style="margin-left:3%" src="http://'.$_SERVER['HTTP_HOST'].'/image/maestro.png"></span>';
	echo '<a style="float:right margin-left:150%" href="http://'.$_SERVER['HTTP_HOST'].'"> <img height="30px" src="http://'.$_SERVER['HTTP_HOST'].'/image/logout.png"> </a>';
	echo '</div>';
	echo '</TABLE>';
	//echo '<a href="http://'.$_SERVER['HTTP_HOST'].'/member/logout.php">  로그아웃  </a>'; 
	//echo '<a id="play" href="http://'.$_SERVER['HTTP_HOST'].'/note/select_mode.php"><img src="www/html/image/play.png">연습모드</a>'; 
	//echo '<a href="http://'.$_SERVER['HTTP_HOST'].'/score/score_board.php"> 기록조회  </a>'; 
}
else {

    //echo '<a href="http://'.$_SERVER['HTTP_HOST'].'/member/login.php">로그인</a>'; 
}
?>
        
<?php
    echo $message;
?>

<hr/>
</head>
</body>