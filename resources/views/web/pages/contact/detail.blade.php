@extends('web.layout') 
@section('title', 'Liên hệ')
@section('robots')
	<meta name="robots" content="noindex" />
@endsection
@section('css')
	<link href="{{ asset('css/contact.css') }}" rel="stylesheet" type="text/css" media="all" />
@endsection
@section('js')

@endsection

@section('content')
<!-- contact -->
	<div class="contact">
		<div class="container">
			<div class="row">
				<section id="contact-form">
					<div class="container">
						<div class="row">
							<div class="col-md-7">
								<div class="map wow fadeInDown animated" data-wow-delay=".1s">
									<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3731.7880364153457!2d105.83207011430285!3d20.718830203663686!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3135ca634e3cb287%3A0x5e59de04b3493f8f!2zQ2jhu6MgQ2jDoXk!5e0!3m2!1svi!2s!4v1515246403394" frameborder="0" allowfullscreen></iframe>
								</div>
							</div>

							<div class="col-md-5" id="contact-section">
								<div id="contact-info">
									<h4>Thông tin liên hệ</h4>
									<div class="col-sm-12">
										<i class="glyphicon glyphicon-map-marker" aria-hidden="true"></i>
										<span id="label">Địa chỉ: </span>
										<span id="content">Chợ Cháy - Chẩn Kỳ - Trung Tú - Ứng Hoà - Hà Nội</span>
									</div>
									<div class="col-sm-12">
										<i class="glyphicon glyphicon-earphone" aria-hidden="true"></i>
										<span id="label">Điện thoại: </span>
										<span id="content">092.812.0298</span>
									</div>
									<div class="col-sm-12">
										<i class="glyphicon glyphicon-envelope" aria-hidden="true"></i>
										<span id="label">Email: </span>
										<span id="content"><a href="mailto:tandinhphat2018@gmail.com">tandinhphat2018@gmail.com</a></span>
									</div>
									<div class="clearfix"> </div>
								</div>
								<hr>
								<div id="form-contact">
									<h4>Để lại lời nhắn</h4>
									<form action="{{ URL::route('feedback') }}" method="POST">
										{!! csrf_field() !!}
										<div class="form-group">
											<input type="text" class="form-control" name="name" value="{{ old('name') }}" placeholder="Họ và tên">
										</div>
										@if ($errors->has('name'))
											<span class="error-message help-block">
												<strong>{{ $errors->first('name') }}</strong>
											</span>
										@endif
										<div class="form-group">
											<input type="email" class="form-control" name="email" value="{{ old('email') }}" placeholder="E-mail">
										</div>
										@if ($errors->has('email'))
											<span class="error-message help-block">
												<strong>{{ $errors->first('email') }}</strong>
											</span>
										@endif
										<div class="form-group">
											<input type="tel" class="form-control" name="phone" value="{{ old('phone') }}" placeholder="Số điện thoại">
										</div>
										@if ($errors->has('phone'))
											<span class="error-message help-block">
												<strong>{{ $errors->first('phone') }}</strong>
											</span>
										@endif
										<div class="form-group">
											<textarea class="form-control" name="content" rows="3" placeholder="Nội dung">{{ old('content') }}</textarea>
										</div>
										@if ($errors->has('content'))
											<span class="error-message help-block">
												<strong>{{ $errors->first('content') }}</strong>
											</span>
										@endif
										<div class="text-right">
											<button class="btn" type="submit" id="contact-button">
												<i class="glyphicon glyphicon-send" aria-hidden="true"></i>&nbsp;&nbsp;Gửi
											</button>
										</div>
									</form>
								</div>
							</div>
						</div>
					</div>
				</section>
			</div>
		</div>
	</div>
	
<!-- //contact -->

@endsection 