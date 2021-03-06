<!DOCTYPE html>
<html lang="en">
<head>
	<title>Make plan form</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
<!--===============================================================================================-->
	<link rel="icon" type="image/png" href="Operations/images/icons/favicon.ico"/>
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="Operations/vendor/bootstrap/css/bootstrap.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="Operations/fonts/font-awesome-4.7.0/css/font-awesome.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="Operations/vendor/animate/animate.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="Operations/vendor/css-hamburgers/hamburgers.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="Operations/vendor/select2/select2.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="Operations/css/util.css">
	<link rel="stylesheet" type="text/css" href="Operations/css/main.css">
<!--===============================================================================================-->

</head>
<body>

	<div class="bg-contact3" style="background-image: url('Operations/images/bg-01.jpg');">
		<div class="container-contact3">
			<div class="wrap-contact3">
				<form class="contact3-form validate-form" action="update.php" method="POST">
					<span class="contact3-form-title">
						Make a treatment plan
					</span>

					<div class="wrap-input3 validate-input" data-validate="Name is required">
						<input class="input3" type="text" pattern="^[0-9]+$" name="id" placeholder="Patient id" oninput="isValid(this)">
						<span class="focus-input3"></span>
					</div>

					<div class="wrap-input3 validate-input" data-validate = "Treatment is required">
						<input class="input3" type="text" pattern="^[a-zA-Z]+$" name="treatment" placeholder="Treatment name" oninput="isValid(this)">
						<span class="focus-input3"></span>
					</div>

					<div class="wrap-input3 validate-input" data-validate="Medicine Name is required">
						<input class="input3" type="text" pattern="^[a-zA-Z]+$" name="med" placeholder="Medicine to be used" oninput="isValid(this)">
						<span class="focus-input3"></span>
					</div>

					<div class="wrap-input3 validate-input" data-validate="Dose is required">
						<input class="input3" type="text" pattern="^[a-zA-Z0-9]+$" name="dose" placeholder="Dose to be used" oninput="isValid(this)">
						<span class="focus-input3"></span>
					</div>

					<script language="javascript" type="text/javascript">
							function isValid(input){
							 	if(input.value.match(/[~`!#$%\^&*+=\-\[\]\\';,/{}|\\":<>\?]/)){
									alert("No special characters allowed!");
								 }
					   		}
					</script>

					<div class="container-contact3-form-btn">
						<button class="contact3-form-btn">
							Submit
						</button>
					</div>
				</form>
			</div>
		</div>
	</div>


	<div id="dropDownSelect1"></div>

<!--===============================================================================================-->
	<script src="Operations/vendor/jquery/jquery-3.2.1.min.js"></script>
<!--===============================================================================================-->
	<script src="Operations/vendor/bootstrap/js/popper.js"></script>
	<script src="Operations/vendor/bootstrap/js/bootstrap.min.js"></script>
<!--===============================================================================================-->
	<script src="Operations/vendor/select2/select2.min.js"></script>
	<script>
		$(".selection-2").select2({
			minimumResultsForSearch: 20,
			dropdownParent: $('#dropDownSelect1')
		});
	</script>
<!--===============================================================================================-->
	<script src="Operations/js/main.js"></script>

	<!-- Global site tag (gtag.js) - Google Analytics -->
<script async src="https://www.googletagmanager.com/gtag/js?id=UA-23581568-13"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'UA-23581568-13');
</script>

</body>
</html>
