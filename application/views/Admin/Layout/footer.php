 <footer class="footer">
 	<div class="d-sm-flex justify-content-center justify-content-sm-between">
 		<span class="text-muted text-center text-sm-left d-block d-sm-inline-block">SISTEM PENUNJANG KEPUTUSAN - Rekomendasi Mobil - Showroom Mobil</span>
 	</div>
 	<div class="d-sm-flex justify-content-center justify-content-sm-between">
 		<span class="text-muted text-center text-sm-left d-block d-sm-inline-block">METODE SMART</span>
 	</div>
 </footer>
 <!-- partial -->
 </div>
 <!-- main-panel ends -->
 </div>
 <!-- page-body-wrapper ends -->
 </div>
 <!-- container-scroller -->

 <!-- plugins:js -->
 <script src="<?= base_url('asset/skydash/') ?>vendors/js/vendor.bundle.base.js"></script>

 <!-- <script src="<?= base_url('asset/skydash/') ?>vendors/chart.js/Chart.min.js"></script> -->

 <script src="<?= base_url('asset/skydash/') ?>vendors/typeahead.js/typeahead.bundle.min.js"></script>
 <script src="<?= base_url('asset/skydash/') ?>vendors/select2/select2.min.js"></script>
 <!-- End plugin js for this page -->
 <!-- inject:js -->
 <script src="<?= base_url('asset/skydash/') ?>js/off-canvas.js"></script>
 <script src="<?= base_url('asset/skydash/') ?>js/hoverable-collapse.js"></script>
 <script src="<?= base_url('asset/skydash/') ?>js/template.js"></script>
 <script src="<?= base_url('asset/skydash/') ?>js/settings.js"></script>
 <script src="<?= base_url('asset/skydash/') ?>js/todolist.js"></script>
 <!-- endinject -->

 <script src="<?= base_url('asset/skydash/') ?>js/file-upload.js"></script>
 <script src="<?= base_url('asset/skydash/') ?>js/typeahead.js"></script>
 <script src="<?= base_url('asset/skydash/') ?>js/select2.js"></script>
 <!-- Custom js for this page-->
 <script src="<?= base_url('asset/skydash/') ?>js/dashboard.js"></script>
 <script src="<?= base_url('asset/skydash/') ?>js/Chart.roundedBarCharts.js"></script>


 <!-- End custom js for this page-->
 <link href="<?= base_url('asset/') ?>datatables/datatables.min.css" rel="stylesheet">

 <script src="<?= base_url('asset/') ?>datatables/datatables.min.js"></script>


 <script>
 	$('#myTable').DataTable({
 		select: true
 	});

 	$('.tbl').DataTable({
 		select: true
 	});
 </script>
 <script>
 	document.getElementById('jenis').addEventListener('change', function() {
 		var jenis = this.value;

 		// Buat request AJAX ke controller
 		var xhr = new XMLHttpRequest();
 		xhr.open('GET', '<?= base_url('Admin/cRekomendasi/get_merk') ?>?jenis=' + jenis, true);

 		xhr.onload = function() {
 			if (xhr.status === 200) {
 				document.getElementById('merk').innerHTML = xhr.responseText;
 			}
 		};

 		xhr.send();
 	});
 </script>
 </body>

 </html>
