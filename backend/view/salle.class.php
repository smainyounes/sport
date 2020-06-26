<?php 

	/**
	 * 
	 */
	class view_salle
	{
		private $text;
		function __construct()
		{
			$this->text = $this->Text();
		}

		private function Text()
		{
			switch ($_SESSION['lang']) {
				case 'fr':
					return array('sports' => "Les Sports",
					 "infos" => "Information",
					 "description" => "Description",
					 "address" => "Addresse",
					 "add" => "Ajouter sport",
					 "tel" => "Telephone");
					break;
				
				case 'ar':
					return array('sports' => "رياضات",
					 "infos" => "معلومات",
					 "description" => "تفصيل",
					 "address" => "عنوان",
					 "add" => "إضافة رياضة",
					 "tel" => "هاتف");
					break;

			}
		}

		public function Profile($id_salle, $page)
		{
			$mod = new model_salle();
			$userinfo = $mod->Detail($id_salle);

			$view = new view_sport();

			?>

			<div class="center-cropped" 
			     style="background-image: url('<?php echo(PUBLIC_URL.'img/'.$userinfo->img_cover) ?>');">
			</div>

			<div class="text-center">
				<img class="rounded-circle border border-white" width="200px" height="200px" src="<?php echo(PUBLIC_URL.'img/'.$userinfo->img_prof) ?>" style="margin-top: -100px" >
			</div>
			<div class="display-4 text-center"><?php echo ucfirst($userinfo->nom); ?></div>
			<nav>
			  <div class="nav nav-tabs text-center" id="nav-tab" role="tablist">
			    <a class="nav-item nav-link flex-fill active" id="nav-home-tab" data-toggle="tab" href="#nav-home" role="tab" aria-controls="nav-home" aria-selected="true"><?php echo $this->text['sports']; ?></a>
			    <a class="nav-item nav-link flex-fill" id="nav-profile-tab" data-toggle="tab" href="#nav-profile" role="tab" aria-controls="nav-profile" aria-selected="false"><?php echo $this->text['infos']; ?></a>
			    <a class="nav-item nav-link flex-fill" id="nav-contact-tab" data-toggle="tab" href="#nav-contact" role="tab" aria-controls="nav-contact" aria-selected="false"><?php echo $this->text['description']; ?></a>
			  </div>
			</nav>
			<div class="tab-content" id="nav-tabContent">
			  <div class="tab-pane fade my-4 show active" id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab">
			  	
			  	<?php if(isset($_SESSION['salle']) && $id_salle == $_SESSION['salle']): ?>
			  	<div class="text-center my-4">
			  		<a class="btn btn-outline-secondary btn-lg" href="#"><?php echo $this->text['add']; ?> <i class="fas fa-plus"></i></a>
			  	</div>
			  	<?php endif; ?>

			  	<?php 

			  		$view->BySalle($id_salle, $page);

			  	 ?>
			  </div>
			  <div class="tab-pane fade my-4" id="nav-profile" role="tabpanel" aria-labelledby="nav-profile-tab">

			  	<?php if(isset($_SESSION['salle']) && $id_salle == $_SESSION['salle']): ?>
			  	<a class="text-secondary float-right" href="#"><i class="fas fa-edit"></i></a>
			  	<?php endif; ?>

			  	<table class="table table-borderless">
			  		<tr>
			  			<td><?php echo $this->text['address']; ?></td>
			  			<td><?php echo "$userinfo->wilaya, $userinfo->commune, ".ucfirst($userinfo->address);?></td>
			  		</tr>
			  		<tr>
			  			<td><?php echo $this->text['tel']; ?></td>
			  			<td><?php echo $userinfo->tel; ?></td>
			  		</tr>
			  	</table>
			  </div>
			  <div class="tab-pane fade my-4" id="nav-contact" role="tabpanel" aria-labelledby="nav-contact-tab">

			  	<?php if(isset($_SESSION['salle']) && $id_salle == $_SESSION['salle']): ?>
			  	<a class="text-secondary float-right" href="#"> <i class="fas fa-edit"></i></a>
			  	<?php endif; ?>

			  	<?php echo $userinfo->description_salle; ?>
			  </div>
			</div>

			<?php
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