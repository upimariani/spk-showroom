<div class="main-panel">
	<div class="content-wrapper">
		<div class="row">
			<div class="col-lg-12 grid-margin stretch-card">
				<div class="card">
					<div class="card-body">
						<h4 class="card-title">Informasi Perhitungan Perbandingan - Metode SMART</h4>
						<p>Informasi Penilaian Kriteria Mobil</p>
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
							<table class="table tbl">
								<thead>
									<tr>
										<th>No</th>
										<th>Nama Mobil</th>
										<th>Tahun</th>
										<th>Harga</th>
										<th>Kondisi Interior</th>
										<th>Kapasitas Penumpang</th>

									</tr>
								</thead>
								<tbody>
									<?php

									$no = 1;
									foreach ($penilaian as $key => $value) {
									?>
										<tr>
											<td><?= $no++ ?>.</td>
											<td><?= $value->nama_jenis ?></td>
											<td><?= $value->tahun ?></td>
											<td>Rp. <?= number_format($value->harga)  ?></td>
											<td><?= $value->kondisi ?></td>
											<td><?= $value->kapasitas ?> orang</td>
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
			<div class="col-lg-12 grid-margin stretch-card">
				<div class="card">
					<div class="card-body">
						<p>Informasi Bobot Penilaian Kriteria Mobil</p>
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
							<table class="table tbl">
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
									$v1 = array();
									$v2 = array();
									$v3 = array();
									$v4 = array();
									$variabel = $this->db->query("SELECT * FROM `hasil_smart`")->result();
									foreach ($variabel as $key => $value) {
										$v1[] = $value->b_kondisi;
										$v2[] = $value->b_kapasitas;
										$v3[] = $value->b_tahun;
										$v4[] = $value->b_harga;
									}

									//mencari nilai min dan max
									$min_v1 = min($v1);
									$max_v1 = max($v1);
									$p_v1 = $max_v1 - $min_v1;

									$min_v2 = min($v2);
									$max_v2 = max($v2);
									$p_v2 = $max_v2 - $min_v2;

									$min_v3 = min($v3);
									$max_v3 = max($v3);
									$p_v3 = $max_v3 - $min_v3;

									$min_v4 = min($v4);
									$max_v4 = max($v4);
									$p_v4 = $max_v4 - $min_v4;

									//mencari nilai u
									foreach ($variabel as $key => $a) {
										if ($p_v1 != 0) {
											$u1 = ($a->b_kondisi - $min_v1) / $p_v1;
										} else {
											$u1 = 0;
										}

										if ($p_v2 != 0) {
											$u2 = ($a->b_kapasitas - $min_v2) / $p_v2;
										} else {
											$u2 = 0;
										}

										if ($p_v3 != 0) {
											$u3 = ($a->b_tahun - $min_v3) / $p_v3;
										} else {
											$u3 = 0;
										}

										if ($p_v4 != 0) {
											$u4 = ($a->b_harga - $min_v4) / $p_v4;
										} else {
											$u4 = 0;
										}

										//mengkalikan dengan bobot ternormalisasi dan dijumlahkan
										$bt_total = (0.75 * $u1) + (0.2 * $u2) + (0.75 * $u3) + (0.75 * $u4);
									}
									$no = 1;
									foreach ($bobot as $key => $value) {
									?>
										<tr>
											<td><?= $no++ ?>.</td>
											<td><?= $value->nama_jenis ?></td>
											<td><?= $value->b_tahun ?></td>
											<td><?= $value->b_harga ?></td>
											<td><?= $value->b_kondisi ?></td>
											<td><?= $value->b_kapasitas ?></td>
											<td><?= $value->hasil ?></td>
										</tr>
									<?php
									}
									?>
								</tbody>
								<tfoot>
									<tr>
										<td></td>
										<td></td>
										<td>Min : <?= $min_v3 ?> <br>
											Max : <?= $max_v3 ?></td>
										<td>Min : <?= $min_v4 ?> <br>
											Max : <?= $max_v4 ?></td>
										<td>Min : <?= $min_v1 ?> <br>
											Max : <?= $max_v1 ?></td>
										<td>Min : <?= $min_v2 ?> <br>
											Max : <?= $max_v2 ?></td>
										<td></td>
									</tr>
								</tfoot>
							</table>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>