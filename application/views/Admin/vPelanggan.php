<div class="main-panel">
	<div class="content-wrapper">
		<div class="row">
			<div class="col-lg-12 grid-margin stretch-card">
				<div class="card">
					<div class="card-body">
						<h4 class="card-title">Rekomendasi Pelanggan</h4>
						<a href="<?= base_url('Admin/cRekomendasi/create') ?>" class="btn btn-primary">
							Tambah Data Rekomendasi
						</a>
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
						<div class="table-responsive">
							<table id="myTable" class="table">
								<thead>
									<tr>
										<th>No</th>
										<th>Nama Pelanggan</th>
										<th>Nomor Telepon</th>
										<th>Jenis Kelamin</th>
										<th>Alamat</th>
										<th>Action</th>
									</tr>
								</thead>
								<tbody>
									<?php
									$no = 1;
									foreach ($pelanggan as $key => $value) {
									?>
										<tr>
											<td><?= $no++ ?>.</td>
											<td><?= $value->nama_pelanggan ?></td>
											<td><?= $value->no_hp ?></td>
											<td><?= $value->jk ?></td>
											<td><?= $value->alamat ?></td>
											<td><?= $value->id_pelanggan ?></td>
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
