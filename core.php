<?php
$DB_host = 'localhost';
$DB_user = 'root';
$DB_password = '';
$DB_name = 'sol';
date_default_timezone_set("Europe/Rome");

$link = mysqli_connect($DB_host, $DB_user, $DB_password);
mysqli_select_db($link,$DB_name) or die("impossibile connettersi.".mysqli_error($link));

mysqli_query($link,"CREATE TABLE IF NOT EXISTS utenti(id INT NOT NULL AUTO_INCREMENT PRIMARY KEY, nome VARCHAR(32) NOT NULL, pswd VARCHAR(32) NOT NULL,
 email VARCHAR(64), last_ip VARCHAR(20), last_login INT)");

function clear($var) {
    return addslashes(htmlspecialchars(trim($var)));
}

?>

