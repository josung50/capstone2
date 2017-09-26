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
	    			<span style="font-size: -webkit-xxx-large;" height="90px">학교종</span> 
	    			<a style="float:right;" class="leftrightMargin"  href="./basic/school.php"><img src="../image/one.png" value = "school" height="90px" style="z-index:2"></a>
	    		</div>
	    	</div>
	    	
	    	<div>
	    		<div class="myclass" style="background-image: url(../image/musicbar.png);background-repeat:round;" width="900px" height="60px">
	    			<span style="font-size: -webkit-xxx-large;" height="90px">엘리제를 위하여</span> 
	    			<a style="float:right;" class="leftrightMargin"  href="./basic/elise.php"><img src="../image/one.png" height="90px" style="z-index:2"></a>
	    		</div>
	    	</div>
	    	
	    	<div>
	    		<div class="myclass" style="background-image: url(../image/musicbar.png);background-repeat:round;" width="900px" height="60px">
	    			<span style="font-size: -webkit-xxx-large;" height="90px">햇빛은 쨍쨍</span> 
	    			<a style="float:right;" class="leftrightMargin"  href="./basic/sun.php"><img src="../image/one.png" height="90px" style="z-index:2"></a>
	    		</div>
	    	</div>
	    	
	    	<div>
	    		<div class="myclass" style="background-image: url(../image/musicbar.png);background-repeat:round;" width="900px" height="60px">
	    			<span style="font-size: -webkit-xxx-large;" height="90px">작은별</span> 
	    			<a style="float:right;" class="leftrightMargin"  href="./basic/star.php" value = "star"><img src="../image/one.png"  height="90px" style="z-index:2"></a>
	    		</div>
	    	</div>
	    	

    	</section>
   	 
  		</form>
    </body>
</html> 