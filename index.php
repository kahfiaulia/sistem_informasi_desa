<?php
	session_start();
?>
<!doctype html>
<html lang="en">

<head>
	<!-- Required meta tags -->
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

	<!-- Bootstrap CSS -->
	<link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">

	<link rel="stylesheet" href="assets/css/style.css">

	<title>Dashboard</title>
</head>

<body>
	<div class="container">

        <?php
            // tandai pake gelang
            define("GELANG", 1);

            // pengecekan apakah ada halaman yg di-request
            ini_set("display_errors", "1");

            // koneksi ke database
			require_once("koneksi.php");
			
			// cek kalau sudah login, ambil data menu
			if(isset($_SESSION['is_login']))
			{
				// query ke tabel menu
				$sql = "select * from menu_level as a 
                inner join menus as b on a.id_menu=b.id_menu 
                where a.id_level=".$_SESSION['id_level'];
				$menus = mysqli_query($conn, $sql);
			}
        ?>

		<!-- header -->
		<div class="row kotak">
			<div class="col-2">
				<img src="assets/image/logo.png" class="img-fluid" />
			</div>
			<div class="col judul_sistem">SISTEM INFORMASI DESA<br />DESA SUKATANI<br />KECAMATAN CILEDUK</div>
		</div>

		<div class="row kotak">
			<nav class="navbar navbar-expand-lg">
				<a class="navbar-brand" href="index.php">Navbar</a>
				<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
					<span class="navbar-toggler-icon"></span>
				</button>
				<div class="collapse navbar-collapse" id="navbarNavDropdown">
					<ul class="navbar-nav">
						<li class="nav-item active">
							<a class="nav-link" href="index.php">Home <span class="sr-only">(current)</span></a>
						</li>
						<?php
							if(isset($_SESSION['is_login']))
							{
								while ($row = mysqli_fetch_assoc($menus)) 
								{
									echo '<li class="nav-item">
										<a class="nav-link" href="?page='.$row['file'].'">'.$row['nm_menu'].'</a>
									</li>';
								}
								
								echo '<li class="nav-item">
									<a class="nav-link" href="?page=logout">Logout</a>
								</li>';
							}
							else
							{
								echo '<li class="nav-item">
									<a class="nav-link" href="?page=login">Login</a>
								</li>';
							}
                        ?>
					</ul>


                    <?php if(isset($_SESSION['is_login'])):?>
                        <span class="navbar-text">
                            <?php 
                                echo "Welcome, ".$_SESSION['nm_user']."!";
                            ?>
                        </span>
                    <?php endif;?>
				</div>
			</nav>
		</div>

		<?php
		if (isset($_GET['page'])) 
		{
			$halaman = $_GET['page'];

			// cek apakah halaman yang diminta itu ada atau tidak??
			if (file_exists($halaman . ".php") == true) 
			{
				$kecuali = array('login','statistik','profil','proses_login');
                
                if(in_array($halaman,$kecuali) == false && isset($_SESSION['is_login']) == false)
                {
                    // arahkan ke halaman login
                    echo "<script>
                        window.location.replace('index.php?page=login');
                    </script>";
                }
                
                $kecuali_login = array('logout');
                
                if(isset($_SESSION['is_login']) && in_array($halaman,$kecuali) == false && in_array($halaman,$kecuali_login) == false)
                {
                    // sudah login...cek aksesnya...boleh atau tidak (authorization)
                    $cek = cek_akses($halaman,$conn);
                    
                    if($cek == false)
                    {
                        die("Anda tidak berhak mengakses menu/halaman ini!");
                    }
                }
                
				// tampilkan halaman sesuai request
				require_once($halaman . ".php");
			} 
			else 
			{
				// tampilkan halaman 404.php
				require_once("404.php");
			}
		} 
		else 
		{
			// tampilkan halaman default dari website kita
			require_once("statistik.php");
		}
		?>

	</div>

	<!-- Optional JavaScript -->
	<!-- jQuery first, then Popper.js, then Bootstrap JS -->
	<script src="assets/js/jquery-3.5.1.slim.min.js"></script>
	<script src="assets/js/popper.min.js"></script>
	<script src="assets/bootstrap/js/bootstrap.min.js"></script>
</body>

</html>