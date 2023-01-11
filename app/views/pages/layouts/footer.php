






		
		
		<script src = "<?=URLROOT?>public/js/jquery.js"></script>
		<script src= "<?=URLROOT?>public/js/jquery-ui.min.js"></script>
		<script src = "<?=URLROOT?>public/js/bootstrap.min.js"></script>
		<script src = "<?=URLROOT?>public/js/slick.js"></script>
		<script src = "<?=URLROOT?>public/js/slick.min.js"></script>
		<script src = "<?=URLROOT?>public/js/main.js"></script>
		
		<?php
			$errors = new ErrorController;
			$errors -> clean_errors();
		?>
	</body>
</html>