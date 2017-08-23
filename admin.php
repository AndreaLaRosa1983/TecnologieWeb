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

<div style="background-color:#66afe9; margin: 0 auto" class="jumbotron text-center" >
    <h1 style="color: white; font-family: 'Goudy Trajan Regular' ;
    font-weight: bold; min-font-size: 500%" >Pagina Amministratore <img src="images/admin.png" width=6% height=6% alt=”image.admin.png Logo – Admin” /> </h1>
</div>

<?php
include('core.php');
include('functions.php');
if(isset($_POST['register'])) {
    $username = isset($_POST['username']) ? clear($_POST['username']) : false;
    $password = isset($_POST['password']) ? clear($_POST['password']) : false;
    $email = isset($_POST['email']) ? clear($_POST['email']) : false;
    if(empty($username) || empty($password) || empty($email)){
        echo '<div class="col-sm-4">Riempi tutti i campi.<br /><br /><a href="javascript:history.back();"><span style="color:blue">Indietro</span></a></div>';
    } elseif (strlen($username) > 32 ){
        echo '<div class="col-sm-4">Username troppo lungo. Massimo 32 caratteri.<br /><br /><a href="javascript:history.back();"><span style="color:blue">Indietro</span></a></div>';
    } elseif (strlen($password) < 6 || strlen($password) > 16 ) {
        echo '<div class="col-sm-4">Password non valida (maggiore di 6 caratteri minore di 32)<br/><br/><a href="javascript:history.back();"><span style="color:blue">Indietro</span></a></div>';
    } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)){
        echo '<div class="col-sm-4">Indirizzo email non valido.</div>';
    } elseif (strlen($email) > 64 ){
        echo '<div class="col-sm-4">Indirizzo email troppo lungo. Massimo 64 caratteri.<br /><br /><a href="javascript:history.back();"><span style="color:blue">Indietro</span></a></div>';
    } elseif(mysqli_num_rows(mysqli_query($link,"SELECT * FROM utenti WHERE nome LIKE '$username'")) > 0){
        echo '<div class="col-sm-4">Username già in uso. Sei pregato di sceglierne un altro.<br/ ><br /> <a href="javascript:history.back();"><span style="color:blue">Indietro</span></a></div>';
    } elseif(mysqli_num_rows(mysqli_query($link,"SELECT * FROM utenti WHERE email LIKE '$email'")) > 0){
        echo '<div class="col-sm-4">Indirizzo email già in uso. Sei pregato di sceglierne un altro.<br /><br /> <a href="javascript:history.back();"><span style="color:blue">Indietro</span></a></div>';
    } else {
        $password = md5($password);
        $ip = $_SERVER['REMOTE_ADDR'];
        if (mysqli_query($link, "INSERT INTO utenti (nome,pswd,email,last_ip) VALUES ('$username','$password','$email','$ip')")) {
            if (mysqli_num_rows(mysqli_query($link, "SELECT * FROM utenti WHERE nome LIKE '$username' AND pswd='$password'")) > 0) {
                $row = mysqli_fetch_assoc(mysqli_query($link, "SELECT nome,id FROM utenti WHERE nome LIKE '$username'"));
                $_SESSION['username'] = $row['nome'];
                $_SESSION['userid'] = $row['id'];
                echo "<div class=\"col-sm-4\">Inserimento avvenuto con successo.<br>
     <a style='color:#1d6684' href=\"admin.php\">Clicca per proseguire</a>
     
     </div>";
            } else {
                echo 'Errore nella query: ' . mysqli_error($link);
            }
        }
    }
} else {
    ?>
    <div class="container">
        <div class="row">
            <div class="col-sm-4">

                <h3>Inserisci Utente</h3>
                <form action="<?php echo $_SERVER['PHP_SELF'] ?> " method="POST">
                    <label>Username: <input type="text" name="username" required maxlength="32"></label><br/>
                    <label>Password: <input type="password" name="password" required maxlength="32"></label><p>La password deve contenere almeno 6 caratteri</p>
                    <label>Email: <input type="email" name="email" required maxlength="64"></label><br/>
                    <input type="submit" name="register" value="Inserisci Utente"><br/><br/>

                </form>

        </div>


    <?php
}
?>
        <?php

        if(isset($_POST['news'])) {
            $title = isset($_POST['title']) ? clear($_POST['title']) : false;
            $urln = isset($_POST['urln']) ? clear($_POST['urln']) : false;
            if(empty($title) || empty($urln) ){
                echo '<div class="col-sm-4">Riempi tutti i campi.<br /><br /><a href="javascript:history.back();"><span style="color:blue">Indietro</span></a></div>';
            } elseif (strlen($title) > 140 ){
                echo '<div class="col-sm-4">Titolo troppo lungo. Massimo 140 caratteri.<br /><br /><a href="javascript:history.back();"><span style="color:blue">Indietro</span></a></div>';
            } elseif (strlen($urln) > 2083  ) {
                echo '<div class="col-sm-4">Url troppo grande <br/><br/><a href="javascript:history.back();"><span style="color:blue">Indietro</span></a></div>';
            } else {

                if (mysqli_query($link, "INSERT INTO news (new_url, new_title) VALUES ('$urln','$title')")) {
                    if (mysqli_num_rows(mysqli_query($link, "SELECT * FROM news WHERE new_url LIKE '$urln' AND new_title='$title'")) > 0) {
                        echo "<div class=\"col-sm-4\">Inserimento avvenuto con successo.<br>
     <a style='color:#1d6684' href=\"admin.php\">Clicca per proseguire</a>
    
     </div>
     ";
                    } else {
                        echo 'Errore nella query: ' . mysqli_error($link);
                    }
                }
            }
        } else {
        ?>


                <div class="col-sm-4">

                    <h3>News</h3>
                    <form action="<?php echo $_SERVER['PHP_SELF'] ?> " method="POST">
                        <label >Titolo: <input type="text" name="title" required maxlength="140"></label><br/>
                        <label>Url: <input type="text" name="urln" required maxlength="2083"></label><br/>
                        <input type="submit" name="news" value="Inserisci Notizia"><br/><br/>

                    </form>

                </div>

            <?php
            }
            ?>

            <div class="col-sm-4">

            <?php
            if (isset($_POST['submit']) && $_POST['submit']=="invia")
            {
                $titolo = addslashes($_POST['titolo']);
                $testo = addslashes($_POST['testo']);
                $str_data = strtotime($_POST['data']);
                include 'config.php';
                $sql = "INSERT INTO appuntamenti (titolo,testo,str_data, user_id) VALUES ('$titolo','$testo','$str_data','0')";

                if($result = mysqli_query($con,$sql) or die (mysqli_error($con)))
                {
            echo "<div class=\"col-sm-4\">Inserimento avvenuto con successo.<br>
     <a style='color:#1d6684' href=\"admin.php\">Clicca per proseguire</a>
     </div>";
                }
            }else{
                ?>
                <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
                    <h3> Inserisci nota Calendario Globale </h3>
                    <label>Titolo: <input name="titolo" type="text" required maxlength="255"></label><br>
                    <label>Testo: <textarea name="testo" cols="30" rows="8" required></textarea><label><br>
                    <label>Data: <input name="data" type="date" value="gg-mm-aaaa" required></label><br>
                    <input name="submit" type="submit" value="invia"><br>
                    <a style='color:#1d6684' href="admin_calendar.php">Cerca e Modifica nota Amministratore</a>

                </form>
                <?php
            }
            ?>

        </div>
</html>