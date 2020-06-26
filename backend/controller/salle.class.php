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
	}

 ?>