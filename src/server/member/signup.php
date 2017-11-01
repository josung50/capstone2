<?php
    require_once '../preset.php';
    include '../signupheader.php';
?>

<html>
    <head>
        <style>
            body{ background-image: url(../image/back.png); background-size: cover;}
            #sizechange{
                width: 200px;
                height: 25px;
                margin-left: 23%;
            }
            #place{
                background-image: url(../image/signupform.png);
                width: 400px;height: 300px;
                padding:30px;
                margin-left:23%;
            }
            #btn{
                margin-left:32%;
            }

        </style>
	</head>

    <body>
             <form name="signup_form" method="post" action="./signup_check.php" >
                <div id="place">
                <input id="sizechange" type="text" name="user_id" value="아이디"/><br /><br />
                <input id="sizechange" type="password" name="user_pass"  placeholder="비밀번호" /><br /><br />
                <input id="sizechange" type="text" name="user_name" value="이름"/><br /><br />
                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                <input type="radio" name="user_gender" value="M" checked><FONT COLOR ="WHITE">남자</FONT>
                &nbsp;&nbsp;&nbsp;&nbsp;
                <input type="radio" name="user_gender" value="F" ><FONT COLOR ="WHITE">여자</FONT>  <br><br>

                <input id="btn" type="image" src="../image/signbtn.png" value="회원가입" width="130px" height="30px">
                <!--<input type="submit" value="회원가입" />-->
                </div>
            </form>
    </body>
</html>

<?php
    include '../footer.php';
?>
