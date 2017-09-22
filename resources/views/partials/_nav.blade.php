<!--Default navbar-->
    <nav class="navbar navbar-default" role="navigation">
      <div class="container-fluid">
        <!-- Brand and toggle get grouped for better mobile display -->
        <div class="navbar-header">
          <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="#">Laravel Blog</a>
        </div>

        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
          <ul class="nav navbar-nav">
            <li class="{{ Request::is('/') ? "active" : ""}}"><a href="/">Home</a></li>
            <li class="{{ Request::is('blog') ? "active" : ""}}"><a href="/blog">Blog</a></li>
            <li class="{{ Request::is('about') ? "active" : ""}}"><a href="/about">About</a></li>
            <li class="{{ Request::is('contact') ? "active" : ""}}"><a href="/contact">Contact</a></li>
          </ul>
          @guest
          <ul class="nav navbar-nav navbar-right">
            <li class="dropdown">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown">My Account <span class="caret"></span></a>
              <ul class="dropdown-menu" role="menu">
              @if(Request::is('register'))
                <li><a href="{{ route('login') }}">Login</a></li>
              @elseif(Request::is('login'))
                <li><a href="{{ route('register') }}">Register</a></li>
              @else
                <li><a href="{{ route('login') }}">Login</a></li>
                <li><a href="{{ route('register') }}">Register</a></li>
              @endif
          @else
          <ul class="nav navbar-nav navbar-right">
            <li class="dropdown">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown">Hello, {{ Auth::user()->name }}<span class="caret"></span></a>
              <ul class="dropdown-menu" role="menu">
                <li><a href="{{ route('posts.index') }}">Posts</a></li>
                <li><a href="{{ route('categories.index') }}">Categories</a></li>
                <li><a href="{{ route('tags.index') }}">Tags</a></li>
                <li class="divider"></li>
                <li>
                  <a href="{{ route('logout') }}"
                    onclick="event.preventDefault();
                    document.getElementById('logout-form').submit();">
                    Logout
                  </a>
                  {!! Form::open(['route' =>['logout'], 'method' => 'POST', 'id' => 'logout-form']) !!}
                    {{ csrf_field() }}
                  {!! Form::close() !!}
                </li>
          @endguest
              </ul>
            </li>
          </ul>
        </div><!-- /.navbar-collapse -->
      </div><!-- /.container-fluid -->
    </nav>