
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
				<div class="booking-panel">
					<div class="booking-panel-section booking-panel-section1">
						<h1>RESERVE YOUR TICKET</h1>
					</div>
					<div class="booking-panel-section booking-panel-section2" onclick="window.history.go(-1); return false;">
						<i class="fas fa-2x fa-times"></i>
					</div>

						<div class="booking-panel-section booking-panel-section3">
							<div class="movie-box">
								
									<img src ="<?=URLROOT.'/public/images/films/'.$data['image'] ?> " alt="">';
									
							</div>
						</div>
						<div class="booking-panel-section booking-panel-section4">
							<div class="filmpage_name"><?=$data['name'] ?></div>
							<div class="movie-information">
								<table>
									<tr>
										<td>GENRE:</td>
										<td><?=$data['genre'] ?></td>
									</tr>
									<tr>
										<td>DURATION:</td>
										<td><?=$data['duration'] ?> minute</td>
									</tr>
									<tr>
										<td>DIRECTOR:</td>
										<td><?=$data['director'] ?></td>
									</tr>
									<tr>
										<td>ACTORS:</td>
										<td><?=$data['actors'] ?></td>
									</tr>
								</table>
							</div>
						
						</div>

				</div>
			</div>
				
		</div>