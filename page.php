<?php
session_start();
error_reporting(0);
include('includes/config.php');
?>

<!DOCTYPE HTML>
<html lang="en">

<head>

	<title>Car Booking | Page details</title>
	<!--Bootstrap -->
	<link rel="stylesheet" href="assets/css/bootstrap.min.css" type="text/css">
	<!--Custome Style -->
	<link rel="stylesheet" href="assets/css/style.css" type="text/css">
	<!--OWL Carousel slider-->
	<link rel="stylesheet" href="assets/css/owl.carousel.css" type="text/css">
	<link rel="stylesheet" href="assets/css/owl.transitions.css" type="text/css">
	<!--slick-slider -->
	<link href="assets/css/slick.css" rel="stylesheet">
	<!--bootstrap-slider -->
	<link href="assets/css/bootstrap-slider.min.css" rel="stylesheet">
	<!--FontAwesome Font Style -->
	<link href="assets/css/font-awesome.min.css" rel="stylesheet">

	<!-- SWITCHER -->
	<link rel="stylesheet" id="switcher-css" type="text/css" href="assets/switcher/css/switcher.css" media="all" />
	<link rel="alternate stylesheet" type="text/css" href="assets/switcher/css/red.css" title="red" media="all" data-default-color="true" />
	<link rel="alternate stylesheet" type="text/css" href="assets/switcher/css/orange.css" title="orange" media="all" />
	<link rel="alternate stylesheet" type="text/css" href="assets/switcher/css/blue.css" title="blue" media="all" />
	<link rel="alternate stylesheet" type="text/css" href="assets/switcher/css/pink.css" title="pink" media="all" />
	<link rel="alternate stylesheet" type="text/css" href="assets/switcher/css/green.css" title="green" media="all" />
	<link rel="alternate stylesheet" type="text/css" href="assets/switcher/css/purple.css" title="purple" media="all" />

	<!-- Fav and touch icons -->
	<link rel="apple-touch-icon-precomposed" sizes="144x144" href="assets/images/favicon-icon/apple-touch-icon-144-precomposed.png">
	<link rel="apple-touch-icon-precomposed" sizes="114x114" href="assets/images/favicon-icon/apple-touch-icon-114-precomposed.html">
	<link rel="apple-touch-icon-precomposed" sizes="72x72" href="assets/images/favicon-icon/apple-touch-icon-72-precomposed.png">
	<link rel="apple-touch-icon-precomposed" href="assets/images/favicon-icon/apple-touch-icon-57-precomposed.png">
	<link rel="shortcut icon" href="assets/images/favicon-icon/favicon.png">
	<link href="https://fonts.googleapis.com/css?family=Lato:300,400,700,900" rel="stylesheet">

	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css">
	<link href="assets/css/star-rating.css" media="all" rel="stylesheet" type="text/css" />
	<link href="assets/js/themes/krajee-fas/theme.css" media="all" rel="stylesheet" type="text/css" />
	<link href="assets/js/themes/krajee-svg/theme.css" media="all" rel="stylesheet" type="text/css" />
	<!--suppress JSUnresolvedLibraryURL -->
	<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
	<script src="assets/js/star-rating.js" type="text/javascript"></script>
	<script src="assets/js/themes/krajee-fas/theme.js" type="text/javascript"></script>
	<script src="assets/js/themes/krajee-svg/theme.js" type="text/javascript"></script>

	<link rel="stylesheet" href="assets/css/jquery.thumbs.css">
	<style>
		.placeholder img {
			display: inline-block;
			border-radius: 50%;
			margin-bottom: 20px;
		}
	</style>
</head>

