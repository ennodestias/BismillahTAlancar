<section class="sidebar">

      <ul class="sidebar-menu">
        <li>
          <a href="#">
            <i class="fa fa-pie-chart"></i>
            <span>Dashboard</span>
          </a>
        </li>

        <li>
          <a href="#">
            <i class="fa fa-pie-chart"></i>
            <span>Pesanan Laundry</span>
          </a>
        </li>

        <li>
          <a href="#">
            <i class="fa fa-pie-chart"></i>
            <span>Riwayat Laundry</span>
          </a>
        </li>

        <li>
          <a href="{{ url('/paket-laundry') }}">
            <i class="fa fa-pie-chart"></i>
            <span>Paket Laundry</span>
          </a>
        </li>

        <li>
          <a href="#">
            <i class="fa fa-pie-chart"></i>
            <span>Kelola Karyawan</span>
          </a>
        </li>

        <li>
          <a href="{{ url('/customer') }}">
            <i class="fa fa-pie-chart"></i>
            <span>Data Pelanggan</span>
          </a>
        </li>

        <li>
          <a href="#">
            <i class="fa fa-pie-chart"></i>
            <span>Pengaturan</span>
          </a>
        </li>

        @if(\Auth::user()->name == 'Admin')
        <li class="menu-sidebar"><a href="{{ url('/reset-password') }}"><span class="glyphicon glyphicon-log-out"></span> Reset Password</span></a></li>
        @endif

        <li class="menu-sidebar"><a href="{{ url('/keluar') }}"><span class="glyphicon glyphicon-log-out">Logout</span></a></li>


      </ul>
    </section>