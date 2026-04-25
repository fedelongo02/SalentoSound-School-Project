 <div id="nav">
  <ul class="menu-utente">
  	<li><img src="immagini/favicon.jpg" alt="SalentoSound" width="50" style="border-radius: 10px; margin: 0; vertical-align: middle;"></li>
    <li id="nomeSito">SALENTOSOUND</li>
    <?php
    	session_start();
        //controlliamo se ha fatto l'accesso
        $idU = $_SESSION["id"];
        if($idU){ //vediamo se esiste l'id
        	//se si
        	$nome = $_SESSION["name"];
            echo("<li>Ciao $nome</li>");
            echo("<li><a href='index.php'>Home</a></li>");
            echo("<li><a href='esci.php'>Esci</a></li>");
        }else{
        	//se no
        	echo("<li><a href='index.php'>Home</a></li>");
        	echo("<li><a href='registrati.php'>Registrati</a></li>");
            echo("<li><a href='accedi.php'>Accedi</a></li>");
        }
    ?>
    
    <li>
    	<form action="ricerca.php" method="GET" style="margin-bottom: 0;">
          <input type="text" placeholder="Cerca per luogo" id="search" name="luogo"/>
          <input type="submit" value="Cerca" id="searchBtn"/>
        </form>
    </li>
    
  </ul>
</div>

<img src="immagini/copertina.jpg" id="copertina">

<ul class="menu-principale">
  <li><a href="eventi.php" class="card">Eventi</a></li>
  <li><a href="proponi.php" class="card">Proponi</a></li>
</ul>