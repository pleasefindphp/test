@include('layouts.header')
<!-- end:: Header -->
	<div class="kt-grid__item kt-grid__item--fluid kt-grid kt-grid--hor">
		<div class="kt-subheader-search font-blue-ebonyclay">

			@yield('pageBar')

		</div>
		<div class="kt-content  kt-grid__item kt-grid__item--fluid" id="kt_content">

			@yield('content')

		</div>
	</div>
@include('layouts.footer')
