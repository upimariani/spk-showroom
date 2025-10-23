<div class="main-panel">
	<div class="content-wrapper">
		<div class="row">
			<div class="col-lg-12 grid-margin stretch-card">
				<div class="card">
					<div class="card-body">
						<h4 class="card-title">Jenis Mobil</h4>
						<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
							Tambah Data Jenis Mobil
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
								<?= form_open_multipart('Admin/cJenisMobil/create') ?>
								<div class="modal-content">
									<div class="modal-header">
										<h5 class="modal-title" id="exampleModalLabel">Tambah Data Jenis Mobil</h5>
										<button type="button" class="close" data-dismiss="modal" aria-label="Close">
											<span aria-hidden="true">&times;</span>
										</button>
									</div>
									<div class="modal-body">
										<div class="form-group row">
											<label for="exampleInputUsername2" class="col-sm-3 col-form-label">Jenis Mobil</label>
											<div class="col-sm-9">
												<select class="form-control" name="jenis" required>
													<option value="">---Pilih Jenis Mobil---</option>
													<option value="MPV">MPV</option>
													<option value="SUV">SUV</option>
													<option value="City Car">City Car</option>
													<!-- <option value="Hatchback">Hatchback</option>
													<option value="Sedan">Sedan</option> -->
												</select>
											</div>
										</div>
										<div class="form-group row">
											<label for="exampleInputUsername2" class="col-sm-3 col-form-label">Merk Mobil</label>
											<div class="col-sm-9">
												<input type="text" class="form-control" id="exampleInputUsername2" placeholder="Masukkan Merk Mobil" name="nama" required>
											</div>
										</div>
										<div class="form-group row">
											<label for="exampleInputMobile" class="col-sm-3 col-form-label">Tahun</label>
											<div class="col-sm-9">
												<input type="number" name="tahun" class="form-control" id="exampleInputMobile" placeholder="Masukkan Tahun" required>
											</div>
										</div>
										<div class="form-group row">
											<label for="exampleInputMobile" class="col-sm-3 col-form-label">Harga</label>
											<div class="col-sm-9">
												<input type="number" name="harga" class="form-control" id="exampleInputMobile" placeholder="Masukkan Harga Mobil" required>
											</div>
										</div>
										<div class="form-group row">
											<label for="exampleInputEmail2" class="col-sm-3 col-form-label">Kondisi</label>
											<div class="col-sm-9">
												<select class="form-control" name="kondisi" required>
													<option value="">---Pilih Kondisi Mobil---</option>
													<option value="Sangat Baik">Sangat Baik</option>
													<option value="Baik">Baik</option>
													<option value="Cukup">Cukup</option>
													<option value="Kurang">Kurang</option>
													<option value="Buruk">Buruk</option>
												</select>
											</div>
										</div>
										<div class="form-group row">
											<label for="exampleInputMobile" class="col-sm-3 col-form-label">Kapasitas Orang</label>
											<div class="col-sm-9">
												<input type="number" name="kapasitas" class="form-control" id="exampleInputMobile" placeholder="Masukkan Kapasitas Orang" required>
											</div>
										</div>
										<!-- <div class="form-group row">
											<label for="exampleInputEmail2" class="col-sm-3 col-form-label">Transmisi</label>
											<div class="col-sm-9">
												<select class="form-control" name="transmisi" required>
													<option value="">---Pilih Transmisi---</option>
													<option value="Manual">Manual</option>
													<option value="Automatic">Automatic</option>
													<option value="CVT">CVT</option>
													<option value="Dual Clutch">Dual Clutch</option>
												</select>
											</div>
										</div> -->
										<div class="form-group row">
											<label for="exampleInputMobile" class="col-sm-3 col-form-label">Gambar Mobil</label>
											<div class="col-sm-9">
												<input type="file" name="gambar" class="form-control" id="exampleInputMobile" required>
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
										<th>Merk Mobil</th>
										<th>Tahun</th>
										<th>Harga</th>
										<th>Kondisi Interior</th>
										<th>Kapasitas Penumpang</th>
										<th>Action</th>
									</tr>
								</thead>
								<tbody>
									<?php
									$no = 1;
									foreach ($jenis_mobil as $key => $value) {
									?>
										<tr>
											<td><?= $no++ ?>.</td>
											<td>
												<a href="<?= base_url('asset/gambar/' . $value->gambar) ?>"><img src="<?= base_url('asset/gambar/' . $value->gambar) ?>" alt="image" /></a> <?= $value->nama_jenis ?><br>
												<strong><?= $value->jenis ?></strong>
											</td>
											<td><?= $value->tahun ?></td>
											<td>Rp. <?= number_format($value->harga)  ?></td>
											<td><?= $value->kondisi ?></td>
											<td><?= $value->kapasitas ?> orang</td>
											<td>
												<a href="<?= base_url('Admin/cJenisMobil/delete/' . $value->id_penilaian) ?>" class="btn btn-danger btn-sm">Hapus</a>
												<button data-toggle="modal" data-target="#edit<?= $value->id_penilaian ?>" class="btn btn-warning btn-sm">Edit</button>
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
	<?php foreach ($jenis_mobil as $key => $value) {
	?>
		<div class="modal fade" id="edit<?= $value->id_penilaian ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
			<div class="modal-dialog">
				<?= form_open_multipart('Admin/cJenisMobil/update/' . $value->id_penilaian) ?>
				<div class="modal-content">
					<div class="modal-header">
						<h5 class="modal-title" id="exampleModalLabel">Update Data Jenis Mobil</h5>
						<button type="button" class="close" data-dismiss="modal" aria-label="Close">
							<span aria-hidden="true">&times;</span>
						</button>
					</div>
					<div class="modal-body">
						<div class="form-group row">
							<label for="exampleInputUsername2" class="col-sm-3 col-form-label">Jenis Mobil</label>
							<div class="col-sm-9">
								<select class="form-control" name="jenis" required>
									<option value="">---Pilih Jenis Mobil---</option>
									<option <?php if ($value->jenis == 'MPV') {
												echo 'selected';
											} ?> value="MPV">MPV</option>
									<option <?php if ($value->jenis == 'SUV') {
												echo 'selected';
											} ?> value="SUV">SUV</option>
									<option <?php if ($value->jenis == 'City') {
												echo 'selected';
											} ?> value="City Car">City Car</option>

								</select>
							</div>
						</div>
						<div class="form-group row">
							<label for="exampleInputUsername2" class="col-sm-3 col-form-label">Merk Mobil</label>
							<div class="col-sm-9">
								<input type="text" value="<?= $value->nama_jenis ?>" class="form-control" id="exampleInputUsername2" placeholder="Masukkan Merk Mobil" name="nama" required>
							</div>
						</div>
						<div class="form-group row">
							<label for="exampleInputMobile" class="col-sm-3 col-form-label">Tahun</label>
							<div class="col-sm-9">
								<input type="number" value="<?= $value->tahun ?>" name="tahun" class="form-control" id="exampleInputMobile" placeholder="Masukkan Tahun" required>
							</div>
						</div>
						<div class="form-group row">
							<label for="exampleInputMobile" class="col-sm-3 col-form-label">Harga</label>
							<div class="col-sm-9">
								<input type="number" name="harga" value="<?= $value->harga ?>" class="form-control" id="exampleInputMobile" placeholder="Masukkan Harga Mobil" required>
							</div>
						</div>
						<div class="form-group row">
							<label for="exampleInputEmail2" class="col-sm-3 col-form-label">Kondisi</label>
							<div class="col-sm-9">
								<select class="form-control" name="kondisi" required>
									<option value="">---Pilih Kondisi Mobil---</option>
									<option <?php if ($value->kondisi == 'Sangat Baik') {
												echo 'selected';
											} ?> value="Sangat Baik">Sangat Baik</option>
									<option <?php if ($value->kondisi == 'Baik') {
												echo 'selected';
											} ?> value="Baik">Baik</option>
									<option <?php if ($value->kondisi == 'Cukup') {
												echo 'selected';
											} ?> value="Cukup">Cukup</option>
									<option <?php if ($value->kondisi == 'Kurang') {
												echo 'selected';
											} ?> value="Kurang">Kurang</option>
									<option <?php if ($value->kondisi == 'Buruk') {
												echo 'selected';
											} ?> value="Buruk">Buruk</option>
								</select>
							</div>
						</div>
						<div class="form-group row">
							<label for="exampleInputMobile" class="col-sm-3 col-form-label">Kapasitas Orang</label>
							<div class="col-sm-9">
								<input type="number" value="<?= $value->kapasitas ?>" name="kapasitas" class="form-control" id="exampleInputMobile" placeholder="Masukkan Kapasitas Orang" required>
							</div>
						</div>
						<!-- <div class="form-group row">
							<label for="exampleInputEmail2" class="col-sm-3 col-form-label">Transmisi</label>
							<div class="col-sm-9">
								<select class="form-control" name="transmisi" required>
									<option value="">---Pilih Transmisi---</option>
									<option <?php if ($value->transmisi == 'Manual') {
												echo 'selected';
											} ?> value="Manual">Manual</option>
									<option <?php if ($value->transmisi == 'Automatic') {
												echo 'selected';
											} ?> value="Automatic">Automatic</option>
									<option <?php if ($value->transmisi == 'CVT') {
												echo 'selected';
											} ?> value="CVT">CVT</option>
									<option <?php if ($value->transmisi == 'Dual Clutch') {
												echo 'selected';
											} ?> value="Dual Clutch">Dual Clutch</option>
								</select>
							</div>
						</div> -->
						<div class="form-group row">
							<label for="exampleInputMobile" class="col-sm-3 col-form-label">Gambar Mobil</label>
							<div class="col-sm-9">
								<input type="file" name="gambar" class="form-control" id="exampleInputMobile">
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
