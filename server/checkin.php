<?php
header('Content-Type: application/json');
if(isset($_POST['fname']{0}) && isset($_POST['lname']{0}) && isset($_POST['uemail']{0})){
	require_once('settings.php');
	require_once('lib/mysqlclass.php');
	$sql=new mySQL();
	$db->connect($settings['db/host'],$settings['db/name'],$settings['db/user'],$settings['db/password']);
	$result=$db->select('SELECT ID FROM users WHERE email=?',$_POST['uemail']);
	if($result->rowCount()>0) die(json_encode(['status'=>'OK','user_id'=>$sth->fetchColumn()]));
	$result=$db->insert('INSERT INTO users(email,firstname,lastname) VALUES(?,?,?)',[$_POST['uemail'],$_POST['fname'],$_POST['lname']]);
	die(json_encode(['status'=>'OK','user_id'=>$row['ID']]));
}