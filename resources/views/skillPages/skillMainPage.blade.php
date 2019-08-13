@extends('layout.index')

@section('title')
   Learning skill
@endsection

@section('content')

<!-- Page Content -->
<div class="container">


<div class="space20"></div>

    <div class="row">
        
    @include('skillPages.skillMenu')

        <div class="col-md-9 ">
            <div class="panel panel-default">
                <div class="panel-heading " style="background-color:#337AB7; color:white">
                    <h2 style="margin-top:0px; margin-bottom:0px;">Danh sách các kỹ năng</h2>
                </div>

                <div class="panel-body" style="background-color:Moccasin;">

                    @foreach ($skill as $sk)
                    <div class="box" style="background-color:#fffce6 ;margin-bottom:20px;">
                        <div class="col-md-12" >
                            <h2 style="text-align:center"><b>{{$sk->Ten}}</b></h2>
                        </div>
                        
                        <div class='row ' style='margin-left: 10px;'>
                            <?php
                            $i=0;
                            foreach($sk->skilllesson as $sl) {
                            echo "<div class='col-md-6' style='margin-top: 10px;' >";
                                    echo '<a class="btn btn-success" href="skillsubpage/'."$sl->id".'">'."$sl->Ten ".'<span class="glyphicon glyphicon-hand-left"></span></a>';
                            echo '</div>';
                            $i++;
                            if ($i % 2 == 0) {echo '</div><div class="row " style="margin-left: 10px;">';}
                            }
                            ?>
                        </div>

                        <div class="break"></div>
                    </div>
                    @endforeach

                </div>
            </div>
        </div> 

    </div>

</div>
<!-- end Page Content -->

@endsection