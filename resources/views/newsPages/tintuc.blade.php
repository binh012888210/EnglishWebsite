 @extends('layout.index')

 @section('title')
    Reading News
@endsection

 @section('content')
 
    <!-- Page Content -->
    <div class="container" style="min-height: 450px; ">
        <div class="row">

            <!-- Blog Post Content Column -->
            <div class="col-lg-9">

                <!-- Blog Post -->

                <!-- Title -->
                <h1>{{$tintuc->TieuDe}}</h1>

                
                <p class="lead">
                    {!!$tintuc->TomTat!!}

                </p>

                <!-- Date/Time -->
                <p><span class="glyphicon glyphicon-time"></span> Posted on:
                    {{$tintuc->created_at}}</p>
                <hr>


                <!-- Preview Image -->
                <img width="900"class="img-responsive" src="upload/tintuc/{{$tintuc->Hinh}}" alt="">

                <hr>

                <!-- Post Content -->
                <p class="lead">
                    {!!$tintuc->NoiDung!!}

                </p>

                <hr>

                <p class="lead">
                    Phần bình luận

                </p>

                <!-- Blog Comments -->
                @if(Auth::user())
                <!-- Comments Form -->
                <div class="well">
                    @if(session('thogbao'))
                        {{session('thongbao')}}
                    @endif
                    <h4>Viết bình luận ...<span class="glyphicon glyphicon-pencil"></span></h4>
                    <form action="comment/{{$tintuc->id}}" method="post"role="form">
                        <input type="hidden" name="_token" value="{{csrf_token()}}">
                        <div class="form-group">
                            <textarea class="form-control" name="NoiDung" rows="3"></textarea>
                        </div>
                        <button type="submit" class="btn btn-primary">Gửi</button>
                    </form>
                </div>

                <hr>
                @endif

                <!-- Posted Comments -->

                @foreach($tintuc->comment as $cm)
                <!-- Comment -->
                <div class="media">
                    <div class="media-body">
                        <h4 class="media-heading">{{$cm->user->name}}
                            <small>{{$cm->created_at}}</small>
                        </h4>
                       {{$cm->NoiDung}}
                    </div>
                </div>
                @endforeach

            </div>

            <!-- Blog Sidebar Widgets Column -->
            <div class="col-md-3">

                <div class="panel panel-default">
                    <div class="panel-heading"><b>Tin liên quan</b></div>
                    <div class="panel-body">
                    @foreach($tinlienquan as $tt)
                        <!-- item -->
                        <div class="row" style="margin-top: 10px;">
                            <div class="col-md-5">
                                <a href="tintuc/{{$tt->id}}/{{$tt->TieuDeKhongDau}}.html">
                                    <img class="img-responsive" 
                                    src="upload/tintuc/{{$tt->Hinh}}" alt="">
                                </a>
                            </div>
                            <div class="col-md-7">
                                <a href="tintuc/{{$tt->id}}/{{$tt->TieuDeKhongDau}}.html"><b>{!!$tt->TieuDe!!}</b></a>
                            </div>
                            <small style="padding-left:5px">{!!$tt->TomTat!!}</small>
                            <div class="break"></div>
                        </div>
                        <!-- end item -->
                    @endforeach
                    </div>
                </div>

                
            </div>

        </div>
        <!-- /.row -->
    </div>
    <!-- end Page Content -->


    @endsection