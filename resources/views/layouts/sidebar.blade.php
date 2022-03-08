<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="{{URL::to('/home')}}" class="brand-link">
      <img src="{{asset('storage/adminlte/dist/img/AdminLTELogo.png')}}" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
      <span class="brand-text font-weight-light">Collection App</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="{{asset('storage/adminlte/dist/img/user2-160x160.jpg')}}" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
          <a href="#" class="d-block">{{auth()->user()->name}}</a>
        </div>
      </div>
      <!-- SidebarSearch Form -->
      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
          <li class="nav-item">
            <a href="pages/widgets.html" class="nav-link">
              <i class="nav-icon fas fa-th"></i>
              <p>
                Widgets
              </p>
            </a>
          </li>
          @role('admin')
          <li class="nav-item">
            <a href="{{route('submission.index')}}" class="nav-link">
              <i class="nav-icon fas fa-th"></i>
              <p>
                কালেক্টর জমা
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="{{URL::to('/collector-data')}}" class="nav-link">
              <i class="nav-icon fas fa-th"></i>
              <p>
                কালেক্টর তথ্য
              </p>
            </a>
          </li>
          @endrole
          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-th"></i>
              <p>
                আদায়
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{route('collection.index')}}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>আদায়</p>
                </a>
              </li>
            </ul>
          </li>
          <li class="nav-item">
            <a href="{{route('donor.index')}}" class="nav-link">
              <i class="nav-icon fas fa-th"></i>
              <p>
                দাতা
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="{{route('rittiki.index')}}" class="nav-link">
              <i class="nav-icon fas fa-th"></i>
              <p>
                ঋত্বিকী
              </p>
            </a>
          </li>
          @role('admin')
          <li class="nav-item">
            <a href="{{route('rittiki-pay.index')}}" class="nav-link">
              <i class="nav-icon fas fa-th"></i>
              <p>
                ঋত্বিকী পরিশোধ
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="{{route('user.index')}}" class="nav-link">
              <i class="nav-icon fas fa-th"></i>
              <p>
               ব্যবহারকারী
              </p>
            </a>
          </li>
          @endrole
          <li class="nav-item">
            <a href="{{ route('logout') }}"
            onclick="event.preventDefault();
                          document.getElementById('logout-form').submit();" class="nav-link">
              <i class="nav-icon fas fa-power"></i>
              <p>
                Log Out
              </p>
            </a>
            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
              @csrf
          </form>
          </li>
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>