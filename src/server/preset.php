<?php
session_start(); //세션초기화 및 상태유지를 위해 세션이 필요

$p = array();
$path['root'] = $_SERVER['DOCUMENT_ROOT'].'/';

$url = array();
$url['root'] = 'http://'.$_SERVER['HTTP_HOST'].'/'; 

require_once ($paath['root'].'config.php');

$mysqli = new mysqli($DB['host'], $DB['id'], $DB['pw'], $DB['db']);
if (mysqli_connect_error()) {
    exit('Connect Error (' . mysqli_connect_errno() . ') '. mysqli_connect_error());
}

extract($_POST);
extract($_GET);

?>
