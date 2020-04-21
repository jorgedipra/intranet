<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <div class="container">
        <div class="col-1 d-none d-sm-none d-md-block"></div>
        <div class="navbar-header col">
          <!-- Branding Image -->
          <a class="navbar-brand col" href="{{ url('/') }}">
              <img src="/image/h1.jpg"  id="nav-logo" width="30" height="30" style="display: inline;border-radius: 100%;" class="d-inline-block align-top" alt="Jorgedipra" title="logo-Jorgedipra">
              {{ config('app.name', 'Intranet') }}
          </a>
       </div>
       <!-- Collapsed Hamburger -->
       <button class="navbar-toggler d-block d-sm-block d-md-none" type="button" data-toggle="collapse" data-target="#app-navbar-collapse" aria-controls="app-navbar-collapse" aria-expanded="false" aria-label="Toggle navigation" style="margin-right: 20px;">
          <span class="navbar-toggler-icon"></span>
        </button>
        
        
      <div class="collapse navbar-collapse col-lg-10  col-md-8 col-sm-12" id="app-navbar-collapse">
          <!-- Left Side Of Navbar -->
          <ul class="nav navbar-nav">
              &nbsp;
          </ul>
          <ul class="navbar-nav mr-auto mt-2 mt-lg-0 d-block d-sm-block d-md-none text-center">
              <li class="nav-item active">
                  <a class="nav-link" href="{{ url('/intranet') }}">
                      Home <span class="sr-only">(current)</span>
                  </a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="#">Link</a>
              </li>
              <li class="nav-item">
                  <a class="nav-link" href="{{ route('logout') }}"
                  onclick="event.preventDefault();
                          document.getElementById('logout-form').submit();">
                      Logout
                  </a>
              </li>
          </ul>
          <!-- Right Side Of Navbar -->
          <ul class="nav navbar-nav navbar-right d-none d-sm-none d-md-block">
              <!-- Authentication Links -->
              @if (Auth::guest())
                  <li><a href="{{ route('login') }}">Login</a></li>
                  <li><a href="{{ route('register') }}">Register</a></li>
              @else
                  <li class="dropdown">
                      <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                          {{ Auth::user()->name }} 
                      </a>

                      <ul class="dropdown-menu" role="menu">
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
              @endif
          </ul>
      </div> 
    </div>
    
</nav>