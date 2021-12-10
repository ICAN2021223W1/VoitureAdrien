<?php
	$url = "/voiture/src/";
	$path = "/Applications/MAMP/htdocs".$url;
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<!-- Font Awesome -->
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css"
			integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
	<!-- Ekko -->
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ekko-lightbox/5.3.0/ekko-lightbox.css" />
	<!-- CSS Bootstrap -->
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
			integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
	<!-- Fonts -->
	<link href="https://fonts.googleapis.com/css?family=Kaushan+Script" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css?family=Lato" rel="stylesheet">
	<!-- Custom CSS -->
	<link rel="stylesheet" href="style.css">


	<title>Modèle et Marque</title>
</head>
<body>




	 <!-- Header, accueil grande image -->

	 <header id="top">
		 <h1>Nos Voitures</h1>
	 <nav class="navbar navbar-expand-md bg-dark navbar-dark fixed-top" id="main-nav">
	 	<a href="index.html" class="navbar-brand">
			 <img src="img/logo.png" alt="logo">
		 </a>
        	<button class="navbar-toggler" data-toggle="collapse" data-target="#navbarCollapse">
            	<span class="navbar-toggler-icon"></span>
        	</button>
	 	<ul class="navbar-nav ml-auto" id="liens">
		 	<li class="nav-item mr-1">
					<a href="<?= $url; ?>../?m=index" class="nav-link">Accueil</a>
			








					
			</li>
			<li class="nav-item mr-1">
				<a href="<?= $url; ?>../?m=marque_show" class="nav-link">Marque</a>

				
			</li>
				
			<li class="nav-item mr-1">
				<a href="<?= $url; ?>../?m=modeles" class="nav-link">Modèle</a>
			</li>

			</ul>
		</nav>
	</header>

	
	<main class="container">
                    
                    


          