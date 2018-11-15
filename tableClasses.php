<?php

class csv {
function printHeader($row){
    echo'<tr>';
    foreach($row as $col)echo'<th>'.$col.'</th>';
    echo'</tr>';
}#end of printHeader

function printRow($row,$id){
  if(count($row)<3) return;
  echo'<tr>';
  echo'<td><a href="detail.php?id='.$id.'">'.$row[0].'</a></td>';
  echo'<td>'.$row[1].'</td>';
  echo'<td>'.$row[2].'</td>';
  echo'<td><img src="'.$row[3].'" width="100"/></td>';
  echo'<td><a href="http://localhost/my_imdb/modify.php?id='.$id.'">Modify this entry</a></td>';
  echo'</tr>';
}#end of printRow

function printDetailRow($row,$id){
  if(count($row)<3) return;
  echo'<tr>';
  echo'<td>'.$row[0].'</td>';
  echo'<td>'.$row[1].'</td>';
  echo'<td>'.$row[2].'</td>';
  echo'<td><img src="'.$row[3].'" width="100"/></td>';
  echo'</tr>';
}#end of printRow

}#end of csv class

class database{
/*change the string values associated with row for the proper column names.*/
function tableRow($result){
while ($row=$result->fetch()){
echo ("<tr>");
# Fix this line, needs to grab the return from the count function.
# Ask Nicholas
echo ("<td>".$row['votes'."</td>"]);

echo ("<td>".$row['ID']."</td>");

echo ("<td>".$row['title']."</td>");
echo('</tr>');
};
}#end of tableRow
}#end of database class
