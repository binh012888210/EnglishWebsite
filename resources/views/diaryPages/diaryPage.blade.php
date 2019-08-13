@extends('layout.index')

@section('title')
   Diary
@endsection


@section('content')

  <!-- Page Content -->
<div class="container">

<div class="space20"></div>
    <div class="row">
        
    @include('diaryPages.filterMenu')

    @if(Auth::user())

    <div class="col-md-6 ">
        <div class="panel panel-default " style="padding-bottom:12px;" >
            <div class="panel-heading" >
                <h4 style="margin-top:2px; margin-bottom:2px;" >What's New - Share with us !!</h4>
            </div>
  
            <form action="diary/them" method="post"role="form">
            <input type="hidden" name="_token" value="{{csrf_token()}}">
            <div class="form-group" style="padding-top:13px;padding-right:13px;padding-left:13px;">
                <textarea name="NoiDung" class="form-control" placeholder="Update your status" rows="3"></textarea>
            </div>
            <button class="btn btn-default pull-right" style="margin-right:20px;" type="submit">Share</button>
            
            <div class="form-group" style="padding-left:10px;padding-right:10px;">
                <label class="radio-inline" ><b>Tag</b></label>
                <label class="radio-inline">
                    <input name="Tag" value="HocDuong" checked=""  type="radio" >Học đường
                </label>
                <label class="radio-inline">
                    <input name="Tag" value="XaHoi"  type="radio" >Xã hội
                </label>
                <label class="radio-inline">
                    <input name="Tag" value="CongNghe"  type="radio" >Công nghệ
                </label>
            </div>
            </form>
        </div>

    </div>    

    @endif

    <div class="col-md-6 ">
        @foreach ($diaryenglish as $de)
        <div class="panel panel-default" >
            <div class="panel-heading"  style="padding-bottom:1px;">
                
                <h3 style="margin-top:5px; margin-bottom:2px;">{{$de->user->name}}</h3>
                @if(Auth::user())
                    @if($de->user->id==Auth::user()->id||Auth::user()->quyen>=1)
                    <a href="xoadiary/{{$de->id}}" class="pull-right">Delete</a> 
                    @endif
                @endif
                <small><span class="glyphicon glyphicon-time"></span> Posted on:{{$de->created_at}}</small>
                
                <div class="clearfix"></div>
            </div>
            <div class="panel-body" style="padding-bottom:9px;">
                <p class="lead">{{$de->NoiDung}}</p>
                <p>Tag: {{$de->Tag}}</p>
                <p>
                    <i class="glyphicon glyphicon-ok"></i> {{$de->LikeNumber}} lượt thích
                    <i class="glyphicon glyphicon-remove"></i> {{$de->ReportNumber}} lượt báo cáo
                </p>
                <!-- <div class="clearfix"></div> -->
                <hr style="margin:6px;">
                <div class="input-group-btn " >
                <button class="btn btn-default pull-right btnRemove" value="{{$de->id}}"><i class="glyphicon glyphicon-remove"></i></button>
                <button class="btn btn-default pull-right btnOk" value="{{$de->id}}"><i class="glyphicon glyphicon-ok"></i></button>
                </div>
            
            </div>
        </div>
        @endforeach

    </div>

</div>
<!-- end Page Content -->


@endsection


@section('script')
    <script>
        $(document).ready(function(){
            $(document).delegate('.btnOk','click',function(){
                var id = $(this).val();
                $.get("ajax/addlikenumber/"+id);
                $(this).prop('disabled' , true);
                $(this).parent().find('.btnRemove').prop('disabled' , true);
            });
            $(document).delegate('.btnRemove','click',function(){
                var id = $(this).val();
                $.get("ajax/addreportnumber/"+id);
                $(this).prop('disabled' , true);
                $(this).parent().find('.btnOk').prop('disabled' , true);
            });
        })
    </script>
@endsection