@extends('master')
@section('content')
<div class="container">
	<div id="content" class="space-top-none">
		<div class="main-content">
			<div class="space60">&nbsp;</div>
			<div class="row">
				<div class="col-sm-3">
					<ul class="aside-menu">
						@foreach($loai_SP as $loai)
						<li><a href="{{route('loaisanpham',$loai->id)}}" style="color: black !important;">{{$loai->category_name}}</a></li>
						@endforeach
					</ul>
				</div>
				<div class="col-sm-9">
					<div class="beta-products-list">
						<h4>{{$theloai->category_name}}</h4>
						<div class="beta-products-details">
							<p class="pull-left">Tìm thấy {{count($all_sp_theoloai)}} sản phẩm</p>
							<div class="clearfix"></div>
						</div>
						<div class="row">
							@foreach($sp_theoloai as $sp)
							<div class="col-md-4">
								<div class="card" >
									@if ($sp->cover_price > $sp->price)
									<div class="ribbon-wrapper"><div class="ribbon sale">Sale</div></div>
									@endif
									<a href="{{route('chitietsanpham',$sp->id)}}"><img class="card-img-top" src="source{{$sp->book_image}}" height="350px"></a>
									<div class="card-body" href="{{route('chitietsanpham',$sp->id)}}">
										<h4 class="card-title" style=" overflow: hidden;text-overflow: ellipsis;-webkit-line-clamp: 1;display: -webkit-box;-webkit-box-orient: vertical;">{{$sp->book_name}}</h4>
										<h5 class="flash-del text-center">{{number_format($sp->cover_price)}}</h5> 
										<h5 class="flash-sale text-center">{{number_format($sp->price)}}<small> <small>đồng</small></small></h5><br>
										<div class="single-item-caption">
											<a class="add-to-cart pull-left" href="shopping_cart.html"><i class="fa fa-shopping-cart"></i></a>
											<a class="beta-btn primary" href="{{route('chitietsanpham',$sp->id)}}">Xem Thêm <i class="fa fa-chevron-right"></i></a>
											<div class="clearfix"></div>
										</div>
									</div>
								</div>
							</div>
							@endforeach
							<div>
								{{$sp_theoloai->links()}}
							</div>
						</div>
					</div>

					<div class="space50">&nbsp;</div>
				</div>
			</div>
		</div>
		@endsection
