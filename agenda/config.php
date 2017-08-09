<?php
$host = 'localhost';
$user = 'root';
$pass = '';
$db = 'agenda';
$con = mysqli_connect($host,$user,$pass) or die (mysqli_error($con));
mysqli_select_db($con,$db) or die (mysqli_error($con));

mysqli_query($con,"CREATE TABLE IF NOT EXISTS appuntamenti(
  id int(11) NOT NULL auto_increment,
  titolo varchar(255) NOT NULL default '',
  testo text NOT NULL,
  str_data int(10) NOT NULL default '0',
  PRIMARY KEY  (id)
)");

?>