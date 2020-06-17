<?php 

	/**
	 * 
	 */
	class view_salle
	{
		
		function __construct()
		{
			# code...
		}

		

		public function SearchBar()
		{
			?>

			<div class="row p-4">
				<div class="col-md-6">
					<img class="img-fluid" src="<?php echo(PUBLIC_URL.'img/logo.png') ?>">
				</div>
				<div class="col-md-6">
					<form class="row mt-md-5" method="POST">
						<div class="col-md-5 my-2">
							<select class="form-control form-control-lg mx-1">
								<option selected>Blida</option>
							</select>
						</div>
						<div class="col-md-5 my-2">
							<select class="form-control form-control-lg mx-1">
								<option selected>Blida</option>
							</select>
						</div>
						<div class="col-md-2 my-2">
							<button class="btn btn-primary btn-lg"><i class="fas fa-search"></i></button>
						</div>						
					</form>
				</div>
			</div>

			<?php
		}
	}

 ?>