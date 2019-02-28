<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
	<title>Project Details</title>

	<!-- Bootstrap -->
	<link href="<?php echo base_url();?>assets/css/bootstrap.min.css" rel="stylesheet">


	<!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
	<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
	<!--[if lt IE 9]>
<!--	<script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>-->
	<!--	<script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>-->

</head>
<body>
<div class="col-lg-8 col-lg-offset-2">
	<h1>PROJECT DETAILS: </h1>
	<p>Please fill in the following details: </p>

	<?php if(isset($_SESSION['success'])) { ?>

		<div class="alert alert-danger"> <?php echo $_SESSION['success']; ?></div>
		<?php
	}
	?>
	<?php echo validation_errors('<div class="alert alert-danger">','</div>');?>

	<form action=" " method="post">

		<div class="form-group">
			<label for="Project_title" >Project Title: </label>
			<input class="form-control" required name="Project_title" id="Project_title" type="text">
		</div>
		<div class="form-group">
			<label for="Name_of_school" >Name of school: </label>
			<input class="form-control" required name="Name_of_school" id="Name_of_school" type="text">
		</div>
		<div class="form-group">
			<label for="Student_name" >Student Names: </label>
			<input class="form-control" required name="Student_name" id="Student_name" type="text">
		</div>
			<div class="form-group">
				<label for="Introduction" >Introduction: </label>
				<textarea required name="Introduction" rows="40" cols="160" placeholder="Write your Introduction here"></textarea>
			</div>
			<div class="form-group">
				<label for="Method" >Method: </label>
				<textarea required name="Method" rows="100" cols="160" placeholder="Write your method here"></textarea>
			</div>
		<div class="form-group">
			<label for="Results" >Results: </label>
			<textarea required name="Results" rows="100" cols="160" placeholder="Write your results here"></textarea>
		</div>
		<div class="form-group">
			<label for="Conclusion" >Conclusion: </label>
			<textarea required name="Conclusion" rows="40" cols="160" placeholder="Write your conclusion here"></textarea>
		</div>
		<div class="form-group">
			<label for="Referees" >References: </label>
			<textarea required name="Referees" rows="40" cols="160" placeholder="Write your references here"></textarea>
		</div>
		<div class="form-group">
			<label for="Acknowledge" >Acknowledgments: </label>
			<textarea required name="Acknowledge" rows="40" cols="160" placeholder="Write your acknowledgments here"></textarea>
		</div>
			<div class="text-center">
				<button class="btn btn-primary" name="project_details">Save</button>
			</div>
		</div>

	</form>

<!--	<script>-->
<!---->
<!--		function checkPassword(){-->
<!---->
<!--			if (document.getElementById('password').value !== document.getElementById('cPassword').value){-->
<!--				alert("Passwords do not match!");-->
<!--				document.getElementById('password').value = "";-->
<!--				document.getElementById('cPassword').value = "";-->
<!---->
<!--				return false;-->
<!---->
<!--			}-->
<!--		}-->
<!---->
<!--		function CheckPasswordStrength(password) {-->
<!--			var password_strength = document.getElementById("password_strength");-->
<!---->
<!---->
<!--			if (password.length == 0) {-->
<!--				password_strength.innerHTML = "";-->
<!--				return;-->
<!--			}-->
<!---->
<!---->
<!--			var regex = new Array();-->
<!--			regex.push("[A-Z]");-->
<!--			regex.push("[a-z]");-->
<!--			regex.push("[0-9]");-->
<!--			regex.push("[$@$!%*#?&]");-->
<!---->
<!--			var passed = 0;-->
<!---->
<!---->
<!--			for (var i = 0; i < regex.length; i++) {-->
<!--				if (new RegExp(regex[i]).test(password)) {-->
<!--					passed++;-->
<!--				}-->
<!--			}-->
<!---->
<!---->
<!--			if (passed > 2 && password.length > 8) {-->
<!--				passed++;-->
<!--			}-->
<!---->
<!---->
<!--			var color = "";-->
<!--			var strength = "";-->
<!--			switch (passed) {-->
<!--				case 0:-->
<!--				case 1:-->
<!--					strength = "Weak";-->
<!--					color = "orange";-->
<!--					break;-->
<!--				case 2:-->
<!--					strength = "Good";-->
<!--					color = "darkorange";-->
<!--					break;-->
<!--				case 3:-->
<!--				case 4:-->
<!--					strength = "Strong";-->
<!--					color = "yellow";-->
<!--					break;-->
<!--				case 5:-->
<!--					strength = "Very Strong";-->
<!--					color = "red";-->
<!--					break;-->
<!--			}-->
<!--			password_strength.innerHTML = strength;-->
<!--			password_strength.style.color = color;-->
<!--		}-->
<!--	</script>-->

<!--<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
<!--<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>-->
<!--<!-- Include all compiled plugins (below), or include individual files as needed -->
<!--<script src="--><?php //echo base_url();?><!--assets/js/bootstrap.min.js"></script>-->
</body>
</html>
