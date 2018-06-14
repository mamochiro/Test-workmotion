<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">

    <link rel="stylesheet" href="{{elixir('css/app.css')}}">
    <script src="js/app.js"></script>
    <script src="https://code.jquery.com/jquery-2.2.4.min.js"
    integrity="sha256-BbhdlvQf/xTY9gja0Dq3HiwQF8LaCRTXxZKRutelT44="  crossorigin="anonymous"></script>
    <link rel="stylesheet" href="{{elixir('css/fix-fonts.css')}}">
    <link rel="stylesheet"href="https://fonts.googleapis.com/css?family=Indie+Flower|Itim">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    @yield('style')
    @yield('script')
    <title>﻿Ｓ Ｌ</title>
  </head>
  <body>
    <div class="container">

      <!-- Static navbar -->
      <nav class="navbar navbar-default">
        <div class="container-fluid">
          <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
              <span class="sr-only">Toggle navigation</span>
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="#">﻿
              <img id="brand-image"  style="height:120%;display:inline-block;" src="https://avatars1.githubusercontent.com/u/34474167?s=200&v=4"></a>
          </div>
          <div id="navbar" class="navbar-collapse collapse">
            @if(Auth::check())
            @if (Auth::user()->typeUser == 1)
              <ul class="nav navbar-nav">

                <li class="{{ Request::segment(1) === 'home' ? 'active' : null }}">
                  <a href="{{url('home')}}">Home</a>
                </li>

                <li  class="{{ Request::segment(1) === 'project' ? 'active' : null }}">
                  <a href="{{url('project/'.Cache::get('key'))}}">Project Info</a>
                </li>

                <li class="{{ Request::segment(1) === 'task' ? 'active' : null }}">
                  <a href="{{url('task/'.Cache::get('key'))}}">Tasks</a>
                </li>
                <li class="{{ Request::segment(1) === 'estimage' ? 'active' : null }}">

                  <a href="{{url('estimage/'.Cache::get('key'))}}">Estimate</a>
                </li>

                <li class="{{ Request::segment(1) === 'kanbanBoard' ? 'active' : null }}">
                  <a href="{{url('kanbanBoard/'.Cache::get('key'))}}">Kanban Board</a>
                </li>
                <li class="{{ Request::segment(1) === 'upload' ? 'active' : null }}">
                  <a href="{{url('upload/'.Cache::get('key'))}}">Upload Document</a>
                </li>

                <li  class="{{ Request::segment(1) === 'dashboard' ? 'active' : null }}">
                  <a href="{{url('dashboard/'.Cache::get('key'))}}">Dashboard</a>
                </li>
              </ul>


            @elseif (Auth::user()->typeUser == 0)
                <ul class="nav navbar-nav">

                  <li class="{{ Request::segment(1) === 'home' ? 'active' : null }}">
                    <a href="{{url('homeTeacher')}}">Home</a>
                  </li>

                  <li  class="{{ Request::segment(1) === 'projectinfo' ? 'active' : null }}">
                    <a href="{{url('projectTeacher/'.Cache::get('key'))}}">Project Info</a>
                  </li>
                  <li class="{{ Request::segment(1) === 'kanbanBoard' ? 'active' : null }}">
                    <a href="{{url('kanbanBoard/'.Cache::get('key'))}}">Kanban Board</a>
                  </li>
                  <li class="{{ Request::segment(1) === 'upload' ? 'active' : null }}">
                    <a href="{{url('uploadTeacher/'.Cache::get('key'))}}">Upload Document</a>
                  </li>
                  <li class="{{ Request::segment(1) === 'progress' ? 'active' : null }}">
                    <a href="{{url('progress/'.Cache::get('key'))}}">Progress</a>
                  </li>

                  <li  class="{{ Request::segment(1) === 'dashboard' ? 'active' : null }}">
                    <a href="{{url('dashboard/'.Cache::get('key'))}}">Dashboard</a>
                  </li>
                </ul>
                @endif

              <ul class="nav navbar-nav navbar-right">
                  <!-- Authentication Links -->
                  @guest

                  @else
                      <li class="dropdown">
                          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false" aria-haspopup="true">
                              {{ Auth::user()->name }} <span class="caret"></span>
                          </a>

                          <ul class="dropdown-menu">
                              <li>
                                  <a href="{{ route('logout') }}"
                                      onclick="event.preventDefault();
                                               document.getElementById('logout-form').submit();">
                                      Logout
                                  </a>

                                  <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                      {{ csrf_field() }}
                                  </form>
                              </li>
                          </ul>
                      </li>
                  @endguest
              </ul>
            @else
              <ul class="nav navbar-nav navbar-right">
                  <!-- Authentication Links -->
                  @guest
                      <li><a href="{{ route('login') }}">Login</a></li>
                      <li><a href="{{ route('register') }}">Register</a></li>
                  @else
                      <li class="dropdown">
                          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false" aria-haspopup="true">
                              {{ Auth::user()->name }} <span class="caret"></span>
                          </a>

                          <ul class="dropdown-menu">
                              <li>
                                  <a href="{{ route('logout') }}"
                                      onclick="event.preventDefault();
                                               document.getElementById('logout-form').submit();">
                                      Logout
                                  </a>

                                  <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                      {{ csrf_field() }}
                                  </form>
                              </li>
                          </ul>
                      </li>
                  @endguest
              </ul>
            @endif
          </div><!--/.nav-collapse -->
        </div><!--/.container-fluid -->
      </nav>
      <div class="row">
        <div class="col-md-offset-1 col-md-10">
               @yield('content')
        </div>
      </div>
    </div> <!-- /container -->

    <script src="https://cdn.jsdelivr.net/lodash/4/lodash.min.js"></script>
    <script src="js/EJ-kanban.js"></script>

  </body>
</html>
