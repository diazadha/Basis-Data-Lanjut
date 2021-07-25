<!-- Content Wrapper -->
<div id="content-wrapper" class="d-flex flex-column">

    <!-- Main Content -->
    <div id="content">

        <!-- Topbar -->
        <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

            <ul class="navbar-nav mr-auto ml-3">
                <li class="navbar-nav">
                    <h5><strong>
                            <a class="brand d-flex align-items-center justify-content-center" href="<?php echo site_url('Marketplace/index') ?>" style="text-decoration: none">
                                <div class="brand-icon rotate-n-15">
                                    <i class="fas fa-shopping-cart"></i>
                                </div>
                                <div class="brand-text mx-2">MarketPlace</div>
                            </a>
                        </strong>
                    </h5>
                </li>
            </ul>
            <!-- Topbar Navbar -->
            <ul class="navbar-nav ml-auto">
                <div class="topbar-divider d-none d-sm-block"></div>
                <!-- Nav Item - User Information -->
                <li class="nav-item dropdown no-arrow">
                    <a class="nav-link dropdown-toggle" href="<?= base_url() . 'cart'; ?>" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <span class="mr-2 d-none d-lg-inline text-gray-600 small">
                            <marquee behavior="scroll" direction="right" onmouseover="this.stop();" onmouseout="this.start();">Happy Shopping </marquee>
                        </span>
                    </a>

                </li>

            </ul>
        </nav>
        <!-- End of Topbar -->