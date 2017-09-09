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

<div class="jumbotron text-center">
    <?php include('menu.html'); ?>

    <h1 style="color: white; font-family: 'FabfeltScript Bold'; ">Calendario<img src="images/logo.png" width=12%; height=12%; style=" margin-left: 20px" alt=”image.logo.png Logo – Unibo”/>
</div></h1>
<style>
    table {
        font-family: arial, sans-serif;
        border-collapse: collapse;
        width: 100%;
    }

    td, th {
        border: 1px solid #dddddd;
        text-align: left;
        color: #1d6684;
        padding: 8px;
    }

    tr:nth-child(even) {
        background-color: #dddddd;
    }

</style>


<div class="container">
    <div class="row">
        <div class="col-sm-4"></div>
        <div class="col-sm-4" >

            <?php
            function ShowCalendar($m,$y)
            {
                if ((!isset($_GET['d']))||($_GET['d'] == ""))
                {
                    $m = date('n');
                    $y = date('Y');
                }else{
                    $m = (int)strftime( "%m" ,(int)$_GET['d']);
                    $y = (int)strftime( "%Y" ,(int)$_GET['d']);

                }

                $precedente = mktime(0, 0, 0, $m -1, 1, $y);
                $successivo = mktime(0, 0, 0, $m +1, 1, $y);

                $nomi_mesi = array(
                    "Gen",
                    "Feb",
                    "Mar",
                    "Apr",
                    "Mag",
                    "Giu",
                    "Lug",
                    "Ago",
                    "Set",
                    "Ott",
                    "Nov",
                    "Dic"
                );
                $nomi_giorni = array(
                    "Lun",
                    "Mar",
                    "Mer",
                    "Gio",
                    "Ven",
                    "Sab",
                    "Dom"
                );

                $cols = 7;
                $days = date("t",mktime(0, 0, 0, $m, 1, $y));
                $lunedi= date("w",mktime(0, 0, 0, $m, 1, $y));
                if($lunedi==0) $lunedi = 7;
                echo "<table>\n";
                echo "<tr>\n
  <td colspan=\"".$cols."\">
  <a style='color:#1d6684' href=\"?d=" . $precedente . "\">&lt;&lt;</a>
  " . $nomi_mesi[$m-1] . " " . $y . "
  <a style='color:#1d6684' href=\"?d=" . $successivo . "\">&gt;&gt;</a></td></tr>";
                foreach($nomi_giorni as $v)
                {
                    echo "<td><b>".$v."</b></td>\n";
                }
                echo "</tr>";

                for($j = 1; $j<$days+$lunedi; $j++)
                {
                    if($j%$cols+1==0)
                    {
                        echo "<tr>\n";
                    }

                    if($j<$lunedi)
                    {
                        echo "<td> </td>\n";
                    }else{
                        $day= $j-($lunedi-1);
                        $data = strtotime(date($y."-".$m."-".$day));
                        $oggi = strtotime(date("Y-m-d"));
                        include 'config.php';
                        $host = 'localhost';
                        $user = 'root';
                        $pass = '';
                        $db = 'agenda';
                        $user_id = $_SESSION['userid'];
                        $con = mysqli_connect($host,$user,$pass) or die (mysqli_error($con));
                        $sel = mysqli_select_db($con,$db) or die (mysqli_error($con));
                        $sql = "SELECT str_data FROM appuntamenti WHERE user_id=$user_id";
                        $result = mysqli_query($con,$sql) or die (mysqli_error($con));
                        if(mysqli_num_rows($result) > 0)
                        {
                            while($fetch = mysqli_fetch_array($result))
                            {
                                $str_data = $fetch['str_data'];
                                if ($str_data == $data)
                                {
                                    $day = "<a style='color:#1d6684' href=\"appuntamenti.php?day=$str_data\">$day</a>";
                                }
                            }
                        }

                        if($data != $oggi)
                        {
                            echo "<td>".$day."</td>";
                        }else{
                            echo "<td><b>".$day."</b></td>";
                        }
                    }

                    if($j%$cols==0)
                    {
                        echo "</tr>";
                    }
                }
                echo "<tr></tr>";
                echo "</table>";
            }
            ShowCalendar(date("m"),date("Y"));

            ?>
        </div>
        <div class="col-sm-4" >

<?php
include 'form.php';
?>
        </div>
    </div>
</div>

</html>
