@extends('admin.layout.index')
 
@section('content')
<!-- Page Content -->
<div id="page-wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">Tin tuc
                    <small>{{$tintuc->TieuDe}}</small>
                </h1>
            </div>
            <!-- /.col-lg-12 -->
            <div class="col-lg-7" style="padding-bottom:120px">

                @if(count($errors)>0)
                    <div class="alert alert-danger">
                        @foreach($errors->all() as $err)
                            {{$err}}<br>
                        @endforeach
                    </div>
                @endif

                @if(session('thongbao'))
                    <div class ="alert alert-success">
                        {{session('thongbao')}}
                    </div>
                @endif

                <form action="admin/tintuc/sua/{{$tintuc->id}}" method="POST" enctype="multipart/form-data">
                <input type="hidden" name="_token" value ="{{csrf_token()}}"/>
                    <div class="form-group">
                        <label>The loai</label>
                        <select class="form-control" name="TheLoai" id="TheLoai">
                            @foreach($theloai as $tl)
                            <option 

                            @if($tintuc->loaitin->theloai->id == $tl->id)
                            {{"selected"}}
                            @endif

                            value="{{$tl->id}}">{{$tl->Ten}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Loai tin</label>
                        <select class="form-control" name="LoaiTin" id="LoaiTin">
                            @foreach($loaitin as $lt)
                            <option
                            
                            @if($tintuc->loaitin->id == $lt->id)
                            {{"selected"}}
                            @endif

                             value="{{$lt->id}}">{{$lt->Ten}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Tieu de</label>
                        <input required class="form-control" name="TieuDe" placeholder="Nhap tieu de" value="{{$tintuc->TieuDe}}"/>
                    </div>
                    <div class="form-group">
                        <label>Tom tat </label>
                        <textarea name="TomTat" id="demo" class="form-control ckeditor" rows="3">{{$tintuc->TomTat}}</textarea>
                    </div>
                    <div class="form-group">
                        <label>Noi dung </label>
                        <textarea name="NoiDung" id="demo" class="form-control ckeditor" rows="3">{{$tintuc->NoiDung}}</textarea>
                    </div>
                    <div class="form-group">
                        <label>Hinh anh </label>
                        <input name="XoaHinh" class=" btn btn-default btnXoa" value="Xóa hình"/> Nhấn f5 để hủy lệnh xóa
                        <p>
                        <img width="400px" src="upload/tintuc/{{$tintuc->Hinh}}">
                        </p>
                        <input type="file" name="Hinh" class="form-control"/>
                    </div>
                    <div class="form-group">
                        <label>Noi bat</label>
                        <label class="radio-inline">
                            <input name="NoiBat" value="1"
                            @if($tintuc->NoiBat==1)
                            {{"checked"}}
                            @endif
                            type="radio">Co noi bat
                        </label>
                        <label class="radio-inline">
                            <input name="NoiBat" value="0"
                            @if($tintuc->NoiBat==0)
                            {{"checked"}}
                            @endif
                            type="radio">Khong noi bat
                        </label>
                    </div>
                    <button type="submit" class="btn btn-default">Sua</button>
                    <button type="reset" class="btn btn-default">Lam moi</button>
                <form>
            </div>
        </div>
        <!-- /.row -->
        <div class="row col-lg-7">
            <div class="col-lg-7">
                <h1 class="page-header">Binh luan
                    <small>danh sach</small>
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
                        <th>Nguoi dung</th>
                        <th>Noi dung</th>
                        <th>Ngay dang</th>
                        <th>Delete</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($tintuc->comment as $cm)
                        <tr class="odd gradeX" align="center">
                            <td>{{$cm->id}}</td>
                            <td>{{$cm->user->name}}</td>
                            <td>{{$cm->NoiDung}}</td>
                            <td>{{$cm->created_at}}</td>
                            <td class="center"><i class="fa fa-trash-o  fa-fw"></i><a href="admin/tintuc/xoacomment/{{$cm->id}}/{{$cm->id}}">Delete</a></td>
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

@section('script')
    <script>
        $(document).ready(function(){
            $("#TheLoai").change(function(){
                var idTheLoai = $(this).val();
                $.get("admin/ajax/loaitin/"+idTheLoai,function(data){
                    $("#LoaiTin").html(data);
                })
            });
            $(".btnXoa").click(function(){
                $(".btnXoa").val('Deleted');
            });
        })
    </script>
@endsection