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
			new view_navbar("test");

			// testing function
			$view = new view_salle();
			$view->Profile($id_salle, $page);

			// footer
			include BACKEND_URL.'includes/footer.inc.php';
		}
	}

 ?>