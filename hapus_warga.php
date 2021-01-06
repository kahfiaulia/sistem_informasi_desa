<?php
if (defined("GELANG") == false) {
    // ini menandakan dia lompat pagar
    die("Anda tidak boleh membuka halaman ini secara langsung!");
}

if(isset($_GET['id']))
{
    $id = $_GET['id'];
    $sql = "delete from warga where id_warga='$id'";
    mysqli_query($conn, $sql);
}

// redirect ke halaman list
echo "<script>
    window.location.replace('index.php?page=warga');
</script>";
?>