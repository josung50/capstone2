<?php
require_once '../preset.php';
include '../header.php';
?>
<html>
    <head>
        <title>Maestro_점수 조회</title>
        <meta charset="utf-8" >
        <style>
        	#song{
        		margin-left:30%;
        	}
        </style>
    </head>
    <body>
	

	<!--
        <a href="./my_score.php">1.개인 점수 조회</a><br>
        <a href="./rank_score.php">2.전체 순위 조회</a><br>
	-->
	
	<form method ="get" name = "select_song" action="score_board.php">
		
	<div id="song">
	<select id= "selsong" name="song" style = "width:320px; font-size:20px" >
	<option label = "곡을 선택해주세요." value ="sel" > START </option>
	<optgroup label="BASIC">
		<option value="SCHOOL">학교 종</option> 
		<option value="SUN">햇빛은 쨍쨍</option>
		<option value="STAR">작은 별</option>
		<option value="ELISE">엘리제를 위하여</option> 

	</optgroup>

	<optgroup label="NORMAL"> 
   		<option value="CHOPSTICKS">젓가락 행진곡</option>
   		<option value="HARRYPOTTER">해리포터</option>
   		<option value="CINDERELLA">신데렐라</option>
   		

   		
	</optgroup>
	
	<optgroup label="HARD">
   		<option value="PIRATE">캐리비안의 해적</option>
   		<option value="LOVEBATTERY">사랑의 배터리</option>
   		<option value="TOTORO">이웃집 토토로</option>
   		
	</optgroup>

	
	</select>
	
	<input type = "image" src="../image/scorebtn.png" value = "랭킹 조회"	width="130px" height="30px">
	</div>
	</form>
	
<?php



$conn = mysqli_connect("35.161.154.86","root","dong8036","score"); // Check connection
if (mysqli_connect_errno()){
 echo "MySQL 연결 실패 : " . mysqli_connect_error();
}
$result = mysqli_query($conn,"select * from SCORE where song = '$song' order by score desc");
echo "</br><table style='margin-left:36%' border=1 bordercolor=white cellsapcing=0 bgcolor= gray>
<tr>
<th>순위</th>
<th>곡명</th>
<th>아이디</th>
<th>점수</th>
</tr>";

$no = 1;  // 리스트 번호를 나타냄
while($row = mysqli_fetch_array($result)){
 echo "<tr>";
 echo "<td>" . $no . "</td>";
 echo "<td>" . $row['song'] . "</td>";
 echo "<td>" . $row['user'] . "</td>";
 echo "<td>" . $row['score'] . "</td>";
 echo "</tr>";
 $no++;  // 리스트 번호를 1씩 증가시킴
}
echo "</table>";
mysqli_close($conn);
?>

    </body>
</html> 


<style>
        body{background-image: url(../image/back.png); background-size:cover;}
        	/*.myclass {
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
        	}*/
        </style>
<?php
    include '../footer.php';
?>
