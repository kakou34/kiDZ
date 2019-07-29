<div class="sidebar-nav">
    <ul>
    <li>
        <a class="navbar-brand" href="{{ url('/') }}">
        <img id="logo" src="{{asset('../img/logo.PNG')}}" alt="logo">
        </a>
    </li>
    <li><a href="{{Route('cmsWatch')}}">Je regarde</a></li>
    <li><a href="{{Route('cmsRead')}}">Je lis</a></li>
    <li><a href="{{Route('cmsLearn')}}">J'apprends</a></li>
    <li><a href="{{Route('cmsPlay')}}">Je joue</a></li>
    <li><a href="{{Route('cmsDiy')}}">DIY</a></li>
    <!-- Authentication Links -->
    @guest
        <li class="nav-item">
            <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
        </li>
        @if (Route::has('register'))
            <li class="nav-item">
                <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
            </li>
        @endif
    @else
        <li class="nav-item dropdown">
            <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                {{ Auth::user()->name }} <span class="caret"></span>
            </a>

            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                <a class="dropdown-item" href="{{ route('logout') }}"
                   onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                    {{ __('Logout') }}
                </a>
                <a class="dropdown-item" href="/home">
                    Dashboard
                </a>

                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                    @csrf
                </form>
            </div>
        </li>
    </ul>
    @endguest
</div>