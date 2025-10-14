<div class="main-panel">
	<div class="content-wrapper">
		<div class="row">
			<div class="col-lg-12 grid-margin stretch-card">
				<div class="card">
					<div class="card-body">
						<h2 class="card-title">Katalog Jenis Mobil</h2>
						<hr>
						<h5>Filter: </h5>
						<form action="<?= base_url('Admin/cRekomendasi/filter') ?>" method="POST">
							<div class="row">
								<div class="col-lg-4">
									<div class="form-group">
										<select class="form-control" name="jenis" required>
											<option value="">---Pilih Jenis Mobil---</option>
											<!-- <option value="all">All</option> -->
											<option value="MPV">MPV</option>
											<option value="SUV">SUV</option>
											<option value="City Car">City Car</option>
											<option value="Hatchback">Hatchback</option>
											<option value="Sedan">Sedan</option>
										</select>
									</div>
								</div>

								<div class="col-lg-4">
									<div class="form-group">
										<select class="form-control" name="nama" required>
											<option value="">---Pilih Merk Mobil---</option>
											<option value="all">All</option>
											<?php
											foreach ($mobil as $key => $value) {
											?>
												<option value="<?= $value->nama_jenis ?>"><?= $value->nama_jenis ?></option>
											<?php
											}
											?>
										</select>
									</div>
								</div>
								<div class="col-lg-4">
									<div class="form-group">
										<select class="form-control" name="transmisi" required>
											<option value="">---Pilih Transmisi---</option>
											<!-- <option value="all">All</option> -->
											<option value="Manual">Manual</option>
											<option value="Automatic">Automatic</option>
											<option value="CVT">CVT</option>
											<option value="Dual Clutch">Dual Clutch</option>
										</select>
									</div>
								</div>
								<div class="col-lg-3">
									<div class="form-group">
										<select class="form-control" name="kondisi" required>
											<option value="">---Pilih Kondisi Mobil---</option>
											<!-- <option value="all">All</option> -->
											<option value="Sangat Baik">Sangat Baik</option>
											<option value="Baik">Baik</option>
											<option value="Cukup">Cukup</option>
											<option value="Kurang">Kurang</option>
											<option value="Buruk">Buruk</option>
										</select>
									</div>
								</div>
								<div class="col-lg-3">
									<div class="form-group">
										<select class="form-control" name="tahun" required>
											<option value="">---Pilih Tahun Mobil---</option>
											<!-- <option value="all">All</option> -->
											<option value="1">Lebih dari Tahun 2021</option>
											<option value="2">2017 - 2020</option>
											<option value="3">2014 - 2016</option>
											<option value="4">Kurang dari 2014</option>
										</select>
									</div>
								</div>
								<div class="col-lg-3">
									<div class="form-group">
										<select class="form-control" name="kapasitas" required>
											<option value="">---Pilih Kapasitas---</option>
											<!-- <option value="all">All</option> -->
											<option value="1">Lebih dari 8 orang</option>
											<option value="2">6 orang - 7 orang</option>
											<option value="3">2 orang - 5 orang</option>
										</select>
									</div>
								</div>
								<div class="col-lg-3">
									<div class="form-group">
										<select class="form-control" name="harga" required>
											<option value="">---Pilih Range Harga---</option>
											<!-- <option value="all">All</option> -->
											<option value="1">Kurang dari Rp. 300 juta</option>
											<option value="2">Rp. 300 juta - Rp. 400 juta</option>
											<option value="3">Rp. 400 juta - Rp. 500 juta</option>
											<option value="4">Rp. 500 juta - Rp. 600 juta</option>
											<option value="5">Lebih dari Rp. 600 juta</option>
										</select>
									</div>
								</div>

								<div class="col-lg-4">
									<button type="submit" class="btn btn-primary">Search</button>
									<a href="<?= base_url('Admin/cRekomendasi') ?>" class="btn btn-danger">Kembali</a>
								</div>
							</div>
						</form>
						<hr>
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
						<div class="row">
							<?php
							if (!$mobil) {
							?>
								<div class="col-lg-12">
									<div class="card">
										<div class="card-body">
											<div class="alert alert-danger" role="alert">
												<strong>Infomasi! </strong>Data Tidak Tersedia!
											</div>
										</div>
									</div>
								</div>

								<?php
								?>
								<?php
							} else {
								foreach ($mobil as $key => $value) {
								?>
									<div class="col-lg-4">
										<div class="card" style="width: 18rem;">
											<img src="<?= base_url('asset/gambar/' . $value->gambar) ?>" class="card-img-top" alt="...">
											<div class="card-body">
												<h5 class="card-title"><?= $value->jenis ?> | <?= $value->nama_jenis ?><br> <?= $value->transmisi ?></h5>
												<p class="card-text">Kondisi: <?= $value->kondisi ?><br>
													Tahun: <?= $value->tahun ?><br>
													Kapasitas Penumpang: <?= $value->kapasitas ?> orang</p>
												<span class="btn btn-primary">Harga <strong>Rp. <?= number_format($value->harga) ?></strong></span>
											</div>
										</div>
										<hr>
									</div>
							<?php
								}
							}
							?>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>