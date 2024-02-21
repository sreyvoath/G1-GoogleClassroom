<main>
	<!-- =======================
Counter END -->
	<!-- =======================
Popular course START -->
	<section>
		<div class="container">
			<!-- Title -->
			<div class="row mb-4">
				<div class="col-lg-8 mx-auto text-center">
					<h2 class="fs-1">Archive Classroom</h2>
				</div>
			</div>

			<!-- Tabs START -->
			<ul class="nav nav-pills nav-pills-bg-soft justify-content-sm-center mb-4 px-3" id="course-pills-tab" role="tablist">
				<!-- Tab item -->
				<li class="nav-item me-2 me-sm-5">
					<button class="nav-link mb-2 mb-md-0 active" id="course-pills-tab-1" data-bs-toggle="pill" data-bs-target="#course-pills-tabs-1" type="button" role="tab" aria-controls="course-pills-tabs-1" aria-selected="false">Information Technology</button>
				</li>
				<li class="nav-item me-2 me-sm-5">
					<button class="nav-link mb-2 mb-md-0" id="course-pills-tab-4" data-bs-toggle="pill" data-bs-target="#course-pills-tabs-4" type="button" role="tab" aria-controls="course-pills-tabs-4" aria-selected="false">Professional Life</button>
				</li>
				<!-- Tab item -->
				<li class="nav-item me-2 me-sm-5">
					<button class="nav-link mb-2 mb-md-0" id="course-pills-tab-5" data-bs-toggle="pill" data-bs-target="#course-pills-tabs-5" type="button" role="tab" aria-controls="course-pills-tabs-5" aria-selected="false">English</button>
				</li>
			</ul>
			<!-- Tabs END -->

			<!-- Tabs content START -->
			<div class="tab-content" id="course-pills-tabContent">
				<!-- Content START -->
				<div class="tab-pane fade show active" id="course-pills-tabs-1" role="tabpanel" aria-labelledby="course-pills-tab-1">
					<div class="row g-4">
						<!-- Card item START -->
						<?php
						foreach ($classes as $class) {
							if ($class['archive'] == 0) { ?>

								<div class="col-sm-6 col-lg-4 col-xl-3">
									<div class="card shadow h-100">
										<!-- Image -->
										<img src="assets/images/courses/4by3/08.jpg" class="card-img-top" alt="course image">
										<!-- <li class="dropdown-submenu dropend">
										</li> -->
										<!-- Card body -->
										<div class="nav-item dropdown d-flex justify-content-end">
											<a class="nav-link " href="#" id="pagesMenu" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false"></a>
											<ul class="dropdown-menu" aria-labelledby="accounntMenu">
												<li class="dropdown-submenu dropend">
													<a class="dropdown-item " href="">Create</a>
												</li>
												<li class="dropdown-submenu dropend">
													<a class="dropdown-item " href="#">Delete</a>
												</li>
												<li class="dropdown-submenu dropend">
													<a class="dropdown-item " href="#">Edit</a>
												</li>

											</ul>

										</div>
										<div class="card-body pb-0">
											<!-- Title -->
											<h5 class="card-title fw-normal"><a class="text-decoration-none" href="#"><?= $class['title']; ?></a></h5>
											<p class="mb-2 text-truncate-2"><?= $class['section']; ?></p>
										</div>
										<!-- Card footer -->
										<div class="card-footer pt-3 pb-3">
											<div class="d-flex">
												<a href="../../controllers/classes/archive.delete.controller.php?id=<?= $class['id'] ?>" class="btn mx-1 h6 fw-light mb-0 btn-outline-danger"><i class="fas fa-trash text-danegr "></i></a>
												<a href="../../controllers/classes/restore.controller.php?id=<?= $class['id'] ?>" class="btn mx-1 h6 fw-light mb-0 btn-outline-secondary"><i class="bi bi-bootstrap-reboot"></i></a>
											</div>
										</div>
									</div>
								</div>
						<?php }
						} ?>
						<!-- Card item END -->
					</div>
				</div>
				<!-- Content END -->
				<!-- Tabs content END -->
			</div>
	</section>
	<!-- =======================
Popular course END -->

</main>