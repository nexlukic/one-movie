<div class="movies_nav">
    <div class="container">
        <nav class="navbar navbar-default">
            <div class="navbar-header navbar-left">
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
            </div>
            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse navbar-right" id="bs-example-navbar-collapse-1">
                <nav>
                    <ul class="nav navbar-nav">
                     @foreach($meni as $m)
                        <li class="active"><a href="{{route($m->naziv)}}">{{$m->naziv}}</a></li>
                         @endforeach
                        @if(session()->has('user'))
                            @if(session('user')->naziv=='admin')
                                 <li class="active"><a href="{{route('admin')}}">Admin Panel</a></li>
                                @endif()
                             <li class="active"><a href="{{route('logout')}}">logout</a></li>
                            @endif()
                    </ul>
                </nav>
            </div>
        </nav>
    </div>
</div>
<!-- //nav -->