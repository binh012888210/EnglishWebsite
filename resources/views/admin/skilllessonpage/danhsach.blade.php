@extends('admin.layout.index')

@section('content')

<!-- Page Content -->
<div id="page-wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">Trang bài học kỹ năng
                    <small>Danh sách</small>
                    <button onclick="location.href='{{ url('admin/skilllessonpage/them') }}'" class="btn btn-default" style="float: right;">Thêm trang bài học mới</button>
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
                        <th>Tên kỷ năng</th>
                        <th>Tên bài học</th>
                        <th>Tên người tạo</th>
                        <th>So luot xem</th>
                        <th>Delete</th>
                        <th>Edit</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($skilllessonpage as $slp)
                        <tr class="odd gradeX" align="center">
                            <td>{{$slp->id}}</td>
                            <td>{{$slp->TieuDe}}</td>
                            <td>{!!$slp->TomTat!!}</td>
                            <td>{{$slp->skilllesson->skill->Ten}}</td>
                            <td>{{$slp->skilllesson->Ten}}</td>
                            <td>{{$slp->user->name}}</td>
                            <td>{{$slp->SoLuotXem}}</td>
                            <td class="center"><i class="fa fa-trash-o  fa-fw"></i><a href="admin/skilllessonpage/xoa/{{$slp->id}}">Delete</a></td>
                            <td class="center"><i class="fa fa-pencil fa-fw"></i> <a href="admin/skilllessonpage/sua/{{$slp->id}}">Edit</a></td>
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