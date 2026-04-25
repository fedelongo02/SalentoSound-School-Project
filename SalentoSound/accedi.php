<!DOCTYPE html>
<html>
	<head>
    	<title>SalentSound - Accedi</title>
        <link rel="stylesheet" href="stile.css">
        <link rel="icon" type="image/png" href="immagini/favicon.jpg">
    </head>
  	<body>
      <?php include('header.php'); ?>
		<div class="corpo">

          <div class="container">
            <form action="verificaAccesso.php" method="POST" class="accedi">
              <h1>Accedi</h1>
              <div>
                E-mail <br/>
                <input type="email" name="Email" class="insert">
              </div><br/>

              <div>
                Password <br/>
                <input type="password" name="Password" class="insert">
              </div><br/>

              <input type="submit" value="Accedi" class="insert" id="sub">
              Non hai un account? <a href="registrati.php" style='color: grey;'>Registrati cliccando qui</a>
              </div>
            </form>
		</div>
      <?php include('footer.php'); ?>
    </body>
</html>