<div class="main-sidebar">
    <aside id="sidebar-wrapper">
        <div class="sidebar-brand">
            <a href="{{ URL::to('home') }}">PROJECT TEAM 4</a>
        </div>

        <ul class="sidebar-menu">
            <li class="menu-header">M E N U</li>
            <li><a class="nav-link" href="{{ URL::to('admin') }}"><i class="fas fa-home"></i> <span>Dashboard</span></a>
            </li>
            <li class="nav-item dropdown">
                <a href="#" class="nav-link has-dropdown"><i class="fas fa-archive"></i> <span>Data
                        Master</span></a>
                <ul class="dropdown-menu">
                    <li><a class="nav-link" href="{{ URL::to('Barang') }}">Barang</a></li>
                </ul>
            </li>

            <li><a class="nav-link" href="{{ route('history') }}"><i class="fab fa-readme"></i> <span>History</span></a>
            </li>
            <li><a class="nav-link" href="{{ URL::to('') }}"><i class="fa fa-power-off"></i> <span>Logout</span></a>
            </li>
            </li>
        </ul>
    </aside>
</div>
