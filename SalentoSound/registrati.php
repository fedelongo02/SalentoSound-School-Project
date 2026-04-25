<!DOCTYPE html>
<html>
	<head>
    	<title>SalentSound - Registrati</title>
        <link rel="stylesheet" href="stile.css">
        <link rel="icon" type="image/png" href="immagini/favicon.jpg">
    </head>
  	<body>
      <?php include('header.php'); ?>
		<div class="corpo">
          
          <div class="container">
          	
            <form action="verificaDati.php" method="POST" class="registrati">
            	<h1>Registrati</h1>
              <div>
                Nome <br/>
                <input type="text" name="Nome" class="insert">
              </div><br/>

              <div>
                Cognome <br/>
                <input type="text" name="Cognome" class="insert">
              </div><br/>

              <div>
                Data di nascita <br/>
                <input type="date" name="DataDiNascita" class="insert">
              </div><br/>

              <div>
                E-mail <br/>
                <input type="email" name="Email" class="insert">
              </div><br/>

              <div>
                Password <br/>
                <input type="password" name="Password" class="insert">
              </div><br/>

              <div>
                Tipo  <br/>
                <div id="tipo">
                  <input type="radio" name="Tipo" class="radio"> <p>Utente</p>
                  <input type="radio" name="Tipo" class="radio"> <p>Gestore</p>
                </div>
              </div><br/>

              <input type="submit" value="Registrati" class="insert" id="sub">
              Hai già un account? <a href="accedi.php" style='color: grey;'>Accedi cliccando qui</a>
              </div>
            </form>
		</div>
      <?php include('footer.php'); ?>
    </body>
</html>