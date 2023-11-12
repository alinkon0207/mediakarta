<?php
	include('../bootstrap.php');
?>

<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
		<meta name="description" content="Informasi lengkapnya mengenai Mediakarta - Kabar Terkini, Berita Terupdate oleh Mediakarta.">
		<meta name="keywords" content="Bisnis,Bola,Edukasi,Ekonomi,Entrepreneur,Hiburan,Hukum,Internasional,Investment,Kecantikan,Kesehatan,Lifestyle,Market,Metro,Nasional,Olahraga,Opini,Otomotif,Politik,Profil,Sains,Selebriti,Syariah,Teknologi,Terbaru,Travel">
		<meta name="author" content="mediakarta.com">
		<title>Mediakarta - Kabar Terkini, Berita Terupdate</title>
		<link rel="manifest" href="<?php echo BASE_URL; ?>/mediakarta.webmanifest">
		<link rel="shortcut icon" href="<?php echo BASE_URL; ?>/logo.png" type="image/png">
		<link rel="icon" href="<?php echo BASE_URL; ?>/logo.png" type="image/png">
		<!--<link rel="apple-touch-icon" sizes="180x180" href="<?php echo BASE_URL; ?>/apple-touch-icon.png">-->
		<link rel="stylesheet" href="<?php echo BASE_URL; ?>/public/news/plugins/bootstrap/css/bootstrap.min.css">
		<link rel="stylesheet" href="<?php echo BASE_URL; ?>/public/news/plugins/font-awesome/css/font-awesome.min.css">
		<link rel="stylesheet" href="<?php echo BASE_URL; ?>/public/news/plugins/slick-carousel/slick.css">
		<link rel="stylesheet" href="<?php echo BASE_URL; ?>/public/news/plugins/slick-carousel/slick-theme.css?v=1.0.0">
		<link rel="stylesheet" href="<?php echo BASE_URL; ?>/public/news/css/style.css">
		<script src="<?php echo BASE_URL; ?>/public/news/plugins/jquery/jquery.js"></script>
		<script src="<?php echo BASE_URL; ?>/public/news/plugins/bootstrap/js/bootstrap.min.js"></script>
		<script>var bodyWeb = document.getElementsByTagName('body');</script>
	</head>
	
	<body style="" monica-version="3.1.2" monica-id="ofpnmcalabcbjgholdjcjblkibolbppb">
		<?php include('../header.html'); ?>
		
		<section class="section-padding">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                        <div class="all-news-block">
                            <h2 class="text-center">
                                <b>Contact Us</b>
                            </h2>
                            <hr>
                            <div class="all-news">
                                <p>Untuk menghubungi kami di MediaKarta, silakan gunakan informasi kontak berikut ini. Anda
                                dapat mengirimkan pertanyaan, masukan, atau permintaan kerjasama melalui email ke
                                info@mediakarta.com. Tim kami akan dengan senang hati merespons secepat mungkin. Anda juga
                                dapat mengikuti MediaKarta di media sosial kami, seperti Facebook, Twitter, dan Instagram,
                                untuk mendapatkan pembaruan terkini tentang berita, artikel, dan konten eksklusif kami.
                                Jangan ragu untuk menghubungi kami jika Anda memiliki pertanyaan atau ingin berkontribusi
                                sebagai penulis tamu. Terima kasih atas minat dan dukungan Anda terhadap MediaKarta!</p>
                                <form action="#" method="post">
                                    <div class="form-group">
                                        <label for="nama">Nama:</label>
                                        <input type="text" class="form-control" id="nama" name="nama" required="">
                                    </div>
                                    <div class="form-group">
                                        <label for="email">Email:</label>
                                        <input type="email" class="form-control" id="email" name="email" required="">
                                    </div>
                                    <div class="form-group">
                                        <label for="pesan">Pesan:</label>
                                        <textarea class="form-control" id="pesan" name="pesan" rows="5" required=""></textarea>
                                    </div>
                                    <button type="button" class="btn btn-primary" onclick="alert('Pesan telah terkirim, terima kasih telah menghubungi kami')">Kirim</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
	
		<?php include('../footer.html'); ?>
		
		<script src="<?php echo BASE_URL; ?>/public/news/plugins/slick-carousel/slick.min.js"></script>
		<script src="<?php echo BASE_URL; ?>/public/news/js/custom.js"></script>

		<div id="monica-content-root" class="monica-widget"></div>
	</body>
</html>