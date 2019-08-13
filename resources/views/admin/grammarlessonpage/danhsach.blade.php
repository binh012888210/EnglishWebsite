@extends('admin.layout.index')

@section('content')

<!-- Page Content -->
<div id="page-wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">Trang bài học ngữ pháp
                    <small>Danh sách</small>
                    <button onclick="location.href='{{ url('admin/grammarlessonpage/them') }}'" class="btn btn-default" style="float: right;">Thêm trang bài học mới</button>
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
                        <th>Tieu de</th>
                        <th>Tom tat</th>
                        <th>Tên chủ đề ngữ pháp</th>
                        <th>Tên bài học</th>
                        <th>Tên người tạo</th>
                        <th>So luot xem</th>
                        <th>Delete</th>
                        <th>Edit</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($grammarlessonpage as $glp)
                        <tr class="odd gradeX" align="center">
                            <td>{{$glp->id}}</td>
                            <td>{{$glp->TieuDe}}</td>
                            <td>{!!$glp->TomTat!!}</td>
                            <td>{{$glp->grammarlesson->grammar->Ten}}</td>
                            <td>{{$glp->grammarlesson->Ten}}</td>
                            <td>{{$glp->user->name}}</td>
                            <td>{{$glp->SoLuotXem}}</td>
                            <td class="center"><i class="fa fa-trash-o  fa-fw"></i><a href="admin/grammarlessonpage/xoa/{{$glp->id}}">Delete</a></td>
                            <td class="center"><i class="fa fa-pencil fa-fw"></i> <a href="admin/grammarlessonpage/sua/{{$glp->id}}">Edit</a></td>
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