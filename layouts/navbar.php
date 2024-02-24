<?php
$user = $_SESSION['user'];

if (isset($_SESSION['class'])) {
	$classes = $_SESSION['class'];
}

require 'database/database.php';
require 'models/category.model.php';
$categories = getCategories();
?>
<!-- Header START -->
<header class="navbar-light navbar-sticky header-static">
	<!-- Logo Nav START -->
	<nav class="navbar navbar-expand-xl">
		<div class="container-fluid px-3 px-xl-5 py-0">
			<!-- Logo START -->
			<a class="navbar-brand" href="/home">
				<h3>
					<img src="../assets/images/avatar/16.png" alt="" class="mb-2">
					<span class="fs-2 mx-2">Classroom</span>
				</h3>

			</a>
			<!-- Logo END -->

			<!-- Responsive navbar toggler -->
			<button class="navbar-toggler ms-auto" type="button" data-bs-toggle="collapse" data-bs-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
				<span class="navbar-toggler-animation">
					<span></span>
					<span></span>
					<span></span>
				</span>
			</button>

			<!-- Main navbar START -->
			<div class="navbar-collapse w-100 collapse" id="navbarCollapse">

				<!-- Nav category menu START -->
				<ul class="navbar-nav navbar-nav-scroll me-auto">
					<!-- Nav item 1 Demos -->
					<li class="nav-item dropdown dropdown-menu-shadow-stacked">
						<a class="nav-link bg-primary bg-opacity-10 rounded-3 text-primary px-3 py-3 py-xl-0" href="#" id="categoryMenu" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><span></span></a>
					</li>
				</ul>
				<!-- Nav category menu END -->

				<!-- Nav Main menu START -->
				<ul class="navbar-nav navbar-nav-scroll me-auto">
					<!-- Nav item 1 Demos -->
					<li class="nav-item dropdown">
						<a class="nav-link active" href="/home">Home</a>
					</li>

					<!-- Nav item 2 Pages -->
					<li class="nav-item dropdown">
						<a class="nav-link dropdown-toggle " href="#" id="pagesMenu" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Classes</a>
						<ul class="dropdown-menu" aria-labelledby="accounntMenu">
							<li class="dropdown-submenu dropend">
								<!-- <a class="dropdown-item " href="/views/classes/class.view.php">Create Class</a> -->
								<!-- Button trigger modal -->
								<button type="button" class="btn btn-primary dropdown-item" data-bs-toggle="modal" data-bs-target="#exampleModal">
									Create Class
								</button>
							</li>
							<li class="dropdown-submenu dropend">
								<a class="dropdown-item " href="#">Join Class</a>
							</li>
							<li class="dropdown-submenu dropend">
								<a class="dropdown-item text-primary" href="/classes">View all Class</a>
							</li>

						</ul>

					</li>

					<!-- Nav item 2 Pages -->
					<li class="nav-item dropdown">
						<a class="nav-link d-none" href="#" id="pagesMenu" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Teaching</a>
					</li>

					<!-- Nav item 3 Account -->
					<li class="nav-item dropdown">
						<a class="nav-link dropdown-toggle" href="#" id="accounntMenu" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Enrolled</a>
						<ul class="dropdown-menu" aria-labelledby="accounntMenu">
							<!-- Dropdown submenu -->
							<li class="dropdown-submenu dropend">
								<a class="dropdown-item " href="#"><i class="far fa-address-card fa-fw me-1"></i>To do</a>
							</li>

							<!-- Dropdown submenu -->
							<li class="dropdown-submenu dropend">
								<a class="dropdown-item dropdown-toggle" href="#"><i class="bi bi-easel2 fa-fw me-1"></i>All Classes</a>
								<ul class="dropdown-menu dropdown-menu-start" data-bs-popper="none">
									<?php foreach ($classes as $class) : ?>
										<li> <a class="dropdown-item" href="student-dashboard.html"><i class="bi bi-book fa-fw me-1"></i><?= $class['title'] ?></a> </li>
									<?php endforeach ?>
								</ul>
							</li>
							<li class="dropdown-submenu dropend">
								<a class="dropdown-item " href="/teacher"><i class="fas fa-user-tie fa-fw me-1"></i>Personal</a>
							</li>
						</ul>
					</li>


					<!-- Nav item 4 Megamenu-->
					<li class="nav-item">
						<a class="nav-link" href="/calendar">Calendar</a>

					</li>
					<!-- Nav item 2 Pages -->
					<li class="nav-item dropdown">
						<a class="nav-link " href="/archive">Archive</a>
					</li>

				</ul>
				<!-- Nav Main menu END -->

				<!-- Nav Search START -->
				<div class="nav my-3 my-xl-0 px-4 flex-nowrap align-items-center">
					<div class="nav-item w-100">
						<form class="position-relative mt-2">
							<button type="button" class="btn btn-outline-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
								<i class="bi bi-plus-circle-fill me-2"></i>Class
							</button>
						</form>
					</div>
				</div>
				<!-- Nav Search END -->
			</div>
			<!-- Main navbar END -->

			<!-- Profile START -->
			<div class="dropdown ms-1 ms-lg-0">
				<a class="avatar avatar-sm p-0" href="#" id="profileDropdown" role="button" data-bs-auto-close="outside" data-bs-display="static" data-bs-toggle="dropdown" aria-expanded="false">
					<img class="avatar-img rounded-circle" src="../assets/images/profiles/<?= $user['image'] ?>" alt="avatar">
				</a>
				<ul class="dropdown-menu dropdown-animation dropdown-menu-end shadow pt-3" aria-labelledby="profileDropdown">
					<!-- Profile info -->
					<li class="px-3">
						<div class="d-flex align-items-center">
							<!-- Avatar -->
							<div class="avatar me-3">
								<img class="avatar-img rounded-circle shadow" src="../../assets/images/profiles/<?= $user['image'] ?>" alt="profiles">
							</div>
							<div>
								<a class="h6" href="#"><?= $user['name'] ?></a>
								<p class="small m-0"><?= $user['email'] ?></p>
							</div>
						</div>
						<hr>

					</li>
					<!-- Links -->
					<li><a class="dropdown-item" href="../views/profiles/edit_profile.view.php"><i class="bi bi-person fa-fw me-2"></i>Edit Profile</a></li>
					<li><a class="dropdown-item" href="#"><i class="bi bi-gear fa-fw me-2"></i>Account Settings</a></li>
					<li><a class="dropdown-item" href="#"><i class="bi bi-info-circle fa-fw me-2"></i>Help</a></li>
					<li><a class="dropdown-item bg-danger-soft-hover" href="/user-signout"><i class="bi bi-power fa-fw me-2"></i>Sign Out</a></li>
					<li>
						<hr class="dropdown-divider">
					</li>
					<!-- Dark mode switch START -->
					<li>
						<div class="modeswitch-wrap" id="darkModeSwitch">
							<div class="modeswitch-item">
								<div class="modeswitch-icon"></div>
							</div>
							<span>Dark mode</span>
						</div>
					</li>
					<!-- Dark mode switch END -->
				</ul>
			</div>
			<!-- Profile START -->
		</div>
	</nav>
	<!-- Logo Nav END -->
