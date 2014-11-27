<?php

/* setting zona waktu */ 
date_default_timezone_set('Asia/Jakarta');

/* konstruktor halaman pdf sbb :    
   P  = Orientasinya "Potrait"
   cm = ukuran halaman dalam satuan centimeter
   A4 = Format Halaman
   
   jika ingin mensetting sendiri format halamannya, gunakan array(width, height)  
   contoh : $this->fpdf->FPDF("P","cm", array(20, 20));  
*/

$this->fpdf->FPDF("P","cm","A4");

// kita set marginnya dimulai dari kiri, atas, kanan. jika tidak diset, defaultnya 1 cm
$this->fpdf->SetMargins(1,1.5,1);


/* AliasNbPages() merupakan fungsi untuk menampilkan total halaman
   di footer, nanti kita akan membuat page number dengan format : number page / total page
*/
$this->fpdf->AliasNbPages();

// AddPage merupakan fungsi untuk membuat halaman baru
$this->fpdf->AddPage();

// Setting Font : String Family, String Style, Font size 
$this->fpdf->SetFont('Times','B',12);

/* Kita akan membuat header dari halaman pdf yang kita buat 
   -------------- Header Halaman dimulai dari baris ini -----------------------------
*/
$this->fpdf->Image('images/lambang.jpg',1.5,1.5,2.3);   
$this->fpdf->Cell(21,0.7,'PEMERINTAH KABUPATEN TABANAN',0,0,'C');

// fungsi Ln untuk membuat baris baru
$this->fpdf->Ln();
$this->fpdf->SetFont('Times','B',13);
$this->fpdf->Cell(21,0.7,'BADAN PENANAMAN MODAL DAN PERIZINAN DAERAH TABANAN',0,0,'C');

$this->fpdf->Ln();
/* Setting ulang Font : String Family, String Style, Font size
   kenapa disetting ulang ???
   jika tidak disetting ulang, ukuran font akan mengikuti settingan sebelumnya.
   tetapi karena kita menginginkan settingan untuk penulisan alamatnya berbeda,
   maka kita harus mensetting ulang Font nya.
   jika diatas settingannya : helvetica, 'B', '12'
   khusus untuk penulisan alamat, kita setting : helvetica, '', 10
   yang artinya string stylenya normal / tidak Bold dan ukurannya 10 
*/   
$this->fpdf->SetFont('helvetica','',10);
$this->fpdf->Cell(21,0.5,'Jalah Pahlawan No. 19, Tabanan - Bali Telp  : +62 0361 - 811417',0,0,'C');

$this->fpdf->Ln();
$this->fpdf->Cell(21,0.5,'homepage : www.tabanankab.go.id',0,0,'C');

/* Fungsi Line untuk membuat garis */
$this->fpdf->Line(1,4.1,20,4.1);
$this->fpdf->Line(1,4.2,20,4.2);
$this->fpdf->Ln();

/* -------------- Header Halaman selesai ------------------------------------------------*/

$this->fpdf->Ln();
$this->fpdf->SetFont('Times','B',14);
$this->fpdf->Cell(19,1,'SURAT REKOMENDASI',0,0,'C');

$this->fpdf->Ln(0.5);
$this->fpdf->SetFont('Times','',11);
$this->fpdf->Cell(19,1,'NOMOR: 001/TBN-003/CP/2013',0,0,'C');



/* setting header table */
$this->fpdf->Ln();
$this->fpdf->SetFont('Times','B',12);
$this->fpdf->Cell(19,1,'TENTANG',0,0,'C');
$this->fpdf->Ln(0.5);
$this->fpdf->Cell(19,1,'REKOMENDASI MENDIRIKAN MENARA TELEKOMUNIKASI',0,0,'C');

