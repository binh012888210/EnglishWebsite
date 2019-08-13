@extends('layout.index')

@section('title')
   Learning grammar
@endsection


 @section('content')
 
 <!-- Page Content -->
 <div class="container">
        <div class="row">
            @include('grammarPages.grammarMenu')

            <!-- Blog Post Content Column -->
            <div class="col-lg-9">
                <div class="panel panel-default" style="background-color:LightGoldenRodYellow ;">

                    <div class="panel-heading " style="background-color:#337AB7; color:white">
                        <h2 style="margin-top:0px; margin-bottom:0px;">Bài học: {{$grammarlessonpage->TieuDe}}</h2>
                    </div>
                    <!-- Blog Post -->
                    <div class="panel-body">
                        <div style="background-color:white;padding: 10px;">
                            <!-- Author -->
                            <div class="col-lg-6" >
                                by {{$grammarlessonpage->user->name}}
                            </div>

                            <!-- Date/Time -->
                            <div class="col-lg-6"><span class="glyphicon glyphicon-time"></span> Posted on:
                                {{$grammarlessonpage->created_at}}</div>

                            <hr>

                            <!-- Post Content -->
                            <p 
                                class="lead"> {!!$grammarlessonpage->NoiDung!!} 
                            </p>
                            <p >
                                <button onclick="location.href='grammarexercisepage/<?php echo $grammarlessonpage->id ?>/<?php echo $grammarlessonpage->TieuDeKhongDau ?>.html'" class="btn btn-default" style="float: right;">Làm bài tập</button>
                            </p>

                            <hr>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- /.row -->
    </div>
    <!-- end Page Content -->


    @endsection
