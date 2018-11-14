<?php
echo '<table border=1 class="table table-striped table-dark">';
require_once('tableClasses.php');
require_once('mysqlclass.php');
$mySQL = new MYSQL() ;
$creating = new csv;
$databases = new database;
/* change which database that you want to access here. It is the second string entry. */
# need to get the votes from the database
$mySQL->connect('localhost','sacad','root');

# need to count the amount of votes for each poster
#   Would this be by poster_id?
#   Have to check and ensure that each user_id is only used once!!
/*
$result = $mySQL -> select ('SELECT p.ID,p.title FROM posters AS p LEFT JOIN votes AS v ON p.id = v.poster_id');

#$table = $result -> fetch ();
while($row = $result -> fetch()){
  print_r ( $row );
}
*/

$creating->printHeader(['Votes','ID',' Poster Title']);

$count = $mySQL -> query ( 'SELECT COUNT(v.poster_id) AS votes, p.ID,p.title FROM posters AS p LEFT JOIN votes AS v ON p.id = v.poster_id GROUP BY p.id ORDER BY votes DESC' );

$databases->tableRow($count);
