<!DOCTYPE html>
<html lang="en">
<head>
  <title>News Ticker</title>
  <link rel="stylesheet" href="news-style.css">
  <script type="text/javascript" src="js/jquery-1.7.1.min.js"></script>
  <script type="text/javascript" src="js/jcarousellite_1.0.1.min.js"></script>

  <script>
$(document).ready(function() {
  $("#newsTicker").jCarouselLite({
      vertical: true,
      visible: 1,
      auto: 2000,
      speed: 800
  })
});
  </script>
</head>
<body>
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


// configurazione
define('NEWS_DIR', 'newsticker');

// array con l'elenco degli articoli
$articles = array();

// leggi elenco dei file
$handle = dir(NEWS_DIR);
while(false !== ($entry = $handle->read())) {
  $filename = NEWS_DIR . '/' . $entry;
  // considera solo i file con estensione .html
  if (is_dir($filename) || !preg_match("/\.html$/", $filename)) {
    continue;
  }
  
  array_push($articles, $filename);
}

// ordina al contrario
arsort($articles);
?>

<div class="newsTicker" id="newsTicker">
  <ul>
      <?php while ($row = mysqli_fetch_array($result)) {
          $tmp_title = $row["new_title"];
          $tmp_url = $row["new_url"];
          echo '<li><a class="aTicker" href="'.$row['new_url'].'" target="ifrm" >'.$row['new_title'].'</a></li>';
      } ?>
  </ul>
</div>

</body>
</html>
