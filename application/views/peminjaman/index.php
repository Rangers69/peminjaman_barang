<div class="content-wrapper">
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Data Peminjaman</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="<?= base_url(); ?>">Home</a></li>
                        <li class="breadcrumb-item active">Peminjaman</li>
                    </ol>
                </div>
            </div>
        </div>
    </section>

    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">Daftar Peminjaman Barang</h3>
                            <div class="card-tools float-right">
                                <button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#addPeminjamanModal">
                                    <i class="fas fa-plus"></i> Add
                                </button>
                            </div>
                        </div>
                        <div class="card-body">
                        <?= $this->session->flashdata('message'); ?>
                            <table id="peminjamanTable" class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Nama Peminjam</th>
                                        <th>Email</th>
                                        <th>Tanggal Pinjam</th>
                                        <th>Tanggal Kembali</th>
                                        <th>Status</th>
                                        <th>Deskripsi</th>
                                        <th>Gambar Pengambilan</th>
                                        <th width='24%'>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $i=1; foreach ($peminjaman as $row) : ?>
                                        <tr>
                                            <td><?= $i++?></td>
                                            <td><?= $row['nama_peminjam']; ?></td>
                                            <td><?= $row['email']; ?></td>
                                            <td><?= date('d F Y', strtotime($row['tanggal_pinjam'])); ?></td>
                                            <td><?= date('d F Y', strtotime($row['tanggal_kembali'])); ?></td>
                                            <td><?= $row['status'] ? 'Dipinjam' : 'Dikembalikan'; ?></td>
                                            <td><?= $row['deskripsi']; ?></td>
                                            <td>
                                                <?php if (!empty($row['gambar_pengambilan'])) : ?>
                                                    <a href="<?= base_url('uploads/peminjaman/' . $row['gambar_pengambilan']); ?>" target="_blank">
                                                        <img src="<?= base_url('uploads/peminjaman/' . $row['gambar_pengambilan']); ?>" alt="Pengambilan" width="50px">
                                                    </a>
                                                <?php else : ?>
                                                    <span class="text-muted">No Image</span>
                                                <?php endif; ?>
                                            </td>
                                           
                                            <td class="action-buttons">
                                                <button data-toggle="modal" data-target="#edit<?= $row['id_peminjaman']?>" class="btn btn-warning btn-sm"><i 
                                                class="fas fa-edit"></i>Edit</button>
                                                <a href="<?= base_url('peminjaman/delete/' . $row['id_peminjaman']); ?>" class="btn btn-danger btn-sm" onclick="return 
												confirm('Apakah anda yakin menghapus data ini?')"><i class="fas fa-trash"></i>Delete</a>
                                                <a href="<?= base_url('peminjaman/returned/' . $row['id_peminjaman']); ?>" class="btn btn-success btn-sm">
                                                    Returned
                                                </a>
                                            </td>
                                        </tr>
                                    <?php endforeach; ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>

<div class="modal fade" id="addPeminjamanModal" tabindex="-1" role="dialog" aria-labelledby="addPeminjamanModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="addPeminjamanModalLabel">Tambah Data Peminjaman</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form id="formAddPeminjaman" enctype="multipart/form-data" action="<?= base_url('peminjaman/add'); ?>" method="post">
                <div class="modal-body">
                    <div class="form-group">
                        <label for="id_userpinjam">Nama Peminjam</label>
                        <input type="text" class="form-control" name="nama" value="<?= $user['nama']; ?>" readonly>
                        <input type="hidden" class="form-control" id="id_userpinjam" name="id_userpinjam" value="<?= $user['id_user']; ?>" required>
                    </div>
                    <div class="form-group">
                        <label for="email">Email</label>
                        <input type="email" class="form-control" id="email" name="email" value="<?= $user['email']; ?>" readonly>
                    </div>
                    <div class="form-group">
                        <label for="tanggal_pinjam">Tanggal Pinjam</label>
                        <input type="date" class="form-control" id="tanggal_pinjam" name="tanggal_pinjam" required>
                    </div>
                    <div class="form-group">
                        <label for="tanggal_kembali">Tanggal Kembali</label>
                        <input type="date" class="form-control" id="tanggal_kembali" name="tanggal_kembali" required>
                    </div>
                    <div class="form-group">
                        <label for="status">Status</label>
                        <select class="form-control" id="status" name="status" value= required>
                            <option value="Dipinjam">Dipinjam</option>
                            <option value="Dikembalikan">Dikembalikan</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="deskripsi">Deskripsi</label>
                        <input type="text"  class="form-control" id="deskripsi" name="deskripsi" rows="3" required>
                    </div>
                    <div class="form-group">
                        <label for="gambar_pengambilan">Gambar Pengambilan</label>
                        <input type="file" class="form-control-file" id="gambar_pengambilan" name="gambar_pengambilan" accept="image/*">
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                        <button type="submit" class="btn btn-primary">Tambah</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>


