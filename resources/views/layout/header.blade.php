

<nav class="navbar navbar-inverse navbar-fixed-top"  role="navigation">
    <div class="container">
        
        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1"  >
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="trangchu">Home Page</a>
        </div>
        <nav class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
            
            <ul class="nav navbar-nav">
                <li class="nav-item">
                    <a href="readingnews">Reading News</a>
                </li>
                <li class="nav-item">
                    <a href="skillmainpage">Skills</a>
                </li>
                <li class="nav-item">
                    <a href="grammarmainpage">Grammar</a>
                </li>
                <li class="nav-item">
                    <a href="diary">Diary</a>
                </li>
            </ul>
            

            <ul class="nav navbar-nav pull-right">
                
                @if(!Auth::user())
                    <li class="nav-item">
                        <a href="dangky">Đăng ký</a>
                    </li>
                    <li class="nav-item">
                        <a href="dangnhap">Đăng nhập</a>
                    </li>
                @else
                    @if(Auth::user()->quyen>=1)
                        <li>
                            <a href="admin/theloai/danhsach">Manage Data</a>
                        </li>
                    @endif
                    <li class="nav-item">
                        <a href="nguoidung">
                            <span class ="glyphicon glyphicon-user"></span>
                            {{Auth::user()->name}}
                        </a>
                    </li class="nav-item">
                    <li>
                        <a href="dangxuat">Đăng xuất</a>
                    </li>
                @endif
            </ul>
        </nav>
    </div>
</nav>
