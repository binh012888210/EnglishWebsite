@extends('layout.index')

@section('title')
   Learning skill
@endsection

@section('content')

  <!-- Page Content -->
  <div class="container" style="min-height: 450px; ">

<div class="space20"></div>
    <div class="row">
        
    @include('skillPages.skillMenu')

        <div class="col-md-9 ">
            <div class="panel panel-default">
                <div class="panel-heading" style="background-color:#337AB7; color:white;">
                    <h4><b>Danh sách các bài học của kỹ năng {{$skilllesson->Ten}}</b></h4>
                </div>
                <div class="panel-body" style="background-color:Moccasin;">
                    @foreach ($skilllessonpage as $slp)
                    <div class="box" style='background-color:#fffce6 ;margin-bottom:20px;'>
                        <div class='row ' style='padding-right: 30px;padding-left: 30px;'>
                            <h3>{{$slp->TieuDe}}</h3>
                            <p>{!!$slp->TomTat!!}</p>
                            <a class="btn btn-primary" href="skillpage/{{$slp->id}}/{{$slp->TieuDeKhongDau}}.html">Learn <span class="glyphicon glyphicon-chevron-right"></span></a>
                        </div>
                        <div class="break"></div>
                    </div>
                    @endforeach
                </div>
                
                <div style="text-align:center">
                    {{$skilllessonpage->links()}}
                </div>
            </div>
        </div> 
    </div>
</div>
<!-- end Page Content -->


@endsection