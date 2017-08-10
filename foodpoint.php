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
  <h1 style="color: white; font-family: 'FabfeltScript Bold'; ">Punti Ristoro Convenzionati<img src="images/logo.png" width=12%; height=12%; style=" margin-left: 20px"/></h1>
</div>

  <style>
  #map {
    height: 350px;
    width: 80%;
    margin: 0 auto 0 auto ;
    -moz-border-radius:15px;
    -webkit-border-radius:15px;
  }
  </style>
<body>

  <div class="container">
    <div class="row">
      <div class="col-sm-12">

        <div id="map"></div>
          <div class="col-sm-2">
          <p> <img src="https://funanddystopia.files.wordpress.com/2013/07/ou25hjfhqwb0r4wi1fzo5.png" alt="immagine panino" height="50"> <p>
          <h3> Il Paninazzo </h3>
          <P>Panini e Piadine</p>
          <p>Piazzale Università 1</p>
      </div>
        <div class="col-sm-2">
            <p><img src="http://www.clker.com/cliparts/V/P/G/r/q/T/muffin-hi.png" alt="immagine budino ricoperto al cioccolato con ciliegia sopra" height="50"> </p>
            <h3> Il Dolcino </h3>
            <p>  Dolci, Crepes e Gelato.</p>
            <p>Via Verdi 43</p>
        </div>
        <div class="col-sm-2">
            <p><img src="http://www.clker.com/cliparts/d/9/3/e/12456949931930152422johnny_automatic_iceberg_lettuce.svg.hi.png" alt="immagine fetta limone" height="50"></p>
            <h3> Veggy Food </h3>
            <p>Piatti vegetariani, vegani e menù per Celiaci.</p>
            <p>P.le Loreto 23</p>
        </div>
        <div class="col-sm-2">
            <p><img src="http://www.clker.com/cliparts/8/f/9/4/1194984144102684069pizza_4_stagioni_archite_01.svg.med.png" alt="immagine fetta di pizza" height="50" ><p>
            <h3> Food For You </h3>
            <p>Specialità pizza e panzerotti.</p>
            <p>Viale dei Giardini 99</p>
        </div>
        <div class="col-sm-2">
            <p><img src="http://lexingtonlions.clubwizard.com/IMUpload/spaghetti-clipart-spaghetti.gif" alt="immagine piatto spaghetti" height="50"></p>
            <h3> Mensa Gran Risparmio </h3>
            <p> Dagli antipasti al dolce</p>
            <p>Parco della Vittoria 16</p>
        </div>
        <div class="col-sm-2">
            <p><img src="http://cdn.mysitemyway.com/etc-mysitemyway/icons/legacy-previews/icons-256/yellow-road-sign-icons-signs/096982-yellow-road-sign-icon-signs-road-food-sc50.png" alt="immagine cibo" height="50"></p>
            <h3> il Centro </h3>
            <p> Specialità di Pesce</p>
            <p> Vicolo Corto 8 </p>
        </div>
    </div>
  </div>
        <script>
        function initMap() {
          var cesena = {lat: 44.139504, lng: 12.247706};
          var veggyFood ={lat: 44.139074, lng: 12.239456};
          var paninazzo ={lat: 44.142244, lng: 12.240256};
          var foodForYou={lat: 44.144701, lng: 12.248599};
          var ilDolcino={lat:44.140500, lng:12.245600};
          var mensaGranRisparmio={lat: 44.142701, lng: 12.234599};
          var ilCentro={lat:44.145300, lng:12.239600};
          var map = new google.maps.Map(document.getElementById('map'), {
            zoom: 14,
            center: cesena
          });
          var paninazzoIcon = {
            url: "https://funanddystopia.files.wordpress.com/2013/07/ou25hjfhqwb0r4wi1fzo5.png", // url
            scaledSize: new google.maps.Size(35, 50), // scaled size
            origin: new google.maps.Point(0,0), // origin
            anchor: new google.maps.Point(0, 0) // anchor
          };
          var marker = new google.maps.Marker({
            position: paninazzo,
            map: map,
            icon: paninazzoIcon,
            title: "Il paninazzo"
          });
          var dolcinoIcon = {
            url: "http://www.clker.com/cliparts/V/P/G/r/q/T/muffin-hi.png", // url
            scaledSize: new google.maps.Size(40, 40), // scaled size
            origin: new google.maps.Point(0,0), // origin
            anchor: new google.maps.Point(0, 0) // anchor
          };
          var marker = new google.maps.Marker({
            position: ilDolcino,
            map: map,
            icon:dolcinoIcon,
            title: "Il dolcino"
          });
          var veggyIcon = {
            url: "http://www.clker.com/cliparts/d/9/3/e/12456949931930152422johnny_automatic_iceberg_lettuce.svg.hi.png", // url
            scaledSize: new google.maps.Size(40, 40), // scaled size
            origin: new google.maps.Point(0,0), // origin
            anchor: new google.maps.Point(0, 0) // anchor
          };
          var marker = new google.maps.Marker({
            position: veggyFood,
            map: map,
            icon:veggyIcon,
            title: "Veggy Food"
          });
          var forYouIcon = {
            url: "http://www.clker.com/cliparts/8/f/9/4/1194984144102684069pizza_4_stagioni_archite_01.svg.med.png", // url
            scaledSize: new google.maps.Size(30, 40), // scaled size
            origin: new google.maps.Point(0,0), // origin
            anchor: new google.maps.Point(0, 0) // anchor
          };
          var marker = new google.maps.Marker({
            position: foodForYou,
            map: map,
            icon:forYouIcon,
            title: "Food For You"
          });
          var mensaIcon = {
            url: "http://lexingtonlions.clubwizard.com/IMUpload/spaghetti-clipart-spaghetti.gif", // url
            scaledSize: new google.maps.Size(40, 40), // scaled size
            origin: new google.maps.Point(0,0), // origin
            anchor: new google.maps.Point(0, 0) // anchor
          };
          var marker = new google.maps.Marker({
            position: mensaGranRisparmio,
            map: map,
            icon: mensaIcon,
            title: "Mensa Gran Risparmio"
          });
          var ilCentroIcon = {
            url: "http://cdn.mysitemyway.com/etc-mysitemyway/icons/legacy-previews/icons-256/yellow-road-sign-icons-signs/096982-yellow-road-sign-icon-signs-road-food-sc50.png", // url
            scaledSize: new google.maps.Size(50, 50), // scaled size
            origin: new google.maps.Point(0,0), // origin
            anchor: new google.maps.Point(0, 0) // anchor
          };
          var marker = new google.maps.Marker({
            position: ilCentro,
            map: map,
            icon: ilCentroIcon,
            title: "il Centro"
          });
        }
        </script>
        <script async defer
        src="https://maps.googleapis.com/maps/api/js?key=AIzaSyB9oCMD8emHB1GpNhzYFD_Vm6-lrIobEIM&callback=initMap">
        </script>




      </body>
      </html>
