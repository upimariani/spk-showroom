<!-- partial -->
<div class="main-panel">
	<div class="content-wrapper">
		<div class="row">
			<div class="col-lg-12 grid-margin stretch-card">
				<div class="card">
					<div class="card-body">
						<h4 class="card-title">Tambah Mobil Yang Diperlukan</h4>
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
						<p class="card-description">
							Pilih Mobil sebagai variabel hasil rekomendasi mobil
						</p>
						<form action="<?= base_url('Admin/cRekomendasi/add') ?>" method="POST" class="forms-sample">
							<div class="form-group">
								<label for="exampleInputUsername1">Mobil</label>
								<div class="form-group">
									<select name="mobil" class="js-example-basic-single w-100" required>
										<?php
										foreach ($mobil as $key => $value) {
										?>
											<option value="<?= $value->id_penilaian ?>"><?= $value->nama_jenis ?></option>
										<?php
										}
										?>
									</select>
								</div>
								<button type="submit" class="btn btn-primary mr-2">Submit</button>
								<button class="btn btn-light">Cancel</button>
						</form>
						<hr>
						<?php
						if ($this->cart->contents()) {
						?>
							<table id="myTable" class="table">
								<thead>
									<tr>
										<th>No</th>
										<th>Nama Jenis</th>
										<th>Tahun</th>
										<th>Harga</th>
										<th>Kondisi</th>
										<th>Kapasitas</th>
										<th>Action</th>
									</tr>
								</thead>
								<tbody>
									<?php
									$no = 1;
									foreach ($this->cart->contents() as $key => $value) {
									?>
										<tr>
											<td><?= $no++ ?>.</td>
											<td><?= $value['name'] ?></td>
											<td><?= $value['tahun'] ?></td>
											<td>Rp. <?= number_format($value['price'])  ?></td>
											<td><?= $value['kondisi'] ?></td>
											<td><?= $value['kapasitas'] ?></td>
											<td><a href="<?= base_url('Admin/cRekomendasi/delete/' . $value['rowid']) ?>" class="btn btn-danger btn-sm"><i class="mdi mdi-filter-remove"></i></a> </td>
										</tr>
									<?php
									}
									?>


								</tbody>
							</table>

							<hr>
							<h4 class="card-title">Data Pelanggan</h4>
							<form class="forms-sample">
								<div class="form-group row">
									<label for="exampleInputUsername2" class="col-sm-3 col-form-label">Nama Pelanggan</label>
									<div class="col-sm-9">
										<input type="text" class="form-control" id="exampleInputUsername2" placeholder="Masukkan Nama Pelanggan">
									</div>
								</div>
								<div class="form-group row">
									<label for="exampleInputEmail2" class="col-sm-3 col-form-label">Nomor Telepon</label>
									<div class="col-sm-9">
										<input type="number" class="form-control" id="exampleInputEmail2" placeholder="Masukkan Nomor Telepon">
									</div>
								</div>
								<div class="form-group row">
									<label for="exampleInputMobile" class="col-sm-3 col-form-label">Jenis Kelamin</label>
									<div class="col-sm-9">
										<select name="" id="" class="form-control">
											<option value="Perempuan">Perempuan</option>
											<option value="Laki-Laki">Laki-Laki</option>
										</select>
									</div>
								</div>
								<div class="form-group row">
									<label for="exampleInputPassword2" class="col-sm-3 col-form-label">Alamat</label>
									<div class="col-sm-9">
										<input type="text" class="form-control" id="exampleInputPassword2" placeholder="Password">
									</div>
								</div>

								<button type="submit" class="btn btn-primary mr-2">Submit</button>
								<button class="btn btn-light">Cancel</button>
							</form>
						<?php
						}
						?>

					</div>
				</div>
			</div>

		</div>
	</div>
</div>
