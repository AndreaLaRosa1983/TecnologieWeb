
<!DOCTYPE html>
<html lang="it">
<head>
    <title>Agenda</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
</head>

<div style="background-color:#66afe9; margin: 0 auto" class="jumbotron text-center" >
    <h1 style="color: white; font-family: 'Goudy Trajan Regular' ;
    font-weight: bold; min-font-size: 500%" >Appuntamenti Amministratore <img src="images/admin.png" width=6% height=6% alt=”image.admin.png Logo – Admin” /> </h1>
</div>>



<div class="container">
    <div class="row">
        <div class="col-sm-12"><?php
            if(isset($_GET['day']) && is_numeric($_GET['day']))
            {
                $day = $_GET['day'];
                include 'config.php';
                $host = 'localhost';
                $user = 'root';
                $pass = '';
                $db = 'agenda';
                $user_id = '0';
                $con = mysqli_connect($host,$user,$pass) or die (mysqli_error($con));
                $sel = mysqli_select_db($con,$db) or die (mysqli_error($con));
                $sql = "SELECT * FROM appuntamenti WHERE str_data=$day AND user_id='0'" ;
                $result = mysqli_query($con,$sql) or die (mysqli_error($con));
                $sql = "SELECT * FROM appuntamenti WHERE str_data=$day AND user_id='0' " ;
                $result = mysqli_query($con,$sql) or die (mysqli_error($con));
                if(mysqli_num_rows($result) > 0)
                {
                    while($fetch = mysqli_fetch_array($result))
                    {
                        $id = stripslashes($fetch['id']);
                        $titolo = stripslashes($fetch['titolo']);
                        $testo = stripslashes($fetch['testo']);
                        $data = date("d-m-Y", $fetch['str_data']);
                        echo "<h2> Note del <b>$data</b></h2><br><p> Titolo: " . $titolo . "</p><p> Nota: " . $testo . "</p><br>

      <a style='color: #d92432' href=\"admin_cancella.php?id=$id\">Cancella</a> |
      <a style='color: #d92432' href=\"admin_modifica.php?id=$id\">Modifica</a><br><br>
      <a style='color: blue' href=\"admin_calendar.php\">Torna a Calendario</a>
      <hr>";
                    }
                }
            }
            ?>
        </div>
    </div>
</div>
</html>