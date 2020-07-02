<?php 

	/**
	 * 
	 */
	class view_login
	{
		private $text;
		function __construct()
		{
			$this->text = $this->Text();
			$this->Login();
		}

		private function Text()
		{
			switch ($_SESSION['lang']) {
				case 'fr':
					return array('username' => "Nom d'utilisateur",
					 "password" => "Mot de passe",
					 "forgot" => "Mot de passe oublié?",
					 "register" => "S'inscrire",
					 "login" => "S'identifier");
					break;
				
				case 'ar':
					return array('username' => "اسم المستخدم",
					 "password" => "كلمة السر",
					 "forgot" => "هل نسيت كلمة المرور؟",
					 "register" => "تسجيل",
					 "login" => "تسجيل الدخول");
					break;

			}
		}

		public function Login()
		{
			?>

			<form method="POST" class="mx-auto h-100 d-flex flex-column align-items-center justify-content-center" style="max-width: 50rem">
				<i class="fas fa-10x fa-users text-center my-2"></i>
				<input class="form-control form-control-lg my-2 text-center" type="text" name="username" placeholder="<?php echo($this->text['username']) ?>">
				<input class="form-control form-control-lg my-2 text-center" type="password" name="password" placeholder="<?php echo($this->text['password']) ?>">
				<a class="my-2" href="#"><?php echo $this->text['forgot']; ?></a>
				<input type="text" name="tokken" value="<?php echo($_SESSION['tokken']); ?>" hidden>
				<div>
					<a class="btn btn-outline-secondary btn-lg my-2 px-4" href="<?php echo(PUBLIC_URL.'salle/inscription') ?>"><?php echo $this->text['register']; ?></a>
					<button class="btn btn-primary btn-lg my-2 px-4"><?php echo $this->text['login']; ?></button>
				</div>
			</form>

			<?php
		}
	}

 ?>