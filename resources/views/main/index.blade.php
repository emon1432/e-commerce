<!DOCTYPE html>
<html lang="en">

<head>
	<title>OneTech</title>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="description" content="OneTech shop project">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" type="text/css" href="{{ asset('frontend/styles/bootstrap4/bootstrap.min.css') }}">
	<link href="{{ asset('frontend/plugins/fontawesome-free-5.0.1/css/fontawesome-all.css') }}" rel="stylesheet" type="text/css">
	<link rel="stylesheet" type="text/css" href="{{ asset('frontend/plugins/OwlCarousel2-2.2.1/owl.carousel.css') }} ">
	<link rel="stylesheet" type="text/css" href="{{ asset('frontend/plugins/OwlCarousel2-2.2.1/owl.theme.default.css') }}">
	<link rel="stylesheet" type="text/css" href="{{ asset('frontend/plugins/OwlCarousel2-2.2.1/animate.css') }}">
	<link rel="stylesheet" type="text/css" href="{{ asset('frontend/plugins/slick-1.8.0/slick.css') }}">
	<link rel="stylesheet" type="text/css" href="{{ asset('frontend/styles/main_styles.css') }}">
	<link rel="stylesheet" type="text/css" href="{{ asset('frontend/styles/responsive.css') }}">
	<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.css" />
	@if(basename($_SERVER['PHP_SELF']) != 'index.php')
	<style>
		.cat_menu_container ul {
			visibility: hidden;
			opacity: 0;
		}
	</style>
	@endif
</head>

<body>
	<div class="super_container">
		@if(basename($_SERVER['PHP_SELF']) == 'index.php')
		@include('main.clientsPart.header')
		@else
		@include('main.clientsPart.miniHeader')
		@endif

		@yield('mainBody')

		@include('main.clientsPart.footer')
	</div>

	<script src="{{ asset('frontend/js/jquery-3.3.1.min.js')}}"></script>
	<script src="{{ asset('frontend/styles/bootstrap4/popper.js')}}"></script>
	<script src="{{ asset('frontend/styles/bootstrap4/bootstrap.min.js')}}"></script>
	<script src="{{ asset('frontend/plugins/greensock/TweenMax.min.js')}}"></script>
	<script src="{{ asset('frontend/plugins/greensock/TimelineMax.min.js')}}"></script>
	<script src="{{ asset('frontend/plugins/scrollmagic/ScrollMagic.min.js')}}"></script>
	<script src="{{ asset('frontend/plugins/greensock/animation.gsap.min.js')}}"></script>
	<script src="{{ asset('frontend/plugins/greensock/ScrollToPlugin.min.jsplugins/greensock/ScrollToPlugin.min.js')}}"></script>
	<script src="{{ asset('frontend/plugins/OwlCarousel2-2.2.1/owl.carousel.js')}}"></script>
	<script src="{{ asset('frontend/plugins/slick-1.8.0/slick.js')}}"></script>
	<script src="{{ asset('frontend/plugins/easing/easing.js')}}"></script>
	<script src="{{ asset('frontend/js/custom.js')}}"></script>

	<script src="{{ asset('https://unpkg.com/sweetalert@2.1.2/dist/sweetalert.min.js')}}"></script>
	<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>


	<script>
		$(document).on("click", "#delete", function(e) {
			e.preventDefault();
			var link = $(this).attr("href");
			swal({
					title: "Are you want to delete?",
					text: "Once Delete, This will be Permanently Delete!",
					icon: "warning",
					buttons: true,
					dangerMode: true,
				})
				.then((willDelete) => {
					if (willDelete) {
						window.location.href = link;
					} else {
						swal("Safe Data!");
					}
				});
		});
	</script>

	<script type="text/javascript">
		@if(Session::has('message'))
		var type = "{{ Session::get('alert-type','info')}}"
		switch (type) {
			case 'info':
				toastr.info("{{ Session::get('message') }}");
				break;

			case 'success':
				toastr.success("{{ Session::get('message') }}");
				break;

			case 'warning':
				toastr.warning("{{ Session::get('message') }}");
				break;

			case 'error':
				toastr.error("{{ Session::get('message') }}");
				break;
		}
		@endif
	</script>
</body>

</html>