
	//--------- Admin login  ------------//
	
	$('.admin_submit').click(function(){
		
		let admin_password = $(this).parent().prev().children().val();
		let admin_name = $(this).parent().prev().prev().children().val();
		$.ajax({
			url: 'http://framework1/admin/login',
			type: 'post',
			data: {'login':admin_name, 'password':admin_password},
			success:function(res){
				 if(res == 1){
					$('.notif').append('<div class = ""><p>You are log in as admin</p></div>')
					setTimeout(function(){
					  window.location.href = 'http://framework1/admin/home';
					}, 2000);
				}
					else {
						$('.notif').append('<div class = ""><p>Wrong</p></div>')
						
					}
			}
		})
	})
	
	//--------- Admin login from Enter keypress ------------//
	
	$(document).keypress(function(event){
		if(event.keyCode == 13){
			$('.admin_submit').click();
		}
	})
	
	
	//--------- FILM DELETE  ------------//
		
		$('.delete_butt').click(function(){
			window.item = this
			window.tr = $(this).closest("tr");
			window.deleteid = $(this).data('id');
		})
	
		$('.del_button').click(function(){
			
			$.ajax({
				url: 'http://framework1/admin/delete_film',
				type: 'post',
				data: {'id':deleteid},
				success:function(res){
					if(res == 1){
							$('.modal').fadeOut(1000,function(){
								$('.modal').remove();
								$('.modal-backdrop').remove();
									tr.fadeOut(2000, function(){
										tr.remove();
							})
						})
					}
				}
			})		
		})
		
		//--------- Film edit  ------------//
		$('.edit_butt').click(function(){
			window.editid = $(this).data('id');
			$.ajax({
				url: 'edit_film_butt',
				type: 'post',
				dataType: 'JSON',
				data: {'id':editid},
				success:function(res){
					
						Object.keys(res).forEach(function(key) {
							if(key == 'image'){
								$('.'+key+'').attr("src", '../public/images/films/'+res[key]);
							}else if(key=="video"){
								$('.'+key+'').attr("src", '../public/videos/films/'+res[key]);
							}else{
								$('.'+key+'').val(res[key]);
								
						}

					})
					
				}
			})
		})
		//--------- Search input  ------------//
	 	$(document).ready(function(){
			window.table = $('.output').html();
				$('#search_live').keyup(function(){
					window.input = $(this).val();
					
					//alert(input);
					
					if(input != ""){
						//$("#table_all").css("display","none");
						$.ajax({
							url: 'search',
							method: "POST",
							dataType: 'json',
							data: {name:input},
							success:function(res){
								$('.search_error').html('');
								if(res.status == 'found'){
									$('.output').html('');
									for(i=0;i<=res.data.length;i++){
										$('.output').append('<tr><td scope="col">'+res.data[i].film_id+'</td><td scope="col">'+res.data[i].name+'</td><td scope="col">'+res.data[i].country+'</td><td scope="col">'+res.data[i].name+'</td><td scope="col">'+res.data[i].country+'</td><td scope="col">'+res.data[i].genre+'</td><td scope="col">'+res.data[i].director+'</td><td scope="col">'+res.data[i].date+'</td><td scope="col">'+res.data[i].actors+'</td><td scope="col">'+res.data[i].film_desc+'</td><td scope="col"><img style = "width: 50px;" src = ../public/images/films/'+res.data[i].image+'></td><td scope="col"><button type="button" class="btn btn-primary edit_film" data-id = '+res.data[i].film_id+' data-toggle="modal" data-target="#edit_film">Edit</button><button type="button" class="btn btn-primary delete_film" data-id = '+res.data[i].film_id+' data-toggle="modal" data-target="#yes_no">delete</button></td></tr>');
									}
									
								}else{
									$('.output').html('');
									$('.search_error').append('<h2 class = "fw-bold" style="color:red;">NOT Found .</h2>');
								}
							}
						})
					}else{
						$('.search_error').html('');
						$('.output').html(table);
					}
				})
			}) 
			
		
		$('.slider').slick({
			slidesToShow: 5,
			slidesToScroll: 1,
			arrows: true,
			prevArrow:"<button type='button' class='slick-prev pull-left'><i class='fa fa-angle-left' aria-hidden='true'></i></button>",
			nextArrow:"<button type='button' class='slick-next pull-right'><i class='fa fa-angle-right' aria-hidden='true'></i></button>",
			autoplay: true, 
			speed: 300,
			autoplaySpeed: 2000,
		  });
				
		
		