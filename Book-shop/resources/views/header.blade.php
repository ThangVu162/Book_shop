<div id="header">
	<nav class="navbar navbar-expand-lg navbar-light bg-light sticky-top main-menu" style="background-color: #0277b8 !important;">
		<ul class="navbar-nav ml-auto l-inline ov">
			<li class="nav-item active">
				<a class="nav-link " href="{{route('trang-chu')}}">Trang chủ</a>
			</li>
			<li class="nav-item">
				<a class="nav-link" href="">Thể Loại</a>
				<ul class="sub-menu">
					@foreach($loai_SP as $loai)
					<li><a href="{{route('loaisanpham',$loai->id)}}" style="color: black !important;">{{$loai->category_name}}</a></li>
					@endforeach
				</ul>
			</li>
			<li class="nav-item">
				<a class="nav-link" href="{{route('gioithieu')}}">Giới thiệu</a>
			</li>
			<li class="nav-item">
				<a class="nav-link" href="{{route('lienhe')}}">Liên hệ</a>
			</li>
		</ul>
		{{-- <ul class="l-inline ov">
			<li><a href="index.html">Trang chủ</a></li>
			<li><a href="#">Sản phẩm</a>
				<ul class="sub-menu">

				</ul>
			</li>
			<li><a href="about.html">Giới thiệu</a></li>
			<li><a href="contacts.html">Liên hệ</a></li>
		</ul> --}}


		<div class="collapse navbar-collapse" id="navbarSupportedContent">
			<ul class="navbar-nav ml-auto">
				<li class="searchbar">
					<div class="beta-comp">
						<form role="search" method="get" id="searchform" action="{{route('search')}}">
							<input type="text" value="" name="key" placeholder="Nhập từ khóa..." />
							<button class="fa fa-search" type="submit" id="searchsubmit"></button>
						</form>
					</div>
				</li>
			</ul>
		</div>
		{{-- <div class="collapse navbar-collapse" id="navbarSupportedContent">
			<ul class="navbar-nav ml-auto">
				<li class="nav-item active">
					<a class="nav-link" href="#"><i class="fa fa-user"></i>Tài Khoản <span class="sr-only"></span></a>
				</li>
				<li class="nav-item">
					<a class="nav-link" href="logout.php"><i class="fa fa-sign-out-alt"></i>Đăng Xuất</a>
				</li>
				<ul class="navbar-nav ml-auto l-inline ov">
					<li class="nav-item">
						<a class="nav-link"><i class="fa fa-shopping-cart"></i> Giỏ hàng <i class="fa fa-chevron-down"></i></a>
						<ul class="sub-menu">
							<li><a href="product_type.html">Sản phẩm 1</a></li>
							<li><a href="product_type.html">Sản phẩm 2</a></li>
							<li><a href="product_type.html">Sản phẩm 4</a></li>
						</ul>
					</li></ul>
				</ul>
			</div> --}}

			<ul class="navbar-nav ml-auto l-inline ov">
				@if(!Auth::check())
				<li class="nav-item">
					<a class="nav-link" href="{{route('dangnhap')}}"><i class="fa fa-user"></i>Đăng Nhập <span class="sr-only"></span></a>
				</li>
				<li class="nav-item">
					<a class="nav-link" href="{{route('dangky')}}"><i class="fa fa-sign-out-alt"></i>Đăng Ký</a>
				</li>
				@else
				<li class="nav-item">
					<a class="nav-link" href=""><i class="fa fa-user"></i>{{Auth::user()->name}}<span class="sr-only"></span></a>
				</li>
				<li class="nav-item">
					<a class="nav-link" href="{{route('dangxuat')}}"><i class="fa fa-sign-out-alt"></i>Đăng Xuất</a>
				</li>
				@endif


				{{-- <li class="nav-item">
					<a class="nav-link" href="#"><i class="fa fa-shopping-cart"></i> Giỏ hàng <i class="fa fa-chevron-down"></i></a>
					<ul class="sub-menu">
						<div>
							<p>asdsfdfglkjhgfsadghjkgfhgdsfsghjkjgfhdsafdghhhsdadghjjgtdfghjgfds</p>
						</div>

					</ul>
				</li> --}}
				@if(Session::has('cart'))
				<div class="beta-comp" style="color: white;">
					<div class="cart" style="border: none !important;">
						<div class="beta-select"><i class="fa fa-shopping-cart"></i> Giỏ hàng (@if(Session::has('cart')) {{Session('cart')->totalQty}} @else echo '0' @endif)<i class="fa fa-chevron-down"></i></div>
						<div class="beta-dropdown cart-body">
							@foreach($book_cart as $b_cart)
							<div class="cart-item" style="max-width: 400px !important;">
								<a class="cart-item-delete" href="{{route('xoagiohang',$b_cart['item']['id'])}}"><i class="fa fa-times"></i></a>
								<div class="media">
									<a class="pull-left" href="#"><img src="source{{$b_cart['item']['book_image']}}" alt=""></a>
									<div class="media-body">
										<span class="cart-item-title" style="color: black;">{{$b_cart['item']['book_name']}}</span>
										<span class="cart-item-amount"style="color: black;"><span>{{number_format($b_cart['item']['price'])}}</span><small> x {{$b_cart['qty']}}</small></span>
									</div>
								</div>
							</div>
							@endforeach
							<div class="cart-caption">
								<div class="cart-total text-right" style="color: black;">Tổng tiền: <span class="cart-total-value">{{number_format(Session('cart')->totalPrice)}} <small>đ</small></span></div>
								<div class="clearfix"></div>

								<div class="center">
									<div class="space10">&nbsp;</div>
									<a href="checkout.html" class="beta-btn primary text-center">Đặt hàng <i class="fa fa-chevron-right"></i></a>
								</div>
							</div>
						</div>
					</div>
				</div>
				@endif

			</ul>

		</nav>
	</div>
