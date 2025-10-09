<aside class="main-sidebar sidebar-dark-primary elevation-4" style="background-color: #0071b4">
    <!-- Brand Logo -->
    <a href="" class="brand-link">
      <img src="" alt="Logo" class="brand-image img-circle elevation-3 mr-2" style="opacity: .9; background:#ffffff">
      <span class="brand-text font-weight-light">Katalog Layanan</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
  
      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->

          <li class="nav-item">
            <a href="{{ route('backend.dashboard') }}" class="nav-link">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                Dashboard
              </p>
            </a>
          </li>

          {{-- MENU KATALOG (Muncul untuk semua role) --}}
           <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-edit"></i>
              <p>
                Katalog
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Kategori</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Layanan</p>
                </a>
              </li>
            </ul>
          </li>

          {{-- MENU KHUSUS SUPERADMIN --}}
          @if(Auth::user()->role === 'superadmin')

          <li class="nav-item">
            <a href="" class="nav-link">
              <i class="nav-icon fas fa-table"></i>
              <p>
                Kelola User
              </p>
            </a>
          </li>

          <li class="nav-item">
            <a href="" class="nav-link">
              <i class="nav-icon fas fa-table"></i>
              <p>
                Carousel
              </p>
            </a>
          </li>

          <li class="nav-item">
            <a href="{{ route ('kontak.index') }}" class="nav-link">
              <i class="nav-icon fas fa-table"></i>
              <p>
                Kontak
              </p>
            </a>
          </li>
          @endif

        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>
