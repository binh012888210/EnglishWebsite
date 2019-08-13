<div class="panel panel-default" style='padding-bottom: 5px;'>
    <div class="panel-heading " style="background-color:#f5f6f7 ">
        <h3 style="margin-top:0px; margin-bottom:0px;">User information</h3>
    </div>
    <!-- Blog Post -->
    <div class="panel-body" style='padding-right: 7px;'>
        
        <!-- Author -->
        <p> <span class="glyphicon glyphicon-user"></span>
            User name: {{Auth::user()->name}}
        </p>

        <!-- Author -->
        @if(Auth::user()->quyen==0)
        <p><span class="glyphicon glyphicon-tag"></span>
            User type: Học Sinh
        </p>
        @endif

        @if(Auth::user()->quyen==1)
        <p><span class="glyphicon glyphicon-tag"></span>
            User type: Teacher
        </p>
        @endif

        @if(Auth::user()->quyen==2)
        <p><span class="glyphicon glyphicon-tag"></span>
            User type: Admin
        </p>
        @endif

        <!-- Point -->
        <p><span class="glyphicon glyphicon-book"></span> Grammar point:
            {{Auth::user()->userpoint->GrammarPoint}}</p>

        <!-- Point -->
        <p><span class="glyphicon glyphicon-book"></span> Skill point:
            {{Auth::user()->userpoint->SkillPoint}}</p>

            <!-- Point -->
        <p><span class="glyphicon glyphicon-book"></span> Diary posted:
            {{Auth::user()->diaryenglish->count()}}</p>

    </div>
</div>