<section>
		<div class="container">
			<div class="row">
				<div class="col-sm-3">

				<!-- left menu -->
				@include('client.layouts.menu-left')

                <!-- content -->
				<div class="col-sm-9 padding-right">

                    @yield('content')
					
					
				</div>
			</div>
		</div>
	</section>