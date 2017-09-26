<?php
require_once '../preset.php';
include '../header.php';

$is_logged = $_SESSION['is_logged'];
if($is_logged=='YES') {
    $user_id = $_SESSION['user_id'];
    //$message = $user_id . ' 님, 로그인 했습니다.';
}
else {
    $message = '로그인이 실패했습니다.';
}
?>
<html>
	<head>
		<style>
			div#menu
			{
				padding:0px;
			}
			
			body{
				background-image:url(/image/back.png);
				background-size:cover;
			}
			
			.textcenter {
				text-align:center;
			}
		</style>
	</head>
	<body>
		<div id="menu">
		<table width="100%">
        <tr class="textcenter">
        	<td><a href="../note/select_mode.php"><img src="../image/play.png"/></a></td>
        	<td><a href="../score/score_board.php"><img src="../image/rank.png"/></a></td>
        </tr>
		</table>
		</div>
	</body>
</html> 

        
<?php
    echo $message;
?>
<?php
    include '../footer.php';
?>
