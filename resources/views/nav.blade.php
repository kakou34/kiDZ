
        <nav class="navbar navbar-expand-md navbar-light shadow" id="main-nav">
            <div class="container">
                <a class="navbar-brand" href="{{ url('/') }}">
                    <img id="logo" src="{{asset("img/logo.PNG")}}" alt="logo">
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent" >
                    <ul class="nav navbar-nav ml-auto text-center" id="navbarContent">
                        <li class="nav-item {{request()->is('watch') ? 'active' : ''}}">
                            <audio id="sound" controls preload="auto"><source src="{{asset('audio/bubble.mp3')}}" controls></audio>
                            <a class="nav-link main-menu-item" id="a-watch" href="{{Route('loadPageWatch')}}"> <img class="icon" src="{{asset('img/watchicon.png')}}" alt="je regarde"><br>Je regarde</a>
                        </li>
                        <li class="nav-item {{request()->is('read') ? 'active' : ''}} ">
                            <a class="nav-link main-menu-item" id="a-read" href="{{Route('readFetchLists')}}"> <img class="icon" src="{{asset('img/readicon.png')}}" alt="je lis"><br>Je lis</a>
                        </li>
                        <li class="nav-item dropdown {{request()->is('learn') ? 'active' : ''}}">
                            <a class="nav-link dropdown-toggle main-menu-item" id="a-learn" href="/learn" id="navbarDropdownMenuLinkLearn" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <img class="icon" src="{{asset('img/learnicon.png')}}" alt="j'apprens"> <br>J' apprends
                            </a>
                            <div class="dropdown-menu show" aria-labelledby="navbarDropdownMenuLinkLearn" id="nav-drop">
                                @foreach($subjects as $subject)
                                <a class="dropdown-item" href="{{Route('learn', ['$subject_id'=> $subject->id])}}">{{$subject->name}}</a>
                                @endforeach
                            </div>
                        </li>
                        <li class="nav-item dropdown {{request()->is('play') ? 'active' : ''}}">
                            <a class="nav-link dropdown-toggle main-menu-item" id="a-play" href="/play" id="navbarDropdownMenuLinkGames" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <img class="icon" src="{{asset('img/playicon.png')}}" alt="je joue"><br> Je Joue </a>
                            <div class="dropdown-menu show" aria-labelledby="navbarDropdownMenuLinkGames">
                                @foreach($gameCategories as $category)
                                    <a class="dropdown-item" href="{{Route('play', ['category_id'=> $category->id])}}">{{$category->name}}</a>
                                @endforeach
                            </div>
                        </li>
                        <li class="nav-item {{request()->is('diy') ? 'active' : ''}}">
                            <a class="nav-link main-menu-item" id="a-diy" href="{{Route('diyFetchLists')}}"> <img class="icon" src="{{asset('img/diyicon.png')}}" alt="DIY"><br>DIY</a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
