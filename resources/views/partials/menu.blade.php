<nav class="main-menu d-none d-sm-none d-md-block">
    <ul>
        <li @if(\Request::route()->getName()=='intranet.index')  id="IntranetLisat" @else  @if(\Request::route()->getName()=='intranet.index')  id="IntranetLisat" @else class="has-subnav" @endif @endif >
            <a href="{{ url('/intranet') }}">
                <i class="fa fa-list fa-2x"></i>
                <span class="nav-text">
                    Intranet  
                </span>
            </a>
          
        </li>
        <li  @if(\Request::route()->getName()=='web')  id="IntranetLisat" @else class="has-subnav" @endif>
            <a href="{{ url('/web') }}">
                <i class="fa fa-home fa-2x"></i>
                <span class="nav-text">
                    Home
                </span>
            </a>
            
        </li>
        <li  @if(\Request::route()->getName()=='')  id="IntranetLisat" @else class="has-subnav" @endif>
            <a href="#">
                <i class="fa fa-laptop fa-2x"></i>
                <span class="nav-text">
                    Stars Components
                </span>
            </a>
            
        </li>
        <li  @if(\Request::route()->getName()=='')  id="IntranetLisat" @else class="has-subnav" @endif>
            <a href="#">
               <i class="fa fa-list fa-2x"></i>
                <span class="nav-text">
                    Forms
                </span>
            </a>
            
        </li>
        <li  @if(\Request::route()->getName()=='')  id="IntranetLisat" @else class="has-subnav" @endif>
            <a href="#">
               <i class="fa fa-folder-open fa-2x"></i>
                <span class="nav-text">
                    Pages
                </span>
            </a>
           
        </li>
        <li>
            <a href="#">
                <i class="fa fa-bar-chart-o fa-2x"></i>
                <span class="nav-text">
                    Graphs and Statistics
                </span>
            </a>
        </li>
        <li>
            <a href="#">
                <i class="fa fa-font fa-2x"></i>
                <span class="nav-text">
                   Quotes
                </span>
            </a>
        </li>
        <li>
           <a href="#">
               <i class="fa fa-table fa-2x"></i>
                <span class="nav-text">
                    Tables
                </span>
            </a>
        </li>
        <li>
           <a href="#">
                <i class="fa fa-map-marker fa-2x"></i>
                <span class="nav-text">
                    Maps
                </span>
            </a>
        </li>
        <li>
            <a href="#">
               <i class="fa fa-info fa-2x"></i>
                <span class="nav-text">
                    Documentation
                </span>
            </a>
        </li>
    </ul>

    <ul class="logout">
        <li>
            <a href="{{ route('logout') }}"
            onclick="event.preventDefault();
                     document.getElementById('logout-form').submit();">
                 <i class="fa fa-power-off fa-2x"></i>
                <span class="nav-text">
                    Logout
                </span>
            </a>
        </li>  
    </ul>
</nav>