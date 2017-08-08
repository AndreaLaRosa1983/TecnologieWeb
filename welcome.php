<?php
/**
 * Created by PhpStorm.
 * User: Andrea La Rosa
 * Date: 08/08/2017
 * Time: 16:19
 */
include('core.php');
if(isset($_SESSION['username'])) {
    $userid = $_SESSION['userid'];
    $row = mysqli_fetch_assoc(mysqli_query($link,"Select * FROM utenti WHERE id='$userid'"));
    if($row['last_login'] == NULL) {
        echo 'Utente: ' . $_SESSION['username'] . '</br>id: '. $_SESSION['userid'] .
            '</br>Primo accesso sul portale';
    } else if($row['last_login'] != NULL) {
        echo 'Utente: ' . $_SESSION['username'] . '</br>id: '. $_SESSION['userid'] .
            '</br>Ultimo accesso ' . date('d-m-y', $_SESSION['last_login']) .
            'ore ' . date('H:i', $_SESSION['last_login']) ;
    }
}
else {
    echo "qualcosa è andato storto";
    header('Location: init.php');
}
?>