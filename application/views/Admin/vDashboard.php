<div class="main-panel">
	<div class="content-wrapper">
		<div class="row">
			<div class="col-md-12 grid-margin">
				<div class="row">
					<div class="col-12 col-xl-8 mb-4 mb-xl-0">
						<h3 class="font-weight-bold">Welcome Admin</h3>
					</div>
				</div>
			</div>
		</div>
		<?php
		$kriteria = $this->db->query("SELECT COUNT(id) as jml_kriteria FROM `spk_smart_kriteria`")->row();
		$jenis_mobil = $this->db->query("SELECT COUNT(id_penilaian) as jml_mobil FROM `spk_smart_penilaian`")->row();
		$user = $this->db->query("SELECT COUNT(id_admin) as jml_admin FROM `spk_admin`")->row();
		$rekomendasi = $this->db->query("SELECT * FROM `hasil_smart` JOIN spk_smart_penilaian ON hasil_smart.id_penilaian=spk_smart_penilaian.id_penilaian ORDER BY hasil DESC LIMIT 1")->row();
		?>
		<div class="row">
			<div class="col-md-6 grid-margin stretch-card">
				<div class="card tale-bg">
					<div class="card-people mt-auto">
						<img src="<?= base_url('asset/skydash/') ?>images/dashboard/people.svg" alt="people">
						<div class="weather-info">
							<div class="d-flex">
								<div>
									<h2 class="mb-0 font-weight-normal"><i class="icon-sun mr-2"></i>23<sup>C</sup></h2>
								</div>
								<div class="ml-2">
									<h4 class="location font-weight-normal">Kuningan</h4>
									<h6 class="font-weight-normal">Jawa Barat</h6>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
			<div class="col-md-6 grid-margin transparent">
				<div class="row">
					<div class="col-md-6 mb-4 stretch-card transparent">
						<div class="card card-tale">
							<div class="card-body">
								<p class="mb-4">Kriteria</p>
								<p class="fs-30 mb-2"><?= $kriteria->jml_kriteria ?></p>
								<p>Metode SMART</p>
							</div>
						</div>
					</div>
					<div class="col-md-6 mb-4 stretch-card transparent">
						<div class="card card-dark-blue">
							<div class="card-body">
								<p class="mb-4">Jenis Mobil</p>
								<p class="fs-30 mb-2"><?= $jenis_mobil->jml_mobil ?></p>
								<p>unit</p>
							</div>
						</div>
					</div>
				</div>
				<div class="row">
					<div class="col-md-6 mb-4 mb-lg-0 stretch-card transparent">
						<div class="card card-light-blue">
							<div class="card-body">
								<p class="mb-4">User</p>
								<p class="fs-30 mb-2"><?= $user->jml_admin ?></p>
								<p>aktor</p>
							</div>
						</div>
					</div>
					<?php
					if ($rekomendasi) {
					?>
						<div class="col-md-6 stretch-card transparent">
							<div class="card card-light-danger">
								<div class="card-body">
									<p class="mb-4">Rekomendasi Mobil</p>
									<p class="fs-30 mb-2"><?= $rekomendasi->nama_jenis ?></p>
									<p><?= $rekomendasi->hasil ?></p>
								</div>
							</div>
						</div>
					<?php
					}
					?>

				</div>
			</div>
		</div>

	</div>
