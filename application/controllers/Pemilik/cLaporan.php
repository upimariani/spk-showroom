<?php
defined('BASEPATH') or exit('No direct script access allowed');

class cLaporan extends CI_Controller
{

	public function index()
	{
		require('asset/fpdf/fpdf.php');

		// intance object dan memberikan pengaturan halaman PDF
		$pdf = new FPDF('P', 'mm', 'A4');
		$pdf->AddPage();


		$pdf->SetFont('Times', 'B', 14);
		$pdf->Image('asset/showroom.png', 10, 3, 28);
		$pdf->Cell(200, 5, 'SHOWROOM MOBIL', 0, 1, 'C');

		$pdf->SetLineWidth(1);
		$pdf->Line(10, 43, 200, 43);
		$pdf->SetLineWidth(0);
		$pdf->Line(10, 42, 200, 42);
		$pdf->Cell(10, 30, '', 0, 1);



		$pdf->SetFont('Times', 'B', 14);
		$pdf->Cell(190, 10, 'LAPORAN HASIL REKOMENDASI JENIS MOBIL', 0, 1, 'C');
		$pdf->SetFont('Times', '', 10);

		$pdf->Cell(10, 10, '', 0, 1);
		$pdf->SetFont('Times', 'B', 9);
		$pdf->Cell(10, 7, 'No', 1, 0, 'C');
		$pdf->Cell(40, 7, 'Nama Mobil', 1, 0, 'C');
		$pdf->Cell(30, 7, 'Tahun', 1, 0, 'C');
		$pdf->Cell(30, 7, 'Harga', 1, 0, 'C');
		$pdf->Cell(40, 7, 'Kondisi Interior', 1, 0, 'C');
		$pdf->Cell(40, 7, 'Kapasitas Penumpang', 1, 1, 'C');

		$pdf->SetFont('Times', '', 9);
		$no = 1;
		$rekomendasi = $this->db->query("SELECT * FROM `hasil_smart` JOIN spk_smart_penilaian ON hasil_smart.id_penilaian=spk_smart_penilaian.id_penilaian ORDER BY hasil")->result();
		foreach ($rekomendasi as $key => $value) {

			$pdf->Cell(10, 7, $no++, 1, 0, 'R');
			$pdf->Cell(40, 7, $value->nama_jenis, 1, 0);
			$pdf->Cell(30, 7, $value->tahun, 1, 0, 'C');
			$pdf->Cell(30, 7, 'Rp. ' . number_format($value->harga), 1, 0, 'C');
			$pdf->Cell(40, 7, $value->kondisi, 1, 0, 'C');
			$pdf->Cell(40, 7, $value->kapasitas . ' orang', 1, 1, 'C');
		}



		$pdf->SetFont('Times', '', 9);
		$pdf->Cell(40, 7, '', 0, 1, 'C');
		$pdf->Cell(40, 7, '', 0, 1, 'C');



		$pdf->Cell(95, 7, 'Kuningan, ' . date('j F Y'), 0, 1, 'C');

		$pdf->Cell(95, 7, 'Pemilik Showroom Mobil', 0, 1, 'C');
		$pdf->Cell(95, 10, '', 0, 1, 'C');

		$pdf->SetFont('Times', 'B', 9);

		$pdf->Cell(95, 7, '(....................)', 0, 0, 'C');

		$pdf->Output();
	}
}

/* End of file cLaporan.php */
