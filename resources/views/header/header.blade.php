<header class="app-header navbar">
        <button class="navbar-toggler sidebar-toggler d-lg-none mr-auto" type="button" data-toggle="sidebar-show">
          <span class="navbar-toggler-icon"></span>
        </button>
        <a class="navbar-brand" href="home">
          <img class="navbar-brand-full" src="img/logo.png" width="89" height="25" alt="CoreUI Logo">
          <img class="navbar-brand-minimized" src="img/brand/sygnet.svg" width="30" height="30" alt="CoreUI Logo">
        </a>
        <button class="navbar-toggler sidebar-toggler d-md-down-none" type="button" data-toggle="sidebar-lg-show">
          <span class="navbar-toggler-icon"></span>
        </button>
        <ul class="nav navbar-nav d-md-down-none">
          <li class="nav-item px-3">
            <a class="nav-link" href="#">Dashboard</a>
          </li>
          <li class="nav-item px-3">
            <a class="nav-link" href="#">Users</a>
          </li>
          <li class="nav-item px-3">
            <a class="nav-link" href="#">Settings</a>
          </li>
        </ul>
        <ul class="nav navbar-nav ml-auto">
            <i class="flag-icon flag-icon-bo h1" id="bo" title="bo"></i>
                        
          <li class="nav-item d-md-down-none">
            <a class="nav-link" >
              <i class="icon-list"></i>
            </a>
          </li>
          <li class="nav-item d-md-down-none">
            <a class="nav-link">
              {{ Auth::user()->nombre.' '.Auth::user()->apellido  }} <span class="caret"></span>
            </a>
          </li>
          <li class="nav-item dropdown">
            <a class="nav-link" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">
              <img class="img-avatar" src="img/avatars/6.jpg" alt="admin@bootstrapmaster.com">
            </a>
            <div class="dropdown-menu dropdown-menu-right">
             
              <div class="dropdown-header text-center">
                <strong>Settings</strong>
              </div>
              
              <div class="dropdown-divider"></div>
              {{-- <a class="dropdown-item" href="#">
                <i class="fa fa-shield"></i> Lock Account</a> --}}
              <a class="dropdown-item" href="#" onclick="event.preventDefault();
              document.getElementById('logout-form').submit();">
                <i class="fa fa-lock" ></i>Cerrar Sesion</a>
                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                  @csrf
              </form>
            </div>
          </li>
        </ul>
        <button class="navbar-toggler aside-menu-toggler d-md-down-none" type="button" data-toggle="aside-menu-lg-show">
          <span class="navbar-toggler-icon"></span>
        </button>
        <button class="navbar-toggler aside-menu-toggler d-lg-none" type="button" data-toggle="aside-menu-show">
          <span class="navbar-toggler-icon"></span>
        </button>
      </header>