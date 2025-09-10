<div class="content-wrapper">
	<section class="content-header">
		<div class="container-fluid">
			<div class="row mb-2">
				<div class="col-sm-6">
					<h1>User Pengguna</h1>
				</div>
				<div class="col-sm-6">
					<ol class="breadcrumb float-sm-right">
						<li class="breadcrumb-item"><a href="<?= base_url(); ?>">Home</a></li>
						<li class="breadcrumb-item active">User</li>
					</ol>
				</div>
			</div>
		</div>
	</section>

	<!-- Main Content -->
	<div class="p-4">
		<!-- Validation and Flashdata Messages -->
		<?= form_error('nama', '<div class="alert alert-danger" role="alert">', '</div>'); ?>
		<?= form_error('email', '<div class="alert alert-danger" role="alert">', '</div>'); ?>
		<?= form_error('password', '<div class="alert alert-danger" role="alert">', '</div>'); ?>
		<?= form_error('role', '<div class="alert alert-danger" role="alert">', '</div>'); ?>
		<?= form_error('alamat', '<div class="alert alert-danger" role="alert">', '</div>'); ?>
		<?= form_error('no_hp', '<div class="alert alert-danger" role="alert">', '</div>'); ?>
		<?= $this->session->flashdata('message'); ?>

		<!-- Add User Button -->
		<div class="mb-4">
			<button
				class="btn btn-primary bg-blue-600 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded-md shadow-md transition duration-300"
				data-toggle="modal" data-target="#addUserModal">Tambah Pengguna Baru</button>
		</div>

		<!-- User Table -->
		<div class="card">
			<div class="card-header">
				<h3 class="card-title">Member Pengguna</h3>
			</div>
			<!-- /.card-header -->
			<div class="card-body">
				<div id="example1_wrapper" class="dataTables_wrapper dt-bootstrap4">
					<div class="row">
						<div class="col-sm-12 col-md-6">
							<div class="dt-buttons btn-group flex-wrap"> <button
									class="btn btn-secondary buttons-copy buttons-html5" tabindex="0"
									aria-controls="example1" type="button"><span>Copy</span></button> <button
									class="btn btn-secondary buttons-csv buttons-html5" tabindex="0"
									aria-controls="example1" type="button"><span>CSV</span></button> <button
									class="btn btn-secondary buttons-excel buttons-html5" tabindex="0"
									aria-controls="example1" type="button"><span>Excel</span></button> <button
									class="btn btn-secondary buttons-pdf buttons-html5" tabindex="0"
									aria-controls="example1" type="button"><span>PDF</span></button> <button
									class="btn btn-secondary buttons-print" tabindex="0" aria-controls="example1"
									type="button"><span>Print</span></button>
								<div class="btn-group"><button
										class="btn btn-secondary buttons-collection dropdown-toggle buttons-colvis"
										tabindex="0" aria-controls="example1" type="button"
										aria-haspopup="true"><span>Column visibility</span><span
											class="dt-down-arrow"></span></button></div>
							</div>
						</div>
						<div class="col-sm-12 col-md-6">
							<div id="example1_filter" class="dataTables_filter"><label>Search:<input type="search"
										class="form-control form-control-sm" placeholder=""
										aria-controls="example1"></label></div>
						</div>
					</div>
					<div class="row">
						<div class="col-sm-12">
							<table id="example1" class="table table-bordered table-striped dataTable dtr-inline"
								aria-describedby="example1_info">
								<thead>
									<tr>
                                        <th class="py-3 px-4 text-left">No</th>
                                        <th class="py-3 px-4 text-left">Nama</th>
                                        <th class="py-3 px-4 text-left">Email</th>
                                        <th class="py-3 px-4 text-left">Role</th>
                                        <th class="py-3 px-4 text-left">No Hp</th>
                                        <th class="py-3 px-4 text-left">Alamat</th>
                                        <th class="py-3 px-4 text-left">Action</th>
									</tr>
								</thead>
								<tbody>
                                <?php $i = 1; foreach ($users as $u) : ?>
                                    <tr>
                                        <td><?= $i++; ?></td>
                                        <td><?= $u['nama']; ?></td>
                                        <td><?= $u['email']; ?></td>
                                        <td><?= $u['role']; ?></td>
                                        <td><?= $u['no_telp']; ?></td>
                                        <td><?= $u['alamat']; ?></td>
                                        <td>
                                            <button data-toggle="modal" data-target="#edit<?= $u['id_user']?>" class="btn btn-warning btn-sm"><i 
                                            class="fas fa-edit"></i>Edit</button>
                                            <a href="<?= base_url('user/delete/' . $u['id_user']); ?>" class="btn btn-danger btn-sm" onclick="return 
												confirm('Apakah anda yakin menghapus data ini?')"><i class="fas fa-trash"></i>Delete</a>
                                        </td>
                                    </tr>
                                <?php endforeach; ?>
								</tbody>
							</table>
						</div>
					</div>
					<div class="row">
						<div class="col-sm-12 col-md-5">
							<div class="dataTables_info" id="example1_info" role="status" aria-live="polite">Showing 11
								to 20 of 57 entries</div>
						</div>
						<div class="col-sm-12 col-md-7">
							<div class="dataTables_paginate paging_simple_numbers" id="example1_paginate">
								<ul class="pagination">
									<li class="paginate_button page-item previous" id="example1_previous"><a href="#"
											aria-controls="example1" data-dt-idx="0" tabindex="0"
											class="page-link">Previous</a></li>
									<li class="paginate_button page-item "><a href="#" aria-controls="example1"
											data-dt-idx="1" tabindex="0" class="page-link">1</a></li>
									<li class="paginate_button page-item active"><a href="#" aria-controls="example1"
											data-dt-idx="2" tabindex="0" class="page-link">2</a></li>
									<li class="paginate_button page-item "><a href="#" aria-controls="example1"
											data-dt-idx="3" tabindex="0" class="page-link">3</a></li>
									<li class="paginate_button page-item "><a href="#" aria-controls="example1"
											data-dt-idx="4" tabindex="0" class="page-link">4</a></li>
									<li class="paginate_button page-item "><a href="#" aria-controls="example1"
											data-dt-idx="5" tabindex="0" class="page-link">5</a></li>
									<li class="paginate_button page-item "><a href="#" aria-controls="example1"
											data-dt-idx="6" tabindex="0" class="page-link">6</a></li>
									<li class="paginate_button page-item next" id="example1_next"><a href="#"
											aria-controls="example1" data-dt-idx="7" tabindex="0"
											class="page-link">Next</a></li>
								</ul>
							</div>
						</div>
					</div>
				</div>
			</div>
			<!-- /.card-body -->
		</div>
	</div>
