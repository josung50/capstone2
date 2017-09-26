<?php
require_once '../preset.php';
include '../header.php';
?>
<html>
    <head>
        <title>Basic</title>
        <meta charset="utf-8">
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
    </head>
    <body>
    	<section style="height:420px;overflow:none;">


	    	<div>
	    		<div class="myclass" style="background-image: url(../image/musicbar.png);background-repeat:round;" width="900px" height="60px">
	    			<span style="font-size: -webkit-xxx-large;" height="90px">젓가락 행진곡</span> 
	    			<a style="float:right;" class="leftrightMargin"  href="./hard/chopsticks.php"><img src="../image/one.png" height="90px" style="z-index:2"></a>
	    		</div>
	    	</div>
	    	
	    	
	    	<div>
	    		<div class="myclass" style="background-image: url(../image/musicbar.png);background-repeat:round;" width="900px" height="60px">
	    			<span style="font-size: -webkit-xxx-large;" height="90px">해리포터</span> 
	    			<a style="float:right;" class="leftrightMargin"  href="./normal/harrypotter.php"><img src="../image/one.png" height="90px" style="z-index:2"></a>
	    		</div>
	    	</div>
	    	
	    	<div>
	    		<div class="myclass" style="background-image: url(../image/musicbar.png);background-repeat:round;" width="900px" height="60px">
	    			<span style="font-size: -webkit-xxx-large;" height="90px">신데렐라</span> 
	    			<a style="float:right;" class="leftrightMargin"  href="./normal/cinderella.php"><img src="../image/one.png" height="90px" style="z-index:2"></a>
	    		</div>
	    	</div>	    	
    	</section>
  
    </body>
</html> 