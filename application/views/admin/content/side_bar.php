   <!-- BEGIN: Main Menu-->
   <div class="main-menu menu-fixed menu-light menu-accordion menu-shadow" data-scroll-to-active="true">
        <div class="navbar-header bg-success">
            <ul class="nav navbar-nav flex-row">
                <li class="nav-item mr-auto"><a class="navbar-brand" href="<?php echo base_url() ?>admin/dashboard">
                        <div class="brand-logo"></div>
                        <h2 class="brand-text mb-0">SIMHOR</h2>
                    </a>
                </li>
                <li class="nav-item nav-toggle"><a class="nav-link modern-nav-toggle pr-0" data-toggle="collapse"><i class="feather icon-x d-block d-xl-none font-medium-4 warning toggle-icon"></i><i class="toggle-icon feather icon-disc font-medium-4 d-none d-xl-block collapse-toggle-icon warning" data-ticon="icon-disc"></i></a></li>
            </ul>
        </div>
        <div class="shadow-bottom"></div>
        <div class="main-menu-content">
            <ul class="navigation navigation-main" id="main-menu-navigation" data-menu="menu-navigation">
                <li class=" nav-item"><a href="<?php echo base_url() ?>admin/dashboard">
                    <i class="feather icon-home"></i><span class="menu-title" data-i18n="Dashboard">Dashboard</span></a>
                </li>
                <!-- <li class=" navigation-header"><span>Apps</span></li> -->
                <li class=" nav-item"><a href="<?php echo base_url() ?>admin/setting_tahun">
                    <i class="feather icon-settings"></i><span class="menu-title" data-i18n="Email">Setting Tahun</span></a>
                </li>
                <li class=" nav-item"><a href="<?php echo base_url() ?>admin/data_user">
                    <i class="feather icon-users"></i><span class="menu-title" data-i18n="Chat">Data User</span></a>
                </li>
                <li class=" nav-item"><a href="<?php echo base_url() ?>admin/kelembagaan">
                    <i class="feather icon-briefcase"></i><span class="menu-title" data-i18n="Todo">Kelembagaan</span></a>
                </li>
                <li class=" nav-item"><a href="<?php echo base_url() ?>admin/kesiswaan">
                    <i class="fa fa-id-badge"></i><span class="menu-title" data-i18n="Calender">Kesiswaan</span></a>
                </li>
                <li class=" nav-item"><a href="<?php echo base_url() ?>admin/gtk">
                    <i class="fa fa-address-book-o"></i><span class="menu-title" data-i18n="Calender">GTK</span></a>
                </li>
                <li class=" nav-item"><a href="#"><i class="fa fa-bookmark-o"></i><span class="menu-title" data-i18n="Ecommerce">Rekap</span></a>
                    <ul class="menu-content">
                        <!-- <li><a href="<?php echo base_url() ?>admin/rekap-kelembagaan">
                            <i class="feather icon-circle"></i><span class="menu-item" data-i18n="Shop">Kelembagaan</span></a>
                        </li> -->
                        <li><a href="<?php echo base_url() ?>admin/rekap-kesiswaan">
                            <i class="feather icon-file-text"></i><span class="menu-item" data-i18n="Shop">Kesiswaan</span></a>
                        </li>
                        <li><a href="<?php echo base_url() ?>admin/rekap-gtk">
                            <i class="fa fa-wpforms"></i><span class="menu-item" data-i18n="Details">GTK</span></a>
                        </li>
                        <li><a href="<?php echo base_url() ?>admin/backup_database">
                            <i class="fa fa-database"></i><span class="menu-item" data-i18n="Wish List">Backup Database</span></a>
                        </li>
                        
                    </ul>
                </li>
                <li class=" nav-item"><a href="#"><i class="feather icon-user"></i><span class="menu-title" data-i18n="User">User</span></a>
                    <ul class="menu-content">
                        <li><a href="<?php echo base_url() ?>admin/user">
                            <i class="feather icon-circle"></i><span class="menu-item" data-i18n="List">Akun User</span></a>
                        </li>
                    </ul>
                </li>
            </ul>
        </div>
    </div>
    <!-- END: Main Menu-->