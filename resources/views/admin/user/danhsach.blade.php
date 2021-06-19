@extends('admin.layout.index')

@section('content')
<div id="page-wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">User
                    <small>List</small>
                </h1>
            </div>
            <!-- /.col-lg-12 -->
            @if(session('thongbao'))
                <div class="alert alert-success">
                    {{session('thongbao')}}
                </div>
            @endif
            
            <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                <thead>
                    <tr align="center">
                        <th>ID</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Level</th>
                        <th>Delete</th>
                        <th>Edit</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($user as $rows)
                    <tr class="odd gradeX" align="center">
                        <td>{{$rows->id}}</td>
                        <td>{{$rows->name}}</td>
                        <td>{{$rows->email}}</td>
                        <td>
                         @if($rows->quyen==1)
                            {{"Admin"}}
                        @else
                            {{"Thường"}}
                        @endif
                    </td>

                    <td class="center"><i class="fa fa-trash-o  fa-fw"></i><a href="admin/user/xoa/{{$rows->id}}"> Delete</a></td>
                    <td class="center"><i class="fa fa-pencil fa-fw"></i> <a href="admin/user/sua/{{$rows->id}}">Edit</a></td>
                    </tr>
                    @endforeach
            </tbody>
        </table>
    </div>
    <!-- /.row -->
</div>
<!-- /.container-fluid -->
</div>
@endsection