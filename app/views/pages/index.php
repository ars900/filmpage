<?php


	

?>
	<div class = "w-100 h-100 back_img">
		<div class = "container">
			<div class = "row">
				<div class = "col-lg-6 col-md-6 col-sm-12 float-start  mt-5 me-5">
					<div class = "col-lg-12 col-md-12 col-sm-12">
						<h2 class="display-5 text-center pt-3" style="color: blanchedalmond;">Registration</h2>
					</div>
					<form action = "<?=URLROOT;?>users/registration" method = "post">
						<div class="form-row row mt-5">
							<div class="col col-md-6 position-relative">
								<span class = "for_error mt-2 position-absolute d-<?=(get_session('errors') != null && in_array('name',get_session('errors'))) ? 'block' : 'none'; ?>">required field*</span>
								<input type="text" class="form-control <?=(get_session('errors') != null && in_array('name', get_session('errors'))) ? 'border-danger' : ''; ?>" placeholder="Name" name = "name" value = "<?=(get_session('reg_form_values') != null) ? get_session('reg_form_values')['name'] : ''; ?>" />
							</div>
							<div class="col col-md-6 position-relative">
								<span class = "for_error mt-2 position-absolute d-<?=(get_session('errors') != null && in_array('surname',get_session('errors'))) ? 'block' : 'none'; ?>">required field*</span>
								<input type="text" class="form-control <?=(get_session('errors') != null && in_array('surname', get_session('errors'))) ? 'border-danger' : ''; ?>" placeholder="Surname" name = "surname" value = "<?=(get_session('reg_form_values') != null) ? get_session('reg_form_values')['surname'] : ''; ?>">
							</div>
						</div>
						<div class="form-group mt-4 position-relative">
							<span class = "for_error mt-2 position-absolute d-<?=(get_session('errors') != null && in_array('email',get_session('errors'))) ? 'block' : 'none'; ?>">required field*</span><span class = "for_error mt-2 position-absolute d-<?=(get_session('errors') != null && in_array('name',get_session('errors'))) ? 'block' : 'none'; ?>">required field*</span>
							<span class = "for_error mt-2 position-absolute d-<?=(get_session('errors') == null && get_session('reg_email') != null) ? 'block' : 'none'?>"> Email is already exists! * </span>
							<input type="email" name = "email" class="form-control <?=(get_session('errors') != null && in_array('email', get_session('errors'))) ? 'border-danger' : ''; ?>" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Email" value = "<?=(get_session('reg_form_values') != null) ? get_session('reg_form_values')['email'] : ''; ?>">
						</div>
						<div class = "row mt-4">
							<div class="form-group col-md-6 position-relative">
								<span class = "for_error mt-2 position-absolute d-<?=(get_session('errors') != null && in_array('password', get_session('errors'))) ? 'block' : 'none'?>"> required field* </span>
								<span class = "for_error mt-2 position-absolute d-<?=(get_session('errors') == null && get_session('reg_pass_length') != null) ? 'block' : 'none'; ?>">Minimum password length is 6. *</span>
								<input type="password" name = "password" class="form-control <?=(get_session('errors') != null && in_array('password', get_session('errors'))) ? 'border-danger' : ''; ?>" id="exampleInputPassword1" placeholder="Password" value = "<?=(get_session('reg_form_values') != null) ? get_session('reg_form_values')['password'] : ''; ?>">
							</div>
						</div>
						<div class = "row mt-4">
							<div class="form-group col-md-6 position-relative">
								<span class = "for_error mt-2 position-absolute d-<?=(get_session('errors') != null && in_array('age',get_session('errors'))) ? 'block' : 'none'; ?>">required field*</span>
								<input type="number" name = "age" class="form-control <?=(get_session('errors') != null && in_array('age', get_session('errors'))) ? 'border-danger' : ''; ?>" placeholder="Age" value = "<?=(get_session('reg_form_values') != null) ? get_session('reg_form_values')['age'] : ''; ?>">
							</div>
						</div>
						<div class="form-check form-check-inline">
							<input class="form-check-input" type="radio" name="gender" id="inlineRadio1" value="male">
							<label class="form-check-label" for="inlineRadio1">Male</label>
						</div>
						<div class="form-check form-check-inline mt-3">
							<input class="form-check-input" type="radio" name="gender" id="inlineRadio2" value="female" checked>
							<label class="form-check-label" for="inlineRadio2">FeMale</label>
						</div>
						<div class = "form-group mt-4">
							<button type="submit" value = "reg_submit" class="btn btn-success btn-lg d-block w-100">Registration</button>
						</div>
						<div class = "form-group mt-4">
							<?=(get_session('reg_success') != null) ? '<div class = "alert alert-success" role = "alert"> '.get_session('reg_success').'</div>' : ''?>
						</div>
							
					</form>
				</div>
				<div class = "col-lg-5 col-md-6 col-sm-12   rounded  mt-5 ms-3">
					<div class = "col-lg-12 col-md-12 col-sm-12">
						<h2 class="display-5 text-center pt-3" style="color: blanchedalmond;"> Login </h2>
					</div>
					<form action = "<?=URLROOT;?>users/login" method = "post">
						<div class="form-group mt-5">
							<span class = "for_error mt-2 position-absolute d-<?=(get_session('wrong_login') == null && get_session('wrong_login') != null) ? 'block' : 'none'?>"> Email is invalid! * </span>
							<input type="email" name = "email" class="form-control" id="exampleInputEmail2" aria-describedby="emailHelp" placeholder="User's Email">
						</div>
						<div class="form-group mt-3">
							<span class = "for_error mt-2 position-absolute d-<?=(get_session('errors') != null && in_array('password', get_session('empty_fields'))) ? 'block' : 'none'?>"> required field* </span>
							<span class = "for_error mt-2 position-absolute d-<?=(get_session('wrong_login') == null && get_session('wrong_login') != null) ? 'block' : 'none'; ?>">Password is invalid. *</span>
							<input type="password" name = "password" class="form-control" id="exampleInputEmail3" aria-describedby="emailHelp" placeholder="Password">
						</div>
						<div class="form-check mt-3">
							<input class="form-check-input" name = "remember" type="checkbox" value="login_remember" id="flexCheckDefault">
							<label class="form-check-label" for="flexCheckDefault">
								Remember me?
							</label>
						</div>
						<div class = "form-group mt-4">
							<button type="submit"  class="btn btn-primary btn-lg d-block w-100">Login</button>
						</div>
						<div class = "form-group mt-4">
							<?=(get_session('log_success') != null) ? '<div class = "alert alert-success" role = "alert"> '.get_session('log_success').'</div>' : ''?>
						</div>
					</form>		
				</div>			
			</div>
		</div>
	</div>
		