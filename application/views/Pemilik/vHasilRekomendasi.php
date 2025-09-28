<div class="main-panel">
	<div class="content-wrapper">
		<div class="row">
			<div class="col-lg-12 grid-margin stretch-card">
				<div class="card">
					<div class="card-body">
						<h4 class="card-title">Hasil Rekomendasi Jenis Mobil</h4>
						<a href="<?= base_url('Pemilik/cLaporan') ?>" class="btn btn-primary">Cetak Laporan</a>
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
										<th>Nama Mobil</th>
										<th>Tahun</th>
										<th>Harga</th>
										<th>Kondisi Interior</th>
										<th>Kapasitas Penumpang</th>
										<th>Hasil</th>
									</tr>
								</thead>
								<tbody>
									<?php
									$no = 1;
									foreach ($hasil_rekomendasi as $key => $value) {
									?>
										<tr>
											<td><?= $no++ ?>.</td>
											<td><?= $value->nama_jenis ?></td>
											<td><?= $value->tahun ?></td>
											<td>Rp. <?= number_format($value->harga)  ?></td>
											<td><?= $value->kondisi ?></td>
											<td><?= $value->kapasitas ?> orang</td>
											<td><?= $value->hasil ?></td>

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
