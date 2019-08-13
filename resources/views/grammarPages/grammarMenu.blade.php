<div class="col-md-3 sidenav">

    @if(Auth::user())
        @include('layout.menuUserPoint')
    @endif
    
    <ul class="list-group" id="menu">
        <li href="#" class="list-group-item menu1 active"  style="background-color:#f5f6f7 ">
            <h3 style="margin-top:0px; margin-bottom:0px;color:black;">Menu grammar</h3>
        </li>

        @foreach($grammar as $gm)
            <li href="#" class="list-group-item menu1">
                {{$gm->Ten}}
            </li>
            
            <ul>
                @foreach($gm->grammarlesson as $gl)
                <li class="list-group-item">
                    <a href="grammarsubpage/{{$gl->id}}">{{$gl->Ten}}</a>
                </li>
                @endforeach
            </ul>
        @endforeach
    </ul>
</div>