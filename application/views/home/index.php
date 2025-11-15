<style>
.form-section {
    width: 100vw;                  /* Pastikan lebar penuh */
    min-height: 100vh;             /* Tinggi penuh layar */
    background-image: url('<?= base_url("assets/dist/img/muh15.png"); ?>');
    background-size: cover;        /* Gambar menutupi seluruh layar */
    background-position: center;   /* Fokus tengah gambar */
    background-repeat: no-repeat;

    display: flex;
    justify-content: center;
    align-items: center;

    padding: 0;
    margin: 0;

    position: relative;
}

/* Layer gelap */
.form-section::before {
    content: "";
    position: absolute;
    inset: 0;
    background: rgba(0,0,0,0.45);
    backdrop-filter: blur(0px);
    z-index: 1;
}

.form-container {
    position: relative;
    z-index: 2;
    width: 100%;
    max-width: 420px;              /* Form kecil tapi background full */
    padding: 20px;
}

.form-card {
    background: white;
    padding: 25px;
    border-radius: 12px;
    box-shadow: 0 4px 15px rgba(0,0,0,0.35);
}

h3 {
    text-align: center;
    color: white;
    text-shadow: 0 3px 6px rgba(0,0,0,0.8);
    margin-bottom: 20px;
    position: relative;
    z-index: 2;
}
</style>

<section class="form-section">
    <div class="form-container">

        <h3>Form Peminjaman Tamu</h3>

        <form action="<?= base_url('home/store') ?>" method="POST" class="form-card" enctype="multipart/form-data">

            <label>Nama Tamu</label>
            <input type="text" name="userpeminjaman_tamu" required>

            <label>Email</label>
            <input type="email" name="email" required>

            <label>Tanggal Pinjam</label>
            <input type="date" name="tanggal_pinjam" required>

            <label>Tanggal Kembali</label>
            <input type="date" name="tanggal_kembali" required>

            <label>Deskripsi</label>
            <textarea name="deskripsi" required></textarea>

            <label>Gambar Pengambilan</label>
            <input type="file" name="gambar_pengambilan">

            <button type="submit" class="btn-primary">Kirim</button>
        </form>

    </div>
</section>
