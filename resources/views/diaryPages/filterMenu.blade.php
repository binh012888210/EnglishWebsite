<div class="col-md-3 ">

    @if(Auth::user())
        @include('layout.menuUserPoint')
    @endif
    
    <ul class="list-group" id="menu">
        <li href="#" class="list-group-item menu1 active"  style="background-color:#f5f6f7 ">
            <h3 style="margin-top:0px; margin-bottom:0px;color:black;">Xu hướng bạn chọn</h3>
        </li>
        <li href="" class="list-group-item menu1">
            <a href="diary" >Mới nhất</a> 
        </li>
        <li href="" class="list-group-item menu1">
            <a href="diary/filter/old" >Cũ nhất</a> 
        </li>
        <li href="#" class="list-group-item menu1">
            <a href="diary/filter/popular" >Thích nhiều nhất</a> 
        </li>
        <li href="#" class="list-group-item menu1">
            <a href="diary/filter/report" >Báo cáo nhiều nhất</a> 
        </li>
        <li href="#" class="list-group-item menu1">
            <a href="diary/filter/hocduong" >Học đường</a> 
        </li>
        <li href="#" class="list-group-item menu1">
            <a href="diary/filter/xahoi" >Xã hội</a> 
        </li>
        <li href="#" class="list-group-item menu1">
            <a href="diary/filter/congnghe" >Công nghệ</a> 
        </li>
        <li href="#" class="list-group-item menu1">
            <a href="diary/yourdiary" >Your diary</a> 
        </li>
    </ul>
</div>
