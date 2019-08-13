@extends('admin.layout.index')

@section('content')

<!-- Page Content -->
<div id="page-wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">Ngữ pháp
                    <small>Danh sách</small>
                    <button onclick="location.href='{{ url('admin/grammar/them') }}'" class="btn btn-default" style="float: right;">Thêm chủ đề ngữ pháp mới</button>
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
                        <th>Tên chủ để </th>
                        <th>Tên không dấu</th>
                        <th>Delete</th>
                        <th>Edit</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($grammar as $gm)
                    <tr class="odd gradeX" align="center">
                        <td>{{$gm->id}}</td>
                        <td>{{$gm->Ten}}</td>
                        <td>{{$gm->TenKhongDau}}</td>
                        <td class="center"><i class="fa fa-trash-o  fa-fw"></i><a href="admin/grammar/xoa/{{$gm->id}}"> Delete</a></td>
                        <td class="center"><i class="fa fa-pencil fa-fw"></i> <a href="admin/grammar/sua/{{$gm->id}}"> Edit</a></td>
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

