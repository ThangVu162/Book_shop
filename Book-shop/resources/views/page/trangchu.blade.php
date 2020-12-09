@extends('master')
@section('content')
<div class="fullwidthbanner-container">
	<div class="fullwidthbanner">
		<div class="bannercontainer" >
			<div class="banner" >
				<div id="slides" class="carousel slide" data-ride="carousel" >
					<ul class="carousel-indicators" >
						<li data-target="#slides" data-slide-to="0" class="active" ></li>
						<li data-target="#slides" data-slide-to="1"></li>
						<li data-target="#slides" data-slide-to="2"></li>		
						<li data-target="#slides" data-slide-to="3"></li>
					</ul>
					<div class="carousel-inner">
						<div class="carousel-item active">
							<img src="source/storage/app/slide-image/5.png" style="width: 100% !important; height: 100% !important;">
						</div>
						@foreach($slide as $sl)
						<div class="carousel-item">
							<img src="source{{$sl->slide_image}}" style="width: 100% !important; height: 100% !important;">
						</div>
						@endforeach
					</div>
				</div>
			</div>
		</div>
	</div>
</div>

<div class="container">
	<div id="content" class="space-top-none">
		<div class="main-content">
			<div class="space60">&nbsp;</div>
			<div class="row">
				<div class="col-sm-12">
					<div class="beta-products-list">
						<h4>Danh Sách Sách</h4>
						<div class="beta-products-details">
							<p class="pull-left">Tìm thấy {{count($all_book)}} sản phẩm</p>
							<div class="clearfix"></div>
						</div>

						<div class="container-fluid padding">
							<div class="row padding">
								@foreach($new_book as $new)
								<div class="col-md-4">
									<div class="card" >
										@if ($new->cover_price > $new->price)
										<div class="ribbon-wrapper"><div class="ribbon sale">Sale</div></div>
										@endif
										<a href="{{route('chitietsanpham', $new->id)}}"><img class="card-img-top" src="source{{$new->book_image}}" height="350px"></a>
										<div class="card-body" href="{{route('chitietsanpham', $new->id)}}">
											<h4 class="card-title text-center" style=" overflow: hidden;text-overflow: ellipsis;-webkit-line-clamp: 3;display: -webkit-box;-webkit-box-orient: vertical;">{{$new->book_name}}</h4>
											<h5 class="flash-del text-center">{{number_format($new->cover_price)}}</h5> 
											<h5 class="flash-sale text-center">{{number_format($new->price)}}<small> <small>đồng</small></small></h5><br>
											<div class="single-item-caption">
												<a class="add-to-cart pull-left" href="{{route('themgiohang', $new->id)}}"><i class="fa fa-shopping-cart"></i></a>
												<a class="beta-btn primary" href="{{route('chitietsanpham', $new->id)}}">Chi Tiết<i class="fa fa-chevron-right"></i></a>
												<div class="clearfix"></div>
											</div>
										</div>
									</div>
								</div>
								@endforeach
								<div>
									{{$new_book->links()}}
								</div>
							</div>
						</div>
					</div> 
					<div class="space50">&nbsp;</div>
				</div>
			</div> 
		</div> 
	</div> 
</div>
@endsection