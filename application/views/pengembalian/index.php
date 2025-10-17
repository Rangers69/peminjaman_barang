<div class="content-wrapper">
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Data Pengembalian</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="<?= base_url(); ?>">Home</a></li>
                        <li class="breadcrumb-item active">Pengembalian</li>
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
                            <h3 class="card-title">Daftar Pengembalian Barang</h3>
                            <div class="card-tools float-right">
                            </div>
                        </div>
                        <div class="card-body">
                        <div class="row align-items-center mb-3">
                            <div class="col-md-7 col-12 mb-2 mb-md-0">
                                <div id="peminjamanTable_buttons" class="d-flex flex-wrap"></div>
                            </div>
                            <div class="col-md-5 col-12 text-md-right">
                                <div id="peminjamanTable_filter" class="dataTables_filter"></div>
                            </div>
                        </div>
                        <div class="row mb-2 align-items-end" style="min-height: 0px;">
                            <div class="col-auto pr-1" style="margin-left: 500px;">
                                <input type="date" id="from_date" class="form-control form-control-sm" style="width:110px; font-size:15px; padding:5px 5px;" placeholder="From date">
                            </div>
                            <div class="col-auto pr-1">
                                <input type="date" id="to_date" class="form-control form-control-sm" style="width:110px; font-size:15px; padding:5px 5px;" placeholder="To date">
                            </div>
                            <div class="col-auto pr-1">
                                <button id="filter_date" class="btn btn-primary btn-sm" style="font-size:15px; padding:5px 10px;"><i class="fas fa-search"></i> Cari</button>
                            </div>
                            <div class="col-auto">
                                <button id="reset_date" class="btn btn-secondary btn-sm" style="font-size:15px; padding:5px 10px;">Reset</button>
                            </div>
                        </div>
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
                                        <th>Gambar Pengambilan</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $i=1; foreach ($pengembalian as $row) : ?>
                                        <tr>
                                            <td><?= $i++?></td>
                                            <td><?= htmlspecialchars($row['nama_peminjam']); ?></td>
                                            <td><?= htmlspecialchars($row['email']); ?></td>
                                            <td><?= htmlspecialchars(date('d F Y', strtotime($row['tanggal_pinjam']))); ?></td>
                                            <td><?= htmlspecialchars(date('d F Y', strtotime($row['tanggal_kembali']))); ?></td>
                                            <td><?= $row['status'] ? 'Dipinjam' : 'Dikembalikan'; ?></td>
                                            <td>
                                                <?php if (!empty($row['gambar_pengambilan'])) : ?>
                                                    <a href="<?= base_url('uploads/peminjaman/' . $row['gambar_pengambilan']); ?>" target="_blank">
                                                        <img src="<?= base_url('uploads/peminjaman/' . $row['gambar_pengambilan']); ?>" alt="Pengambilan" width="50px">
                                                    </a>
                                                <?php else : ?>
                                                    <span class="text-muted">No Image</span>
                                                <?php endif; ?>
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
    // tampilkan lebih banyak tombol nomor pagination (atur sebelum inisialisasi DataTable)
    $.fn.dataTable.ext.pager.numbers_length = 12; // ubah 12 sesuai kebutuhan

    // simpan instance DataTable ke variabel 'table' supaya table.draw() bekerja
    var table = $('#peminjamanTable').DataTable({
        paging: true,
        pagingType: 'full_numbers', // previous, numbers, simple, full_numbers, ...
        pageLength: 10,
        lengthMenu: [10, 25, 50, 100],
        dom: '<"row align-items-center mb-3"' +
                '<"col-md-7 col-12 mb-2 mb-md-0"B>' +
                '<"col-md-5 col-12 text-md-right"f>' +
            '>rtip',
        buttons: ["copy", "csv", "excel", "pdf", "print", "colvis"],
        initComplete: function () {
            $('#peminjamanTable_wrapper .dataTables_paginate').addClass('pt-3');
        }
    });
    

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
 </script>