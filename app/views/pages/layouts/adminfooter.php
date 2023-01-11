			
							<!-- Delete Modal -->
			<div class="modal fade" id="delete_modal" tabindex="-1" aria-labelledby="delete_modal" aria-hidden="true">
			  <div class="modal-dialog">
				<div class="modal-content">
				  <div class="modal-header">
					<h5 class="modal-title" id="exampleModalLabel">DELETE FILM</h5>
					<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">X</button>
				  </div>
				  <div class="modal-body">
					<p>Do you really want to delete these records? This process cannot be undone.</p>
				  </div>
				  <div class="modal-footer">
					<button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
					<button type="button" class="btn btn-danger del_button">Delete</button>
				  </div>
				</div>
			  </div>
			</div>
				<!-- Edit Modal -->
			<div class="modal fade  <?=(get_session('filmedit_form_values') != null) ? 'show' : ''; ?>" id="edit_modal"  tabindex="-1"<?=(get_session('filmedit_form_values') != null) ? "style = 'display:block;' " : ""?>  aria-hidden="true">
			  <div class="modal-dialog">
				<div class="modal-content">
				  <div class="modal-header">
					<h5 class="modal-title" id="exampleModalLabel">Edit FILM</h5>
					<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
				  </div>
				  <div class="modal-body">
						<form action = "<?=URLROOT;?>admin/edit" method = "post"  class = "about_image_form" enctype="multipart/form-data" >
						<div class = "col-lg-8">
							<div class = "row mt-3">
											<div class = "film_name_div position-relative">
												<input type="hidden" class="form-control film_id" value = "<?=$value['film_id'] ?>" name = "film_id" id="film_id"   placeholder = "Filmid"/>
											</div>
											<div class = "film_name_div position-relative">
												<span class = "for_error mt-2 position-absolute d-<?=(get_session('errors_edit') != null && in_array('name',get_session('errors_edit'))) ? 'block' : 'none'; ?>">required field*</span>
												<label  class="form-label fw-bold" for = "film_name">Film name</label>
												<input type="text" class="form-control name " name = "name" id="film_name" value = "<?=(get_session('film_form_values') != null) ? get_session('film_form_values')['name'] : ''; ?>" placeholder = "Film name"/>
											</div>
											<div class = "country_div position-relative">
												<span class = "for_error mt-2 position-absolute d-<?=(get_session('errors_edit') != null && in_array('country',get_session('errors_edit'))) ? 'block' : 'none'; ?>">required field*</span>
												<label  class="form-label fw-bold" for = "country">Country</label>
												<input type="text" class="form-control country " name = "country" id="country" value = "<?=(get_session('film_form_values') != null) ? get_session('film_form_values')['country'] : ''; ?>" placeholder = "Country"/>
											</div>
											<div class = "genre_div position-relative">
												<span class = "for_error mt-2 position-absolute d-<?=(get_session('errors_edit') != null && in_array('genre',get_session('errors_edit'))) ? 'block' : 'none'; ?>">required field*</span>
												<label  class="form-label fw-bold" for = "genre">Genre</label>
												<input type="text" class="form-control genre " name = "genre" id="genre" value = "<?=(get_session('film_form_values') != null) ? get_session('film_form_values')['genre'] : ''; ?>" placeholder = "Genre"/>
											</div>
											<div class = "duration_div position-relative">
												<span class = "for_error mt-2 position-absolute d-<?=(get_session('errors_edit') != null && in_array('duration',get_session('errors_edit'))) ? 'block' : 'none'; ?>">required field*</span>
												<label  class="form-label fw-bold" for = "duration">Duration (minute)</label>
												<input type="number" class="form-control duration " name = "duration" id="duration" value = "<?=(get_session('film_form_values') != null) ? get_session('film_form_values')['duration'] : ''; ?>" placeholder = "Duration"/>
											</div>
											<div class = "director_div position-relative">
												<span class = "for_error mt-2 position-absolute d-<?=(get_session('errors_edit') != null && in_array('director',get_session('errors_edit'))) ? 'block' : 'none'; ?>">required field*</span>
												<label  class="form-label fw-bold" for = "director">Director</label>
												<input type="text" class="form-control director " name = "director" id="director" value = "<?=(get_session('film_form_values') != null) ? get_session('film_form_values')['director'] : ''; ?>" placeholder = "Director"/>
											</div>
                                            <div class = "date_div position-relative">
												<span class = "for_error mt-2 position-absolute d-<?=(get_session('errors_edit') != null && in_array('date',get_session('errors_edit'))) ? 'block' : 'none'; ?>">required field*</span>
												<label  class="form-label fw-bold" for = "date">Date</label>
												<input type="date" class="form-control date" name = "date" id="date" value = "<?=(get_session('film_form_values') != null) ? get_session('film_form_values')['date'] : ''; ?>" placeholder = "Date"/>
											</div>
											</div>
											<div class = "actors_div position-relative">
												<span class = "for_error mt-2 position-absolute d-<?=(get_session('errors_edit') != null && in_array('actors',get_session('errors_edit'))) ? 'block' : 'none'; ?>">required field*</span>
												<label  class="form-label fw-bold" for = "actors">Actors</label>
												<input type="text" class="form-control actors" name = "actors" id="actors" value = "<?=(get_session('film_form_values') != null) ? get_session('film_form_values')['actors'] : ''; ?>" placeholder = "Actors"/>
											</div>
											</div>
												<div class = "filmdesc_div position-relative">
												<span class = "for_error mt-2 position-absolute d-<?=(get_session('errors_edit') != null && in_array('film_desc',get_session('errors_edit'))) ? 'block' : 'none'; ?>">required field*</span>
												<label  class="form-label fw-bold" for = "filmdesc">Film description</label>
												<input type="textarea" class="form-control film_desc " name = "film_desc" id="filmdesc" value = "<?=(get_session('film_form_values') != null) ? get_session('film_form_values')['film_desc'] : ''; ?>" placeholder = "Film description"/>
											</div>
										<div class = "col-lg-12">
							
											 <div class="col-lg-6 col-md-4 col-sm-12">
												<div style = "width:220px;">
														<img class = "image w-25" src = "">
												</div>
												<div class="mt-2 position-relative">
													<span class = "for_error mt-2 position-absolute d-<?=(get_session('error_format') != null) ? 'block' : 'none'; ?>">wrong format*</span>
													<input type="file"  name = "image" class="form-control w-50 image" id="film_image" aria-describedby="inputGroupFileAddon04" aria-label="Upload">
												</div>
											</div>	
											 <div class="col-lg-6 col-md-4 col-sm-12">
												<div style = "width:220px;">
													<div style = "width:220px;">
														<img class = "video w-25" src = "">
													</div>
												</div>
												<div class="mt-2 position-relative">
													<input type="file"  name = "video" class="form-control w-50 video" id="film_video" aria-describedby="inputGroupFileAddon04" aria-label="Upload">
												</div>
											</div>	
										</div>
								
								<div class="modal-footer">
									<button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
									<button type="submit" class="btn btn-success edit_button">Edit</button>
								</div>
						</form>
				  </div>
				</div>
			</div>
		</div>
			 
			






		<!-- jQuery -->
		<script src = "<?=URLROOT?>public/js/jquery.js"></script>
		<script src= "<?=URLROOT?>public/js/jquery-ui.min.js"></script>
		<script src = "<?=URLROOT?>public/js/bootstrap.min.js"></script>
		<script src = "<?=URLROOT?>public/js/main.js"></script>
		
		<!-- ChartJS -->
		<script src="<?=URLROOT?>public/plugins/chart.js/Chart.min.js"></script>
		<!-- Sparkline -->
		<script src="<?=URLROOT?>public/plugins/sparklines/sparkline.js"></script>
		<!-- JQVMap -->
		<script src="<?=URLROOT?>public/plugins/jqvmap/jquery.vmap.min.js"></script>
		<script src="<?=URLROOT?>public/plugins/jqvmap/maps/jquery.vmap.usa.js"></script>
		<!-- jQuery Knob Chart -->
		<script src="<?=URLROOT?>public/plugins/jquery-knob/jquery.knob.min.js"></script>
		<!-- daterangepicker -->
		<script src="<?=URLROOT?>public/plugins/moment/moment.min.js"></script>
		<script src="<?=URLROOT?>public/plugins/daterangepicker/daterangepicker.js"></script>
		<!-- Tempusdominus Bootstrap 4 -->
		<script src="<?=URLROOT?>public/plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js"></script>
		<!-- Summernote -->
		<script src="<?=URLROOT?>public/plugins/summernote/summernote-bs4.min.js"></script>
		<!-- overlayScrollbars -->
		<script src="<?=URLROOT?>public/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
		<!-- AdminLTE App -->
		<script src="<?=URLROOT?>public/dist/js/adminlte.js"></script>
		<!-- AdminLTE for demo purposes -->
		<script src="<?=URLROOT?>public/dist/js/demo.js"></script>
		<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
		<script src="<?=URLROOT?>public/dist/js/pages/dashboard.js"></script>
		<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
		<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js">
		<?php
			$errors = new ErrorController;
			$errors -> clean_errors();
		?>
	</body>
</html>