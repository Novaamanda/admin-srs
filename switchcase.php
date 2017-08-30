<?php
	
$page1 = $_GET['page']; 
$page2=base64_decode($page1); 
switch($page2)
{


//////////////////////////
// SHE ZONE
case "Data Hazard":
include('koneksiSHE.php');
include('SHE/datahazard.php');
break;

case "Tambah Hazard":
include('koneksiSHE.php');
include('SHE/tambahhazard.php');
break;

case "Edit Hazard":
include('koneksiSHE.php');
include('SHE/edithazard.php');
break;

case "Data Event":
include('koneksiSHE.php');
include('SHE/dataevent.php');
break;

case "Tambah Event":
include('koneksiSHE.php');
include('SHE/tambahevent.php');
break;

case "Edit Event":
include('koneksiSHE.php');
include('SHE/editevent.php');
break;

case "Edit tabel_ygterlibat":
include('koneksiSHE.php');
include('SHE/edittabel_ygterlibat.php');
break;

case "Data Tipe Hazard":
include('koneksiSHE.php');
include('SHE/datatipehazard.php');
break;

case "Tambah Tipe Hazard":
include('koneksiSHE.php');
include('SHE/tambahtipehazard.php');
break;

case "Edit Tipe Hazard":
include('koneksiSHE.php');
include('SHE/edittipehazard.php');
break;

case "Data Penyebab Hazard":
include('koneksiSHE.php');
include('SHE/datapenyebabhazard.php');
break;

case "Tambah Penyebab Hazard":
include('koneksiSHE.php');
include('SHE/tambahpenyebabhazard.php');
break;

case "Edit Penyebab Hazard":
include('koneksiSHE.php');
include('SHE/editpenyebabhazard.php');
break;

case "Data Jenis Kejadian":
include('koneksiSHE.php');
include('SHE/datajeniskejadian.php');
break;

case "Tambah Jenis Kejadian":
include('koneksiSHE.php');
include('SHE/tambahjeniskejadian.php');
break;

case "Edit Jenis Kejadian":
include('koneksiSHE.php');
include('SHE/editjeniskejadian.php');
break;

case "Data Yang Terlibat":
include('koneksiSHE.php');
include('SHE/dataygterlibat.php');
break;

case "Tambah Yang Terlibat":
include('koneksiSHE.php');
include('SHE/tambahygterlibat.php');
break;

case "Edit Yang Terlibat":
include('koneksiSHE.php');
include('SHE/editygterlibat.php');
break;

case "Data Kerugian":
include('koneksiSHE.php');
include('SHE/datakerugian.php');
break;

case "Tambah Kerugian":
include('koneksiSHE.php');
include('SHE/tambahkerugian.php');
break;

case "Edit Kerugian":
include('koneksiSHE.php');
include('SHE/editkerugian.php');
break;

case "Data Jenis Yang Terlibat":
include('koneksiSHE.php');
include('SHE/datajenisygterlibat.php');
break;

case "Tambah Jenis Yang Terlibat":
include('koneksiSHE.php');
include('SHE/tambahjenisygterlibat.php');
break;

case "Edit Jenis Yang Terlibat":
include('koneksiSHE.php');
include('SHE/editjenisygterlibat.php');
break;

case "Data User":
include('koneksiSHE.php');
include('SHE/datauser.php');
break;

case "Tambah User":
include('koneksiSHE.php');
include('SHE/tambahuser.php');
break;

case "Edit User":
include('koneksiSHE.php');
include('SHE/edituser.php');
break;

case "Data Bandara":
include('koneksiSHE.php');
include('SHE/databandara.php');
break;

case "Tambah Bandara":
include('koneksiSHE.php');
include('SHE/tambahbandara.php');
break;

case "Edit Bandara":
include('koneksiSHE.php');
include('SHE/editbandara.php');
break;

case "Data Message":
include('koneksiSHE.php');
include('SHE/datamessage.php');
break;

case "Edit Message":
include('koneksiSHE.php');
include('SHE/editmessage.php');
break;

case "Data Optional Yang Terlibat":
include('koneksiSHE.php');
include('SHE/dataoptionalygterlibat.php');
break;

case "Tambah Optional Yang Terlibat":
include('koneksiSHE.php');
include('SHE/tambahoptionalygterlibat.php');
break;

case "Edit Optional Yang Terlibat":
include('koneksiSHE.php');
include('SHE/editoptionalygterlibat.php');
break;

case "Edit Tabel Yang Terlibat":
include('koneksiSHE.php');
include('SHE/edittabel_ygterlibat.php');
break;

case "Edit Tabel Kerugian":
include('koneksiSHE.php');
include('SHE/edittabel_kerugian.php');
break;

case "Edit Tabel Tipe Hazard":
include('koneksiSHE.php');
include('SHE/edittabel_tipehazard.php');
break;

case "Edit Tabel Penyebab Hazard":
include('koneksiSHE.php');
include('SHE/edittabel_penyebabhazard.php');
break;

// Default Page
default:
include('home.php');
break;
}

?>
