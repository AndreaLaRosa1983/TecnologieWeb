<!DOCTYPE html>
<html lang="en">
<head>
    <title>UNIBO</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
</head>

<div style="margin: 0 auto" class="jumbotron text-center">
    <?php include('menu.html'); ?>
    <h1 style="color: white; font-family: 'Goudy Trajan Regular' ;
    font-weight: bold; min-font-size: 500%" >UNIBO <img src="images/logo.png" width=12% height=12% /> </h1>
</div>

<?php
include('core.php');
if(isset($_POST['logout'])) {
    session_unset($_SESSION['username']);
    session_unset($_SESSION['userid']);
    header('Location: start.php');
    }
    else if(isset($_POST['torna_indietro'])) {
        header('Location: index.php');
    }
?>
    <div class="container">
        <div class="row">
            <div class="col-sm-6">
                <h3>Sei sicuro di volere uscire?</h3>
                <form action="" method="post">
                    <input type="submit" name="logout" value="LogOut">
                    <input type="submit" name="torna_indietro" value="Stay">
                </form>
            </div>
        </div>
    </div>

