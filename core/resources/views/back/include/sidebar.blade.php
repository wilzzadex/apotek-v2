<div class="aside-menu-wrapper flex-column-fluid" id="kt_aside_menu_wrapper">
    <!--begin::Menu Container-->
    <div id="kt_aside_menu" class="aside-menu my-4" data-menu-vertical="1" data-menu-scroll="1" data-menu-dropdown-timeout="500">
        <!--begin::Menu Nav-->
        <ul class="menu-nav">
            <li class="menu-item {{ Request::is('admin/dashboard*') ? 'menu-item-active' : '' }}" aria-haspopup="true">
                <a href="{{ route('back.dashboard') }}" class="menu-link">
                    <span class="svg-icon menu-icon">
                        <!--begin::Svg Icon | path:assets/media/svg/icons/Design/Layers.svg-->
                        <i class="fas fa-tachometer-alt"></i>
                        <!--end::Svg Icon-->
                    </span>
                    <span class="menu-text">Dashboard</span>
                </a>
            </li>
            {{-- <li class="menu-section">
                <h4 class="menu-text">MASTER DATA</h4>
                <i class="menu-icon ki ki-bold-more-hor icon-md"></i>
            </li> --}}

            <li class="menu-item menu-item-submenu {{ Request::is('admin/unit*') ||  Request::is('admin/obat*') || Request::is('admin/user*') || Request::is('admin/suplier*') ? 'menu-item-open' : '' }}" aria-haspopup="true" data-menu-toggle="hover">
                <a href="javascript:;" class="menu-link menu-toggle">
                    <span class="svg-icon menu-icon">
                        <span class="svg-icon menu-icon">
                            <!--begin::Svg Icon | path:assets/media/svg/icons/Design/Layers.svg-->
                            <i class="fas fa-table"></i>
                            <!--end::Svg Icon-->
                        </span>
                        <!--end::Svg Icon-->
                    </span>
                    <span class="menu-text">Master Data</span>
                    <i class="menu-arrow"></i>
                </a>
                <div class="menu-submenu" kt-hidden-height="80" style="">
                    <i class="menu-arrow"></i>
                    <ul class="menu-subnav">
                        <li class="menu-item {{ Request::is('admin/user*') ? 'menu-item-active' : '' }}" aria-haspopup="true">
                            <a href="{{ route('back.user') }}" class="menu-link">
                                <i class="menu-bullet menu-bullet-dot">
                                    <span></span>
                                </i>
                                <span class="menu-text">Data User</span>
                            </a>
                        </li>
                        <li class="menu-item {{ Request::is('admin/suplier*') ? 'menu-item-active' : '' }}" aria-haspopup="true">
                            <a href="{{ route('suplier') }}" class="menu-link">
                                <i class="menu-bullet menu-bullet-dot">
                                    <span></span>
                                </i>
                                <span class="menu-text">Data Suplier</span>
                            </a>
                        </li>
                       
                        <li class="menu-item {{ Request::is('admin/unit*') ? 'menu-item-active' : '' }}" aria-haspopup="true">
                            <a href="{{ route('unit') }}" class="menu-link">
                                <i class="menu-bullet menu-bullet-dot">
                                    <span></span>
                                </i>
                                <span class="menu-text">Data Unit</span>
                            </a>
                        </li>

                        <li class="menu-item {{ Request::is('admin/kategori*') ? 'menu-item-active' : '' }}" aria-haspopup="true">
                            <a href="{{ route('unit') }}" class="menu-link">
                                <i class="menu-bullet menu-bullet-dot">
                                    <span></span>
                                </i>
                                <span class="menu-text">Data Kategori</span>
                            </a>
                        </li>

                        <li class="menu-item {{ Request::is('admin/golongan*') ? 'menu-item-active' : '' }}" aria-haspopup="true">
                            <a href="{{ route('unit') }}" class="menu-link">
                                <i class="menu-bullet menu-bullet-dot">
                                    <span></span>
                                </i>
                                <span class="menu-text">Data Golongan</span>
                            </a>
                        </li>

                        <li class="menu-item {{ Request::is('admin/obat*') ? 'menu-item-active' : '' }}" aria-haspopup="true">
                            <a href="{{ route('obat') }}" class="menu-link">
                                <i class="menu-bullet menu-bullet-dot">
                                    <span></span>
                                </i>
                                <span class="menu-text">Data Obat</span>
                            </a>
                        </li>
                       
                    </ul>
                </div>
            </li>
            <li class="menu-item menu-item-submenu {{ Request::is('admin/transaksi*') ? 'menu-item-open' : '' }}" aria-haspopup="true" data-menu-toggle="hover">
                <a href="javascript:;" class="menu-link menu-toggle">
                    <span class="svg-icon menu-icon">
                        <span class="svg-icon menu-icon">
                            <!--begin::Svg Icon | path:assets/media/svg/icons/Design/Layers.svg-->
                            <i class="fas fa-shopping-cart"></i>
                            <!--end::Svg Icon-->
                        </span>
                        <!--end::Svg Icon-->
                    </span>
                    <span class="menu-text">Transaksi</span>
                    <i class="menu-arrow"></i>
                </a>
                <div class="menu-submenu" kt-hidden-height="80" style="">
                    <i class="menu-arrow"></i>
                    <ul class="menu-subnav">
                        <li class="menu-item {{ Request::is('admin/transaksi/order*') ? 'menu-item-active' : '' }}" aria-haspopup="true">
                            <a href="{{ route('order') }}" class="menu-link">
                                <i class="menu-bullet menu-bullet-dot">
                                    <span></span>
                                </i>
                                <span class="menu-text">Pembelian Obat</span>
                            </a>
                        </li>
                        
                       
                       
                    </ul>
                </div>
            </li>
            <li class="menu-item menu-item-submenu {{ Request::is('admin/setting*') ? 'menu-item-open' : '' }}" aria-haspopup="true" data-menu-toggle="hover">
                <a href="javascript:;" class="menu-link menu-toggle">
                    <span class="svg-icon menu-icon">
                        <span class="svg-icon menu-icon">
                            <!--begin::Svg Icon | path:assets/media/svg/icons/Design/Layers.svg-->
                            <i class="fas fa-cogs"></i>
                            <!--end::Svg Icon-->
                        </span>
                        <!--end::Svg Icon-->
                    </span>
                    <span class="menu-text">Pengaturan Aplikasi</span>
                    <i class="menu-arrow"></i>
                </a>
                <div class="menu-submenu" kt-hidden-height="80" style="">
                    <i class="menu-arrow"></i>
                    <ul class="menu-subnav">
                        <li class="menu-item {{ Request::is('admin/transaksi/order*') ? 'menu-item-active' : '' }}" aria-haspopup="true">
                            <a href="{{ route('order') }}" class="menu-link">
                                <i class="menu-bullet menu-bullet-dot">
                                    <span></span>
                                </i>
                                <span class="menu-text">Pembelian Obat</span>
                            </a>
                        </li>
                        
                       
                       
                    </ul>
                </div>
            </li>
        </ul>
        <!--end::Menu Nav-->
    </div>
    <!--end::Menu Container-->
</div>