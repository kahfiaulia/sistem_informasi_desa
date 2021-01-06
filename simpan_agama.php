<?php
if (defined("GELANG") == false) {
    // ini menandakan dia lompat pagar
    die("Anda tidak boleh membuka halaman ini secara langsung!");
}

$nama_agama = $_POST['nama_agama'];

if(isset($_GET['id']))
{
    // edit data
    $id = $_GET['id'];
    $sql = "update agama set nm_agama='$nama_agama' where id_agama='$id'";
}
else
{
    // new data
    $sql = "insert into agama (nm_agama) values ('$nama_agama')";
}

mysqli_query($conn, $sql);

// redirect ke halaman list
echo "<script>
    window.location.replace('index.php?page=agama');
</script>";
?>