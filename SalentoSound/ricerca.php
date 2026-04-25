<head>
	<title>SalentSound - Eventi</title>
    <link rel="stylesheet" href="stile.css">
    <link rel="icon" type="image/png" href="immagini/favicon.jpg">
</head>
<body>
  	<?php include('header.php'); 
    	$luogo = $_GET['luogo'];
  		echo ("<h1 style=\"padding-left: 30px;\">Eventi a $luogo</h1>");
    ?>

	<div style="display: flex; padding: 20px;">
  	<?php
      //collegamento al database
      $db = new mysqli("localhost", "fefeswebsite", "", "my_fefeswebsite");

      //controlliamo se la connessione è andata a buon fine
      if($db -> connect_errno){
          echo("Si è verificato un errore durante la connessione al database");
          exit();
      }

      //recupero dati
      $luogo = $_GET['luogo'];

      //creazione query
      $queryEstrazione = "SELECT E.*, U.Nome AS NomeOrg, U.Cognome AS CognOrg 
      				FROM EVENTO E JOIN UTENTE U ON E.IdUtente = U.IdUtente 
                    WHERE E.Comune = \"$luogo\"
                    ORDER BY E.DataOra ASC;";

      //esecuzione query
      $result = $db -> query($queryEstrazione);
      //ontrollo errori
      if(!$result){
          exit($db -> error);
      }

      // --- AGGIUNTA: Controllo se la lista è vuota ---
      if ($result->num_rows === 0) {
        echo("<div class='eventCard'>
        		<p>Al momento non ci sono eventi in programma a $luogo</p>
              </div>");
      } else {
        //Assegna la riga a $evento e si ferma quando non ci sono più righe
        while ($evento = $result->fetch_assoc()) {
          $idEvento = $evento["IdEvento"];
          $genere = $evento["Genere"];
          $nome = $evento["Nome"];
          $data = $evento["DataOra"];
          $artisti = $evento["Artisti"];
          $stato = $evento["Stato"];
          $locale = $evento["Locale"];
          $comune = $evento["Comune"];
          $organizzatore = $evento["NomeOrg"] . " " . $evento["CognOrg"];

          echo("<div class='eventCard' onclick='location.href=\"pageEvento.php?id=$idEvento\"' style=\" 
          																						width: 500px;
                                                                                                margin: 0 auto;
                                                                                                \">
          			<p class='statoEvento'>$stato</p> 
                    <h3 class='nomeEvento'>$nome</h3> 
                    <p class='pEvento'><span class='spanEvento'>dove:</span> $comune</p>
                    <p class='pEvento'><span class='spanEvento'>quando:</span> $data</p>
                    <p class='pEvento'><span class='spanEvento'>genere:</span> $genere</p>
                    <p class='pEvento'><span class='spanEvento'>artisti:</span> $artisti</p>
                    <p class='pEvento'><span class='spanEvento'>organizzatore:</span> $organizzatore</p>
               </div>");
        }
      }

      //scolleghiamoci dal db
      $db -> close();
  ?>
  </div>
  <?php include('footer.php'); ?>
</body>