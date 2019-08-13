@extends('layout.index')


@section('content')
<!-- Page Content -->
<div class="container" style="height:400px; ">
<div class="row carousel-holder">
    <div class="col-md-4"></div>
    <div class="col-md-4">
        <div class="login-panel panel panel-default" style="margin-top:60px">
                <div class="panel-heading">
                        <h3 class="panel-title">Please Sign In</h3>
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
                        <div class="alert alert-danger">
                            {{session('thongbao')}}
                        </div>
                    @endif

                    <form action="dangnhap" method="post">
                        <input type="hidden" name="_token" value="{{csrf_token()}}">
                        <div>
                            <label>Email</label>
                            <input type="email" class="form-control" placeholder="Email" name="email" 
                            >
                        </div>
                        <br>	
                        <div>
                            <label>Password</label>
                            <input type="password" class="form-control"  placeholder="Password" name="password">
                        </div>
                        <br>
                        <div>
                            <input type="checkbox" id="remember" class="" name="remember"> Remember me
                        </div>
                        <br>
                        <button type="submit" class="btn btn-lg btn-success btn-block">Login</button>
                    </form>
                </div>
        </div>
    </div>
    <div class="col-md-4"></div>
</div>
<!-- end slide -->
</div>
<!-- end Page Content -->

@endsection