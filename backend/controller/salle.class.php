<?php 

	/**
	 * 
	 */
	class controller_salle
	{
		
		function __construct()
		{
			# code...
		}

		public function Profile($id_salle, $page = 1)
		{
			// head & navbar
			new view_navbar("profile");

			// testing function
			$view = new view_salle();
			$view->Profile($id_salle, $page);

			// footer
			include BACKEND_URL.'includes/footer.inc.php';
		}

		public function Settings()
		{
			// checking if user loggedin
			if (!isset($_SESSION['salle'])) {
				header("Location: ".PUBLIC_URL."error");
			}

			// checking if data posted
			if ($_SERVER['REQUEST_METHOD'] === 'POST'){

				$mod = new model_salle();

				if (isset($_POST['nom'])) {
					// update general infos
					$mod->EditGeneralInfos();
				}

				if (isset($_POST['address'])) {
					// update address
					$mod->EditAddress();
				}

				if (isset($_POST['password'])) {
					// update password
					if ($_POST['password'] === $_POST['pass2']) {
						$mod->ChangePassword();
					}
				}

				if (isset($_POST['description'])) {
					// update description
					$mod->EditDescription();
				}
			}

			// head & navbar
			new view_navbar("settings");

			// testing function
			$view = new view_salle();
			$view->Settings();

			// footer
			include BACKEND_URL.'includes/footer.inc.php';
		}

		public function Login()
		{
			
			if ($_SERVER['REQUEST_METHOD'] === 'POST') {
				if (isset($_POST['username']) && isset($_POST['password']) && isset($_POST['tokken'])) {
					if ($_POST['tokken'] === $_SESSION['tokken']) {
						$mod = new model_salle();
						if ($mod->Login()) {
							header("Location: ".PUBLIC_URL."salle/profile/".$_SESSION['salle']);
						}
					}
				}
			}

			$_SESSION['tokken'] = token();

			// head & navbar
			new view_navbar("test");

			new view_login;

			// footer
			include BACKEND_URL.'includes/footer.inc.php';
		}

		public function Logout()
		{
			$mod = new model_salle();

			$mod->Logout();

			header("Location: ".PUBLIC_URL);
		}

		public function Inscription()
		{
			if ($_SERVER['REQUEST_METHOD'] === 'POST') {
				if (isset($_POST['tokken']) && $_POST['tokken'] === $_SESSION['tokken']) {
					$mod = new model_salle();
					if ($mod->Inscription()) {
						header("Location: ".PUBLIC_URL."salle/login");
					}
				}
			}

			$_SESSION['tokken'] = token();

			// head & navbar
			new view_navbar("test");

			$view = new view_salle();
			$view->Inscription();

			// footer
			include BACKEND_URL.'includes/footer.inc.php';
		}

	}

 ?>