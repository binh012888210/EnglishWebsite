@extends('admin.layout.index')
 
@section('content')
<!-- Page Content -->
<div id="page-wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">Trang bài học kỹ năng
                    <small>{{$skilllessonpage->TieuDe}}</small>
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

                <form action="admin/skilllessonpage/sua/{{$skilllessonpage->id}}" method="POST" enctype="multipart/form-data">
                <input type="hidden" name="_token" value ="{{csrf_token()}}"/>
                   
                    <div class="form-group">
                        <label>Tên kỹ năng</label>
                        <select class="form-control" name="Skill" id="Skill">
                            @foreach($skill as $sk)
                            <option 

                            @if($skilllessonpage->skilllesson->skill->id == $sk->id)
                            {{"selected"}}
                            @endif

                            value="{{$sk->id}}">{{$sk->Ten}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Tên bài học</label>
                        <select class="form-control" name="SkillLesson" id="SkillLesson">
                            @foreach($skilllesson as $sl)
                            <option
                            
                            @if($skilllessonpage->skilllesson->id == $sl->id)
                            {{"selected"}}
                            @endif

                             value="{{$sl->id}}">{{$sl->Ten}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Tieu de</label>
                        <input class="form-control" name="TieuDe" placeholder="Nhap tieu de" value="{{$skilllessonpage->TieuDe}}"/>
                    </div>
                    <div class="form-group">
                        <label>Tom tat </label>
                        <textarea name="TomTat" id="demo" class="form-control ckeditor" rows="3">{{$skilllessonpage->TomTat}}</textarea>
                    </div>
                    <div class="form-group">
                        <label>Noi dung </label>
                        <textarea name="NoiDung" id="demo" class="form-control ckeditor" rows="3">{{$skilllessonpage->NoiDung}}</textarea>
                    </div>
                    <p><b>Phần dữ liệu media</b></p>
                    <div class="form-group">
                        <label>Hinh anh </label>
                        @if(!empty($skilllessonpage->Hinh))
                        
                        <p>
                        <img width="400px" src="upload/skilllesson/hinh/{{$skilllessonpage->Hinh}}">
                        </p>
                        
                        @else
                        <p>Không có dữ liệu</p>
                        @endif
                    </div>
                    <div class="form-group">
                        <label>Video </label>
                        @if(!empty($skilllessonpage->Video))
                        
                        <div class="embed-responsive embed-responsive-4by3">
                        <iframe class="embed-responsive-item" src="upload/skilllesson/video/{{$skilllessonpage->Video}}"></iframe>
                        </div>
                        
                        @else
                        <p>Không có dữ liệu</p>
                        @endif
                    </div>
                    <div class="form-group">
                        <label>Video Online </label>
                        @if(!empty($skilllessonpage->VideoOnline))
                        
                        <input name="VideoOnline" class="form-control" value="{{$skilllessonpage->VideoOnline}}" placeholder="Copy embed link from youtube" disabled/>
                        @else
                        <p>Không có dữ liệu</p>
                        @endif
                    </div>
                    <div class="form-group">
                        <label>Audio </label>
                        @if(!empty($skilllessonpage->Audio))
                        
                            <audio controls>
                            <source src="upload/skilllesson/audio/{{$skilllessonpage->Audio}}">
                            Your browser does not support the audio element.
                            </audio>
                        
                        @else
                        <p>Không có dữ liệu</p>
                        @endif
                    </div>
                    @if(!empty($skilllessonpage->VideoOnline)||!empty($skilllessonpage->Video)||!empty($skilllessonpage->Hinh)||!empty($skilllessonpage->Audio))
                    
                    <div class="form-group">
                        <p><b>Vui lòng xóa toàn bộ dữ liệu media trước khi sửa</b></p>
                        <input name="DeleteMediaData" class="btn btn-default btnXoa" value="Delete" readonly/> Nhấn f5 để hủy / Nhấn sửa để chấp nhận
                    </div>
                    
                    @else
                    
                    <div class="form-group">
                        <label>Media file</label>
                        <label class="radio-inline">
                            <input name="media"  value="0" checked=""  type="radio" class="rButton">None
                        </label>
                        <label class="radio-inline">
                            <input name="media" value="1"  type="radio" class="rButton">Hình ảnh
                        </label>
                        <label class="radio-inline">
                            <input name="media" value="2"  type="radio" class="rButton">Upload video
                        </label>
                        <label class="radio-inline">
                            <input name="media" value="3"  type="radio" class="rButton">Embed video youtube
                        </label>
                        <label class="radio-inline">
                            <input name="media" value="4"  type="radio" class="rButton">Audio
                        </label>
                       
                    </div>
                    <div class="form-group">
                        <label>Hinh </label>
                        <input type="file" id="idHinh" name="Hinh" class="form-control" disabled/>
                    </div>
                    <div class="form-group">
                        <label>Video </label>
                        <input type="file" id="idVideo" name="Video" class="form-control" disabled/>
                    </div>
                    <div class="form-group">
                        <label>Video Online </label>
                        <input name="VideoOnline" id="idVideoOnline" class="form-control" placeholder="Copy embed link from youtube" disabled/>
                    </div>
                    <div class="form-group">
                        <label>Audio </label>
                        <input type="file" id="idAudio" name="Audio" class="form-control"  disabled/>
                    </div>
                    
                    @endif
                    
                    <button type="submit" class="btn btn-default">Sua</button>
                    <button type="reset" class="btn btn-default">Lam moi</button>
                <form>
            </div>
        </div>
    </div>
    <!-- /.container-fluid -->
</div>
<!-- /#page-wrapper -->
@endsection

@section('script')
    <script>
        $(document).ready(function(){
            $("#Skill").change(function(){
                var idSkill = $(this).val();

                $.get("admin/ajax/skilllesson/"+idSkill,function(data){
                    $("#SkillLesson").html(data);
                })
            });
            $(".rButton").change(function(){
                switch($(this).val()) {
                case '0' :
                    disabledAll();
                    break;
                case '1' :
                    disabledAll();
                    $('#idHinh').prop('disabled' , false);
                    break;
                case '2' :
                    disabledAll();
                    $('#idVideo').prop('disabled' , false);
                    break;
                case '3' :
                    disabledAll();
                    $('#idVideoOnline').prop('disabled' , false);
                    break;
                case '4' :
                    disabledAll();
                    $('#idAudio').prop('disabled' , false);
                    break;
                }   
            });
            function disabledAll()
            {
                $('#idHinh').prop('disabled' , true);
                $('#idHinh').val('');
                $('#idVideo').prop('disabled' , true);
                $('#idVideo').val('');
                $('#idVideoOnline').prop('disabled' , true);
                $('#idVideoOnline').val('');
                $('#idAudio').prop('disabled' , true);
                $('#idAudio').val('');
            };
            $(".btnXoa").click(function(){
                $(".btnXoa").val('Deleted');
            });
            
        })
    </script>
@endsection