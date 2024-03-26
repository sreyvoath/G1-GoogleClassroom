<?php
session_start();
if (isset($_SESSION['user'])) {
	header('Location:/home');
	die();
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
	<title>Classroom</title>

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

	<main >
		<section class="p-0 d-flex align-items-center position-relative overflow-hidden">

			<div class="container-fluid">
				<div class="row">
					<!-- Right -->
					<div class="col-12 col-lg-8 m-auto ">
						<div class="row my-3">
							<div class="mt-3 col-sm-12 col-xl-8 m-auto border shadow-lg p-3 mb-5 rounded bordered" style="background-color: white;">
								
									<!-- Title -->
									<p class="fs-2 text-center" style="font-family:'Lucida Sans', 'Lucida Sans Regular', 'Lucida Grande', 'Lucida Sans Unicode', Geneva, Verdana, sans-serif">Login into Classroom!</p>
									<p class="lead mb-4">Nice to see you! Please log in with your account.</p>

									<!-- Form START -->
									<form action="controllers/signin/signin_process.controller.php" method="post">
										<!-- Email -->
										<div class="mb-4">
											<label for="exampleInputEmail1 " class="form-label">Email address *</label>
											<div class="input-group input-group-lg">
												<span class="input-group-text bg-light rounded-start border-0 text-secondary px-3"><i class="bi bi-envelope-fill"></i></span>
												<input type="email" class="form-control border-0 bg-light rounded-end ps-1" placeholder="E-mail" id="exampleInputEmail1" name="email">
											</div>
											<span class="text-danger"><?= isset($_SESSION['email-error']) ? $_SESSION['email-error'] : "" ?></span>
										</div>
										<!-- Password -->
										<div class="mb-4">
											<label for="inputPassword5" class="form-label">Password *</label>
											<div class="input-group input-group-lg">
												<span class="input-group-text bg-light rounded-start border-0 text-secondary px-3"><i class="fas fa-lock"></i></span>
												<input type="password" class="form-control border-0 bg-light rounded-end ps-1" placeholder="password" id="inputPassword5" name="password">
												<span class="input-group-text bg-light password border-0 text-secondary px-3"><i class="bi bi-eye-slash fs-5" id="eyeIcon"></i></span>

											</div>
											<span class="text-danger"><?= isset($_SESSION['password-error']) ? $_SESSION['password-error'] : "" ?></span>
											
										</div>
										<!-- Check box -->
										<div class="mb-4 d-flex justify-content-between mb-4">
											<div class="form-check">
												<input type="checkbox" class="form-check-input" id="exampleCheck1">
												<label class="form-check-label" for="exampleCheck1">Remember me</label>
											</div>
											<div class="text-primary-hover">
												<a href="views/signin/reset_password.view.php">
													<u>Forgot password?</u>
												</a>
											</div>
										</div>
										<!-- Button -->
										<div class="align-items-center mt-0">
											<div class="d-grid">
												<button type="submit" class="btn btn-danger mb-0" type="button">Login</button>
											</div>
										</div>
									</form>

									<!-- Sign up link -->
									<div class="mt-4 text-center">
										<span>Don't have an account? <a href="/user-signup">Signup here</a></span>
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


</body>

</html>