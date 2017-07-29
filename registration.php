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
if(isset($_POST['register'])) {
    $username = isset($_POST['username']) ? clear($_POST['username']) : false;
    $password = isset($_POST['password']) ? clear($_POST['password']) : false;
    $email = isset($_POST['email']) ? clear($_POST['email']) : false;
    if(empty($username) || empty($password) || empty($email)){
        echo 'Riempi tutti i campi.<br /><br /><a href="javascript:history.back();">Indietro</a>';
    } elseif (strlen($username) > 32 ){
        echo 'Username troppo lungo. Massimo 32 caratteri.<br /><br /><a href="javascript:history.back();">Indietro</a>';
    } elseif (strlen($password) < 6 || strlen($password) > 16 ) {
        echo 'Password non valida (maggiore di 6 caratteri minore di 32)<br/><br/><a href="javascript:history.back();">Indietro</a>';
    } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)){
        echo 'Indirizzo email non valido.';
    } elseif (strlen($email) > 64 ){
        echo 'Indirizzo email troppo lungo. Massimo 64 caratteri.<br /><br /><a href="javascript:history.back();">Indietro</a>';
    } elseif(mysqli_num_rows(mysqli_query($link,"SELECT * FROM utenti WHERE nome LIKE '$username'")) > 0){
        echo 'Username già in uso. Sei pregato di sceglierne un altro.<br/ ><br /> <a href="javascript:history.back();">Indietro</a>';
    } elseif(mysqli_num_rows(mysqli_query($link,"SELECT * FROM utenti WHERE email LIKE '$email'")) > 0){
        echo 'Indirizzo email già in uso. Sei pregato di sceglierne un altro.<br /><br /> <a href="javascript:history.back();">Indietro</a>';
    } else {
        $password = md5($password);
        $ip = $_SERVER['REMOTE_ADDR'];
        if (mysqli_query($link, "INSERT INTO utenti (nome,pswd,email,last_ip) VALUES ('$username','$password','$email','$ip')")) {
            if (mysqli_num_rows(mysqli_query($link, "SELECT * FROM utenti WHERE nome LIKE '$username' AND pswd='$password'")) > 0) {
                $row = mysqli_fetch_assoc(mysqli_query($link, "SELECT nome,id FROM utenti WHERE nome LIKE '$username'"));
                $_SESSION['username'] = $row['nome'];
                $_SESSION['userid'] = $row['id'];
                header('Location: index.php');
            } else {
                echo 'Errore nella query: ' . mysqli_error($link);
            }
        }
    }
} else {
    ?>
    <div class="container">
        <div class="row">
            <div class="col-sm-6">
                <h3>Registrati</h3>
                <form action="<?php echo $_SERVER['PHP_SELF'] ?> " method="POST">
                    <label>Username: <input type="text" name="username" required maxlength="32"></label><br/>
                    <label>Password: <input type="password" name="password" required maxlength="32"></label><br/>
                    <label>Email: <input type="email" name="email" required maxlength="64"></label><br/>
                    <input type="submit" name="register" value="Registrati"><br/>
                </form>

        </div>
    </div>
    <?php
}
?>
