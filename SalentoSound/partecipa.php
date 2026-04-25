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
        
        //controlliamo se ha fatto l'accesso
        $idU = $_SESSION["id"];
        if($idU){ //vediamo se esiste l'id
        	//se esiste
            $nome = $_SESSION["name"];
            echo("
            	<div class='partecipaDiv'>
                Ciao {$nome}! ti sei iscritto con successo all'evento!
                </div>
            ");
        }else{
        	//se non esiste redirect per effettuare l'accesso
          	header("Location: accedi.php");
        }
		
        include('footer.php');
        //chiudo la connessione
        $db->close();
        ?>
    </body>
</html>