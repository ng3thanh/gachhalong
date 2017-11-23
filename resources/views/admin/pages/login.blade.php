<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Gạch Hạ Long | Quản lý</title>
    <link rel="stylesheet" href="{{ asset('admin/css/style-login.css') }}">
</head>

<body>
	<!--Google Font - Work Sans-->
	<link href='https://fonts.googleapis.com/css?family=Work+Sans:400,300,700' rel='stylesheet' type='text/css'>

	<div class="container">
		<div class="profile">
			<button class="profile__avatar" id="toggleProfile">
				<img src="https://pbs.twimg.com/profile_images/554631714970955776/uzPxPPtr.jpeg" alt="Avatar" />
			</button>
			<form action="{{ URL::route('post_login') }}" method="POST">
				{{ csrf_field() }}
    			<div class="profile__form">
    				<div class="profile__fields">
    					<div class="field">
    						<input type="text" id="fieldUser" class="input" name="username" value="{{ old('username') }}" required pattern=.*\S.* /> 
    						<label for="fieldUser" class="label">Username</label>
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