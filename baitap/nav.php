<ul class="navbar-nav bg-gradient-dark sidebar sidebar-dark accordion" id="accordionSidebar">

	<!-- Sidebar - Brand -->
	<?php
	if ($_SESSION['auth_level'] == 5) {
	?>
		<a class="sidebar-brand d-flex align-items-center justify-content-center" href="../dashboard/admin/index.php">
			<div class="sidebar-brand-icon">
				<img src="../../img/bg.png" alt="" width="70" />
			</div>
			<div class="sidebar-brand-text mx-2">Admin</div>
		</a>
	<?php
	} else {
		if ($_SESSION['auth_level'] == 4) {
			?>
				<a class="sidebar-brand d-flex align-items-center justify-content-center" href="../dashboard/cashier/index.php">
			<div class="sidebar-brand-icon">
				<img src="../../img/bg.png" alt="" width="70" />
			</div>
			<div class="sidebar-brand-text mx-2">Admin</div>
		</a>
			<?php
		}
	}
	?>


	<!-- Divider -->
	<hr class="sidebar-divider my-0">

	<!-- Nav Item - Dashboard -->
	<li class="nav-item">
		<a class="nav-link" href="/baitap/baitap.php">
			<i class="fas fa-fw fa-chart-area"></i>
			<span>Thành viên nhóm</span></a>
	</li>

	<!-- Divider -->
	<hr class="sidebar-divider">

	<!-- Nav Item - Pages Collapse Menu -->
	<li class="nav-item">
		<a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="true" aria-controls="collapseTwo">
			<i class="fas fa-fw fa-cog"></i>
			<span>PHP & FORM</span>
		</a>
		<div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
			<div class="bg-white py-2 collapse-inner rounded">
				<a class="collapse-item" href="pf_bt1.php">Bài 1</a>
				<a class="collapse-item" href="pf_bt2.php">Bài 2</a>
				<a class="collapse-item" href="pf_bt3.php">Bài 3</a>
				<a class="collapse-item" href="pf_bt4.php">Bài 4</a>
				<a class="collapse-item" href="pf_bt5.php">Bài 5</a>
				<a class="collapse-item" href="pf_bt6/pf_bt6_nhaplieu.php">Bài 6</a>
				<a class="collapse-item" href="pf_bt8/form.htm">Bài 7</a>
				<a class="collapse-item" href="pf_bt9/index.php">Bài 8</a>
			</div>
		</div>
	</li>


	<!-- Nav Item - Utilities Collapse Menu -->
	<li class="nav-item">
		<a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseUtilities" aria-expanded="true" aria-controls="collapseUtilities">
			<i class="fas fa-fw fa-wrench"></i>
			<span>CHUỖI & HÀM</span>
		</a>
		<div id="collapseUtilities" class="collapse" aria-labelledby="headingUtilities" data-parent="#accordionSidebar">
			<div class="bg-white py-2 collapse-inner rounded">
				<a class="collapse-item" href="mch_bt1.php">Bài 1</a>
				<a class="collapse-item" href="mch_bt2.php">Bài 2</a>
				<a class="collapse-item" href="mch_bt3.php">Bài 3</a>
				<a class="collapse-item" href="mch_bt4.php">Bài 4</a>
				<a class="collapse-item" href="mch_bt5.php">Bài 5</a>
				<a class="collapse-item" href="mch_bt6.php">Bài 6</a>
				<a class="collapse-item" href="mch_bt7.php">Bài 7</a>
			</div>
		</div>
	</li>

	<li class="nav-item">
		<a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseUtilities_ove" aria-expanded="true" aria-controls="collapseUtilities">
			<i class="fas fa-fw fa-wrench"></i>
			<span>PHP & MYSQL</span>
		</a>
		<div id="collapseUtilities_ove" class="collapse" aria-labelledby="headingUtilities" data-parent="#accordionSidebar">
			<div class="bg-white py-2 collapse-inner rounded">
				<a class="collapse-item" href="#">Bài 1</a>
				<a class="collapse-item" href="#">Bài 2</a>
				<a class="collapse-item" href="#">Bài 3</a>
				<a class="collapse-item" href="#">Bài 4</a>
				<a class="collapse-item" href="#">Bài 5</a>
				<a class="collapse-item" href="#">Bài 6</a>
				<a class="collapse-item" href="#">Bài 7</a>
				<a class="collapse-item" href="#">Bài 8</a>
				<a class="collapse-item" href="#">Bài 9</a>
			</div>
		</div>
	</li>

	<li class="nav-item">
		<a class="nav-link" href="logout.php">
			<i class="fas fa-fw fa-chart-area"></i>
			<span>Logout</span></a>
	</li>

	<!-- Divider -->
	<hr class="sidebar-divider d-none d-md-block">

	<!-- Sidebar Toggler (Sidebar) -->
	<div class="text-center d-none d-md-inline">
		<button class="rounded-circle border-0" id="sidebarToggle"></button>
	</div>

</ul>