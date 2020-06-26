<?php 

	/**
	 * 
	 */
	class view_sport
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
					return array('info_sp' => "Info sport",
					 "loading" => "Chargement...",
					 "error" => "Erreur",
					 "info_sa" => "Info salle",
					 "detail" => "Detail",
					 "address" => "Addresse",
					 "tel" => "Telephone",
					 "exemple" => "Exemple: Karaté",
					 "nothing" => "Aucun sport trouvé",
					 "edit_info" => "Modifier les infos",
					 "edit_img" => "Modifier les images",
					 "delete" => "Supprimer",
					 "search" => "Recherche");
					break;
				
				case 'ar':
					return array('info_sp' => "معلومات عن الرياضة",
					 "loading" => "جار التحميل ....",
					 "error" => "خطأ",
					 "info_sa" => "معلومات عن الصالة الرياضية",
					 "detail" => "تفاصيل",
					 "address" => "عنوان",
					 "tel" => "هاتف",
					 "exemple" => "مثال: الكاراتيه",
					 "nothing" => "لم يتم العثور على رياضة",
					 "edit_info" => "تعديل المعلومات",
					 "edit_img" => "تعديل الصور",
					 "delete" => "حذف",
					 "search" => "بحث");
					break;

			}
		}

		public function SportCard($data)
		{
			?>

			<div class="card mx-auto mb-2" style="max-width: 18rem;">
				<a href="<?php echo(PUBLIC_URL.'sport/detail/'.$data->id_sport) ?>">
			  		<img class="card-img-top" src="<?php echo(PUBLIC_URL.'img/'.$data->link) ?>" alt="Card image cap">
				</a>

				<?php if(isset($_SESSION['salle']) && $data->id_salle == $_SESSION['salle']): ?>
				<div class="btn-group m-1 edit-button-grp">
					<div class="dropdown">
					  <a class="btn btn-light" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
					    <i class="fas fa-edit"></i>
					  </a>

					  <div class="dropdown-menu dropdown-menu-right text-center" aria-labelledby="dropdownMenuLink">
					    <a class="dropdown-item" href="#"><?php echo $this->text['edit_info']; ?></a>
					    <a class="dropdown-item" href="#"><?php echo $this->text['edit_img']; ?></a>
					    <div class="dropdown-divider"></div>
					    <a class="dropdown-item text-danger" href="#"><?php echo $this->text['delete']; ?> <i class="fas fa-trash"></i></a>
					  </div>
					</div>
				</div>
				<?php endif; ?>

			  <div class="card-body">
			    <h5 class="card-title">
			    	<?php 
			    		if($_SESSION['lang'] === "ar")
			    			echo $data->nom_arab;
			    		else
			    			echo ucfirst($data->nom_french);
			    	 ?>
			    </h5>
			    <p class="card-text"><?php echo "$data->wilaya , $data->commune"; ?></p>


			  </div>
			  <div class="card-footer text-muted">
			  	<a href="<?php echo (PUBLIC_URL.'salle/profile/'.$data->id_salle) ?>">
				  	<img class="rounded-circle float-left mr-2" width="30px" height="30px" src="<?php echo(PUBLIC_URL.'img/'.$data->img_prof) ?>" alt="Card image cap">
			  	</a>
			  	<div class="text-muted"><?php echo "$data->nom"; ?></div>
			  </div>
			</div>

			<?php
		}
	
		public function All($page)
		{
			$this->Search("tout", "tout", "", $page);
		}

		public function Search($wilaya, $commune, $keyword, $page)
		{
			$mod = new model_sport();

			$data = $mod->Search($wilaya, $commune, $keyword, $page);

			$total_sports = $mod->CountSport($wilaya, $commune, $keyword);

			$total_pages = ceil($total_sports / 20);

			?>
			<hr>
			<div class="h1 mb-4 text-center"><?php echo $this->text['search']; ?></div>

			<?php if($data): ?>

			<div class="row justify-content-center">
				<?php foreach($data as $sport): ?>

				<div class="col-sm-4 col-md-3">
					<?php $this->SportCard($sport) ?>
				</div>

				<?php endforeach; ?>
			</div>

			<?php if($total_pages > 1): ?>
			<nav aria-label="Page navigation example">
			  <ul class="pagination flex-wrap justify-content-center">
			  	<?php for($i = 1; $i <= $total_pages; $i++): ?>
			  		<?php if($i == $page): ?>
			  			<li class="page-item active"><a class="page-link" href="#"><?php echo $i; ?></a></li>
			  		<?php else: ?>
			  			<li class="page-item"><a class="page-link" href="<?php echo(PUBLIC_URL.'sport/search/'.$i.'/'.$wilaya.'/'.$commune.'/'.$keyword) ?>"><?php echo $i; ?></a></li>
			  		<?php endif; ?>
			    
				<?php endfor; ?>
			  </ul>
			</nav>
			<?php endif; ?>

			<?php else: ?>
				<?php $this->Nothing(); ?>
			<?php endif; ?>

			<?php
		}

		public function Detail($id_sport)
		{
			$mod = new model_sport();
			$img_mod = new model_image();

			$data = $mod->Detail($id_sport);
			$images = $img_mod->GetImages($id_sport);
			?>

			<div class="h1 text-center my-4"><?php echo $this->text['detail']; ?></div>

			<div class="d-flex">
				<div class="sp-loading"><img src="<?php echo(PUBLIC_URL) ?>img/sp-loading.gif" alt=""><br><?php echo $this->text['loading']; ?></div>
				<div class="sp-wrap mx-auto">
					<?php foreach($images as $img): ?>
					<a href="<?php echo(PUBLIC_URL.'img/'.$img->link) ?>"><img class="img-fluid" src="<?php echo(PUBLIC_URL.'img/'.$img->link) ?>" alt=""></a>
					<?php endforeach; ?>
				</div>
			</div>

			<nav>
			  <div class="nav nav-tabs text-center" id="nav-tab" role="tablist">
			    <a class="nav-item nav-link flex-fill active" id="nav-home-tab" data-toggle="tab" href="#nav-home" role="tab" aria-controls="nav-home" aria-selected="true"><?php echo $this->text['info_sp']; ?></a>
			    <a class="nav-item nav-link flex-fill" id="nav-profile-tab" data-toggle="tab" href="#nav-profile" role="tab" aria-controls="nav-profile" aria-selected="false"><?php echo $this->text['info_sa']; ?></a>
			  </div>
			</nav>
			<div class="tab-content" id="nav-tabContent">

			  <div class="tab-pane fade show active p-3" id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab">
			  	<div class="h4">
			  		<?php 
			    		if($_SESSION['lang'] === "ar")
			    			echo $data->nom_arab;
			    		else
			    			echo ucfirst($data->nom_french);
			    	 ?>
			  	</div>
			  	<div class=""><?php echo "$data->wilaya , $data->commune"; ?></div>
			  	<hr>
			  	<p><?php echo "$data->description_sport"; ?></p>
			  </div>

			  <div class="tab-pane fade p-3" id="nav-profile" role="tabpanel" aria-labelledby="nav-profile-tab">
			  	<div class="mt-3 d-flex flex-column flex-md-row">
			  		<div class="text-center">
			  			<a href="<?php echo(PUBLIC_URL.'salle/profile/'.$data->id_salle) ?>">
			  				<img class="rounded-circle" src="<?php echo(PUBLIC_URL.'img/'.$data->img_prof) ?>" width="150px" height="150px">
			  			</a>
			  			<div class="h2 mt-4"><?php echo ucfirst($data->nom); ?></div>
			  		</div>
			  		<div class="px-md-3 ml-md-3 align-self-center">
			  			<table class="table table-borderless">
			  				<tr>
			  					<td class="h6"><?php echo $this->text['address']; ?></td>
			  					<td><?php echo "$data->wilaya, $data->commune, ".ucfirst($data->address);?></td>
			  				</tr>
			  				<tr>
			  					<td class="h6"><?php echo $this->text['tel']; ?></td>
			  					<td><?php echo $data->tel; ?></td>
			  				</tr>
			  			</table>
			  		</div>
			  	</div>

			  	<hr>

			  	<p><?php echo $data->description_salle; ?></p>

			  </div>
			</div>


			<?php
		}

		public function BySalle($id_salle, $page)
		{
			$mod = new model_sport();

			$data = $mod->GetBySalle($id_salle, $page);

			$total_sports = $mod->CountBySalle($id_salle);

			$total_pages = ceil($total_sports / 20);

			?>

			<?php if($data): ?>

			<div class="row justify-content-center">
				<?php foreach($data as $sport): ?>

				<div class="col-sm-4 col-md-3">
					<?php $this->SportCard($sport) ?>
				</div>

				<?php endforeach; ?>
			</div>

			<?php if($total_pages > 1): ?>
			<nav aria-label="Page navigation example">
			  <ul class="pagination flex-wrap justify-content-center">
			  	<?php for($i = 1; $i <= $total_pages; $i++): ?>
			  		<?php if($i == $page): ?>
			  			<li class="page-item active"><a class="page-link" href="#"><?php echo $i; ?></a></li>
			  		<?php else: ?>
			  			<li class="page-item"><a class="page-link" href="<?php echo(PUBLIC_URL.'salle/profile/'.$id_salle.'/'.$i) ?>"><?php echo $i; ?></a></li>
			  		<?php endif; ?>
			    
				<?php endfor; ?>
			  </ul>
			</nav>
			<?php endif; ?>

			<?php else: ?>
				<?php $this->Nothing(); ?>
			<?php endif; ?>

			<?php
		}

		public function SearchForm()
		{
			?>

			<div class="p-4 text-center">
				<img class="img-fluid" src="<?php echo(PUBLIC_URL.'img/logo.png') ?>">
			</div>

			<form class="mt-md-5" method="GET">
				<div class="row">
					<div class="col-md-6 offset-md-3 my-2">
						<input class="form-control form-control-lg text-center" type="text" name="keyword" placeholder="<?php echo($this->text['exemple']) ?>">
					</div>
				</div>
				<div class="row">					
					<div class="col-md-4 offset-md-2 my-2">
						<select name="wilaya" onchange="f1(this)" class="form-control form-control-lg wil1">
						</select>
					</div>
					<div class="col-md-4 my-2">
						<select name="commune" class="form-control form-control-lg com1">
						</select>
					</div>
								
				</div>
				<div class="my-2 text-center">
					<button class="btn btn-primary btn-lg"><?php echo $this->text['search']; ?> <i class="fas fa-search"></i></button>
				</div>
			</form>

			<?php
		}

		public function SearchFormHome()
		{
			?>

			<div class="h-75 d-flex align-items-center justify-content-center">
				<div class="w-100">
					<?php $this->SearchForm(); ?>
				</div>
			</div>

			<?php
		}

		public function Nothing()
		{
			?>

			<div class="">
				<div class="h1 text-center"><?php echo $this->text['nothing']; ?></div>
			</div>

			<?php
		}

	}

 ?>