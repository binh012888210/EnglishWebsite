@extends('admin.layout.index')
 
@section('content')
<!-- Page Content -->
<div id="page-wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">Trang bài tập kỹ năng
                    <small>{{$skillexercisepage->skilllessonpage->TieuDe}}</small>
                </h1>
            </div>
            <!-- /.col-lg-12 -->
            <div class="col-lg-8" style="padding-bottom:120px">

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

                <form action="admin/skillexercisepage/sua/{{$skillexercisepage->id}}" method="POST" enctype="multipart/form-data">
                <input type="hidden" name="_token" value ="{{csrf_token()}}"/>
                   
                    <div class="col-lg-12 col-sm-12">
                        <table class="table table-striped table-bordered table-hover" >
                            <thead>
                                <th>Kiểu câu hỏi</th>
                                <th>Câu hỏi</th>
                                <th>Câu trả lời</th>
                                <th style="text-align:center"><a class="addRow"><i class="glyphicon glyphicon-plus"></i></a></th>
                            </thead>
                            <tbody>
                                <tr>
                                    @if($skillexercisepage->QuestionType==0)
                                    <td>
                                    <select name="questiontype"class="form-control qtype">
                                        <option value="0" selected="true">Typing</option>
                                        <option value="1">True/False</option> </select>
                                    </td>
                                    <td><input required maxlength="100" type="text" value="{{$skillexercisepage->Question}}" name="question" class="form-control question"></td>
                                    <td><input required maxlength="100" type="text" value="{{$skillexercisepage->Answer}}" name="answer" class="form-control answer"></td>
                                    @endif
                                    @if($skillexercisepage->QuestionType==1)
                                    <td>
                                    <select name="questiontype"class="form-control qtype">
                                        <option value="0">Typing</option>
                                        <option value="1" selected="true">True/False</option> </select>
                                    </td>
                                    <td><input required maxlength="100" type="text" value="{{$skillexercisepage->Question}}" name="question" class="form-control question"></td>
                                    <td>
                                        
                                        <select name="answer"class="form-control answer">
                                            @if($skillexercisepage->Answer==True)
                                            <option value="True" selected="true">True</option>
                                            <option value="False" >False</option>
                                            @else
                                            <option value="True" >True</option>
                                            <option value="False" selected="true" >False</option> 
                                            @endif
                                            </select>
                                    </td>
                                    @endif
                                    <td><a class="btn btn-danger remove buttonX"><i class="glyphicon glyphicon-remove"></i></a></td>
                                </tr>
                            </tbody>
                        </table>
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
            $('tbody').delegate('.qtype','change',function(){
                var tr = $(this).parent().parent();
                var id = tr.find('.qtype').val();
                if(id==1)
                {
                    tr.find('.answer').parent().remove();
                    tr.find('.buttonX').parent().remove();
                    var td = 
                        '<td>'+
                            '<select required name="answer"class="form-control answer">'+
                            '<option value="" selected="true" disabled="true">True or False</option>'+
                            '<option value="True">True</option>'+
                            '<option value="False">False</option></td> </select>'+
                        '<td><a class="btn btn-danger remove buttonX"><i class="glyphicon glyphicon-remove"></i></a></td>';
                    tr.append(td);  
                }
                if(id==0)
                {
                    tr.find('.answer').parent().remove();
                    tr.find('.buttonX').parent().remove();
                    var td = 
                        '<td><input maxlength="100" required type="text" name="answer" class="form-control answer"></td>'+
                        '<td><a class="btn btn-danger remove buttonX"><i class="glyphicon glyphicon-remove"></i></a></td>';
                    tr.append(td);  
                }
            });//need to do this because handle call after init
        });
    </script>
@endsection