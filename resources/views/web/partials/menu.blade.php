<!-- banner -->
<div class="ban-top">
	<div class="container">
		<div class="top_nav_left">
			<nav class="navbar navbar-default">
				<div class="container-fluid">
					<!-- Brand and toggle get grouped for better mobile display -->
					<div class="navbar-header">
						<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
							<span class="sr-only">Toggle navigation</span> 
							<span class="icon-bar"></span> 
							<span class="icon-bar"></span> 
							<span class="icon-bar"></span>
						</button>
					</div>
					<!-- Collect the nav links, forms, and other content for toggling -->
					<div class="collapse navbar-collapse menu--shylock" id="bs-example-navbar-collapse-1">
						<ul class="nav navbar-nav menu__list">
							<li class="active menu__item menu__item--current">
								<a class="menu__link" href="{{ URL::route('main') }}">Trang chủ 
									<span class="sr-only">(current)</span>
								</a>
							</li>
							<li class="dropdown menu__item">
								<a href="#" class="dropdown-toggle menu__link" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Giới thiệu 
									<span class="caret"></span>
								</a>
								<ul class="dropdown-menu multi-column multi-column-dropdown columns-12">
									@foreach($introduces as $introduce)
										<li><a href="{{ URL::route('introduce_detail', [$introduce->slug, $introduce->id]) }}">{{ $introduce->title }}</a></li>
									@endforeach
								</ul>
							</li>
							<li class="dropdown menu__item">
								<a href="#" class="dropdown-toggle menu__link" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Sản phẩm 
									<span class="caret"></span>
								</a>
								<ul class="dropdown-menu multi-column multi-column-dropdown columns-12">
									@foreach($menus as $menu)
										@foreach($menu as $k => $m)
											@if($m->id == $m->parent_id)
												<li>
													<a href="{{ URL::route('product', [$m->slug, $m->id]) }}"><i class="glyphicon glyphicon-plus-sign" aria-hidden="true"></i>&nbsp;&nbsp;{{ $m->name }}</a>
												</li>
											@else
												<li>
													<a href="{{ URL::route('product', [$m->slug, $m->id]) }}"><i class="glyphicon glyphicon-minus" aria-hidden="true"></i>&nbsp;&nbsp;{{ $m->name }}</a>
												</li>
											@endif
										@endforeach
									@endforeach
								</ul>
							</li>
							<li class="menu__item">
								<a class="menu__link" href="{{ URL::route('document') }}">Tài liệu</a>
							</li>
							<li class="menu__item">
								<a class="menu__link" href="{{ URL::route('contact') }}">Liên hệ</a>
							</li>
						</ul>
					</div>
				</div>
			</nav>
		</div>
		<div class="clearfix"></div>
	</div>
</div>
<!-- //banner-top -->