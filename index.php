
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
    <h1 style="color: white; font-family: 'FabfeltScript Bold'; ">Studenti Online<img src="images/logo.png" width=12%; height=12%; style=" margin-left: 20px"/></h1>
</div>

<div class="container-fluid">
    <div class="row">
        <div class="col-sm-12">
            <h3>Inizio</h3>
<?php
include('core.php');
if(isset($_SESSION['username'])) {
    $userid = $_SESSION['userid'];
    $row = mysqli_fetch_assoc(mysqli_query($link,"Select * FROM utenti WHERE id='$userid'"));
    if($row['last_login'] == NULL) {
        echo 'Benvenuto, ' . $_SESSION['username'] . ' questo è il tuo primo accesso';
    } else if($row['last_login'] != NULL) {
        echo 'Bentornato, ' . $_SESSION['username'] . '.<br />il tuo ultimo login risale al giorno ' . date('d-m-y', $row['last_login']) .
        ' alle ore ' . date('H:i', $row['last_login']);
    }
    }
    else {
    echo "qualcosa è andato storto";
    header('Location: ok.php');
}
?>
        </div>
    </div>
</div>

