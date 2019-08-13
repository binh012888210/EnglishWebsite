@extends('admin.layout.index')

@section('content')

<!-- Page Content -->
<div id="page-wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">Trang bài tập kỹ năng
                    <small>Danh sách</small>
                    <button onclick="location.href='{{ url('admin/skillexercisepage/them') }}'" class="btn btn-default" style="float: right;">Thêm trang bài tập mới</button>
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
                        <th>Tên trang bài học kỹ năng</th>
                        <th>Câu hỏi</th>
                        <th>Kiểu câu hỏi</th>
                        <th>Câu trả lời</th>
                        <th>Delete</th>
                        <th>Edit</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($skillexercisepage as $sep)
                        <tr class="odd gradeX" align="center">
                            <td>{{$sep->id}}</td>
                            <td>{{$sep->skilllessonpage->TieuDe}}</td>
                            <td>{{$sep->Question}}</td>
                            <td>
                            @if($sep->QuestionType == 0)
                            {{"Typing"}}
                            @else
                            {{"True/Fale"}}
                            @endif
                            </td>
                            <td>{{$sep->Answer}}</td>
                            <td class="center"><i class="fa fa-trash-o  fa-fw"></i><a href="admin/skillexercisepage/xoa/{{$sep->id}}">Delete</a></td>
                            <td class="center"><i class="fa fa-pencil fa-fw"></i> <a href="admin/skillexercisepage/sua/{{$sep->id}}">Edit</a></td>
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