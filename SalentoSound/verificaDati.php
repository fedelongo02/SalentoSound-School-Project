<head>
	<title>SalentSound - Home</title>
    <link rel="stylesheet" href="stile.css">
    <link rel="icon" type="image/png" href="immagini/favicon.png">
</head>
<body>
  <?php
  		include('header.php');
        
        //collegamento al database
        $db = new mysqli("localhost", "fefeswebsite", "", "my_fefeswebsite");

        //controlliamo se la connessione è andata a buon fine
        if($db -> connect_errno){
            echo("Si è verificato un errore durante la connessione al database");
            exit();
        }

        //recupero dati
        $nome = $_POST['Nome'];
        $cognome = $_POST['Cognome'];
        $nascita = $_POST['DataDiNascita'];
        $email = $_POST['Email'];
        $pass = $_POST['Password'];
        $tipo = $_POST['Tipo'];

        //creazione query
        $queryInserimento = "INSERT INTO UTENTE (Nome, Cognome, DataDiNascita, Tipo, Email, Password)";
        $queryInserimento .= "VALUES ('$nome', '$cognome', '$nascita', '$tipo', '$email', '$pass');";

        //esecuzione query e controllo errori
        if(!$db -> query($queryInserimento)){
            die($db -> error);
        }else{
            echo("<h1>Registrazione completata</h1>");
            //redirect
          	header("Location: accedi.php");
        }

        //scolleghiamoci dal db
        $db -> close();
        
        include('footer.php');
  ?>
</body>