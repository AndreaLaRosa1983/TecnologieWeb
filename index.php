
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

<div class="container">
    <div class="row">
        <div class="col-sm-4"></div>
        <div class="col-sm-4 " >
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


            <style>


                .menu-item, .menu-open-button {
                    background: #bb2e29;
                    border-radius: 100%;
                    width: 80px;
                    height: 80px;
                    margin-top:70%;
                    position:absolute;
                    color: #bb2e29;
                    line-height: 80px;
                    -webkit-transform: translate3d(0, 0, 0);
                    transform: translate3d(0, 0, 0);
                    -webkit-transition: -webkit-transform ease-out 200ms;
                    transition: -webkit-transform ease-out 200ms;
                    float: none;
                    align: center;
                }

                .menu-open { display: none; }

                .lines {
                    width: 25px;
                    height: 3px;
                    background: #596778;
                    display: block;
                    position: absolute;
                    top: 50%;
                    left: 50%;
                    margin-left: -12.5px;
                    margin-top: -1.5px;
                    -webkit-transition: -webkit-transform 200ms;
                    transition: -webkit-transform 200ms;
                }

                .line-1 {
                    -webkit-transform: translate3d(0, -8px, 0);
                    transform: translate3d(0, -8px, 0);
                }

                .line-2 {
                    -webkit-transform: translate3d(0, 0, 0);
                    transform: translate3d(0, 0, 0);
                }

                .line-3 {
                    -webkit-transform: translate3d(0, 8px, 0);
                    transform: translate3d(0, 8px, 0);
                }

                .menu-open:checked + .menu-open-button .line-1 {
                    -webkit-transform: translate3d(0, 0, 0) rotate(45deg);
                    transform: translate3d(0, 0, 0) rotate(45deg);
                }

                .menu-open:checked + .menu-open-button .line-2 {
                    -webkit-transform: translate3d(0, 0, 0) scale(0.1, 1);
                    transform: translate3d(0, 0, 0) scale(0.1, 1);
                }

                .menu-open:checked + .menu-open-button .line-3 {
                    -webkit-transform: translate3d(0, 0, 0) rotate(-45deg);
                    transform: translate3d(0, 0, 0) rotate(-45deg);
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
                    background: #d92432;
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
                    background-color: #669AE1;
                    box-shadow: 3px 3px 0 0 rgba(0, 0, 0, 0.14);
                    text-shadow: 1px 1px 0 rgba(0, 0, 0, 0.12);
                }

                .item-1:hover {
                    color: #669AE1;
                    text-shadow: none;
                }

                .item-2 {
                    background-color: #70CC72;
                    box-shadow: 3px 3px 0 0 rgba(0, 0, 0, 0.14);
                    text-shadow: 1px 1px 0 rgba(0, 0, 0, 0.12);
                }

                .item-2:hover {
                    color: #70CC72;
                    text-shadow: none;
                }

                .item-3 {
                    background-color: #FE4365;
                    box-shadow: 3px 3px 0 0 rgba(0, 0, 0, 0.14);
                    text-shadow: 1px 1px 0 rgba(0, 0, 0, 0.12);
                }

                .item-3:hover {
                    color: #FE4365;
                    text-shadow: none;
                }

                .item-4 {
                    background-color: #C49CDE;
                    box-shadow: 3px 3px 0 0 rgba(0, 0, 0, 0.14);
                    text-shadow: 1px 1px 0 rgba(0, 0, 0, 0.12);
                }

                .item-4:hover {
                    color: #C49CDE;
                    text-shadow: none;
                }

                .item-5 {
                    background-color: #FC913A;
                    box-shadow: 3px 3px 0 0 rgba(0, 0, 0, 0.14);
                    text-shadow: 1px 1px 0 rgba(0, 0, 0, 0.12);
                }

                .item-5:hover {
                    color: #FC913A;
                    text-shadow: none;
                }

                .item-6 {
                    background-color: #62C2E4;
                    box-shadow: 3px 3px 0 0 rgba(0, 0, 0, 0.14);
                    text-shadow: 1px 1px 0 rgba(0, 0, 0, 0.12);
                }

                .item-6:hover {
                    color: #62C2E4;
                    text-shadow: none;
                }

                .citem-3it {
                    margin: 24px 20px 120px 0;
                    text-align: right;
                    color: #ee3939;
                }

                .citem-3it a {
                    padding: 8px 0;
                    color: #C49CDE;
                    text-decoration: none;
                    transition: all 0.3s ease 0s;
                }

                .citem-3it a:hover { text-decoration: underline; }
            </style>

            <body>
            <nav class="menu">
                <input type="checkbox" href="#" class="menu-open" name="menu-open" id="menu-open" />
                <label class="menu-open-button" for="menu-open"> <span class="lines line-1"></span> <span class="lines line-2"></span> <span class="lines line-3"></span> </label>
                <a href="#" class="menu-item item-1"> <i class="fa fa-anchor"></i> </a> <a href="#" class="menu-item item-2"> <i class="fa fa-coffee"></i> </a> <a href="#" class="menu-item item-3"> <i class="fa fa-heart"></i> </a> <a href="#" class="menu-item item-4"> <i class="fa fa-microphone"></i> </a> <a href="#" class="menu-item item-5"> <i class="fa fa-star"></i> </a> <a href="#" class="menu-item item-6"> <i class="fa fa-diamond"></i> </a> </nav>
            </body>
            <script>
                (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
                    (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
                    m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
                })(window,document,'script','//www.google-analytics.com/analytics.js','ga');

                ga('create', 'UA-46156385-1', 'cssscript.com');
                ga('send', 'pageview');

            </script>
        </div>
    </div>
</html>





