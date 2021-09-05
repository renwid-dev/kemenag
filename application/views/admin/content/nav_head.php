 <!-- BEGIN: Header-->
 <nav class="header-navbar navbar-expand-lg navbar navbar-with-menu floating-nav bg-success navbar-dark navbar-shadow">
    <div class="navbar-wrapper">
        <div class="navbar-container content">
            <div class="navbar-collapse" id="navbar-mobile">
                <div class="mr-auto float-left bookmark-wrapper d-flex align-items-center">
                    <ul class="nav navbar-nav">
                        <li class="nav-item mobile-menu d-xl-none mr-auto"><a class="nav-link nav-menu-main menu-toggle hidden-xs" href="#"><i class="ficon feather icon-menu"></i></a></li>
                    </ul>
                    <ul class="nav navbar-nav bookmark-icons" style="color:#fff;">
                        <b><?= $title ?>&nbsp;</b>|
                        <?= date('H:i') ?>
                        <!-- d F Y  -->
                    </ul>
                </div>
                <ul class="nav navbar-nav float-right">
                    <!-- <li class="nav-item d-none d-lg-block"><a class="nav-link"><i class="ficon feather icon-bar-chart"></i></a></li> -->
                    <li class="nav-item d-none d-lg-block"><a class="nav-link nav-link-expand"><i class="ficon feather icon-maximize"></i></a></li>
                    <li class="dropdown dropdown-user nav-item"><a class="dropdown-toggle nav-link dropdown-user-link" href="#" data-toggle="dropdown">
                            <div class="user-nav d-sm-flex d-none"><span class="user-name text-bold-600"><?php echo $this->session->userdata('nama') ?></span><span class="user-status">Online</span></div>
                            <?php if (isset($user[0]->file_user) != "") { ?>
                                <span><img class="round" src="<?= base_url('assets/upload/profile/') . $user[0]->file_user ?>" alt="avatar" height="40" width="40"></span>
                                <?php } else { ?>
                                <span><img class="round" src="<?= base_url('assets/img/avatar.png') ?>" alt="avatar" height="40" width="40"></span>
                            <?php } ?>
                        </a>
                        <div class="dropdown-menu dropdown-menu-right">
                            <a class="dropdown-item" href="<?= base_url() ?>admin/profile"><i class="feather icon-user"></i> Edit Profile</a>
                            <div class="dropdown-divider"></div><a class="dropdown-item" href="<?= base_url() ?>admin/logout"><i class="feather icon-power"></i> Logout</a>
                        </div>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</nav>
<!-- END: Header-->