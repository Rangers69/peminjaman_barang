<!-- Main Content -->
    <main class="content">
        <div class="form-container">
            <div class="form-header">
                <h1><i class="fas fa-clipboard-check"></i> Form Peminjaman Tamu</h1>
            </div>

            <div class="form-card">
                <?php if($this->session->flashdata('error')): ?>
                    <div class="alert alert-danger">
                        <?= $this->session->flashdata('error') ?>
                    </div>
                <?php endif; ?>

                <?php if($this->session->flashdata('success')): ?>
                    <div class="alert alert-success">
                        <?= $this->session->flashdata('success') ?>
                    </div>
                <?php endif; ?>

                <?php echo validation_errors('<div class="alert alert-danger">', '</div>'); ?>
                <form action="<?= base_url('home/store_success') ?>" method="POST" enctype="multipart/form-data" id="peminjamanForm">
                    <!-- Nama Tamu -->
                    <div class="form-group">
                        <label class="form-label required">
                            <i class="fas fa-user"></i> Nama Tamu
                        </label>
                        <div class="input-with-icon">
                            <input type="text" name="userpeminjaman_tamu" class="form-input" placeholder="Masukkan nama lengkap" required>
                            <i class="fas fa-user input-icon"></i>
                        </div>
                        <div class="error-message" id="nama-error">
                            <i class="fas fa-exclamation-circle"></i> Nama harus diisi (minimal 3 karakter)
                        </div>
                    </div>

                    <!-- Email -->
                    <div class="form-group">
                        <label class="form-label required">
                            <i class="fas fa-envelope"></i> Email
                        </label>
                        <div class="input-with-icon">
                            <input type="email" name="email" class="form-input" placeholder="contoh@email.com" required>
                            <i class="fas fa-envelope input-icon"></i>
                        </div>
                        <div class="error-message" id="email-error">
                            <i class="fas fa-exclamation-circle"></i> Email tidak valid
                        </div>
                    </div>

                    <!-- Tanggal -->
                    <div class="form-group date-group">
                        <div>
                            <label class="form-label required">
                                <i class="fas fa-calendar-alt"></i> Tanggal Pinjam
                            </label>
                            <input type="date" name="tanggal_pinjam" class="form-input" required>
                        </div>
                        <div>
                            <label class="form-label required">
                                <i class="fas fa-calendar-check"></i> Tanggal Kembali
                            </label>
                            <input type="date" name="tanggal_kembali" class="form-input" required>
                        </div>
                    </div>
                    <div class="error-message" id="tanggal-error">
                        <i class="fas fa-exclamation-circle"></i> Tanggal kembali harus setelah tanggal pinjam
                    </div>

                    <!-- Deskripsi -->
                    <div class="form-group">
                        <label class="form-label required">
                            <i class="fas fa-file-alt"></i> Deskripsi Peminjaman
                        </label>
                        <textarea name="deskripsi" class="form-textarea" placeholder="Tujuan peminjaman, fasilitas yang ingin dipinjam, dan informasi lainnya" required></textarea>
                        <div class="info-text">Jelaskan secara detail tujuan dan kebutuhan peminjaman</div>
                        <div class="error-message" id="deskripsi-error">
                            <i class="fas fa-exclamation-circle"></i> Deskripsi harus diisi (minimal 10 karakter)
                        </div>
                    </div>

                    <!-- Gambar Pengambilan -->
                    <div class="form-group">
                        <label class="form-label">
                            <i class="fas fa-camera"></i> Gambar Pengambilan
                        </label>
                        <div class="file-container">
                            <input type="file" name="gambar_pengambilan" id="gambar_pengambilan" class="form-file" accept="image/*">
                            <label for="gambar_pengambilan" class="file-label">
                                <span class="file-text" id="file-text">Pilih file gambar (opsional)</span>
                                <span class="file-btn">
                                    <i class="fas fa-folder-open"></i> Pilih File
                                </span>
                            </label>
                        </div>
                        <div class="info-text">Format: JPG, PNG, GIF (maksimal 2MB)</div>
                    </div>

                    <!-- Submit Button -->
                    <button type="submit" class="submit-btn">
                        <i class="fas fa-paper-plane"></i> Kirim
                    </button>
                </form>
            </div>
        </div>
    </main>