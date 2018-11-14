<?php
require_once('lib/mysqlclass.php');

$db = new mySQL();
$db->connect('localhost','sacad','root');
if(isset($_POST['poster']))
{
	$poster = $db->select("SELECT id FROM posters WHERE code = ?",[$_POST['poster']]);
	$user = $db->select("SELECT id FROM users WHERE email = ?",[$_POST['user']]);
	if($poster->rowCount() == 0) {
		echo("Error. No table found with that code.");
	}
	if($user->rowCount() == 0) {
		echo("Error. No user found with that email.");
	}
	else {
		
		$posterID = $poster->fetchColumn();
		$userID = $user->fetchColumn();
		$db->insert("INSERT INTO votes(user_id, poster_id) VALUES (?, ?)",[$userID,$posterID]);
	}
}