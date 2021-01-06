<?php
if (defined("GELANG") == false) {
    // ini menandakan dia lompat pagar
    die("Anda tidak boleh membuka halaman ini secara langsung!");
}

if(isset($_GET['id']))
{
    $id = $_GET['id'];
    $sql = "delete from agama where id_agama='$id'";
    mysqli_query($conn, $sql);
}

// redirect ke halaman list
echo "<script>
    window.location.replace('index.php?page=agama');
</script>";
?>