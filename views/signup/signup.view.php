<?php
session_start();
if (isset($_SESSION['error'])) {
	$error = $_SESSION['error'];
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
	<title>E-Classroom</title>

	<!-- Meta Tags -->
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<meta name="author" content="Webestica.com">
	<meta name="description" content="Eduport- LMS, Education and Course Theme">

	<!-- Favicon -->
	<link rel="shortcut icon" href="assets/images/favicon.ico">

	<!-- Google Font -->
	<link rel="preconnect" href="https://fonts.googleapis.com">
	<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
	<link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Heebo:wght@400;500;700&family=Roboto:wght@400;500;700&display=swap">

	<!-- Plugins CSS -->
	<link rel="stylesheet" type="text/css" href="vendor/font-awesome/css/all.min.css">
	<link rel="stylesheet" type="text/css" href="vendor/bootstrap-icons/bootstrap-icons.css">

	<!-- Theme CSS -->
	<link id="style-switch" rel="stylesheet" type="text/css" href="vendor/css/style.css">


</head>

<body>

	<!-- **************** MAIN CONTENT START **************** -->
	<main style="background-image: url('../../assets/images/bg/12.jpg'); background-size: cover; background-repeat: no-repeat;">
		<section class="p-0 d-flex align-items-center position-relative overflow-hidden">

			<div class="container-fluid">
				<div class="row">
					<!-- Right -->
					<div class="col-12 col-lg-6 m-auto ">
						<div class="row my-3">
							<div class="mt-3 col-sm-12 col-xl-12 m-auto border shadow-lg p-3 mb-5 rounded bordered" style="background-color: gray;">
								<div class="dark-blur-overlay p-3" style=" background-color: rgba(0, 0, 0, 0.5); backdrop-filter: blur(10px);">
									<!-- Title -->
									<p class="fs-2 text-center text-white" style="font-family:'Lucida Sans', 'Lucida Sans Regular', 'Lucida Grande', 'Lucida Sans Unicode', Geneva, Verdana, sans-serif">Create account here!</p>
									<!-- Form START -->
									<form action="../../controllers/signup/signup_process.controller.php" method="post" enctype="multipart/form-data">
										<!-- Name -->
										<div class="mb-4">
											<label for="exampleInputEmail1" class="form-label text-white">User Name*</label>
											<div class="input-group input-group-lg">
												<span class="input-group-text bg-light rounded-start border-0 text-secondary px-3"><i class="bi bi-person-check-fill"></i></span>
												<input type="text" class="form-control border-0 bg-light rounded-end ps-1" placeholder="U-name" id="exampleInputEmail1" name="name">
											</div>
											<span class="text-danger"><?= isset($_SESSION['name']) ? $_SESSION['name'] : "" ?></span>
										</div>
										<!-- Email -->
										<div class="mb-4">
											<label for="exampleInputEmail1" class="form-label text-white">Email address *</label>
											<div class="input-group input-group-lg">
												<span class="input-group-text bg-light rounded-start border-0 text-secondary px-3"><i class="bi bi-envelope-fill"></i></span>
												<input type="email" class="form-control border-0 bg-light rounded-end ps-1" placeholder="E-mail" id="exampleInputEmail1" name="email">
											</div>
											<span class="text-danger"><?= isset($_SESSION['name']) ? $_SESSION['name'] : "" ?></span>
											<span class="text-danger"><?= isset($_SESSION['exist']) ? $_SESSION['exist'] : "" ?></span>
										</div>
										<!-- Role -->
										<div class="mb-4">
											<label for="exampleInputEmail1" class="form-label text-white">Email address *</label>
											<div class="input-group input-group-lg">
												<span class="input-group-text bg-light rounded-start border-0 text-secondary px-3"><i class="bi bi-person-fill"></i></span>
												<select name="role" id="rile" class="form-control border-0 bg-light rounded-end ps-1">
													<option disabled selected>Select your role</option>
													<option value="teacher">Teacher</option>
													<option value="student">Student</option>
												</select>
											</div>
											<span class="text-danger"><?= isset($_SESSION['name']) ? $_SESSION['name'] : "" ?></span>
										</div>
										<!-- Password -->
										<div class="mb-4">
											<label for="inputPassword5" class="form-label text-white">Password *</label>
											<div class="input-group input-group-lg">
												<span class="input-group-text bg-light rounded-start border-0 text-secondary px-3"><i class="fas fa-lock"></i></span>
												<input type="password" class="form-control border-0 bg-light rounded-end ps-1" placeholder="password" id="inputPassword5" name="password">
												<span class="input-group-text bg-light password border-0 text-secondary px-3"><i class="bi bi-eye-slash fs-5" id="eyeIcon"></i></span>
											</div>
											<span class="text-danger"><?= isset($_SESSION['error']) ? $error['name'] : "" ?></span>
											<span class="text-danger"><?= isset($_SESSION['error']) ? $error['password'] : "" ?></span>
											<div id="passwordHelpBlock" class="form-text text-white">
												Your password must be 8 characters at least
											</div>
										</div>
										<!-- Upload Image-->
										<div class="mb-4">
											<label for="inputImage" class="form-label text-white">Profile Image *</label>
											<input type="file" name="image" id="inputImages" class="form-control">
											<span class="text-danger"><?= isset($_SESSION['name']) ? $_SESSION['name'] : "" ?></span>
										</div>

										<!-- Button -->
										<div class="align-items-center mt-0">
											<div class="d-grid d-flex justify-content-end gap-3">
												<a href="/" class="btn border-secondary btn-danger mb-0" type="button">Cancel</a>
												<button type="submit" class="btn btn-primary mb-0" type="button">Register</button>
											</div>
										</div>
									</form>

								</div>
							</div>
						</div> <!-- Row END -->
					</div>
				</div> <!-- Row END -->
			</div>
		</section>
		<script>
			const passwordInput = document.getElementById("inputPassword5");
			const eyeIcon = document.getElementById("eyeIcon");
			eyeIcon.onclick = function() {
				if (passwordInput.type == "password") {
					passwordInput.type = "text";
					eyeIcon.className = "bi bi-eye fs-5";
				} else {
					passwordInput.type = "password";
					eyeIcon.className = "bi bi-eye-slash fs-5";
				}
			};
		</script>
	</main>
	<!-- **************** MAIN CONTENT END **************** -->

	<!-- Back to top -->
	<div class="back-top"><i class="bi bi-arrow-up-short position-absolute top-50 start-50 translate-middle"></i></div>

	<!-- Bootstrap JS -->
	<script src="vendor/bootstrap/dist/js/bootstrap.bundle.min.js"></script>

	<!-- Template Functions -->
	<script src="vendor/js/functions.js"></script>
	<script src="vendor/js/search.js"></script>

</body>

</html>