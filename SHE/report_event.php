<?php
define('FPDF_FONTPATH','fpdf17/font/');
require('fpdf17/fpdf.php');
if( mysql_connect( "localhost","root","" ) ){
   mysql_select_db( "safety_kp" );
}else{
   echo "maaf, data gagal";
}
class PDF extends FPDF
{
	//Page header
	function Header()
	{
   // Logo
    $this->Image('Logo_AngkasaPura.png',10,13,50);
    
    // Arial bold 12
    $this->SetFont('Arial','B',14);    
    // Geser Ke Kanan 35mm
    $this->Cell(55);
    // Judul
    $this->Cell(55,7,'Safety Reporting System',0,1,'L');
    $this->Cell(55);
	// Arial bold 12
    $this->SetFont('Arial','B',12);
    $this->Cell(55,7,'Bandar Udara Internasional Ahmad Yani Semarang',0,1,'L');
    $this->Cell(55);
	// Arial bold 12
    $this->SetFont('Arial','B',10);
    $this->Cell(55,7,'Safety Health & Environment Section',0,1,'L');
    
    // Garis Bawah Double
    $this->Cell(190,1,'','B',1,'L');
    $this->Cell(190,1,'','B',0,'L');
    
    // Line break 5mm
    $this->Ln(5);
	}
	
	//Page Content
	function Content()
	{
	//query dan arraying
$kode = $_GET['id'];
$sql   ="select * from event_report, jenis_kejadian,user where jenis_kejadian.id_jeniskejadian = event_report.id_jeniskejadian and event_report.id_user = user.id_user and id_event='$kode'";
$query = mysql_query( $sql );
$row = mysql_fetch_array( $query );
$id=$row['id_event'];
$nama_kejadian = $row['nama_kejadian'];
$nama = $row['nama'];
$deskripsi_singkat = $row['deskripsi_singkat'];
$date_event = $row['date_event'];
$date_baru=  date("d/m/Y H:i:s", strtotime($date_event));
			//
			$this->SetFont('Times','B',12);
			$this->Cell(0,10,'TIPE KEJADIAN : ',0,1);
			$this->SetFont('Times','',10);
			$this->Cell(0,10,$nama_kejadian,0,1);
			 
			 //
			 
			 $this->SetFont('Times','B',12);
			$this->Cell(0,10,'Deskripsi Kejadian : ',0,1);
			$this->SetFont('Times','I',10);
			$this->MultiCell(0,10,$deskripsi_singkat,0,1);
			 //
			 
			 $this->SetFont('Times','B',12);
			$this->Cell(0,10,'Pelapor : ',0,1);
			$this->SetFont('Times','',10);
			$this->Cell(0,10,$nama,0,1);
			 //
			 
			 $this->SetFont('Times','B',12);
			$this->Cell(0,10,'Tanggal Posting Kejadian : ',0,1);
			$this->SetFont('Times','',10);
			$this->Cell(0,10,$date_baru,0,1);
			//
			
			$this->SetFont('Times','B',12);
			$this->Cell(0,10,'Unsur Yang Terlibat : ',0,1);
			$this->SetFont('Times','',10);
$querytipe=mysql_query("select * from tabel_ygterlibat,yg_terlibat,jenis_yg_terlibat,optional_yg_terlibat where tabel_ygterlibat.id_event = '$kode' and tabel_ygterlibat.id_ygterlibat=yg_terlibat.id_ygterlibat and tabel_ygterlibat.id_optional_yg_terlibat=optional_yg_terlibat.id_optional_yg_terlibat and yg_terlibat.id_jenis_ygterlibat=jenis_yg_terlibat.id_jenis_ygterlibat and jenis_yg_terlibat.id_jenis_ygterlibat=optional_yg_terlibat.id_jenis_ygterlibat")or die(mysql_error());
						$no = 0;
						while($rowtipe=mysql_fetch_array($querytipe))
						{
						$no++;
						$nama_ygterlibat = $rowtipe['nama_ygterlibat'];
						$optional_jenis_ygterlibat = $rowtipe['optional_jenis_ygterlibat'];
						$tesc = $no.'. '.$nama_ygterlibat.' : '.$optional_jenis_ygterlibat;
						$this->Cell(0,10,$tesc,0,1);
						}			 
			//
			 
			$this->SetFont('Times','B',12);
			$this->Cell(0,10,'Kerugian Yang Ditimbulkan : ',0,1);
			$this->SetFont('Times','',10);
$querytipe=mysql_query("select * from tabel_kerugian,kerugian where tabel_kerugian.id_event = '$kode' and tabel_kerugian.id_kerugian=kerugian.id_kerugian")or die(mysql_error());
						$no = 0;
						while($rowtipe=mysql_fetch_array($querytipe))
						{
						$no++;
						$nama_kerugian = $rowtipe['nama_kerugian'];
						$isian = $rowtipe['keterangan'];
						$keterangan_kerugian = $rowtipe['keterangan_kerugian'];
						if($isian)
						{
							$isian_baru = ": " . $rowtipe['keterangan'] . " ". $keterangan_kerugian."";
						}
						else
						{
							$isian_baru = "";
						}
						$tescw = $no.'. '.$nama_kerugian.''.$isian_baru;
						$this->Cell(0,10,$tescw,0,1);
						}	
			
	}
	
