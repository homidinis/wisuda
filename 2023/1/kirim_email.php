<?php

include 'kirimemail/kirim_email.php';

include("conn.php");
// if (!isset($_GET['id'])) {
//   header("location:index.php");
// }
// //id_event
// $id = $_GET['id'];

$sql_participant = "SELECT * FROM ".$prefix."t_wisudawan";
$query_participant = mysqli_query($conn,$sql_participant);
// echo $sql_participant;
while ($row_participant = mysqli_fetch_array($query_participant)) {
	$nim = $row_participant['nim'];
	$email = str_replace(".", "", $nim)."@student.unika.ac.id";
	$nama = $row_participant['nama'];
	$nomorkursi = $row_participant['nomorkursi'];
	$kodeunik = $row_participant['kodeunik'];
	$sesi = $row_participant['sesi'];

	if($sesi == 1)
	{
		$tanggal_gladi = "Jumat, 16 September 2022 pukul 09.00 WIB - 11.00  WIB (Sesi 1)";
		$tanggal_wisuda = "Sabtu, 17 September 2022 pukul 08.30 WIB - 11.30 WIB (Sesi 1)";
	}
	else if($sesi == 2)
	{
		$tanggal_gladi = "Jumat, 16 September 2022 pukul 13.00 WIB - 15.00 WIB (Sesi 2)";
		$tanggal_wisuda = "Sabtu, 17 September 2022 pukul 12.30 WIB - 15.30 WIB (Sesi 2)";
	}
	else if($sesi == 3)
	{
		$tanggal_gladi = "Jumat, 16 September 2022 pukul 16.00 WIB - 18.00 WIB (Sesi 3)";
		$tanggal_wisuda = "Sabtu, 17 September 2022 pukul 16.30 WIB - 19.30 WIB (Sesi 3)";
	}
	else
	{
		$tanggal_gladi = "Jumat, 16 September 2022 pukul 15.00 WIB - 17.00 WIB";
		$tanggal_wisuda = "Sabtu, 17 September 2022 pukul 16.30 WIB - 19.30 WIB";	
	}

	// $link = $config['base_url']."sertifikat.php?id=".$id_participant;
	$name = "Wisuda SCU";
	$from = "wisuda@unika.ac.id";
	$to = $email;
	$subject = "Ralat Undangan Wisuda Universitas";
	$body = "	<p>Happy Graduation, ".$nama."!</p>
				<p>Kami dari Panitia Wisuda Unika Soegijapranata ingin menginformasikan terkait jadwal penting Wisuda Universitas Periode III tahun 2022.</p>
				<p>Agar acara berjalan dengan lancar, kami memohon kehadiran para wisudawan untuk mengikuti Technical Meeting yang akan dilaksanakan secara daring pada</p>
				<p>Hari, Tanggal  	: Selasa, 13 September 2022 pukul 10.00 WIB - 12.00 WIB</p>
				<p>Zoom				: https://unika.ac.id/tmwisuda3</p>
				<br>
				<p>Gladi Bersih yang akan dilaksanakan secara luring pada</p>
				<p>Hari, Tanggal	: ".$tanggal_gladi."</p>
				<P>Lokasi			: Auditorium Gedung Albertus Unika Soegijapranata (Kampus Bendan Duwur)</p>
				<br>
				<p>Wisudawan wajib hadir di Gladi Bersih karena akan di informasikan tata pelaksanaan wisuda dan dibagikan informasi-informasi penting bagi wisudawan dan orang tua</p>
				<p>—- Hari H Wisuda —-</p>
				<p>Rektor Universitas Katolik Soegijapranata mengundang wisudawan beserta orang keluarga / wali untuk turut mengikuti prosesi wisuda (max 2 orang) secara luring yang akan dilaksanakan pada:</p>
				<p>Hari, Tanggal	: ".$tanggal_wisuda."</p>
				<P>Lokasi			: Auditorium Gedung Albertus Unika Soegijapranata (Kampus Bendan Duwur)</p>
				<p>Noted       		: Jam kehadiran wisudawan akan diinfokan di Technical Meeting</p>
				<br>
				<p>Berikut link RSVP yang dapat wisudawan isi dengan nama undangan yang akan menghadiri prosesi wisuda</p>
				<p>https://wisuda.unika.ac.id/?i=".$kodeunik."#rsvp</p>
				<p>Mohon untuk nama orang tua / wali dapat diisi</p>
				<br>
				<p>Berikut adalah QR Code yang dapat digunakan untuk presensi pada saat Gladi Bersih maupun Prosesi Wisuda</p>
				<p>https://wisuda.unika.ac.id/qr/?i=".$kodeunik."</p>
				<p>Note: QR Code dapat di-screenshoot / diprint dan diberikan ke orang tua / wali untuk keperluan masuk ke Auditorium Gedung Albertus</p>
				<br>
				<p>Panduan mengenai acara Wisuda Universitas dapat dilihat di</p>
				<p>https://wisuda.unika.ac.id/?i=".$kodeunik."#guideliness</p>
				<br>
				<p>Mohon untuk dapat mengikuti setiap sesi yang ada demi kelancaran acara wisuda. Atas perhatiannya kami ucapkan terima kasih. Sampai bertemu pada hari H ya~😊</p>
				<br>
				<p>Info lebih lanjut dapat menghubungi hotline BAA +62 815-4877-1152 (WA)</p>
				<p>@unika.soegijapranata</p>
				";


	echo $body;
	echo "<br>----------------------------------------------------------------------------------------------------------<br>";
	// smtpmailer($to, $from, $name, $subject, $body);

	// if(smtpmailer($sender_email, $sender_password, $to, $from, $name, $subject, $body))
	// {
	// 	$date = date("Y-m-d H:i:s");
	// 	$sql_update = "UPDATE t_participant SET sent_status = 1, sent_time = '$date' WHERE id = '$id_participant'";
	// 	echo "Pengiriman ke ".$nama." dengan email ".$to." berhasil.<br>";
	// }
	// else
	// {
	// 	// if(smtpmailer("e-certificate@unika.ac.id", "unikaoye123", $to, $from, $name, $subject, $body))
	// 	// {
	// 	// 	$date = date("Y-m-d H:i:s");
	// 	// 	$sql_update = "UPDATE t_participant SET sent_status = 1, sent_time = '$date' WHERE id = '$id_participant'";
	// 	// 	echo "Pengiriman ke ".$nama." dengan email ".$to." berhasil menggunakan email e-certificate@unika.ac.id.<br>";
	// 	// }
	// 	// else
	// 	// {
	// 		$sql_update = "UPDATE t_participant SET sent_status = 2 WHERE id = '$id_participant'";
	// 		echo "Pengiriman ke ".$nama." dengan email ".$to." gagal.<br>";
	// 	// }
	// }
	// $query_update = mysqli_query($conn, $sql_update);
}


?>