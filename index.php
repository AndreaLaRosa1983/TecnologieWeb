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

<?php
include('core.php');
if(isset($_SESSION['username'])) {
    $userid = $_SESSION['userid'];
    $row = mysqli_fetch_assoc(mysqli_query($link,"Select * FROM utenti WHERE id='$userid'"));
    if($row['last_login'] == NULL) {
        echo 'Benvenuto, ' . $_SESSION['username'] . ' questo è il tuo primo accesso';
    } else if($row['last_login'] != NULL) {
        echo 'Bentornato, ' . $_SESSION['username'] . ' <br />Matricola: '. $_SESSION['userid'] .
            '<br />Il tuo ultimo login risale al giorno ' . date('d-m-y', $_SESSION['last_login']) .
            ' alle ore ' . date('H:i', $_SESSION['last_login']) ;
    }
}
else {
    echo "qualcosa è andato storto";
    header('Location: start.php');
}
?>

<div class="container">
    <div class="row">
        <div class="col-sm-4"></div>
        <div class="col-sm-4 " >


            <style>


                .menu-item, .menu-open-button {
                    background: #bb2e29;
                    border-radius: 100%;
                    width: 80px;
                    height: 80px;
                    margin-top: 120px;
                    margin-left: 100px;
                    position:absolute;
                    color: #ffffff;
                    line-height: 80px;
                    -webkit-transform: translate3d(0, 0, 0);
                    transform: translate3d(0, 0, 0);
                    -webkit-transition: -webkit-transform ease-out 200ms;
                    transition: -webkit-transform ease-out 200ms;
                    float: none;
                    align: center;
                }

                .menu-open {
                     display: none;
                 }
                .menu-open-button:hover{
                    background: #6b0808;
                    color: #ffffff;
                }
                .menu {
                    position: absolute;
                    width: 80px;
                    height: 80px;
                    text-align: center;
                    box-sizing: border-box;
                    font-size: 26px;
                }

                .menu-item:hover {
                    background: #6b0808;
                    color: #ffffff;
                }

                .menu-item:nth-child(3) {
                    -webkit-transition-duration: 180ms;
                    transition-duration: 180ms;
                }

                .menu-item:nth-child(4) {
                    -webkit-transition-duration: 180ms;
                    transition-duration: 180ms;
                }

                .menu-item:nth-child(5) {
                    -webkit-transition-duration: 180ms;
                    transition-duration: 180ms;
                }

                .menu-item:nth-child(6) {
                    -webkit-transition-duration: 180ms;
                    transition-duration: 180ms;
                }

                .menu-item:nth-child(7) {
                    -webkit-transition-duration: 180ms;
                    transition-duration: 180ms;
                }

                .menu-item:nth-child(8) {
                    -webkit-transition-duration: 180ms;
                    transition-duration: 180ms;
                }

                .menu-item:nth-child(9) {
                    -webkit-transition-duration: 180ms;
                    transition-duration: 180ms;
                }

                .menu-open-button {
                    z-index: 2;
                    -webkit-transition-timing-function: cubic-bezier(0.175, 0.885, 0.32, 1.275);
                    transition-timing-function: cubic-bezier(0.175, 0.885, 0.32, 1.275);
                    -webkit-transition-duration: 400ms;
                    transition-duration: 400ms;
                    -webkit-transform: scale(1.1, 1.1) translate3d(0, 0, 0);
                    transform: scale(1.1, 1.1) translate3d(0, 0, 0);
                    cursor: pointer;
                    box-shadow: 3px 3px 0 0 rgba(0, 0, 0, 0.14);
                }

                .menu-open-button:hover {
                    -webkit-transform: scale(1.2, 1.2) translate3d(0, 0, 0);
                    transform: scale(1.2, 1.2) translate3d(0, 0, 0);
                }

                .menu-open:checked + .menu-open-button {
                    -webkit-transition-timing-function: linear;
                    transition-timing-function: linear;
                    -webkit-transition-duration: 200ms;
                    transition-duration: 200ms;
                    -webkit-transform: scale(0.8, 0.8) translate3d(0, 0, 0);
                    transform: scale(0.8, 0.8) translate3d(0, 0, 0);
                }

                .menu-open:checked ~ .menu-item {
                    -webkit-transition-timing-function: cubic-bezier(0.935, 0, 0.34, 1.33);
                    transition-timing-function: cubic-bezier(0.935, 0, 0.34, 1.33);
                }

                .menu-open:checked ~ .menu-item:nth-child(3) {
                    transition-duration: 180ms;
                    -webkit-transition-duration: 180ms;
                    -webkit-transform: translate3d(0.08361px, -104.99997px, 0);
                    transform: translate3d(0.08361px, -104.99997px, 0);
                }

                .menu-open:checked ~ .menu-item:nth-child(4) {
                    transition-duration: 280ms;
                    -webkit-transition-duration: 280ms;
                    -webkit-transform: translate3d(90.9466px, -52.47586px, 0);
                    transform: translate3d(90.9466px, -52.47586px, 0);
                }

                .menu-open:checked ~ .menu-item:nth-child(5) {
                    transition-duration: 380ms;
                    -webkit-transition-duration: 380ms;
                    -webkit-transform: translate3d(90.9466px, 52.47586px, 0);
                    transform: translate3d(90.9466px, 52.47586px, 0);
                }

                .menu-open:checked ~ .menu-item:nth-child(6) {
                    transition-duration: 480ms;
                    -webkit-transition-duration: 480ms;
                    -webkit-transform: translate3d(0.08361px, 104.99997px, 0);
                    transform: translate3d(0.08361px, 104.99997px, 0);
                }

                .menu-open:checked ~ .menu-item:nth-child(7) {
                    transition-duration: 580ms;
                    -webkit-transition-duration: 580ms;
                    -webkit-transform: translate3d(-90.86291px, 52.62064px, 0);
                    transform: translate3d(-90.86291px, 52.62064px, 0);
                }

                .menu-open:checked ~ .menu-item:nth-child(8) {
                    transition-duration: 680ms;
                    -webkit-transition-duration: 680ms;
                    -webkit-transform: translate3d(-91.03006px, -52.33095px, 0);
                    transform: translate3d(-91.03006px, -52.33095px, 0);
                }

                .menu-open:checked ~ .menu-item:nth-child(9) {
                    transition-duration: 780ms;
                    -webkit-transition-duration: 780ms;
                    -webkit-transform: translate3d(-0.25084px, -104.9997px, 0);
                    transform: translate3d(-0.25084px, -104.9997px, 0);
                }

                .item-1 {
                    background-color: #bb2e29;
                    box-shadow: 3px 3px 0 0 rgba(0, 0, 0, 0.14);
                    text-shadow: 1px 1px 0 rgba(0, 0, 0, 0.12);
                }

                .item-1:hover {
                    color: #ffffff;
                    text-shadow: none;
                }

                .item-2 {
                    background-color: #bb2e29;
                    box-shadow: 3px 3px 0 0 rgba(0, 0, 0, 0.14);
                    text-shadow: 1px 1px 0 rgba(0, 0, 0, 0.12);
                }

                .item-2:hover {
                    color: #ffffff;
                    text-shadow: none;
                }

                .item-3 {
                    background-color: ##bb2e29;
                    box-shadow: 3px 3px 0 0 rgba(0, 0, 0, 0.14);
                    text-shadow: 1px 1px 0 rgba(0, 0, 0, 0.12);
                }

                .item-3:hover {
                    color: #ffffff;
                    text-shadow: none;
                }

                .item-4 {
                    background-color: #bb2e29;
                    box-shadow: 3px 3px 0 0 rgba(0, 0, 0, 0.14);
                    text-shadow: 1px 1px 0 rgba(0, 0, 0, 0.12);
                }

                .item-4:hover {
                    color: ##ffffff;
                    text-shadow: none;
                }

                .item-5 {
                    background-color: #bb2e29;
                    box-shadow: 3px 3px 0 0 rgba(0, 0, 0, 0.14);
                    text-shadow: 1px 1px 0 rgba(0, 0, 0, 0.12);
                }

                .item-5:hover {
                    color: #ffffff;
                    text-shadow: none;
                }

                .item-6 {
                    background-color: #bb2e29;
                    box-shadow: 3px 3px 0 0 rgba(0, 0, 0, 0.14);
                    text-shadow: 1px 1px 0 rgba(0, 0, 0, 0.12);
                }

                .item-6:hover {
                    color: #ffffff;
                    text-shadow: none;
                }

            </style>

            <body>
            <nav class="menu">
                <input type="checkbox" href="#" class="menu-open" name="menu-open" id="menu-open" />
                <label class="menu-open-button" for="menu-open"><i class="glyphicon glyphicon-cog"  ></i>  </label>
                <a href="foodpoint.php" class="menu-item item-1"> <i class="glyphicon glyphicon-cutlery"></i> </a>
                <a href="https://outlook.office365.com/studio.unibo.it" class="menu-item item-2"> <i class="glyphicon glyphicon-envelope"></i></a>
                <a href="#" class="menu-item item-3"> <i class="glyphicon glyphicon-calendar"></i> </a>
                <a href="#" class="menu-item item-4"> <i class="glyphicon glyphicon-book"></i> </a>
                <a href="#" class="menu-item item-5"> <i class="glyphicon glyphicon-bell"></i> </a>
                <a href="studyplaces.php" class="menu-item item-6"> <i class="glyphicon glyphicon-education"></i> </a>
            </nav>
            </body>
        </div>
    </div>
</html>