</div>

<!-- Modals for Add and Edit User -->
<!-- Modal Tambah Pengguna -->
<div class="modal fade" id="addUserModal" tabindex="-1" role="dialog" aria-labelledby="addUserModalLabel"
	aria-hidden="true">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="addUserModalLabel">Tambah Pengguna Baru</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<form id="formAddUser" action="<?= base_url('user/add'); ?>" method="post">
				<div class="modal-body">
					<div class="form-group">
						<label for="username">Nama</label>
						<input type="text" class="form-control" id="name" name="name" placeholder="Nama Pengguna"
							required>
					</div>
					<div class="form-group">
						<label for="email">Email</label>
						<input type="email" class="form-control" id="email" name="email" placeholder="Email" required>
					</div>
					<div class="form-group">
						<label for="password">Kata Sandi</label>
						<input type="password" class="form-control" id="password" name="password"
							placeholder="Kata Sandi" required>
					</div>
					<div class="form-group">
						<label for="confirm_password">Konfirmasi Kata Sandi</label>
						<input type="password" class="form-control" id="confirm_password" name="confirm_password"
							placeholder="Konfirmasi Kata Sandi" required>
					</div>
					<div class="form-group">
						<label for="role">Role</label>
						<select name="role" id="role" class="form-control" required>
							<option value="">Pilih Role</option>
							<option value="Admin">Admin</option>
							<option value="Customer">Customer</option>
						</select>
					</div>
					<div class="form-group">
						<label for="alamat">Alamat</label>
						<input type="text" class="form-control" id="alamat" name="alamat" placeholder="Alamat" required>
					</div>
					<div class="form-group">
						<label for="no_hp">No Hp</label>
						<input type="text" class="form-control" id="no_hp" name="no_hp" placeholder="Nomor Telepon"
							required>
					</div>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
					<button type="submit" class="btn btn-primary">Tambah</button>
				</div>
			</form>
		</div>
	</div>
