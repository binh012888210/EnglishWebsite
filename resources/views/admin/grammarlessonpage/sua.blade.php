@extends('admin.layout.index')
 
@section('content')
<!-- Page Content -->
<div id="page-wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">Trang bài học ngữ pháp
                    <small>{{$grammarlessonpage->TieuDe}}</small>
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

                <form action="admin/grammarlessonpage/sua/{{$grammarlessonpage->id}}" method="POST" enctype="multipart/form-data">
                <input type="hidden" name="_token" value ="{{csrf_token()}}"/>
                   
                    <div class="form-group">
                        <label>Tên chủ đề ngữ pháp</label>
                        <select class="form-control" name="Grammar" id="Grammar">
                            @foreach($grammar as $gm)
                            <option 

                            @if($grammarlessonpage->grammarlesson->grammar->id == $gm->id)
                            {{"selected"}}
                            @endif

                            value="{{$gm->id}}">{{$gm->Ten}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Tên bài học</label>
                        <select class="form-control" name="GrammarLesson" id="GrammarLesson">
                            @foreach($grammarlesson as $gl)
                            <option
                            
                            @if($grammarlessonpage->grammarlesson->id == $gl->id)
                            {{"selected"}}
                            @endif

                             value="{{$gl->id}}">{{$gl->Ten}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Tieu de</label>
                        <input class="form-control" name="TieuDe" placeholder="Nhap tieu de" value="{{$grammarlessonpage->TieuDe}}"/>
                    </div>
                    <div class="form-group">
                        <label>Tom tat </label>
                        <textarea name="TomTat" id="demo" class="form-control ckeditor" rows="3">{{$grammarlessonpage->TomTat}}</textarea>
                    </div>
                    <div class="form-group">
                        <label>Noi dung </label>
                        <textarea name="NoiDung" id="demo" class="form-control ckeditor" rows="3">{{$grammarlessonpage->NoiDung}}</textarea>
                    </div>
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
            $("#Grammar").change(function(){
                var idGrammar = $(this).val();
                $.get("admin/ajax/grammarlesson/"+idGrammar,function(data){
                    $("#GrammarLesson").html(data);
                })
            })
        })
    </script>
@endsection