<?php
session_start();

$bdd = new PDO('mysql:host=sql313.byethost22.com;port=3306;dbname=b22_23488327_espace_membre', 'b22_23488327', 'Flashdanseifs!01');


if(isset($_POST['formconnexion'])) {
   $mailconnect = htmlspecialchars($_POST['mailconnect']);
   $mdpconnect = sha1($_POST['mdpconnect']);
   if(!empty($mailconnect) AND !empty($mdpconnect)) {
      $requser = $bdd->prepare("SELECT * FROM membres WHERE mail = ? AND motdepasse = ?");
      $requser->execute(array($mailconnect, $mdpconnect));
      $userexist = $requser->rowCount();
      if($userexist == 1) {
         $userinfo = $requser->fetch();
         $_SESSION['id'] = $userinfo['id'];
         $_SESSION['pseudo'] = $userinfo['pseudo'];
         $_SESSION['mail'] = $userinfo['mail'];
         $_SESSION['type'] = $userinfo['type'];
         
         header("Location: src/acces/profil.php?id=".$_SESSION['id']);
      } else {
         $erreur = "Mauvais mail ou mot de passe !";
      }
   } else {
      $erreur = "Tous les champs doivent etres complétés !";
   }
}

?>

			<!DOCTYPE html>
<html>

   <head>
   <meta charset="UTF-8">
         <title>Flashdanceifs-Accueil</title>
         <meta name="keywords" content="Flash, line, danse de salon,danse,cours de danse,chacha,rock,salsa,tango,jive,valse,rumba ;-)">
         <meta name="description" content="quelque soit votre niveau venez faire un essai ;-)">
         <meta name="viewport" content="width=device-width, initial-scale=1">
        
        <!-- CSS -->
        
         <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bulma/0.7.2/css/bulma.min.css">
         <link rel="stylesheet" href="src/css/main.css" />
         <link rel="stylesheet" type="text/css" href="src/css/style.css"/>
         <link href="https://netdna.bootstrapcdn.com/bootstrap/3.1.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
          <link rel="stylesheet" href="https://unpkg.com/leaflet@1.3.1/dist/leaflet.css" integrity="sha512-Rksm5RenBEKSKFjgI3a41vrjkw4EVPlJ3+OiI65vTjIdo9brlAacEuKOiQ5OFh7cOI1bkDwLqdLw3Zg0cRJAAQ=="
          crossorigin="" />
        <!-- CSS -->
        
        <!-- font -->
        <link href="https://fonts.googleapis.com/css?family=Montserrat:700" rel="stylesheet"> 
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css" integrity="sha384-UHRtZLI+pbxtHCWp1t77Bi1L4ZtiqrqD80Kn4Z8NTSRyMA2Fd33n5dQ8lWUE00s/" crossorigin="anonymous">
         <script defer src="https://use.fontawesome.com/releases/v5.3.1/js/all.js"> </script
        <!-- font -->
        
          <style type="text/css"> </style>
         
</head>


		<!-- body-->
	<body>
   <center><img src="src/img/logofd41.jpg" alt="image de l'en tete du site flashdanseifs" ></center>
		  
		<header class="header">
					 
			<a href="#" class="header-logo">	</a>
					
					<!-- menu responsive -->
					<nav class="navbar">
							
						<div class="navbar-brand">
							<a class="navbar-item" href="#" style="font-weight:bold;"></a>
								<span class="navbar-burger burger" data-target="navMenu">
									<span></span>
									<span></span>
									<span></span>
								</span>
						</div>
						<div id="navMenu" class="navbar-menu">
							<div class="navbar-end">
								<a href="index.html" class="navbar-item ">Accueil</a>
								<a href="cours.html" class="navbar-item ">Cours</a>
								<a href="blog.html" class="navbar-item ">Blog</a>
								
								<a href="adherent.php" class="navbar-item is-active">Adhérent</a>
								<p>	   
							</div>
							
						</div>
						
					</nav>
					
					
					<!-- menu responsive -->
				</header>

			<!-- banner-->
			<div class="page-wrap">
				<div class="container">
		
						<br/>
						<br/>
						<br/>
						<br/>
							<center> <b id="login-name">Reservé aux Adhérents </b> </center>
								<div class="row">
										<div class="col-md-6 col-md-offset-3" id="login">  
												<form method="POST" action="">
														<div class="form-group">
															<label class="user"> Mail  </label>
																<div class="input-group">
																			<span class="input-group-addon" id="iconn"> <i class="glyphicon glyphicon-user"></i></span>
																			<input type="email" class="form-control" name="mailconnect" placeholder="Votre mail"  name="mail" >
																</div>
														</div>
															<br>
															
											<div class="form-group">
<label class="user"> Mot de passe </label>
<div class="input-group">
	<span class="input-group-addon" id="iconn1"> <i class="glyphicon glyphicon-lock"></i></span>
<input type="password" class="form-control"  name="mdpconnect" placeholder=" Entrez le mot de passe">
</div>
</div>

<div class="form-group">
<br>
<br>
<input type="submit" class="btn btn-success" name="formconnexion" value="login" style="border-radius:0px;">
<input type="reset" class="btn btn-danger" value="reset" style="border-radius:0px;">
 
    </div>

    <br/><br/><br/><br><br>
    <a href="#" style="color: white; font-size: 15px; float: right; margin-right: 10px;"> Mot de passe oubliÃ© </a>
   







</form>
 <?php
         if(isset($erreur)) {
            echo '<font color="red">'.$erreur."</font>";
         }
         ?>


						<br>

										</div>




								</div>
	
				</div>
						<br>
						<br>

			</div>

			<!-- banner-->
			<!-- pied de page-->
<footer id="footer" class="top-space">

		<div class="footer1">
			<div class="container">
				<div class="row">
					
					<div class="col-md-4 widget">
						<h3 class="widget-title">Contactez-nous</h3>
						<div class="widget-body">
							<i class="fa fa-phone "></i>
												
											02 31 84 78 62<br>06 38 92 01 85
						<br>
								flashdanse.secretariat@outlook.fr
								<br>
								Flash danse Ifs<br>
											8, rue de l'Ile de France<br>
											14123 Ifs
							
						
						</div>
					</div>

					

					<div class="col-md-6 widget">
						<h3 class="widget-title"></h3>
						<div class="widget-body">
                                                      <img src="src/img/logofd1.jpg" alt="logo bas de page">
						</div>
					</div>
					<div class="col-md-2 widget">
      
						<h3 class="widget-title">Suivez-nous</h3>
						<div class="widget-body">
							
								
								<a href="https://www.facebook.com/groups/2245405772392772/"><i class="fab fa-facebook-square fa-4x"></i></a>
							
     
					</div>
				</div> <!-- /row of widgets -->
			</div>
		</div>

		 </div>
	
    </footer>
<link rel="stylesheet" href="src/css/main2.css">
        
			
			 <!-- pied de page-->  

				<!-- script -->    
				<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.4/jquery.min.js">
				</script>
				<script src="src/js/main.js">
				</script>
				<!-- script menu responsive-->
				<script type="text/javascript">(function()
					{
						var burger = document.querySelector('.burger');
						var  nav = document.querySelector('#'+burger.dataset.target);
						burger.addEventListener('click', function()
							{
								burger.classList.toggle('is-active');
								nav.classList.toggle('is-active');
							});
									
					})();
				</script>
				<!-- script menu responsive-->
				<!-- script -->    
				
			
	</body>

    <!-- body-->
</html>
