<div class="sidebar">
    

    <!-- Sidebar Menu -->
    <nav class="mt-2 mb-5">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
            <!-- Add icons to the links using the .nav-icon class
                with font-awesome or any other icon font library -->
            <li class="nav-header">MAIN MENU</li>
            <li class="nav-item">
                <a href="/admin" class="nav-link">
                    <i class="nav-icon fas fa-tasks"></i>
                    <p>
                    Dashboard
                    </p>
                </a>
            </li>
            <li class="nav-item has-treeview menu-open">
                <a href="#" class="nav-link">
                    <i class="nav-icon far fa-circle"></i>
                    <p>
                    MASTER
                    <i class="right fa fa-angle-left"></i>
                    </p>
                </a>
                <ul class="nav nav-treeview">
                    <li class="nav-item">
                        <a href="/admin/mobil" class="nav-link">
                            <i class="fa fa-car nav-icon"></i>
                            <p>Data Mobil</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="/admin/merek" class="nav-link">
                            <i class="fa fa-life-ring nav-icon"></i>
                            <p>Data Merek</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="/admin/customer" class="nav-link">
                            <i class="fa fa-users nav-icon"></i>
                            <p>Data Customer</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="/admin/sopir" class="nav-link">
                            <i class="fa fa-user nav-icon"></i>
                            <p>Data Sopir</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="/admin/testimoni" class="nav-link">
                            <i class="fa fa-paperclip nav-icon"></i>
                            <p>Data Testimoni</p>
                        </a>
                    </li>
                </ul>
            </li>
            <li class="nav-item has-treeview menu-open">
                <a href="#" class="nav-link">
                    <i class="nav-icon far fa-circle"></i>
                    <p>
                    TRANSAKSI
                    <i class="right fa fa-angle-left"></i>
                    </p>
                </a>
                <ul class="nav nav-treeview">
                    <li class="nav-item">
                        <a href="/admin/booking/pengambilan" class="nav-link">
                            <i class="fa fa-level-up-alt nav-icon"></i>
                            <p>Pengambilan Mobil</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="/admin/booking/pengembalian" class="nav-link">
                            <i class="fa fa-level-down-alt nav-icon"></i>
                            <p>Pengembalian Mobil</p>
                        </a>
                    </li>
                    <!-- <li class="nav-item">
                        <a href="/admin/booking/sewa" class="nav-link">
                            <i class="fa fa-car nav-icon"></i>
                            <p>Sewa</p> <span class="badge badge-info right">{{totalSewa()}}</span>
                        </a>
                    </li> -->
                </ul>
            </li>
            <li class="nav-item has-treeview menu-open">
                <a href="#" class="nav-link">
                    <i class="nav-icon far fa-circle"></i>
                    <p>
                    INFO PEMBAYARAN
                    <i class="right fa fa-angle-left"></i>
                    </p>
                </a>
                <ul class="nav nav-treeview">
                    <li class="nav-item">
                        <a href="/admin/payment" class="nav-link">
                            <i class="fa fa-database nav-icon"></i>
                            <p>Menunggu Pembayaran</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="/admin/payment/lunas" class="nav-link">
                            <i class="fa fa-database nav-icon"></i>
                            <p>Sudah dibayar</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="/admin/payment/expired" class="nav-link">
                            <i class="fa fa-database nav-icon"></i>
                            <p>Kadaluarsa</p>
                        </a>
                    </li>
                </ul>
            </li>
            <li class="nav-item has-treeview menu-open">
                <a href="#" class="nav-link">
                    <i class="nav-icon far fa-circle"></i>
                    <p>
                    INFO LAINNYA
                    <i class="right fa fa-angle-left"></i>
                    </p>
                </a>
                <ul class="nav nav-treeview">
                    <li class="nav-item">
                        <a href="/admin/booking" class="nav-link">
                            <i class="fa fa-info-circle nav-icon"></i>
                            <p>Info Booking</p> <span class="badge badge-warning right">{{totalBooking()}}</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="/admin/booking/selesai" class="nav-link">
                            <i class="fa fa-check nav-icon"></i>
                            <p>Transaksi Selesai</p> <span class="badge badge-success right">{{totalSelesai()}}</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="/admin/booking/batal" class="nav-link">
                            <i class="fa fa-times nav-icon"></i>
                            <p>Transaksi Batal</p> <span class="badge badge-danger right">{{totalBatal()}}</span>
                        </a>
                    </li>
                </ul>
            </li>
            <li class="nav-item has-treeview menu-open">
                <a href="#" class="nav-link">
                    <i class="nav-icon far fa-circle"></i>
                    <p>
                    LAPORAN
                    <i class="right fa fa-angle-left"></i>
                    </p>
                </a>
                <ul class="nav nav-treeview">
                    <li class="nav-item">
                        <a href="/admin/laporan" class="nav-link">
                            <i class="fa fa-print nav-icon"></i>
                            <p>Cetak Laporan</p>
                        </a>
                    </li>
                </ul>
            </li>
        </ul>
    </nav>
    <!-- /.sidebar-menu -->
</div>