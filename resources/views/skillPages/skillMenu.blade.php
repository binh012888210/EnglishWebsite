<div class="col-md-3 ">
    
    @if(Auth::user())
        @include('layout.menuUserPoint')
    @endif
    
    <ul class="list-group" id="menu">
        <li href="#" class="list-group-item menu1 active" style="background-color:#f5f6f7 ">
            <h3 style="margin-top:0px; margin-bottom:0px;color:black">Menu kỹ năng</h3>
        </li>

        @foreach($skill as $sk)
            <li href="#" class="list-group-item menu1">
                {{$sk->Ten}}
            </li>
            
            <ul>
                @foreach($sk->skilllesson as $sl)
                <li class="list-group-item">
                    <a href="skillsubpage/{{$sl->id}}">{{$sl->Ten}}</a>
                </li>
                @endforeach
            </ul>
        @endforeach
    </ul>
</div>