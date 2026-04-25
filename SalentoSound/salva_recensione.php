<?php
session_start();

// Verifichiamo se l'utente è loggato e se il form è stato inviato
if (isset($_SESSION['id']) && isset($_POST['invia_recensione'])) {
    
    $db = new mysqli("localhost", "fefeswebsite", "", "my_fefeswebsite");

    if($db->connect_errno) {
        die("Errore di connessione");
    }

    // Recupero dati e sanificazione
    $idEvento = $_POST['id_evento'];
    $voto = $_POST['voto'];
    $testo = $db->real_escape_string($_POST['testo']);
    $idUtente = $_SESSION['id']; 
    
    // Creiamo la data e l'ora corrente
    $dataOra = date("Y-m-d H:i:s");

    // Query SQL per la tabella COMMENTO
    $sql = "INSERT INTO COMMENTO (DataOra, Voto, Testo, IdEvento, IdUtente) 
            VALUES ('$dataOra', $voto, '$testo', $idEvento, $idUtente)";

    if ($db->query($sql)) {
        // Se tutto va bene, torniamo alla pagina dell'evento
        header("Location: pageEvento.php?id=$idEvento&successo=1");
    } else {
        echo "Errore durante il salvataggio: " . $db->error;
    }

    $db->close();
} else {
    // Se qualcuno prova ad accedere a questa pagina senza aver compilato il form
    header("Location: index.php");
}
?>