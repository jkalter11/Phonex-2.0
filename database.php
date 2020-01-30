<?php
$url='remotemysql.com:3306';
$username='eZMLzIRbtY';
$password='wqaoQiRKaF';
$conn=mysqli_connect($url,$username,$password,"crud");
if(!$conn){
 die('Could not Connect My Sql:' .mysql_error());
}
?>
