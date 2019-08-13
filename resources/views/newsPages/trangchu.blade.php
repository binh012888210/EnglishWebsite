@extends('layout.index')

@section('title')
    Reading News
@endsection


@section('content')

<!-- Page Content -->
<div class="container" style="min-height: 450px; ">

<div class="space20"></div>


<div class="row main-left">

    @include('newsPages.newsMenu')

    <div class="col-md-9">
        <div class="panel panel-default">            
            <div class="panel-heading" style="background-color:#337AB7; color:white;" >
                <h2 style="margin-top:0px; margin-bottom:0px;">Reading News</h2>
            </div>

            <div class="panel-body" style="background-color:Moccasin;">
                @foreach($theloai as $tl)
                    @if(count($tl->loaitin)>0)
                    <!-- item -->
                    <div class="box" style="background-color:#fffce6 ;margin-bottom:20px;">
                        <div class="col-md-12">
                            <h3 style="background-color:#f6e1bc ;margin-top:15px">
                               <a href="theloai/{{$tl->id}}"> <b>{{$tl->Ten}}</b></a> | 	
                                @foreach($tl->loaitin as $lt)
                                <small>
                                <b><a href="loaitin/{{$lt->id}}/{{$lt->TenKhongDau}}.html">{{$lt->Ten}}</a> - </b>
                                </small>
                                @endforeach
                            
                            </h3>
                            <?php
                            $data =  $tl->tintuc->where('NoiBat',1)->sortByDesc('
                            create_at')->take(5);
                            $tin1 = $data->shift();
                            ?>
                        </div>
                        
                        @if(empty($tin1))
                        <div class="col-md-6">
                            <h3 style="margin-top:20px">
                               No data
                            </h3>
                        </div>
                        @else
                        <div class="col-md-8 border-right" style="margin-top:5px">
                            <div class="col-md-5" style="padding-top:20px">
                                <a href="tintuc/{{$tin1['id']}}/{{$tin1['TieuDeKhongDau']}}.html">
                                    <img height="100%" width="100%" class="img-responsive" src="upload/tintuc/{{$tin1['Hinh']}}" alt="">
                                </a>
                            </div>

                            <div class="col-md-7">
                                <h3><a href="tintuc/{{$tin1['id']}}/{{$tin1['TieuDeKhongDau']}}.html">{!!$tin1['TieuDe']!!}</h3>
                                <p><a href="tintuc/{{$tin1['id']}}/{{$tin1['TieuDeKhongDau']}}.html">{!!$tin1['TomTat']!!}</p>
                                @if(!empty($tin1))
                                <a class="btn btn-primary" href="tintuc/{{$tin1['id']}}/{{$tin1['TieuDeKhongDau']}}.html">Read <span class="glyphicon glyphicon-chevron-right"></span></a>
                                @endif
                            </div>

                        </div>
                        

                        <div class="col-md-4" style="margin-top:5px">
                            @foreach ($data->all() as $tintuc)
                            <a href="tintuc/{{$tintuc['id']}}/{{$tintuc['TieuDeKhongDau']}}.html">
                                <h4>
                                    <span class="glyphicon glyphicon-list-alt"></span>
                                   {{$tintuc['TieuDe']}}
                                </h4>
                            </a>
                            @endforeach
                        </div>
                        @endif
                        <div class="break"></div>
                    </div>
                    <!-- end item -->
                    @endif
                @endforeach
            </div>
        </div>
    </div>
</div>
<!-- /.row -->
</div>
<!-- end Page Content -->

@endsection

