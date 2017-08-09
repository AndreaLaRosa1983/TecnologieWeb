<!DOCTYPE html>
<html lang="en">
<head>
    <title>Agenda</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
</head>

<div class="jumbotron text-center">
    <?php include('menu.html'); ?>

    <h1 style="color: white; font-family: 'FabfeltScript Bold'; ">Agenda Appuntamenti<img src="images/logo.png" width=12%; height=12%; style=" margin-left: 20px"/>
</div></h1>



<div class="container">
    <div class="row">
        <div class="col-sm-12"><?php
if(isset($_GET['day']) && is_numeric($_GET['day']))
{
  $day = $_GET['day'];
  include 'config.php';
  $sql = "SELECT * FROM appuntamenti WHERE str_data=$day";
  $result = mysqli_query($con,$sql) or die (mysqli_error($con));
  if(mysqli_num_rows($result) > 0)
  {
    while($fetch = mysqli_fetch_array($result))
    {
      $id = stripslashes($fetch['id']);
      $titolo = stripslashes($fetch['titolo']);
      $testo = stripslashes($fetch['testo']);
      $data = date("d-m-Y", $fetch['str_data']); 
      echo "<h2> Note del <b>$data</b></h2><br><p> Titolo: " . $titolo . "</p><p> Nota: " . $testo . "</p><br>
      <a style='color: #d92432' href=\"cancella.php?id=$id\">Cancella</a> |
      <a style='color: #d92432' href=\"modifica.php?id=$id\">Modifica</a><br><br>
      <a style='color: #d92432' href=\"calendar.php\">Torna a Calendario</a>
      <hr>";
    }
  } 
}
?>
        </div>
    </div>
</div>
</html>

