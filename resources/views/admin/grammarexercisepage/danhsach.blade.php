@extends('admin.layout.index')

@section('content')

<!-- Page Content -->
<div id="page-wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">Trang bài tập ngữ pháp
                    <small>Danh sách</small>
                    <button onclick="location.href='{{ url('admin/grammarexercisepage/them') }}'" class="btn btn-default" style="float: right;">Thêm trang bài tập mới</button>
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
                        <th>Tên trang bài học ngữ pháp</th>
                        <th>Câu hỏi</th>
                        <th>Kiểu câu hỏi</th>
                        <th>Câu trả lời</th>
                        <th>Delete</th>
                        <th>Edit</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($grammarexercisepage as $gep)
                        <tr class="odd gradeX" align="center">
                            <td>{{$gep->id}}</td>
                            <td>{{$gep->grammarlessonpage->TieuDe}}</td>
                            <td>{{$gep->Question}}</td>
                            <td>
                            @if($gep->QuestionType == 0)
                            {{"Typing"}}
                            @else
                            {{"True/Fale"}}
                            @endif
                            </td>
                            <td>{{$gep->Answer}}</td>
                            <td class="center"><i class="fa fa-trash-o  fa-fw"></i><a href="admin/grammarexercisepage/xoa/{{$gep->id}}">Delete</a></td>
                            <td class="center"><i class="fa fa-pencil fa-fw"></i> <a href="admin/grammarexercisepage/sua/{{$gep->id}}">Edit</a></td>
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