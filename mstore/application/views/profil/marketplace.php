<div class="container-fluid">
    <h1 class="h3 mb-4 text-gray-800"><?= $title ?></h1>
    <div class="row">
        <div class="col-xl-8 col-lg-7">
            <div class="card shadow mb-4">
                <!-- Card Body -->
                <div class="card-body">
                    <h5 class="card-title"><?= $user['name']; ?></h5>
                    <p class="card-text"><?= $user['email']; ?></p>
                </div>
            </div>
        </div>

        <!-- Pie Chart -->
        <div class="col-xl-4 col-lg-5">
            <div class="card shadow mb-4">
                <!-- Card Header - Dropdown -->
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                    <h6 class="m-0 font-weight-bold text-primary">Profile</h6>
                </div>
                <!-- Card Body -->
                <div class="card-body">
                    <div class="col 1 mt-2 mb-4" align="center">

                        <img src="<?= base_url('assets/img/profile/') . $user['image']; ?>" class="card-img" alt="...">
                        <p class="card-text"><small class="text-muted">Since <?= date('d F Y', $user['date_created']); ?></small></p>

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->