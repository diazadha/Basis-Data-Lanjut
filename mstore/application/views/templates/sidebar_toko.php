<!-- Sidebar -->
<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

    <!-- query nama toko sesuai pegawai -->
    <?php
    $querynama = "SELECT `nama_toko`
                    FROM `toko` JOIN `admintoko`
                    ON `toko`.`id` = `admintoko`.`id_toko`
                ";
    //$nama = $this->db->query($querynama)->row_array();
    ?>
    <!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="<?= base_url('Profile_toko') ?>">
        <div class="sidebar-brand-icon">
            <img src="<?= base_url('assets/img/profile/') . $toko['foto_toko']; ?>" class="card-img" alt="" height="50" width="50">
        </div>
        <div class="sidebar-brand-text mx-3"><?= $toko['nama_toko']; ?></div>
    </a>

    <!-- Divider -->
    <hr class="sidebar-divider">

    <!-- Query menu -->
    <?php
    $id_role = $this->session->userdata('id_role');
    $queryMenu = "SELECT `user_menu`.`id`, `menu`
                    FROM `user_menu` JOIN `user_access_menu` 
                    ON `user_menu`.`id` = `user_access_menu`.`id_menu`
                    WHERE `user_access_menu`.`id_role` = $id_role
                    ORDER BY `user_access_menu`.`id_menu` ASC
                    ";

    $menu = $this->db->query($queryMenu)->result_array();
    ?>

    <!-- LOOPING MENU -->
    <?php foreach ($menu as $m) : ?>
        <div class="sidebar-heading">
            <?= $m['menu']; ?>
        </div>

        <!-- SIAPKAN SUB MENU SESUAI MENU -->
        <?php
        $id_menu = $m['id'];
        $querysubmenu = "SELECT *
                        FROM `user_sub_menu` JOIN `user_menu` 
                        ON `user_sub_menu`.`id_menu` = `user_menu`.`id`
                        WHERE `user_sub_menu`.`id_menu` = $id_menu
                        AND `user_sub_menu`.`is_active` = 1
                        ";

        $subMenu = $this->db->query($querysubmenu)->result_array();
        ?>

        <?php foreach ($subMenu as $sm) : ?>
            <?php if ($title == $sm['title']) : ?>
                <li class="nav-item active">
                <?php else : ?>
                <li class="nav-item">
                <?php endif; ?>
                <a class="nav-link" href="<?= base_url($sm['url']); ?>">
                    <i class="<?= $sm['icon']; ?>"></i>
                    <span><?= $sm['title']; ?></span></a>
                </li>
            <?php endforeach; ?>
            <hr class="sidebar-divider">
        <?php endforeach; ?>

        <!-- Nav Item - Dashboard 
    <li class="nav-item">
        <a class="nav-link" href="index.html">
            <i class="fas fa-fw fa-tachometer-alt"></i>
            <span>Dashboard</span></a>
    </li>
        -->
        <!-- Divider -->


        <!-- Nav Item - Logout -->
        <li class="nav-item">
            <a class="nav-link" href="<?= base_url('Authstoreadmin/logout'); ?>">
                <i class="fas fa-fw fa-sign-out-alt"></i>
                <span>Keluar</span></a>
        </li>

        <!-- Divider -->
        <hr class="sidebar-divider d-none d-md-block">

        <!-- Sidebar Toggler (Sidebar) -->
        <div class="text-center d-none d-md-inline">
            <button class="rounded-circle border-0" id="sidebarToggle"></button>
        </div>

</ul>
<!-- End of Sidebar -->