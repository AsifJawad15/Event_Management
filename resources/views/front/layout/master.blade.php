<!doctype html>
<html lang="en">
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
		<link rel="icon" type="image/png" href="{{ asset('dist-front/images/favicon.png') }}">
		<title>@yield('title', 'SingleEvent - Event & Conference Management Website')</title>
		<link href="{{ asset('dist-front/css/animate.css') }}" type="text/css" rel="stylesheet">
		<link href="{{ asset('dist-front/css/bootstrap.min.css') }}" type="text/css" rel="stylesheet">
		<link href="{{ asset('dist-front/css/font-awesome.min.css') }}" type="text/css" rel="stylesheet">
		<link href="{{ asset('dist-front/css/magnific-popup.css') }}" type="text/css" rel="stylesheet">
		<link href="{{ asset('dist-front/css/owl.carousel.min.css') }}" type="text/css" rel="stylesheet">
		<link href="{{ asset('dist-front/css/global.css') }}" type="text/css" rel="stylesheet">
		<link href="{{ asset('dist-front/css/style.css') }}" type="text/css" rel="stylesheet">
		<link href="{{ asset('dist-front/css/responsive.css') }}" type="text/css" rel="stylesheet">
		<link href="{{ asset('dist-front/css/spacing.css') }}" type="text/css" rel="stylesheet">
		<link href="https://fonts.googleapis.com/css?family=Nunito+Sans:300,400,500,700,900" rel="stylesheet">
		<!-- iziToast CSS -->
		<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/izitoast@1.4.0/dist/css/iziToast.min.css">
		@yield('head')
	</head>
	<body data-spy="scroll" data-target=".navbar" data-offset="50">
		@yield('content')
		<footer class="main-footer">
			<div class="widgets-section">
				<div class="container">
					<div class="clearfix">
						<div class="col-lg-12 col-sm-12 col-xs-12">
							<div class="row clearfix">
								<div class="footer-column col-lg-2 col-sm-6 col-xs-12">
									<div class="footer-widget links-widget">
										<h2>Links</h2>
										<div class="widget-content">
											<ul class="list">
												<li><a href="{{ url('/') }}">Home</a></li>
												<li><a href="{{ route('front.sponsors') }}">Sponsors</a></li>
												<li><a href="{{ url('/speakers') }}">Speakers</a></li>
												<li><a href="{{ url('/organizers') }}">Organizers</a></li>
											</ul>
										</div>
									</div>
								</div>
								<div class="footer-column col-lg-2 col-sm-6 col-xs-12">
									<div class="footer-widget links-widget">
										<h2>Pages</h2>
										<div class="widget-content">
											<ul class="list">
												<li><a href="{{ url('/terms') }}">Terms of Use</a></li>
												<li><a href="{{ url('/privacy') }}">Privacy Policy</a></li>
												<li><a href="{{ url('/schedule') }}">Schedule</a></li>
												<li><a href="{{ url('/contact') }}">Contact Us</a></li>
											</ul>
										</div>
									</div>
								</div>
								<div class="footer-column col-lg-4 col-sm-6 col-xs-12">
									<div class="footer-widget links-widget">
										<h2>Contact</h2>
										<div class="widget-content">
											<ul class="list">
												<li>Address: 34, Park Street, NYC, USA</li>
												<li>Email: contact@example.com</li>
												<li>Phone: 123-322-1248</li>
											</ul>
											<ul class="social-icon mt_15">
												<li><a href="#"><i class="fa fa-facebook"></i></a></li>
												<li><a href="#"><i class="fa fa-twitter"></i></a></li>
												<li><a href="#"><i class="fa fa-linkedin"></i></a></li>
												<li><a href="#"><i class="fa fa-instagram"></i></a></li>
											</ul>
										</div>
									</div>
								</div>
								<div class="footer-column col-lg-4 col-sm-6 col-xs-12">
									<div class="footer-widget subscribe-widget">
										<h2>Newsletter</h2>
										<div class="widget-content">
											<div class="newsletter-form">
												<form method="post" action="">
													<div class="form-group">
														<input type="email" name="email" value="" placeholder="Enter Email Address" required>
													</div>
													<div class="form-group">
														<div class="global_btn"><a class="btn_two" href="#">SUBSCRIBE</a> </div>
													</div>
												</form>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
			<div class="footer-bottom">
				<div class="auto-container container">
				<div class="text">Copyright 2024, SingleEvent. All Rights Reserved.</div>
				</div>
			</div>
		</footer>
		<script src="{{ asset('dist-front/js/jquery-3.3.1.min.js') }}"></script>
		<script src="{{ asset('dist-front/js/popper.min.js') }}"></script>
		<script src="{{ asset('dist-front/js/bootstrap.min.js') }}"></script>
		<script src="{{ asset('dist-front/js/jquery.easing.min.js') }}"></script>
		<script src="{{ asset('dist-front/js/modernizr-2.8.3.min.js') }}"></script>
		<script src="{{ asset('dist-front/js/jquery.appear.js') }}"></script>
		<script src="{{ asset('dist-front/js/jquery-countTo.js') }}"></script>
		<script src="{{ asset('dist-front/js/jquery.magnific-popup.min.js') }}"></script>
		<script src="{{ asset('dist-front/js/owl.carousel.min.js') }}"></script>
		<script src="{{ asset('dist-front/js/jquery.countdown.min.js') }}"></script>
		<script src="{{ asset('dist-front/js/jquery.scrollTo.js') }}"></script>
		<script src="{{ asset('dist-front/js/typed.js') }}"></script>
		<script src="{{ asset('dist-front/js/custom.js') }}"></script>
		<!-- iziToast JS -->
		<script src="https://cdn.jsdelivr.net/npm/izitoast@1.4.0/dist/js/iziToast.min.js"></script>
		@yield('scripts')
	</body>
</html>
