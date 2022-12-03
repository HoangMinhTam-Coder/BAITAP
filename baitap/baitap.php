<?php
require '../include/db_conn.php';
page_protect();
?>
<!DOCTYPE html>
<html lang="en">

<head>


	<title>Sam's Slim Gym | Dashboard </title>

	<!-- Custom fonts for this template-->
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">
	<link href="/template/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
	<link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

	<!-- Custom styles for this template-->
	<link href="/template/css/sb-admin-2.min.css" rel="stylesheet">
	<style>
		.mySlides {
    display: none
  }

  img {
    vertical-align: middle;
  }

  /* Slideshow container */
  .slideshow-container {
    max-width: 100%;
    padding: 0px 50px;
    height: 500px;
  }

  .left_slide {
    width: 50%;
    height: 500px;
    float: left;
    padding: 0 5%;

  }

  .left_slide img {
    width: 100%;
    height: 100%;
    float: clear;
  }

  .right_slide {
    width: 50%;
    height: 500px;
    float: right;
    padding: 7% 0%;
  }

  .right_slide p {
    font-size: 25px;
    text-align: left;
    padding-bottom: 10px;
  }


  /* Next & previous buttons */
  .prev {
    border-radius: 3px 0px 0px 3px;
    cursor: pointer;
    position: absolute;
    top: 50%;
    height: 60px;
    margin: 0 10px;
    width: auto;
    padding: 16px;
    color: white;
    font-weight: bold;
    font-size: 18px;
    transition: 0.6s ease;
    user-select: none;
    background-color: green;
  }

  /* Position the "next button" to the right */
  .next {
    right: 0;
    border-radius: 0px 3px 3px 0px;
    cursor: pointer;
    position: absolute;
    top: 50%;
    height: 60px;
    margin: 0 70px 0 10px;
    width: auto;
    padding: 16px;
    color: white;
    font-weight: bold;
    font-size: 18px;
    transition: 0.6s ease;
    user-select: none;
    background-color: green;
  }

  /* On hover, add a black background color with a little bit see-through */
  .prev:hover,
  .next:hover {
    background-color: rgba(0, 0, 0, 0.8);
  }


  /* Number text (1/3 etc) */
  .numbertext {
    background-color: green;
    color: #f2f2f2;
    font-size: 18px;
    padding: 8px 12px;
    position: absolute;
  }

  /* The dots/bullets/indicators */
  .dot {
    margin-top: 15px;
    cursor: pointer;
    height: 15px;
    width: 15px;
    background-color: #bbb;
    border-radius: 50%;
    display: inline-block;
    transition: background-color 0.6s ease;
  }

  .active,
  .dot:hover {
    background-color: #717171;
  }

  /* Fading animation */
  .fade {
    animation-name: fade;
    animation-duration: 1.5s;
  }

  @keyframes fade {
    from {
      opacity: .4
    }

    to {
      opacity: 1
    }
  }

  /* On smaller screens, decrease text size */
  @media only screen and (max-width: 300px) {

    .prev,
    .next,
    .text {
      font-size: 11px;
    }
  }
	</style>
</head>

