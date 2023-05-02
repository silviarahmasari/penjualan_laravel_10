<div class="navbar-bg"></div>
    <nav class="navbar navbar-expand-lg main-navbar">
        <a href="index.html" class="navbar-brand sidebar-gone-hide" style="padding-left: 20px">TEAM 4</a>
        <div class="navbar-nav">
            <a href="#" class="nav-link sidebar-gone-show" data-toggle="sidebar"><i class="fas fa-bars"></i></a>
        </div>
        <div class="nav-collapse">
            <a class="sidebar-gone-show nav-collapse-toggle nav-link" href="#">
                <i class="fas fa-ellipsis-v"></i>
            </a>
        </div>
        <form class="form-inline ml-auto"></form>
        <ul class="navbar-nav navbar-right">
            <li class="dropdown"><a href="Member" data-toggle="dropdown" class="nav-link dropdown-toggle nav-link-lg nav-link-user">
                <img alt="image" src="{{ asset ('assets/img/avatar/avatar-1.png') }}" class="rounded-circle mr-1">
                <div class="d-sm-none d-lg-inline-block">Hi, {{ Auth::user()->nama_pengguna }}</div></a>
                <div class="dropdown-menu dropdown-menu-right">
                    <a href="{{ URL::to('') }}" class="dropdown-item has-icon text-danger">
                        <i class="fas fa-sign-out-alt"></i><b>LOG OUT</b>
                    </a>
                </div>
            </li>
        </ul>
    </nav>

    <nav class="navbar navbar-secondary navbar-expand-lg">
        <div class="container">
          <ul class="navbar-nav">
            <li class="nav-item active">
              <a href="Member" data-toggle="dropdown" class="nav-link"><i class="fas fa-home"></i><span>Home</span></a>
            </li>
            <li class="nav-item dropdown">
              <a href="#" data-toggle="dropdown" class="nav-link has-dropdown"><i class="fa fa-archive"></i><span>Menu</span></a>
              <ul class="dropdown-menu">
                <li class="nav-item dropdown"><a href="#" class="nav-link has-dropdown">Sub Menu 1</a>
                  <ul class="dropdown-menu">
                    <li class="nav-item"><a href="#" class="nav-link">Content 1</a></li>
                    <li class="nav-item"><a href="#" class="nav-link">Content 2</a></li>
                    <li class="nav-item"><a href="#" class="nav-link">Content 3</a></li>
                  </ul>
                </li>
                <li class="nav-item dropdown"><a href="#" class="nav-link has-dropdown">Sub Menu 2</a>
                  <ul class="dropdown-menu">
                    <li class="nav-item"><a href="#" class="nav-link">Content 1</a></li>
                    <li class="nav-item"><a href="#" class="nav-link">Content 2</a></li>
                    <li class="nav-item"><a href="#" class="nav-link">Content 3</a></li>
                  </ul>
                </li>
                <li class="nav-item dropdown"><a href="#" class="nav-link has-dropdown">Sub Menu 3</a>
                  <ul class="dropdown-menu">
                    <li class="nav-item"><a href="#" class="nav-link">Content 1</a></li>
                    <li class="nav-item"><a href="#" class="nav-link">Content 2</a></li>
                    <li class="nav-item"><a href="#" class="nav-link">Content 3</a></li>
                  </ul>
                </li>
              </ul>
            </li>
            <li class="nav-item ">
              <a href="" data-toggle="dropdown" class="nav-link"><i class="fas fa-heart"></i><span>Riwayat Pesanan</span></a>
            </li>
          </ul>
          <form class="form-inline ml-auto">
            <ul class="navbar-nav">
                <li><a href="#" data-toggle="search" class="nav-link nav-link-lg d-sm-none"><i class="fas fa-search"></i></a></li>
            </ul>
            <div class="search-element">
                <input class="form-control" type="search" placeholder="Search" aria-label="Search" data-width="250">
                <button class="btn" type="submit"><i class="fas fa-search"></i></button>
                <div class="search-backdrop"></div>
            </div>
        </form>
        </div>
      </nav>
