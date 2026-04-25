<!DOCTYPE html>
<html>
	<head>
    	<title>SalentSound - Proponi</title>
        <link rel="stylesheet" href="stile.css">
        <link rel="icon" type="image/png" href="immagini/favicon.jpg">
    </head>
  	<body>
		<?php
        	session_start();
            include('header.php');
            $idU = $_SESSION["id"];
            // Controlliamo se l'utente è loggato
        	if ($idU) {
              echo("<h2 style=\"text-align: center;\">Proponi un evento compilando il seguente form</h2>
              		<form action=\"inviaProposta.php\" method=\"POST\" class=\"proponiEvento\">
                  	<h4>Dove vuoi che si svolga l'evento?</h4>
                  	<input type=\"text\" placeholder=\"Inserisci comune\" name=\"comune\">
                  	<h4>Quale artista vorresti vedere?</h4>
                  	<input type=\"text\" placeholder=\"Nome artista\" name=\"artista\">
                  	<br>
                  	<input type=\"submit\" value=\"INVIA PROPOSTA\" class=\"proponibtn\">
              		</form>");
            }else{
            	echo('<p style="text-align: center;">
                		<a href="accedi.php" style="color: black;">Accedi</a>
                        per proporre un evento!</p>');
            }
            include('footer.php');
        ?>
    </body>
</html>