	function Content2()
	{
	//
	$kode = $_GET['id'];
$sql   ="select * from event_report, jenis_kejadian,user where jenis_kejadian.id_jeniskejadian = event_report.id_jeniskejadian and event_report.id_user = user.id_user and id_event='$kode'";
$query = mysql_query( $sql );
$row = mysql_fetch_array( $query );
$data_photo= $row['foto_video'];		 
			 $this->SetFont('Times','B',12);
			$this->Cell(0,10,'Lampiran : ',0,1);
			$this->SetFont('Times','',10);
			$tescwf = 'gambarevent/'.$data_photo;
			$this->Image($tescwf,30,50);
	}
	
	function Content3()
	{
	//
	$kode = $_GET['id'];
$sql   ="select * from event_report, jenis_kejadian,user where jenis_kejadian.id_jeniskejadian = event_report.id_jeniskejadian and event_report.id_user = user.id_user and id_event='$kode'";
$query = mysql_query( $sql );
$row = mysql_fetch_array( $query );
$data_photo1= $row['foto_video1'];		 
			 $this->SetFont('Times','B',12);
			$this->SetFont('Times','',10);
			$tescwf = 'gambarevent/'.$data_photo1;
			$this->Image($tescwf,30,155);
	}
	
	//Page footer
	function Footer()
	{
		//atur posisi 1.5 cm dari bawah
		$this->SetY(-15);
		//buat garis horizontal
		$this->Line(10,$this->GetY(),200,$this->GetY());
		//Arial italic 9
		$this->SetFont('Arial','I',9);
		//nomor halaman
		$this->Cell(0,10,'Halaman '.$this->PageNo().' dari {nb}',0,0,'R');
		//atur posisi 1.5 cm dari bawah
		$this->SetY(-15);
		//Arial italic 9
		$this->SetFont('Arial','B',8);
		$this->Cell(0,10,'PT. Angkasa Pura I (PERSERO)',0,0,'L');
		$this->SetY(-13);
		//Arial italic 9
		$this->SetFont('Arial','B',7);
		$this->Cell(0,10,'Bandar Udara Internasional Ahmad Yani Semarang',0,0,'L');
	}
}

//contoh pemanggilan class
$pdf = new PDF();
$pdf->AliasNbPages();
$pdf->AddPage();
$pdf->Content();
$kode = $_GET['id'];
$sql   ="select * from event_report, jenis_kejadian,user where jenis_kejadian.id_jeniskejadian = event_report.id_jeniskejadian and event_report.id_user = user.id_user and id_event='$kode'";
$query = mysql_query( $sql );
$row = mysql_fetch_array( $query );
$data_photo= $row['foto_video'];
$data_photo1=$row['foto_video1'];	
if($data_photo && $data_photo1!='')
{
$pdf->AddPage();
$pdf->Content2();
$pdf->Content3();
}
else{}
$pdf->Output();
?>