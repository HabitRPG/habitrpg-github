<?php
/* Save this file as connect.php and input your credentials below.
 * Don't worry, it's in the .gitignore so you you won't accidentally push it.
 */

define("MYSQL_PREFIX",""); // this is the prefix added to tables in your DB
$hostname = "";
$username = "";
$password = "";
$dbname = "";
$db= new PDO("mysql:host=".$hostname.";dbname=".$dbname.";charset=utf8", $username, $password);

$website = "http://localhost/HabitRPG-GitHub";
?>
