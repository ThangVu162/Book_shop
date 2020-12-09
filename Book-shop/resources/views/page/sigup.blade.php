@extends('master')
@section('content')
<div class="container">
	<div name="content">

		<form action="{{route('dangky')}}" method="post" class="beta-form-checkout">
			<input type="hidden" name="_token" value="{{csrf_token()}}">
			
			<div class="row justify-content-center">
				@if(count($errors)>0)
				<div class="alert alert-danger">
					@foreach($errors->all() as $err)
					{{$err}}<br>
					@endforeach
				</div>
				@endif
				
			</div>
			<div class="row justify-content-center">
				<div class="col-sm-6">
					<h4>Đăng kí</h4>
					<div class="space20">&nbsp;</div>


					<div class="form-block">
						<label for="email">Email*</label>
						<input type="email" name="email" required>
					</div>

					<div class="form-block">
						<label for="your_last_name">Họ Tên*</label>
						<input type="text" name="name" required>
					</div>

					<div class="form-block">
						<label for="adress">Địa Chỉ*</label>
						<input type="text" name="adress" required>
					</div>


					<div class="form-block">
						<label for="phone">Điện Thoại*</label>
						<input type="text" name="phone" required>
					</div>
					<div class="form-block">
						<label for="phone">Mật Khẩu*</label>
						<input type="password" name="password" required>
					</div>
					<div class="form-block">
						<label for="phone">Nhập lịa Mật Khẩu*</label>
						<input type="password" name="re_password" required>
					</div>
					<div class="form-block">
						<button type="submit" class="btn btn-primary">Đăng Ký</button>
					</div>
				</div>
			</div>
		</form>
	</div>
</div>
@endsection