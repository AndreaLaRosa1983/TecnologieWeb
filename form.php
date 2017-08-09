<?php
if (isset($_POST['submit']) && $_POST['submit']=="invia")
{
  $titolo = addslashes($_POST['titolo']);
  $testo = addslashes($_POST['testo']);
  $str_data = strtotime($_POST['data']);
  $user_id = $_SESSION['userid'];
    include 'config.php';
    $sql = "INSERT INTO appuntamenti (titolo,testo,str_data, user_id) VALUES ('$titolo','$testo','$str_data','$user_id')";

  if($result = mysqli_query($con,$sql) or die (mysqli_error($con)))
  {
    echo "Inserimento avvenuto con successo.<br>
     <a style='color: #d92432' href=\"calendar.php\">Clicca per proseguire</a>";
  }
}else{
  ?>
<form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
    <p> Inserisci nuova nota</p>
Titolo:<br>
<input name="titolo" type="text"><br>
Testo:<br>
<textarea name="testo" cols="30" rows="8"></textarea><br>
Data:<br>
<input name="data" type="date" value="gg-mm-aaaa">
<input name="submit" type="submit" value="invia">
</form>
  <?php
}
?>