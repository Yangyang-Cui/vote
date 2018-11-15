<?php
header('Content-Type: application/json');
require_once('settings.php');
require_once('lib/mysqlclass.php');

$db=new mySQL();
$db->connect($settings['db/host'],$settings['db/name'],$settings['db/user'],$settings['db/password']);
if(!isset($_POST['poster_code']) || !isset($_POST['user_ID'])){
	$result=$db->select('SELECT ID FROM posters WHERE code=?',[$_POST['poster_code']]);
	if($result->rowCount()==0) die(json_encode(['status'=>'error','message'=>'No poster found with that code.']));
	$poster_ID= $poster->fetchColumn();
	$result=$db->insert('INSERT INTO votes(user_ID,poster_ID) VALUES(?,?)',[$_POST['userID'],$poster_ID]);
	die(json_encode(['status'=>'OK','message'=>'Vote registered.']));
}