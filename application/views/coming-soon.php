<!DOCTYPE html>
<html lang="en">
<head>
	<title>Coming Soon 4</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
<!--===============================================================================================-->	
	<link rel="icon" type="image/png" href="images/icons/favicon.ico"/>
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/coming-soon/vendor/bootstrap/css/bootstrap.min.css'); ?>">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="fonts/font-awesome-4.7.0/css/font-awesome.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="fonts/iconic/css/material-design-iconic-font.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/coming-soon/vendor/animate/animate.css'); ?>">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/coming-soon/vendor/select2/select2.min.css'); ?>">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/coming-soon/css/util.css'); ?>">
	<link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/coming-soon/css/main.css'); ?>">
<!--===============================================================================================-->
</head>
<body>
	
	
	<div class="bg-g1 size1 flex-w flex-col-c-sb p-l-15 p-r-15 p-t-55 p-b-35 respon1">
		<span></span>
		<div class="flex-col-c p-t-50 p-b-50">
			<h3 class="l1-txt1 txt-center p-b-10">
				Coming Soon
			</h3>

			<p class="txt-center l1-txt2 p-b-60">
				Our website is under construction
			</p>

			<button class="flex-c-m s1-txt2 size3 how-btn"  data-toggle="modal" data-target="#subscribe">
				Follow us for update now!
			</button>
		</div>

		<span class="s1-txt3 txt-center">
			@ 2020 Coming Soon. Designed by LMS
		</span>
		
	</div>
	

<!--===============================================================================================-->	
	<script src="<?php echo base_url('assets/coming-soon/vendor/jquery/jquery-3.2.1.min.js'); ?>"></script>
<!--===============================================================================================-->
	<script src="<?php echo base_url('assets/coming-soon/vendor/bootstrap/js/popper.js'); ?>"></script>
	<script src="<?php echo base_url('assets/coming-soon/vendor/bootstrap/js/bootstrap.min.js'); ?>"></script>
<!--===============================================================================================-->
	<script src="<?php echo base_url('assets/coming-soon/vendor/select2/select2.min.js'); ?>"></script>
<!--===============================================================================================-->
	<script src="<?php echo base_url('assets/coming-soon/vendor/countdowntime/moment.min.js'); ?>"></script>
	<script src="<?php echo base_url('assets/coming-soon/vendor/countdowntime/moment-timezone.min.js'); ?>"></script>
	<script src="<?php echo base_url('assets/coming-soon/vendor/countdowntime/moment-timezone-with-data.min.js'); ?>"></script>
	<script src="<?php echo base_url('assets/coming-soon/vendor/countdowntime/countdowntime.js'); ?>"></script>
	<script>
		$('.cd100').countdown100({
			// Set Endtime here
			// Endtime must be > current time
			endtimeYear: 0,
			endtimeMonth: 0,
			endtimeDate: 35,
			endtimeHours: 18,
			endtimeMinutes: 0,
			endtimeSeconds: 0,
			timeZone: "" 
			// ex:  timeZone: "America/New_York", can be empty
			// go to " http://momentjs.com/timezone/ " to get timezone
		});
	</script>
<!--===============================================================================================-->
	<script src="<?php echo base_url('assets/coming-soon/vendor/tilt/tilt.jquery.min.js'); ?>"></script>
	<script >
		$('.js-tilt').tilt({
			scale: 1.1
		})
	</script>
<!--===============================================================================================-->
	<script src="<?php echo base_url('assets/coming-soon/js/main.js'); ?>"></script>

</body>
</html>