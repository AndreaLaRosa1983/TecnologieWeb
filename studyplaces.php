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
    <h1 style="color: white; font-family: 'FabfeltScript Bold'; ">Aulee Studio<img src="images/logo.png" width=12%; height=12%; style=" margin-left: 20px"/></h1>
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
      <div class="col-md-6">
        <p><img src= "https://upload.wikimedia.org/wikipedia/commons/thumb/0/0f/Alpha_lowercase.svg/601px-Alpha_lowercase.svg.png" height="45"> </p>
        <h3>
          Sala studio multimediale "Alfa Albatros"
        </h3>
        <p>  Via Mulini 23/25
          <p>Situata nel rinnovato complesso "Ex Macello", è dotata</p>
          <p> di 26 postazioni pc e numerose postazioni per la connessione</p>
        <p>con pc portatile.All'interno della sala è possibile navigare</p>
      <p> in rete grazie alla completa copertura wireless "Almawifi".</p>
      <p>A disposizione degli studenti un servizio di stampa </p>
      <p>in bianco e nero e a colori (quest'ultimo per i soli tesisti).</p>
      <p>La sala studio è gestita dall'Associazione studentesca S.P.R.I.Te.,</p>
      <p>grazie alla quale è garantito un ampio orario di apertura:</p>
      <p>- dal lunedì al venerdì, dalle 9 alle 21;</p>
      <p>- il sabato dalle 9 alle 21;</p>
      <p>- la domenica dalle 12 alle 24.</p>
      <p>E-mail: salastudioalfa@gmail.com</p>
      <p>Telefono: 0547 338864</p>

    </div>
    <div class="col-md-6">
      <p><img src= "http://i.investopedia.com/dimages/graphics/beta03.png" height="50" > </p>
      <h3>Sala studio e lettura "Beta"</h3>
      <p>Piazzale K. Marx 131</p>
      <p>E' dotata di 4 postazioni PC,40 posti lettura e una zona </p>
      <p> "Erasmus" con 2 tavoli, 4 postazioni lettura e 1 PC </p>
      <p>destinati agli studenti internazionali.</p>
      <p>La Sala "Beta" è gestita dall'Associazionie Studentesca</p>
      <p>Analysis e osserva un ampio orario di apertura,</p>
      <p> per consentire la migliore fruizione da parte degli studenti:<p>
        <p>- dal lunedì al giovedì: ore 9 - 24;</p>
        <p>- dal venerdì alla domenica: ore 9 - 21.</p>
        <p>E-mail: aulaletturabeta@gmail.com</p>
      </div>
    </div>

    <div id="map"></div>
    <script>
    function initMap() {
      var alfa ={lat: 44.141744, lng: 12.239456}
      var cesena = {lat: 44.139504, lng: 12.247706};
      var beta={lat: 44.144701, lng: 12.248599}
      var map = new google.maps.Map(document.getElementById('map'), {
        zoom: 14,
        center: cesena
      });
      var alfaIcon = {
        url: "https://upload.wikimedia.org/wikipedia/commons/thumb/0/0f/Alpha_lowercase.svg/601px-Alpha_lowercase.svg.png", // url
        scaledSize: new google.maps.Size(18, 18), // scaled size
        origin: new google.maps.Point(0,0), // origin
        anchor: new google.maps.Point(0, 0) // anchor
      };
      var marker = new google.maps.Marker({
        position: alfa,
        map: map,
        icon: alfaIcon,
        title: "Aula Alfa Albatros, Via Mulini 23/25"
      });
      var betaIcon = {
        url: "http://i.investopedia.com/dimages/graphics/beta03.png", // url
        scaledSize: new google.maps.Size(30, 30), // scaled size
        origin: new google.maps.Point(0,0), // origin
        anchor: new google.maps.Point(0, 0) // anchor
      };
      var marker = new google.maps.Marker({
        position: beta,
        map: map,
        icon: betaIcon,
        title: "Aula Beta, P.le Karl Marx 133"
      });

    }
    </script>
    <script async defer
    src="https://maps.googleapis.com/maps/api/js?key=AIzaSyB9oCMD8emHB1GpNhzYFD_Vm6-lrIobEIM&callback=initMap">
    </script>
  </div>


  <script src="js/jquery.min.js"></script>
  <script src="js/bootstrap.min.js"></script>
  <script src="js/scripts.js"></script>
</body>
</html>
