   <!-- BEGIN: Main Menu-->
   <div class="main-menu menu-fixed menu-light menu-accordion menu-shadow" data-scroll-to-active="true">
        <div class="navbar-header bg-success">
            <ul class="nav navbar-nav flex-row">
                <li class="nav-item mr-auto"><a class="navbar-brand" href="<?php echo base_url() ?>user/dashboard">
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
                <li class=" nav-item"><a href="<?php echo base_url() ?>user/dashboard">
                    <i class="feather icon-home"></i><span class="menu-title" data-i18n="Dashboard">Dashboard</span></a>
                </li>
                <li class=" nav-item"><a href="<?php echo base_url() ?>user/kelembagaan">
                    <i class="feather icon-briefcase"></i><span class="menu-title" data-i18n="Todo">Kelembagaan</span></a>
                </li>
                <li class=" nav-item"><a href="<?php echo base_url() ?>user/kesiswaan">
                    <i class="fa fa-id-badge"></i><span class="menu-title" data-i18n="Calender">Kesiswaan</span></a>
                </li>
                <li class=" nav-item"><a href="<?php echo base_url() ?>user/gtk">
                    <i class="fa fa-address-book-o"></i><span class="menu-title" data-i18n="Calender">GTK</span></a>
                </li>
            </ul>
        </div>
    </div>
    <!-- END: Main Menu-->