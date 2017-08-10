<!DOCTYPE html>
<html lang="it">
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

    <h1 style="color: white; font-family: 'FabfeltScript Bold'; ">Agenda Appuntamenti<img src="images/logo.png" width=12%; height=12%; style=" margin-left: 20px" alt=”image.logo.png Logo – Unibo”/>
</div></h1>



<div class="container">
    <div class="row">
        <div class="col-sm-12"><?php
include 'config.php';
if (isset($_GET['id']) && is_numeric($_GET['id']))
{
  $del_id = $_GET['id'];
  $query = mysqli_query($con,"SELECT titolo, str_data FROM appuntamenti WHERE id ='$del_id'");
  $fetch = mysqli_fetch_array($query);
  $titolo = $fetch['titolo'];
  $data = date("d-m-Y", $fetch['str_data']); 
  ?>
<form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
<h1>Attenzione!</h1>
Si sta per eliminare l'appuntamento
<b><?php echo stripslashes($titolo); ?></b> 
del <?php echo stripslashes($data); ?>.<br>
Confermare per eseguire l'operazione.<br>

<br>
<input name="del_id" type="hidden" value="<?php echo $del_id; ?>">
<input name="submit" type="submit" value="Cancella"><br><br><br>
    <a href="javascript:history.back();"><span style="color:#d92432">Indietro</span></a>
</form>
  <?php
}
elseif(isset($_POST['del_id']) && is_numeric($_POST['del_id']))
{
  $del_id2 = $_POST['del_id'];
  if (mysqli_query($con,"DELETE FROM appuntamenti WHERE id = '$del_id2'")or die(mysql_error()))
  {
    echo "Cancellazione del servizio avvenuta con successo<br>
    <a style='color: #d92432' href=\"calendar.php\">Clicca per proseguire</a>";
  }
}
?>
        </div>
    </div>
</div>
</html>

