<?php
if (defined("GELANG") == false) {
	// ini menandakan dia lompat pagar
	die("Anda tidak boleh membuka halaman ini secara langsung!");
}
?>
<script type="text/javascript" src="assets/js/Chart.js"></script>
<div class="row kotak">
	<div class="col kotak text-center">
		<h3 class="judul_stat">JUMLAH WARGA</h3>
		<p class="nilai_stat">
			<?php
			$jumlah_warga = mysqli_query($conn, "select * from warga");
			echo mysqli_num_rows($jumlah_warga);
			?>
		</p>
	</div>
	<div class="col kotak text-center">
		<h3 class="judul_stat">JUMLAH KEPALA KELUARGA</h3>
		<p class="nilai_stat">
			<?php
			$jumlah_kk = mysqli_query($conn, "select no_kk from warga");
			echo mysqli_num_rows($jumlah_kk);
			?>
		</p>
	</div>
	<div class="col kotak text-center">
		<h3 class="judul_stat">JUMLAH DUSUN</h3>
		<p class="nilai_stat">
			<?php
			$jumlah_dusun = mysqli_query($conn, "select distinct dusun from warga");
			echo mysqli_num_rows($jumlah_dusun);
			?>
		</p>
	</div>
	<div class="col kotak text-center">
		<h3 class="judul_stat">JUMLAH AGAMA</h3>
		<p class="nilai_stat">
			<?php
			$jumlah_agama = mysqli_query($conn, "select * from agama");
			echo mysqli_num_rows($jumlah_agama);
			?>
		</p>
	</div>
</div>
<div class="row kotak">
	<div class="col kotak">
		<h3 class="judul_stat">SEBARAN JENIS KELAMIN</h3>
		<div style="width: 400px;margin: 0px auto;">
			<canvas id="grafikJK"></canvas>
		</div>
	</div>
	<div class="col kotak">
		<h3 class="judul_stat">SEBARAN USIA</h3>
		<div style="width: 400px;margin: 0px auto;">
			<canvas id="grafikUsia"></canvas>
		</div>
	</div>
</div>

<script>
	var ctx = document.getElementById("grafikJK").getContext('2d');
	var grafikJK = new Chart(ctx, {
		type: 'bar',
		data: {
			labels: ["Laki-Laki", "Perempuan"],
			datasets: [{
				label: '',
				data: [
					<?php
					$jumlah_l = mysqli_query($conn, "select * from warga where jenis_kelamin='L'");
					echo mysqli_num_rows($jumlah_l);
					?>,
					<?php
					$jumlah_p = mysqli_query($conn, "select * from warga where jenis_kelamin='P'");
					echo mysqli_num_rows($jumlah_p);
					?>,
				],
				backgroundColor: [
					'rgba(54, 162, 235, 0.2)',
					'rgba(255, 99, 132, 0.2)',
				],
				borderColor: [
					'rgba(54, 162, 235, 1)',
					'rgba(255,99,132,1)',
				],
				borderWidth: 1
			}]
		},
		options: {
			scales: {
				yAxes: [{
					ticks: {
						beginAtZero: true
					}
				}]
			}
		}
	});

	var ctx1 = document.getElementById("grafikUsia").getContext('2d');
	var grafikUsia = new Chart(ctx1, {
		type: 'pie',
		data: {
			labels: ["Anak-Anak dan Remaja (Usia dibawah 20 tahun)", "Dewasa (Usia 20-60 tahun)", "Lansia (Usia diatas 60 tahun)"],
			datasets: [{
				label: '',
				data: [
					<?php
					$jumlah_anak = mysqli_query($conn, "select * from warga WHERE (YEAR(NOW()) - YEAR(`tgl_lahir`)) < 20");
					echo mysqli_num_rows($jumlah_anak);
					?>,
					<?php
					$jumlah_dewasa = mysqli_query($conn, "select * from warga WHERE (YEAR(NOW()) - YEAR(`tgl_lahir`)) BETWEEN 20 and 60");
					echo mysqli_num_rows($jumlah_dewasa);
					?>,
					<?php
					$jumlah_lansia = mysqli_query($conn, "select * from warga WHERE (YEAR(NOW()) - YEAR(`tgl_lahir`)) > 60");
					echo mysqli_num_rows($jumlah_lansia);
					?>,
				],
				backgroundColor: [
					'rgba(54, 162, 235, 0.2)',
					'rgba(255, 99, 132, 0.2)',
					'rgba(255, 206, 86, 0.2)',
				],
				borderColor: [
					'rgba(54, 162, 235, 1)',
					'rgba(255,99,132, 1)',
					'rgba(255, 206, 86, 1)',
				],
				borderWidth: 1
			}]
		},
		options: {
			scales: {
				yAxes: [{
					ticks: {
						beginAtZero: true
					}
				}]
			}
		}
	});
</script>