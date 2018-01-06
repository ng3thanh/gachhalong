@extends('web.layout') 
@section('title', 'Liên hệ')
@section('css')

@endsection
@section('js')

@endsection

@section('content')
<!-- contact -->
	<div class="contact">
		<div class="container">
			<div class="contact-grids">
				<div class="col-md-4 contact-grid text-center animated wow slideInLeft" data-wow-delay=".5s">
					<div class="contact-grid1">
						<i class="glyphicon glyphicon-map-marker" aria-hidden="true"></i>
						<h4>Địa chỉ</h4>
						<p>Chợ Cháy - Chẩn Kỳ - Trung Tú - Ứng Hoà - Hà Nội.</p>
					</div>
				</div>
				<div class="col-md-4 contact-grid text-center animated wow slideInUp" data-wow-delay=".5s">
					<div class="contact-grid2">
						<i class="glyphicon glyphicon-earphone" aria-hidden="true"></i>
						<h4>Điện thoại</h4>
						<p><span>092.812.0298</span></p>
					</div>
				</div>
				<div class="col-md-4 contact-grid text-center animated wow slideInRight" data-wow-delay=".5s">
					<div class="contact-grid3">
						<i class="glyphicon glyphicon-envelope" aria-hidden="true"></i>
						<h4>Email</h4>
						<p><span><a href="mailto:tandinhphat2018@gmail.com">tandinhphat2018@gmail.com</a></span></p>
					</div>
				</div>
				<div class="clearfix"> </div>
			</div>
			<div class="map wow fadeInDown animated" data-wow-delay=".5s">
				<h3 class="tittle">Địa chỉ đại lý</h3>
				<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3731.7880364153457!2d105.83207011430285!3d20.718830203663686!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3135ca634e3cb287%3A0x5e59de04b3493f8f!2zQ2jhu6MgQ2jDoXk!5e0!3m2!1svi!2s!4v1515246403394" width="600" height="450" frameborder="0" style="border:0" allowfullscreen></iframe>			</div>
			<h3 class="tittle">Contact Form</h3>
			<form>
				<div class="contact-form2">
					<input type="text" value="Name" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'Name';}" required="">
					<input type="email" value="Email" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'Email';}" required="">
					<textarea type="text" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'Message...';}" required="">Message...</textarea>
					<input type="submit" value="Submit" >
				</div>
			</form>
		</div>
	</div>
	
<!-- //contact -->

@endsection 