@extends('layout.index')

@section('title')
   Learning grammar
@endsection


@section('content')

<!-- Page Content -->
<div class="container">
    <div class="box">
        @include('grammarPages.grammarMenu')
        <!-- Blog Post Content Column -->
        <div class="col-md-9 ">
            <div class="panel panel-default" style='padding-bottom: 5px;'>
                <div class="panel-heading " style="background-color:#337AB7; color:white">
                    <h3 style="margin-top:0px; margin-bottom:0px;">Điểm bạn đạt được trong bài tập hiện tại</h3>
                </div>
                <!-- Blog Post -->
                <div class="panel-body" style='padding-right: 7px;'>
                    
                    <!-- Point -->
                    <p><span class="glyphicon glyphicon-book" ></span> Grammar point:
                        <span id="grammarNewPoint">0</span></p>
                
                </div>
            </div>
        </div>
        <div class="col-lg-9" >
            <div class="panel panel-default">
                <div class="panel-heading " style="background-color:#337AB7; color:white">
                    <h2 style="margin-top:0px; margin-bottom:0px;">Bài tập: {{$grammarlessonpage->TieuDe}}</h2>
                </div>
                <!-- Blog Post -->
                <div class="panel-body" style="background-color:PaleGoldenRod;">
                    <!-- Title -->
                    <input type="hidden" name="_token" value="{{csrf_token()}}"/>
                    @foreach ($grammarexercisepage as $gep)
                        <!-- Post Content -->
                        <div class="box">
                            <div class="inputAnswer" style="background-color:LemonChiffon;padding: 10px;">
                                <div class="col-md-12" style="margin-left: 20px;" >
                                    <h2>Question: {{$gep->Question}}</h2>
                                </div>
                                <div class="form-group" style='margin: 5px;'>
                                    <div class="col-md-10" >
                                    @if($gep->QuestionType==1)
                                        <input required maxlength="50" type="text"  name="answer" class="form-control answer" placeholder="Nhập vào True hoặc False">
                                    @else
                                        <input required maxlength="50" type="text"  name="answer" class="form-control answer" placeholder="Nhập vào đáp án">
                                    @endif
                                        
                                    </div>
                                    <div class="col-md-2" >
                                        <button type="button" class="btn btn-default checkbtn" value="{{$gep->Answer}}" >Check</button>
                                    </div>
                                </div>

                                <div class="form-group" style='margin: 5px;'>
                                    <div class="col-md-10" >
                                        <input readonly type="text"  name="key" class="form-control key" placeholder="Đáp án">
                                    </div>
                                    <div class="col-md-2" >
                                        <button type="button" class="btn btn-default answerbtn" value="{{$gep->Answer}}">Answer</button>
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
    <!-- /.row -->
</div>
<!-- end Page Content -->


@endsection


@section('script')
    <script>
        $(document).ready(function(){
            var $grammarpoint = 0;
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
                    $.get("ajax/addorminuspoint/1/1");
                    $grammarpoint++;
                }
                else
                {
                    $(this).parent().parent().parent().css('background-color', 'red');
                    $.get("ajax/addorminuspoint/1/-1");
                    $grammarpoint--;
                }
                $("#grammarNewPoint").text($grammarpoint); 
                $(this).prop('disabled' , true);
            });
        })
    </script>
@endsection