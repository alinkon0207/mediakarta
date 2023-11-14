<?php
	include('bootstrap.php');

	define('NEWS_PER_PAGE', 3 * 3);

	if (isset($_GET['page'])) {
		$page = $_GET['page'];
	} else {
		$page = 1;
	}

	/* Get latest news */
	global $conn;

	$conn = mysqli_connect(DB_HOST, DB_USER, DB_PASS, DB_NAME);
	if (!$conn) {
		die("Cannot Establish A Secure Connection To The Host Server At The Moment!");
	}

	// count pages
	$sql = "SELECT id, category, title, permalink, DATEDIFF(NOW(), date) AS date_differ, contents FROM posts " . 
		"WHERE date >= DATE_SUB(NOW(), INTERVAL 6 MONTH)";

	if ($stmt = mysqli_prepare($conn, $sql)) {
		mysqli_stmt_execute($stmt);
		mysqli_stmt_store_result($stmt);
		$records = mysqli_stmt_num_rows($stmt);

		$npages = intdiv($records + 8, 9);

		mysqli_stmt_close($stmt);
	} else {
		$npages = 0;
		$pages = 0;
	}

	// fetch records
	$sql = "SELECT id, category, title, permalink, DATEDIFF(NOW(), date) AS date_differ, contents FROM posts " . 
		"WHERE date >= DATE_SUB(NOW(), INTERVAL 6 MONTH) " . 
		"LIMIT " . ($page - 1) * NEWS_PER_PAGE . ', ' . NEWS_PER_PAGE;

	$news = "";

	if ($stmt = mysqli_prepare($conn, $sql)) {
		mysqli_stmt_execute($stmt);
		mysqli_stmt_store_result($stmt);
		$records = mysqli_stmt_num_rows($stmt);
		
		$result = mysqli_query($conn, $sql);

		while ($row = mysqli_fetch_assoc($result)) {
			$news = $news . 
			'<div class="col-lg-4 col-md-6">
				<div class="post-block-wrapper post-float-half clearfix">
					<div class="post-content">
						<a class="post-category" href="#">' . $row['category']. '</a>
						<h2 class="post-title mt-3">
							<a href="' . BASE_URL . '/read.php?title=' . $row['permalink'] . '">' . $row['title']. '</a>
						</h2>
						<div class="post-meta">
							<span class="posted-time">' . getDaysDiff($row['date_differ']) . '</span>
						</div>
						<p>' . $row['contents'] . '</p>
					</div>
				</div>
			</div>';
		}

		mysqli_stmt_close($stmt);
	}

	// Close connection
	mysqli_close($conn);
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
		<?php include('header.html'); ?>
		
		<section class="section-padding">
			<div class="container">
				<div class="row">
					<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
						<div class="all-news-block">
							<h3 class="news-title">
								<span>Latest News</span>
							</h3>
							<div class="all-news">
								<div class="row">
									<?php
										echo $news;
									?>
								</div>
							</div>
						</div>
						<nav aria-label="pagination-wrapper" class="pagination-wrapper">
							<ul class="pagination justify-content-center">
							<?php
								if ($page > 1) {
									echo '<li class="page-item">
										<a class="page-link" href="index.php?page=' . ($page - 1) . '" aria-label="Previous">
											<span class="">Previous</span>
											<span aria-hidden="true"><i class="fa fa-angle-double-left ml-2"></i></span>
										</a>
									</li>';
								}
								for ($i = 1; $i <= $npages; $i++) {
									echo '<li class="page-item "' . ($i == $page ? 'active' : '') . '><a class="page-link" href="index.php?page=' . $i . '">' . $i . '</a></li>';
								}
								if ($page < $npages - 1) {
									echo '<li class="page-item">
										<a class="page-link" href="index.php?page=' . ($page + 1) . '" aria-label="Next">
											<span class="">Next</span>
											<span aria-hidden="true"><i class="fa fa-angle-double-right ml-2"></i></span>
										</a>
									</li>';
								}
							?>
							</ul>
						</nav>
					</div>
				</div>
			</div>
		</section>
	
		<?php include('footer.html'); ?>
		
		<script src="<?php echo BASE_URL; ?>/public/news/plugins/slick-carousel/slick.min.js"></script>
		<script src="<?php echo BASE_URL; ?>/public/news/js/custom.js"></script>

		<div id="monica-content-root" class="monica-widget"></div>
	</body>
</html>