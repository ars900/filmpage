
			<div class = "back_img_home">	
				<div id="mainNavigation">
					<nav role="navigation">
						<div class="py-3 text-center border-bottom">
						<img src='<?=URLROOT.'/public/images/filmhome/kisspng-film-portable-network-graphics-hoyts-cinematograph-5d2c8faf194cc7.2833107515632014551036.png'?>' alt="" class="invert" style = "width: 100px">
						</div>
					</nav>
					<div class="navbar-expand-md">
						<div class="navbar-dark text-center my-2">
						<button class="navbar-toggler w-75" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
							<span class="navbar-toggler-icon"></span> <span class="align-middle">Menu</span>
						</button>
						</div>
						<div class="text-center mt-3 collapse navbar-collapse" id="navbarNavDropdown">
						<ul class="navbar-nav mx-auto ">
							<li class="nav-item">
							<a class="nav-link active" aria-current="page" href="#">Home</a>
							</li>
							<li class="nav-item">
							<a class="nav-link" href="#">Book Hotel</a>
							</li>
							<li class="nav-item">
							<a class="nav-link" href="#">Destinations</a>
							</li>
							<li class="nav-item">
							<a class="nav-link" href="#">Policy</a>
							</li>
							<li class="nav-item dropdown">
							<a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-bs-toggle="dropdown" aria-expanded="false">
								Company
							</a>
							<ul class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
								<li><a class="dropdown-item" href="#">Blog</a></li>
								<li><a class="dropdown-item" href="#">About Us</a></li>
								<li><a class="dropdown-item" href="#">Contact us</a></li>
							</ul>
							</li>
						</ul>
						</div>
					</div>
				</div>
				<div class=  "slider ">
					<?php
						foreach($data as $value){ ?>
							<div >
								<a href = "<?=URLROOT.'filmpage/fullFilm/'.$value['film_id']?>" class = "text-decoration-none text-secondary fw-bold">
									<div>
										<img style = "width: 250px;" class = "image_view" src ="<?=URLROOT.'/public/images/films/'.$value['image'] ?> ">
									</div>
									<div>
										<h3 class = "text-decoration-none"><?=$value['name'] ?></h3>
										<p class = "text-decoration-none"><i class="fa-solid fa-fas-film"></i><span>Genre: <?=$value['genre'] ?></span></p>
										<p class = "text-decoration-none"><i class="fa-solid fa-person"></i><span>Director: <?=$value['director'] ?></span></p>
									</div>
								</a>
							</div>
					<?php } ?>	
				</div>
			</div>