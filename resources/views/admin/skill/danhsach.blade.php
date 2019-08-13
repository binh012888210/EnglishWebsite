@extends('admin.layout.index')

@section('content')

<!-- Page Content -->
<div id="page-wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">Kỹ năng
                    <small>Danh sách</small>
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
                        <th>Tên kỹ năng</th>
                        <th>Tên không dấu</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($skill as $sk)
                    <tr class="odd gradeX" align="center">
                        <td>{{$sk->id}}</td>
                        <td>{{$sk->Ten}}</td>
                        <td>{{$sk->TenKhongDau}}</td>
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