
<?php
 session_start();
if( isset($_SESSION['error'])){
	$error = $_SESSION['error'];
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
	<title>Eduport - LMS, Education and Course Theme</title>

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
	<main>
		<section class="p-0 d-flex align-items-center position-relative overflow-hidden">

			<div class="container-fluid">
				<div class="row">
					<!-- Right -->
					<div class="col-12 col-lg-6 m-auto ">
						<div class="row my-3">
							<div class="col-sm-10 col-xl-8 m-auto border shadow-lg p-3 mb-5 bg-body rounded bordered">
								<!-- Title -->
								<span class="mb-0 fs-1">👋</span>
								<h1 class="fs-2">Register here!</h1>
								<p class="lead mb-4">Nice to see you! Please create with new account.</p>

								<!-- Form START -->
								<form action="../../controllers/signup/signup_process.controller.php" method="post">
									<!-- Name -->
									<div class="mb-4">
										<label for="exampleInputEmail1" class="form-label">User Name*</label>
										<div class="input-group input-group-lg">
											<span class="input-group-text bg-light rounded-start border-0 text-secondary px-3"><i class="bi bi-envelope-fill"></i></span>
											<input type="text" class="form-control border-0 bg-light rounded-end ps-1" placeholder="U-name" id="exampleInputEmail1" name="name">
										</div>
										<span class="text-danger"><?=isset($_SESSION['error'])? $error['name'] : ""?></span>
									</div>
									<!-- Email -->
									<div class="mb-4">
										<label for="exampleInputEmail1" class="form-label">Email address *</label>
										<div class="input-group input-group-lg">
											<span class="input-group-text bg-light rounded-start border-0 text-secondary px-3"><i class="bi bi-envelope-fill"></i></span>
											<input type="email" class="form-control border-0 bg-light rounded-end ps-1" placeholder="E-mail" id="exampleInputEmail1" name="email">
										</div>
										<span class="text-danger"><?=isset($_SESSION['error'])? $error['name'] : ""?></span>
										<span class="text-danger"><?=isset($_SESSION['exist'])? $_SESSION['exist'] : ""?></span>
									</div>
									<!-- Password -->
									<div class="mb-4">
										<label for="inputPassword5" class="form-label">Password *</label>
										<div class="input-group input-group-lg">
											<span class="input-group-text bg-light rounded-start border-0 text-secondary px-3"><i class="fas fa-lock"></i></span>
											<input type="password" class="form-control border-0 bg-light rounded-end ps-1" placeholder="password" id="inputPassword5" name="password">
										</div>
										<span class="text-danger"><?=isset($_SESSION['error'])? $error['name'] : ""?></span>
										<span class="text-danger"><?=isset($_SESSION['error'])? $error['password'] : ""?></span>
										<div id="passwordHelpBlock" class="form-text">
											Your password must be 8 characters at least
										</div>
									</div>
									<!-- Button -->
									<div class="align-items-center mt-0">
										<div class="d-grid d-flex justify-content-between">
											<a href="/" class="btn border-secondary btn-outline-danger mb-0" type="button">Cancel</a>
											<button type="submit" class="btn btn-primary mb-0" type="button">Register</button>
										</div>
									</div>
								</form>

							</div>
						</div> <!-- Row END -->
					</div>
				</div> <!-- Row END -->
			</div>
		</section>
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