</header>

<!-- Header END --><!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<h3 class="modal-title" id="exampleModalLabel"> <i class="bi bi-house-door-fill mx-3 text-info fs-2"></i>Create New Class</h3>
				<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
			</div>
			<div class="modal-body">
				<form id="myForm" action="controllers/classes/class.create.controller.php" method="post" enctype="multipart/form-data">
					<div class="mb-3">
						<label for="title" class="form-label">Class Name*</label>
						<input type="text" class="form-control" id="title" placeholder="Enter a name" name="title">
					</div>
					<div class="mb-3">
						<label for="section" class="form-label">Section*</label>
						<input type="text" class="form-control" id="section" placeholder="Enter a section" name="section">
					</div>
					<div class="mb-3">
						<label for="subject" class="form-label">Subject*</label>
						<input type="text" class="form-control" id="subject" placeholder="Enter a subject" name="subject">
					</div>
					<div class="mb-3">
						<label for="categories" class="form-label">Categories*</label>
						<select class="form-control" id="categories" name="category">
							<option disabled selected>Select Category</option>
							<?php foreach($categories as $category): ?>
							<option value="<?= $category['name']?>"> <?= $category['name']?></option>
							<?php endforeach?>
							
						</select>
					</div>
					<div class="mb-4">
						<label for="inputImage" class="form-label">Profile Image *</label>
						<input type="file" name="image" id="inputImages" class="form-control">
					</div>
				</form>
			</div>
			<div class="modal-footer">
				<button type="submit" class=" form-control btn btn-primary" form="myForm">Create</button>
			</div>
		</div>
	</div>
</div>