</div>

<!-- Modal Edit Pengguna -->
 <?php foreach($users as $u) { ?>
<div class="modal fade" id="edit<?= $u['id_user']?>" tabindex="-1" role="dialog" aria-labelledby="editUserModalLabel"
	aria-hidden="true">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="editUserModalLabel">Edit Pengguna</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<form id="formEditUser" action="<?= base_url('user/edit'); ?>" method="post">
				<div class="modal-body">
					<input type="hidden" id="edit_id" name="id_user" value="<?= $u['id_user']; ?>" required>
					<div class="form-group">
						<label for="edit_username">Nama</label>
						<input type="text" class="form-control" name="name" value="<?= $u['nama']; ?>" required>
					</div>
					<div class="form-group">
						<label for="edit_email">Email</label>
						<input type="email" class="form-control" name="email" value="<?= $u['email']; ?>" required>
					</div>
					<div class="form-group">
						<label for="edit_password">Kata Sandi (Biarkan kosong jika tidak ingin mengubah)</label>
						<input type="password" class="form-control" id="edit_password" name="password">
					</div>
					<div class="form-group">
						<label for="edit_confirm_password">Konfirmasi Kata Sandi</label>
						<input type="password" class="form-control" id="edit_confirm_password" name="confirm_password">
					</div>
					<div class="form-group">
						<label for="edit_role">Role</label>
						<select name="role" id="edit_role" class="form-control" required>
							<option value="Admin">Admin</option>
							<option value="Customer">Customer</option>
						</select>
					</div>
					<div class="form-group">
						<label for="edit_alamat">Alamat</label>
						<input type="text" class="form-control" id="edit_alamat" name="alamat" value="<?= $u['alamat']; ?>" required>
					</div>
					<div class="form-group">
						<label for="edit_no_hp">No Hp</label>
						<input type="text" class="form-control" name="no_telp" value="<?= $u['no_telp']; ?>" required>
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
<?php } ?>

