<!DOCTYPE html>
<html>
	<head>
    	<title>SalentSound - Home</title>
        <link rel="stylesheet" href="stile.css">
        <link rel="icon" type="image/png" href="immagini/favicon.png">
    </head>
  	<body>
          <?php include('header.php'); ?>
          
          <div class="corpo">
          	<?php
            	session_start();
                session_unset();
                echo("<h1>Hai effettuato il logout. A presto!</h1>");
                
                //redirect
          		header("Location: eventi.php");
             ?>
          </div>
          
          <?php include('footer.php'); ?>
    </body>
</html>