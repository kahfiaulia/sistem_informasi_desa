<?php
if (defined("GELANG") == false) {
    // ini menandakan dia lompat pagar
    die("Anda tidak boleh membuka halaman ini secara langsung!");
}

$nama_warga = $_POST['nm_warga'];
$tgl_lahir = $_POST['tgl_lahir'];
$tmpt_lahir = $_POST['tmpt_lahir'];
$jenis_kelamin = $_POST['jenis_kelamin'];
$rt = $_POST['rt'];
$rw = $_POST['rw'];
$dusun = $_POST['dusun'];
$nama_jalan = $_POST['nm_jalan'];
$no_rumah = $_POST['no_rumah'];
$id_kepala_keluarga = $_POST['id_kepala_keluarga'];
$no_kk = $_POST['no_kk'];
$id_pekerjaan = $_POST['id_pekerjaan'];
$no_hp = $_POST['no_hp'];
$id_agama = $_POST['id_agama'];
$id_status_kawin = $_POST['id_status_kawin'];
$no_ktp = $_POST['no_ktp'];
$penghasilan = $_POST['penghasilan'];
$id_jenjang_pendidikan = $_POST['id_jenjang_pendidikan'];

if (isset($_GET['id'])) {
    // edit data
    $id = $_GET['id'];
    $sql = "update warga set nm_warga='$nama_warga', tgl_lahir='$tgl_lahir', tmpt_lahir='$tmpt_lahir', jenis_kelamin='$jenis_kelamin', rt='$rt', rw='$rw', dusun='$dusun', nm_jalan='$nama_jalan', no_rumah = '$no_rumah', id_kepala_keluarga='$id_kepala_keluarga', no_kk='$no_kk', id_pekerjaan='$id_pekerjaan', no_hp='$no_hp', id_agama='$id_agama', id_status_kawin='$id_status_kawin', no_ktp='$no_ktp', penghasilan='$penghasilan', id_jenjang_pendidikan='$id_jenjang_pendidikan' where id_warga='$id'";
} else {
    // new data
    $sql = "insert into warga (nm_warga, tgl_lahir, tmpt_lahir, jenis_kelamin, rt, rw, dusun, nm_jalan, no_rumah, id_kepala_keluarga, no_kk, id_pekerjaan, no_hp, id_agama, id_status_kawin, no_ktp, penghasilan, id_jenjang_pendidikan) VALUES ('$nama_warga', '$tgl_lahir', '$tmpt_lahir', '$jenis_kelamin', '$rt', '$rw', '$dusun', '$nama_jalan', '$no_rumah', '$id_kepala_keluarga', '$no_kk', '$id_pekerjaan', '$no_hp', '$id_agama', '$id_status_kawin', '$no_ktp', '$penghasilan', '$id_jenjang_pendidikan')";
}

mysqli_query($conn, $sql);

// redirect ke halaman list
echo "<script>
    window.location.replace('index.php?page=warga');
</script>";