<!-- jQuery -->
<script src="<?php echo base_url('assets/') ?>plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="<?php echo base_url('assets/') ?>plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- DataTables  & Plugins -->
<script src="<?php echo base_url('assets/') ?>plugins/datatables/jquery.dataTables.min.js"></script>
<script src="<?php echo base_url('assets/') ?>plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
<script src="<?php echo base_url('assets/') ?>plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
<script src="<?php echo base_url('assets/') ?>plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
<script src="<?php echo base_url('assets/') ?>plugins/datatables-buttons/js/dataTables.buttons.min.js"></script>
<script src="<?php echo base_url('assets/') ?>plugins/datatables-buttons/js/buttons.bootstrap4.min.js"></script>
<script src="<?php echo base_url('assets/') ?>plugins/jszip/jszip.min.js"></script>
<script src="<?php echo base_url('assets/') ?>plugins/pdfmake/pdfmake.min.js"></script>
<script src="<?php echo base_url('assets/') ?>plugins/pdfmake/vfs_fonts.js"></script>
<script src="<?php echo base_url('assets/') ?>plugins/datatables-buttons/js/buttons.html5.min.js"></script>
<script src="<?php echo base_url('assets/') ?>plugins/datatables-buttons/js/buttons.print.min.js"></script>
<script src="<?php echo base_url('assets/') ?>plugins/datatables-buttons/js/buttons.colVis.min.js"></script>
<!-- AdminLTE App -->
<script src="<?php echo base_url('assets/') ?>dist/js/adminlte.min.js?v=3.2.0"></script>
<!-- AdminLTE for demo purposes -->
<script src="<?php echo base_url('assets/') ?>dist/js/demo.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<script>
  $(function () {
    $("#example1").DataTable({
      "responsive": true, "lengthChange": false, "autoWidth": false,
      "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
    }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');

    // $('#example2').DataTable({
    //   "paging": true,
    //   "lengthChange": false,
    //   "searching": false,
    //   "ordering": true,
    //   "info": true,
    //   "autoWidth": false,
    //   "responsive": true,
    // });
  });
</script>

<script>
	$(document).ready(function () {
		// Handle Form Tambah Pengguna (CREATE)
		$('#formAddUser').on('submit', function (e) {
			console.log('test')
			e.preventDefault();
			var formData = $(this).serialize();

			$.ajax({
				url: '<?php echo base_url('
				user / add '); ?>',
				type: 'POST',
				data: formData,
				dataType: 'json',
				success: function (response) {
					if (response.status === 'success') {
						Swal.fire({
							icon: 'success',
							title: 'Berhasil!',
							text: response.message,
							showConfirmButton: false,
							timer: 1500
						}).then(() => {
							$('#addUserModal').modal('hide');
							$('#formAddUser')[0].reset();
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
				error: function (xhr, status, error) {
					console.error(xhr.responseText);
					Swal.fire({
						icon: 'error',
						title: 'Error!',
						text: 'Terjadi kesalahan saat menambahkan data.'
					});
				}
			});
		});

		// Handle Tombol Edit Pengguna (READ for UPDATE)
		$(document).on('click', '.btn-edit-user', function () {
			var id = $(this).data('id');
			$.ajax({
				url: '<?php echo base_url('
				user / get_user_by_id / '); ?>' + id,
				type: 'GET',
				dataType: 'json',
				success: function (data) {
					if (data) {
						$('#edit_id').val(data.id);
						$('#edit_username').val(data.username);
						$('#edit_email').val(data.email);
						$('#edit_role').val(data.role);
						$('#edit_alamat').val(data.alamat);
						$('#edit_no_hp').val(data.no_hp);
						$('#edit_password').val('');
						$('#edit_confirm_password').val('');
						$('#editUserModal').modal('show');
					} else {
						Swal.fire({
							icon: 'error',
							title: 'Tidak Ditemukan!',
							text: 'Data pengguna tidak ditemukan.'
						});
					}
				},
				error: function (xhr, status, error) {
					console.error(xhr.responseText);
					Swal.fire({
						icon: 'error',
						title: 'Error!',
						text: 'Gagal mengambil data untuk diedit.'
					});
				}
			});
		});

		// Handle Form Edit Pengguna (UPDATE)
		$('#formEditUser').on('submit', function (e) {
			e.preventDefault();
			var formData = $(this).serialize();

			$.ajax({
				url: '<?php echo base_url('
				user / update '); ?>',
				type: 'POST',
				data: formData,
				dataType: 'json',
				success: function (response) {
					if (response.status === 'success') {
						Swal.fire({
							icon: 'success',
							title: 'Berhasil!',
							text: response.message,
							showConfirmButton: false,
							timer: 1500
						}).then(() => {
							$('#editUserModal').modal('hide');
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
				error: function (xhr, status, error) {
					console.error(xhr.responseText);
					Swal.fire({
						icon: 'error',
						title: 'Error!',
						text: 'Terjadi kesalahan saat memperbarui data.'
					});
				}
			});
		});

		// Handle Tombol Hapus Pengguna (DELETE)
		$(document).on('click', '.btn-delete-user', function () {
			var id = $(this).data('id');
			Swal.fire({
				title: 'Apakah Anda yakin?',
				text: "Data pengguna ini akan dihapus secara permanen!",
				icon: 'warning',
				showCancelButton: true,
				confirmButtonColor: '#3085d6',
				cancelButtonColor: '#d33',
				confirmButtonText: 'Ya, hapus!',
				cancelButtonText: 'Batal'
			}).then((result) => {
				if (result.isConfirmed) {
					$.ajax({
						url: '<?php echo base_url('
						user / delete / '); ?>' + id,
						type: 'POST',
						dataType: 'json',
						success: function (response) {
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
						error: function (xhr, status, error) {
							console.error(xhr.responseText);
							Swal.fire({
								icon: 'error',
								title: 'Error!',
								text: 'Terjadi kesalahan saat menghapus data.'
							});
						}
					});
				}
			});
		});
	});

</script>
