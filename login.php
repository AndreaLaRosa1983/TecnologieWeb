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
    font-weight: bold; min-font-size: 500%" >ALMA MATER STUDIORUM UNIVERSITÀ DI BOLOGNA <img src="images/logo.png" width=12% height=12% /> </h1>
</div>

<?php
include('core.php');
include('functions.php');
if(isset($_POST['login'])) {
    $username = (isset($_POST['username']) ? clear($_POST['username']) : false);
    $password = (isset($_POST['password']) ? clear($_POST['password']) : false);
    if(empty($username) || empty($password)){
        echo 'Riempi tutti i campi.<br/><br/><a href="javascript:history.back();"><span style="color:blue">Indietro</span></a>';
    } elseif(mysqli_num_rows(mysqli_query($link,"SELECT * FROM utenti WHERE nome LIKE '$username'")) == 0) {
        echo 'Username non trovato.<br/><br/> <a href="javascript:history.back();"><span style="color:blue">Indietro</span></a>';
    } elseif(mysqli_num_rows(mysqli_query($link, "SELECT * FROM utenti WHERE nome LIKE '$username' AND pswd = md5('$password') ")) == 0) {
        echo 'Password Errata.<br/><br/> <a href="javascript:history.back();" ><span style="color:blue">Indietro</span></a>';
    } else {
        $password = md5($password);
        $ip = $_SERVER['REMOTE_ADDR'];
        if (mysqli_num_rows(mysqli_query($link,"SELECT * FROM utenti WHERE nome LIKE '$username' AND pswd='$password'")) > 0) {
            $row = mysqli_fetch_assoc(mysqli_query($link,"SELECT nome,id,last_login FROM utenti WHERE nome LIKE '$username'"));
            $_SESSION['last_login'] = $row['last_login'];
            mysqli_query($link,"UPDATE utenti SET last_login='".time()."', last_ip='$ip' WHERE id=$row[id]") or die(mysqli_error($link));
            $_SESSION['username'] = $row['nome'];
            $_SESSION['userid'] = $row['id'];
            header('Location: index.php');
        }
    }
} else {
    ?>
    <div class="container">
        <div class="row">
              <div class="col-sm-6">
                <h3>Effettua il Login</h3>
                <form action="<?php echo $_SERVER['PHP_SELF'] ?> " method="POST">
                    <label>Username: <input type="text" name="username" required maxlength="32"></label><br/>
                    <label>Password: <input type="password" name="password" required maxlength="32"></label><br/>
                    <input type="submit" name="login" value="Accedi"><br/>

                </form>
             </div>
             <div class="col-sm-12" style="">
              <img src="images\cesena.jpg" alt="cesena" style="width: 20%; float: "right";text-align:"center"; ">
                <a href="http://www.unibo.it/it/campus-cesena/campus-di-cesena"> Campus di Cesena</a>

              <img src="images\ravenna.jpg" alt="ravenna" style="width: 20%; style=" font:"black"; >
                <a href="http://www.unibo.it/it/campus-ravenna/campus-di-ravenna">  Campus di ravenna</a>

              <img src="images\rimini.jpg" alt="rimini" style="width: 20%;  ">
                <a href="http://www.unibo.it/it/campus-rimini/campus-di-rimini"> Campus di Rimini </a>

              <img src="images\forlì.jpg" alt="forlì" style="width: 20%;  ">
                <a href="http://www.unibo.it/it/campus-forli/campus-di-forli">Campus di Forlì  </a>
              <img src="images\bologna.png" alt="forlì" style="width: 20%;  ">
                  <a href="http://www.unibo.it/it/campus-bologna/campus-di-bologna">Campus di Bologna  </a>
            </div>
    </div>
    <?php
}
?>
