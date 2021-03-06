 <!-- Left side column. contains the logo and sidebar -->
 <aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
      <!-- Sidebar user panel -->
      <div class="user-panel">
        <div class="pull-left image">
          <img src="{{ Auth()->user()->image }}" class="img-circle" alt="User Image">
        </div>
        <div class="pull-left info">
          <p>{{ Auth()->user()->name }}</p>
        </div>
      </div>
      <!-- sidebar menu: : style can be found in sidebar.less -->
      <ul class="sidebar-menu" data-widget="tree">
        <li class="header">MAIN MENU</li>
        <li>
          <a href="{{ route('beranda')}}">
            <i class="fa fa-home"></i> <span>Beranda</span>
          </a>
        </li>
        <li>
          <a href="{{ route('homesuper')}}">
            <i class="fa fa-dashboard"></i> <span>Panel</span>
          </a>
        </li>
        <li>
          <a href="{{ route('userview')}}">
            <i class="fa fa-user-o"></i> <span>Data Dosen</span>
          </a>
        </li>
        <li>
          <a href="{{ route('mahasiswasuperview')}}">
            <i class="fa fa-user-o"></i> <span>Data Mahasiswa</span>
          </a>
        </li>
        <li>
          <a href="{{ route('groupview')}}">
            <i class="fa fa-group"></i> <span>Group</span>
          </a>
        </li>
        <li>
          <a href="{{ route('postview')}}">
            <i class="fa fa-newspaper-o"></i> <span>Berita</span>
          </a>
        </li>
        <li>
          <a href="{{ route('categoryview')}}">
            <i class="fa fa-tags"></i> <span>Kategori</span>
          </a>
        </li>
        <li>
          <a href="{{ route('home')}}">
            <i class="fa fa-envelope-o"></i> <span>Perpesanan</span>
          </a>
        </li>
        <li>
          <a href="{{ route('bannerview')}}">
            <i class="fa fa-image"></i> <span>Banner</span>
          </a>
        </li>
      
      </ul>
    </section>
    <!-- /.sidebar -->
  </aside>