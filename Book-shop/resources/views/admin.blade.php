@extends('master')
@section('content')

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>admin book</title>
	<link href='http://fonts.googleapis.com/css?family=Dosis:300,400' rel='stylesheet' type='text/css'>
	<link href='http://fonts.googleapis.com/css?family=Open+Sans:400,300' rel='stylesheet' type='text/css'>
	<link rel="stylesheet" href="http://netdna.bootstrapcdn.com/bootstrap/3.1.0/css/bootstrap.min.css">
	<link rel="stylesheet" href="source//dest/css/font-awesome.min.css">
	<link rel="stylesheet" href="source/assets/dest/vendors/colorbox/example3/colorbox.css">
	<link rel="stylesheet" href="source/assets/dest/rs-plugin/css/settings.css">
	<link rel="stylesheet" href="source/assets/dest/rs-plugin/css/responsive.css">
	<link rel="stylesheet" title="style" href="source/assets/dest/css/style.css">
	<link rel="stylesheet" href="source/assets/dest/css/animate.css">
	<link rel="stylesheet" title="style" href="source/assets/dest/css/huong-style.css">
	<link href="https://use.fontawesome.com/releases/v5.0.4/css/all.css" rel="stylesheet">

	<link rel="stylesheet"
	href="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">
	<script
	src="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js">
</script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js">
</script>

<link rel="stylesheet"
type="text/css" href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.css">
<script type="text/javascript"
charset="utf8" src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.js">
</script>

</head>
<body>
    <div class="header">

    </div>
	<div class="container-fluid">
        <h1 class="display-4 my-4 text-info">Quản lý sách</h1>
		@if(Session::has('thanhcong'))
		<div class="alert alert-success">{{Session::get('thanhcong')}}</div>
        @endif
        <button type="button" class="btn btn-primary" id="btnReloadData" style="padding-right: 10%;">Reload data</button>
		<div class="table-responsive-sm" style="font-size: 20px !important">
			<table class="table table-striped" id="users" style="width: 100%;">
				<thead>
					<tr id="list-header">
						<th scope="col">ID</th>
						<th scope="col" style="width: 20% !important; height: 50%;">Image</th>
						<th scope="col">Name</th>
						{{-- <th scope="col" style="width: 30%">Description</th> --}}
						<th scope="col">Author</th>
						<th scope="col">Category</th>
						<th scope="col">Price</th>
						<th scope="col">Cover_price</th>
						<th scope="col">Xóa</th>
						<th scope="col">Sửa</th>
					</tr>
					@foreach($bookk as $book)
					<td class="text-center align-middle">{{$book->id}}</td>
					<td class="text-center align-middle"><img src="source{{$book->book_image}}" style="height: 300px;"></td>
					<td class="text-center align-middle">{{$book->book_name}}</td>
					{{-- <td class="hidenn">{{$book->description}}</td> --}}
					<td class="text-center align-middle">{{$book->author_name}}</td>
					<td class="text-center align-middle">{{$book->category_name}}</td>
					<td class="text-center align-middle">{{number_format($book->price)}}<small> <small>đồng</small></small></td>
					<td class="text-center align-middle">{{number_format($book->cover_price)}}<small> <small>đồng</small></small></td>
					<td class="text-center align-middle"><a href="{{route('delete',$book->book_name)}}"><i class="fa fa-trash fa-2x"></i></a></td>
					<td class="text-center align-middle"><a href=""><i class="fa fa-edit fa-2x"></i></a></td>
				</tr>
				@endforeach

			</thead>
			<tbody>
			</tbody>
		</table>
		<div>
			{{$bookk->links()}}
		</div>

	</div>

</div>
</body>
</html>




@endsection




