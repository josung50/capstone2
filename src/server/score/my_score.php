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
	
	
	
	//echo $user_id;
	
	

	$conn = mysqli_connect("35.161.154.86","root","dong8036","score");
	if (mysqli_connect_errno()){
 		echo "MySQL 연결 실패 : " . mysqli_connect_error();
	}




	// 가장 최근에 저장된 데이터를 화면에 출력	 
	$select_sql = "select * from SCORE order by idx desc limit 1";
	$result = mysqli_query($conn, $select_sql);
	$row = mysqli_fetch_array($result);
	

	echo "<div id=scoreboard>";
	
	echo "<p style='padding-top:10%; font-size:150px; margin:0px'>" . $row['score'] . "</p>";
	echo "</div>";

	
?>
	<html>
	<head>
	<body>
	
	</body>
	</head>
	</html>

	<br/>
	<div id="btn">
		<a href="http://35.161.154.86/note/select_mode.php"><input type="image" src='../image/othersong.png' value="다른 곡 선택"></a>
		<a href="http://35.161.154.86/score/score_board.php"><input type="image" src='../image/rankcheck.png' value="점수 보러가기" margin-left="30px"></a>
	</div>


<style>
        body{background-image: url(../image/back.png); background-size:cover;}
        	.myclass {
        		height:100px;
        		width:100%;
        		text-align:center;
        		padding-top:30px;
        	}
        	#scoreboard{
        		background-image: url(../image/scoreback.png);
        		width: 500px;
        		height:300px;
        		text-align:center;
        		margin:auto;
        	}
        	#btn{
        		margin-left:515px;
        	}
        </style>
