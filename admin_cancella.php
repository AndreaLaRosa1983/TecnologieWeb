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

<div style="background-color:#66afe9; margin: 0 auto" class="jumbotron text-center" >
    <h1 style="color: white; font-family: 'Goudy Trajan Regular' ;
    font-weight: bold; min-font-size: 500%"> Calendario Amministratore <img src="images/admin.png" width=6% height=6% alt=”image.admin.png Logo – Admin” /> </h1>
</div>

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
                if (mysqli_query($con,"DELETE FROM appuntamenti WHERE id = '$del_id2'")or die(mysqli_error($con)))
                {
                    echo "Cancellazione del servizio avvenuta con successo<br>
    <a style='color: blue' href=\"admin_calendar.php\">Clicca per proseguire</a>";
                }
            }
            ?>
        </div>
    </div>
</div>
</html>