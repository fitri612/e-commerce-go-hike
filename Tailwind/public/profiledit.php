<!-- Edit Profil -->
<?php
$id_user = $_SESSION['users']['id_user'];
$ambil = $koneksi->query("SELECT * FROM users WHERE id_user='$id_user'");
$data = $ambil->fetch_assoc();
?>
<div class="editprofile  ml-20 hidden md:block" id="editprofile">
    <form action="" method="POST" enctype="multipart/form-data">
        <p class="py-7 ml-10 text-3xl font-bold">Edit Profile</p>
        <img class="w-52 h-52 ml-7 mb-5 p-1 rounded-full ring-2 ring-gray-300" src="./img/users/<?php echo $data['foto']; ?>" alt="Bordered avatar">

        <input type="file" id="file" name="foto1" class="form-control bg-emerald-500 text-gray-100 ml-14 p-2 rounded-md cursor-pointer hover:bg-emerald-600 shadow-emerald-400">
        <div class="w-full my-3 py-5 px-5 mx-2 rounded-md">
            <div>
                <label class="block pb-2 text-gray-600">Nama</label>
                <input class="w-1/2 outline-none mb-4 px-2 py-1 border border-gray-300 font-bold text-gray-600 rounded-md" type="text" name="username" value="<?php echo $data['username']; ?>">
            </div>

            <div>
                <label class="block pb-2 text-gray-600">No Telp</label>
                <input class="w-1/2 outline-none mb-4 px-2 py-1 border border-gray-300 font-bold text-gray-600 rounded-md" type="text" name="telepon" value="<?php echo $data['telepon']; ?>">
            </div>
            <button name="simpan" id="open-btn1" class="bg-sky-600 text-center text-white mt-10 py-2 px-14 rounded-md hover:bg-sky-700">Simpan</button>
        </div>
    </form>
</div>



<!-- Edit Profil -->
<div class="md:hidden" id="mobile_edprof">
    <form action="" method="POST" enctype="multipart/form-data">
        <p class="py-7 text-3xl font-bold">Edit Profile</p>

        <img class="mx-auto w-52 h-52 mb-5 p-1 rounded-full ring-2 ring-gray-300" src="./img/users/<?php echo $data['foto']; ?>" alt="Bordered avatar">
        <!-- <input class="hidden" type="file" accept="image/*" name="" id="file">
                        <label for="file" class="bg-emerald-500 text-gray-100 p-2 ml-24 rounded-md cursor-pointer hover:bg-emerald-600 shadow-emerald-400">
                            Choose your image
                        </label> -->
        <input type="file" id="file" name="foto1" class="form-control bg-emerald-500 text-gray-100 p-2 rounded-md cursor-pointer hover:bg-emerald-600 shadow-emerald-400">

        <div class="w-full my-3 py-5 px-5 rounded-md">
            <div>
                <label class="block pb-2 text-gray-600">Nama</label>
                <input class="w-full outline-none mb-4 px-2 py-1 border border-gray-300 font-bold text-gray-600 rounded-md" type="text" name="username" value="<?php echo $data['username']; ?>">
            </div>
            <div>
                <label class="block pb-2 text-gray-600">No Telp</label>
                <input class="w-full outline-none mb-4 px-2 py-1 border border-gray-300 font-bold text-gray-600 rounded-md" type="text" name="telepon" value="<?php echo $data['telepon']; ?>">
            </div>
            <button name="simpan" id="open-btn1" class="bg-sky-600 text-center text-white mt-10 py-2 px-14 rounded-md hover:bg-sky-700">Simpan</button>
        </div>
    </form>
</div>

<?php
if (isset($_POST['simpan'])) {
    $nama1 = $_FILES['foto1']['name'];
    $lokasi1 = $_FILES['foto1']['tmp_name'];
    $foto_lama = $_SESSION['users']['foto'];

    if (!empty($lokasi1)) {
        move_uploaded_file($lokasi1, "img/users/$nama1");
        $koneksi->query("UPDATE users SET username='$_POST[username]', telepon='$_POST[telepon]', foto='$nama1' WHERE id_user='$id_user' ");
        
        if ($nama1 != $foto_lama) {
            
            if ($foto_lama != "person.png") {
                $_SESSION['users']['foto'] = $nama1;
                unlink("img/users/$foto_lama");
            }
        }
    } else {
        $koneksi->query("UPDATE users SET username='$_POST[username]', telepon='$_POST[telepon]' WHERE id_user='$id_user' ");
    }

    // ganti session user
    $_SESSION['users']['username'] = $_POST['username'];
    $_SESSION['users']['telepon'] = $_POST['telepon'];

    // echo "<script>alert('Data user telah diubah');</script>";
    echo "<script>location='data.php?halaman=profile';</script>";
}
?>