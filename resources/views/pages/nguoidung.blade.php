@extends('layout.index')

@section('content')
<div id="page-wrapper">
	<div class="container-fluid">
		<div class="row">
			<div class="col-lg-12">
				<h1 class="page-header">User
					<small>{{$nguoidung->name}}</small>
				</h1>
			</div>
			<!-- /.col-lg-12 -->
			<div class="col-lg-7" style="padding-bottom:120px">
				@if(count($errors) > 0)	
				<div class="alert alert-danger">
					@foreach($errors->all() as $err)
						{{$err}}<br>
					@endforeach
				</div>
				@endif
				
				@if(session('thongbao'))
	            <div class="alert alert-success">
	                {{session('thongbao')}}
	            </div>
	            @endif
				<form action="nguoidung" method="POST" >
					@csrf
					<div class="form-group">
						<label>Họ tên</label>
						<input class="form-control" name="name" placeholder="Please Enter Category Name" value="{{$nguoidung->name}}" />
					</div>
					<div class="form-group">
						<label>Email</label>
						<input type="email" class="form-control" name="email" placeholder="Nhập địa chỉ email" value="{{$nguoidung->email}}" readonly="" />
					</div>
					<div class="form-group">
						<input type="checkbox" name="changePassword" id="changePassword">
						<label>Đổi mật khẩu</label>
					</div>
					<div class="form-group">
						<label>Password</label>
						<input type="password" class="form-control password" name="password" placeholder="Nhập mật khẩu" disabled="" />
					</div>
					<div class="form-group">
						<label>Password again</label>
						<input type="password" class="form-control password" name="passwordAgain" placeholder="Nhập lại mật khẩu" disabled="" />
					</div>
					
					<button type="submit" class="btn btn-default">Sửa</button>
					<button type="reset" class="btn btn-default">Làm mới</button>
				</form>
			</div>
		</div>
		<!-- /.row -->
	</div>
	<!-- /.container-fluid -->
</div>

@endsection

@section('script')
	<script>
		$(document).ready(function(){
			$("#changePassword").change(function(){
				if($(this).is(":checked"))
				{
					$(".password").removeAttr('disabled');
				}
				else
				{
					$(".password").attr('disabled','');
				}
			});
		});
	</script>
@endsection