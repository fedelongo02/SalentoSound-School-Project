<head>
	<title>SalentSound - Home</title>
    <link rel="stylesheet" href="stile.css">
    <link rel="icon" type="image/png" href="immagini/favicon.png">
</head>
<body>
  <?php
      //avviamo la sessione
      session_start();

      include('header.php');

      //collegamento al database
      $db = new mysqli("localhost", "fefeswebsite", "", "my_fefeswebsite");

      //controlliamo se la connessione è andata a buon fine
      if($db -> connect_errno){
          echo("Si è verificato un errore durante la connessione al database");
          exit();
      }

      //recupero dati
      $email = $_POST['Email'];
      $pass = $_POST['Password'];

      //creazione query
      $queryInserimento = "SELECT * FROM UTENTE WHERE Email = '$email' AND Password = '$pass';";

      //esecuzione query
      $result = $db -> query($queryInserimento);
      //ontrollo errori
      if(!$result){
          exit($db -> error);
      }

      if($result -> num_rows == 0){
          echo("E-mail o password errati");
      }else{
          echo("<h1 class='corpo'>Accesso eseguito</h1>");

          //ricordiamoci dell'id e del nome (quest'ultimo per scrivere "ciao nome_utente")
          $utente = $result -> fetch_assoc(); //prende l'unica riga della tabella che dovrebbe uscire
          $nome = $utente["Nome"]; //prende il nome
          $idUtente = $utente["IdUtente"]; //prende l'id
          $_SESSION["id"] = $idUtente; //salva l'id
          $_SESSION["name"] = $nome; //salva il nome
          
          //redirect
          header("Location: eventi.php");
      }

      //scolleghiamoci dal db
      $db -> close();

      include('footer.php');
  ?>
</body>