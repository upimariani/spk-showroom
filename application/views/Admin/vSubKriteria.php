<div class="main-panel">
	<div class="content-wrapper">
		<div class="row">
			<div class="col-lg-12 grid-margin stretch-card">
				<div class="card">
					<div class="card-body">
						<h4 class="card-title">Sub Kriteria <strong><?= $dt_subkriteria->nama ?></strong></h4>
						<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
							Tambah Data Sub Kriteria <strong><?= $dt_subkriteria->nama ?></strong>
						</button>
						<?php
						if ($this->session->userdata('success')) {
						?>
							<div class="alert alert-success alert-dismissible fade show mt-3" role="alert">
								<strong>Sukses!</strong> <?= $this->session->userdata('success') ?>
								<button type="button" class="close" data-dismiss="alert" aria-label="Close">
									<span aria-hidden="true">&times;</span>
								</button>
							</div>
						<?php
						}
						?>

						<!-- Modal -->
						<!-- Modal -->
						<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
							<div class="modal-dialog">
								<form action="<?= base_url('Admin/cSubKriteria/create/' . $id_kriteria . '/' . $kriteria) ?>" method="POST">
									<div class="modal-content">
										<div class="modal-header">
											<h5 class="modal-title" id="exampleModalLabel">Tambah Data Sub Kriteria <strong><?= $dt_subkriteria->nama ?></strong></h5>
											<button type="button" class="close" data-dismiss="modal" aria-label="Close">
												<span aria-hidden="true">&times;</span>
											</button>
										</div>
										<div class="modal-body">
											<div class="form-group row">
												<label for="exampleInputUsername2" class="col-sm-3 col-form-label">Nama Sub Kriteria</label>
												<div class="col-sm-9">
													<input type="text" class="form-control" id="exampleInputUsername2" placeholder="Masukkan Nama Sub Kriteria" name="nama" required>
												</div>
											</div>
											<div class="form-group row">
												<label for="exampleInputMobile" class="col-sm-3 col-form-label">Bobot</label>
												<div class="col-sm-9">
													<input type="number" name="bobot" class="form-control" id="exampleInputMobile" placeholder="Masukkan Bobot Kriteria" required>
												</div>
											</div>


										</div>
										<div class="modal-footer">
											<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
											<button type="submit" class="btn btn-primary">Save changes</button>
										</div>
									</div>
								</form>
							</div>
						</div>
						<div class="table-responsive">
							<table id="myTable" class="table">
								<thead>
									<tr>
										<th>No</th>
										<th>Nama Sub Kriteria</th>
										<th>Bobot</th>
										<th class="text-center">Action</th>
									</tr>
								</thead>
								<tbody>
									<?php
									$no = 1;
									foreach ($sub_kriteria as $key => $value) {
									?>
										<tr>
											<td><?= $no++ ?>.</td>
											<td><?= $value->nama_sub ?></td>
											<td><?= $value->bobot_sub ?></td>
											<td class="text-center">
												<a href="<?= base_url('Admin/cSubKriteria/delete/' . $value->id . '/' . $value->nama . '/' . $value->id_sub_kriteria) ?>" class="btn btn-danger btn-sm">Hapus</a>
												<button data-toggle="modal" data-target="#edit<?= $value->id_sub_kriteria ?>" class="btn btn-warning btn-sm">Edit</button>

											</td>
										</tr>
									<?php
									}
									?>
								</tbody>
							</table>
						</div>
					</div>
				</div>
			</div>

		</div>
	</div>
	<?php foreach ($sub_kriteria as $key => $value) {
	?>
		<div class="modal fade" id="edit<?= $value->id_sub_kriteria ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
			<div class="modal-dialog">
				<form action="<?= base_url('Admin/cSubKriteria/update/' . $value->id . '/' . $value->nama . '/' . $value->id_sub_kriteria) ?>" method="POST">
					<div class="modal-content">
						<div class="modal-header">
							<h5 class="modal-title" id="exampleModalLabel">Update Data Sub Kriteria</h5>
							<button type="button" class="close" data-dismiss="modal" aria-label="Close">
								<span aria-hidden="true">&times;</span>
							</button>
						</div>
						<div class="modal-body">
							<div class="form-group row">
								<label for="exampleInputUsername2" class="col-sm-3 col-form-label">Nama Kriteria</label>
								<div class="col-sm-9">
									<input type="text" value="<?= $value->nama_sub ?>" class="form-control" id="exampleInputUsername2" placeholder="Masukkan Nama Sub Kriteria" name="nama" required>
								</div>
							</div>

							<div class="form-group row">
								<label for="exampleInputMobile" class="col-sm-3 col-form-label">Bobot</label>
								<div class="col-sm-9">
									<input type="number" value="<?= $value->bobot_sub ?>" name="bobot" class="form-control" id="exampleInputMobile" placeholder="Masukkan Bobot Kriteria" required>
								</div>
							</div>


						</div>
						<div class="modal-footer">
							<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
							<button type="submit" class="btn btn-primary">Save changes</button>
						</div>
					</div>
				</form>
			</div>
		</div>
	<?php
	}
	?>