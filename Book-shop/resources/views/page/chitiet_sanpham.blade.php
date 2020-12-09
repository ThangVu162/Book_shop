@extends('master')
@section('content')
<div class="container">
	<div id="content">
		<div class="row">
			<div class="col-sm-9">

				<div class="row">
					<div class="col-sm-4">
						<img src="source{{$viewsach->book_image}}" alt="">
					</div>
					<div class="col-sm-8">
						<div class="single-item-body">
							<p class="single-item-title"><h3>{{$viewsach->book_name}}</h3></p>
							<p class="single-item-price">Tác giả: 
								<a href="" style="color: blue;">{{$author->author_name}}</a>
							</p>
							<p class="single-item-price flash-del">Giá bìa: 
								<span>{{number_format($viewsach->cover_price)}}</span>
							</p>
							<p class="single-item-price">Giá bán: 
								<span class="flash-sale">{{number_format($viewsach->price)}} <small>đồng</small></span>
							</p>
							<p class="single-item-price">Tiết kiệm: 
								<span style="color: green">{{number_format($viewsach->cover_price - $viewsach->price)}} <small>đồng</small></span>
							</p>
						</div>

						<p>Số Lượng:</p>
							<div class="single-item-options">
								<select class="wc-select" name="color">
									<option value="1">1</option>
									<option value="2">2</option>
									<option value="3">3</option>
									<option value="4">4</option>
									<option value="5">5</option>
								</select>
								<a class="add-to-cart" href="#"><i class="fa fa-shopping-cart"></i></a>
								<div class="clearfix"></div>
							</div>

						<div class="clearfix"></div>
						<div class="space20">&nbsp;</div>
					</div>
				</div>

				<div class="space40">&nbsp;</div>
				
			</div>
			<div class="space50">&nbsp;</div>
		</div>
	</div>
	<div class="woocommerce-tabs">
		<ul class="tabs">
			<li><a href="#tab-description">Giới thiệu</a></li>
			<li><a href="#tab-reviews">Đánh giá (0)</a></li>
			<li><a href="#tab-author">Tác giả</a></li>
		</ul>

		<div class="panel" id="tab-description">
			@php
			echo $viewsach->description;
			@endphp
		</div>
		<div class="panel" id="tab-reviews">
			<p>No Reviews</p>
		</div>
		<div class="panel" id="tab-author">
			@php
			echo $author->author_info;
			@endphp
		</div>
	</div>
</div>
@endsection