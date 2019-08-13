@extends('admin.layout.index')

@section('content')

<!-- Page Content -->
<div id="page-wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">Bài học ngữ pháp
                    <small>Danh sách</small>
                    <button onclick="location.href='{{ url('admin/grammarlesson/them') }}'" class="btn btn-default" style="float: right;">Thêm bài học mới</button>
                </h1>
            </div>
            <!-- /.col-lg-12 -->
            @if(session('thongbao'))
                    <div class = "alert alert-success">
                        {{session('thongbao')}}
                    </div>
            @endif
            <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                <thead>
                    <tr align="center">
                        <th>ID</th>
                        <th>Tên bài học</th>
                        <th>Tên không dấu</th>
                        <th>Tên chủ đề ngữ pháp</th>
                        <th>Delete</th>
                        <th>Edit</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($grammarlesson as $gl)
                    <tr class="odd gradeX" align="center">
                        <td>{{$gl->id}}</td>
                        <td>{{$gl->Ten}}</td>
                        <td>{{$gl->TenKhongDau}}</td>
                        <td>{{$gl->grammar->Ten}}</td>
                        <td class="center"><i class="fa fa-trash-o  fa-fw"></i><a href="admin/grammarlesson/xoa/{{$gl->id}}"> Delete</a></td>
                        <td class="center"><i class="fa fa-pencil fa-fw"></i> <a href="admin/grammarlesson/sua/{{$gl->id}}">Edit</a></td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        <!-- /.row -->
    </div>
    <!-- /.container-fluid -->
</div>
<!-- /#page-wrapper -->

@endsection