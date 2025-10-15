<div class="content-wrapper">
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Dashboard</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="<?= base_url(); ?>">Home</a></li>
                        <li class="breadcrumb-item active">Dashboard</li>
                    </ol>
                </div>
            </div>
        </div>
    </section>

    <section class="content">
        <div class="container-fluid">
            <div class="row justify-content-center">
                <div class="col-md-6">
                    <div class="card shadow" style="border-radius: 18px;">
                        <div class="card-body text-center">
                            <!-- Foto profil user -->
                            <?php
                                // Ganti path foto sesuai field di database Anda, misal $user['foto']
                                $foto = isset($user['foto']) && $user['foto'] ? base_url('assets/img/profile/' . $user['foto']) : base_url('assets/img/profile/default.png');
                            ?>
                            <img src="<?= $foto ?>" alt="Foto Profil" class="rounded-circle mb-3" style="width:110px;height:110px;object-fit:cover;box-shadow:0 2px 8px rgba(33,147,176,0.15);border:4px solid #6dd5ed;">
                            <h3 class="mb-0"><?= $this->session->userdata('nama') ?></h3>
                            <p class="text-muted mb-2"><?= $this->session->userdata('email') ?></p>
                            <span class="badge badge-info px-3 py-2 mb-2" style="font-size:1rem;">
                                <?= ucfirst($this->session->userdata('role')) ?>
                            </span>
                            <div class="mt-3">
                                <a href="<?= base_url('auth/logout'); ?>" class="btn btn-danger btn-sm">
                                    <i class="fas fa-sign-out-alt"></i> Logout
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>

<script src="<?= base_url('assets/') ?>plugins/jquery/jquery.min.js"></script>
<script src="<?= base_url('assets/') ?>plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- ...script lainnya tetap... -->