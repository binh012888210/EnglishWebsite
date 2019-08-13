@extends('layout.index')

@section('title')
    Reading News
@endsection

@section('content')

  <!-- Page Content -->
  <div class="container" style="min-height: 450px; ">
        <div class="row">
            
        @include('newsPages.newsMenu')

            <div class="col-md-9 ">
                <div class="panel panel-default">
                    <div class="panel-heading" style="background-color:#337AB7; color:white;">
                        <h4><b>{{$loaitin->Ten}}</b></h4>
                    </div>
                    <div class="panel-body" style="background-color:Moccasin;"> 
                    @foreach ($tintuc as $tt)
                    <div class="box" style='background-color:#fffce6 ;margin-bottom:20px;'>
                        <div class="col-md-3">

                            <a href="tintuc/{{$tt->id}}/{{$tt->TieuDeKhongDau}}.html">
                                <br>
                                <img width="200px" height="200px" class="img-responsive" src="upload/tintuc/{{$tt->Hinh}}" alt="">
                            </a>
                        </div>

                        <div class="col-md-9">
                            <h3>{{$tt->TieuDe}}</h3>
                            <p>{!!$tt->TomTat!!}</p>
                            <a class="btn btn-primary" href="tintuc/{{$tt->id}}/{{$tt->TieuDeKhongDau}}.html">Read <span class="glyphicon glyphicon-chevron-right"></span></a>
                        </div>
                        <div class="break"></div>
                    </div>
                    @endforeach
                    </div>
                    <div style="text-align:center;background-color:#e9ebee;">
                        {{$tintuc->links()}}
                    </div>
                </div>
            </div> 

        </div>

    </div>
    <!-- end Page Content -->


@endsection