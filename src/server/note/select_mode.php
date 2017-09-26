<?php
require_once '../preset.php';
include '../header.php';
?>
<html>
    <head>
        <title>Maestro_단계 선택</title>
        <meta charset="utf-8" >
        <style>

        body
        {
        	background-image:url('../image/back.png');
        	background-size:cover;
        }

			div#menu
			{
				padding:50px 0px 50px 0px;
			}
        </style>
    </head>
    <body>
    	<div id="menu">
		<table width="1000px" align="center" padding="25px">
        <tr>
        	<td><a href="./basic.php"><img src="../image/basic_btn.png"/></a></td>
        	<td><a href="./normal.php"><img src="../image/normal_btn.png"/></a></td>
        	<td><a href="./hard.php"><img src="../image/hard_btn.png"/></a></td>
        </tr>
		</table>
		</div>
    </body>
</html> 

<?php
    include '../footer.php';
?>