<div class="modal fade" id="editPeminjamanModal" tabindex="-1" role="dialog" aria-labelledby="editPeminjamanModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="editPeminjamanModalLabel">Edit Data Peminjaman</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form id="formEditPeminjaman" enctype="multipart/form-data" action="<?= base_url('peminjaman/update'); ?>" method="post">
                <div class="modal-body">
                    <input type="hidden" id="edit_id" name="id_userpinjam">
                    
                    <div class="form-group">
                        <label for="edit_id_userpinjam">Nama Peminjam</label>
                        <input type="text" class="form-control" value="<?= $row['nama_peminjam']; ?>" disabled>
                        <input type="hidden" name="id_userpinjam" value="<?= $row['id_userpinjam']; ?>">
                    </div>
                    
                    <div class="form-group">
                        <label for="edit_email">Email</label>
                        <input type="email" class="form-control" value="<?= $row['email']; ?>" disabled>
                        <input type="hidden" name="email" value="<?= $row['email']; ?>">
                    </div>

                    <div class="form-group">
                        <label for="edit_tanggal_pinjam">Tanggal Pinjam</label>
                        <input type="date" class="form-control" id="edit_tanggal_pinjam" name="tanggal_pinjam" required>
                    </div>
                    <div class="form-group">
                        <label for="edit_tanggal_kembali">Tanggal Kembali</label>
                        <input type="date" class="form-control" id="edit_tanggal_kembali" name="tanggal_kembali" required>
                    </div>
                    <div class="form-group">
                        <label for="edit_status">Status</label>
                        <select class="form-control" id="edit_status" name="status" required>
                            <option value="Dipinjam">Dipinjam</option>
                            <option value="Dikembalikan">Dikembalikan</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="edit_gambar_pengambilan">Gambar Pengambilan</label>
                        <input type="file" class="form-control-file" id="edit_gambar_pengambilan" name="gambar_pengambilan" accept="image/*">
                        <small class="form-text text-muted">Biarkan kosong jika tidak ingin mengubah gambar.</small>
                        <div id="current_gambar_pengambilan"></div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                    <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
                </div>
            </form>
        </div>
    </div>
</div>

