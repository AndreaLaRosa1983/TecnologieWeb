<?php
$host = 'localhost';
$user = 'root';
$pass = '';
$db = 'agenda';
$con = mysqli_connect($host,$user,$pass) or die (mysqli_error($con));
date_default_timezone_set("Europe/Rome");
mysqli_query($con,"CREATE DATABASE IF NOT EXISTS agenda");
mysqli_select_db($con,$db) or die (mysqli_error($con));

mysqli_query($con,"CREATE TABLE IF NOT EXISTS appuntamenti(
  id int(11) NOT NULL auto_increment,
  titolo varchar(255) NOT NULL default '',
  testo text NOT NULL,
  str_data int(10) NOT NULL default '0',
  user_id int(11) NOT NULL,
  PRIMARY KEY  (id)
)");

?>