<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Gạch Hạ Long | Quản lý</title>
    <link rel="stylesheet" href="{{ asset('admin/css/style-login.css') }}">
</head>

<body>
	<div class="container">
		<div class="profile">
			<button class="profile__avatar" id="toggleProfile">
				<img src="{{ asset('images/logo.jpg') }}" alt="Avatar" />
			</button>
			<form action="{{ URL::route('post_login') }}" method="POST">
				{{ csrf_field() }}
    			<div class="profile__form">
    				<div class="profile__fields">
    					<div class="field">
    						<input type="text" id="fieldUser" class="input" name="email" value="{{ old('email') }}" required pattern=.*\S.* /> 
    						<label for="fieldUser" class="label">Email</label>
    					</div>
    					<div class="field">
    						<input type="password" id="fieldPassword" class="input" name="password" value="{{ old('password') }}" required pattern=.*\S.* /> 
    						<label for="fieldPassword" class="label">Password</label>
    					</div>
    					<div class="profile__footer">
    						<button class="btn login_btn">Login</button>
    					</div>
    				</div>
    			</div>
			</form>
		</div>
		@include('admin.partials.notification')
	</div>

	<script src="{{ asset('admin/js/js-login.js') }}"></script>

</body>
</html>