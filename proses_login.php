<!-- simpan dengan nama proses_login.php -->
<?php
if (defined("GELANG") == false) {
    // ini menandakan dia lompat pagar
    die("Anda tidak boleh membuka halaman ini secara langsung!");
}

// PROSES AUTH
$username = $_POST['username'];
$password = $_POST['password'];

// CEK USER DAN PASSWORD DI DALAM DATABASE
// TODO: CARI TERKAIT SQL INJECTION AND HOW TO PREVENT IT
$sql = "SELECT * FROM users WHERE user_username='$username' AND user_password='".md5($password)."'";

$result = mysqli_query($conn, $sql);

if(mysqli_num_rows($result) == 1) 
{
    // ADA USERNYA   
    // BERIKAN SESI/SESSION
    $row = mysqli_fetch_assoc($result);
    $_SESSION['username'] = $username;
    $_SESSION['is_login'] = true;
    $_SESSION['nm_user'] = $row['nm_user'];
    $_SESSION['id_level'] = $row['id_level'];
    
    echo "<script>
        window.location.replace('index.php?page=statistik');
    </script>";
}
else
{
    // GAGAL LOGIN   
    // Redirect ke halaman login
    echo "<script>
        window.location.replace('index.php?page=login');
    </script>";
}
?>