<?php 

	/**
	 * 
	 */
	class controller_sport
	{
		
		function __construct()
		{
			# code...
		}

		public function Search($page, $wilaya, $commune, $keyword = "")
		{
			// head & navbar
			new view_navbar("search");

			// testing function
			$view = new view_sport();
			$view->SearchForm();
			$view->Search($wilaya, $commune, $keyword, $page);

			// footer
			include BACKEND_URL.'includes/footer.inc.php';
		}

		public function Detail($id_sport)
		{
			// head & navbar
			new view_navbar("detail");

			// testing function
			$view = new view_sport();
			$view->Detail($id_sport);

			// footer
			include BACKEND_URL.'includes/footer.inc.php';
		}
	}

 ?>