<body class="page-top">

	<!-- Page Wrapper -->
	<div id="wrapper">

		<!-- Sidebar -->
		<?php include("nav.php") ?>
		<!-- End of Sidebar -->

		<!-- Content Wrapper -->
		<div id="content-wrapper" class="d-flex flex-column">

			<!-- Main Content -->
			<div id="content">

				<!-- Topbar -->
				<nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

					<!-- Sidebar Toggle (Topbar) -->
					<button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
						<i class="fa fa-bars"></i>
					</button>
					<!-- Topbar Navbar -->
					<ul class="navbar-nav ml-auto">

						<!-- Nav Item - Search Dropdown (Visible Only XS) -->
						<li class="nav-item dropdown no-arrow d-sm-none">
							<a class="nav-link dropdown-toggle" href="#" id="searchDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
								<i class="fas fa-search fa-fw"></i>
							</a>
							<!-- Dropdown - Messages -->
							<div class="dropdown-menu dropdown-menu-right p-3 shadow animated--grow-in" aria-labelledby="searchDropdown">
								<form class="form-inline mr-auto w-100 navbar-search">
									<div class="input-group">
										<input type="text" class="form-control bg-light border-0 small" placeholder="Search for..." aria-label="Search" aria-describedby="basic-addon2">
										<div class="input-group-append">
											<button class="btn btn-primary" type="button">
												<i class="fas fa-search fa-sm"></i>
											</button>
										</div>
									</div>
								</form>
							</div>
						</li>

						<!-- Nav Item - Alerts -->
						<!-- <li class="nav-item dropdown no-arrow mx-1">
                            <a class="nav-link dropdown-toggle" href="#" id="alertsDropdown" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <b>Bài Tập</b>
                            </a>
                            
                        </li> -->

						<!-- Nav Item - User Information -->
						<li class="nav-item dropdown no-arrow">
							<a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
								<span class="mr-2 d-none d-lg-inline text-gray-600 small"><?php echo $_SESSION['full_name']; ?></span>
								<i class="fas fa-user"></i>
							</a>
							<!-- Dropdown - User Information -->
							<div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">

								<a class="dropdown-item" href="#" data-toggle="modal" data-target="#logoutModal">
									<i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
									Logout
								</a>
							</div>
						</li>

					</ul>

				</nav>
				<!-- End of Topbar -->

				<!-- Begin Page Content -->
				<div class="container-fluid">
					<div class="slideshow-container">
						<a class="prev" onclick="plusSlides(-1)">❮</a>
						<div class="mySlides">
							<div class="left_slide">
								<div class="numbertext">1 / 5</div>
								<img src="./img/tam.jpg" alt="">
							</div>
							<div class="right_slide">
								<p class="title">
									<strong>Hoàng Minh Tâm</strong>
									<br>
									(Nhóm trưởng)
								</p>
								<p>
									MSSV: 61131007 <br>
									Ngày sinh: <br>
									Giới tính: Nam <br>
									Sđt: 0935969923<br>
									Email: tam.hm.61cntt@ntu.edu.vn
								</p>
							</div>
						</div>
						<div class="mySlides">
							<div class="left_slide">
								<div class="numbertext">2 / 5</div>
								<img src="./img/tuan.jpg" alt="">
							</div>
							<div class="right_slide">
								<p class="title">
									<strong>Lê Thanh Tuấn</strong>
									<br>
									(Thành viên)
								</p>
								<p>
									MSSV: 61134623 <br>
									Ngày sinh: 06/3/2001 <br>
									Giới tính: Nam <br>
									Sđt: 0383075414 <br>
									Email: tuan.lt.61cntt@ntu.edu.vn
								</p>
							</div>
						</div>
						<div class="mySlides">
							<div class="left_slide">
								<div class="numbertext">3 / 5</div>
								<img src="./img/dat.jpg" alt="">
							</div>
							<div class="right_slide">
								<p class="title">
									<strong>Lại Quốc Đạt</strong>
									<br>
									(Thành viên)
								</p>
								<p>
									MSSV: 61133474 <br>
									Ngày sinh: 22/12/2001 <br>
									Giới tính: Nam <br>
									Sđt: 0935353760 <br>
									Email: dat.lq.61cntt@ntu.edu.vn
								</p>
							</div>
						</div>
						<div class="mySlides">
							<div class="left_slide">
								<div class="numbertext">4 / 5</div>
								<img src="./img/toan.jpg" alt="">
							</div>
							<div class="right_slide">
								<p class="title">
									<strong>Lý Thanh Toàn</strong>
									<br>
									(Thành viên)
								</p>
								<p>
									MSSV: 61134514 <br>
									Ngày sinh: 23/6/2001 <br>
									Giới tính: Nam <br>
									Sđt: 0365813076 <br>
									Email: toan.lt.61cntt@ntu.edu.vn
								</p>
							</div>
						</div>
						<div class="mySlides">
							<div class="left_slide">
								<div class="numbertext">5 / 5</div>
								<img src="./img/tue.png" alt="">
							</div>
							<div class="right_slide">
								<p class="title">
									<strong>Ngư Minh Tuệ</strong>
									<br>
									(Thành viên)
								</p>
								<p>
									MSSV: 61133279 <br>
									Ngày sinh: 28/4/2001 <br>
									Giới tính: Nam <br>
									Sđt: 0585686002 <br>
									Email: minhtue.dev@gmail.com
								</p>
							</div>
						</div>
						<a class="next" onclick="plusSlides(1)">❯</a>
						<div style="text-align:center; width: 100%; gap: 10px; padding-top: 10px;">
							<div class="btn_dot" style="margin-top: 10px;">
								<span class="dot" onclick="currentSlide(1)"></span>
								<span class="dot" onclick="currentSlide(2)"></span>
								<span class="dot" onclick="currentSlide(3)"></span>
								<span class="dot" onclick="currentSlide(4)"></span>
								<span class="dot" onclick="currentSlide(5)"></span>
							</div>
						</div>
					</div>
				</div>
				<!-- /.container-fluid -->

			</div>
			<!-- End of Main Content -->

			<!-- Footer -->
			<?php include("../dashboard/admin/footer.php") ?>
			<!-- End of Footer -->

		</div>
		<!-- End of Content Wrapper -->

	</div>
	<!-- End of Page Wrapper -->

	<!-- Scroll to Top Button-->
	<a class="scroll-to-top rounded" href="#page-top">
		<i class="fas fa-angle-up"></i>
	</a>

	<!-- Logout Modal-->
	<div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
		<div class="modal-dialog" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
					<button class="close" type="button" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">×</span>
					</button>
				</div>
				<div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
				<div class="modal-footer">
					<button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
					<a class="btn btn-primary" href="logout.php">Logout</a>
				</div>
			</div>
		</div>
	</div>

	<!-- Bootstrap core JavaScript-->
	<script src="/template/vendor/jquery/jquery.min.js"></script>
	<script src="/template/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

	<!-- Core plugin JavaScript-->
	<script src="/template/vendor/jquery-easing/jquery.easing.min.js"></script>

	<!-- Custom scripts for all pages-->
	<script src="/template/js/sb-admin-2.min.js"></script>

	<!-- Page level plugins -->
	<script src="/template/vendor/chart.js/Chart.min.js"></script>

	<!-- Page level custom scripts -->
	<script src="/template/js/demo/chart-area-demo.js"></script>
	<script src="/template/js/demo/chart-pie-demo.js"></script>

	<script>
		let slideIndex = 1;
		showSlides(slideIndex);

		function plusSlides(n) {
			showSlides(slideIndex += n);
		}

		function currentSlide(n) {
			showSlides(slideIndex = n);
		}

		function showSlides(n) {
			let i;
			let slides = document.getElementsByClassName("mySlides");
			let dots = document.getElementsByClassName("dot");
			if (n > slides.length) {
				slideIndex = 1
			}
			if (n < 1) {
				slideIndex = slides.length
			}
			for (i = 0; i < slides.length; i++) {
				slides[i].style.display = "none";
			}
			for (i = 0; i < dots.length; i++) {
				dots[i].className = dots[i].className.replace("active", "");
			}
			slides[slideIndex - 1].style.display = "block";
			dots[slideIndex - 1].className += " active";
		}
	</script>
</body>

</html>