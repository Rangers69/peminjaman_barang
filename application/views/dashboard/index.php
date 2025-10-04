<div class="content-wrapper">
    <section class="content-header">
        <div class="container-fluid">
            <h1>Dashboard</h1>
        </div>
    </section>
    <section class="content">
        <div class="container-fluid">
            <div class="alert alert-info">
                Selamat datang, <b><?= $user['nama']; ?></b>!
            </div>
            <div class="row">
                <div class="col-md-6">
                    <div class="card bg-primary text-white">
                        <div class="card-body">
                            <h5>Total Peminjaman</h5>
                            <h2><?= $total_peminjaman; ?></h2>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="card bg-success text-white">
                        <div class="card-body">
                            <h5>Total Pengembalian</h5>
                            <h2><?= $total_pengembalian; ?></h2>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>