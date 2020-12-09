@extends('master')
@section('content')
<div class="container">
	<div id="content">
		<form action="{{route('dangnhap')}}" method="POST" class="beta-form-checkout">
			<input type="hidden" name="_token" value="{{csrf_token()}}">
			<div class="row justify-content-center">
				@if(Session::has('flag'))
				<div class="alert alert-{{Session::get('flag')}}">{{Session::get('thongbao')}} </div>
				@endif
				@if(Session::has('thanhcong'))
				<div class="alert alert-success">{{Session::get('thanhcong')}}</div>
				@endif
			</div>

			<div class="row justify-content-center">

				<div class="col-sm-6">
					<h4>Đăng nhập</h4>
					<div class="space20">&nbsp;</div>


					<div class="form-block">
						<label for="email">Email*</label>
						<input type="email" name="email" required>
					</div>
					<div class="form-block">
						<label for="phone">Mật Khẩu*</label>
						<input type="password" name="password" required>
					</div>
					<div class="form-block">
						<button type="submit" class="btn btn-primary">Đăng Nhập</button>
					</div>
				</div>
			</div>
		</form>
	</div>
</div>
@endsection