<script src="<?= base_url('assets/') ?>plugins/jquery/jquery.min.js"></script>
<script src="<?= base_url('assets/') ?>plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="<?= base_url('assets/') ?>plugins/datatables/jquery.dataTables.min.js"></script>
<script src="<?= base_url('assets/') ?>plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
<script src="<?= base_url('assets/') ?>plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
<script src="<?= base_url('assets/') ?>plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
<script src="<?= base_url('assets/') ?>plugins/datatables-buttons/js/dataTables.buttons.min.js"></script>
<script src="<?= base_url('assets/') ?>plugins/datatables-buttons/js/buttons.bootstrap4.min.js"></script>
<script src="<?= base_url('assets/') ?>plugins/jszip/jszip.min.js"></script>
<script src="<?= base_url('assets/') ?>plugins/pdfmake/pdfmake.min.js"></script>
<script src="<?= base_url('assets/') ?>plugins/pdfmake/vfs_fonts.js"></script>
<script src="<?= base_url('assets/') ?>plugins/datatables-buttons/js/buttons.html5.min.js"></script>
<script src="<?= base_url('assets/') ?>plugins/datatables-buttons/js/buttons.print.min.js"></script>
<script src="<?= base_url('assets/') ?>plugins/datatables-buttons/js/buttons.colVis.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<script>
    $(document).ready(function() {
        // Inisialisasi DataTables
        $('#peminjamanTable').DataTable({
            "paging": true,
            "lengthChange": true,
            "searching": true,
            "ordering": true,
            "info": true,
            "autoWidth": false,
            "responsive": true,
            "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
        }).buttons().container().appendTo('#peminjamanTable_wrapper .col-md-6:eq(0)');

        // Handle Form Add Peminjaman (CREATE)
        $('#formAddPeminjaman').on('submit', function(e) {
            e.preventDefault();
            var formData = new FormData(this);

            $.ajax({
                url: '<?= base_url('peminjaman/add'); ?>',
                type: 'POST',
                data: formData,
                processData: false,
                contentType: false,
                dataType: 'json',
                success: function(response) {
                    if (response.status === 'success') {
                        Swal.fire({
                            icon: 'success',
                            title: 'Berhasil!',
                            text: response.message,
                            showConfirmButton: false,
                            timer: 1500
                        }).then(() => {
                            $('#addPeminjamanModal').modal('hide');
                            $('#formAddPeminjaman')[0].reset();
                            location.reload();
                        });
                    } else {
                        Swal.fire({
                            icon: 'error',
                            title: 'Gagal!',
                            html: response.message
                        });
                    }
                },
                error: function(xhr, status, error) {
                    console.error(xhr.responseText);
                    Swal.fire({
                        icon: 'error',
                        title: 'Error!',
                        text: 'Terjadi kesalahan saat menambahkan data.'
                    });
                }
            });
        });

        // Handle Tombol Edit (READ for UPDATE)
        $(document).on('click', '.btn-edit', function() {
            var id = $(this).data('id');
            $.ajax({
                url: '<?= base_url('peminjaman/get_peminjaman_by_id/'); ?>' + id,
                type: 'GET',
                dataType: 'json',
                success: function(data) {
                    if (data) {
                        $('#edit_id').val(data.id_peminjaman);
                        $('#edit_id_userpinjam').val(data.id_userpinjam);
                        $('#edit_email').val(data.email);
                        $('#edit_tanggal_pinjam').val(data.tanggal_pinjam);
                        $('#edit_tanggal_kembali').val(data.tanggal_kembali);
                        $('#edit_status').val(data.status);

                        // Tampilkan gambar pengambilan yang sudah ada
                        $('#current_gambar_pengambilan').html('');
                        if (data.gambar_pengambilan) {
                            $('#current_gambar_pengambilan').html(
                                '<small>Gambar saat ini:</small><br>' +
                                '<img src="<?= base_url('uploads/peminjaman/'); ?>' + data.gambar_pengambilan + '" width="100px">'
                            );
                        }

                        // Tampilkan gambar pengembalian yang sudah ada
                        $('#current_gambar_pengembalian').html('');
                        if (data.gambar_pengembalian) {
                            $('#current_gambar_pengembalian').html(
                                '<small>Gambar saat ini:</small><br>' +
                                '<img src="<?= base_url('uploads/peminjaman/'); ?>' + data.gambar_pengembalian + '" width="100px">'
                            );
                        } else {
                            $('#current_gambar_pengembalian').html('<small>Belum ada gambar pengembalian.</small>');
                        }

                        $('#editPeminjamanModal').modal('show');
                    } else {
                        Swal.fire({
                            icon: 'error',
                            title: 'Tidak Ditemukan!',
                            text: 'Data peminjaman tidak ditemukan.'
                        });
                    }
                },
                error: function(xhr, status, error) {
                    console.error(xhr.responseText);
                    Swal.fire({
                        icon: 'error',
                        title: 'Error!',
                        text: 'Gagal mengambil data untuk diedit.'
                    });
                }
            });
        });

        // Handle Form Edit Peminjaman (UPDATE)
        $('#formEditPeminjaman').on('submit', function(e) {
            e.preventDefault();
            var formData = new FormData(this);

            $.ajax({
                url: '<?= base_url('peminjaman/update'); ?>',
                type: 'POST',
                data: formData,
                processData: false,
                contentType: false,
                dataType: 'json',
                success: function(response) {
                    if (response.status === 'success') {
                        Swal.fire({
                            icon: 'success',
                            title: 'Berhasil!',
                            text: response.message,
                            showConfirmButton: false,
                            timer: 1500
                        }).then(() => {
                            $('#editPeminjamanModal').modal('hide');
                            location.reload();
                        });
                    } else {
                        Swal.fire({
                            icon: 'error',
                            title: 'Gagal!',
                            html: response.message
                        });
                    }
                },
                error: function(xhr, status, error) {
                    console.error(xhr.responseText);
                    Swal.fire({
                        icon: 'error',
                        title: 'Error!',
                        text: 'Terjadi kesalahan saat memperbarui data.'
                    });
                }
            });
        });

        // Handle Tombol Delete (DELETE)
        $(document).on('click', '.btn-delete', function() {
            var id = $(this).data('id');
            Swal.fire({
                title: 'Apakah Anda yakin?',
                text: "Data peminjaman ini akan dihapus secara permanen!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Ya, hapus!',
                cancelButtonText: 'Batal'
            }).then((result) => {
                if (result.isConfirmed) {
                    $.ajax({
                        url: '<?= base_url('peminjaman/delete/'); ?>' + id,
                        type: 'POST',
                        dataType: 'json',
                        success: function(response) {
                            if (response.status === 'success') {
                                Swal.fire({
                                    icon: 'success',
                                    title: 'Terhapus!',
                                    text: response.message,
                                    showConfirmButton: false,
                                    timer: 1500
                                }).then(() => {
                                    location.reload();
                                });
                            } else {
                                Swal.fire({
                                    icon: 'error',
                                    title: 'Gagal!',
                                    text: response.message
                                });
                            }
                        },
                        error: function(xhr, status, error) {
                            console.error(xhr.responseText);
                            Swal.fire({
                                icon: 'error',
                                title: 'Error!',
                                text: 'Terjadi kesalahan saat menghapus data.'
                            });
                        }
                    });
                }
            })
        });
    });
</script>