    <!-- Footer -->
    <footer class="footer">
        <div class="container footer-content">
            <p><b> © <?= date('Y') ?> Sistem Peminjaman Tamu - SMK MUHAMMADIYAH 15 JAKARTA </b></p>
        </div>
    </footer>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Set minimum dates
            const today = new Date().toISOString().split('T')[0];
            const tanggalPinjam = document.querySelector('input[name="tanggal_pinjam"]');
            const tanggalKembali = document.querySelector('input[name="tanggal_kembali"]');
            const tanggalError = document.getElementById('tanggal-error');
            
            tanggalPinjam.min = today;
            tanggalKembali.min = today;
            
            // Date validation
            tanggalPinjam.addEventListener('change', function() {
                tanggalKembali.min = this.value;
                
                if (tanggalKembali.value && tanggalKembali.value < this.value) {
                    tanggalError.style.display = 'flex';
                    tanggalKembali.style.borderColor = '#fecaca';
                } else {
                    tanggalError.style.display = 'none';
                    tanggalKembali.style.borderColor = '#e2e8f0';
                }
            });
            
            tanggalKembali.addEventListener('change', function() {
                if (this.value < tanggalPinjam.value) {
                    tanggalError.style.display = 'flex';
                    this.style.borderColor = '#fecaca';
                } else {
                    tanggalError.style.display = 'none';
                    this.style.borderColor = '#e2e8f0';
                }
            });
            
            // File input display
            const fileInput = document.getElementById('gambar_pengambilan');
            const fileText = document.getElementById('file-text');
            
            fileInput.addEventListener('change', function() {
                if (this.files.length > 0) {
                    fileText.textContent = this.files[0].name;
                    
                    // File size validation (max 2MB)
                    if (this.files[0].size > 2 * 1024 * 1024) {
                        alert('Ukuran file terlalu besar. Maksimal 2MB.');
                        this.value = '';
                        fileText.textContent = 'Pilih file gambar (opsional)';
                    }
                } else {
                    fileText.textContent = 'Pilih file gambar (opsional)';
                }
            });
            
            // Real-time validation
            const namaInput = document.querySelector('input[name="userpeminjaman_tamu"]');
            const emailInput = document.querySelector('input[name="email"]');
            const deskripsiInput = document.querySelector('textarea[name="deskripsi"]');
            
            const namaError = document.getElementById('nama-error');
            const emailError = document.getElementById('email-error');
            const deskripsiError = document.getElementById('deskripsi-error');
            
            const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
            
            // Nama validation
            namaInput.addEventListener('input', function() {
                if (this.value.length < 3 && this.value.length > 0) {
                    namaError.style.display = 'flex';
                    this.style.borderColor = '#fecaca';
                } else {
                    namaError.style.display = 'none';
                    this.style.borderColor = this.value.length >= 3 ? '#bbf7d0' : '#e2e8f0';
                }
            });
            
            // Email validation
            emailInput.addEventListener('input', function() {
                if (!emailRegex.test(this.value) && this.value.length > 0) {
                    emailError.style.display = 'flex';
                    this.style.borderColor = '#fecaca';
                } else {
                    emailError.style.display = 'none';
                    this.style.borderColor = emailRegex.test(this.value) ? '#bbf7d0' : '#e2e8f0';
                }
            });
            
            // Deskripsi validation
            deskripsiInput.addEventListener('input', function() {
                if (this.value.length < 10 && this.value.length > 0) {
                    deskripsiError.style.display = 'flex';
                    this.style.borderColor = '#fecaca';
                } else {
                    deskripsiError.style.display = 'none';
                    this.style.borderColor = this.value.length >= 10 ? '#bbf7d0' : '#e2e8f0';
                }
            });
            
            // Form submission
            const form = document.getElementById('peminjamanForm');
            form.addEventListener('submit', function(event) {
                let isValid = true;
                
                // Reset errors
                const errors = document.querySelectorAll('.error-message');
                errors.forEach(error => error.style.display = 'none');
                
                // Validate nama
                if (namaInput.value.length < 3) {
                    namaError.style.display = 'flex';
                    namaInput.style.borderColor = '#fecaca';
                    isValid = false;
                }
                
                // Validate email
                if (!emailRegex.test(emailInput.value)) {
                    emailError.style.display = 'flex';
                    emailInput.style.borderColor = '#fecaca';
                    isValid = false;
                }
                
                // Validate dates
                if (tanggalKembali.value < tanggalPinjam.value) {
                    tanggalError.style.display = 'flex';
                    tanggalKembali.style.borderColor = '#fecaca';
                    isValid = false;
                }
                
                // Validate deskripsi
                if (deskripsiInput.value.length < 10) {
                    deskripsiError.style.display = 'flex';
                    deskripsiInput.style.borderColor = '#fecaca';
                    isValid = false;
                }
                
                if (!isValid) {
                    event.preventDefault();
                    
                    // Scroll to first error
                    const firstError = document.querySelector('.error-message[style*="display: flex"]');
                    if (firstError) {
                        firstError.scrollIntoView({ behavior: 'smooth', block: 'center' });
                    }
                    
                    // Show error notification
                    showNotification('Harap periksa kembali form yang Anda isi.', 'error');
                } else {
                    // Show loading state
                    const submitBtn = form.querySelector('.submit-btn');
                    const originalText = submitBtn.innerHTML;
                    submitBtn.innerHTML = '<i class="fas fa-spinner fa-spin"></i> Mengirim...';
                    submitBtn.disabled = true;
                    
                    // Re-enable after 3 seconds (for demo)
                    setTimeout(() => {
                        submitBtn.innerHTML = originalText;
                        submitBtn.disabled = false;
                        showNotification('Form berhasil dikirim!', 'success');
                    }, 3000);
                }
            });
            
            // Notification function
            function showNotification(message, type) {
                const notification = document.createElement('div');
                notification.style.cssText = `
                    position: fixed;
                    top: 20px;
                    right: 20px;
                    padding: 1rem 1.5rem;
                    border-radius: 8px;
                    color: white;
                    font-weight: 600;
                    z-index: 9999;
                    box-shadow: 0 5px 15px rgba(0,0,0,0.2);
                    animation: slideIn 0.3s ease-out;
                `;
                
                if (type === 'success') {
                    notification.style.backgroundColor = '#10b981';
                } else {
                    notification.style.backgroundColor = '#ef4444';
                }
                
                notification.textContent = message;
                document.body.appendChild(notification);
                
                // Remove after 4 seconds
                setTimeout(() => {
                    notification.style.animation = 'slideOut 0.3s ease-out';
                    setTimeout(() => {
                        document.body.removeChild(notification);
                    }, 300);
                }, 4000);
            }
            
            // Add CSS for animations
            const style = document.createElement('style');
            style.textContent = `
                @keyframes slideIn {
                    from { transform: translateX(100%); opacity: 0; }
                    to { transform: translateX(0); opacity: 1; }
                }
                @keyframes slideOut {
                    from { transform: translateX(0); opacity: 1; }
                    to { transform: translateX(100%); opacity: 0; }
                }
            `;
            document.head.appendChild(style);
        });
    </script>
</body>
</html>