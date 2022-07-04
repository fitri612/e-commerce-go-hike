<?php
$koneksi = new mysqli('localhost', 'root', '', 'exmount');

//registasi
if (isset($_POST['register'])) {
    $username = $_POST['username'];
    $email    = $_POST['email'];
    $telepon  = $_POST['telepon'];
    $foto     = "person.png";
    $pass     = $_POST['pass'];
    $epass = md5($pass);

    $insert = mysqli_query($koneksi, "INSERT INTO users(email,username,pass,telepon,foto) values('$email','$username','$epass','$telepon','$foto')");
    if ($insert) {
        echo '
        <script> 
            // alert("Akun Berhasil Dibuat");
            window.location.href="login.php" 
        </script>
        ';
    } else {
        echo '
        <script> 
            // alert("Registasi akun gagal");
            window.location.href="login.php" 
        </script>
        ';
    }
}


// login
if (isset($_POST['login'])) {
    $username = $_POST['username'];
    $pass     = $_POST['pass'];
    $epass = md5($pass);

    $cekAkun = mysqli_query($koneksi, "SELECT * fROM users where username='$username' AND pass='$epass' ");
    $ada = mysqli_num_rows($cekAkun);

    if ($ada > 0) {
        // Mendapatkan aku dalam bentuk array
        $akun = $cekAkun->fetch_assoc();
        // Simpan di session
        $_SESSION["users"] = $akun;
        // Jika sudah belanja
        if (isset($_SESSION['keranjang']) or !empty($_SESSION['keranjang'])) {
            echo '<script>window.location.href="cart.php"</script>';
            // echo "<meta http-equiv='refresh' content='1;url=checkout.php'>";
        } else {
            echo '<script>window.location.href="index.php"</script>';
            // echo "<meta http-equiv='refresh' content='1;url=riwayat.php'>";
        }
    } else {
        echo '
        <script> 
            // alert("Login gagal")
        </script>
        ';
    }
}

// logout
if (isset($_POST['logout'])) {
    session_unset();
    session_destroy();
    echo '<script>window.location.href="index.php"</script>';
}