@extends('admin.layout.index')
 
@section('content')
<!-- Page Content -->
<div id="page-wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">Trang bài tập kỹ năng
                    <small>Thêm trang bài tập mới</small>
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

                <form action="admin/skillexercisepage/them" method="POST" enctype="multipart/form-data">
                    <input type="hidden" name="_token" value="{{csrf_token()}}"/>
                    <div class="form-group">
                        <label>Tên chủ đề ngữ pháp</label>
                        <select class="form-control" name="Skill" id="Skill">
                            @foreach($skill as $sk)
                            <option value="{{$sk->id}}">{{$sk->Ten}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Tên bài học kỹ năng</label>
                        <select class="form-control" name="SkillLesson" id="SkillLesson">
                            @foreach($skilllesson as $sl)
                            <option value="{{$sl->id}}">{{$sl->Ten}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Tên trang bài học kỹ năng</label>
                        <select class="form-control" name="SkillLessonPage" id="SkillLessonPage">
                            @foreach($skilllessonpage as $slp)
                            <option value="{{$slp->id}}">{{$slp->TieuDe}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-lg-12 col-sm-12" align="right">
                        <div class="form-group">
                            <button type="submit" class="btn btn-default">Thêm</button>
                            <button type="reset" class="btn btn-default">Làm mới</button>
                        </div>
                    </div>
                   
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
                                    <td>
                                    <select name="questiontype[]"class="form-control qtype">
                                        <option value="0" selected="true">Typing</option>
                                        <option value="1">True/False</option> </select>
                                    </td>
                                    <td><input required maxlength="100" type="text" name="question[]" class="form-control question"></td>
                                    <td><input required maxlength="100" type="text" name="answer[]" class="form-control answer"></td>
                                    <td><a class="btn btn-danger remove buttonX"><i class="glyphicon glyphicon-remove"></i></a></td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </form>
            </div>
        </div>
        <!-- /.row -->
    </div>
    <!-- /.container-fluid -->
</div>
<!-- /#page-wrapper -->
@endsection

@section('script')
    <script>
        $(document).ready(function(){
            
            $('.addRow').on('click',function(){
                var l=$('tbody tr').length;
                if(l>=20)
                {
                    alert('Tối đa 20 câu hỏi');
                }
                addRow();
            });
            function addRow()
            {
                var tr = '<tr>'+
                        '<td>'+
                            '<select name="questiontype[]"class="form-control qtype">'+
                            '<option value="0" selected="true">Typing</option>'+
                            '<option value="1">True/False</option> </select>'+
                        '<td><input required maxlength="100" type="text" name="question[]" class="form-control question"></td>'+
                        '<td><input required maxlength="100" type="text" name="answer[]" class="form-control answer"></td>'+
                        '<td><a class="btn btn-danger remove buttonX"><i class="glyphicon glyphicon-remove"></i></a></td>'+
                    '</tr>';
                $('tbody').append(tr);  
            };
            $('tbody').delegate('.qtype','change',function(){
                var tr = $(this).parent().parent();
                var id = tr.find('.qtype').val();
                if(id==1)
                {
                    tr.find('.answer').parent().remove();
                    tr.find('.buttonX').parent().remove();
                    var td = 
                        '<td>'+
                            '<select required maxlength="100" name="answer[]"class="form-control answer">'+
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
                        '<td><input required type="text" name="answer[]" class="form-control answer"></td>'+
                        '<td><a class="btn btn-danger remove buttonX"><i class="glyphicon glyphicon-remove"></i></a></td>';
                    tr.append(td);  
                }
            });//need to do this because handle call after init
            $(document).on('click','.remove',function(){
                var l=$('tbody tr').length;
                if(l==1)
                {
                    alert('Khong the xoa dong cuoi');
                }
                else
                    $(this).parent().parent().remove();
            });//need to do this because handle call after init
            
            $("#Skill").change(function(){
                var idSkill = $(this).val();
                $.get("admin/ajax/skilllesson/"+idSkill,function(data){
                    $("#SkillLesson").html(data);
                })
            });
            $("#SkillLesson").change(function(){
                var idSkillLesson = $(this).val();
                $.get("admin/ajax/skilllessonpage/"+idSkillLesson,function(data){
                    $("#SkillLessonPage").html(data);
                })
            });
        });
    </script>
@endsection