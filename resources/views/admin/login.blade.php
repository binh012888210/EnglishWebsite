@extends('layout.index')


@section('content')
<!-- Page Content -->
<div class="container" style="height:400px; ">
    <div class="row" >
        <div class="col-md-4 col-md-offset-4">
            <div class="login-panel panel panel-default" style="margin-top:60px">
                <div class="panel-heading">
                    <h3 class="panel-title">Hi Admin - Please Sign In</h3>
                </div>
                <div class="panel-body">
                @if(count($errors)>0)
                <div class="alert alert-danger">
                    @foreach($errors->all() as $err)
                        {{$err}}<br>
                    @endforeach
                </div>
                @endif

                @if(session('thongbao'))
                    {{session('thongbao')}}
                @endif
                    <form role="form" action="admin/dangnhap" method="POST">
                        <fieldset>
                            <input type="hidden" name="_token" value ="{{csrf_token()}}"/>
                            <div class="form-group">
                                <input class="form-control" placeholder="E-mail" name="email" type="email" autofocus>
                            </div>
                            <div class="form-group">
                                <input class="form-control" placeholder="Password" name="password" type="password" value="">
                            </div>
                            <button type="submit" class="btn btn-lg btn-success btn-block">Login</button>
                        </fieldset>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- end Page Content -->

@endsection