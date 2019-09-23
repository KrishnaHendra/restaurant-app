<aside class="main-sidebar">
  <!-- sidebar: style can be found in sidebar.less -->
  <section class="sidebar">
    <!-- Sidebar user panel -->
    <div class="user-panel">
      <div class="pull-left image">
        <img src="{{ asset('admin/dist/img/user2-160x160.png')}}" class="img-circle" alt="User Image">
      </div>
      <div class="pull-left info">
        <p>{{ Auth::user()->name }}</p>
        <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
      </div>
    </div>
    <!-- search form -->
    <form action="#" method="get" class="sidebar-form">
      <div class="input-group">
        <input type="text" name="q" class="form-control" placeholder="Search...">
        <span class="input-group-btn">
              <button type="submit" name="search" id="search-btn" class="btn btn-flat">
                <i class="fa fa-search"></i>
              </button>
            </span>
      </div>
    </form>
    <!-- /.search form -->
    <!-- sidebar menu: : style can be found in sidebar.less -->
    <ul class="sidebar-menu" data-widget="tree">
      <li class="header">ADMIN</li>

      <li><a href="/coba"><i class="fa fa-bell"></i> <span>Dashboard</span></a></li>
      
      <li><a href="/table"><i class="fa fa-user"></i> <span>Pelanggan</span></a></li>
      <li><a href="/masakan"><i class="fa fa-book"></i> <span>Makanan</span></a></li>
      <li><a href="/minuman"><i class="fa fa-book"></i> <span>Minuman</span></a></li>
      <li><a href="/grafik"><i class="fa  fa-bar-chart"></i> <span>History</span></a></li>
      <li class="header">LABELS</li>

      <li><a href="/pesanan"><i class="fa fa-circle-o text-yellow"></i> <span>Order Masuk</span></a></li>

    </ul>
  </section> 25 50 20 52 26 17 8
  <!-- /.sidebar -->
</aside>
