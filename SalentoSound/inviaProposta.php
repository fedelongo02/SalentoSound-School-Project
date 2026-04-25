<head>
  <title>SalentSound - Proponi</title>
  <link rel="stylesheet" href="stile.css">
  <link rel="icon" type="image/png" href="immagini/favicon.jpg">
</head>
<body>
  <?php
      session_start();
      $idU = $_SESSION["id"];
      include('header.php');

      //collegamento al database
      $db = new mysqli("localhost", "fefeswebsite", "", "my_fefeswebsite");

      //controlliamo se la connessione è andata a buon fine
      if($db -> connect_errno){
        echo("Si è verificato un errore durante la connessione al database");
        exit();
      }

      $comune = $_POST['comune'];
      $artista = $_POST['artista'];

      $queryInserimento = "INSERT INTO PROPOSTA(DataInserimento, Testo, IdUtente)
                          VALUES (CURRENT_TIMESTAMP, '$comune - $artista', $idU);";

      //esecuzione query
      $result = $db -> query($queryInserimento);
      //Controllo errori
      if(!$result){
        exit($db -> error);
      }else{
          echo("<div class='partecipaDiv'>
                  La tua proposta è stata inviata e presto verrà inoltrata ai locali del luogo selezionato!
              </div>");
      }

      //chiudo la connessione
      $db->close();

      include('footer.php');
  ?>
</body>