$this->fpdf->Ln();
$this->fpdf->SetFont('Times','',12);
$this->fpdf->Cell(19,1,'Dasar     : a. Peraturan Daerah Kabupaten Tabanan Nomor 01 tahun 2012 pada Bab III tentang Ketententuan',0,0,'C');
//$this->fpdf->Write($h=0.5, 'Dasar     : a. Peraturan Daerah Kabupaten Tabanan Nomor 01 tahun 2012 tentang Pembangunan dan ', $link='', $fill=20, $align='Justify', $ln=true, $stretch=20, $firstline=false, $firstblock=false, $maxh=20, $width=20);
$this->fpdf->Ln(0.8);
$this->fpdf->Cell(8.8,1,'Pembangunan Menara.',0,0,'C');
$this->fpdf->Ln(0.8);
$this->fpdf->Cell(21.3,1,'b. Peraturan Daerah Kabupaten Tabanan Nomor 01 tahun 2012 pada Subbab III tentang Ketententuan',0,0,'C');
$this->fpdf->Ln(0.8);
$this->fpdf->Cell(6.6,1,'Perizinan.',0,0,'C');
$this->fpdf->Ln(0.8);
$this->fpdf->Cell(20.7,1,'c. Peraturan Daerah Kabupaten Tabanan Nomor 01 tahun 2012 pada Bab VII tentang Pelaksanaan,',0,0,'C');
$this->fpdf->Ln(0.8);
$this->fpdf->Cell(9.7,1,'Pembinaan, dan Pengawasan.',0,0,'C');
$this->fpdf->Ln(1);
$this->fpdf->SetFont('Times','B',14);
$this->fpdf->Cell(19,1,'MEREKOMENDASIKAN',0,0,'C');

/* setting header table */

$this->fpdf->Ln(1);
$this->fpdf->SetFont('Times','',12);
$this->fpdf->Cell(19  , 1, 'Kepada :'           , 0, 0, 'L');
$this->fpdf->Ln();
$this->fpdf->Cell(4 , 1, 'Tower ID ', 1, 'LR', 'C');
$this->fpdf->Cell(4 , 1, 'Tanggal registrasi ', 1, 'LR', 'C');
$this->fpdf->Cell(4 , 1, 'Status ', 1, 'LR', 'C');
$this->fpdf->Cell(7 , 1, 'Keterangan ', 1, 'LR', 'C');

/* generate hasil query disini */
foreach($surek->result() as $data)
{
    $this->fpdf->Ln();
    $this->fpdf->SetFont('Times','',12);
    $this->fpdf->Cell(4 , 0.7, $data->TOWER_ID  , 1,'LR', 'L');
    $this->fpdf->Cell(4 , 0.7, date('d M Y', strtotime($data->SUREK_TANGGAL)) , 1, 'LR', 'L');
    $this->fpdf->Cell(4 , 0.7, $data->SUREK_STATUS , 1, 'LR', 'L');
    $this->fpdf->Cell(7 , 0.7, $data->SUREK_KETERANGAN , 1, 'LR', 'L');
}

$this->fpdf->Ln(1);
$this->fpdf->Cell(19 , 1, 'Bermaksud Untuk : Mendirikan Menara Telekomunikasi.' , 0, 0, 'L');
$this->fpdf->Ln(2);
$this->fpdf->Cell(27 , 1, 'Ditetapkan di : Tabanan ' , 0, 0, 'C');
$this->fpdf->Ln(0.5);
$this->fpdf->Cell(27 , 1, 'Pada Tanggal '.date('d/m/Y').'' , 0, 0, 'C');
$this->fpdf->Ln(0.5);
$this->fpdf->Cell(27 , 1, 'Kepala BPMPD,' , 0, 0, 'C');
$this->fpdf->Ln(3);
$this->fpdf->Cell(27 , 1, '(................................................................)' , 0, 0, 'C');
$this->fpdf->Ln(0.5);
$this->fpdf->Cell(21 , 1, 'NIP. ' , 0, 0, 'C');

/*===================================================================*/
/* setting posisi footer 3 cm dari bawah */
$this->fpdf->SetY(-3);

/* setting font untuk footer */
$this->fpdf->SetFont('Times','',10);

/* setting cell untuk waktu pencetakan */ 
$this->fpdf->Cell(9.5, 0.5, 'Printed on : '.date('d/m/Y H:i').'',0,'LR','L');

/* setting cell untuk page number */
$this->fpdf->Cell(9.5, 0.5, 'Page '.$this->fpdf->PageNo().'/{nb}',0,0,'R');

/* generate pdf jika semua konstruktor, data yang akan ditampilkan, dll sudah selesai */
$this->fpdf->Output("surat_rekomendasi.pdf","I");
?>