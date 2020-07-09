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
					 "save" => "Enregistrer",
					 "gen_infos" => "infos générales",
					 "description" => "Description",
					 "address" => "Addresse",
					 "add" => "Ajouter sport",
					 "register" => "S'inscrire",
					 "username" => "Nom d'utilisateur",
					 "password" => "Mot de passe",
					 "old_pass" => "Ancien mot de passe",
					 "new_pass" => "Nouveau mot de passe",
					 "repassword" => "Répéter le mot de passe",
					 "nom" => "Nom salle de sport",
					 "register" => "S'inscrire",
					 "settings" => "Paramètres",
					 "tel" => "Telephone");
					break;
				
				case 'ar':
					return array('sports' => "رياضات",
					 "infos" => "معلومات",
					 "save" => "حفظ",
					 "gen_infos" => "معلومات عامة",
					 "description" => "تفصيل",
					 "address" => "عنوان",
					 "add" => "إضافة رياضة",
					 "register" => "تسجيل",
					 "username" => "اسم المستخدم",
					 "password" => "كلمة السر",
					 "old_pass" => "كلمة المرور القديمة",
					 "new_pass" => "كلمة سر جديدة",
					 "repassword" => "اعد كلمة السر",
					 "nom" => "اسم الصالة الرياضية",
					 "register" => "تسجيل",
					 "settings" => "الإعدادات",
					 "tel" => "هاتف");
					break;

			}
		}

		public function Settings()
		{
			// get user data
			$mod = new model_salle();
			$data = $mod->Detail($_SESSION['salle']);

			?>

			<h1 class="display-4 text-center my-4"><?php echo $this->text['settings']; ?></h1>
			<div class="row">
			  <div class="col-md-3 mb-4">
			    <div class="nav flex-md-column nav-pills" id="v-pills-tab" role="tablist" aria-orientation="vertical">
			      <a class="nav-link active" id="v-pills-home-tab" data-toggle="pill" href="#v-pills-home" role="tab" aria-controls="v-pills-home" aria-selected="true"><?php echo $this->text['gen_infos']; ?></a>
			      <a class="nav-link" id="v-pills-profile-tab" data-toggle="pill" href="#v-pills-profile" role="tab" aria-controls="v-pills-profile" aria-selected="false"><?php echo $this->text['address']; ?></a>
			      <a class="nav-link" id="v-pills-messages-tab" data-toggle="pill" href="#v-pills-messages" role="tab" aria-controls="v-pills-messages" aria-selected="false"><?php echo $this->text['description']; ?></a>
			      <a class="nav-link" id="v-pills-password-tab" data-toggle="pill" href="#v-pills-password" role="tab" aria-controls="v-pills-password" aria-selected="false"><?php echo $this->text['password']; ?></a>
			    </div>
			  </div>
			  <div class="col-md-9">
			    <div class="tab-content" id="v-pills-tabContent">
			      <div class="tab-pane fade show active" id="v-pills-home" role="tabpanel" aria-labelledby="v-pills-home-tab">
			      	<form class="row" method="POST">
			      		<div class="col-md-4 form-group">
			      			<label><?php echo $this->text['nom']; ?></label>
			      			<input class="form-control" type="text" name="nom" required value="<?php echo($data->nom); ?>">
			      		</div>
			      		<div class="col-md-4 form-group">
			      			<label><?php echo $this->text['username']; ?></label>
			      			<input class="form-control" type="text" name="username" required value="<?php echo($data->username); ?>">
			      		</div>
			      		<div class="col-md-4 form-group">
			      			<label><?php echo $this->text['tel']; ?></label>
			      			<input class="form-control" type="text" name="tel" required value="<?php echo($data->tel); ?>">
			      		</div>
			      		<button class="btn btn-primary mx-auto"><?php echo $this->text['save'] ?></button>
			      	</form>
			      </div>
			      <div class="tab-pane fade" id="v-pills-profile" role="tabpanel" aria-labelledby="v-pills-profile-tab">
			      	<form class="row" method="POST">
			      		<div class="col-md-6 d-flex flex-md-column justify-content-between">
			      			<select name="wilaya" required onchange="f2(this)" class="form-control mb-2 wil2">
			      			</select>
			      			<select name="commune" required class="form-control com2">
			      			</select>
			      		</div>
			      		<div class="col-md-6">
			      			<textarea class="form-control" name="address" placeholder="<?php echo($this->text['address']); ?>" rows="3" required><?php echo $data->address; ?></textarea>
			      		</div>
			      		<button class="btn btn-primary mt-4 mx-auto"><?php echo $this->text['save'] ?></button>
			      	</form>
			      </div>
			      <div class="tab-pane fade" id="v-pills-messages" role="tabpanel" aria-labelledby="v-pills-messages-tab">
			      	<form method="POST">
			      		<textarea class="form-control" name="description" placeholder="<?php echo($this->text['description']); ?>" rows="7" required><?php echo $data->description_salle; ?></textarea>
			      		<div class="form-group text-center">
			      			<button class="btn btn-primary my-4"><?php echo $this->text['save'] ?></button>
			      		</div>
			      	</form>
			      </div>
			      <div class="tab-pane fade" id="v-pills-password" role="tabpanel" aria-labelledby="v-pills-password-tab">
			      	<form method="POST">
			      		<div class="form-group">
			      			<label><?php echo $this->text['old_pass']; ?></label>
			      			<input class="form-control" type="password" name="oldpass" required>
			      		</div>
			      		<div class="form-group">
			      			<label><?php echo $this->text['new_pass']; ?></label>
			      			<input class="form-control" type="password" name="password" required>
			      		</div>
			      		<div class="form-group">
			      			<label><?php echo $this->text['repassword']; ?></label>
			      			<input class="form-control" type="password" name="pass2" required>
			      		</div>
			      		<div class="form-group text-center">
				      		<button class="btn btn-primary"><?php echo $this->text['save'] ?></button>
			      		</div>
			      	</form>
			      </div>
			    </div>
			  </div>
			</div>
			<script type="text/javascript">
				wilaya1(<?php echo $data->wilaya; ?>, true);
				SelectCommune(<?php echo $data->wilaya; ?>, '<?php echo($data->commune); ?>');
			</script>
			<?php
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

		public function Inscription()
		{
			?>

			<div class="h-100 d-flex justify-content-center">
				<div class="container align-self-center p-4 border text-center">
					<i class="fas fa-10x fa-users text-center my-2"></i>
					<div class="display-4 mb-4"><?php echo $this->text['register']; ?></div>
					<form method="POST">
						<div class="row">
							<div class="col-md-6">
								<div class="form-group">
								  <input type="text" class="form-control" name="nom" placeholder="<?php echo($this->text['nom']) ?>" required>
								</div>
							</div>
							<div class="col-md-6">
								<div class="form-group">
								  <input type="text" class="form-control" name="tel" placeholder="<?php echo($this->text['tel']) ?>" required>
								</div>
							</div>
						</div>
						<div class="row">
							<div class="col-md-4">
								<div class="form-group">
								  <input type="text" class="form-control" name="username" placeholder="<?php echo($this->text['username']) ?>" required>
								</div>
							</div>
							<div class="col-md-4">
								<div class="form-group">
								  <input type="password" class="form-control" name="password" placeholder="<?php echo($this->text['password']) ?>" required>
								</div>
							</div>
							<div class="col-md-4">
								<div class="form-group">
								  <input type="password" class="form-control" name="password2" placeholder="<?php echo($this->text['repassword']) ?>" required>
								</div>
							</div>
						</div>
					  	<div class="row">
					  		<div class="col-md-6 d-flex flex-md-column justify-content-between">
					  			<select name="wilaya" onchange="f1(this)" class="form-control mb-2 wil1">
					  			</select>
					  			<select name="commune" class="form-control com1">
					  			</select>
					  		</div>
					  		<div class="col-md-6">
					  			<textarea class="form-control" name="address" placeholder="<?php echo($this->text['address']) ?>" rows="3" required></textarea>
					  		</div>
					  	</div>
					  	<textarea class="form-control my-4" name="description" rows="4" placeholder="<?php echo($this->text['description']) ?>" required></textarea>
					  	<button class="btn btn-primary px-4 text-center"><?php echo $this->text['register']; ?> <i class="fas fa-sign-in-alt"></i></button>
						<input type="text" name="tokken" value="<?php echo($_SESSION['tokken']); ?>" hidden>
					</form>
				</div>
			</div>

			<?php
		}
	}

 ?>