

<div class="col-md-3 ">
    @if(Auth::user())
        @include('layout.menuUserPoint')
    @endif
    
    <ul class="list-group" id="menu">
        <li href="#" class="list-group-item menu1 active" style="background-color:#f5f6f7;color:black ">
            <h3 style="margin-top:0px; margin-bottom:0px;">Menu</h3>
        </li>
        @foreach($theloai as $tl)
            @if(count($tl->loaitin)>0)
            <li href="#" class="list-group-item menu1">
                {{$tl->Ten}}
            </li>
            
            <ul>
                @foreach($tl->loaitin as $lt)
                <li class="list-group-item">
                    <a href="loaitin/{{$lt->id}}/{{$lt->TenKhongDau}}.html">{{$lt->Ten}}</a>
                </li>
                @endforeach
            </ul>
            @endif
        @endforeach
    </ul>
</div>