<?php
require_once('lib/mysqlclass.php');

$db = new mySQL();
$db->connect('localhost','sacad','root');
if(isset($_POST['poster'])&&isset($_POST['userID']))
{
	$poster = $db->select("SELECT id FROM posters WHERE code = ?",[$_POST['poster']]);
	if($poster->rowCount() == 0) {
		echo("Error. No poster found with that code.");
	}
	else {
		
		$posterID = $poster->fetchColumn();
		$db->insert("INSERT INTO votes(user_id, poster_id) VALUES (?, ?)",[$_POST['userID'],$posterID]);
	}
}