<!DOCTYPE html>
<html>
	<head>
    	<title>SalentSound - Eventi</title>
        <link rel="stylesheet" href="stile.css">
        <link rel="icon" type="image/png" href="immagini/favicon.jpg">
    </head>
  	<body>
        <?php
        session_start();
        include('header.php');
        //collegamento al database
        $db = new mysqli("localhost", "fefeswebsite", "", "my_fefeswebsite");

        //controlliamo se la connessione è andata a buon fine
        if($db -> connect_errno){
          echo("Si è verificato un errore durante la connessione al database");
          exit();
        }

        //la funzione isset() serve a chiedere a PHP: "Esiste questa variabile ed è diversa da NULL?".
        if (isset($_GET['id'])) {
          $idEvento = $_GET['id'];

          //creazione query
          $queryInserimento = "SELECT E.*, U.Nome AS NomeOrg, U.Cognome AS CognOrg FROM EVENTO E 
          								JOIN UTENTE U ON E.IdUtente = U.IdUtente 
                                      	WHERE IdEvento = $idEvento";

          //esecuzione query
          $result = $db -> query($queryInserimento);
          $evento = $result->fetch_assoc();

          //Controllo errori
          if(!$result){
            exit($db -> error);
          }

          $genere = $evento["Genere"];
          $nome = $evento["Nome"];
          $data = $evento["DataOra"];
          $artisti = $evento["Artisti"];
          $stato = $evento["Stato"];
          $locale = $evento["Locale"];
          $comune = $evento["Comune"];
          $organizzatore = $evento["NomeOrg"] . " " . $evento["CognOrg"];

          echo("<div class='pageEvento'>
                          <p class='statoEvento'>$stato</p> 
                          <h3 class='nomeEvento'>$nome</h3> 
                          <p class='pEvento'><span class='spanEvento'>dove:</span> $comune</p>
                          <p class='pEvento'><span class='spanEvento'>quando:</span> $data</p>
                          <p class='pEvento'><span class='spanEvento'>genere:</span> $genere</p>
                          <p class='pEvento'><span class='spanEvento'>artisti:</span> $artisti</p>
                          <p class='pEvento'><span class='spanEvento'>organizzatore:</span> $organizzatore</p>
                          <p style='padding-left: 10px; padding-right: 10px;'>Vuoi partecipare a questo evento? Clicca qui sotto</p>
                          <input type='button' value='Partecipa subito' id='partecipa' onclick=\"location.href='partecipa.php'\">
                      </div>");
          
          echo('<div class="containerRecensione">
        <h2>Recensioni</h2>');

        // Controlliamo se l'utente è loggato
        if (isset($_SESSION['id'])) {
            echo('
                <form action="salva_recensione.php" method="POST" class="formRecensione">
                    <input type="hidden" name="id_evento" value="' . $idEvento . '">

                    <div class="rating">
                        <input type="radio" name="voto" id="star5" value="5" required><label for="star5">★</label>
                        <input type="radio" name="voto" id="star4" value="4"><label for="star4">★</label>
                        <input type="radio" name="voto" id="star3" value="3"><label for="star3">★</label>
                        <input type="radio" name="voto" id="star2" value="2"><label for="star2">★</label>
                        <input type="radio" name="voto" id="star1" value="1"><label for="star1">★</label>
                    </div>

                    <div class="testo-recensione">
                        <textarea name="testo" placeholder="Raccontaci la tua esperienza..." required rows="4"></textarea>
                    </div>

                    <button type="submit" name="invia_recensione">Pubblica Recensione</button>
                </form></div>
            ');
        } else {
            echo('<p style="text-align: center;"><a href="accedi.php" style="color: black;">Accedi</a> per lasciare una recensione!</p>');
        }

        echo('</div>');
        
        // --- Visualizzazione delle Recensioni Esistenti ---
        echo '<div style="width: 800px; margin: 0 auto;">';
        echo '<hr><h3 style="margin-top:20px;">Cosa dicono gli altri utenti:</h3>';

        // Query per prendere i commenti e il nome dell'utente che li ha fatti
        $queryCommenti = "SELECT C.*, U.Nome, U.Cognome 
                          FROM COMMENTO C 
                          JOIN UTENTE U ON C.IdUtente = U.IdUtente 
                          WHERE C.IdEvento = $idEvento 
                          ORDER BY C.DataOra DESC";

        $risultatoCommenti = $db->query($queryCommenti);

        if ($risultatoCommenti->num_rows > 0) {
            while ($comm = $risultatoCommenti->fetch_assoc()) {
                $dataFormattata = date("d/m/Y H:i", strtotime($comm['DataOra']));
                $votoStelle = str_repeat("★", $comm['Voto']) . str_repeat("☆", 5 - $comm['Voto']);

                echo "<div class='recensione-box' style='border-bottom: 1px solid #ccc;'>
                        <strong>" . $comm['Nome'] . " " . $comm['Cognome'] . "</strong> 
                        <span style='color: #f39c12;'>$votoStelle</span><br>
                        <small style='color: gray;'>Il $dataFormattata</small>
                        <p>" . htmlspecialchars($comm['Testo']) . "</p>
                      </div>";
            }
        } else {
            echo "<p>Ancora nessuna recensione per questo evento. Sii il primo a scriverne una!</p>";
        }
        echo '</div>';

        }else{
          echo "Nessun evento selezionato.";
        }

        //chiudo la connessione
        $db->close();
        include('footer.php');
        ?>
    </body>
</html>