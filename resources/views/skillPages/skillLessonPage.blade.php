 @extends('layout.index')

 @section('title')
    Learning skill
@endsection

 @section('content')
 
 <!-- Page Content -->
 <div class="container">
    <div class="row">
        @include('skillPages.skillMenu')
        <div class="col-md-9 ">
            <div class="panel panel-default" style='padding-bottom: 5px;'>
                <div class="panel-heading " style="background-color:#337AB7; color:white">
                    <h3 style="margin-top:0px; margin-bottom:0px;">Điểm bạn đạt được trong bài tập hiện tại</h3>
                </div>
                <!-- Blog Post -->
                <div class="panel-body" style='padding-right: 7px;'>
                    
                    <!-- Point -->
                    <p><span class="glyphicon glyphicon-book" ></span> Skill point:
                        <span id="skillNewPoint">0</span></p>
                
                </div>
            </div>
        </div>

        <!-- Blog Post Content Column -->
        <div class="col-lg-9">
            <div class="panel panel-default" style="background-color:LightGoldenRodYellow ;">

                <div class="panel-heading " style="background-color:#337AB7; color:white">
                    <h2 style="margin-top:0px; margin-bottom:0px;">Bài học: {{$skilllessonpage->TieuDe}}</h2>
                </div>
                <!-- Blog Post -->
                <div class="panel-body">
                    <div style="background-color:white;padding: 10px;">
                        
                        <!-- Author -->
                        <div class="col-lg-6" >
                            by {{$skilllessonpage->user->name}}
                        </div>

                        <!-- Date/Time -->
                        <div class="col-lg-6">
                            <span class="glyphicon glyphicon-time"></span> 
                            Posted on: {{$skilllessonpage->created_at}}
                        </div>
                        <hr>

                        <!-- Post Content -->
                        <p class="lead"> 
                            {!!$skilllessonpage->NoiDung!!} 
                        </p>
                        <!-- Post Image -->
                        @if(!empty($skilllessonpage->Hinh))
                        <p class="lead"> 
                            <img class="img-responsive" src="upload/skilllesson/hinh/{{$skilllessonpage->Hinh}}" alt="" height="500" width="500">
                        </p>
                        <hr>
                        @endif

                        @if(!empty($skilllessonpage->Video))
                        <div class="embed-responsive embed-responsive-16by9">
                            <iframe class="embed-responsive-item" src="upload/skilllesson/video/{{$skilllessonpage->Video}}" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                        </div>
                        <hr>
                        @endif

                        @if(!empty($skilllessonpage->VideoOnline))
                        <div class="embed-responsive embed-responsive-16by9">
                            {!!$skilllessonpage->VideoOnline!!}
                        </div>
                        <hr>
                        @endif

                        @if(!empty($skilllessonpage->Audio))
                        <div class="lead">
                        <audio controls>
                            <source src="upload/skilllesson/audio/{{$skilllessonpage->Audio}}">
                            Your browser does not support the audio element.
                            </audio>
                        </div>
                        <hr>
                        @endif
                        
                    
               
                    <!-- Title -->
                    <input type="hidden" name="_token" value="{{csrf_token()}}"/>
                    @foreach ($skillexercisepage as $sep)
                        <!-- Post Content -->
                        <div class="box">
                            <div class="inputAnswer" style="background-color:#fffce6;padding: 10px;">
                                <div class="col-md-12" style="margin-left: 20px;" >
                                    <h2>Question: {{$sep->Question}}</h2>
                                </div>
                                <div class="form-group" style='margin: 5px;'>
                                    <div class="col-md-10" >
                                    @if($sep->QuestionType==1)
                                        <input required maxlength="50" type="text"  name="answer" class="form-control answer" placeholder="Nhập vào True hoặc False">
                                    @else
                                        <input required maxlength="50" type="text"  name="answer" class="form-control answer" placeholder="Nhập vào đáp án">
                                    @endif
                                        
                                    </div>
                                    <div class="col-md-2" >
                                        <button type="button" class="btn btn-default checkbtn" value="{{$sep->Answer}}" >Check</button>
                                    </div>
                                </div>

                                <div class="form-group" style='margin: 5px;'>
                                    <div class="col-md-10" >
                                        <input readonly type="text"  name="key" class="form-control key" placeholder="Đáp án">
                                    </div>
                                    <div class="col-md-2" >
                                        <button type="button" class="btn btn-default answerbtn" value="{{$sep->Answer}}">Answer</button>
                                    </div>
                                </div>
                                <div class="break"></div>
                            </div>
                        </div>
                    @endforeach
                    </div>
                </div>
            </div>
        </div>
        
    </div>
    <!-- /.row -->
</div>
<!-- end Page Content -->


@endsection



@section('script')
    <script>
        $(document).ready(function(){
            var $skillpoint = 0;
            $('.inputAnswer').delegate('.answerbtn','click',function(){
                var realanswer = $(this).val();
                $(this).parent().parent().find('.key').val(realanswer); 
                $(this).prop('disabled' , true);
            });

            $('.inputAnswer').delegate('.checkbtn','click',function(){
                var realanswer = $(this).val().toLowerCase();
                var useranswer = $(this).parent().parent().find('.answer').val().toLowerCase();
                if(realanswer==useranswer)
                {
                    $(this).parent().parent().parent().css('background-color', 'green');
                    $.get("ajax/addorminuspoint/2/1");
                    $skillpoint++;
                }
                else
                {
                    $(this).parent().parent().parent().css('background-color', 'red');
                    $.get("ajax/addorminuspoint/2/-1");
                    $skillpoint--;
                }
                $("#skillNewPoint").text($skillpoint); 
                $(this).prop('disabled' , true);
            });
        })
    </script>
@endsection