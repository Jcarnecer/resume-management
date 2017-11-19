	<div id="sidebar">
		<!-- sidebar menu start-->
		<div id="nav-icon-close" class="custom-toggle">
			<span></span>
			<span></span>
		</div>

		<ul class="sidebar-menu">
			<li class="">
				<a class="" href="<?= base_url().'Home'; ?>">
					<!-- <i class="fa fa-dashboard"></i> -->
					<span>Dashboard</span>
				</a>
			</li>

			<li class="">
				<a class="" href="<?= base_url('roles')?>">
					<!-- <i class="fa fa-dashboard"></i> -->
					<span>Roles</span>
				</a>
			</li>

			<!-- <li class="sub-menu">
				<a data-toggle="collapse" href="#UIElementsSub" aria-expanded="false" aria-controls="UIElementsSub" >
					<i class="fa fa-desktop"></i>
					<span>UI Elements</span>
				</a>
				<ul class="sub collapse" id="UIElementsSub">
					<li><a  href="general.html">General</a></li>
					<li><a  href="buttons.html">Buttons</a></li>
					<li><a  href="panels.html">Panels</a></li>
				</ul>
			</li> -->
		</ul>
		<!-- sidebar menu end-->
	</div>
	<div class="main-content">
		<div class="topbar">
			<nav class="navbar navbar-custom">
				<div id="nav-icon-open" class="custom-toggle hidden-toggle">
					<span></span>
					<span></span>
					<span></span>
				</div>
				<a class="navbar-brand mr-auto" href="<?= base_url().'Home'; ?>">Payak Apps</a>
				<a class="nav-text" href="login/logout">Logout</a>
			</nav>
		</div>
		<!--div class="container-fluid">
			Content goes here
		</div>-->
	