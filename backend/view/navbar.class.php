<?php 

	/**
	 * 
	 */
	class view_navbar
	{
		
		private $text;
		function __construct($page = "home")
		{
			$this->text = $this->Text();
			$this->Head($page);

			$this->Guest();
		}

		private function Text()
		{
			switch ($_SESSION['lang']) {
				case 'fr':
					return array('home' => "Accueil",
					 "contact" => "Contact",
					 "error" => "Erreur",
					 "login" => "Identifier",
					 "all" => "Tout",
					 "lang" => "Langue",
					 "aboutus" => "A propos",
					 "test" => "Testing",
					 "detail" => "Detail",
					 "search" => "Recherche");
					break;
				
				case 'ar':
					return array('home' => "الصفحة الرئيسية",
					 "contact" => "اتصل",
					 "error" => "خطأ",
					 "login" => "دخول",
					 "all" => "الكل",
					 "lang" => "لغة",
					 "aboutus" => "معلومات عنا",
					 "test" => "Testing",
					 "detail" => "تفاصيل",
					 "search" => "بحث");
					break;

			}
		}

		private function Head($page)
		{
			?>

			<!doctype html>
			<html lang="<?php echo($_SESSION['lang']) ?>">
			  <head>
			    <!-- Required meta tags -->
			    <meta charset="utf-8">
			    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

			    <!-- logo icon -->
			    <link rel="icon" type="image/png" href="<?php echo(PUBLIC_URL.'img/logo.png') ?>" />

			    <!-- Bootstrap CSS -->
			    <link rel="stylesheet" href="<?php echo(PUBLIC_URL) ?>vendor/bootstrap/css/bootstrap.min.css">

			    <!-- font awesome -->
			    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css">
			    
			    <!-- flag icon -->
			    <link href="https://cdnjs.cloudflare.com/ajax/libs/flag-icon-css/3.1.0/css/flag-icon.min.css" rel="stylesheet">

			    <!-- animate css -->
			    <link rel="stylesheet" type="text/css" href="<?php echo(PUBLIC_URL) ?>vendor/animatecss/animate.css">

			    <!-- smooth product CSS -->
			    <link rel="stylesheet" type="text/css" href="<?php echo(PUBLIC_URL) ?>vendor/smoothproducts/css/smoothproducts.css">

			    <!-- custom css -->
			    <link rel="stylesheet" href="<?php echo(PUBLIC_URL) ?>css/custom.css">

				<!-- Wilaya / commune js -->
				<script src="<?php echo(PUBLIC_URL) ?>vendor/dzayer/dz2.js"></script>			    

			    <!-- Optional JavaScript -->
			    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
			    <script src="<?php echo(PUBLIC_URL) ?>vendor/jquery/jquery.min.js"></script>
			    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"></script>
			    <script src="<?php echo(PUBLIC_URL) ?>vendor/bootstrap/js/bootstrap.min.js"></script>

			    <!-- smooth product JS -->
			    <script type="text/javascript" src="<?php echo(PUBLIC_URL) ?>vendor/smoothproducts/js/smoothproducts.min.js"></script>

			    <title><?php echo WEBSITE_NAME." | ".$this->text[$page]; ?></title>
			  </head>
			  <body class="d-flex flex-column">
			  	
			<?php
		}

		public function Guest()
		{
			?>

			<nav class="navbar navbar-expand-md navbar-dark bg-dark fixed-top">
			  <a class="navbar-brand" href="<?php echo(PUBLIC_URL) ?>"><?php echo WEBSITE_NAME; ?></a>
			  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
			    <span class="navbar-toggler-icon"></span>
			  </button>

			  <div class="collapse navbar-collapse" id="navbarSupportedContent">
			    <ul class="navbar-nav ml-auto">
			      <li class="nav-item">
			        <a class="nav-link" href="<?php echo(PUBLIC_URL) ?>"><?php echo $this->text['home']; ?></a>
			      </li>
			      <li class="nav-item">
			        <a class="nav-link" href="<?php echo(PUBLIC_URL.'about') ?>"><?php echo $this->text['aboutus']; ?></a>
			      </li>
			      <li class="nav-item">
			        <a class="nav-link" href="<?php echo(PUBLIC_URL).'contact' ?>"><?php echo $this->text['contact']; ?></a>
			      </li>
			      <li class="nav-item dropdown">
			      	<a class="nav-link dropdown-toggle" href="" id="dropdown09" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" ><?php echo $this->text['lang']; ?></a>
			      	<div class="dropdown-menu text-center dropdown-menu-right" aria-labelledby="dropdown09">
			      	    <a class="dropdown-item" href="?lang=ar"><span class="flag-icon flag-icon-dz"> </span>  عربية</a>
			      	    <a class="dropdown-item" href="?lang=fr"><span class="flag-icon flag-icon-fr"> </span> Français</a>
			      	</div>
			      </li>
			      <li class="nav-item">
			      	<a href="<?php echo(PUBLIC_URL.'login') ?>" class="btn btn-secondary"><?php echo $this->text['login']; ?></a>
			      </li>
			    </ul>
			    
			  </div>
			</nav>

			<div class="container pt-4" id="page-content">

			<?php
		}

	}

 ?>