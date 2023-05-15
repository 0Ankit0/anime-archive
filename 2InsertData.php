<?php
$user = "user"; 
$password = "password"; 
$host = "host"; 
$dbase = "database"; 
$table = "table"; 

$connection= mysql_connect ($host, $user, $password);
if (!$connection)
{
die ('Could not connect:' . mysql_error());
}
mysql_select_db($dbase, $connection);

if((!empty($description)) && ($success == 1)){
mysql_query("INSERT INTO $table (description, filename, fileextension)
VALUES ('$description', '$name', '$fileextension')");
}

mysql_close($connection);

?>
<p id="para6">Videos 