<body>

	<!--Header-->
	<?php include('includes/header.php'); ?>
	<?php
	$pagetype = $_GET['type'];
	$sql = "SELECT type,detail,PageName from tblpages where type=:pagetype";
	$query = $dbh->prepare($sql);
	$query->bindParam(':pagetype', $pagetype, PDO::PARAM_STR);
	$query->execute();
	$results = $query->fetchAll(PDO::FETCH_OBJ);
	$cnt = 1;
	if ($query->rowCount() > 0) {
		foreach ($results as $result) { ?>
			<section class="page-header aboutus_page">
				<div class="container">
					<div class="page-header_wrap">
						<div class="page-heading">
							<h1>
								<?php echo htmlentities($result->PageName); ?>
							</h1>
						</div>
						<ul class="coustom-breadcrumb">
							<li><a href="#">Home</a></li>
							<li>
								<?php echo htmlentities($result->PageName); ?>
							</li>
						</ul>
					</div>
				</div>
				<!-- Dark Overlay-->
				<div class="dark-overlay"></div>
			</section>
			<section class="about_us">
				<div class="container-fluid">
					<div class="section-header text-center">

						<?php if ($result->type == "forum") { ?>

							<div class="panel panel-default" style="margin-top: 2%">
								<!-- Default panel contents -->

								<div class="panel-body">

									<div class="row">
										<div class="col-lg-2 col-md-3">
											<ul class="nav nav-pills nav-stacked panel panel-default">
												<li class="active"><a data-toggle="pill" href="#home">
														<h6>Latest</h6>
													</a></li>
												<li><a data-toggle="pill" href="#menu1">
														<h6>Best</h6>
													</a></li>
												<li><a data-toggle="pill" href="#menu2">
														<h6>Random</h6>
													</a></li>
											</ul>
										</div>

										<div class="col-lg-10 col-md-9">

											<div class="tab-content">

												<div id="home" class="tab-pane fade in active">
													<div class="row">
														<?php
														$sql = "SELECT * from tbltestimonial";
														$query = $dbh->prepare($sql);
														$query->execute();
														$results = $query->fetchAll(PDO::FETCH_OBJ);
														$cnt = 1;
														if ($query->rowCount() > 0) {
															foreach ($results as $result) {
																if ($result->id % 2 == 0) {
														?>
																	<div class='col-lg-6 col-md-6 col-sm-12'>
																		<div class="panel panel-default">
																			<div class="panel-heading">
																				<h6><?= $result->UserEmail; ?></h6>
																			</div>
																			<div class="panel-body">
																				<div class="row">
																					<div class="col-md-4 col-lg-3">
																						<img class='img-rounded' src="https://cdn.icon-icons.com/icons2/2643/PNG/512/male_boy_person_people_avatar_icon_159358.png" style="height: 100px; width: 100px" alt="user-avatar" />
																					</div>
																					<div class="col-md-8 col-lg-9" style="direction: ltr">

																						<p><?= $result->Testimonial ?>
																						</p>
																						<div class="js-rating" data-like="7" data-dislike="3"></div>
																					</div>
																				</div>
																			</div>
																			<div class="panel-footer" style="padding: 0; margin: 0">

																				<input id="kartik" class="rating" data-stars="5" name="rating" data-step="0.5" value="4.5" />
																			</div>
																		</div>
																	</div>
														<?php }
															}
														} ?>
													</div>
												</div>

												<div id="menu1" class="tab-pane fade">
													<div class="row">
														<?php
														$sql = "SELECT * from tbltestimonial";
														$query = $dbh->prepare($sql);
														$query->execute();
														$results = $query->fetchAll(PDO::FETCH_OBJ);
														$cnt = 1;
														if ($query->rowCount() > 0) {
															foreach ($results as $result) {
																if ($result->id % 2 != 0) {
														?>
																	<div class='col-lg-6 col-md-6 col-sm-12'>
																		<div class="panel panel-default">
																			<div class="panel-heading">
																				<h6><?= $result->UserEmail; ?></h6>
																			</div>
																			<div class="panel-body">
																				<div class="row">
																					<div class="col-md-4 col-lg-3">
																						<img class='img-rounded' src="https://cdn.icon-icons.com/icons2/2643/PNG/512/male_boy_person_people_avatar_icon_159358.png" style="height: 100px; width: 100px" alt="user-avatar" />
																					</div>
																					<div class="col-md-8 col-lg-9" style="direction: ltr">

																						<p><?= $result->Testimonial ?>
																						</p>
																						<div class="js-rating" data-like="7" data-dislike="3"></div>
																					</div>
																				</div>
																			</div>
																			<div class="panel-footer" style="padding: 0; margin: 0">

																				<input id="kartik" class="rating" data-stars="5" name="rating" data-step="0.5" value="4.5" />
																			</div>
																		</div>
																	</div>
														<?php }
															}
														} ?>
													</div>
												</div>

												<div id="menu2" class="tab-pane fade">
													<div class="row">
														<?php
														$sql = "SELECT * from tbltestimonial limit 6";
														$query = $dbh->prepare($sql);
														$query->execute();
														$results = $query->fetchAll(PDO::FETCH_OBJ);
														$cnt = 1;
														if ($query->rowCount() > 0) {
															foreach ($results as $result) {
														?>
																<div class='col-lg-6 col-md-6 col-sm-12'>
																	<div class="panel panel-default">
																		<div class="panel-heading">
																			<h6><?= $result->UserEmail; ?></h6>
																		</div>
																		<div class="panel-body">
																			<div class="row">
																				<div class="col-md-4 col-lg-3">
																					<img class='img-rounded' src="https://cdn.icon-icons.com/icons2/2643/PNG/512/male_boy_person_people_avatar_icon_159358.png" style="height: 100px; width: 100px" alt="user-avatar" />
																				</div>
																				<div class="col-md-8 col-lg-9" style="direction: ltr">

																					<p><?= $result->Testimonial ?>
																					</p>
																					<div class="js-rating" data-like="7" data-dislike="3"></div>
																				</div>
																			</div>
																		</div>
																		<div class="panel-footer" style="padding: 0; margin: 0">

																			<input id="kartik" class="rating" data-stars="5" name="rating" data-step="0.5" value="4.5" />
																		</div>
																	</div>
																</div>
														<?php }
														} ?>
													</div>
												</div>
											</div>

										</div>

									</div>

								</div>
							</div>

							<script src="assets/js/jquery.thumbs.js"></script>
							<script>
								$('.js-rating').thumbs({
									onLike: function(value) {
										alert('Thank You For Voting.');
									},
									onDislike: function(value) {
										alert('Im sorry.');
									}
								});
							</script>

						<?php } else if ($result->type == "aboutus") { ?>
							<div class='row' style="margin-top:4%">
								<div class="col-lg-2 col-md-3">
									<ul class="nav nav-pills nav-stacked panel panel-default">
										<li class="active"><a data-toggle="pill" href="#home">
												<h6>Team Members</h6>
											</a></li>
										<li><a data-toggle="pill" href="#menu2">
												<h6>Usecase Diagram</h6>
											</a></li>
										<li><a data-toggle="pill" href="#menu3">
												<h6>ER Diagram</h6>
											</a></li>
										<li><a data-toggle="pill" href="#menu4">
												<h6>Class Diagram</h6>
											</a></li>
									</ul>
								</div>

								<div class="col-lg-10 col-md-9 col-sm-12 col-xs-12">
									<div class="tab-content panel panel-default">
										<div id="home" class="tab-pane fade in active">
											<h3 style="margin-top: 2%">Our Teammates</h3>
											<div class="row placeholders" style="margin-bottom:2%">

												<div class="col-sm-offset-2 col-xs-6 col-sm-4 col-md-4 placeholder">
													<img src="https://image.freepik.com/free-vector/businessman-character-avatar-isolated_24877-60111.jpg" width="200" height="200" class="img-responsive" alt="Generic placeholder thumbnail">
													<h4>Trần Minh Hiếu</h4>
													<h4>1859015</h4>
													<span class="text-muted">19Bit-1</span>
												</div>
												<div class="col-xs-6 col-sm-4 col-md-4 placeholder">
													<img src="https://image.freepik.com/free-vector/businessman-character-avatar-isolated_24877-60111.jpg" width="200" height="200" class="img-responsive" alt="Generic placeholder thumbnail">
													<h4>Dương tùng long</h4>
													<h4>1759024</h4>
													<span class="text-muted">Short Description</span>
												</div>
											</div>
											<div class="row placeholders" style="margin-bottom:2%">

												<div class="col-sm-offset-2 col-xs-6 col-sm-4 col-md-4 placeholder">
													<img src="https://image.freepik.com/free-vector/businessman-character-avatar-isolated_24877-60111.jpg" width="200" height="200" class="img-responsive" alt="Generic placeholder thumbnail">
													<h4>Nguyễn Hữu Nghĩa</h4>
													<h4>1659025</h4>
													<span class="text-muted">19Bit-2</span>
												</div>
												<div class="col-xs-6 col-sm-4 col-md-4 placeholder">
													<img src="https://image.freepik.com/free-vector/businessman-character-avatar-isolated_24877-60111.jpg" width="200" height="200" class="img-responsive" alt="Generic placeholder thumbnail">
													<h4>Nguyễn Bính Hoàng Vũ</h4>
													<h4>1959044</h4>
													<span class="text-muted">Short Description</span>
												</div>
											</div>
										</div>
										<div id="menu1" class="tab-pane fade">
											<h3 style="margin-top: 2%">Our Vision</h3>
											<p>Put CarRental Description in here...</p>
											<div style="width: 100%; height: auto; margin: 10px;">
												<iframe allowfullscreen frameborder="0" style="width:100%; height:90vh" allowfullscreen src="https://lucid.app/documents/embeddedchart/e92474fc-62cd-4d25-a868-eab748345a83" id="DziM7tLggYFn">
												</iframe>
											</div>
										</div>
										<div id="menu2" class="tab-pane fade">
											<h3 style="margin-top: 2%">Usecase Diagram</h3>
											<hr />
											<img class="img-responsive" src="Usecase.jpeg" alt="usecase" style="width: 100%; height: auto" />
										</div>
										<div id="menu3" class="tab-pane fade">
											<h3 style="margin-top: 2%">ER Diagram</h3>
											<hr />
											<img class="img-responsive" src="ERD.jpeg" alt="ERD" style="width: 100%; height: auto" />
										</div>
										<div id="menu4" class="tab-pane fade">
											<h3 style="margin-top: 2%">Class Diagram</h3>
											<hr />
											<img class="img-responsive" src="ClassDiagram.jpeg" alt="class digram" style="width: 100%; height: auto" />
										</div>
									</div>
								</div>
							</div>
						<?php } else { ?>
							<p>
								<?php echo $result->detail; ?>
							</p>
						<?php } ?>

					</div>
			<?php }
	} ?>
				</div>
			</section>
			<!-- /About-us-->





			<!--Footer -->
				<?php include('includes/footer.php'); ?>
				<!-- /Footer-->

				<!--Back to top-->
				<div id="back-top" class="back-top"> <a href="#top"><i class="fa fa-angle-up" aria-hidden="true"></i> </a>
				</div>
				<!--/Back to top-->

				<!--Login-Form -->
				<?php include('includes/login.php'); ?>
				<!--/Login-Form -->

				<!--Register-Form -->
				<?php include('includes/registration.php'); ?>

				<!--/Register-Form -->

				<!--Forgot-password-Form -->
				<?php include('includes/forgotpassword.php'); ?>
				<!--/Forgot-password-Form -->

				<!-- Scripts -->
				<script src="assets/js/jquery.min.js"></script>
				<script src="assets/js/bootstrap.min.js"></script>
				<script src="assets/js/interface.js"></script>
				<!--Switcher-->
				<script src="assets/switcher/js/switcher.js"></script>
				<!--bootstrap-slider-JS-->
				<script src="assets/js/bootstrap-slider.min.js"></script>
				<!--Slider-JS-->
				<script src="assets/js/slick.min.js"></script>
				<script src="assets/js/owl.carousel.min.js"></script>

</body>

<!-- Mirrored from themes.webmasterdriver.net/carforyou/demo/about-us.html by HTTrack Website Copier/3.x [XR&CO'2014], Fri, 16 Jun 2017 07:26:12 GMT -->

</html>