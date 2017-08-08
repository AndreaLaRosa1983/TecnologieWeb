
<?php

$DB_host = 'localhost';
$DB_user = 'root';
$DB_password = '';
$DB_name = 'sol';
date_default_timezone_set("Europe/Rome");

$link = mysqli_connect($DB_host, $DB_user, $DB_password);
mysqli_select_db($link,$DB_name) or die("impossibile connettersi.".mysqli_error($link));

mysqli_query($link,"CREATE TABLE IF NOT EXISTS news(idn INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
 new_title VARCHAR(140) NOT NULL, new_url VARCHAR(2083) NOT NULL)");




$result = mysqli_query($link,"SELECT * FROM news");




?>


<link rel="stylesheet" href="news-style.css" type="text/css">

<div id="tickr-box">
    <div class="tickr-title">Unibo News</div>
    <div id="tickr-scroll">
        <ul>
            <?php while ($row = mysqli_fetch_array($result)) {
                $tmp_title = $row["new_title"];
                $tmp_url = $row["new_url"];
            echo '<li><a href="'.$row['new_url'].'" target="ifrm">'.$row['new_title'].'</a></li>';
            } ?>
        </ul>
    </div>
</div>
<?php mysqli_free_result($result); ?>
