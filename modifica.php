<!DOCTYPE html>
<html lang="en">
<head>
    <title>Studenti Online</title>
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
include 'config.php';
if(isset($_POST['mod_id'])&&(is_numeric($_POST['mod_id'])))
{
  $id = $_POST['mod_id'];
  $titolo = addslashes($_POST['titolo']);
  $testo = addslashes($_POST['testo']);
  $str_data = strtotime($_POST['data']);
  $sql = "UPDATE appuntamenti SET titolo='$titolo', testo='$testo', str_data='$str_data' WHERE id = $id";
  if(mysqli_query($con,$sql) or die (mysqli_error($con)))
  {
    echo "Modifica effettuata con successo.<br>
    Vai al <a href=\"calendar.php\">Calendario</a>";
  }
}
elseif (isset($_GET['id']) && is_numeric($_GET['id']))
{
  $id = $_GET['id'];
  $query = mysqli_query($con,"SELECT titolo,testo,str_data,user_id FROM appuntamenti WHERE id = $id") or die (mysqli_error($con));
  $fetch = mysqli_fetch_array($query)or die (mysqli_error($con));
  $titolo = stripslashes($fetch['titolo']);
  $testo = stripslashes($fetch['testo']);
  $data = date("d-m-Y", $fetch['str_data']);
  $user = $fetch['user_id'];
  ?>
<form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">Titolo:<br>
<input name="titolo" type="text" value="<?php echo $titolo; ?>">
<br>Testo:<br>
<textarea name="testo" cols="30" rows="8">
<?php echo $testo; ?>
</textarea>
<br>Data:<br>
<input name="data" type="date" value="<?php echo $data; ?>">
<input name="mod_id" type="hidden" value="<?php echo $id; ?>">
<input name="submit" type="submit" value="modifica"><br><br><br>
    <a href="javascript:history.back();"><span style="color:#d92432">Indietro</span></a>
</form>
  <?php
}
?>
        </div>
    </div>
</div>
</html>

