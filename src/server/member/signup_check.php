<?php
require_once '../preset.php';
?>
<?php

$encryped_pass = sha1($user_pass);

$q = "INSERT INTO ACCOUNT ( id, pw, name, gender ) VALUES ( '$user_id', '$encryped_pass', '$user_name', '$user_gender' )";

$mysqli->query( $q);

$mysqli->close($mysqli);


header('Location: '.$url['root'].'member/signup_done.php');

exit();

?>
