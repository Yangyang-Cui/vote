<?php
header('Content-Type: application/json');
if(isset($_GET['email']{0})){
	require_once('settings.php');
	require_once('lib/mysqlclass.php');
	$db=new mySQL();
	$db->connect($settings['db/host'],$settings['db/name'],$settings['db/user'],$settings['db/password']);
	$result=$db->select('SELECT ID FROM users WHERE email=?',$_POST['e']);
	if($result->rowCount()>0) die(json_encode(['status'=>'OK','user_id'=>$sth->fetchColumn()]));
	$result=$db->insert('INSERT INTO users(email,firstname,lastname) VALUES(?,?,?)',[$_POST['e'],$_POST['f'],$_POST['l']]);
	die(json_encode(['status'=>'OK','user_id'=>$row['ID']]));
}