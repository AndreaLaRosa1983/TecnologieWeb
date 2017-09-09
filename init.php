<!DOCTYPE html>
<html lang="it">
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
?>
<div class="container">
    <div class="row">
        <div class="col-sm-4">
            <br/>
            <p>Studenti Online è uno spazio riservato agli studenti dell'Alma Mater Studiorum - Università di Bologna, permette di svolgere comodamente online le procedure utili durante il percorso universitario, dall'immatricolazione alla laurea.</p>
            <p>Lo sportello virtuale ti permette di : </p>
            <ul>
                <li> Inserire ed aggiornare i tuoi dati anagrafici</li>
                <li> Iscriverti alle prove di ammissione e consultare le relative graduatorie</li>
                <li> Immatricolarti e iscriverti ad anni successivi al primo</li>
                <li> Verificare la situazione delle tasse universitarie ed effettuare i pagamenti</li>
                <li> Compilare il piano di studio</li>
                <li> Iscriverti agli esami e controllare la carriera universitaria</li>
                <li> Effettuare passaggi di corso, trasferimenti ad altro ateneo e rinunce agli studi</li>
                <li> Stampare autocertificazioni e certificati con timbro digitale</li>
                <li> Accedere ai programmi di scambio internazionale</li>
                <li> Presentare la domanda di laurea </li>
            </ul>
        </div>
        <div class="col-sm-8">
            <img class="edificio" src="images/edificio.jpg" alt="edificio" style="width: 72%; margin-top:5%; margin-left:25% " >
        </div>

    </div>
</div>
</html>
